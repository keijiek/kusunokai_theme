<?php

namespace initial_config;

add_action('after_setup_theme', 'initial_config\register_menus');
function register_menus()
{
  // メニュの登録, slug名 => 管理画面での文字列, wp_nav_menu($args)を使って表示。
  register_nav_menus([
    COMMON_MENU => COMMON_MENU,
    BOOTSTRAP_MENU => BOOTSTRAP_MENU,
    DRAWER_MENU => DRAWER_MENU,
    HEADER_MENU => HEADER_MENU,
    FOOTER_MENU => FOOTER_MENU
  ]);
}

/**
 * nav_menu_css_class フックの処理に介入。
 * wp_nav_menu で出力される li の class を変える。bootstrap の navbar コンポーネント用の class を追加したり。
 */
function exchange_classes_to_nav_menu_items($classes, $item, $args, $depth)
{
  if ($args->theme_location === HEADER_MENU) {
    $new_classes = ['border-end', 'border-light', 'border-1'];
    if ($item->current) {
      $new_classes[] = 'active';
    }
    return $new_classes;
  }
  return $classes;
}
add_filter('nav_menu_css_class', 'initial_config\exchange_classes_to_nav_menu_items', 10, 4);

/**
 * 上記で regist した menu を wp_nav_menu で出力する時の a タグに、
 * bootstrap の navbar コンポーネント用の class (nav-link active)を付けるようにする。
 * nav_menu_link_attributes フックに対して処理。
 */
function add_classes_to_nav_menu_links($atts, $item, $args, $depth)
{

  if ($args->theme_location === HEADER_MENU) {
    $atts['class'] = 'text-white btn btn-kusu-sub rounded-0';
    if ($item->current) {
      $atts['class'] .= ' active';
    }
    return $atts;
  }
  return $atts;
}
add_filter('nav_menu_link_attributes', 'initial_config\add_classes_to_nav_menu_links', 10, 4);
