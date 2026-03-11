<?php
function my_script_init()
{
  // google fonts CSS
  wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&family=Quicksand:wght@300..700&family=Roboto+Condensed:wght@100..900&display=swap', array(), null);

  //glob関数を使うことでPRODUCTION時のハッシュに対応したファイルに対応
  $cssFilePath = glob(get_template_directory() . '/assets/stylesheets/bundle*.css');
  $cssFileURI = get_template_directory_uri() . '/assets/stylesheets/' . basename($cssFilePath[0]);
  wp_enqueue_style('style-css', $cssFileURI);

  // Swiper（CDN）
  wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11');
  wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array('jquery'), '11', true);

  // テーマ用JS（ビルド不要・編集は app.js を直接）
  wp_enqueue_script('app', get_theme_file_uri('assets/javascripts/app.js'), array('jquery', 'swiper'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'my_script_init');

function add_wp_fontawesome()
{
?>

  <script src="https://kit.fontawesome.com/dc66a85a0c.js" crossorigin="anonymous"></script>

<?php
}

add_action('wp_head', 'add_wp_fontawesome');


add_action('init', function () {
  add_theme_support('title-tag'); //titleタグ設定
  add_post_type_support('page', 'excerpt'); //description用「抜粋」の項目追加
});

//外観にメニュー
// 外観にメニューを登録
add_action('after_setup_theme', function () {
  register_nav_menus(array(
    'top_menu'    => 'ヘッダー上部メニュー',
    'primary'     => 'ヘッダー下部（メイン）メニュー',
    'footer_menu' => 'フッターメニュー',
  ));
});

//サイト名のみをタイトルタグに設定
add_filter('document_title_parts', 'title_tagline');
function title_tagline($title)
{
  if (is_home() || is_front_page()) {
    $title['tagline'] = '';
  }
  return $title;
}
function meta_description()
{
  // 投稿または固定ページの場合
  if (is_single() || is_page()) {
    // 抜粋入力欄が空欄ではない場合
    if (has_excerpt()) {
      $description = get_the_excerpt();
    }
    // 抜粋入力欄が空欄の場合
    else {
      $description = '歯科技工所ベルデンタルラボラトリーは、セラミック、ジルコニア、インプラント、義歯など高性能・高品質な歯科技工物を全国の歯科医院にご提供します。';
    }
  } else {
    $description = '歯科技工所ベルデンタルラボラトリーは、セラミック、ジルコニア、インプラント、義歯など高性能・高品質な歯科技工物を全国の歯科医院にご提供します。';
  }
  return $description;
}


/**
 * カスタム投稿タイプを追加
 */
add_theme_support('post-thumbnails');
add_filter('image_send_to_editor', 'remove_image_attribute', 10);
add_filter('post_thumbnail_html', 'remove_image_attribute', 10);
function remove_image_attribute($html)
{
  $html = preg_replace('/(width|height)="\d*"\s/', '', $html);
  $html = preg_replace('/class=[\'"]([^\'"]+)[\'"]/i', '', $html);
  return $html;
}

add_action('init', 'create_post_type');
add_filter('faq_rewrite_rules', '__return_empty_array');
add_filter('equipment_rewrite_rules', '__return_empty_array');
function create_post_type()
{
  register_post_type(
    'news',
    array(
      'label' => 'ニュース',
      'public' => true,
      'has_archive' => true,
      'show_in_rest' => true,
      'menu_position' => 5,
      'menu_icon' => 'dashicons-info-outline',
      'supports' => array(
        'title',
        'editor',
        'thumbnail',
        'revisions',
      ),
    )
  );

  register_taxonomy(
    'news-cat',
    'news',
    array(
      'label' => 'ニュースカテゴリー',
      'hierarchical' => true,
      'public' => true,
      'show_in_rest' => true,
    )
  );

  register_post_type(
    'product',
    array(
      'label' => '製品情報',
      'public' => true,
      'has_archive' => true,
      'show_in_rest' => true,
      'menu_position' => 5,
      'menu_icon' => 'dashicons-info-outline',
      'supports' => array(
        'title',
        'editor',
        'thumbnail',
        'revisions',
      ),
    )
  );

  register_taxonomy(
    'product-cat',
    'product',
    array(
      'label' => '製品情報カテゴリー',
      'hierarchical' => true,
      'public' => true,
      'show_in_rest' => true,
    )
  );
}

/**
 * カスタムフィールドを追加
 */
add_action('admin_menu', 'create_custom_fields');
function create_custom_fields()
{
  add_meta_box('pick_up', 'ピックアップ記事', 'pick_up_field', 'news', 'normal');
  add_meta_box('works_subtitle', 'サブタイトルの入力', 'works_subtitle_field', 'works', 'normal');
  add_meta_box('product_subtitle', 'サブタイトルの入力', 'product_subtitle_field', 'product', 'normal');
  add_meta_box('product_description', '説明文の入力', 'product_description_field', 'product', 'normal');
  add_meta_box('product_order', '並び順', 'product_order_field', 'product', 'normal');
  add_meta_box('product_id', 'ID', 'product_id_field', 'product', 'normal');
}

/**
 * カスタムフィールドの入力形式の設定
 */
function pick_up_field($post)
{
  wp_nonce_field('custom_field_save_meta_box_data', 'custom_field_meta_box_nonce');
  $pick_up = get_post_meta($post->ID, 'pick_up', true);
  $pick_up_check = ($pick_up == "is-on") ? "checked" : ''; ?>
  <label for="pick_up_check">ピックアップ</label>
  <input id="pick_up_check" type="checkbox" name="pick_up" value="is-on" <?php echo $pick_up_check; ?>>
<?php }

function works_subtitle_field($post)
{
  wp_nonce_field('custom_field_save_meta_box_data', 'custom_field_meta_box_nonce');
  $works_subtitle = get_post_meta($post->ID, 'works_subtitle', true); ?>
  <label for="works_subtitle">サブタイトル</label>
  <input id="works_subtitle" type="text" name="works_subtitle" value="<?php echo esc_attr($works_subtitle); ?>">
<?php }

function product_subtitle_field($post)
{
  wp_nonce_field('custom_field_save_meta_box_data', 'custom_field_meta_box_nonce');
  $product_subtitle = get_post_meta($post->ID, 'product_subtitle', true); ?>
  <label for="product_subtitle">サブタイトル</label>
  <input id="product_subtitle" type="text" name="product_subtitle" value="<?php echo esc_attr($product_subtitle); ?>">
<?php }

function product_description_field($post)
{
  wp_nonce_field('custom_field_save_meta_box_data', 'custom_field_meta_box_nonce');
  $product_description = get_post_meta($post->ID, 'product_description', true); ?>
  <label for="product_description">説明文</label>
  <textarea id="product_description" name="product_description" rows="5" style="width:100%;"><?php echo esc_textarea($product_description); ?></textarea>
<?php }

function product_order_field($post)
{
  wp_nonce_field('custom_field_save_meta_box_data', 'custom_field_meta_box_nonce');
  $product_order = get_post_meta($post->ID, 'product_order', true); ?>
  <label for="product_order">並び順</label>
  <input id="product_order" type="text" name="product_order" value="<?php echo esc_attr($product_order); ?>">
<?php }

function product_id_field($post)
{
  wp_nonce_field('custom_field_save_meta_box_data', 'custom_field_meta_box_nonce');
  $product_id = get_post_meta($post->ID, 'product_id', true); ?>
  <label for="product_id">ID</label>
  <input id="product_id" type="text" name="product_id" value="<?php echo esc_attr($product_id); ?>">
<?php }

/**
 * カスタムフィールドデータを保存
 */
function save_custom_fields($post_id)
{
  // 自動保存やリビジョンに関して保存をスキップ
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return $post_id;
  }

  // 管理画面でのみ保存処理を実行
  if (!is_admin()) {
    return $post_id;
  }

  // 投稿が保存される際、カスタムフィールドを保存する
  if (!isset($_POST['custom_field_meta_box_nonce']) || !wp_verify_nonce($_POST['custom_field_meta_box_nonce'], 'custom_field_save_meta_box_data')) {
    return $post_id;
  }

  // 投稿タイプをチェック（'product', 'news', 'works' の投稿タイプのみ）
  $post_types = ['product', 'news', 'works'];
  if (!in_array(get_post_type($post_id), $post_types)) {
    return $post_id;
  }

  // 各カスタムフィールドを保存
  if (!empty($_POST['pick_up'])) {
    update_post_meta($post_id, 'pick_up', $_POST['pick_up']);
  } else {
    delete_post_meta($post_id, 'pick_up');
  }

  if (!empty($_POST['works_subtitle'])) {
    update_post_meta($post_id, 'works_subtitle', sanitize_text_field($_POST['works_subtitle']));
  } else {
    delete_post_meta($post_id, 'works_subtitle');
  }

  if (!empty($_POST['product_subtitle'])) {
    update_post_meta($post_id, 'product_subtitle', sanitize_text_field($_POST['product_subtitle']));
  } else {
    delete_post_meta($post_id, 'product_subtitle');
  }

  if (!empty($_POST['product_description'])) {
    update_post_meta($post_id, 'product_description', sanitize_textarea_field($_POST['product_description']));
  } else {
    delete_post_meta($post_id, 'product_description');
  }

  if (!empty($_POST['product_order'])) {
    update_post_meta($post_id, 'product_order', sanitize_text_field($_POST['product_order']));
  } else {
    delete_post_meta($post_id, 'product_order');
  }

  if (!empty($_POST['product_id'])) {
    update_post_meta($post_id, 'product_id', sanitize_text_field($_POST['product_id']));
  } else {
    delete_post_meta($post_id, 'product_id');
  }

  return $post_id;
}

