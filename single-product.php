<?php
get_header();
?>
<main>
  <div class="l-main" id="js-main">
    <div class="p-product-post">
      <section>
        <div class="p-product-post__head">
          <div class="p-product-post__title">
            <h2 class="c-title" data-ja="<?php the_title(); ?>">
              <span class="c-title--red"><?php echo get_post_meta($post->ID, "product_subtitle", true); ?></span>
            </h2>
          </div>
        </div>
        <div class="p-post">
          <div class="p-post__content p-product-post__content">
            <div class="p-post__imges">
              <?php
              // 投稿のIDと本文を取得
              $post_id = get_the_ID();
              $content = get_post_field('post_content', $post_id);
              // 投稿から画像のsrcとalt属性を抽出
              preg_match_all('/<img[^>]+src="([^"]+)"[^>]*alt="([^"]*)"[^>]*>/i', $content, $matches);
              // 画像情報を格納する配列
              $images = [];
              foreach ($matches[1] as $index => $image_url) {
                $alt_text = isset($matches[2][$index]) ? $matches[2][$index] : '代替テキストなし';
                $images[] = ['src' => $image_url, 'alt' => $alt_text];
              }
              // 画像が2枚以上ある場合にSwiperを表示
              if (count($images) > 1) {
                echo '<div id="js-post-slide">';
                echo '<div class="swiper swiper-main">';
                echo '<div class="swiper-wrapper">';
                // 抽出した画像URLをSwiperのスライドに追加
                foreach ($images as $image) {
                  echo '<div class="swiper-slide">';
                  echo '<div class="slide-img">';
                  echo '<img src="' . esc_url($image['src']) . '" alt="' . esc_attr($image['alt']) . '">';
                  echo '<p class="p-post__imges--label">' . esc_attr($image['alt']) . '</p>';
                  echo '</div>';
                  echo '</div>';
                }
                echo '</div>'; // swiper-wrapper
                echo '<div class="swiper-button-prev"></div>';
                echo '<div class="swiper-button-next"></div>';
                echo '</div>'; // swiper
                echo '</div>';
              } else {
                // 画像が1枚以下の場合、通常の画像として表示
                echo '<div class="p-post__imges--single">';
                echo '<img src="' . esc_url($images[0]['src']) . '" alt="' . esc_attr($images[0]['alt']) . '">';
                echo '<p class="p-post__imges--label">' . esc_attr($images[0]['alt']) . '</p>';
                echo '</div>';
              }
              ?>
            </div>
            <div class="p-post__description">
              <?php display_content_without_images(); ?>
            </div>
            <div class="p-product-post__notes">
              <p>※&nbsp;デンタル便以外の製品のご注文、発注は<span><a href="<?php echo esc_url(home_url('/contact/')); ?>">お問い合わせフォーム</a></span>より、お気軽にお問い合わせください。</p>
              <p><span>※1</span>&nbsp;各IOSデータを取り扱っております。IOSデータの発注は<span><a href="<?php echo esc_url(home_url('/contact/')); ?>">お問い合わせフォーム</a></span>より、お問い合わせください。</p>
              <p><span>※2</span>&nbsp;デンタル便については<span><a href="https://www.dentalbin24.net/" target="_blank" rel="noopener noreferrer">オンラインショップ</a></span>をご覧ください。</p>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</main>
<?php get_template_part('template-parts/footer-top'); ?>
<?php get_footer(); ?>