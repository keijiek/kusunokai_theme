<?php
$header_dir = 'templates/header_v2';
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<?php get_template_part($header_dir . '/_el_head'); ?>

<body <?php body_class(); ?> id="top_of_page">
  <?php wp_body_open(); ?>
  <header class="bg-kusu-main sticky-top">
    <div class="container-xxl" role="presentation">
      <h1>宮崎県楠の会</h1>
    </div>
    <div>
      <button class="btn btn-primary d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasResponsive" aria-controls="offcanvasResponsive">
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
          <path stroke="white" stroke-width="0.7" fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
        </svg>
        <span class="d-block">menu</span>
      </button>

      <div class="offcanvas-lg offcanvas-end pt-4" tabindex="-1" id="offcanvasResponsive" aria-labelledby="offcanvasResponsiveLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title text-kusu-txt" id="offcanvasResponsiveLabel">Responsive offcanvas</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasResponsive" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">

          <?= bootstrap_navbar() ?>
        </div>
      </div>
    </div>
  </header>
  <main class="container">
    <div class="container-xxl" role="presentation">


      <?php
      function bootstrap_navbar(): string
      {
        return wp_nav_menu([
          'theme_location' => COMMON_MENU,
          'container' => 'nav',
          'container_class' => '',
          'container_id' => '',
          'menu' => '',
          'menu_class' => 'list-unstyled d-flex flex-column flex-lg-row gap-2 ',
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
