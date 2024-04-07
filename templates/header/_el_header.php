<header class="bg-kusu-main">
  <div class="container-fluid">
    <h1 class="my-0 pt-3 fw-semibold">
      <a href="<?= get_home_url() ?>" class="text-kusu-txt text-decoration-none">
        <?= get_bloginfo() ?>
      </a>
    </h1>
    <p class="text-kusu-txt mb-2" style="font-size: 16px"><?= bloginfo('description') ?></p>
  </div>
  <?php
  get_template_part('templates/drawer_menu/drawer_menu');
  wp_nav_menu(header_nav_arg());
  ?>
</header>

<?php

function header_nav_arg(string $menu_slug = HEADER_MENU): array
{
  return [
    'menu' => $menu_slug,
    'container' => 'nav',
    'container_class' => 'd-none d-md-block container-fluid px-0',
    'container_id' => 'js_headerNavPanel',
    'menu_class' => 'list-unstyled d-flex bg-kusu-sub m-0',
    'menu_id' => '',
    'container_aria_label' => 'グローバルナヴィゲーション',
    // 'fallback_cb' => 'wp_page_menu',
    // 'before' => '',
    // 'after' => '',
    // 'link_before' => '',
    // 'link_after' => '',
    // 'echo' => false,
    // 'depth' => 0,
    // 'walker' => '',
    'theme_location' => $menu_slug,
    // 'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
    // 'item_spacing' => 'preserve'
  ];
}

function fixed_navbar()
{
  $menu_slug = HEADER_MENU;
  return wp_nav_menu([
    'menu' => $menu_slug,
    'container' => 'nav',
    'container_class' => 'd-none d-md-block container-fluid px-0',
    'container_id' => 'js_fixedNavBar',
    'menu_class' => 'list-unstyled d-flex bg-kusu-sub m-0',
    'menu_id' => '',
    'container_aria_label' => 'グローバルナヴィゲーション',
    // 'fallback_cb' => 'wp_page_menu',
    // 'before' => '',
    // 'after' => '',
    // 'link_before' => '',
    // 'link_after' => '',
    'echo' => false,
    // 'depth' => 0,
    // 'walker' => '',
    'theme_location' => $menu_slug,
    // 'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
    // 'item_spacing' => 'preserve'
  ]);
}
