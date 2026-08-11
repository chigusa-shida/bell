<?php
/*
Template Name: 採用情報
*/
get_header();
?>
<main id="js-main">
  <div>
    <div class="p-page__heading" style="background-image:url('<?php echo esc_url(get_theme_file_uri('assets/images/about_fv.webp')); ?>')">
      <div class="p-heading__title">
        <div class="c-title">
          <span class="c-title__en">
            <span class="c-title--red">R</span>ECRUIT
          </span>
          <h1 class="c-title__ja">採用情報</h1>
        </div>
      </div>
    </div>
    <div class="l-main">
      <div class="p-recruit">
        <section>
          <div>
            <div class="p-company-outline" id="outline">
              <div class="p-company-outline__title text-center">
                <div class="c-title">
                  <span class="c-title__en">
                    <span class="c-title--red">Message</span>
                  </span>
                  <h2 class="c-title__ja">メッセージ</h2>
                </div>
              </div>
              <div class="p-page-section__content text-center">
                <p>私たちは小さな会社ですが、だからこそメンバー全員を家族のように大切にするビジョンを掲げています。</p>
                <p>歯科技工士、営業、マーケティングなど、それぞれの専門性を活かしながら、<br>全員が主役として活躍できるチャンスがあります。</p>
                <p>業界未経験や多様なバックグラウンドを持つ方も大歓迎です。</p>
                <p>確かなスキルアップを支える充実した研修制度、納得の給与体系、そして安心して長く働ける福利厚生を整えています。</p>
                <p>充実したワークライフバランスを実現するため、社内ラウンジやテラスなどのリフレッシュスペースも完備。</p>
                <p>オンとオフをしっかり切り替えながら、最高の仲間と最高のキャリアを築きましょう。</p>
              </div>
            </div>
          </div>
        </section>
        <section>
          <div class="p-recruitment p-page-section">
            <div class="p-recruitment__heading">
              <div class="c-title">
                <span class="c-title__en">
                  <span class="c-title--red">Recruitment</span>
                </span>
                <h2 class="c-title__ja">募集要項</h2>
              </div>
            </div>
            <div class="p-page-section__content">
              <div class="p-page-button">
                <ul class="p-page-button__list">
                  <li class="p-page-button__list--item">
                    <div class="c-button">
                      <a href="#technician">
                        <span class="c-button__anchorLink">歯科技工士</span>
                      </a>
                    </div>
                  </li>
                  <li class="p-page-button__list--item">
                    <div class="c-button">
                      <a href="#sales">
                        <span class="c-button__anchorLink">営業</span>
                      </a>
                    </div>
                  </li>
                  <li class="p-page-button__list--item">
                    <div class="c-button">
                      <a href="#clerical">
                        <span class="c-button__anchorLink">事務</span>
                      </a>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="p-recruitment-info">
                <ul class="p-recruitment-info__list">
                  <li id="technician">
                    <div class="p-recruitment-info__title">
                      <h3>歯科技工士（歯科技工製造職）</h3><span class="p-recruitment-info__title--sub">※応募先はベルデンタルラボラトリー株式会社です。</span>
                    </div>
                    <table class="p-recruitment-info__table">
                      <tr>
                        <th>仕事内容</th>
                        <td>インプラント、ジルコニア、ハイブリッド、CAD/CAMなど架工系。3Dデンチャー 等を製作</td>
                      </tr>
                      <tr>
                        <th>雇用形態</th>
                        <td>（1）正社員（常勤） （2）アルバイト</td>
                      </tr>
                      <tr>
                        <th>給与</th>
                        <td>（1）月給25万円～50万円 （2）時給1226円～<br>昇給： 有 （年1回 4月）賞与&colon;有（年2回 8月12月）<br>※給与は前職、経験などを考慮し、優遇します。</td>
                      </tr>
                      <tr>
                        <th>諸手当の内訳</th>
                        <td>家族手当、住宅手当、調整手当（能力に応じて要相談）交通費35000円迄支給</td>
                      </tr>
                      <tr>
                        <th>試用期間</th>
                        <td>3ヶ月</td>
                      </tr>
                      <tr>
                        <th>勤務地</th>
                        <td>東京都大田区西六郷2-44-6</td>
                      </tr>
                      <tr>
                        <th>勤務時間・休憩</th>
                        <td>9&colon;00〜18&colon;30<br>お昼休み60分、その他午前15分午後15分休憩</td>
                      </tr>
                      <tr>
                        <th>休日・休暇</th>
                        <td>長期休暇・特別休暇／夏季休暇／年末年始休暇／有給休暇／育休制度（実績あり）／時短勤務（実績あり）／時間有給・半日休暇制度あり</td>
                      </tr>
                      <tr>
                        <th>福利厚生・その他</th>
                        <td>
                          研修参加費補助あり、社員旅行（海外・国内）、カーシェアリング制度あり、IDS（2011年～）2年毎社員参加あり
                        </td>
                      </tr>
                      <tr>
                        <th>社会保険</th>
                        <td>健康保険、厚生年金、雇用保険、労災保険</td>
                      </tr>
                    </table>
                    <a href="<?php echo esc_url(home_url('/entry/')); ?>">
                      <div class="c-button p-recruitment-info__button">
                        <span class="c-button__pageLink">エントリー</span>
                      </div>
                    </a>
                  </li>
                  <li id="sales">
                    <div class="p-recruitment-info__title">
                      <h3>営業職</h3><span class="p-recruitment-info__title--sub">※応募先は有限会社エフイスです。</span>
                    </div>
                    <table class="p-recruitment-info__table">
                      <tr>
                        <th>仕事内容</th>
                        <td>歯科医院への営業・各メーカーと商談・データ分析</td>
                      </tr>
                      <tr>
                        <th>雇用形態</th>
                        <td>（1）正社員（常勤） （2）アルバイト</td>
                      </tr>
                      <tr>
                        <th>給与</th>
                        <td>（1）月給25万円～35万円 （2）時給1226円～<br>昇給： 有 （年1回 4月）賞与&colon;有（年2回 8月12月）<br>※給与は前職、経験などを考慮し、優遇します。</td>
                      </tr>
                      <tr>
                        <th>諸手当の内訳</th>
                        <td>家族手当、住宅手当、調整手当（能力に応じて要相談）交通費35000円迄支給</td>
                      </tr>
                      <tr>
                        <th>試用期間</th>
                        <td>3ヶ月</td>
                      </tr>
                      <tr>
                        <th>勤務地</th>
                        <td>東京都大田区西六郷2-44-6</td>
                      </tr>
                      <tr>
                        <th>勤務時間・休憩</th>
                        <td>9&colon;00〜18&colon;30<br>お昼休み60分、その他午前15分午後15分休憩</td>
                      </tr>
                      <tr>
                        <th>休日・休暇</th>
                        <td>長期休暇・特別休暇／夏季休暇／年末年始休暇／有給休暇／育休制度（実績あり）／時短勤務（実績あり）／時間有給・半日休暇制度あり</td>
                      </tr>
                      <tr>
                        <th>福利厚生・その他</th>
                        <td>
                          研修参加費補助あり、社員旅行（海外・国内）、カーシェアリング制度あり、IDS（2011年～）2年毎社員参加あり
                        </td>
                      </tr>
                      <tr>
                        <th>社会保険</th>
                        <td>健康保険、厚生年金、雇用保険、労災保険</td>
                      </tr>
                    </table>
                    <a href="<?php echo esc_url(home_url('/entry/')); ?>">
                      <div class="c-button p-recruitment-info__button">
                        <span class="c-button__pageLink">エントリー</span>
                      </div>
                    </a>
                  </li>
                  <li id="clerical">
                    <div class="p-recruitment-info__title">
                      <h3>事務職（企画販売）</h3>
                      <span class="p-recruitment-info__title--sub">※応募先は有限会社エフイスです。</span>
                    </div>
                    <table class="p-recruitment-info__table">
                      <tr>
                        <th>仕事内容</th>
                        <td>受注入力・発送業務・営業のフォローアップ</td>
                      </tr>
                      <tr>
                        <th>雇用形態</th>
                        <td>（1）正社員（常勤） （2）アルバイト</td>
                      </tr>
                      <tr>
                        <th>給与</th>
                        <td>（1）月給25万円～35万円 （2）時給1226円～<br>昇給： 有 （年1回 4月）賞与&colon;有（年2回）<br>※給与は前職、経験などを考慮し、優遇します。</td>
                      </tr>
                      <tr>
                        <th>諸手当の内訳</th>
                        <td>家族手当、住宅手当、調整手当、服装手当（年2回 3月・9月）交通費35000円迄支給</td>
                      </tr>
                      <tr>
                        <th>試用期間</th>
                        <td>3ヶ月</td>
                      </tr>
                      <tr>
                        <th>勤務地</th>
                        <td>東京都大田区西六郷2-44-6</td>
                      </tr>
                      <tr>
                        <th>勤務時間・休憩</th>
                        <td>9&colon;00〜18&colon;30<br>お昼休み60分、その他午前15分午後15分休憩</td>
                      </tr>
                      <tr>
                        <th>休日・休暇</th>
                        <td>長期休暇・特別休暇／夏季休暇／年末年始休暇／慶弔休暇／有給休暇（入社と同時に付与）／産休制度（実績あり）／育休制度（実績あり）／時短勤務（実績あり）／時間有給・半日休暇制度あり</td>
                      </tr>
                      <tr>
                        <th>福利厚生・その他</th>
                        <td>
                          研修参加費補助あり、社員旅行（海外・国内）、カーシェアリング制度あり、IDS（2011年～）2年毎社員参加あり、家族手当、住宅手当、調整手当（能力に応じて要相談）交通費35000円迄支給
                        </td>
                      </tr>
                      <tr>
                        <th>社会保険</th>
                        <td>健康保険、厚生年金、雇用保険、労災保険</td>
                      </tr>
                    </table>
                    <a href="<?php echo esc_url(home_url('/entry/')); ?>">
                      <div class="c-button p-recruitment-info__button">
                        <span class="c-button__pageLink">エントリー</span>
                      </div>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </section>
        <!-- <div class="p-page-button">
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
            <li class="p-page-button__list--item">
              <div class="c-button">
                <a href="<?php echo esc_url(home_url('/entry/')); ?>">
                  <span class="c-button__entryLink">エントリー</span>
                </a>
              </div>
            </li>
          </ul>
        </div> -->
      </div>
    </div>
  </div>
</main>
<?php get_template_part('template-parts/footer-top-recruit'); ?>
<?php get_footer(); ?>