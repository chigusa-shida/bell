<?php
/*
Template Name: 納期カレンダー
*/
get_header();
?>
<main>
  <div class="l-main" id="js-main">
    <div class="p-deadline">
      <div class="p-heading__title">
        <h2 class="c-title" data-ja="納期カレンダー">
          <span class="c-title--red">D</span>eadline
        </h2>
      </div>
      <div class="p-deadline__content">
        <div class="p-deadline__precaution">
          <p>
            ※弊社納品スケジュールカレンダーは、各製品グループの模型を「お預かりした日」（受注日）から、技工製品を「お届けする日」（納品予定日）を表記になっております。
          </p>
          <p>
            ※製作日に日曜と祝日は除きます。
          </p>
          <p>
            ※「宅配便」をご利用のお客様は、弊社へ模型が「到着した日」（受注日）から、技工製品がお手元に「届く日」（納品日）になります。
          </p>
          <p>
            弊社は厚生労働省が掲げる「労働施策基本方針（働き方改革）」に基づきワーク・ライフ・バランスの向上を目指しております。<br>みなさまのご協力に感謝を申し上げます。
          </p>
        </div>
        <div class="p-deadline__calendar">
          <?php the_content(); ?>
        </div>
      </div>
    </div>
  </div>
</main>
<?php get_template_part('template-parts/footer-top'); ?>
<?php get_footer(); ?>