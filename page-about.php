<?php /* Template Name: 私たちについて */ get_header(); ?>
<main>
  <div id="js-main">
    <div class="p-page__heading" style="background-image:url('<?php echo esc_url(get_theme_file_uri('assets/images/about_fv.webp')); ?>')">
      <div class="p-heading__title">
        <div class="c-title">
          <span class="c-title__en">
            <span class="c-title--red">A</span>BOUT&nbsp;US
          </span>
          <h1 class="c-title__ja">私たちについて</h1>
        </div>
      </div>
    </div>
    <div class="l-about-over">
      <div class="l-main">
        <div class="p-about">
          <section>
            <div class="p-about-top">
              <div class="p-heading">
                <div class="p-heading__content">
                  <div class="p-heading__text">
                    <p class="p-heading__lead c-lead">お得意様からの信頼に知識と技術で応えします。</p>
                    <div class="p-heading__detail">
                      <p>
                        ベルデンタルラボラトリー株式会社は、1981年の設立以来、<br>日本各地の歯科医院様と患者様に歯科技工製品をお届けしています。
                      </p>
                      <p>
                        2003年設立の有限会社エフィスとの連携による手厚い営業サポートを通じて、<br>確かな安心を提供することに誇りを持っています。
                      </p>
                      <p>
                        すべての方の満足と喜び、そして笑顔を第一に、私たちはこれからも歩み続けます。
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <section>
            <div id="teams" class="p-about-section p-about-teams">
              <div class="p-heading">
                <div class="p-heading__title text-center">
                  <div class="c-title">
                    <span class="c-title__en">
                      <span class="c-title--red">OUR&nbsp;TEAMS</span>
                    </span>
                    <h2 class="c-title__ja">私たちのチーム</h2>
                  </div>
                </div>
                <div class="p-about-section__content">
                  <p class="text-center">
                    当社の強みは、歯科技工士・営業・企画販売による三位一体のチーム体制です。<br>技術的なこだわりから医院経営に直結する製品提案まで、多角的にサポートします。
                  </p>
                </div>
              </div>
              <div class="slider-part" id="teamsSnap">
                <div class="snap__viewport">
                  <div class="snap__panel is-active">
                    <div class="p-career">
                      <div class="p-career__inner">
                        <!-- 左：テキスト -->
                        <div class="p-career__content">
                          <h3 class="p-career__title">歯科技工士</h3>
                          <p>
                            精密で適合が良く、審美性の高い技工製品を作ることで、患者様の「噛める喜び」と「笑顔」を作ります。
                          </p>
                        </div>
                        <div class="p-career__media" aria-label="歯科技工士の作業風景と製作物">
                          <div class="p-career__collage">
                            <!-- 大（背景） -->
                            <img class="p-career__img p-career__img--top" src="<?php echo esc_url(get_theme_file_uri('assets/images/technician-01.webp')); ?>" alt="" />

                            <!-- 小（手前） -->
                            <img class="p-career__img p-career__img--bottom" src="<?php echo esc_url(get_theme_file_uri('assets/images/technician-02.webp')); ?>" alt="" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="snap__panel">
                    <div class="p-career">
                      <div class="p-career__inner">
                        <!-- 左：テキスト -->
                        <div class="p-career__content">
                          <h3 class="p-career__title">歯科技工営業</h3>
                          <p>歯科医院と技工所の「架け橋」として、ドクターの要望や症例の内容をヒアリングし、歯科技工士に正確な情報伝達で医院のストレスを軽減します。</p>
                        </div>
                        <div class="p-career__media" aria-label="歯科技工士の作業風景と製作物">
                          <div class="p-career__collage">
                            <!-- 大（背景） -->
                            <img class="p-career__img p-career__img--top" src="<?php echo esc_url(get_theme_file_uri('assets/images/about-sales-1.webp')); ?>" alt="" />

                            <!-- 小（手前） -->
                            <img class="p-career__img p-career__img--bottom" src="<?php echo esc_url(get_theme_file_uri('assets/images/about-sales-2.webp')); ?>" alt="" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="snap__panel">
                    <div class="p-career">
                      <div class="p-career__inner">
                        <!-- 左：テキスト -->
                        <div class="p-career__content">
                          <h3 class="p-career__title">歯科技工販売企画</h3>
                          <p>最新のデジタル技工（IOS・CAD/CAM）や、歯科医院様、患者様につながる新しい技工プラン・メニューを企画・提案します。</p>
                        </div>
                        <div class="p-career__media" aria-label="歯科技工士の作業風景と製作物">
                          <div class="p-career__collage">
                            <!-- 大（背景） -->
                            <img class="p-career__img p-career__img--top" src="<?php echo esc_url(get_theme_file_uri('assets/images/about-jimu-01.webp')); ?>" alt="" />

                            <!-- 小（手前） -->
                            <img class="p-career__img p-career__img--bottom" src="<?php echo esc_url(get_theme_file_uri('assets/images/about-jimu-02.webp')); ?>" alt="" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <nav class="snap__pagination" aria-label="Pagination">
                    <button type="button" class="snap__dot is-active" aria-label="1"></button>
                    <button type="button" class="snap__dot" aria-label="2"></button>
                    <button type="button" class="snap__dot" aria-label="3"></button>
                  </nav>
                </div>
              </div>
            </div>
          </section>
          <section>
            <div id="environment" class="p-about-section p-about-environment">
              <div class="p-heading">
                <div class="p-heading__title text-center">
                  <div class="c-title">
                    <span class="c-title__en">
                      <span class="c-title--red">ENVIRONMENT</span>
                    </span>
                    <h2 class="c-title__ja">品質を支える職場環境</h2>
                  </div>
                  <p>「品質」は、一人ひとりの「技術」と「職場環境」</p>
                </div>
                <div class="p-about-section__content">
                  <!-- ★ 横自動スクロール（ここ） -->
                  <div class="p-flow js-flow">
                    <div class="p-flow__track">
                      <div class="p-flow__row">
                        <img src="<?php echo esc_url(get_theme_file_uri('assets/images/about_communication_01.webp')); ?>" alt="">
                        <img src="<?php echo esc_url(get_theme_file_uri('assets/images/about_communication_02.webp')); ?>" alt="">
                        <img src="<?php echo esc_url(get_theme_file_uri('assets/images/about_communication_03.webp')); ?>" alt="">
                        <img src="<?php echo esc_url(get_theme_file_uri('assets/images/about_communication_04.webp')); ?>" alt="">
                        <img src="<?php echo esc_url(get_theme_file_uri('assets/images/about_communication_05.webp')); ?>" alt="">
                      </div>
                      <div class="p-flow__row">
                        <img src="<?php echo esc_url(get_theme_file_uri('assets/images/about_communication_01.webp')); ?>" alt="">
                        <img src="<?php echo esc_url(get_theme_file_uri('assets/images/about_communication_02.webp')); ?>" alt="">
                        <img src="<?php echo esc_url(get_theme_file_uri('assets/images/about_communication_03.webp')); ?>" alt="">
                        <img src="<?php echo esc_url(get_theme_file_uri('assets/images/about_communication_04.webp')); ?>" alt="">
                        <img src="<?php echo esc_url(get_theme_file_uri('assets/images/about_communication_05.webp')); ?>" alt="">
                      </div>
                    </div>
                  </div>
                  <div class="text-center">
                    <p>
                      高い品質を提供し続けるには、技術力のみならず、<br>社内の円滑なコミュニケーションと、それらを生み出す充実した環境によって支えられています。
                    </p>
                    <p>
                      部署や役割を越えて相談しやすい職場環境を整えることで、<br>歯科技工士・営業・事務がリアルタイムに情報を共有。<br>この緊密な連携が可能にしています。
                    </p>
                    <p>
                      社内のラウンジ、バーカウンター、テラスは、<br>自由な意見交換や迅速な相談が生まれるコミュニケーションの場として利用されています。
                    </p>
                  </div>
                  <!-- <div class="p-about-environment__support">
                    <div class="text-center">
                      <span class="c-title--red">SUPPORTING</span>
                      <h3 class="c-heading-line">見えない部分まで、技工のために</h3>
                    </div>
                    <div class="p-about-support">
                      <ul class="p-about-support__list">
                        <li class="p-about-support__item">
                          <div class="p-about-support__card">
                            <img class="p-about-support__img"
                              src="<?php echo esc_url(get_theme_file_uri('assets/images/about_environment_01.webp')); ?>"
                              alt="">
                            <div class="p-about-support__body">
                              <h4 class="p-about-support__title">健康診断</h4>
                              <p>当社では、歯科技工士・営業・事務スタッフ全員を対象に、定期的な健康診断を実施しています。</p>
                              <p>心身のコンディションを整えることが、集中力や判断力を支え、安定した品質の歯科技工へとつながると考えています。</p>
                            </div>
                          </div>
                        </li>

                        <li class="p-about-support__item">
                          <div class="p-about-support__card">
                            <img class="p-about-support__img"
                              src="<?php echo esc_url(get_theme_file_uri('assets/images/about_environment_02.webp')); ?>"
                              alt="">
                            <div class="p-about-support__body">
                              <h4 class="p-about-support__title">作業環境測定</h4>
                              <p>歯科技工士に集中できる環境を保つため、作業環境測定を定期的に行っています。</p>
                              <p>作業スペースの安全性や快適性を確認し、目に見えない部分にも目を向けることで、安心して技工に向き合える環境を整えています。</p>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div> -->
                </div>
              </div>
            </div>
          </section>
          <section>
            <div class="p-about-section p-about-recruit">
              <div class="p-recruit-cta">
                <div class="p-recruit-cta__inner">
                  <div class="p-recruit-cta__logo">
                    <img src="<?php echo get_theme_file_uri('assets/images/footer-logo.webp'); ?>" alt="ベルデンタルラボラトリー ロゴ" />
                  </div>
                  <p class="p-recruit-cta__eyebrow">For Those Who Share Our Values</p>
                  <h3 class="p-recruit-cta__title">私たちは、ともに働く仲間を募集しています。</h3>
                  <p class="p-recruit-cta__text">
                    私たちは、歯科技工士・営業・事務など、<br>さまざまな立場のメンバーが<br>
                    ともに歯科技工に向き合う仲間を募集しています。
                  </p>
                  <div class="p-about-recruit__btn c-button">
                    <a href="<?php echo esc_url(home_url('/recruit/')); ?>" class="p-home-recruit__link">
                      <span class="c-button__pageLink">募集要項</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <section>
            <div class="p-about-section">
              <div class="p-company-outline" id="outline">
                <div class="p-company-outline__title text-center">
                  <div class="c-title">
                    <span class="c-title__en">
                      <span class="c-title--red">Outline</span>
                    </span>
                    <h2 class="c-title__ja">会社概要</h2>
                  </div>
                </div>
                <div class="p-page-section__content">
                  <?php
                  // 会社概要データ（PC表・SPブロックで共通利用＝二重管理を避ける）
                  $bell_fis_companies = array(
                    array('name' => 'ベルデンタルラボラトリー株式会社', 'founded' => '1981年4月', 'tel' => '03-6424-7829', 'fax' => '03-6424-5172', 'staff' => '25名'),
                    array('name' => '有限会社エフイス', 'founded' => '2003年6月', 'tel' => '03-6424-5224', 'fax' => '03-6424-5212', 'staff' => '15名'),
                  );
                  // 住所は改行制御用にspan分割（PCはインライン／SPは2行）
                  $bell_fis_address = '<span class="p-company-outline__postal">〒144-0056</span><span class="p-company-outline__street">東京都大田区西六郷2-44-6</span>';
                  // 行定義：key=各社で異なる項目 / shared=両社共通（PCはcolspanで結合）
                  $bell_fis_rows = array(
                    array('label' => '会社名',     'key' => 'name'),
                    array('label' => '創業',       'key' => 'founded'),
                    array('label' => '所在地',     'shared' => $bell_fis_address),
                    array('label' => 'TEL',        'key' => 'tel'),
                    array('label' => 'FAX',        'key' => 'fax'),
                    array('label' => '従業員数',   'key' => 'staff'),
                    array('label' => '事業内容',   'shared' => esc_html('歯科技工製品の製造')),
                    array('label' => '主な取引先', 'shared' => esc_html('日本全国の歯科医院・病院')),
                  );
                  ?>
                  <div class="p-company-outline__body">
                    <!-- PC：2社比較テーブル -->
                    <table class="p-company-outline__table">
                      <thead>
                        <tr>
                          <th scope="col" class="p-company-outline__th-item">項目</th>
                          <?php foreach ($bell_fis_companies as $company) : ?>
                            <th scope="col"><?php echo esc_html($company['name']); ?></th>
                          <?php endforeach; ?>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($bell_fis_rows as $row) : ?>
                          <tr>
                            <th scope="row"><?php echo esc_html($row['label']); ?></th>
                            <?php if (isset($row['shared'])) : ?>
                              <td colspan="2"><?php echo $row['shared']; ?></td>
                            <?php else : ?>
                              <?php foreach ($bell_fis_companies as $company) : ?>
                                <td><?php echo esc_html($company[$row['key']]); ?></td>
                              <?php endforeach; ?>
                            <?php endif; ?>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                    <!-- SP：会社ごとに縦積み（セル結合は使わない） -->
                    <div class="p-company-outline__blocks">
                      <?php foreach ($bell_fis_companies as $company) : ?>
                        <div class="p-company-outline__block">
                          <h3 class="p-company-outline__company"><?php echo esc_html($company['name']); ?></h3>
                          <dl class="p-company-outline__dl">
                            <?php foreach ($bell_fis_rows as $row) : ?>
                              <dt><?php echo esc_html($row['label']); ?></dt>
                              <dd><?php echo isset($row['shared']) ? $row['shared'] : esc_html($company[$row['key']]); ?></dd>
                            <?php endforeach; ?>
                          </dl>
                        </div>
                      <?php endforeach; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <section>
            <div class="p-about-section">
              <div id="history" class="p-company-history">
                <div class="p-company-history__title text-center">
                  <div class="c-title">
                    <span class="c-title__en">
                      <span class="c-title--red">History</span>
                    </span>
                    <h2 class="c-title__ja">沿 革</h2>
                  </div>
                </div>
                <div class="p-page-section__content">
                  <div class="p-company-history__list">
                    <dl class="p-company-history__item">
                      <dt><span>1981</span>年</dt>
                      <dd>東京大森にて創業</dd>
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
                      <dd>東京蒲田本社ビルに移転</dd>
                    </dl>
                    <dl class="p-company-history__item">
                      <dt><span>2003</span>年</dt>
                      <dd>「有限会社エフイス」設立　歯科技工営業、企画販売</dd>
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

        </div>
      </div>
    </div>
  </div>
</main>
<?php get_template_part('template-parts/footer-top'); ?>
<?php get_footer(); ?>