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
              <ul class="p-gnav__top">
                <li class="p-gnav__topMenu js-topMenu"><a href="<?php echo esc_url(home_url('/deadline/')); ?>" class="p-gnav__topMenu--link" data-hover="納期カレンダー">納期カレンダー</a></li>
                <li class="p-gnav__topMenu js-topMenu"><a href="https://dentalbin24.belldl.com/" target="_blank" rel="noopener noreferrer" class="p-gnav__topMenu--link" data-hover="オンラインショップ">オンラインショップ</a></li>
                <li class="p-gnav__topMenu js-topMenu"><a href="<?php echo esc_url(home_url('/catalog/')); ?>" class="p-gnav__topMenu--link" data-hover="カタログ">カタログ</a></li>
              </ul>
              <ul class="p-gnav__bottom">
                <li class="p-gnav__bottomMenu visible-md">
                  <a href="<?php echo esc_url(home_url('/')); ?>" class="p-gnav__bottomMenu--link" title="HOME">ホーム</a>
                </li>
                <li class="p-gnav__bottomMenu js-dropdown_link">
                  <a href="<?php echo esc_url(home_url('/about/')); ?>" class="p-gnav__bottomMenu--link" title="ABOUT&nbsp;US">
                    私たちについて
                  </a>
                  <div class="p-dropmenu js-dropdown_contents">
                    <div class="p-dropmenu__inner">
                      <div class="p-dropmenu__top">
                        <p class="p-dropmenu__top--title">ABOUT&nbsp;US</p>
                        <div class="p-dropmenu__top--btn c-button">
                          <a href="<?php echo esc_url(home_url('/about/')); ?>">
                            <span class="c-button__pageLink">私たちについて</span>
                          </a>
                        </div>
                      </div>
                      <dl class="p-dropmenu__conts">
                        <dt class="p-dropmenu__conts--title">
                          <a href="<?php echo esc_url(home_url('/')); ?>/about#advantage" class="p-dropmenu__conts--title--link">私たちの強み</a>
                        </dt>
                        <dd>
                          <ul class="p-dropmenu__list">
                            <li class="p-dropmenu__item"><a href="<?php echo get_post_type_archive_link('equipment'); ?>">設備情報</a></li>
                            <li class="p-dropmenu__item"><a href="<?php echo esc_url(home_url('/fis/')); ?>">営業サポート</a></li>
                          </ul>
                        </dd>
                      </dl>
                    </div>
                  </div>
                </li>
                <li class="p-gnav__bottomMenu js-dropdown_link">
                  <a href="<?php echo get_post_type_archive_link('product'); ?>" class="p-gnav__bottomMenu--link" title="PRODUCT">
                    製品情報
                  </a>
                  <div class="p-dropmenu js-dropdown_contents">
                    <div class="p-dropmenu__inner">
                      <div class="p-dropmenu__top ">
                        <p class="p-dropmenu__top--title">PRODUCT</p>
                        <div class="p-dropmenu__top--btn c-button">
                          <a href="<?php echo get_post_type_archive_link('product'); ?>">
                            <span class="c-button__pageLink">製品情報一覧</span>
                          </a>
                        </div>
                      </div>
                      <div class="p-dropmenu__conts">
                        <div>
                          <ul class="p-dropmenu__list">
                            <?php
                            $product_args = array(
                              'post_type' => 'product',
                              'posts_per_page' => -1,
                              'orderby' => 'meta_value_num',
                              'meta_key' => 'product_order',
                              'order' => 'ASC',
                            );
                            $product_query = new WP_Query($product_args);
                            ?>
                            <?php
                            if ($product_query->have_posts()) :
                              while ($product_query->have_posts()) : $product_query->the_post();
                            ?>
                                <li class="p-dropmenu__item">
                                  <a href="<?php echo esc_url(get_permalink()); ?>">
                                    <?php the_title(); ?>
                                  </a>
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
                      </div>
                    </div>
                  </div>
                </li>
                <li class="p-gnav__bottomMenu js-dropdown_link">
                  <a href="<?php echo esc_url(home_url('/company/')); ?>" class="p-gnav__bottomMenu--link" title="CONPNY">会社概要</a>
                  <div class="p-dropmenu js-dropdown_contents">
                    <div class="p-dropmenu__inner">
                      <div class="p-dropmenu__top">
                        <p class="p-dropmenu__top--title">CONPNY</p>
                        <div class="p-dropmenu__top--btn c-button">
                          <a href="<?php echo esc_url(home_url('/company/')); ?>"><span class="c-button__pageLink">会社概要</span></a>
                        </div>
                      </div>
                      <div class="p-dropmenu__conts">
                        <div>
                          <ul class="p-dropmenu__list">
                            <li class="p-dropmenu__item"><a href="<?php echo esc_url(home_url('/')); ?>/company#outline">会社概要</a></li>
                            <li class="p-dropmenu__item"><a href="<?php echo esc_url(home_url('/')); ?>/company#history">沿 革</a></li>
                            <li class="p-dropmenu__item"><a href="<?php echo esc_url(home_url('/')); ?>/company#office">オフィス紹介</a></li>
                            <li class="p-dropmenu__item"><a href="<?php echo esc_url(home_url('/')); ?>/company#access">アクセス</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="p-gnav__bottomMenu js-dropdown_link">
                  <a href="<?php echo esc_url(home_url('/recruit/')); ?>" class="p-gnav__bottomMenu--link" title="RECRUIT">採用情報</a>
                  <div class="p-dropmenu js-dropdown_contents">
                    <div class="p-dropmenu__inner">
                      <div class="p-dropmenu__top">
                        <p class="p-dropmenu__top--title">RECRUIT</p>
                        <div class="p-dropmenu__top--btn c-button">
                          <a href="<?php echo esc_url(home_url('/recruit/')); ?>"><span class="c-button__pageLink">採用情報</span></a>
                        </div>
                      </div>
                      <div class="p-dropmenu__conts">
                        <div>
                          <ul class="p-dropmenu__list">
                            <li class="p-dropmenu__item"><a href="<?php echo esc_url(home_url('/')); ?>/recruit#thought">歯科技工所とは</a></li>
                            <li class="p-dropmenu__item"><a href="<?php echo esc_url(home_url('/')); ?>/recruit#position">募集職種</a></li>
                            <li class="p-dropmenu__item"><a href="<?php echo esc_url(home_url('/')); ?>/recruit#numbers">数字で見る</a></li>
                            <li class="p-dropmenu__item"><a href="<?php echo esc_url(home_url('/')); ?>/recruit#personality">求める人材</a></li>
                            <li class="p-dropmenu__item"><a href="<?php echo esc_url(home_url('/')); ?>/recruit#benefits">働く魅力</a></li>
                            <!-- <li class="p-dropmenu__item"><a href="<?php echo esc_url(home_url('/')); ?>/recruit#access">働く環境</a></li> -->
                            <li class="p-dropmenu__item"><a href="<?php echo esc_url(home_url('/entry/')); ?>">エントリー</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="p-gnav__bottomMenu">
                  <a href="<?php echo get_post_type_archive_link('faq'); ?>" class="p-gnav__bottomMenu--link" title="faq">よくある質問</a>
                </li>
                <li class="p-gnav__bottomMenu">
                  <a href="<?php echo get_post_type_archive_link('news'); ?>" class="p-gnav__bottomMenu--link" title="NEWS">ニュース</a>
                </li>
                <li class="p-gnav__bottomMenu p-gnav__bottomMenu--contact">
                  <a href="<?php echo esc_url(home_url('/contact/')); ?>">お問い合わせ</a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </header>