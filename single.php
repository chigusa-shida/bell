<?php get_header(); ?>

<main id="main" class="l-wrap">
  <div class="l-main" id="js-main">
    <div class="p-news">

      <div class="p-heading__title">
        <h2 class="c-title" data-ja="ニュース">
          <span class="c-title--red">N</span>EWS
        </h2>
      </div>

      <div class="p-news__content p-news-post">

        <article>
          <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>

              <div class="p-news-post__top">
                <div class="p-news-post__meta">
                  <p class="p-news-post__date c-post-date">
                    <?php echo get_the_date(); ?>
                  </p>

                  <?php
                  $categories = get_the_category();
                  if (!empty($categories)) {
                    echo '<ul class="p-news-post__cats">';
                    foreach ($categories as $category) {
                      echo '<li class="p-news-post__cat c-post-cat">' . esc_html($category->name) . '</li>';
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

                  <?php the_content(); ?>

                  </div>
                </div>
              </div>

            <?php endwhile; ?>
          <?php endif; ?>
        </article>

        <!-- ページナビ -->
        <div class="p-page-article-nav">
          <?php
          $prev_post = get_adjacent_post(false, '', true);
          $next_post = get_adjacent_post(false, '', false);

          if ($prev_post || $next_post) :
          ?>

            <!-- 前 -->
            <?php if ($prev_post) : ?>
              <?php previous_post_link(
                '%link',
                '<span class="p-page-nav__item"><i class="fa-solid fa-circle-chevron-left"></i>&ensp;前の記事へ</span>'
              ); ?>
            <?php else : ?>
              <span class="p-page-nav__item nouse">
                <i class="fa-solid fa-circle-chevron-left"></i>&ensp;前の記事へ
              </span>
            <?php endif; ?>

            <!-- 一覧 -->
            <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>">
              <span class="p-page-nav__item">一覧ページ</span>
            </a>

            <!-- 次 -->
            <?php if ($next_post) : ?>
              <?php next_post_link(
                '%link',
                '<span class="p-page-nav__item">次の記事へ&ensp;<i class="fa-solid fa-circle-chevron-right"></i></span>'
              ); ?>
            <?php else : ?>
              <span class="p-page-nav__item nouse">
                次の記事へ&ensp;<i class="fa-solid fa-circle-chevron-right"></i>
              </span>
            <?php endif; ?>

          <?php endif; ?>
        </div>

      </div>
    </div>
  </div>
</main>

<?php get_template_part('template-parts/footer-top'); ?>
<?php get_footer(); ?>