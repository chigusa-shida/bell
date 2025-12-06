<?php
/*
Template Name: よくある質問
*/
get_header();
?>
<main>
  <div class="l-main" id="js-main">
    <div class="p-faq">
      <div class="p-heading__title">
        <h2 class="c-title" data-ja="よくある質問"><span class="c-title--red">F</span>AQ</h2>
      </div>
      <div class="p-faq__content">
        <div class="p-faq__area" id="js-accordion">
          <?php
          $faq_args = array(
            'post_type' => 'faq',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'order' => 'ASC',
            'orderby' => 'modified',
          );
          $faq_query = new WP_Query($faq_args);
          if ($faq_query->have_posts()) :
            while ($faq_query->have_posts()) :
              $faq_query->the_post(); ?>
              <dl>
                <dt class="u-accordion-question">
                  <p><?php the_title(); ?></p>
                </dt>
                <dd class="u-accordion-answer">
                  <?php the_content(); ?>
                </dd>
              </dl>
          <?php
            endwhile;
          endif; ?>
        </div>
      </div>
    </div>
  </div>
</main>
<?php get_template_part('template-parts/footer-top'); ?>
<?php get_footer(); ?>