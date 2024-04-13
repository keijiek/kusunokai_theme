<?php
get_template_part(TEMPLATE_HEADER);
$section_classes = common_atts\section_class();
?>
<section class="<?= $section_classes ?>">
  <h2>404:お探しのページは見つかりません</h2>
  <?= navmenu_404() ?>
</section>
<?php
get_template_part(TEMPLATE_FOOTER);

function navmenu_404(): string
{
  return wp_nav_menu([
    'theme_location' => COMMON_MENU,
    'menu' => '',
    'container' => 'nav',
    'container_class' => 'my-4',
    'container_id' => '',
    'menu_class' => 'd-flex flex-column gap-3',
    // 'menu_id' => '',
    'container_aria_label' => '404メニュー',
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