add_action('save_post', 'save_custom_fields');


/**
 * カスタム投稿タイプ 'product' の投稿一覧に 'product_order' カラムを追加
 */
function add_product_order_column($columns)
{
  $columns['product_order'] = '並び順'; // '並び順' カラム名を追加
  return $columns;
}
add_filter('manage_edit-product_columns', 'add_product_order_column');

// 'product_order' カラムにカスタムフィールドの値を表示
function show_product_order_column_data($column, $post_id)
{
  if ($column == 'product_order') {
    // 'product_order' のカスタムフィールドの値を取得
    $product_order = get_post_meta($post_id, 'product_order', true);

    if ($product_order) {
      echo esc_html($product_order); // カスタムフィールドの値を表示
    } else {
      echo '未設定'; // 値がない場合は '未設定' と表示
    }
  }
}
add_action('manage_product_posts_custom_column', 'show_product_order_column_data', 10, 2);

// 'product_order' カラムをソート可能にする
function sortable_product_order_column($columns)
{
  $columns['product_order'] = 'product_order'; // 'product_order' カラムをソート可能に設定
  return $columns;
}
add_filter('manage_edit-product_sortable_columns', 'sortable_product_order_column');

function custom_admin_styles()
{
  echo '<style>
      /* 投稿一覧ページで product_order カラムの幅を調整 */
      .column-product_order {
          width: 100px !important; /* 幅を100pxに設定 */
      }
  </style>';
}
add_action('admin_head', 'custom_admin_styles');

