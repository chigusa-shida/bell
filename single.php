<?php get_header(); ?>
<main id="main" class="l-wrap">
  <div class="l-main">
    <div class="p-news">
      <div class="p-heading__title">
        <h2 class="c-title" data-ja="ニュース"><span class="c-title--red">N</span>EWS</h2>
      </div>
      <div class="p-post">
        <div class="p-post__content">
          <article>
            <?php the_content(); ?>
          </article>
          <div>
            <?php
            $prev_post = get_adjacent_post(false, '', true); // 前の記事
            $next_post = get_adjacent_post(false, '', false); // 次の記事
            if ($prev_post or $next_post) :
            ?>
              <ul>
                <?php if ($prev_post) : ?>
                  <li><a href="<?php echo get_permalink($prev_post->ID); ?>"><?php previous_post_link('%link', '前の記事へ'); ?></a></li>
                <?php else : ?>
                  <li>前の記事はありません</li>
                <?php endif; ?>
                <li>記事一覧</li>
                <?php if ($next_post) : ?>
                  <li><a href="<?php echo get_permalink($next_post->ID); ?>"><?php next_post_link('%link', '次の記事へ'); ?></a></li>
                <?php else : ?>
                  <li>次の記事はありません</li>
                <?php endif; ?>
              </ul>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>

</main><!-- l-wrap -->
<?php get_template_part('template-parts/footer-top'); ?>
<?php get_footer(); ?>