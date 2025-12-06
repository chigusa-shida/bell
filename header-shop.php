<!DOCTYPE html>
<html <?php language_attributes() ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="description" content="<?php echo esc_html(meta_description()); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <!-- <link rel="icon" href="./assets/images/fav.png" /> -->
  <!--facebook用-->
  <meta property="og:title" content="TOP" />
  <meta name="description" content="<?php echo esc_html(meta_description()); ?>">
  <meta property="og:url" content="" />
  <meta property="og:image" content="" /><!--絶対パスで記述-->
  <meta property="og:type" content="website" />
  <meta property="og:site_name" content="TOP" />
  <meta property="og:locale" content="ja_JP" />
  <!--twitter用-->
  <meta name="twitter:card" content="summary_large_image" /><!-- summary summary_large_image photo gallery appから選ぶ -->
  <!-- <meta name="twitter:site" content="" /> --><!--twitterがあれば記述-->
  <meta name="twitter:title" content="TOP" />
  <meta name="twitter:url" content="" />
  <meta name="description" content="<?php echo esc_html(meta_description()); ?>">
  <meta name="twitter:image" content="" /><!--絶対パスで記述-->

  <?php wp_head(); ?>
</head>

<body <?php body_class() ?>>
  <?php wp_body_open() ?>