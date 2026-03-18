<?php get_header(); ?>
<main>
  <div class="l-main" id="js-main">
    <div class="p-news">
      <div class="p-news__heading">
        <h2 class="c-title" data-ja="ニュース"><span class="c-title--red">N</span>EWS</h2>
      </div>

      <div class="p-news__content">
        <ul class="p-news__cats">
          <li class="u-tab_btn active">
            <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>">すべて</a>
          </li>

          <?php
          $categories = get_categories([
            'hide_empty' => false,
            'orderby'    => 'name',
            'order'      => 'ASC',
          ]);

          foreach ($categories as $category) {
            echo '<li><a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a></li>';
          }
          ?>
        </ul>

        <div class="p-news__main">
          <article>
            <div class="p-mews-article">
              <ul class="p-mews-article__list">
                <?php
                $paged = get_query_var('paged') ? get_query_var('paged') : 1;

                $args = array(
                  'post_type'      => 'post',
                  'posts_per_page' => 5,
                  'paged'          => $paged,
                  'post_status'    => 'publish',
                );

                $my_query = new WP_Query($args);
                ?>

                <?php if ($my_query->have_posts()) : ?>
                  <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
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
                          <p class="postttl">
                            <?php the_title(); ?>
                          </p>
                          <i class="fa-solid fa-circle-chevron-right fa-xl" style="color: #ffffff;"></i>
                        </div>
                      </a>
                    </li>
                  <?php endwhile; ?>
                <?php else : ?>
                  <li>
                    <p>記事はまだありません。</p>
                  </li>
                <?php endif; ?>

                <?php wp_reset_postdata(); ?>
              </ul>
            </div>
          </article>
        </div>

        <div class="p-news__bottom">
          <div class="p-page-nav">
            <?php
            if ($my_query->max_num_pages > 1) {
              echo paginate_links(array(
                'base'      => get_pagenum_link(1) . '%_%',
                'format'    => 'page/%#%/',
                'current'   => max(1, $paged),
                'total'     => $my_query->max_num_pages,
                'prev_next' => false,
                'type'      => 'list',
              ));
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