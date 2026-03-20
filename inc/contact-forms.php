<?php
if (!defined('ABSPATH')) exit;

/* =========================================================
 * お問い合わせ / 採用エントリーフォーム
 * reCAPTCHA v2 Checkbox 対応
 * ========================================================= */

/* -----------------------------
 * 管理画面メニュー
 * ----------------------------- */
add_action('admin_menu', function () {
  add_menu_page(
    'お問い合わせフォーム設定',
    'お問い合わせフォーム',
    'manage_options',
    'custom-contact-settings',
    'my_contact_common_settings_page',
    'dashicons-email-alt',
    25
  );

  add_submenu_page(
    'custom-contact-settings',
    '共通設定',
    '共通設定',
    'manage_options',
    'custom-contact-settings',
    'my_contact_common_settings_page'
  );

  add_submenu_page(
    'custom-contact-settings',
    'お問い合わせ設定',
    'お問い合わせ',
    'manage_options',
    'custom-contact-contact-settings',
    'my_contact_contact_settings_page'
  );

  add_submenu_page(
    'custom-contact-settings',
    '採用エントリー設定',
    '採用エントリー',
    'manage_options',
    'custom-contact-entry-settings',
    'my_contact_entry_settings_page'
  );
});

/* -----------------------------
 * 設定登録
 * ----------------------------- */
add_action('admin_init', function () {
  register_setting('my_contact_common_settings_group', 'my_contact_settings', [
    'type' => 'array',
    'sanitize_callback' => 'my_contact_sanitize_settings',
    'default' => [],
  ]);

  register_setting('my_contact_contact_settings_group', 'my_contact_settings', [
    'type' => 'array',
    'sanitize_callback' => 'my_contact_sanitize_settings',
    'default' => [],
  ]);

  register_setting('my_contact_entry_settings_group', 'my_contact_settings', [
    'type' => 'array',
    'sanitize_callback' => 'my_contact_sanitize_settings',
    'default' => [],
  ]);
});

/* -----------------------------
 * 設定サニタイズ
 * ----------------------------- */
function my_contact_sanitize_settings($input) {
  $current = get_option('my_contact_settings', []);
  if (!is_array($current)) {
    $current = [];
  }

  $output = $current;

  if (array_key_exists('contact_notify_to', $input)) {
    $output['contact_notify_to'] = sanitize_email($input['contact_notify_to']);
  }

  if (array_key_exists('entry_notify_to', $input)) {
    $output['entry_notify_to'] = sanitize_email($input['entry_notify_to']);
  }

  if (array_key_exists('reply_to_mode', $input)) {
    $output['reply_to_mode'] = in_array($input['reply_to_mode'], ['user', 'fixed'], true)
      ? $input['reply_to_mode']
      : 'user';
  }

  if (array_key_exists('fixed_reply_to', $input)) {
    $output['fixed_reply_to'] = sanitize_email($input['fixed_reply_to']);
  }

  if (array_key_exists('sender_email', $input)) {
    $output['sender_email'] = sanitize_email($input['sender_email']);
  }

  if (array_key_exists('recaptcha_site_key', $input)) {
    $output['recaptcha_site_key'] = sanitize_text_field($input['recaptcha_site_key']);
  }

  if (array_key_exists('recaptcha_secret_key', $input)) {
    $output['recaptcha_secret_key'] = sanitize_text_field($input['recaptcha_secret_key']);
  }

  if (array_key_exists('contact_admin_subject', $input)) {
    $output['contact_admin_subject'] = sanitize_text_field($input['contact_admin_subject']);
  }

  if (array_key_exists('contact_admin_body', $input)) {
    $output['contact_admin_body'] = wp_kses_post($input['contact_admin_body']);
  }

  if (array_key_exists('contact_auto_reply_enabled', $input)) {
    $output['contact_auto_reply_enabled'] = !empty($input['contact_auto_reply_enabled']) ? '1' : '0';
  }

  if (array_key_exists('contact_auto_reply_subject', $input)) {
    $output['contact_auto_reply_subject'] = sanitize_text_field($input['contact_auto_reply_subject']);
  }

  if (array_key_exists('contact_auto_reply_body', $input)) {
    $output['contact_auto_reply_body'] = wp_kses_post($input['contact_auto_reply_body']);
  }

  if (array_key_exists('entry_admin_subject', $input)) {
    $output['entry_admin_subject'] = sanitize_text_field($input['entry_admin_subject']);
  }

  if (array_key_exists('entry_admin_body', $input)) {
    $output['entry_admin_body'] = wp_kses_post($input['entry_admin_body']);
  }

  if (array_key_exists('entry_auto_reply_enabled', $input)) {
    $output['entry_auto_reply_enabled'] = !empty($input['entry_auto_reply_enabled']) ? '1' : '0';
  }

  if (array_key_exists('entry_auto_reply_subject', $input)) {
    $output['entry_auto_reply_subject'] = sanitize_text_field($input['entry_auto_reply_subject']);
  }

  if (array_key_exists('entry_auto_reply_body', $input)) {
    $output['entry_auto_reply_body'] = wp_kses_post($input['entry_auto_reply_body']);
  }

  return $output;
}

