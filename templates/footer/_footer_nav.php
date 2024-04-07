<?php
wp_nav_menu([
  'menu' => FOOTER_MENU,
  'menu_class' => 'd-flex flex-column flex-lg-row justify-content-center gap-3 list-unstyled',
  'menu_id' => '',
  'container' => 'nav',
  'container_class' => '',
  'container_id' => 'navbarNavDropdown',
  'container_aria_label' => 'フッターメニュー',
  // 'fallback_cb' => 'wp_page_menu',
  // 'before' => '',
  // 'after' => '',
  // 'link_before' => '',
  // 'link_after' => '',
  // 'echo' => true,
  // 'depth' => 0,
  // 'walker' => '',
  'theme_location' => FOOTER_MENU,
  // 'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
  // 'item_spacing' => 'preserve'
]);
