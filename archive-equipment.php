<?php
/*
Template Name: 設備情報
*/
get_header();
?>
<main>
  <div class="l-main" id="js-main">
    <div class="p-equipment">
      <div class="p-heading">
        <div class="p-heading__title">
          <h2 class="c-title" data-ja="設備情報"><span class="c-title--red">E</span>QUIPMENT</h2>
        </div>
        <div class="p-heading__content col">
          <div class="p-heading__img">
            <picture>
              <source srcset="<?php echo get_theme_file_uri('assets/images/equipment_top.webp'); ?>" type="image/webp" />
              <img src="<?php echo get_theme_file_uri('assets/images/equipment_top.jpg'); ?>" alt="設備情報" />
            </picture>
          </div>
          <div class="p-heading__text p-equipment__headingText">
            <p class="p-heading__lead c-lead">最新機器の導入で
              最先端の技工を可能にする環境を整えています。</p>
            <div class="p-heading__detail">
              <p>常に時代の変化に対応して最新のデジタル機器をいち早く導入し最先端の技工を可能にする環境を整えています。複数のCAD/CAMシステムや3Dプリンター、大型ミリング機など最新鋭の機器を取り揃えています。</p>
            </div>
          </div>
        </div>
      </div>
      <div class="p-equipment__content">
        <ul class="p-equipment__list">
          <?php
          // カスタム投稿タイプ 'equipment' のアーカイブページ
          $equipment_args = array(
            'post_type' => 'equipment',  // カスタム投稿タイプ
            'post_status' => 'publish',
            'posts_per_page' => -1,  // 記事数を制限しない
            'order' => 'ASC',  // 昇順
            'orderby' => 'modified',  // 更新日順
          );
          $equipment_query = new WP_Query($equipment_args);  // WP_Query インスタンス作成
          if ($equipment_query->have_posts()) :  // 記事があるか確認
            while ($equipment_query->have_posts()) : $equipment_query->the_post();  // 記事ループ開始
          ?>
              <li class="p-equipment__card">
                <div class="p-equipment__image">
                  <?php the_post_thumbnail();  // アイキャッチ画像を表示 
                  ?>
                </div>
                <div class="p-equipment__title">
                  <?php the_title();  // 設備のタイトルを表示 
                  ?>
                </div>
                <div class="p-equipment__detail">
                  <?php the_content();  // 設備の詳細を表示 
                  ?>
                </div>
              </li>
          <?php
            endwhile;
          else :  // 記事がない場合
            echo '<p>設備情報は現在ありません。</p>';
          endif;
          ?>
        </ul>
      </div>
    </div>
  </div>
</main>
<?php get_template_part('template-parts/footer-top'); ?>
<?php get_footer(); ?>