/* -----------------------------
 * デフォルト設定
 * ----------------------------- */
function my_contact_get_settings() {
  $host = wp_parse_url(home_url(), PHP_URL_HOST);
  $host = $host ? preg_replace('#^www\.#', '', $host) : 'example.com';

  $defaults = [
    'contact_notify_to' => get_option('admin_email'),
    'entry_notify_to'   => get_option('admin_email'),
    'reply_to_mode'     => 'user',
    'fixed_reply_to'    => get_option('admin_email'),
    'sender_email'      => 'no-reply@' . $host,

    'recaptcha_site_key'   => '',
    'recaptcha_secret_key' => '',

    'contact_admin_subject' => '[' . get_bloginfo('name') . '] お問い合わせ / [menu]',
    'contact_admin_body'    => "Webサイトからお問い合わせがありました。\n\n【お問い合わせ内容】\n[menu]\n\n【お名前】\n[your_name]\n\n【ふりがな】\n[your_kana]\n\n【医院名、事業所名】\n[your_office]\n\n【住所】\n[your_address]\n\n【電話番号】\n[your_tel]\n\n【メールアドレス】\n[your_email]\n\n【お問い合わせ詳細】\n[your_message]\n\n【送信日時】\n[date]\n【サイト名】\n[site_name]\n【サイトURL】\n[site_url]",
    'contact_auto_reply_enabled' => '1',
    'contact_auto_reply_subject' => '[' . get_bloginfo('name') . '] お問い合わせありがとうございます',
    'contact_auto_reply_body'    => "[your_name] 様\n\nこの度はお問い合わせいただきありがとうございます。\n以下の内容で受け付けました。\n\n【お問い合わせ内容】\n[menu]\n\n【お名前】\n[your_name]\n\n【医院名、事業所名】\n[your_office]\n\n【住所】\n[your_address]\n\n【電話番号】\n[your_tel]\n\n【メールアドレス】\n[your_email]\n\n【お問い合わせ詳細】\n[your_message]\n\n内容を確認のうえ、担当者よりご連絡いたします。\n\n[site_name]\n[site_url]",

    'entry_admin_subject' => '[' . get_bloginfo('name') . '] 採用エントリー / [entry_position]',
    'entry_admin_body'    => "採用エントリーがありました。\n\n【希望職種】\n[entry_position]\n\n【雇用形態】\n[entry_type]\n\n【お名前】\n[your_name]\n\n【ふりがな】\n[your_kana]\n\n【住所】\n[your_address]\n\n【電話番号】\n[your_tel]\n\n【メールアドレス】\n[your_email]\n\n【性別】\n[entry_gender]\n\n【現在の状況】\n[entry_status]\n\n【自己PR】\n[your_message]\n\n【送信日時】\n[date]\n【サイト名】\n[site_name]\n【サイトURL】\n[site_url]",
    'entry_auto_reply_enabled' => '1',
    'entry_auto_reply_subject' => '[' . get_bloginfo('name') . '] エントリーありがとうございます',
    'entry_auto_reply_body'    => "[your_name] 様\n\nこの度はエントリーいただきありがとうございます。\n以下の内容で受け付けました。\n\n【希望職種】\n[entry_position]\n\n【雇用形態】\n[entry_type]\n\n【お名前】\n[your_name]\n\n【住所】\n[your_address]\n\n【電話番号】\n[your_tel]\n\n【メールアドレス】\n[your_email]\n\n【性別】\n[entry_gender]\n\n【現在の状況】\n[entry_status]\n\n【自己PR】\n[your_message]\n\n内容を確認のうえ、担当者よりご連絡いたします。\n\n[site_name]\n[site_url]",
  ];

  $settings = get_option('my_contact_settings', []);
  if (!is_array($settings)) {
    $settings = [];
  }

  return wp_parse_args($settings, $defaults);
}

