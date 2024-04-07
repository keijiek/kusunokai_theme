<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?php bloginfo('description'); ?>">
  <?php if (is_user_logged_in()) : ?>
    <!-- <style type="text/css">
      #js_globalNavbar {
        top: 32px !important;
      }
    </style> -->
  <?php endif; ?>
  <?php wp_head(); ?>
</head>
