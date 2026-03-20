<?php
/*
Template Name: カタログ
*/
get_header();
?>
<main>
  <div class="l-main" id="js-main">
    <div class="p-catalog">
      <div class="p-heading">
          <div class="p-heading__content">
              <div class="p-heading__title text-center">
                <div class="c-title">
                  <span class="c-title__en">
                    <span class="c-title--red">C</span>atalog
                  </span>
                  <h1 class="c-title__ja">カタログ</h1>
                </div>
              </div>
          </div>
      </div> 
      <div class="p-catalog__content">
        <?php the_content(); ?>
      </div>
    </div>
  </div>
</main>
<?php get_template_part('template-parts/footer-top'); ?>
<?php get_footer(); ?>