/* -----------------------------
 * 管理画面 共通設定
 * ----------------------------- */
function my_contact_common_settings_page() {
  $settings = my_contact_get_settings();
  ?>
  <div class="wrap">
    <h1>共通設定</h1>
    <form method="post" action="options.php">
      <?php settings_fields('my_contact_common_settings_group'); ?>

      <table class="form-table">
        <tr>
          <th scope="row">Reply-To の設定</th>
          <td>
            <label>
              <input type="radio" name="my_contact_settings[reply_to_mode]" value="user" <?php checked($settings['reply_to_mode'], 'user'); ?>>
              入力者メールアドレスを Reply-To にする
            </label><br>
            <label>
              <input type="radio" name="my_contact_settings[reply_to_mode]" value="fixed" <?php checked($settings['reply_to_mode'], 'fixed'); ?>>
              固定の Reply-To を使う
            </label>
          </td>
        </tr>

        <tr>
          <th scope="row"><label for="fixed_reply_to">固定 Reply-To</label></th>
          <td>
            <input type="email" id="fixed_reply_to" name="my_contact_settings[fixed_reply_to]" class="regular-text" value="<?php echo esc_attr($settings['fixed_reply_to']); ?>">
          </td>
        </tr>

        <tr>
          <th scope="row"><label for="sender_email">送信元メールアドレス</label></th>
          <td>
            <input type="email" id="sender_email" name="my_contact_settings[sender_email]" class="regular-text" value="<?php echo esc_attr($settings['sender_email']); ?>">
          </td>
        </tr>

        <tr>
          <th scope="row"><label for="recaptcha_site_key">reCAPTCHA v2 Site Key</label></th>
          <td>
            <input type="text" id="recaptcha_site_key" name="my_contact_settings[recaptcha_site_key]" class="regular-text" value="<?php echo esc_attr($settings['recaptcha_site_key']); ?>">
          </td>
        </tr>

        <tr>
          <th scope="row"><label for="recaptcha_secret_key">reCAPTCHA v2 Secret Key</label></th>
          <td>
            <input type="text" id="recaptcha_secret_key" name="my_contact_settings[recaptcha_secret_key]" class="regular-text" value="<?php echo esc_attr($settings['recaptcha_secret_key']); ?>">
          </td>
        </tr>

        <tr>
          <th scope="row">差し込みタグ一覧</th>
          <td>
            <p><code>[site_name]</code> <code>[site_url]</code> <code>[date]</code></p>
            <p><strong>共通</strong>： <code>[your_name]</code> <code>[your_kana]</code> <code>[your_address]</code> <code>[your_tel]</code> <code>[your_email]</code> <code>[your_message]</code></p>
            <p><strong>お問い合わせ</strong>： <code>[menu]</code> <code>[your_office]</code></p>
            <p><strong>採用</strong>： <code>[entry_position]</code> <code>[entry_type]</code> <code>[entry_gender]</code> <code>[entry_status]</code></p>
          </td>
        </tr>
      </table>

      <?php submit_button('共通設定を保存'); ?>
    </form>
  </div>
  <?php
}

/* -----------------------------
 * 管理画面 お問い合わせ設定
 * ----------------------------- */
