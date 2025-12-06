<?php if (!is_home() && !is_front_page()) : ?>
  <div class="c-breadcrumb"><?php custom_breadcrumb(); ?></div>
<?php endif; ?>
<div id="js-footer">
  <ul class="p-footer-top recruit">
    <li class="p-footer-top__item">
      <a href="<?php echo esc_url(home_url('/company/')); ?>" class="p-footer-top__item--link">
        <div class="p-footer-top__item--text">
          <div class="p-footer-top__title c-title" data-ja="会社概要"><span class="c-title--red">C</span>OPANY</div>
        </div>
        <span class="p-footer-top__item--btn"></span>
        <div class="p-footer-top__item--img">
          <picture>
            <source srcset="<?php echo get_theme_file_uri('assets/images/footer_company.webp'); ?>" type="image/webp" />
            <img src="<?php echo get_theme_file_uri('assets/images/footer_company.jpg'); ?>" alt="" />
          </picture>
        </div>
      </a>
    </li>
    <li class="p-footer-top__item">
      <a href="<?php echo esc_url(home_url('/entry/')); ?>" class="p-footer-top__item--link">
        <div class="p-footer-top__item--text">
          <div class="p-footer-top__title c-title" data-ja="エントリー"><span class="c-title--red">E</span>ntry</div>
        </div>
        <span class="p-footer-top__item--btn"></span>
        <div class="p-footer-top__item--img">
          <picture>
            <source srcset="<?php echo get_theme_file_uri('assets/images/footer_recruit.webp'); ?>" type="image/webp" />
            <img src="<?php echo get_theme_file_uri('assets/images/footer_recruit.jpg'); ?>" alt="" />
          </picture>
        </div>
      </a>
    </li>
  </ul>
</div>