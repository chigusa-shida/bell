<?php /* Template Name: 保証規約 */ get_header(); ?>
<main>
  <div id="js-main">
    <div class="l-main">
      <div class="p-warranty">
        <section>
          <div class="p-warranty__heading">
            <div class="p-heading">
              <div class="p-heading__content">
                <div class="p-heading__title text-center">
                  <div class="c-title">
                    <span class="c-title__en">
                      <span class="c-title--red">WARRANTY</span>
                    </span>
                    <h1 class="c-title__ja">保証規約</h1>
                  </div>
                </div>
              </div>
            </div> 
          </div>
        </section>
        <div class="p-warranty__content">
          <div class="p-warranty__info">
            <p>
              保証期間内の破折等における再製作及び修理につきましては、無償もしくは一部ご負担にて行わせていただきます。
            </p>
            <p>
              但し保証期間内においても下記項目は保証対象外となります。ご注意ください。
            </p>
          </div>
          <div class="p-warranty__listWrap">
            <?php the_content(); ?>
          </div>
          <div class="p-warranty__note">
            <div class="p-warranty__note--text">
              <p>※保証期間は技工物が納品された日からの期間になります。</p>
              <p>※各補綴物保証条件については営業担当までご連絡ください。</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php get_template_part('template-parts/footer-top'); ?>
<?php get_footer(); ?>