function my_contact_contact_settings_page() {
  $settings = my_contact_get_settings();
  ?>
  <div class="wrap">
    <h1>お問い合わせ設定</h1>
    <form method="post" action="options.php">
      <?php settings_fields('my_contact_contact_settings_group'); ?>

      <table class="form-table">
        <tr>
          <th scope="row"><label for="contact_notify_to">お問い合わせ通知先</label></th>
          <td>
            <input type="email" id="contact_notify_to" name="my_contact_settings[contact_notify_to]" class="regular-text" value="<?php echo esc_attr($settings['contact_notify_to']); ?>">
          </td>
        </tr>

        <tr>
          <th scope="row"><label for="contact_admin_subject">お問い合わせ 通知メール件名</label></th>
          <td>
            <input type="text" id="contact_admin_subject" name="my_contact_settings[contact_admin_subject]" class="large-text" value="<?php echo esc_attr($settings['contact_admin_subject']); ?>">
          </td>
        </tr>

        <tr>
          <th scope="row"><label for="contact_admin_body">お問い合わせ 通知メール本文</label></th>
          <td>
            <textarea id="contact_admin_body" name="my_contact_settings[contact_admin_body]" class="large-text code" rows="12"><?php echo esc_textarea($settings['contact_admin_body']); ?></textarea>
          </td>
        </tr>

        <tr>
          <th scope="row">お問い合わせ 自動返信</th>
          <td>
            <label>
              <input type="checkbox" name="my_contact_settings[contact_auto_reply_enabled]" value="1" <?php checked($settings['contact_auto_reply_enabled'], '1'); ?>>
              有効にする
            </label>
          </td>
        </tr>

        <tr>
          <th scope="row"><label for="contact_auto_reply_subject">お問い合わせ 自動返信件名</label></th>
          <td>
            <input type="text" id="contact_auto_reply_subject" name="my_contact_settings[contact_auto_reply_subject]" class="large-text" value="<?php echo esc_attr($settings['contact_auto_reply_subject']); ?>">
          </td>
        </tr>

        <tr>
          <th scope="row"><label for="contact_auto_reply_body">お問い合わせ 自動返信本文</label></th>
          <td>
            <textarea id="contact_auto_reply_body" name="my_contact_settings[contact_auto_reply_body]" class="large-text code" rows="12"><?php echo esc_textarea($settings['contact_auto_reply_body']); ?></textarea>
          </td>
        </tr>
      </table>

      <?php submit_button('お問い合わせ設定を保存'); ?>
    </form>
  </div>
  <?php
}

/* -----------------------------
 * 管理画面 採用設定
 * ----------------------------- */
function my_contact_entry_settings_page() {
  $settings = my_contact_get_settings();
  ?>
  <div class="wrap">
    <h1>採用エントリー設定</h1>
    <form method="post" action="options.php">
      <?php settings_fields('my_contact_entry_settings_group'); ?>

      <table class="form-table">
        <tr>
          <th scope="row"><label for="entry_notify_to">採用エントリー通知先</label></th>
          <td>
            <input type="email" id="entry_notify_to" name="my_contact_settings[entry_notify_to]" class="regular-text" value="<?php echo esc_attr($settings['entry_notify_to']); ?>">
          </td>
        </tr>

        <tr>
          <th scope="row"><label for="entry_admin_subject">採用 通知メール件名</label></th>
          <td>
            <input type="text" id="entry_admin_subject" name="my_contact_settings[entry_admin_subject]" class="large-text" value="<?php echo esc_attr($settings['entry_admin_subject']); ?>">
          </td>
        </tr>

        <tr>
          <th scope="row"><label for="entry_admin_body">採用 通知メール本文</label></th>
          <td>
            <textarea id="entry_admin_body" name="my_contact_settings[entry_admin_body]" class="large-text code" rows="12"><?php echo esc_textarea($settings['entry_admin_body']); ?></textarea>
          </td>
        </tr>

        <tr>
          <th scope="row">採用 自動返信</th>
          <td>
            <label>
              <input type="checkbox" name="my_contact_settings[entry_auto_reply_enabled]" value="1" <?php checked($settings['entry_auto_reply_enabled'], '1'); ?>>
              有効にする
            </label>
          </td>
        </tr>

        <tr>
          <th scope="row"><label for="entry_auto_reply_subject">採用 自動返信件名</label></th>
          <td>
            <input type="text" id="entry_auto_reply_subject" name="my_contact_settings[entry_auto_reply_subject]" class="large-text" value="<?php echo esc_attr($settings['entry_auto_reply_subject']); ?>">
          </td>
        </tr>

        <tr>
          <th scope="row"><label for="entry_auto_reply_body">採用 自動返信本文</label></th>
          <td>
            <textarea id="entry_auto_reply_body" name="my_contact_settings[entry_auto_reply_body]" class="large-text code" rows="12"><?php echo esc_textarea($settings['entry_auto_reply_body']); ?></textarea>
          </td>
        </tr>
      </table>

      <?php submit_button('採用設定を保存'); ?>
    </form>
  </div>
  <?php
}

/* -----------------------------
 * 差し込みタグ置換
 * ----------------------------- */
