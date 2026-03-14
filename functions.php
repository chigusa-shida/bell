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
  
  register_taxonomy(
    'product-prosthesis',
    'product',
    array(
      'label'             => '対応補綴',
      'labels'            => array(
        'name'              => '対応補綴',
        'singular_name'     => '対応補綴',
        'search_items'      => '対応補綴を検索',
        'all_items'         => '対応補綴一覧',
        'edit_item'         => '対応補綴を編集',
        'update_item'       => '対応補綴を更新',
        'add_new_item'      => '対応補綴を追加',
        'new_item_name'     => '新しい対応補綴名',
        'menu_name'         => '対応補綴',
      ),
      'hierarchical'      => true,
      'public'            => true,
      'show_in_rest'      => true,
      'show_admin_column' => true,
      'rewrite'           => array(
        'slug' => 'product-prosthesis',
      ),
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

  return $post_id;
}

add_action('save_post', 'save_custom_fields');


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
