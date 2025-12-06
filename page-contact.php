<?php
/*
Template Name: お問い合わせ
*/
get_header();
?>
<main class="l-main" id="js-main">
  <div class="p-contact">
    <div class="p-heading__title">
      <h2 class="c-title" data-ja="お問い合わせ">
        <span class="c-title--red">C</span>ontact
      </h2>
    </div>
    <div class="p-contact__content">
      <?php the_content(); ?>
      <!-- <div class="p-form">
        <table class="p-form__table">
          <tr>
            <th>
              お問い合わせ内容<span class="p-form__required">&#42;</span>
            </th>
            <td>
              <div class="p-form__select">
                [select* menu first_as_label "選択してください" "資料請求" "製品について" "IOSについて" "デンタル便について" "その他"]
              </div>
            </td>
          </tr>
          <tr>
            <th>
              お名前<span class="p-form__required">&#42;</span>
            </th>
            <td>
              [text* your-name]
            </td>
          </tr>
          <tr>
            <th>
              ふりがな
            </th>
            <td>
              [text your-name]
            </td>
          </tr>
          <tr>
            <th>
              医院名、事業所名<span class="p-form__required">&#42;</span>
            </th>
            <td>
              [text your-office]
            </td>
          </tr>
          <tr>
            <th>
              住所<span class="p-form__required">&#42;</span>
            </th>
            <td>
              [text* your-addres]
            </td>
          </tr>
          <tr>
            <th>
              電話番号<span class="p-form__required">&#42;</span>
            </th>
            <td>
              [tel* your-tel]
            </td>
          </tr>
          <tr>
            <th>
              メールアドレス<span class="p-form__required">&#42;</span>
            </th>
            <td>
              [email* your-email]
            </td>
          </tr>
          <tr>
            <th>
              お問い合わせ詳細<span class="p-form__required">&#42;</span>
            </th>
            <td>
              [textarea* your-message 40x10]
            </td>
          </tr>
        </table>
        <div class="p-form__privacy">
          [acceptance acceptance-694 optional]<a href="http://localhost:3000/privacy/" target="_blank" rel="noopener noreferrer" style="text-decoration: underline;">プライバシーポリシー</a>に同意の上、送信してください。[/acceptance]
        </div>
        <div class="c-button p-form__button">
          [submit "送信する"]
        </div>
      </div> -->
    </div>
  </div>

</main>
<?php get_footer(); ?>