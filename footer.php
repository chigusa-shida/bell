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
          <ul class="p-footer__nav">
            <li class="p-footer__nav--top"><a href="<?php echo esc_url(home_url('/')); ?>" class="p-footer__list--title">トップページ</a></li>
            <li class="p-footer__nav--pageList">
              <ul class="p-footer__list">
                <li>
                  <a href="<?php echo esc_url(home_url('/about/')); ?>" class="p-footer__list--title">私たちについて</a>
                  <ul class="p-footer__list--child">
                    <li><a href="<?php echo esc_url(home_url('/')); ?>/about#advantage">&minus;&nbsp;私たちの強み</a></li>
                    <li><a href="<?php echo esc_url(home_url('/equipment/')); ?>">&minus;&nbsp;設備情報</a></li>
                    <li><a href="<?php echo get_post_type_archive_link('works'); ?>">&minus;&nbsp;制作事例</a></li>
                    <li><a href="<?php echo esc_url(home_url('/fis/')); ?>">&minus;&nbsp;営業サポート</a></li>
                  </ul>
                </li>
              </ul>
              <ul class="p-footer__list">
                <li><a href="<?php echo get_post_type_archive_link('product'); ?>" class="p-footer__list--title">製品情報</a></li>
                <li>
                  <a href="<?php echo esc_url(home_url('/company/')); ?>" class="p-footer__list--title has-child">会社概要</a>
                  <ul class="p-footer__list--child">
                    <li><a href="<?php echo esc_url(home_url('/company/')); ?>">&minus;&nbsp;会社概要</a></li>
                    <li><a href="<?php echo esc_url(home_url('/')); ?>/company#access">&minus;&nbsp;アクセス</a></li>
                    <li><a href="<?php echo esc_url(home_url('/')); ?>/company#office">&minus;&nbsp;オフィス紹介</a></li>
                  </ul>
                </li>
              </ul>
              <ul class="p-footer__list">
                <li>
                  <a href="<?php echo esc_url(home_url('/recruit/')); ?>" class="p-footer__list--title">採用情報</a>
                  <ul class="p-footer__list--child">
                    <li><a href="<?php echo esc_url(home_url('/recruitment/')); ?>">&minus;&nbsp;募集要項</a></li>
                    <li><a href="<?php echo esc_url(home_url('/entry/')); ?>">&minus;&nbsp;エントリー</a></li>
                  </ul>
                </li>
              </ul>
              <ul class="p-footer__list">
                <li><a href="<?php echo get_post_type_archive_link('news'); ?>">ニュース</a></li>
                <li><a href="https://dentalbin24.belldl.com/">オンラインショップ</a></li>
                <li><a href="<?php echo esc_url(home_url('/deadline/')); ?>">納期カレンダー</a></li>
                <li><a href="<?php echo esc_url(home_url('/catalog/')); ?>">カタログ</a></li>
                <li><a href="<?php echo esc_url(home_url('/faq/')); ?>">よくある質問</a></li>
                <li><a href="<?php echo esc_url(home_url('/contact/')); ?>">お問い合わせ</a></li>
              </ul>
            </li>
          </ul>
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
  <a href="#">PAGE TOP</a>
</div>
<?php wp_footer(); ?>

</body>

</html>