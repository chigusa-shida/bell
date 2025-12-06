<?php
/*
Template Name: 採用情報
*/
get_header();
?>
<main>
  <div class="l-main" id="js-main">
    <div class="p-recruit">
      <div class="p-heading">
        <div class="p-heading__title">
          <h2 class="c-title" data-ja="採用情報"><span class="c-title--red">R</span>ECRUIT</h2>
        </div>
      </div>
      <section>
        <div class="p-recruit-message">
          <div class="p-recruit-message__text">
            <h2 class="c-title" data-ja="メッセージ"><span class="c-title--red">Message</span></h2>
            <div class="p-recruit-message__detail">
              <p>かつて「匠」や「職人」と呼ばれた人々にも、今や技術力だけでなく、マーケティング・プレゼンテーション・セールスといったビジネススキルが求められる時代になりました。市場を分析し、ニーズに応じた技術と知識を構築し、価値を“伝え、届ける力”が、歯科技工業界においても必要とされています。それは歯科技工士であっても、営業職であっても、事務職であっても同じです。</p>
              <p>どの職種であっても「ビジネスパーソン」として、社会に信頼され、認められる存在になってほしいと私たちは考えています。ベルデンタルラボラトリーでは、そんな想いを共有し、ともに成長していける仲間を募集しています。</p>
            </div>
          </div>
          <div class="p-recruit-message__img">
            <div class="p-recruit-message__images">
              <div class="p-recruit-message__image-01">
                <picture>
                  <source srcset="<?php echo get_theme_file_uri('assets/images/home_recruit-01.webp'); ?>" type="image/webp" />
                  <img src="<?php echo get_theme_file_uri('assets/images/home_recruit-01.jpg'); ?>" alt="採用情報イメージ画像" />
                </picture>
              </div>
              <div class="p-recruit-message__image-02">
                <picture>
                  <source srcset="<?php echo get_theme_file_uri('assets/images/home_recruit-02.webp'); ?>" type="image/webp" />
                  <img src="<?php echo get_theme_file_uri('assets/images/home_recruit-02.jpg'); ?>" alt="採用情報イメージ画像" />
                </picture>
              </div>
              <div class="p-recruit-message__image-03">
                <picture>
                  <source srcset="<?php echo get_theme_file_uri('assets/images/home_recruit-03.webp'); ?>" type="image/webp" />
                  <img src="<?php echo get_theme_file_uri('assets/images/home_recruit-03.jpg'); ?>" alt="採用情報イメージ画像" />
                </picture>
              </div>
              <div class="p-recruit-message__image-04">
                <picture>
                  <source srcset="<?php echo get_theme_file_uri('assets/images/home_recruit-04.webp'); ?>" type="image/webp" />
                  <img src="<?php echo get_theme_file_uri('assets/images/home_recruit-04.jpg'); ?>" alt="採用情報イメージ画像" />
                </picture>
              </div>
            </div>
          </div>
        </div>
      </section>
      <div class="p-page-button">
        <ul class="p-page-button__list">
          <li class="p-page-button__list--item">
            <div class="c-button">
              <a href="#thought">
                <span class="c-button__anchorLink">歯科技工所とは</span>
              </a>
            </div>
          </li>
          <li class="p-page-button__list--item">
            <div class="c-button">
              <a href="#position">
                <span class="c-button__anchorLink">募集職種</span>
              </a>
            </div>
          </li>
          <li class="p-page-button__list--item">
            <div class="c-button">
              <a href="#numbers">
                <span class="c-button__anchorLink">数字で見る</span>
              </a>
            </div>
          </li>
          <li class="p-page-button__list--item">
            <div class="c-button">
              <a href="#personality">
                <span class="c-button__anchorLink">求める人材</span>
              </a>
            </div>
          </li>
          <li class="p-page-button__list--item">
            <div class="c-button">
              <a href="#benefits">
                <span class="c-button__anchorLink">働く魅力</span>
              </a>
            </div>
          </li>
          <!-- <li class="p-page-button__list--item">
            <div class="c-button">
              <a href="#access">
                <span class="c-button__anchorLink">働く環境</span>
              </a>
            </div>
          </li> -->
          <li class="p-page-button__list--item">
            <div class="c-button">
              <a href="<?php echo esc_url(home_url('/entry/')); ?>">
                <span class="c-button__entryLink">エントリー</span>
              </a>
            </div>
          </li>
        </ul>
      </div>
      <section>
        <div class="p-page-section" id="thought">
          <div class="p-recruit-thought">
            <p class="p-recruit-thought__lead c-lead">私たちの考える歯科技工所</p>
            <div class="p-recruit-thought__detail">
              歯科技工士がその知識と技術を発揮するには、お得意様より受注する模型、現在では口腔内や模型のデータが無ければなりません。お得意様からの信頼に知識と技術で応える歯科技工職。それを伝えお届けする営業職。お得意様、歯科技工職、営業職をスムースに繋ぐ事務職。歯科技工所は、歯科技工職、営業職、事務職、が必要です。
            </div>
          </div>
        </div>
      </section>
      <section>
        <div class="p-page-section" id="position">
          <div class="p-recruit-position">
            <div class="p-position__title">
              <h2 class="c-title" data-ja="募集職種"><span class="c-title--red">Position</span></h2>
            </div>
            <div class="p-page-section__content">
              <ul class="p-recruit-position__list">
                <a href="<?php echo esc_url(home_url('/recruitment/#technician')); ?>">
                  <li class="p-recruit-position__card">
                    <h3 class="p-recruit-position__title">技工士</h3>
                    <p class="p-recruit-position__text">様々な歯科補綴物を製作することができます。機能的かつ美しい治療を提供する役割を担っています。</p>
                    <div class="p-recruit-position__button">
                      <span class="">募集要項</span>
                    </div>
                  </li>
                </a>
                <a href="<?php echo esc_url(home_url('/recruitment/#sales')); ?>">
                  <li class="p-recruit-position__card">
                    <h3 class="p-recruit-position__title">営業職</h3>
                    <p class="p-recruit-position__text">製品の特徴や利点を理解し得意先のニーズに合わせた提案をしていただきます。</p>
                    <div class="p-recruit-position__button">
                      <span class="">募集要項</span>
                    </div>
                  </li>
                </a>
                <a href="<?php echo esc_url(home_url('/recruitment/#clerical')); ?>">
                  <li class="p-recruit-position__card">
                    <h3 class="p-recruit-position__title">事務職</h3>
                    <p class="p-recruit-position__text">営業の全面的なバックアップをしていただきます。PCを利用しデータを入力したり、電話対応をしていただきます。</p>
                    <div class="p-recruit-position__button">
                      <span class="">募集要項</span>
                    </div>
                  </li>
                </a>
              </ul>
            </div>
          </div>
      </section>
      <section>
        <div class="p-page-section" id="numbers">
          <div class="p-recruit-numbers">
            <div class="p-recruit-numbers__title">
              <h2 class="c-title" data-ja="数字で見るベルデンタル"><span class="c-title--red">Numbers</span></h2>
            </div>
            <div class="p-recruit-numbers__content">
              <ul class="p-recruit-numbers__list">
                <li class="p-recruit-numbers__item">
                  <h3 class="p-recruit-numbers__title">
                    創設
                  </h3>
                  <p class="p-recruit-numbers__value">
                    <span>1981</span>年
                  </p>
                </li>
                <li class="p-recruit-numbers__item">
                  <h3 class="p-recruit-numbers__title">
                    従業員数
                  </h3>
                  <p class="p-recruit-numbers__value">
                    <span>75</span>人
                  </p>
                </li>
                <li class="p-recruit-numbers__item">
                  <h3 class="p-recruit-numbers__title">
                    男女比
                  </h3>
                  <p class="p-recruit-numbers__value">
                    <span>7：3</span>
                  </p>
                </li>
                <li class="p-recruit-numbers__item">
                  <h3 class="p-recruit-numbers__title">
                    年間休日
                  </h3>
                  <p class="p-recruit-numbers__value">
                    <span>113</span>日
                  </p>
                </li>
                <li class="p-recruit-numbers__item">
                  <h3 class="p-recruit-numbers__title">
                    有給休暇取得率
                  </h3>
                  <p class="p-recruit-numbers__value">
                    <span>100</span>％
                  </p>
                </li>
                <li class="p-recruit-numbers__item">
                  <h3 class="p-recruit-numbers__title">
                    住宅手当
                  </h3>
                  <p class="p-recruit-numbers__value">
                    <span>25</span>％
                  </p>
                </li>
              </ul>
            </div>
          </div>
      </section>
      <section>
        <div class="p-page-section" id="personality">
          <div class="p-recruit-personality">
            <div class="p-recruit-personality__textBox">
              <div class="p-recruit-personality__title">
                <h2 class="c-title" data-ja="求める人物像"><span class="c-title--red">Personality</span></h2>
              </div>
              <div class="p-recruit-personality__images sp">
                <div class="p-recruit-personality__circle">
                  チームで<br>働く力
                </div>
                <div class="p-recruit-personality__circle">
                  チャレンジ<br>精神
                </div>
                <div class="p-recruit-personality__circle">
                  やる気
                </div>
              </div>
              <p class="p-recruit-personality__text">
                ベルデンタルでは何よりもチームワークを大切にしています。<br>同じ方向を見て働ける上司や先輩と、信頼関係を築きながら仕事ができる。<br>そんな環境だからこそ、自分の力を存分に発揮できると考えています。>もちろん、入社された方にいきなり成果を求めることはありません。会社には、あなたが成長できるように経験を積ませ、育てる責任があります。だからこそ大切なのは、相性とコミュニケーション。良いチームには、上司や先輩の「聴く姿勢」と、あなたの「伝える力」が欠かせません。一人では届かない場所も、チームならきっとたどり着ける。そんな職場を、私たちは一緒に築いていきたいと思っています。
              </p>
            </div>
            <div class="p-recruit-personality__images pc">
              <div class="p-recruit-personality__circle">
                チームで<br>働く力
              </div>
              <div class="p-recruit-personality__circle">
                チャレンジ<br>精神
              </div>
              <div class="p-recruit-personality__circle">
                やる気
              </div>
            </div>
          </div>
      </section>
      <section>
        <div class="p-page-section" id="benefits">
          <div class="p-recruit-benefits">
            <div class="p-recruit-benefits__title">
              <h2 class="c-title" data-ja="働く魅力"><span class="c-title--red">Benefits</span></h2>
            </div>
            <div class="p-page-section__content">
              <ul class="p-recruit-benefits__list">
                <li class="p-recruit-benefits__card">
                  <div class="p-recruit-benefits__main">
                    <div class="p-recruit-benefits__text">
                      <p class="p-recruit-benefits__lead c-lead">一人一人の考えを尊重。末長く働ける職場環境</p>
                      <div class="p-recruit-benefits__detail">
                        ベルデンタルラボラトリーの社員のほとんどは、学校を卒業後、新卒で入社してからそのまま働き続けてきた人たちです。離職率が高いといわれるこの業界において、これだけ勤続年数の長い社員が多いのは、一人一人の考えを尊重しながら時代に合わせて経営方針を見直してきたから。昨今は残業を減らすべく、チームによる業務量の偏りをなくすことが課題。日々の業務量を把握して全員が一緒に退社できるよう、毎日の朝会で各班のリーダーがその日に進めるべき案件を共有し、必要に応じて人員を振り分けます。
                      </div>
                    </div>
                  </div>
                  <div class="p-recruit-benefits__img">
                    <picture>
                      <source srcset="<?php echo get_theme_file_uri('assets/images/home_recruit-02.webp'); ?>" type="image/webp" />
                      <img src="<?php echo get_theme_file_uri('assets/images/home_recruit-02.jpg'); ?>" alt="" />
                    </picture>
                  </div>
                </li>
                <li class="p-recruit-benefits__card reverse">
                  <div class="p-recruit-benefits__main">
                    <div class="p-recruit-benefits__text">
                      <p class="p-recruit-benefits__lead c-lead">ベテラン層の知識を受け継ぎ<br>次代を担う人材へ</p>
                      <div class="p-recruit-benefits__detail">
                        当社は、ベテラン層の活躍に支えられながら、着実に成長を続けています。しかし、次代を見据えた人材育成も今後の成長に欠かせません。私たちは、セミナー参加や研修など、あなたの成長を全力でサポートします。会社として、あなたが一歩一歩成長できる環境を提供し、共に未来を築いていきたいと考えています。
                      </div>
                    </div>
                  </div>
                  <div class="p-recruit-benefits__img">
                    <picture>
                      <source srcset="<?php echo get_theme_file_uri('assets/images/home_recruit-02.webp'); ?>" type="image/webp" />
                      <img src="<?php echo get_theme_file_uri('assets/images/home_recruit-02.jpg'); ?>" alt="" />
                    </picture>
                  </div>
                </li>
              </ul>
            </div>
          </div>
      </section>
    </div>
  </div>
</main>
<?php get_template_part('template-parts/footer-top-recruit'); ?>
<?php get_footer(); ?>