<?php get_header(); ?>
<main id="main" class="l-wrap">
  <div class="p-home">
    <div class="p-home-top">
      <div class="p-home-top__container" style="background-image: url('<?php echo esc_url(get_theme_file_uri('assets/images/home_fv-01.webp')); ?>');">
        <div class="p-home-top__catch">
          <p class="p-home-top__copy">患者様のケースを<br class="u-br-sp">担当させていただく<br>わたくしたち第一の目標は<br>満足と喜びそして笑顔です</p>
          <p class="p-home-top__lead">歯科業界の職人として高性能のデジタル技工に、技工士の技術を乗せて、完全と言えるまで再現した妥協なき技工物を全国の歯科医院様にご提供します。</p>
        </div>
        <div class="p-home-top__notice">
          <div class="p-home-top__notice-title">Notice</div>
          <div class="p-home-top__notice-swiper swiper" id="js-swiper-home-notice">
          <ul class="p-home-top__notice-list swiper-wrapper">
            <?php
            $args = array(
              'post_type'      => 'post',     // 通常投稿
              'posts_per_page' => 3,
              'category_name'  => 'notice',   // カテゴリスラッグ
              'post_status'    => 'publish',
            );

            $my_query = new WP_Query($args);
            ?>
            
            <?php if ($my_query->have_posts()) : ?>
              <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
                <li class="p-home-top__notice-item swiper-slide">
                  <a href="<?php the_permalink(); ?>">
                    <div>
                      <div class="c-post-date">
                        <?php echo get_the_date(); ?>
                      </div>
                    </div>
                    <div>
                      <p class="postttl">
                        <?php
                        $title = get_the_title();
                        if (mb_strlen($title) > 10) {
                          echo mb_substr($title, 0, 10) . '...';
                        } else {
                          echo $title;
                        }
                        ?>
                      </p>
                    </div>
                  </a>
                </li>
              <?php endwhile; ?>
            <?php else : ?>
              <li>
                <p>記事はまだありません。</p>
              </li>
            <?php endif; ?>

            <?php wp_reset_postdata(); ?>
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
                  <div class="c-title">
                    <span class="c-title__en">
                      <span class="c-title--red">A</span>BOUT&nbsp;US
                    </span>
                    <h2 class="c-title__ja">私たちについて</h2>
                  </div>
                </div>
                <div class="p-home-about__content">
                  <p class="c-lead">お得意様からの信頼に<br>知識と技術で応えします。</p>
                  <div class="p-home-about__detail">
                    <p>
                      私たちはオーナー会社というだけでなく社員は家族もビジョンとしている会社です。W65.（BDLとFIS）ファミリーの一員に加わり、歯科技工士として営業、マーケティングとして、素晴らしいキャリアを築くチャンスを見つけましょう。
                    </p>
                    <p>
                      単なる家族経営の企業ではなく、社員間コミュニケーションの良い会社です。当社W65.（BDLとFIS）では、多様なバックグラウンドを持つ才能ある方々に、やりがいのある歯科技工業のキャリアを提供しています。競争力のある給与、充実した福利厚生、そしてキャリアアップをサポートする研修機会で人生を楽しみましょう。
                    </p>
                    <p>
                    社内、ラウンジ、テラスなど、ワークライフバランスへの取り組みも充実しており、仕事と仲間との絆を育むことができます。
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
                      <a href="<?php echo esc_url(home_url('/about#teams')); ?>">
                        <div class="p-home-advantage-card">
                          <div class="p-home-advantage-card__title">
                            <p class="p-home-advantage-card__label">OUR&nbsp;TEAMS</p>
                            <h3 class="p-home-advantage-card__lead">私たちのチーム</h3>
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
                      </a>
                    </li>
                    <li class="p-home-advantage__item">
                      <a href="<?php echo esc_url(home_url('/about#environment')); ?>" class="p-home-advantage-card">
                        <div class="p-home-advantage-card__title">
                          <p class="p-home-advantage-card__label">ENVIRONMENT</p>
                          <h3 class="p-home-advantage-card__lead">品質を支える職場環境</h3>
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
                      <a href="<?php echo esc_url(home_url('/about#history')); ?>" class="p-home-advantage-card">
                        <div class="p-home-advantage-card__title">
                          <p class="p-home-advantage-card__label">HISTORY</p>
                          <h3 class="p-home-advantage-card__lead">私たちの歴史</h3>
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
                  <div class="c-title">
                    <span class="c-title__en">
                      <span class="c-title--red">P</span>RODUCT
                    </span>
                    <h2 class="c-title__ja">製品情報</h2>
                  </div>
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
                <h2 class="p-home-shop__title--sub">ベルデンタル公式オンラインショップ</h2>
                <p class="p-home-shop__title--main c-title">OFFICAL&nbsp;ONLINE&nbsp;SHOP</p>
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
              <div class="c-title">
                <span class="c-title__en">
                  <span class="c-title--red">N</span>EWS
                </span>
                <h2 class="c-title__ja">ニュース</h2>
              </div>
              <div class="p-home-news__content">
                <div id="jsi-tab_area">
                  <ul class="p-news__cats">
                    <li class="u-tab_btn active">すべて</li>
                    <?php
                    $terms = get_terms([
                      'taxonomy'   => 'category',
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
                              'post_type'      => 'post',
                              'posts_per_page' => 3,
                              'post_status'    => 'publish',
                            );
                            $the_query = new WP_Query($args);

                            if ($the_query->have_posts()) :
                              while ($the_query->have_posts()) : $the_query->the_post();
                            ?>
                                <li class="p-mews-article__item">
                                  <a href="<?php the_permalink(); ?>">
                                    <div class="p-mews-article__meta">
                                      <div class="c-post-date">
                                        <?php echo get_the_date(); ?>
                                      </div>
                                      <?php
                                      $post_terms = get_the_terms(get_the_ID(), 'category');
                                      if ($post_terms && !is_wp_error($post_terms)) {
                                        echo '<ul class="p-mews-article__cat">';
                                        foreach ($post_terms as $term) {
                                          echo '<li class="c-post-cat">' . esc_html($term->name) . '</li>';
                                        }
                                        echo '</ul>';
                                      }
                                      ?>
                                    </div>
                                    <div class="p-mews-article__text">
                                      <p>
                                        <?php
                                        $title = get_the_title();
                                        if (mb_strlen($title) > 40) {
                                          echo esc_html(mb_substr($title, 0, 25)) . '...';
                                        } else {
                                          echo esc_html($title);
                                        }
                                        ?>
                                      </p>
                                    </div>
                                  </a>
                                </li>
                            <?php
                              endwhile;
                            endif;
                            wp_reset_postdata();
                            ?>
                          </ul>
                        </div>
                      </article>
                    </div>

                    <?php
                    $terms = get_terms([
                      'taxonomy'   => 'category',
                      'hide_empty' => false,
                    ]);

                    foreach ($terms as $term) :
                    ?>
                      <div class="u-tab_panel">
                        <ul class="p-news__list">
                          <?php
                          $args = array(
                            'post_type'      => 'post',
                            'posts_per_page' => 3,
                            'post_status'    => 'publish',
                            'category_name'  => $term->slug,
                          );
                          $my_posts = get_posts($args);
                          ?>

                          <?php if ($my_posts) : ?>
                            <?php foreach ($my_posts as $post) : setup_postdata($post); ?>
                              <li class="p-mews-article__item">
                                <a href="<?php the_permalink(); ?>">
                                  <div class="p-mews-article__meta">
                                    <div class="c-post-date">
                                      <?php echo get_the_date(); ?>
                                    </div>
                                    <?php
                                    $post_terms = get_the_terms(get_the_ID(), 'category');
                                    if ($post_terms && !is_wp_error($post_terms)) {
                                      echo '<ul class="p-mews-article__cat">';
                                      foreach ($post_terms as $cat_term) {
                                        echo '<li class="c-post-cat">' . esc_html($cat_term->name) . '</li>';
                                      }
                                      echo '</ul>';
                                    }
                                    ?>
                                  </div>
                                  <div class="p-mews-article__text">
                                    <p class="postttl">
                                      <?php
                                      $title = get_the_title();
                                      if (mb_strlen($title) > 40) {
                                        echo esc_html(mb_substr($title, 0, 25)) . '...';
                                      } else {
                                        echo esc_html($title);
                                      }
                                      ?>
                                    </p>
                                  </div>
                                </a>
                              </li>
                            <?php endforeach; ?>
                          <?php else : ?>
                            <li>
                              <p>記事はまだありません。</p>
                            </li>
                          <?php endif; wp_reset_postdata(); ?>
                        </ul>
                      </div>
                    <?php endforeach; ?>
                  </div>
                </div>

                <div class="p-home-news__btn">
                  <div class="c-button">
                    <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>">
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