<?php
/*
Template Name: Contact Page
*/
get_header();

$state    = my_contact_get_form_state();
$errors   = $state['errors'];
$old      = $state['old'];
$status   = $state['status'];
$message  = $state['message'];
$settings = $state['settings'];
?>

<main class="l-main" id="js-main">
  <div class="p-contact">
    <div class="p-heading__title">
      <h2 class="c-title" data-ja="お問い合わせ">
        <span class="c-title--red">C</span>ontact
      </h2>
    </div>

    <div class="p-contact__content">

      <?php if ($status === 'success') : ?>
        <div class="p-form__alert p-form__alert--success">
          <?php echo esc_html($message); ?>
        </div>
      <?php endif; ?>

      <?php if (!empty($errors['common'])) : ?>
        <div class="p-form__alert p-form__alert--error">
          <?php echo esc_html($errors['common']); ?>
        </div>
      <?php endif; ?>

      <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" novalidate>
        <input type="hidden" name="action" value="my_contact_submit">
        <input type="hidden" name="form_type" value="contact">
        <?php wp_nonce_field('my_contact_submit', 'my_contact_nonce'); ?>
        <input type="hidden" name="form_started" value="<?php echo esc_attr(time()); ?>">

        <div style="position:absolute; left:-9999px;" aria-hidden="true">
          <input type="text" name="website" tabindex="-1" autocomplete="off">
        </div>

        <div class="p-form">
          <table class="p-form__table">
            <tbody>
              <tr>
                <th>お問い合わせ内容<span class="p-form__required">*</span></th>
                <td>
                  <div class="p-form__select">
                    <select name="menu" required>
                      <option value="">選択してください</option>
                      <?php foreach (['資料請求', '製品について', 'IOSについて', 'デンタル便について', 'その他'] as $menu) : ?>
                        <option value="<?php echo esc_attr($menu); ?>" <?php selected(($old['menu'] ?? ''), $menu); ?>>
                          <?php echo esc_html($menu); ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <?php if (!empty($errors['menu'])) : ?><p class="p-form__error"><?php echo esc_html($errors['menu']); ?></p><?php endif; ?>
                </td>
              </tr>

              <tr>
                <th>お名前<span class="p-form__required">*</span></th>
                <td>
                  <input type="text" name="your_name" value="<?php echo esc_attr($old['your_name'] ?? ''); ?>" required>
                  <?php if (!empty($errors['your_name'])) : ?><p class="p-form__error"><?php echo esc_html($errors['your_name']); ?></p><?php endif; ?>
                </td>
              </tr>

              <tr>
                <th>ふりがな</th>
                <td>
                  <input type="text" name="your_kana" value="<?php echo esc_attr($old['your_kana'] ?? ''); ?>">
                </td>
              </tr>

              <tr>
                <th>医院名、事業所名<span class="p-form__required">*</span></th>
                <td>
                  <input type="text" name="your_office" value="<?php echo esc_attr($old['your_office'] ?? ''); ?>" required>
                  <?php if (!empty($errors['your_office'])) : ?><p class="p-form__error"><?php echo esc_html($errors['your_office']); ?></p><?php endif; ?>
                </td>
              </tr>

              <tr>
                <th>住所<span class="p-form__required">*</span></th>
                <td>
                  <input type="text" name="your_address" value="<?php echo esc_attr($old['your_address'] ?? ''); ?>" required>
                  <?php if (!empty($errors['your_address'])) : ?><p class="p-form__error"><?php echo esc_html($errors['your_address']); ?></p><?php endif; ?>
                </td>
              </tr>

              <tr>
                <th>電話番号<span class="p-form__required">*</span></th>
                <td>
                  <input type="tel" name="your_tel" value="<?php echo esc_attr($old['your_tel'] ?? ''); ?>" required>
                  <?php if (!empty($errors['your_tel'])) : ?><p class="p-form__error"><?php echo esc_html($errors['your_tel']); ?></p><?php endif; ?>
                </td>
              </tr>

              <tr>
                <th>メールアドレス<span class="p-form__required">*</span></th>
                <td>
                  <input type="email" name="your_email" value="<?php echo esc_attr($old['your_email'] ?? ''); ?>" required>
                  <?php if (!empty($errors['your_email'])) : ?><p class="p-form__error"><?php echo esc_html($errors['your_email']); ?></p><?php endif; ?>
                </td>
              </tr>

              <tr>
                <th>お問い合わせ詳細<span class="p-form__required">*</span></th>
                <td>
                  <textarea name="your_message" rows="10" required><?php echo esc_textarea($old['your_message'] ?? ''); ?></textarea>
                  <?php if (!empty($errors['your_message'])) : ?><p class="p-form__error"><?php echo esc_html($errors['your_message']); ?></p><?php endif; ?>
                </td>
              </tr>
            </tbody>
          </table>

          <div class="p-form__privacy">
            <label class="custom-checkbox">
              <input type="checkbox" name="acceptance" value="1" <?php checked(($old['acceptance'] ?? ''), '1'); ?> required>
              <span class="checkbox-style"></span>
              <a href="<?php echo esc_url(home_url('/privacy/')); ?>" target="_blank" rel="noopener noreferrer" style="text-decoration: underline;">プライバシーポリシー</a>に同意する
            </label>
            <?php if (!empty($errors['acceptance'])) : ?><p class="p-form__error"><?php echo esc_html($errors['acceptance']); ?></p><?php endif; ?>
          </div>

          <?php if (!empty($settings['recaptcha_site_key'])) : ?>
            <div class="p-form__captcha">
              <div class="g-recaptcha" data-sitekey="<?php echo esc_attr($settings['recaptcha_site_key']); ?>"></div>
              <?php if (!empty($errors['recaptcha'])) : ?><p class="p-form__error"><?php echo esc_html($errors['recaptcha']); ?></p><?php endif; ?>
            </div>
          <?php endif; ?>

          <div class="c-button p-form__button">
            <input type="submit" value="送信する">
          </div>
        </div>
      </form>
    </div>
  </div>
</main>

<?php get_footer(); ?>