// 'product_order' に基づいて投稿を並び替える
function sort_posts_by_product_order($query)
{
  if (!is_admin() || !$query->is_main_query()) {
    return;
  }

  global $pagenow;

  if ($pagenow !== 'edit.php') {
    return;
  }

  if ($query->get('post_type') !== 'product') {
    return;
  }

  // 並び順カラムをクリックした時だけ有効にする
  if ($query->get('orderby') === 'product_order') {
    $query->set('meta_key', 'product_order');
    $query->set('orderby', 'meta_value_num');
    $query->set('order', 'ASC');
  }
}
add_action('pre_get_posts', 'sort_posts_by_product_order');

/**
 * カスタムブロックパターンのカテゴリ登録
 */

function add_block_pattern_category()
{
  register_block_pattern_category(
    'my-cat',
    array('label' => __('カスタムブロック', 'my-plugin'))
  );
}
add_action('init', 'add_block_pattern_category');
//カスタムブロックパターンの登録
function register_custom_block_pattern()
{
  register_block_pattern(
    'teble-plugin/my-custom-pattern',
    array(
      'title' => 'テーブル',
      'description' => 'テーブルパターンです。',
      'content' => '<figure class="wp-block-table"><table class="c-table01"><tbody><tr><th>タイトル</th><td>テキスト</td></tr><tr><th>タイトル</th><td>テキスト</td></tr><tr><th>タイトル</th><td>テキスト</td></tr><tr><th>タイトル</th><td>テキスト</td></tr><tr><th>タイトル</th><td>テキスト</td></tr><tr><th>タイトル</th><td>テキスト</td></tr><tr><th>タイトル</th><td>テキスト</td></tr><tr><th>タイトル</th><td>テキスト</td></tr><tr><th>タイトル</th><td>テキスト</td></tr><tr><th>タイトル</th><td>テキスト</td></tr><tr><th>タイトル</th><td>テキスト</td></tr><tr><th>タイトル</th><td>テキスト</td></tr><tr><th>タイトル</th><td>テキスト</td></tr></tbody></table></figure>',
      'categories' => array('my-cat'),
    ),
  );
}
add_action('init', 'register_custom_block_pattern');


