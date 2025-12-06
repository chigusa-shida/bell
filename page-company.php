<?php
/*
Template Name: 会社概要
*/
get_header();
?>
<main>
  <div id="js-main">
    <div class="l-main">
      <div class="p-company">
        <section>
          <div class="p-heading">
            <div class="p-heading__heading">
              <h2 class="c-title" data-ja="会社概要"><span class="c-title--red">C</span>OMPANY</h2>
            </div>
            <div class="p-heading__content col">
              <div class="p-heading__img">
                <picture>
                  <source srcset="<?php echo get_theme_file_uri('assets/images/company_top.webp'); ?>" type="image/webp" />
                  <img src="<?php echo get_theme_file_uri('assets/images/company_top.jpg'); ?>" alt="制作事例" />
                </picture>
              </div>
            </div>
          </div>
        </section>
        <div class="p-page-button">
          <ul class="p-page-button__list">
            <!-- <li class="p-page-button__list--item">
              <div class="c-button">
                <a href="#message">
                  <span class="c-button__anchorLink">メッセージ</span>
                </a>
              </div>
            </li> -->
            <!-- <li class="p-page-button__list--item">
              <div class="c-button">
                <a href="#vision">
                  <span class="c-button__anchorLink">経営ビジョン</span>
                </a>
              </div>
            </li> -->
            <li class="p-page-button__list--item">
              <div class="c-button">
                <a href="#outline">
                  <span class="c-button__anchorLink">会社概要</span>
                </a>
              </div>
            </li>
            <li class="p-page-button__list--item">
              <div class="c-button">
                <a href="#history">
                  <span class="c-button__anchorLink">沿革</span>
                </a>
              </div>
            </li>
            <li class="p-page-button__list--item">
              <div class="c-button">
                <a href="#office">
                  <span class="c-button__anchorLink">オフィス紹介</span>
                </a>
              </div>
            </li>
            <li class="p-page-button__list--item">
              <div class="c-button">
                <a href="#access">
                  <span class="c-button__anchorLink">アクセス</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
        <!-- <section>
          <div class="p-page-section">
            <div class="p-company-message" id="message">
              <div class="p-company-message__title">
                <h2 class="c-title" data-ja="メッセージ"><span class="c-title--red">Message</span></h2>
              </div>
              <div class="p-company-message__text">
                メッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージ
              </div>
            </div>
          </div>
        </section> -->
        <!-- <section>
          <div class="p-page-section">
            <div class="p-company-vision" id="vision">
              <div class="p-company-vision__title">
                <h2 class="c-title c-title--black" data-ja="ビジョン">Vision</h2>
              </div>
              <div class="p-company-vision__text">
                メッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージ
              </div>
            </div>
          </div>
        </section> -->
        <section>
          <div class="p-page-section">
            <div class="p-company-outline" id="outline">
              <div class="p-company-outline__title">
                <h2 class="c-title" data-ja="会社概要"><span class="c-title--red">Outline</span></h2>
              </div>
              <div class="p-page-section__content">
                <?php the_content(); ?>
              </div>
            </div>
          </div>
        </section>
        <section>
          <div class="p-page-section">
            <div class="p-company-history" id="history">
              <div class="p-company-history__title">
                <h2 class="c-title" data-ja="沿 革"><span class="c-title--red">History</span></h2>
              </div>
              <div class="p-page-section__content">
                <div class="p-company-history__list">
                  <dl class="p-company-history__item">
                    <dt><span>1981</span>年</dt>
                    <dd>東京大森に移転/イタリア製技工デスクユニット「デンタルアート」を輸入し設置</dd>
                  </dl>
                  <dl class="p-company-history__item">
                    <dt><span>1984</span>年</dt>
                    <dd>神奈川県川崎市に移転「ベルデンタルラボラトリー株式会社」設立</dd>
                  </dl>
                  <dl class="p-company-history__item">
                    <dt><span>1987</span>年</dt>
                    <dd>東京大森に移転/イタリア製技工デスクユニット「デンタルアート」を輸入し設置</dd>
                  </dl>
                  <dl class="p-company-history__item">
                    <dt><span>1994</span>年</dt>
                    <dd>東京蒲田に移転</dd>
                  </dl>
                  <dl class="p-company-history__item">
                    <dt><span>2003</span>年</dt>
                    <dd>営業所を分社化し「有限会社エフイス」設立/プロセラシステム(ノーベルバイオケア社)導</dd>
                  </dl>
                  <dl class="p-company-history__item">
                    <dt><span>2012</span>年</dt>
                    <dd>本社ビルの大規模改築により機能を充実化/CADCAM機器の設置を開始</dd>
                  </dl>
                  <dl class="p-company-history__item">
                    <dt><span>2023</span>年</dt>
                    <dd>東京西六郷に新社屋を竣工し移転</dd>
                  </dl>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section>
          <div class="p-page-section">
            <div class="p-company-office" id="office">
              <div class="p-company-office__title">
                <h2 class="c-title" data-ja="オフィス紹介"><span class="c-title--red">Office</span></h2>
              </div>
              <div class="p-page-section__content">
                <div class="p-company-office__imgSlide" id="js-company-office-img">
                  <div class="swiper swiper-main">
                    <div class="swiper-wrapper">
                      <div class="swiper-slide">
                        <div class="slide-img">
                          <picture>
                            <source srcset="<?php echo get_theme_file_uri('assets/images/company_office-01.webp'); ?>" type="image/webp" />
                            <img src="<?php echo get_theme_file_uri('assets/images/company_office-01.jpg'); ?>" alt="営業サポート" />
                          </picture>
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="slide-img">
                          <picture>
                            <source srcset="<?php echo get_theme_file_uri('assets/images/company_office-02.webp'); ?>" type="image/webp" />
                            <img src="<?php echo get_theme_file_uri('assets/images/company_office-02.jpg'); ?>" alt="営業サポート" />
                          </picture>
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="slide-img">
                          <picture>
                            <source srcset="<?php echo get_theme_file_uri('assets/images/company_office-03.webp'); ?>" type="image/webp" />
                            <img src="<?php echo get_theme_file_uri('assets/images/company_office-03.jpg'); ?>" alt="営業サポート" />
                          </picture>
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="slide-img">
                          <picture>
                            <source srcset="<?php echo get_theme_file_uri('assets/images/company_office-04.webp'); ?>" type="image/webp" />
                            <img src="<?php echo get_theme_file_uri('assets/images/company_office-04.jpg'); ?>" alt="営業サポート" />
                          </picture>
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="slide-img">
                          <picture>
                            <source srcset="<?php echo get_theme_file_uri('assets/images/company_office-05.webp'); ?>" type="image/webp" />
                            <img src="<?php echo get_theme_file_uri('assets/images/company_office-05.jpg'); ?>" alt="営業サポート" />
                          </picture>
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="slide-img">
                          <picture>
                            <source srcset="<?php echo get_theme_file_uri('assets/images/company_office-06.webp'); ?>" type="image/webp" />
                            <img src="<?php echo get_theme_file_uri('assets/images/company_office-06.jpg'); ?>" alt="営業サポート" />
                          </picture>
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="slide-img">
                          <picture>
                            <source srcset="<?php echo get_theme_file_uri('assets/images/company_office-07.webp'); ?>" type="image/webp" />
                            <img src="<?php echo get_theme_file_uri('assets/images/company_office-07.jpg'); ?>" alt="営業サポート" />
                          </picture>
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="slide-img">
                          <picture>
                            <source srcset="<?php echo get_theme_file_uri('assets/images/company_office-08.webp'); ?>" type="image/webp" />
                            <img src="<?php echo get_theme_file_uri('assets/images/company_office-08.jpg'); ?>" alt="営業サポート" />
                          </picture>
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="slide-img">
                          <picture>
                            <source srcset="<?php echo get_theme_file_uri('assets/images/company_office-09.webp'); ?>" type="image/webp" />
                            <img src="<?php echo get_theme_file_uri('assets/images/company_office-09.jpg'); ?>" alt="営業サポート" />
                          </picture>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section>
          <div class="p-page-section">
            <div class="p-company-access" id="access">
              <div class="p-company-access__title">
                <h2 class="c-title" data-ja="アクセス"><span class="c-title--red">Access</span></h2>
              </div>
              <div class="p-page-section__content">
                <div class="p-company-access__map">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1623.0889790780602!2d139.7089881109107!3d35.549306913218345!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6018608b71e96e37%3A0xe5b58b15c9a06cb!2z44CSMTQ0LTAwNTYg5p2x5Lqs6YO95aSn55Sw5Yy66KW_5YWt6YO377yS5LiB55uu77yU77yU4oiS77yW!5e0!3m2!1sja!2sjp!4v1716874197707!5m2!1sja!2sjp" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                  </iframe>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
</main>
<?php get_template_part('template-parts/footer-top'); ?>
<?php get_footer(); ?>