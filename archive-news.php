<?php get_header(); ?>
<main>
  <div class="l-main" id="js-main">
    <div class="p-news">
      <div class="p-news__heading">
        <div class="p-heading__text">
          <h2 class="c-title" data-ja="ニュース"><span class="c-title--red">N</span>EWS</h2>
        </div>
        
      </div>
      <div class="p-news__content">
        <ul class="p-news__cats">
          <li class="u-tab_btn active"><a href="<?php echo esc_url(get_post_type_archive_link('news')); ?>">すべて</a></li>
          <?php
          $taxonomy_terms = get_terms('news-cat', [
            'hide_empty' => false,
            'orderby' => 'description',
          ]);
          foreach ($taxonomy_terms as $taxonomy_term) {
            echo '<li><a href="' . get_term_link($taxonomy_term) . '">' . $taxonomy_term->name . '</a></li>';
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
                  'post_type' => 'news',
                  'posts_per_page' => 5,
                  'paged' => $paged,
                );
                $my_query = new WP_Query($args);
                $max_num_pages = $my_query->max_num_pages;
                ?>
                <?php
                if ($my_query->have_posts()) :
                  while ($my_query->have_posts()) : $my_query->the_post();
                ?>
                    <li class="p-mews-article__item">
                      <a href="<?php the_permalink() ?>">
                        <div class="p-mews-article__meta">
                          <div class="c-post-date">
                            <?php echo get_the_date(); ?>
                          </div>
                          <?php
                          if ($taxonomy_terms = get_the_terms($post->ID, 'news-cat')) {
                            echo '<ul class="p-mews-article__cat">';
                            foreach ($taxonomy_terms as $taxonomy_term) {
                              echo '<li class="c-post-cat">' . $taxonomy_term->name . '</li>';
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
          </article>
        </div>
        <div class="p-news__bottom">
          <!-- ページネーション -->
          <div class="p-page-nav">
            <?php
            if ($my_query->max_num_pages > 1) {
              echo paginate_links(array(
                'base' => get_pagenum_link(1) . '%_%',
                'format' => '?paged=%#%',
                'current' => max(1, $paged),
                'total' => $my_query->max_num_pages,
                'prev_next' => false,
                'type' => 'list',
              ));
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>

</main><!-- l-wrap -->
<?php get_template_part('template-parts/footer-top'); ?>
<?php get_footer(); ?>