function my_contact_replace_tags($template, $data) {
  $replacements = [
    '[site_name]'      => get_bloginfo('name'),
    '[site_url]'       => home_url('/'),
    '[date]'           => wp_date('Y-m-d H:i:s'),

    '[menu]'           => $data['menu'] ?? '',
    '[your_name]'      => $data['your_name'] ?? '',
    '[your_kana]'      => $data['your_kana'] ?? '',
    '[your_office]'    => $data['your_office'] ?? '',
    '[your_address]'   => $data['your_address'] ?? '',
    '[your_tel]'       => $data['your_tel'] ?? '',
    '[your_email]'     => $data['your_email'] ?? '',
    '[your_message]'   => $data['your_message'] ?? '',

    '[entry_position]' => $data['entry_position'] ?? '',
    '[entry_type]'     => $data['entry_type'] ?? '',
    '[entry_gender]'   => $data['entry_gender'] ?? '',
    '[entry_status]'   => $data['entry_status'] ?? '',
  ];

  return strtr((string) $template, $replacements);
}

/* -----------------------------
 * wp_mail 差出人
 * ----------------------------- */
add_filter('wp_mail_from', function ($from_email) {
  $settings = my_contact_get_settings();
  if (!empty($settings['sender_email']) && is_email($settings['sender_email'])) {
    return $settings['sender_email'];
  }
  return $from_email;
});

add_filter('wp_mail_from_name', function ($from_name) {
  return get_bloginfo('name');
});

/* -----------------------------
 * reCAPTCHA script
 * ----------------------------- */
add_action('wp_enqueue_scripts', function () {
  $settings = my_contact_get_settings();

  if (!empty($settings['recaptcha_site_key'])) {
    wp_enqueue_script(
      'google-recaptcha-v2',
      'https://www.google.com/recaptcha/api.js',
      [],
      null,
      true
    );
  }
});

/* -----------------------------
 * flash
 * ----------------------------- */
function my_contact_store_flash($data) {
  $token = wp_generate_password(20, false, false);
  set_transient('my_contact_flash_' . $token, $data, 10 * MINUTE_IN_SECONDS);
  return $token;
}

function my_contact_get_flash($token) {
  if (!$token) return null;
  $data = get_transient('my_contact_flash_' . $token);
  if ($data) {
    delete_transient('my_contact_flash_' . $token);
  }
  return $data;
}

/* -----------------------------
 * フォーム状態取得
 * ----------------------------- */
function my_contact_get_form_state() {
  $flash = null;

  if (!empty($_GET['contact_token'])) {
    $flash = my_contact_get_flash(sanitize_text_field($_GET['contact_token']));
  }

  return [
    'errors'   => $flash['errors'] ?? [],
    'old'      => $flash['old'] ?? [],
    'status'   => $flash['status'] ?? '',
    'message'  => $flash['message'] ?? '',
    'settings' => my_contact_get_settings(),
  ];
}

/* -----------------------------
 * reCAPTCHA v2 検証
 * ----------------------------- */
function my_contact_verify_recaptcha($token) {
  $settings = my_contact_get_settings();

  if (empty($settings['recaptcha_secret_key'])) {
    return true;
  }

  if (empty($token)) {
    return false;
  }

  $response = wp_remote_post('https://www.google.com/recaptcha/api/siteverify', [
    'timeout' => 10,
    'body' => [
      'secret'   => $settings['recaptcha_secret_key'],
      'response' => $token,
      'remoteip' => $_SERVER['REMOTE_ADDR'] ?? '',
    ],
  ]);

  if (is_wp_error($response)) {
    return false;
  }

  $body = json_decode(wp_remote_retrieve_body($response), true);
  return !empty($body['success']);
}

/* -----------------------------
 * レート制限
 * ----------------------------- */
function my_contact_rate_limit_check() {
  $ip = $_SERVER['REMOTE_ADDR'] ?? '';
  if (!$ip) return true;

  $key = 'my_contact_rate_' . md5($ip);
  $count = (int) get_transient($key);

  if ($count >= 5) {
    return false;
  }

  set_transient($key, $count + 1, HOUR_IN_SECONDS);
  return true;
}

/* -----------------------------
 * バリデーション
 * ----------------------------- */
