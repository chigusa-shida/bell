<?php
get_header();
?>
<main id="js-main">
  <div>
    <div class="p-page__heading" style="background-image:url('<?php echo esc_url( get_theme_file_uri('assets/images/about_fv.webp') ); ?>')">
      <div class="p-heading__title">
        <div class="c-title">
          <span class="c-title__en">
            <span class="c-title--red">P</span>RODUCT
          </span>
          <h1 class="c-title__ja">製品情報</h1>
        </div>
      </div>
    </div>
    <div class="l-main">
      <div class="p-product">
          <section>
            <div class="p-product-top">
              <div class="p-heading text-center">
                <div class="p-heading__content">
                  <div class="p-heading__text">
                    <p class="p-heading__lead c-lead">最新機器と高い技術力で患者様の満足できるものをご提供します。</p>
                    <div class="p-heading__detail">
                      <p>
                          インプラント年間2300本、全国高水準の自費納品率60%の技術とニーズに合ったIOSデータに対応できる最新機器の取り扱いで医院様、患者様の満足できる技工物をご提供します。
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <?php
            // 親カテゴリ（第1階層）だけ取得
            $parent_terms = get_terms([
              'taxonomy'   => 'product-cat',
              'parent'     => 0,
              'hide_empty' => false, // 投稿が無いカテゴリも出すなら false
              'orderby'    => 'name',
              'order'      => 'ASC',
            ]);
  
            if (!is_wp_error($parent_terms) && !empty($parent_terms)) :
            ?>
              <section class="p-product-cat p-page-section">
                <ul class="p-product-cat__grid">
                  <?php foreach ($parent_terms as $term) :
  
                    // ACF画像（返り値が「配列」想定）
                    $thumb = function_exists('get_field') ? get_field('cat_thumb', $term) : null;
  
                    // 画像URL（無ければプレースホルダー）
                    $img_url = !empty($thumb['url'])
                      ? $thumb['url']
                      : get_theme_file_uri('assets/images/noimage.jpg'); // ここは任意
  
                    $term_link = get_term_link($term);
                  ?>
                    <li class="p-product-cat__item">
                      <a class="p-product-cat__card" href="<?php echo esc_url($term_link); ?>">
                        <span class="p-product-cat__thumb">
                          <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($term->name); ?>">
                        </span>
  
                        <?php
                          $cat_en = function_exists('get_field') ? get_field('cat_en', $term) : '';
                          $cat_en = $cat_en ? $cat_en : $term->name;
                        ?>
                        <span class="p-product-cat__label">
                          <span class="p-product-cat__en"><?php echo esc_html($cat_en); ?></span>
                          <span class="p-product-cat__ja"><?php echo esc_html($term->name); ?></span>
                        </span>
                      </a>
                    </li>
                  <?php endforeach; ?>
                </ul>
              </section>
            <?php endif; ?>
      </div>
    </div>
  </div>
</main>
<?php get_template_part('template-parts/footer-top'); ?>
<?php get_footer(); ?>