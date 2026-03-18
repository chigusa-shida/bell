<footer class="l-footer">
  <div class="p-footer">
    <div class="p-footer__mainWrap">
      <div class="p-footer__main">
        <div class="p-footer__info">
          <div class="p-footer__logo">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="p-footer__logo--inner">
              <img src="<?php echo get_theme_file_uri('assets/images/logo.png'); ?>" alt="株式会社ベルデンタルラボラトリーロゴ" />
            </a>
          </div>
          <div class="p-footer__detail">
            <dl>
              <dt>株式会社ベルデンタルラボラトリー</dt>
              <dd>〒144-0056&nbsp;東京都大田区西六郷2-44-6</dd>
              <dd>TEL&#0058;03-6424-7829&nbsp;FAX&#0058;03-6424-5172</dd>
            </dl>
          </div>
        </div>
        <div class="p-footer__navWrap">
        <?php
          wp_nav_menu(array(
            'theme_location' => 'footer_menu',
            'container'      => false,
            'menu_class'     => 'p-footer__nav',
            'fallback_cb'    => false,
          ));
          ?>
        </div>
      </div>
      <div class="p-footer__social p-social">
        <ul class="p-social__list">
          <li class="p-social__list--item">
            <a target="_blank" href="https://www.instagram.com/#/">
              <i class="fa-brands fa-instagram fa-lg" style="color: #ffffff;"></i>
            </a>
          </li>
          <li class="p-social__list--item">
            <a target="_blank" href="https://twitter.com/#/">
              <i class="fa-brands fa-x-twitter fa-lg" style="color: #ffffff;"></i>
            </a>
          </li>
          <li class="p-social__list--item">
            <a target="_blank" href="https://www.facebook.com/#/">
              <i class="fa-brands fa-facebook-f fa-lg" style="color: #ffffff;"></i>
            </a>
          </li>
          <li class="p-social__list--item">
            <a target="_blank" href="#">
              <i class="fa-brands fa-youtube fa-lg" style="color: #ffffff;"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="p-footer__bottom">
      <div class="p-footer__bottom--inner">
        <ul class="p-footer__other-list">
          <li class="p-footer__other-list--item">
            <a href="<?php echo esc_url(home_url('/privacy/')); ?>">プライバシーポリシー</a>
          </li>
          <li class="p-footer__other-list--item">
            <a href="<?php echo esc_url(home_url('/warranty/')); ?>">保証規約</a>
          </li>
        </ul>
        <p class="p-footer__copy">&copy;BELL Dental Laboratory.,inc. All Rights Reserved.</p>
      </div>
    </div>
  </div>
</footer>
<div id="page-top">
  <a href="#" role="button">PAGE TOP</a>
</div>
<?php wp_footer(); ?>

</body>

</html>