function my_contact_validate_input($data, $form_type = 'contact') {
  $errors = [];

  if (empty($data['your_name'])) {
    $errors['your_name'] = 'お名前を入力してください。';
  }

  if (empty($data['your_address'])) {
    $errors['your_address'] = '住所を入力してください。';
  }

  if (empty($data['your_tel'])) {
    $errors['your_tel'] = '電話番号を入力してください。';
  } elseif (!preg_match('/^[0-9\-\+\(\)\s]{8,20}$/', $data['your_tel'])) {
    $errors['your_tel'] = '電話番号の形式が正しくありません。';
  }

  if (empty($data['your_email'])) {
    $errors['your_email'] = 'メールアドレスを入力してください。';
  } elseif (!is_email($data['your_email'])) {
    $errors['your_email'] = 'メールアドレスの形式が正しくありません。';
  }

  if (empty($data['your_message'])) {
    $errors['your_message'] = '内容を入力してください。';
  } elseif (mb_strlen($data['your_message']) > 2000) {
    $errors['your_message'] = '2000文字以内で入力してください。';
  }

  if (empty($data['acceptance'])) {
    $errors['acceptance'] = 'プライバシーポリシーへの同意が必要です。';
  }

  if ($form_type === 'contact') {
    if (empty($data['menu'])) {
      $errors['menu'] = 'お問い合わせ内容を選択してください。';
    }
    if (empty($data['your_office'])) {
      $errors['your_office'] = '医院名、事業所名を入力してください。';
    }
  }

  if ($form_type === 'entry') {
    if (empty($data['entry_position'])) {
      $errors['entry_position'] = '希望職種を選択してください。';
    }
    if (empty($data['entry_type'])) {
      $errors['entry_type'] = '雇用形態を選択してください。';
    }
  }

  return $errors;
}

/* -----------------------------
 * 送信処理
 * ----------------------------- */
add_action('admin_post_nopriv_my_contact_submit', 'my_contact_handle_submit');
add_action('admin_post_my_contact_submit', 'my_contact_handle_submit');

