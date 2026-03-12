<!DOCTYPE html>
<html <?php language_attributes() ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="description" content="<?php echo esc_html(meta_description()); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <!-- <link rel="icon" href="./assets/images/fav.png" /> -->
  <!--facebook用-->
  <meta property="og:title" content="TOP" />
  <meta name="description" content="<?php echo esc_html(meta_description()); ?>">
  <meta property="og:url" content="" />
  <meta property="og:image" content="" /><!--絶対パスで記述-->
  <meta property="og:type" content="website" />
  <meta property="og:site_name" content="TOP" />
  <meta property="og:locale" content="ja_JP" />
  <!--twitter用-->
  <meta name="twitter:card" content="summary_large_image" /><!-- summary summary_large_image photo gallery appから選ぶ -->
  <!-- <meta name="twitter:site" content="" /> --><!--twitterがあれば記述-->
  <meta name="twitter:title" content="TOP" />
  <meta name="twitter:url" content="" />
  <meta name="description" content="<?php echo esc_html(meta_description()); ?>">
  <meta name="twitter:image" content="" /><!--絶対パスで記述-->

  <script>
    (function () {
      if (location.hash) {
        sessionStorage.setItem('initialHash', location.hash);
        if (history.replaceState) {
          history.replaceState(null, '', location.pathname + location.search);
        }
      }
    })();
  </script>
  <?php wp_head(); ?>
</head>

<body <?php body_class() ?>>
  <?php wp_body_open() ?>
  <header id="header" class="l-header">
    <div class="p-header">
      <div class="p-header__top">
        <div class="p-header__catch">
          <p class="p-header__catch--text">全メーカーIOSデータ対応、口腔内ｽｷｬﾅｰ技工依頼随時受付中です&excl;</p>
        </div>
        <div class="p-header__tel">
          <i class="fa-solid fa-phone fa-sm" style="color: #e2e2e2;"></i>
          <div>03-6424-7829</div>
        </div>
      </div>
      <div class="p-header__bottom">
        <div class="p-header__bottom--sp">
          <div class="p-header__logo">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="p-header__logo--inner">
              <img src="<?php echo get_theme_file_uri('assets/images/logo.png'); ?>" alt="株式会社ベルデンタルラボラトリーロゴ" />
            </a>
          </div>
          <div class="p-header__btn u-header__sp-btn">
            <span class="p-header__bar p-header__bar--top u-bar-top"></span>
            <span class="p-header__bar p-header__bar--middle u-bar-middle"></span>
            <span class="p-header__bar p-header__bar--bottom u-bar-bottom"></span>
          </div>
        </div>
        <div class="p-header__content">
          <nav class="p-gnav">
            <div class="p-gnav__wrap">
              <!-- トップメニュー -->
              <?php
              wp_nav_menu([
                'theme_location' => 'top_menu',
                'container'      => false,
                'menu_class'     => 'p-gnav__top',
                'fallback_cb'    => false,
              ]);
              ?>
              <!-- トップメニュー end -->
              <!-- ボトムメニュー -->
              <?php
              wp_nav_menu([
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'p-gnav__bottom',
              ]);
              ?>
              <!-- ボトムメニュー end -->
            </div>
          </nav>
        </div>
      </div>
    </div>
  </header>