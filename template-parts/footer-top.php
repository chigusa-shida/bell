<?php if (!is_home() && !is_front_page()) : ?>
  <div class="c-breadcrumb"><?php custom_breadcrumb(); ?></div>
<?php endif; ?>
<div id="js-footer">
  <ul class="p-footer-top">
    <li class="p-footer-top__item">
      <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="p-footer-top__item--link">
        <div class="p-footer-top__item--text">
          <div class="p-footer-top__title c-title" data-ja="お問い合わせ"><span class="c-title--red">C</span>ONTACT</div>
        </div>
        <span class="p-footer-top__item--btn"></span>
        <div class="p-footer-top__item--img">
          <picture>
            <source srcset="<?php echo get_theme_file_uri('assets/images/footer_contact.webp'); ?>" type="image/webp" />
            <img src="<?php echo get_theme_file_uri('assets/images/footer_contact.jpg'); ?>" alt="" />
          </picture>
        </div>
      </a>
    </li>
    <li class="p-footer-top__item">
      <a href="<?php echo esc_url(home_url('/deadline/')); ?>" class="p-footer-top__item--link">
        <div class="p-footer-top__item--text">
          <div class="p-footer-top__title c-title" data-ja="納期カレンダー"><span class="c-title--red">D</span>eadline</div>
        </div>
        <span class="p-footer-top__item--btn"></span>
        <div class="p-footer-top__item--img">
          <picture>
            <source srcset="<?php echo get_theme_file_uri('assets/images/footer_deadline.webp'); ?>" type="image/webp" />
            <img src="<?php echo get_theme_file_uri('assets/images/footer_deadline.jpg'); ?>" alt="" />
          </picture>
        </div>
      </a>
    </li>
    <li class="p-footer-top__item">
      <a href="<?php echo esc_url(home_url('/catalog/')); ?>" class="p-footer-top__item--link">
        <div class="p-footer-top__item--text">
          <div class="p-footer-top__title c-title" data-ja="デジタルカタログ"><span class="c-title--red">C</span>atalog</div>
        </div>
        <span class="p-footer-top__item--btn"></span>
        <div class="p-footer-top__item--img">
          <picture>
            <source srcset="<?php echo get_theme_file_uri('assets/images/footer_catalog.webp'); ?>" type="image/webp" />
            <img src="<?php echo get_theme_file_uri('assets/images/footer_catalog.jpg'); ?>" alt="" />
          </picture>
        </div>
      </a>
    </li>
  </ul>
</div>