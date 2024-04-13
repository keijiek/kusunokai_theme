<div class="pt-0">
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <!-- Hero -->
      <a class="navbar-brand fs-2 text-kusu-txt fw-bold" href="/">宮崎県楠の会</a>
      <!-- nav button -->
      <button class="navbar-toggler bg-kusu-sub text-white p-1 border-0 focus-ring focus-ring-kusu-main" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="メニューボタン">
        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
          <path stroke="white" stroke-width="0.7" fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
        </svg>
      </button>
      <!-- nav menu -->
      <?= bootstrap_navbar(); ?>
    </div>
  </nav>
</div>

<?php
function bootstrap_navbar(): string
{
  return wp_nav_menu([
    'theme_location' => BOOTSTRAP_MENU,
    'menu' => '',
    'container' => 'div',
    'container_class' => 'collapse navbar-collapse',
    'container_id' => 'navbarSupportedContent',
    'menu_class' => 'navbar-nav ms-lg-2 me-lg-auto mb-lg-2 mb-lg-0',
    // 'menu_id' => '',
    'container_aria_label' => 'グローバルメニュー',
    // 'fallback_cb' => 'wp_page_menu',
    // 'before' => '',
    // 'after' => '',
    // 'link_before' => '',
    // 'link_after' => '',
    'echo' => false,
    // 'depth' => 0,
    // 'walker' => '',
    // 'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
    // 'item_spacing' => 'preserve'
  ]);
}
