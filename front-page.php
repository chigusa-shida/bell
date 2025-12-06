<?php get_header(); ?>
<main id="main" class="l-wrap">
  <div class="p-home">
    <div class="p-home-top">
      <div class="p-home-top__container">
        <div class="p-home-top__catch">
          <ul class="p-home-top__label-list">
            <li class="p-home-top__label-item">
              <img src="<?php echo get_theme_file_uri('assets/images/home_top_label-01.png'); ?>" alt="インプラント年間実績2300本" />
            </li>
            <li class="p-home-top__label-item">
              <img class="p-home-top__label-item--02" src="<?php echo get_theme_file_uri('assets/images/home_top_label-02.png'); ?>" alt="自費納品率60％" />
            </li>
            <li class="p-home-top__label-item">
              <img class="p-home-top__label-item--03" src="<?php echo get_theme_file_uri('assets/images/home_top_label-03.png'); ?>" alt="IOSデータ対応" />
            </li>
          </ul>
          <h1 class="p-home-top__copy">歯科業界の職人として<br>求められる技工物を提供する</h1>
          <p class="p-home-top__lead">歯科業界の職人として高性能のデジタル技工に、技工士の技術を乗せて、完全と言えるまで再現した妥協なき技工物を全国の歯科医院様にご提供します。</p>
        </div>
        <div class="p-home-top__notice">
          <div class="p-home-top__notice-title">Notice</div>
          <div class="p-home-top__notice-swiper swiper" id="js-swiper-home-notice">
            <ul class="p-home-top__notice-list swiper-wrapper">
              <?php
              $args = array(
                'post_type' => 'news',
                'posts_per_page' => 3,
                'paged' => $paged,
                'tax_query' => array(
                  array(
                    'taxonomy' => 'news-cat', //タクソノミーを指定
                    'field' => 'slug', //ターム名をスラッグで指定する
                    'terms' => 'notice', //表示したいタームをスラッグで指定
                    'operator' => 'IN'
                  ),
                )
              );
              $my_query = new WP_Query($args);
              $max_num_pages = $my_query->max_num_pages;
              ?>
              <?php
              if ($my_query->have_posts()) :
                while ($my_query->have_posts()) : $my_query->the_post();
              ?>
                  <li class="p-home-top__notice-item swiper-slide">
                    <a href="<?php the_permalink() ?>">
                      <div>
                        <div class="c-post-date">
                          <?php echo get_the_date(); ?>
                        </div>
                      </div>
                      <div>
                        <p class="postttl">
                          <?php
                          if (mb_strlen($post->post_title) > 10) {
                            $title = mb_substr($post->post_title, 0, 10);
                            echo $title . '...';
                          } else {
                            echo $post->post_title;
                          }
                          ?>
                        </p>
                      </div>
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
      </div><!-- p-home-top__container -->
      <div class="p-home-top__mv">
        <div class="swiper" id="js-swiper-home-mv">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="slide-img">
                <picture>
                  <source srcset="<?php echo get_theme_file_uri('assets/images/home_fv-00.webp'); ?>" type="image/webp" />
                  <img src="<?php echo get_theme_file_uri('assets/images/home_fv-00.jpg'); ?>" alt="ベルデンタル画像" />
                </picture>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="slide-img">
                <picture>
                  <source srcset="<?php echo get_theme_file_uri('assets/images/home_fv-05.webp'); ?>" type="image/webp" />
                  <img src="<?php echo get_theme_file_uri('assets/images/home_fv-05.jpg'); ?>" alt="ベルデンタル画像" />
                </picture>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="slide-img">
                <picture>
                  <source srcset="<?php echo get_theme_file_uri('assets/images/home_fv-06.webp'); ?>" type="image/webp" />
                  <img src="<?php echo get_theme_file_uri('assets/images/home_fv-06.jpg'); ?>" alt="ベルデンタル画像" />
                </picture>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="slide-img">
                <picture>
                  <source srcset="<?php echo get_theme_file_uri('assets/images/home_fv-07.webp'); ?>" type="image/webp" />
                  <img src="<?php echo get_theme_file_uri('assets/images/home_fv-07.jpg'); ?>" alt="ベルデンタル画像" />
                </picture>
              </div>
            </div>
          </div>
        </div>
      </div><!-- p-home-top__mv -->
      <div class="p-home-pickUp">
        <div class="p-home-pickUp__inner">
          <div class="p-home-pickUp__title">
            PICK&nbsp;UP
          </div>
          <div class="p-home-pickUp__swiper">
            <div class="p-home-pickUp__swiper--inner">
              <div class="swiper" id="js-swiper-home-pickUp">
                <div class="swiper-wrapper">
                  <?php
                  $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                  $args = array(
                    'post_type' => 'news', // カスタム投稿タイプ名
                    'posts_per_page' => -1,
                    'paged' => $paged,
                    'meta_value' => 'is-on',
                    'orderby' => 'date',
                    'meta_key' => 'pick_up',
                  );
                  $the_query = new WP_Query($args);
                  ?>
                  <?php if ($the_query->have_posts()) : ?>
                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                      <div class="swiper-slide p-home-pickUp__item">
                        <div class="p-pick-up">
                          <a href="<?php the_permalink(); ?>">
                            <div class="p-pick-up__card">
                              <div class="p-pick-up__card-top">
                                <?php if (has_post_thumbnail()) : ?>
                                  <div class="p-pick-up__imge">
                                    <?php $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
                                    echo '<div style="background-image: url(' . $url . ')"></div>'; ?>
                                  </div>
                                <?php else : ?>
                                  <div class="p-pick-up__imge">
                                    <div style="background-image: url('<?= get_template_directory_uri(); ?>/img/no-image.jpg')">
                                    </div>
                                  </div>
                                <?php endif; ?>
                                <div class="p-pick-up__cat">
                                  <?php
                                  if ($taxonomy_terms = get_the_terms($post->ID, 'news-cat')) {
                                    echo '<ul class="p-mews-article__cat">';
                                    foreach ($taxonomy_terms as $taxonomy_term) {
                                      echo '<li class="c-post-cat black">' . $taxonomy_term->name . '</li>';
                                    }
                                    echo '</ul>';
                                  }
                                  ?>
                                </div>
                              </div>
                              <div class="p-pick-up__text-block">
                                <span class="c-post-date">
                                  <?php the_time('Y.m.d'); ?>
                                </span>
                                <div class="p-pick-up__title">
                                  <?php the_title(); ?>
                                </div>
                              </div>
                            </div>
                          </a>
                        </div>
                      </div>
                    <?php
                    endwhile;
                    ?>
                  <?php else : ?>
                    <p>記事はありません</p>
                  <?php endif; ?>
                  <?php wp_reset_postdata(); ?>
                </div>
                <div class="swiper-common">
                  <div class="swiper-pagination"></div>
                  <div class="swiper-button-unit">
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                  </div>
                </div>
              </div><!-- swiper -->
            </div>
          </div>
        </div>
      </div><!-- p-home-pickUp -->
    </div>
    <div class="p-home__container">
      <div class="l-main">
        <section>
          <div class="p-home-about">
            <div class="p-home-about__container">
              <div class="p-home-about__main">
                <div class="p-home-about__title">
                  <h2 class="c-title" data-ja="私たちについて"><span class="c-title--red">A</span>BOUT&nbsp;US</span></h2>
                </div>
                <div class="p-home-about__content">
                  <p class="c-lead">お得意様からの信頼に知識と技術で応えします。</p>
                  <div class="p-home-about__detail">
                    <p>
                      11981年の創業以来、年間約7万症例におよぶ補綴物の製作に携わり、多くの歯科医院様より確かな信頼と実績を積み重ねてまいりました。私たちは「常に上を目指すチャレンジ精神と創造力」を大切にし、これまでに築き上げてきた経験と実績、そして最先端の技工技術を融合させ、高機能かつ高品質な技工物をご提供しています。
                    </p>
                    <p>
                      何よりも、患者様が審美性・機能性・衛生面のすべてにおいてご満足いただき、日々の暮らしの幸福度を
                      高めていただくことこそが、私たちの社会的使命であると信じ、日々研鑽を重ねております。
                    </p>
                  </div>
                </div>
                <div class="p-home-about__btn c-button">
                  <a href="<?php echo esc_url(home_url('/about/')); ?>" class="p-home-about__link">
                    <span class="c-button__pageLink en">View&nbsp;More</span>
                  </a>
                </div>
              </div>
              <div class="p-home-about__imges">
                <div class="p-home-about__imges--01">
                  <div>
                    <picture>
                      <source srcset="<?php echo get_theme_file_uri('assets/images/home_about-01.webp'); ?>" type="image/webp" />
                      <img src="<?php echo get_theme_file_uri('assets/images/home_about-01.jpg'); ?>" alt="営業サポート" />
                    </picture>
                  </div>
                </div>
                <div class="p-home-about__imges--02">
                  <div>
                    <picture>
                      <source srcset="<?php echo get_theme_file_uri('assets/images/home_about-02.webp'); ?>" type="image/webp" />
                      <img src="<?php echo get_theme_file_uri('assets/images/home_about-02.jpg'); ?>" alt="営業サポート" />
                    </picture>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- p-home-about -->
        </section>
        <section>
          <div class="p-home__section">
            <div class="p-home-advantage">
              <div hraef="" class="p-home-advantage__head">
                <div class="p-home-advantage__title">
                  <h2 class="c-title" data-ja="私たちの強み"><span class="c-title--red">A</span>DVANTAGE</h2>
                </div>
                <div class="p-home-advantage__btn c-button">
                  <a href="<?php echo esc_url(home_url('/')); ?>/about#advantage">
                    <span class="c-button__pageLink en">View&nbsp;More</span>
                  </a>
                </div>
              </div>
              <div class="p-home-advantage__content">
                <div class="p-home-advantage__listWrap">
                  <ul class="p-home-advantage__list">
                    <li class="p-home-advantage__item">
                      <div class="p-home-advantage-card">
                        <h3 class="p-home-advantage-card__label">Advantage.1</h3>
                        <div class="p-home-advantage-card__desc">
                          <p class="p-home-advantage-card__lead">豊富な経験と高い技術力</p>
                          <p class="p-home-advantage-card__detail">
                            自費、インプラントに特化した技工所だからこそできる技術力で最高の技工物をご提供します。
                          </p>
                        </div>
                        <!-- <div class="p-home-advantage-card__btn c-button">
                          <span class="c-button__pageLink">制作事例</span>
                        </div> -->
                        <div class="p-home-advantage-card__img">
                          <picture>
                            <source srcset="<?php echo get_theme_file_uri('assets/images/reason_1.webp'); ?>" type="image/webp" />
                            <img src="<?php echo get_theme_file_uri('assets/images/reason_1.jpg'); ?>" alt="制作事例" />
                          </picture>
                        </div>
                      </div>
                    </li>
                    <li class="p-home-advantage__item">
                      <a href="<?php echo esc_url(home_url('/equipment/')); ?>" class="p-home-advantage-card">
                        <h3 class="p-home-advantage-card__label">Advantage.2</h3>
                        <div class="p-home-advantage-card__desc">
                          <p class="p-home-advantage-card__lead">最先端の技工を<br>可能にする設備環境</p>
                          <p class="p-home-advantage-card__detail">
                            最新のデジタル機器をいち早く導入し最先端の技工を可能にする環境を整えています。
                          </p>
                        </div>
                        <div class="p-home-advantage-card__btn c-button">
                          <span class="c-button__pageLink">設備情報</span>
                        </div>
                        <div class="p-home-advantage-card__img">
                          <picture>
                            <source srcset="<?php echo get_theme_file_uri('assets/images/reason_2.webp'); ?>" type="image/webp" />
                            <img src="<?php echo get_theme_file_uri('assets/images/reason_2.jpg'); ?>" alt="設備情報" />
                          </picture>
                        </div>
                      </a>
                    </li>
                    <li class="p-home-advantage__item">
                      <a href="<?php echo esc_url(home_url('/fis/')); ?>" class="p-home-advantage-card">
                        <h3 class="p-home-advantage-card__label">Advantage.3</h3>
                        <div class="p-home-advantage-card__desc">
                          <p class="p-home-advantage-card__lead">革新的な営業サポート</p>
                          <p class="p-home-advantage-card__detail">当ラボと併設された、歯科営業がある為歯科医院様と技工士のコミュニケーションがスムーズに行えます。</p>
                        </div>
                        <div class="p-home-advantage-card__btn c-button">
                          <span class="c-button__pageLink">営業サポート</span>
                        </div>
                        <div class="p-home-advantage-card__img">
                          <picture>
                            <source srcset="<?php echo get_theme_file_uri('assets/images/reason_3.webp'); ?>" type="image/webp" />
                            <img src="<?php echo get_theme_file_uri('assets/images/reason_3.jpg'); ?>" alt="営業サポート" />
                          </picture>
                        </div>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div><!-- p-home-advantage -->
          </div>
        </section>
        <section>
          <div class="p-home__section">
            <div class="p-home-product">
              <div class="p-home-product__main">
                <div class="p-home-product__title">
                  <h2 class="c-title" data-ja="製品情報"><span class="c-title--red">P</span>RODUCT</span></h2>
                </div>
                <div class="p-home-product__text">
                  <p>
                    インプラント年間2300本、全国高水準の自費納品率60%の技術とニーズに合ったIOSデータに対応できる最新機器の取り扱いで医院様、患者様の満足できる技工物をご提供します。
                  </p>
                </div>
                <div class="p-home-product__btn c-button">
                  <a href="<?php echo get_post_type_archive_link('product'); ?>">
                    <span class="c-button__pageLink en">View&nbsp;More</span>
                  </a>
                </div>
              </div>
              <div class="p-home-product__imge">
                <picture>
                  <source srcset="<?php echo get_theme_file_uri('assets/images/product_top.webp'); ?>" type="image/webp" />
                  <img src="<?php echo get_theme_file_uri('assets/images/product_top.jpg'); ?>" alt="制作事例" />
                </picture>
              </div>
            </div><!-- p-home-product -->
          </div>
        </section>
        <section>
          <div class="p-home__section">
            <div class="p-home-shop">
              <div class="p-home-shop__title">
                <span class="p-home-shop__title--sub">ベルデンタル公式オンラインショップ</span>
                <h2 class="p-home-shop__title--main c-title">OFFICAL&nbsp;ONLINE&nbsp;SHOP</h2>
              </div>
              <div class="p-home-shop__main">
                <div class="p-home-shop__logo">
                  <picture>
                    <source srcset="<?php echo get_theme_file_uri('assets/images/dentalbin24_logo.webp'); ?>" type="image/webp" />
                    <img src="<?php echo get_theme_file_uri('assets/images/dentalbin24_logo.jpg'); ?>" alt="デンタル便ロゴ" />
                  </picture>
                </div>
                <div class="p-home-shop__desc">
                  <p class="p-home-shop__detail">
                    注文から納品まですべてオンラインで可能な当ラボオフィシャルオンラインショップです。
                    24時間注文可能な手間、間接コストを軽減、お客様ユーザーフレンドリーな環境でスピーディーな発注が可能です。
                  </p>
                </div>
              </div>
              <div class="p-home-shop__btn c-button">
                <a href="<?php echo esc_url(home_url('/onlineshop/')); ?>" target="_blank" rel="noopener noreferrer" class="p-home-shop__link">
                  <span class="c-button__pageLink en">View&nbsp;More</span>
                </a>
              </div>
            </div><!-- p-home-shop -->
          </div>
        </section>
        <section>
          <div class="p-home__section">
            <div class="p-home-news p-news">
              <h2 class="c-title" data-ja="ニュース"><span class="c-title--red">N</span>EWS</h2>
              <div class="p-home-news__content">
                <div id="jsi-tab_area">
                  <ul class="p-news__cats">
                    <li class="u-tab_btn active">すべて</li>
                    <?php
                    $terms = get_terms('news-cat', [
                      'hide_empty' => false,
                    ]);
                    foreach ($terms as $term) {
                      echo '<li class="u-tab_btn">' . esc_html($term->name) . '</li>';
                    }
                    ?>
                  </ul>
                  <div class="p-news__main panel_area">
                    <div class="u-tab_panel active">
                      <article>
                        <div class="p-mews-article">
                          <ul class="p-mews-article__list">
                            <?php
                            $args = array(
                              'post_type' => 'news',
                              'posts_per_page' => 3,
                            );
                            $the_query = new WP_Query($args);
                            if ($the_query->have_posts()) :
                              while ($the_query->have_posts()) : $the_query->the_post();
                            ?>
                                <li class="p-mews-article__item">
                                  <a href="<?php the_permalink() ?>">
                                    <div class="p-mews-article__meta">
                                      <div class="c-post-date">
                                        <?php echo get_the_date(); ?>
                                      </div>
                                      <?php
                                      if ($terms = get_the_terms($post->ID, 'news-cat')) {
                                        echo '<ul class="p-mews-article__cat">';
                                        foreach ($terms as $term) {
                                          echo '<li class="c-post-cat">' . $term->name . '</li>';
                                        }
                                        echo '</ul>';
                                      }
                                      ?>
                                    </div>
                                    <div class="p-mews-article__text">
                                      <p>
                                        <?php
                                        if (mb_strlen($title = get_the_title()) > 40) {
                                          $title = mb_substr($title, 0, 25);
                                          echo $title . '...';
                                        } else {
                                          echo $title;
                                        }
                                        ?>
                                      </p>
                                    </div>
                                  </a>
                                </li>
                            <?php endwhile;
                            endif; ?>
                            <?php wp_reset_postdata(); ?>
                          </ul>
                        </div>
                      </article>
                    </div>
                    <?php
                    $terms = get_terms('news-cat', [
                      'hide_empty' => false,
                    ]);
                    foreach ($terms as $term) :
                    ?>
                      <div class="u-tab_panel">
                        <ul class="p-news__list">
                          <?php
                          $args = array(
                            'post_type' => 'news',
                            'posts_per_page' => 3,
                            'tax_query' => array(
                              array(
                                'taxonomy' => 'news-cat',
                                'field' => 'slug',
                                'terms' => $term->slug,
                              ),
                            ),
                          );
                          $my_posts = get_posts($args);
                          ?>
                          <?php if ($my_posts) : foreach ($my_posts as $post) : setup_postdata($post); ?>
                              <li class="p-mews-article__item">
                                <a href="<?php the_permalink() ?>">
                                  <div class="p-mews-article__meta">
                                    <div class="c-post-date">
                                      <?php echo get_the_date(); ?>
                                    </div>
                                    <?php
                                    if ($terms = get_the_terms($post->ID, 'news-cat')) {
                                      echo '<ul class="p-mews-article__cat">';
                                      foreach ($terms as $term) {
                                        echo '<li class="c-post-cat">' . $term->name . '</li>';
                                      }
                                      echo '</ul>';
                                    }
                                    ?>
                                  </div>
                                  <div class="p-mews-article__text">
                                    <p class="postttl">
                                      <?php
                                      if (mb_strlen($title = get_the_title()) > 40) {
                                        $title = mb_substr($title, 0, 25);
                                        echo $title . '...';
                                      } else {
                                        echo $title;
                                      }
                                      ?>
                                    </p>
                                  </div>
                                </a>
                              </li>
                            <?php
                            endforeach;
                            ?>
                          <?php else :
                          ?>
                            <li>
                              <p>記事はまだありません。</p>
                            </li>
                          <?php endif;
                          wp_reset_postdata();
                          ?>
                        </ul>
                      </div>
                    <?php
                    endforeach;
                    ?>
                  </div>
                </div>
                <div class="p-home-news__btn">
                  <div class="c-button">
                    <a href="<?php echo esc_url(get_post_type_archive_link('news')); ?>">
                      <span class="c-button__pageLink en">View&nbsp;More</span>
                    </a>
                  </div>
                </div>
              </div>
            </div><!-- p-home-news -->
          </div>
        </section>
        <section>
          <div class="p-home__section">
            <div class="p-home-recruit">
              <div class="p-home-recruit__container">
                <div class="p-home-recruit__main">
                  <div class="p-home-recruit__title">
                    <h2 class="c-title c-title--black" data-ja="採用情報">
                      RECRUIT
                    </h2>
                  </div>
                  <div class="p-home-recruit__desc">
                    <p>
                      歯科技工はカッコイイ職業と言われたい。
                    </p>
                    <p>
                      社会で、匠、職人、と呼ばれた方々も技術の裏付けとマーケティング、プレゼン、セールスのスキルが必要になっている。マーケットを分析、求められる技術と知識構築しセールス出来ることが歯科技工業界でも求められています。
                    </p>
                    <p>
                      歯科技工職であっても。営業職であっても。事務職であっても。ビジネスパーソンとして、社会に認められるようになってほしい。
                    </p>
                    <p>
                      ベルデンタルラボラトリーは、一緒に働く歯科技工士を募集しています。
                    </p>
                  </div>
                  <div class="p-home-recruit__btn c-button">
                    <a href="<?php echo esc_url(home_url('/recruit/')); ?>" class="p-home-recruit__link">
                      <span class="c-button__pageLink c-button__pageLink--blakc en">View&nbsp;More</span>
                    </a>
                  </div>
                </div>
                <div class="p-home-recruit__images">
                  <div class="p-home-recruit__image-01">
                    <picture>
                      <source srcset="<?php echo get_theme_file_uri('assets/images/home_recruit-01.webp'); ?>" type="image/webp" />
                      <img src="<?php echo get_theme_file_uri('assets/images/home_recruit-01.jpg'); ?>" alt="デンタル便ロゴ" />
                    </picture>
                  </div>
                  <div class="p-home-recruit__image-02">
                    <picture>
                      <source srcset="<?php echo get_theme_file_uri('assets/images/home_recruit-02.webp'); ?>" type="image/webp" />
                      <img src="<?php echo get_theme_file_uri('assets/images/home_recruit-02.jpg'); ?>" alt="デンタル便ロゴ" />
                    </picture>
                  </div>
                  <div class="p-home-recruit__image-03">
                    <picture>
                      <source srcset="<?php echo get_theme_file_uri('assets/images/home_recruit-03.webp'); ?>" type="image/webp" />
                      <img src="<?php echo get_theme_file_uri('assets/images/home_recruit-03.jpg'); ?>" alt="デンタル便ロゴ" />
                    </picture>
                  </div>
                  <div class="p-home-recruit__image-04">
                    <picture>
                      <source srcset="<?php echo get_theme_file_uri('assets/images/home_recruit-04.webp'); ?>" type="image/webp" />
                      <img src="<?php echo get_theme_file_uri('assets/images/home_recruit-04.jpg'); ?>" alt="デンタル便ロゴ" />
                    </picture>
                  </div>
                </div>
              </div>
            </div><!-- p-home-recruit -->
          </div>
        </section>
      </div>
    </div><!-- p-home__container -->
  </div><!-- p-home -->
</main><!-- l-wrap -->
<?php get_template_part('template-parts/footer-top'); ?>
<?php get_footer(); ?>