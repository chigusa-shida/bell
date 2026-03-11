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
                        <h2>
                        <?php echo esc_html($child->name); ?>
                        <?php if ($child_en) : ?>
                            <span><?php echo esc_html($child_en); ?></span>
                        <?php endif; ?>
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

                                <div class="p-product-category__text">
                                    <?php
                                    $content = apply_filters('the_content', get_the_content());
                                    $content = preg_replace('/<figure class="wp-block-image.*?<\/figure>/is', '', $content);

                                    if (preg_match('/<p>(.*?)<\/p>/is', $content, $matches)) {
                                    echo wp_kses_post($matches[0]);
                                    } else {
                                    echo '<p>' . esc_html(wp_trim_words(wp_strip_all_tags(get_the_content()), 40, '...')) . '</p>';
                                    }
                                    ?>
                                </div>
                                </div>

                                <div class="p-product-category__footer">
                                <?php
                                $product_prostheses = function_exists('get_field') ? get_field('product_prostheses') : '';
                                ?>
                                <?php if (!empty($product_prostheses)) : ?>
                                    <div class="p-product-category__prostheses">
                                    <p><span>対象補綴</span><?php echo wp_kses_post($product_prostheses); ?></p>
                                    </div>
                                <?php endif; ?>

                                <div class="p-product-category__button">
                                    <div class="c-button">
                                    <a href="<?php the_permalink(); ?>">
                                        <span class="c-button__pageLink en">LEARN MORE</span>
                                    </a>
                                    </div>
                                </div>
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