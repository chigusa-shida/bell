<?php
/*
Template Name: 製品情報
*/
get_header();
?>
<main>
  <div class="l-main" id="js-main">
    <div class="p-product">
      <section>
        <div class="p-heading">
          <div class="p-heading__heading">
            <h2 class="c-title" data-ja="製品情報"><span class="c-title--red">P</span>RODUCT</h2>
          </div>
          <div class="p-heading__content row">
            <div class="p-heading__text">
              <p class="p-heading__lead c-lead">最新機器と高い技術力で<br>患者様の満足できるものをご提供します。</p>
              <div class="p-heading__detail">
                <p>インプラント年間2300本、全国高水準の自費納品率60&#37;の技術とニーズに合ったIOSデータに対応できる最新機器の取り扱いで医院様、患者様の満足できる技工物をご提供します。</p>
              </div>
            </div>
            <div class="p-heading__img">
              <picture>
                <source srcset="<?php echo get_theme_file_uri('assets/images/product_top.webp'); ?>" type="image/webp" />
                <img src="<?php echo get_theme_file_uri('assets/images/product_top.jpg'); ?>" alt="制作事例" />
              </picture>
            </div>
          </div>
        </div>
        <?php
        $product_args = array(
          'post_type' => 'product',
          'posts_per_page' => -1,
          'orderby' => 'meta_value_num',
          'meta_key' => 'product_order',
          'order' => 'ASC',
        );
        $product_query = new WP_Query($product_args);
        ?>
        <div class="p-page-button">
          <ul class="p-page-button__list">
            <?php
            if ($product_query->have_posts()) :
              while ($product_query->have_posts()) : $product_query->the_post();
            ?>
                <li class="p-page-button__list--item">
                  <div class="c-button">
                    <a href="#<?php echo get_post_meta($post->ID, "product_id", true); ?>">
                      <span class="c-button__anchorLink"><?php the_title(); ?></span>
                    </a>
                  </div>
                </li>
              <?php
              endwhile;
              ?>
            <?php else : //記事が無い場合 
            ?>
              <li>
                <p>記事はまだありません。</p>
              </li>
            <?php endif;
            wp_reset_postdata(); //クエリのリセット 
            ?>
          </ul>
        </div>
        <div class="p-page-section">
          <ul class="p-product__list">
            <?php
            if ($product_query->have_posts()) :
              while ($product_query->have_posts()) : $product_query->the_post();
            ?>
                <li class="p-product__item" id="<?php echo get_post_meta($post->ID, "product_id", true); ?>">
                  <div class="p-product__item--left">
                    <div class="p-product__title">
                      <h3 class="c-title" data-ja="<?php the_title(); ?>">
                        <span class="c-title--red"><?php echo get_post_meta($post->ID, "product_subtitle", true); ?></span>
                      </h3>
                    </div>
                    <p class="p-product__description"><?php echo get_post_meta($post->ID, 'product_description', true); ?></p>
                    <div class="p-product__button">
                      <div class="c-button">
                        <a href="<?php echo esc_url(get_permalink()); ?>">
                          <span class="c-button__pageLink en">View&nbsp;More</span>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="p-product__item--right">
                    <div class="p-product__img">
                      <?php
                      if (has_post_thumbnail()) {
                        the_post_thumbnail('full');
                      } else {
                        $first_img = catch_that_image();
                        echo '<img src="' . $first_img . '" alt="記事内の最初の画像">';
                      }
                      ?>
                    </div>
                  </div>
                </li>
              <?php
              endwhile;
              ?>
            <?php else : //記事が無い場合 
            ?>
              <li>
                <p>記事はまだありません。</p>
              </li>
            <?php endif;
            wp_reset_postdata(); //クエリのリセット 
            ?>
          </ul>
        </div>
      </section>
    </div>
  </div>
</main>
<?php get_template_part('template-parts/footer-top'); ?>
<?php get_footer(); ?>