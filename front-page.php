<?php get_header(); ?>
<main id="main" class="l-wrap">
  <div class="p-home">
    <div class="p-home-top">
      <div class="p-home-top__container" style="background-image: url('<?php echo esc_url(get_theme_file_uri('assets/images/home_fv-01.webp')); ?>');">
        <div class="p-home-top__catch">
          <h1 class="p-home-top__copy">患者様のケースを<br class="u-br-sp">担当させていただく<br>わたくしたち第一の目標は<br>満足と喜びそして笑顔です</h1>
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
              <div class="p-home-about__imge">
                  <div>
                    <picture>
                      <source srcset="<?php echo get_theme_file_uri('assets/images/home_about-01.webp'); ?>" type="image/webp" />
                      <img src="<?php echo get_theme_file_uri('assets/images/home_about-01.jpg'); ?>" alt="営業サポート" />
                    </picture>
                  </div>
              </div>
            </div>
          </div><!-- p-home-about -->
          <div class="p-home-advantage__content">
                <div class="p-home-advantage__listWrap">
                  <ul class="p-home-advantage__list">
                    <li class="p-home-advantage__item">
                      <div class="p-home-advantage-card">
                        <div class="p-home-advantage-card__title">
                          <h3 class="p-home-advantage-card__label">OUR&nbsp;TEAMS</h3>
                          <p class="p-home-advantage-card__lead">私たちのチーム</p>
                        </div>
                        <div class="p-home-advantage-card__desc">
                          <p class="p-home-advantage-card__detail">
                          自費、インプラントに特化した技工所だからこそできる技術力で最高の技工物をご提供します。
                          </p>
                        </div>
                        <div class="p-home-advantage-card__btn c-button">
                          <span class="c-button__pageLink en">View&nbsp;More</span>
                        </div>
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
                        <div class="p-home-advantage-card__title">
                          <h3 class="p-home-advantage-card__label">ENVIRONMENT</h3>
                          <p class="p-home-advantage-card__lead">品質を支える職場環境</p>
                        </div>
                        <div class="p-home-advantage-card__desc">
                          <p class="p-home-advantage-card__detail">
                            最新のデジタル機器をいち早く導入し最先端の技工を可能にする環境を整えています。
                          </p>
                        </div>
                        <div class="p-home-advantage-card__btn c-button">
                          <span class="c-button__pageLink en">View&nbsp;More</span>
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
                        <div class="p-home-advantage-card__title">
                          <h3 class="p-home-advantage-card__label">HISTORY</h3>
                          <p class="p-home-advantage-card__lead">私たちの歴史</p>
                        </div>
                        <div class="p-home-advantage-card__desc">
                          <p class="p-home-advantage-card__detail">当ラボと併設された、歯科営業がある為歯科医院様と技工士のコミュニケーションがスムーズに行えます。</p>
                        </div>
                        <div class="p-home-advantage-card__btn c-button">
                          <span class="c-button__pageLink en">View&nbsp;More</span>
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
      </div>
    </div><!-- p-home__container -->
  </div><!-- p-home -->
</main><!-- l-wrap -->
<?php get_template_part('template-parts/footer-top'); ?>
<?php get_footer(); ?>