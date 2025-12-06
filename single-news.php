<?php get_header(); ?>
<main id="main" class="l-wrap">
  <div class="l-main" id="js-main">
    <d class="p-news">
      <div class="p-heading__title">
        <h2 class="c-title" data-ja="ニュース"><span class="c-title--red">N</span>EWS</h2>
      </div>
      <div class="p-news__content p-news-post">
        <article>
          <div class="p-news-post__top">
            <?php
            if (have_posts()) :
              while (have_posts()) : the_post();
            ?>
                <div class="p-news-post__meta">
                  <p class="p-news-post__date c-post-date"><?php echo get_the_date(); ?></p>
                  <?php
                  $categories = get_the_terms($post->ID, 'news-cat');
                  if ($categories) {
                    echo '<ul class="p-news-post__cats">';
                    foreach ($categories as $category) {
                      echo '<li class="p-news-post__cat c-post-cat">' . $category->name . '</li>';
                    }
                    echo '</ul>';
                  }
                  ?>
                </div>
                <h3 class="p-news-post__title"><?php the_title(); ?></h3>
          </div>
          <div class="p-news-post__content">
            <div class="p-post">
              <div class="p-post__content">
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
              </div>
            </div>
          </div>
      <?php endwhile;
            endif; ?>
        </article>
        <div class="p-page-article-nav">
          <?php
          $prev_post = get_adjacent_post(false, '', true); // 前の記事
          $next_post = get_adjacent_post(false, '', false); // 次の記事
          if ($prev_post or $next_post) :
          ?>
            <?php if ($prev_post) : ?>
              <?php previous_post_link('%link', '<span class="p-page-nav__item"><i class="fa-solid fa-circle-chevron-left" ></i>&ensp;前の記事へ</span>'); ?>
            <?php else : ?>
              <span class="p-page-nav__item nouse">
                <i class="fa-solid fa-circle-chevron-left" style="color: #ffffff;"></i>&ensp;前の記事へ
              </span>
            <?php endif; ?>
            <a href="	<?php echo get_post_type_archive_link('news'); ?>">
              <span class="p-page-nav__item">一覧ページ</span>
            </a>
            <?php if ($next_post) : ?>
              <?php next_post_link('%link', '<span class="p-page-nav__item">次の記事へ&ensp;<i class="fa-solid fa-circle-chevron-right"></i></span>'); ?>
            <?php else : ?>
              <span class="p-page-nav__item nouse">次の記事へ&ensp;<i class="fa-solid fa-circle-chevron-right" style="color: #ffffff;"></i></span>
            <?php endif; ?>
          <?php endif; ?>
        </div>
      </div><!-- p-news-post -->

  </div>
  </div>

</main><!-- l-wrap -->
<?php get_template_part('template-parts/footer-top'); ?>
<?php get_footer(); ?>