function my_contact_handle_submit() {
  if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    wp_safe_redirect(home_url('/contact/'));
    exit;
  }

  $form_type = sanitize_text_field($_POST['form_type'] ?? 'contact');
  $form_type = ($form_type === 'entry') ? 'entry' : 'contact';

  $redirect_url = ($form_type === 'entry')
    ? home_url('/recruit/entry/')
    : home_url('/contact/');

  if (!isset($_POST['my_contact_nonce']) || !wp_verify_nonce($_POST['my_contact_nonce'], 'my_contact_submit')) {
    $token = my_contact_store_flash([
      'status' => 'error',
      'errors' => ['common' => '不正なリクエストです。'],
      'old' => [],
    ]);
    wp_safe_redirect(add_query_arg('contact_token', $token, $redirect_url));
    exit;
  }

  if (!empty($_POST['website'])) {
    $token = my_contact_store_flash([
      'status' => 'error',
      'errors' => ['common' => '送信に失敗しました。'],
      'old' => [],
    ]);
    wp_safe_redirect(add_query_arg('contact_token', $token, $redirect_url));
    exit;
  }

  // $form_started = isset($_POST['form_started']) ? (int) $_POST['form_started'] : 0;
  // if (!$form_started || (time() - $form_started) < 3) {
  //   $token = my_contact_store_flash([
  //     'status' => 'error',
  //     'errors' => ['common' => '送信が早すぎます。時間を置いて再度お試しください。'],
  //     'old' => [],
  //   ]);
  //   wp_safe_redirect(add_query_arg('contact_token', $token, $redirect_url));
  //   exit;
  // }

  // if (!my_contact_rate_limit_check()) {
  //   $token = my_contact_store_flash([
  //     'status' => 'error',
  //     'errors' => ['common' => '短時間に送信が集中しています。しばらくしてから再度お試しください。'],
  //     'old' => [],
  //   ]);
  //   wp_safe_redirect(add_query_arg('contact_token', $token, $redirect_url));
  //   exit;
  // }

  $data = [
    'menu'           => sanitize_text_field($_POST['menu'] ?? ''),
    'your_name'      => sanitize_text_field($_POST['your_name'] ?? ''),
    'your_kana'      => sanitize_text_field($_POST['your_kana'] ?? ''),
    'your_office'    => sanitize_text_field($_POST['your_office'] ?? ''),
    'your_address'   => sanitize_text_field($_POST['your_address'] ?? ''),
    'your_tel'       => sanitize_text_field($_POST['your_tel'] ?? ''),
    'your_email'     => sanitize_email($_POST['your_email'] ?? ''),
    'your_message'   => sanitize_textarea_field($_POST['your_message'] ?? ''),
    'entry_position' => sanitize_text_field($_POST['entry_position'] ?? ''),
    'entry_type'     => sanitize_text_field($_POST['entry_type'] ?? ''),
    'entry_gender'   => sanitize_text_field($_POST['entry_gender'] ?? ''),
    'entry_status'   => sanitize_text_field($_POST['entry_status'] ?? ''),
    'acceptance'     => !empty($_POST['acceptance']) ? '1' : '',
  ];

  $errors = my_contact_validate_input($data, $form_type);

  $recaptcha_token = sanitize_text_field($_POST['g-recaptcha-response'] ?? '');
  if (!my_contact_verify_recaptcha($recaptcha_token)) {
    $errors['recaptcha'] = 'reCAPTCHAの認証に失敗しました。';
  }

  if (!empty($errors)) {
    $token = my_contact_store_flash([
      'status' => 'error',
      'errors' => $errors,
      'old' => $data,
    ]);
    wp_safe_redirect(add_query_arg('contact_token', $token, $redirect_url));
    exit;
  }

  $settings = my_contact_get_settings();

  $reply_to = '';
  if ($settings['reply_to_mode'] === 'fixed' && is_email($settings['fixed_reply_to'])) {
    $reply_to = $settings['fixed_reply_to'];
  } elseif (is_email($data['your_email'])) {
    $reply_to = $data['your_email'];
  }

  if ($form_type === 'entry') {
    $admin_to      = $settings['entry_notify_to'];
    $admin_subject = my_contact_replace_tags($settings['entry_admin_subject'], $data);
    $admin_body    = my_contact_replace_tags(wp_strip_all_tags($settings['entry_admin_body']), $data);

    $auto_enabled  = ($settings['entry_auto_reply_enabled'] ?? '0') === '1';
    $auto_subject  = my_contact_replace_tags($settings['entry_auto_reply_subject'], $data);
    $auto_body     = my_contact_replace_tags(wp_strip_all_tags($settings['entry_auto_reply_body']), $data);
  } else {
    $admin_to      = $settings['contact_notify_to'];
    $admin_subject = my_contact_replace_tags($settings['contact_admin_subject'], $data);
    $admin_body    = my_contact_replace_tags(wp_strip_all_tags($settings['contact_admin_body']), $data);

    $auto_enabled  = ($settings['contact_auto_reply_enabled'] ?? '0') === '1';
    $auto_subject  = my_contact_replace_tags($settings['contact_auto_reply_subject'], $data);
    $auto_body     = my_contact_replace_tags(wp_strip_all_tags($settings['contact_auto_reply_body']), $data);
  }

  $admin_body .= "\n\n【送信元IP】\n" . ($_SERVER['REMOTE_ADDR'] ?? '取得不可');
  $admin_body .= "\n\n【User-Agent】\n" . ($_SERVER['HTTP_USER_AGENT'] ?? '取得不可');

  $admin_headers = ['Content-Type: text/plain; charset=UTF-8'];
  if ($reply_to) {
    $admin_headers[] = 'Reply-To: ' . $reply_to;
  }

  $admin_sent = wp_mail($admin_to, $admin_subject, $admin_body, $admin_headers);

  $auto_sent = true;
  if ($auto_enabled && is_email($data['your_email'])) {
    $auto_headers = ['Content-Type: text/plain; charset=UTF-8'];
    $auto_sent = wp_mail($data['your_email'], $auto_subject, $auto_body, $auto_headers);
  }

  if (!$admin_sent) {
    $token = my_contact_store_flash([
      'status' => 'error',
      'errors' => ['common' => 'メール送信に失敗しました。時間をおいて再度お試しください。'],
      'old' => $data,
    ]);
    wp_safe_redirect(add_query_arg('contact_token', $token, $redirect_url));
    exit;
  }

  $thanks_url = ($form_type === 'entry')
  ? home_url('/entry-thanks/')
  : home_url('/contact-thanks/');

  wp_safe_redirect($thanks_url);
  exit;
}

/* -----------------------------
 * CF7停止（必要なら）
 * ----------------------------- */
add_action('wp_enqueue_scripts', function () {
  if (is_page(['contact', 'entry']) || is_page([/* 問い合わせID, 採用ID */])) {
    wp_dequeue_script('contact-form-7');
    wp_dequeue_script('swv');
    wp_dequeue_style('contact-form-7');
  }
}, 100);