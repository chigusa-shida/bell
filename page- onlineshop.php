<?php
/*
Template Name: オンラインショップ
*/
get_header('shop');
?>
<main>
  <div id="js-main">
    <div class="p-shop">
      <section class="p-shop-top">
        <div class="p-shop-top__container">
          <div class="p-shop-top__catch">
            <h2>
              <img src="<?php echo get_theme_file_uri('assets/images/shop-fv-catch.svg'); ?>" alt="ユーザーフレンドリーでスピーディーな発注" />
            </h2>
            <div class="p-shop-top__catch-bottom">
              <div class="p-shop-top__logo">
                <img src="<?php echo get_theme_file_uri('assets/images/dentalbin24_logo.webp'); ?>" alt="デンタル便24ロゴ" />
              </div>
              <a href="https://www.dentalbin24.net/" target="_blank" rel="noopener noreferrer" class="p-shop-top__btn">
                デンタル便24で注文する
              </a>
            </div>
          </div>
          <picture class="p-shop-top__image">
            <source srcset="<?php echo get_theme_file_uri('assets/images/shop-fv-pc.svg'); ?>" media="(min-width: 950px)" />
            <img src="<?php echo get_theme_file_uri('assets/images/shop-fv-sp.svg'); ?>" alt="サンプル画像" />
          </picture>
        </div>
      </section>
      <section class="p-shop-about p-shop-section">
        <div class="p-shop-about__content">
          <h2 class="p-shop-about__title p-shop-section__title" data-en="About">デンタル便24とは?</h2>
          <div class="p-shop-about__detail">
            <p>
              「デンタル便24」はベルデンタルラボラトリー株式会社が開設した、歯科医院様、歯科技工所様を対象とした業界専門のECサイトです。
            </p>
            <p>
              当ラボの技工物の発注から納品まで、すべてオンラインで完結するため、ユーザーフレンドリーな環境でスピーディーな発注が可能です。
            </p>
          </div>
        </div>
      </section>
      <section>
        <div id="bottomMenu-start" class="p-shop-comparison p-shop-section">
          <div class="p-shop-comparison__top">
            <h2 class="p-shop-comparison__title p-shop-section__title">
              当ラボの技工物の発注から納品まで、<br class="visible-md">すべて<span class="dots">オンライン</span>で可能！
            </h2>
            <div class="p-shop-comparison__detail">
              <p>
                これまでもオンラインでのオーダーサイトはありましたが、実際は依頼書をダウンロードし、注文するというアナログ対応というのが実情でした。<br>デンタル便では、手間、間接コストを軽減、お客様ユーザーフレンドリーな環境でスピーディーな発注が可能です。
              </p>
            </div>
          </div>
          <div class="p-shop-comparison__imge">
            <img src="<?php echo get_theme_file_uri('assets/images/shop-comparison.svg'); ?>" alt="発注行程比較">
          </div>
        </div>
      </section>
      <section>
        <div class="p-shop-merit p-shop-section">
          <h2 class="p-shop-merit__title p-shop-section__title" data-en="Merit">デンタル便で発注する4つ<span class="red">メリット</span>!
          </h2>
          <div class="p-shop-merit__content">
            <ul class="p-shop-merit__list">
              <li class="p-shop-merit__item">
                <div class="p-shop-merit__card">
                  <div class="p-shop-merit__card--top">
                    <h3 class="p-shop-merit__heading" data-en="Merit1">
                      納期で割安
                    </h3>
                    <div class="p-shop-merit__icon">
                      <img src="<?php echo get_theme_file_uri('assets/images/merit-1.svg'); ?>" alt="発注行程比較">
                    </div>
                  </div>
                  <div class="p-shop-merit__card--bottom">
                    <div class="p-shop-merit__lead">
                      <p class="p-shop-merit__lead--top">製作日数が多いほど料金が割安</p>
                      <p class="p-shop-merit__lead--bottom">患者様のご都合などにより歯科技工製品のセット日まで余裕のある場合など、長い営業日を指定頂くことにより技工料金が割安になります。</p>
                    </div>
                  </div>
                </div>
              </li>
              <li class="p-shop-merit__item">
                <div class="p-shop-merit__card">
                  <div class="p-shop-merit__card--top">
                    <h3 class="p-shop-merit__heading" data-en="Merit2">
                      ペーパレス
                    </h3>
                    <div class="p-shop-merit__icon">
                      <img src="<?php echo get_theme_file_uri('assets/images/merit-2.svg'); ?>" alt="発注行程比較">
                    </div>
                  </div>
                  <div class="p-shop-merit__card--bottom">
                    <div class="p-shop-merit__lead">
                      <p class="p-shop-merit__lead--top">面倒な手書きによる発注書は不要</p>
                      <p class="p-shop-merit__lead--bottom">面倒な手書きによる発注書（指示書）は必要ありません。発注時に手順沿ってに必要事項を入力して頂くだけで簡単に発注が可能です。</p>
                    </div>
                  </div>
                </div>
              </li>
              <li class="p-shop-merit__item">
                <div class="p-shop-merit__card">
                  <div class="p-shop-merit__card--top">
                    <h3 class="p-shop-merit__heading" data-en="Merit3">
                      24時間対応
                    </h3>
                    <div class="p-shop-merit__icon">
                      <img src="<?php echo get_theme_file_uri('assets/images/merit-3.svg'); ?>" alt="発注行程比較">
                    </div>
                  </div>
                  <div class="p-shop-merit__card--bottom">
                    <div class="p-shop-merit__lead">
                      <p class="p-shop-merit__lead--top">当社営業時間外でも発注が可能</p>
                      <p class="p-shop-merit__lead--bottom">発注時に時間の制限はありません。お客様の診療終了後や作業時間終了後で発注が可能です。</p>
                      <p class="p-shop-merit__lead--caution">※データ・模型の弊社受取時間により営業日のカウントが変わります。</p>
                    </div>
                  </div>
                </div>
              </li>
              <li class="p-shop-merit__item">
                <div class="p-shop-merit__card">
                  <div class="p-shop-merit__card--top">
                    <h3 class="p-shop-merit__heading" data-en="Merit4">
                      キャッシュレス
                    </h3>
                    <div class="p-shop-merit__icon">
                      <img src="<?php echo get_theme_file_uri('assets/images/merit-4.svg'); ?>" alt="発注行程比較">
                    </div>
                  </div>
                  <div class="p-shop-merit__card--bottom">
                    <div class="p-shop-merit__lead">
                      <p class="p-shop-merit__lead--top">歯科技工製品がカード決済可能</p>
                      <p class="p-shop-merit__lead--bottom">口座登録不要。クレジットカードで決済が可能です。VISA、MASTER、JCB、Diners、AMEXの各クレジットカードがご使用いただけます。</p>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </section>
      <section>
        <div class="p-shop-step p-shop-section">
          <div class="p-shop-step__top">
            <h2 class="p-shop-step__title p-shop-section__title" data-en="注文方法">
              当ラボの技工物の発注から納品まで、<br class="visible-md">納品までの7ステップ!
            </h2>
          </div>
          <div class="p-shop-step__flow" id="js-accordion">
            <dl>
              <dt class="u-accordion-question">
                <table class="p-shop-step__label">
                  <tbody>
                    <tr>
                      <th>
                        <p>STEP1</p>
                      </th>
                      <td>
                        <p>新規会員登録・ログイン</p>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </dt>
              <dd class="u-accordion-answer">
                <div class="p-shop-step__content">
                  <p>まず初めに会員登録（無料）をしていただくと、以降の流れがスムーズです。<br>デンタル便24にアクセスし、新規会員登録をお願いします。</p>
                  <p>※会員登録がお済みのお客様は、登録時に入力されたメールアドレスとパスワードでログインしてください。</p>
                  <div class="p-shop-step__order">
                    <p class="p-shop-step__order-title">新規会員登録（無料）の手順</p>
                    <ul class="p-shop-step__orderList">
                      <li>
                        <div>
                          <div class="p-shop-step__order-number">1</div>
                        </div>
                        <div class="p-shop-step__order-text"><span class="red">デンタル便24</span>にアクセスし「新規会員登録」ボタンより登録ページへ移動し、項目に従って会員情報を入力し「会員登録の申請」をして下さい。</div>
                      </li>
                      <li>
                        <div>
                          <div class="p-shop-step__order-number">2</div>
                        </div>
                        <div class="p-shop-step__order-text">確認メールを送信を後、セキュリティー強化のため、お客様の入力されました電話番号に運営担当者より入力内容確認の<span class="bold">お電話</span>をさせて頂きます。</div>
                      </li>
                      <li>
                        <div>
                          <div class="p-shop-step__order-number">3</div>
                        </div>
                        <div class="p-shop-step__order-text">会員登録完了後「入会登録完了メール」を送信させていただきます。</div>
                      </li>
                      <li>
                        <div>
                          <div class="p-shop-step__order-number">4</div>
                        </div>
                        <div class="p-shop-step__order-text">お客様が「入会登録完了メール」を受信後、ログインして頂くとご注文が可能となります。</div>
                      </li>
                    </ul>
                  </div>
                </div>
              </dd>
            </dl>
            <dl>
              <dt class="u-accordion-question">
                <table class="p-shop-step__label">
                  <tbody>
                    <tr>
                      <th>
                        <p>STEP2</p>
                      </th>
                      <td>
                        <p>商品を選び、ショッピングカートに入れる</p>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </dt>
              <dd class="u-accordion-answer">
                <div class="p-shop-step__content">
                  <p>ご希望の商品を選択し、表示される内容に従って入力し商品をカートに入れてください。<br>発注には、模型送付とデータ送信の２つの方法があります。ご希望の受注方のカテゴリ内から商品を選択して下さい。</p>
                  <ol>
                    <li>ご希望商品の選択</li>
                    <li>本数・日数を選択</li>
                    <li>詳細情報（患者様名・部位・シェード）の入力</li>
                    <li>「カートに入れる」ボタンをクリックすると、商品がカートに入ります。</li>
                  </ol>
                  <p>商品を複数まとめてご注文いただく場合は、「買い物続ける」をクリックして頂きご希望の商品を選択し1から繰り返し、注文したい商品がすべて買い物かごに入ったことをご確認下さい。</p>
                </div>
              </dd>
            </dl>
            <dl>
              <dt class="u-accordion-question">
                <table class="p-shop-step__label">
                  <tbody>
                    <tr>
                      <th>
                        <p>STEP3</p>
                      </th>
                      <td>
                        <p>購入手続き</p>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </dt>
              <dd class="u-accordion-answer">
                <div class="p-shop-step__content">
                  <p>カート内の注文内容を再度確認頂き「ご購入手続き」ボタンをクリックし、表示される内容に従って入力して下さい。</p>
                  <ol>
                    <li>お届け先の指定</li>
                    <li>お支払方法・お届け時間等の指定</li>
                    <li>入力内容のご確認</li>
                    <li>お支払い情報（クレジットカード情報）の入力</li>
                    <li>入力後、一番下の「ご注文完了ページへ」ボタンをクリックしてください。</li>
                  </ol>
                </div>
              </dd>
            </dl>
            <dl>
              <dt class="u-accordion-question">
                <table class="p-shop-step__label">
                  <tbody>
                    <tr>
                      <th>
                        <p>STEP4</p>
                      </th>
                      <td>
                        <p>ご注文完了</p>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </dt>
              <dd class="u-accordion-answer">
                <div class="p-shop-step__content">
                  <p>弊社でご注文内容を確認後、自動メールが送付されます。<br>ご注文が完了しましたら、各発注方法に沿ったデータ入稿または模型・印象の送付のお手続きにお進み下さい。</p>
                </div>
              </dd>
            </dl>
            <dl>
              <dt class="u-accordion-question">
                <table class="p-shop-step__label">
                  <tbody>
                    <tr>
                      <th>
                        <p>STEP5</p>
                      </th>
                      <td>
                        <p>送付物チェック / 技工物製作</p>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </dt>
              <dd class="u-accordion-answer">
                <div class="p-shop-step__content">
                  <p>デジタルデータはアップロード完了後、技工担当者によりデータを、印象・模型での受注制作の場合は送付物が弊社到着後、技工担当者によりをチェックさせて頂きます。</p>
                  <p>弊社側のチェック後「作業開始のおしらせ」のメールを送信させて頂き製作に取り掛かります。</p>
                  <p>※データ不備がある場合、「データ不備のお知らせ」のメールと担当技工士よりご連絡させて頂きます。</p>
                  <div class="p-shop-step__order">
                    <p class="p-shop-step__order-title">模型・印象で受注製作製品をご注文の場合</p>
                    <div>
                      <p>模型及び印象などを弊社午前中着にて発送お願いの致します。</p>
                      <p>
                        ※初回注文時はメール記載URLより初回のみ指示書をダウンロードしてください。
                      </p>
                      <p>
                        ※送付先は、運営管理をしている弊社グループ会社である有限会社エフイスになります。
                      </p>
                      <p>
                        ※弊社までの送料は会員様負担でお願いしております。
                      </p>
                    </div>
                  </div>
                  <div class="p-shop-step__order">
                    <p class="p-shop-step__order-title">デジタルデータで受注製作製品をご注文の場合</p>
                    <div>
                      <p>ご注文が完了しましたら、マイページ＞購入履歴一覧よりデータのアップロードが可能になります。下記手順を参考にデータのアップロードを行って下さい。</p>
                      <ol>
                        <li>
                          患者名を表記したフォルダを作成しにSTLデータを入れる。
                        </li>
                        <li>
                          医院名を明記したフォルダの作成し、1で作成したフォルダを入れZip形式で圧縮
                        </li>
                        <li>
                          マイページ＞購入履歴一覧よりアップロードして完了
                        </li>
                      </ol>
                    </div>
                  </div>
                </div>
              </dd>
            </dl>
            <dl>
              <dt class="u-accordion-question">
                <table class="p-shop-step__label">
                  <tbody>
                    <tr>
                      <th>
                        <p>STEP6</p>
                      </th>
                      <td>
                        <p>技工物納品</p>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </dt>
              <dd class="u-accordion-answer">
                <div class="p-shop-step__content">
                  <p>完成した技工物は厳重に梱包を行ったのち、宅急便（送料弊社負担）にて納品書とともに配送いたします。</p>
                </div>
              </dd>
            </dl>
          </div>
        </div>
      </section>
      <section>
        <div id="bottomMenu-end" class="p-shop-info p-shop-section">
          <div class="p-shop-info__top">
            <h2 class="p-shop-info__title p-shop-section__title">
              デンタル便24に関しての<span class="red">お問い合わせ</span>
            </h2>
            <div class="p-shop-info__detail">
              <p>
                デンタル便24に関するお問い合わせは、有限会社エフイス（運営会社）へお願い致します。
              </p>
            </div>
          </div>
          <div class="p-shop-info__cardWrap">
            <div class="p-shop-info__card">
              <div class="p-shop-info__card-heading">
                <h3>メールでお問い合わせ</h3>
              </div>
              <div class="p-shop-info__card-cont">
                <div class="p-shop-info__card-cont--top">
                  <p>メールでのお問い合わせは、デンタル便24ECサイト「お問い合わせフォーム」よりお問い合わせ下さい。</p>
                </div>
                <div class="p-shop-info__card-cont--bottom">
                  <div class="p-shop-info__card-main">
                    <div class="p-shop-info__card-main--left">
                      <img src="<?php echo get_theme_file_uri('assets/images/shop-info-mail.svg'); ?>" alt="メールアイコン">
                    </div>
                    <div class="p-shop-info__card-main--right">
                      <img src="<?php echo get_theme_file_uri('assets/images/dentalbin24_logo.webp'); ?>" alt="デンタル便24ロゴ" />
                      <div class="p-shop-info__card-main--btn">
                        <a href="https://www.dentalbin24.net/" target="_blank" rel="noopener noreferrer">
                          デンタル便24
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="p-shop-info__card">
              <div class="p-shop-info__card-heading">
                <h3>電話でお問い合わせ</h3>
              </div>
              <div class="p-shop-info__card-cont">
                <div class="p-shop-info__card-cont--top">
                  <p>お電話でのお問い合わせは、運営会社「有限会社エフイス」へお問い合わせ下さい。</p>
                </div>
                <div class="p-shop-info__card-cont--bottom">
                  <div class="p-shop-info__card-main">
                    <div class="p-shop-info__card-main--left">
                      <img src="<?php echo get_theme_file_uri('assets/images/shop-info-tel.svg'); ?>" alt="電話アイコン">
                    </div>
                    <div class="p-shop-info__card-main--right">
                      <p class="p-shop-info__tel">03-6424-5224</p>
                      <p class="p-shop-info__address">
                        有限会社エフイス<br>受付時間 9:30～17:00<br>日曜祝日・会社休業日を除く
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</main>
<?php get_template_part('template-parts/footer-top'); ?>
<?php get_footer(); ?>
<div class="p-shop-bottomMenu">
  <div class="p-shop-bottomMenu__content">
    <ul class="p-shop-bottomMenu__list">
      <li class="p-shop-bottomMenu__list--pc">
        <img src="<?php echo get_theme_file_uri('assets/images/dentalbin24_logo.webp'); ?>" alt="デンタル便24ロゴ" />
      </li>
      <li>
        <div class="p-shop-bottomMenu__button">
          <p class="p-shop-bottomMenu__button--att">会員登録<span class="red">無料</span></p>
          <a href="https://www.dentalbin24.net/" target="_blank" rel="noopener noreferrer" class="p-shop-bottomMenu__button--link">
            デンタル便24で注文
          </a>
        </div>
      </li>
    </ul>
    <div class="p-shop-bottomMenu__detail">
      <p>
        デンタル便での発注頂ける技工物はすべての技工物が対象ではありません。<br>対象の技工物に関しましては、デンタル便サイトまたは当サイトの製品情報詳細からご確認ください。
      </p>
    </div>
  </div>
</div>