<div id="js_globalMenuWholePanel" class="d-block d-md-none container-fluid position-fixed top-0 start-0 ">

  <!-- メニュ, d-none と d-block を切り替える -->
  <nav id="js_drawerMenu" class="d-none position-fixed top-0 start-0 w-100 bg-white opacity-75 text-kusu-txt">
    <?php wp_nav_menu(wp_nav_drawer_menu_args()); ?>
  </nav>
  <!-- ボタン -->
  <button id="js_drawerIcon" type="button" class="bg-kusu-sub position-fixed top-0 end-0 bl_hambrugerIcon" style="width:50px;height:70px">
    <div aria-hidden="true" role="presentation" class="bl_hambrugerIcon_barWrap d-flex w-100 h-100 g-3 flex-column justify-content-center align-items-center" style="height: 50px; width:100%;">
      <span class="el_hambrugerBar"></span>
      <span class="el_hambrugerBar"></span>
      <span class="el_hambrugerBar"></span>
    </div>
    <span class="text-white d-block el_hambrugerLabel">menu</span>
  </button>
</div>

<?php
function wp_nav_drawer_menu_args(): array
{
  return [
    'menu' => DRAWER_MENU,
    'menu_class' => '',
    // 'menu_id' => '',
    'container' => '',
    'container_class' => '',
    'container_id' => '',
    'container_aria_label' => 'グローバルメニュ',
    'fallback_cb' => 'wp_page_menu',
    // 'before' => '',
    // 'after' => '',
    // 'link_before' => '',
    // 'link_after' => '',
    'echo' => true,
    'depth' => 0,
    // 'walker' => '',
    'theme_location' => DRAWER_MENU,
    // 'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
    // 'item_spacing' => 'preserve'
  ];
}

function wp_nav_fixed_menu_args(): array
{
  return [
    'menu' => HEADER_MENU,
    'menu_class' => 'navbar-nav',
    // 'menu_id' => '',
    'container' => 'nav',
    'container_class' => 'd-none d-md-block container-fluid px-0',
    'container_id' => 'navbarNavDropdown',
    'container_aria_label' => 'グローバルメニュー',
    'fallback_cb' => 'wp_page_menu',
    // 'before' => '',
    // 'after' => '',
    // 'link_before' => '',
    // 'link_after' => '',
    'echo' => true,
    'depth' => 0,
    // 'walker' => '',
    'theme_location' => HEADER_MENU,
    // 'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
    // 'item_spacing' => 'preserve'
  ];
}
