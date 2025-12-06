<?php
/*
Template Name: カタログ
*/
get_header();
?>
<main>
  <div class="l-main" id="js-main">
    <div class="p-catalog">
      <div class="p-heading__title">
        <h2 class="c-title" data-ja="カタログ"><span class="c-title--red">C</span>atalog</h2>
      </div>
      <div class="p-catalog__content">
        <?php the_content(); ?>
      </div>
    </div>
  </div>
</main>
<?php get_template_part('template-parts/footer-top'); ?>
<?php get_footer(); ?>