<?php get_header(); ?>
<main>
  <div class="l-main" id="js-main">
    <div class="p-works">
      <div class="p-heading__title">
        <h2 class="c-title" data-ja="制作事例"><span class="c-title--red">W</span>ORKS</h2>
      </div>
      <div class="p-works__content">
        <div class="p-works__main">
          <article>
            <div class="p-works-article">
              <ul class="p-works-article__list">
                <?php
                $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                $args = array(
                  'post_type' => 'works',
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
                    <li class="p-works-article__card">
                      <div class="p-works-article__imge">
                        <img src="<?php echo catch_that_image(); ?>" alt="<?php echo get_post_meta($post->ID, "works_subtitle", true); ?>">
                      </div>
                      <h2 class="p-works-article__title">
                        <?php echo get_post_meta($post->ID, "works_subtitle", true); ?>
                      </h2>
                      <div class="p-works-article__detail">
                        <span>
                          <?php $content = get_the_content();
                          $content = strip_tags($content);
                          $content = apply_filters('the_content', $content);
                          $content = strip_shortcodes($content);
                          echo $content;
                          ?>
                        </span>
                      </div>
                      <div class="p-works-article__button c-button">
                        <a href="<?php echo esc_url(get_permalink()); ?>" class="p-home-about__link">
                          <span class="c-button__pageLink en">View&nbsp;More</span>
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
          </article>
        </div>
        <div class="p-works__bottom">
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