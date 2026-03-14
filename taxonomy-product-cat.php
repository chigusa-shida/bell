<?php
get_header();
?>
<?php
$term = get_queried_object();

if (!$term || is_wp_error($term)) {
  return;
}

$term_en = function_exists('get_field') ? get_field('cat_en', $term) : '';
$term_desc = term_description($term->term_id, 'product-cat');

// 今見ているタームの子カテゴリ一覧を取得
$is_parent = ((int) $term->parent === 0);

if ($is_parent) {
  // 親カテゴリページ → 子カテゴリ一覧を取得
  $child_terms = get_terms([
    'taxonomy'   => 'product-cat',
    'parent'     => $term->term_id,
    'hide_empty' => false,
    'orderby'    => 'name',
    'order'      => 'ASC',
  ]);

  if (is_wp_error($child_terms)) {
    $child_terms = [];
  }

  // 子カテゴリが1件もない親カテゴリなら、自分自身を表示対象にする
  if (empty($child_terms)) {
    $child_terms = [$term];
  }
} else {
  // 子カテゴリページ → 自分自身を1セクションとして表示
  $child_terms = [$term];
}
?>

<main>
  <div class="l-main" id="js-main">
    <div class="p-product-category">
        <div class="p-heading">
            <div class="p-heading__content text-center">
                <?php if (!empty($term_en)) : ?>
                    <p class="p-heading__en"><span class="c-title--red"><?php echo esc_html($term_en); ?></span></p>
                <?php endif; ?>

                <h1 class="p-heading__lead c-lead">
                    <?php echo esc_html($term->name); ?>
                </h1>
            </div>
        </div>
      <section class="p-product-category__content p-page-section">
      <aside class="p-product-category__side">
            <div class="p-product-category__nav">
                <p class="p-product-category__navTitle">カテゴリー</p>
                <ul class="p-product-category__navList">
                <li class="p-product-category__navItem">
                    <a href="#all">すべてを見る</a>
                </li>

                <?php foreach ($child_terms as $child) : ?>
                    <li class="p-product-category__navItem">
                    <a href="#term-<?php echo esc_attr($child->slug); ?>">
                        <?php echo esc_html($child->name); ?>
                    </a>
                    </li>
                <?php endforeach; ?>
                </ul>
            </div>
        </aside>
        <div class="p-product-category__main" id="all">
            <?php if (!empty($child_terms)) : ?>
                <?php foreach ($child_terms as $child) : ?>

                <?php
                $child_en = function_exists('get_field') ? get_field('cat_en', $child) : '';

                $product_query = new WP_Query([
                    'post_type'      => 'product',
                    'posts_per_page' => -1,
                    'post_status'    => 'publish',
                    'tax_query'      => [
                    [
                        'taxonomy'         => 'product-cat',
                        'field'            => 'term_id',
                        'terms'            => [$child->term_id],
                        'include_children' => false,
                    ]
                    ]
                ]);
                ?>
                <?php if ($product_query->have_posts()) : ?>
                    <section class="p-product-category__section" id="term-<?php echo esc_attr($child->slug); ?>">
                    <div class="p-product-category__sectionTitle">
                        <?php if ($child_en) : ?>
                            <span><?php echo esc_html($child_en); ?></span>
                        <?php endif; ?>
                        <h2>
                        <?php echo esc_html($child->name); ?>
                        </h2>
                    </div>

                    <div class="p-product-category__sectionContent">
                        <ul class="p-product-category__list">
                        <?php while ($product_query->have_posts()) : $product_query->the_post(); ?>
                            <li class="p-product-category__item">
                            <div class="p-product-category__card">

                                <div class="p-product-category__image">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('large'); ?>
                                <?php endif; ?>
                                </div>

                                <div class="p-product-category__body">
                                    <div class="p-product-category__cardTitle">
                                        <h3><?php the_title(); ?></h3>
                                    </div>

                                    <?php
                                    $product_catch      = function_exists('get_field') ? get_field('product_catch', get_the_ID()) : '';
                                    $product_usage      = function_exists('get_field') ? get_field('product_usage', get_the_ID()) : '';
                                    $product_feature    = function_exists('get_field') ? get_field('product_feature', get_the_ID()) : '';
                                    $product_fix_method = function_exists('get_field') ? get_field('product_fix_method', get_the_ID()) : '';
                                    $product_material   = function_exists('get_field') ? get_field('product_material', get_the_ID()) : '';
                                    $product_prostheses = get_the_terms(get_the_ID(), 'product-prosthesis');
                                    ?>

                                    <div class="p-product-category__text">
                                        <p><?php echo nl2br(esc_html($product_catch)); ?></p>
                                    </div>
                                </div>

                                <div class="p-product-category__footer">
                                    <div class="p-product-category__spec">
                                        <div class="p-product-category__specRow">
                                            <span class="p-product-category__specLabel">用途</span>
                                            <p class="p-product-category__specContent">
                                                <?php echo esc_html($product_usage); ?>
                                            </p>
                                        </div>

                                        <div class="p-product-category__specRow">
                                            <span class="p-product-category__specLabel">特徴</span>
                                            <p class="p-product-category__specContent">
                                                <?php echo esc_html($product_feature); ?>
                                            </p>
                                        </div>

                                        <div class="p-product-category__specRow">
                                            <span class="p-product-category__specLabel">固定方法</span>
                                            <p class="p-product-category__specContent">
                                                <?php echo esc_html($product_fix_method); ?>
                                            </p>
                                        </div>

                                        <div class="p-product-category__specRow">
                                            <span class="p-product-category__specLabel">素材</span>
                                            <p class="p-product-category__specContent">
                                                <?php echo esc_html($product_material); ?>
                                            </p>
                                        </div>

                                        <div class="p-product-category__specRow p-product-category__specRow--tags">
                                            <span class="p-product-category__specLabel">対応補綴</span>
                                            <ul class="p-product-category__tagList">
                                                <?php if (!empty($product_prostheses) && !is_wp_error($product_prostheses)) : ?>
                                                    <?php foreach ($product_prostheses as $prosthesis) : ?>
                                                        <li class="p-product-category__tagItem">
                                                            <?php echo esc_html($prosthesis->name); ?>
                                                        </li>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $product_dentalbin = function_exists('get_field') ? get_field('product_dentalbin', get_the_ID()) : false;
                                ?>

                                <div class="p-product-category__order">
                                <?php if ($product_dentalbin) : ?>

                                    <a 
                                    href="https://www.dentalbin24.net/" 
                                    class="p-product-category__orderBtn"
                                    target="_blank"
                                    rel="noopener"
                                    >
                                    デンタル便で注文
                                    </a>

                                <?php else : ?>

                                    <p class="p-product-category__orderNote">
                                    ※デンタル便では注文できません。
                                    </p>

                                <?php endif; ?>
                                </div>

                            </div>
                            </li>
                        <?php endwhile; ?>
                        </ul>
                    </div>
                    </section>
                <?php endif; ?>

                <?php wp_reset_postdata(); ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
  </div>
</main>

<?php get_template_part('template-parts/footer-top'); ?>
<?php get_footer(); ?>