//アイキャッチ画像がなかったとき、記事内の最初の画像を表示するコード
function catch_that_image()
{
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches[1][0];

  if (empty($first_img)) {
    // 記事内で画像がなかった場合のnoimage画像指定
    $first_img = esc_url(get_template_directory_uri()) . "/images/common/noimg.png";
  }

  return $first_img;
}


function display_content_without_images()
{
  // 投稿のコンテンツを取得
  $content = get_the_content();

  // 画像タグを削除
  $content_without_images = preg_replace('/<img[^>]+>/i', '', $content);

  // 画像以外のコンテンツを表示
  echo $content_without_images;
}

function remove_wp_block_image_html($content)
{
  // wp-block-imageクラスを持つ<figure>タグ全体を削除
  $content = preg_replace('/<figure class="wp-block-image.*?<\/figure>/is', '', $content);
  return $content;
}
add_filter('the_content', 'remove_wp_block_image_html');

// Contact Form 7で自動挿入されるPタグ、brタグを削除
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false()
{
  return false;
}

function custom_breadcrumb()
{
  echo '<ol><li><a href="' . esc_url(home_url()) . '" >ホーム</a></li>';

  // カスタム投稿タイプのアーカイブページ
  if (is_post_type_archive()) {
    $post_type = get_query_var('post_type');
  
    if (is_array($post_type)) {
      $post_type = reset($post_type);
    }
  
    $post_type_obj = get_post_type_object($post_type);
  
    if ($post_type_obj) {
      echo '<li><a href="' . esc_url(get_post_type_archive_link($post_type)) . '">' . esc_html($post_type_obj->labels->name) . '</a></li>';
    }
  }
  // カスタムタクソノミー（カテゴリやタグではないカスタム分類）
  // カスタムタクソノミー
  elseif (is_tax()) {
    $term = get_queried_object();

    // product-cat のとき
    if ($term->taxonomy === 'product-cat') {
      // 製品情報アーカイブ
      echo '<li><a href="' . esc_url(get_post_type_archive_link('product')) . '">製品情報</a></li>';

      // 親タームがあるとき
      if ($term->parent) {
        $parent = get_term($term->parent, 'product-cat');
        if ($parent && !is_wp_error($parent)) {
          echo '<li><a href="' . esc_url(get_term_link($parent)) . '">' . esc_html($parent->name) . '</a></li>';
        }
      }

      // 今のターム
      echo '<li>' . esc_html($term->name) . '</li>';
    } else {
      echo '<li><a href="' . esc_url(get_term_link($term)) . '">' . esc_html($term->name) . '</a></li>';
    }
  }
  // カテゴリーページの場合
  elseif (is_category()) {
    $category = get_queried_object();
    echo '<li><a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a></li>';
  }
  // タグページの場合
  elseif (is_tag()) {
    $tag = get_queried_object();
    echo '<li><a href="' . esc_url(get_tag_link($tag->term_id)) . '">' . esc_html($tag->name) . '</a></li>';
  }
  // 日付アーカイブページの場合
  elseif (is_date()) {
    echo '<li>' . get_the_date() . '</li>';
  }
  // シングル投稿ページの場合（シングル投稿）
  elseif (is_single()) {
    $post_type = get_post_type();
    $post_type_obj = get_post_type_object($post_type);
  
    if ($post_type_obj && get_post_type_archive_link($post_type)) {
      echo '<li><a href="' . esc_url(get_post_type_archive_link($post_type)) . '">' . esc_html($post_type_obj->labels->name) . '</a></li>';
    }
  
    the_title('<li>', '</li>');
  }
  // 固定ページの場合
  elseif (is_page()) {
    global $post;
    if ($post->post_parent) {
      $parent_page = get_post($post->post_parent);
      echo '<li><a href="' . esc_url(get_permalink($parent_page->ID)) . '">' . esc_html($parent_page->post_title) . '</a></li>';
    }
    the_title('<li>', '</li>');
  }

  echo '</ol>';
}
