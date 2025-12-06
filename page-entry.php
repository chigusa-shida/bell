<?php
/*
Template Name:エントリー
*/
get_header();
?>
<main>
  <div class="l-main" id="js-main">
    <div class="p-entry">
      <div class="p-entry__heading">
        <h2 class="c-title" data-ja="エントリー">
          <span class="c-title--red">ENTRY</span>
        </h2>
      </div>
      <div class="p-entry__content">
        <?php the_content(); ?>
        <!-- <div class="p-form">
          <table class="p-form__table">
            <tr>
              <th>
                希望職種<span class="p-form__required">&#42;</span>
              </th>
              <td>
                <div class="p-form__select">
                  [radio your-position use_label_element "技工士" "営業選" "事務"]
                </div>
              </td>
            </tr>
            <tr>
              <th>
                雇用形態<span class="p-form__required">&#42;</span>
              </th>
              <td>
                <div class="p-form__select">
                  [radio your-type use_label_element "正社員" "パート・アルバイト"]
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
                性別
              </th>
              <td>
                <div class="p-form__select">
                  [radio your-position use_label_element "男性" "女性"]
                </div>
              </td>
            </tr>
            <tr>
              <th>
                現在の状況
              </th>
              <td>
                <div class="p-form__select">
                  [radio your-position use_label_element "在籍中" "離職中" "新卒・卒業見込"]
                </div>
              </td>
            </tr>
            <tr>
              <th>
                自己PRなどご記入下さい。<span class="p-form__required">&#42;</span>
              </th>
              <td>
                [textarea* your-message 40x10]
              </td>
            </tr>
          </table>
          <div class="p-form__privacy">
            [acceptance acceptance-694 optional]<a href="http://localhost:3000/privacy/" target="_blank" rel="noopener noreferrer" style="text-decoration: underline;">プライバシーポリシー</a>に同意の上、送信してください。[/acceptance]
          </div>
          [response]
          <div class="c-button p-form__button">
            [submit "送信する"]
          </div>
        </div> -->
      </div>
    </div>
  </div>
</main>
<?php get_template_part('template-parts/footer-top'); ?>
<?php get_footer(); ?>