<?php get_header(); ?>

<main>
  <div class="l-main" id="js-main">
    <div class="p-news">

      <div class="p-news__heading">
        <h2 class="c-title" data-ja="ニュース">
          <span class="c-title--red">N</span>EWS
        </h2>
      </div>

      <div class="p-news__content">

        <!-- カテゴリタブ -->
        <ul class="p-news__cats">
          <li class="<?php echo is_home() ? 'u-tab_btn active' : ''; ?>">
            <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>">すべて</a>
          </li>

          <?php
          $categories = get_categories([
            'hide_empty' => false,
            'orderby'    => 'name',
            'order'      => 'ASC',
          ]);

          $current_cat_id = get_queried_object_id();

          foreach ($categories as $category) {
            $active = ($current_cat_id === $category->term_id) ? 'u-tab_btn active' : '';
            echo '<li class="' . esc_attr($active) . '">';
            echo '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';
            echo '</li>';
          }
          ?>
        </ul>

        <div class="p-news__main">
          <article>
            <div class="p-mews-article">
              <ul class="p-mews-article__list">

                <?php if (have_posts()) : ?>
                  <?php while (have_posts()) : the_post(); ?>

                    <li class="p-mews-article__item">
                      <a href="<?php the_permalink(); ?>">

                        <div class="p-mews-article__meta">
                          <div class="c-post-date">
                            <?php echo get_the_date(); ?>
                          </div>

                          <?php
                          $post_categories = get_the_category();
                          if (!empty($post_categories)) {
                            echo '<ul class="p-mews-article__cat">';
                            foreach ($post_categories as $post_category) {
                              echo '<li class="c-post-cat">' . esc_html($post_category->name) . '</li>';
                            }
                            echo '</ul>';
                          }
                          ?>
                        </div>

                        <div class="p-mews-article__text">
                          <p class="postttl"><?php the_title(); ?></p>
                          <i class="fa-solid fa-circle-chevron-right fa-xl" style="color: #ffffff;"></i>
                        </div>

                      </a>
                    </li>

                  <?php endwhile; ?>

                <?php else : ?>
                  <li><p>記事はまだありません。</p></li>
                <?php endif; ?>

              </ul>
            </div>
          </article>
        </div>

        <!-- ページネーション -->
        <div class="p-news__bottom">
          <div class="p-page-nav">
            <?php
            global $wp_query;

            if ($wp_query->max_num_pages > 1) {
              echo paginate_links([
                'base'      => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                'format'    => '',
                'current'   => max(1, get_query_var('paged')),
                'total'     => $wp_query->max_num_pages,
                'prev_next' => false,
                'type'      => 'list',
              ]);
            }
            ?>
          </div>
        </div>

      </div>
    </div>
  </div>
</main>

<?php get_template_part('template-parts/footer-top'); ?>
<?php get_footer(); ?>