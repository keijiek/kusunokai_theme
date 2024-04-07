<?php

namespace initial_config\enqueue_scripts;

// add_action('admin_enqueue_scripts', 'initial_config\enqueue_scripts\admin_enqueue_scripts');
function admin_enqueue_scripts()
{
  $admin_style = 'admin_style';
  $file_path = __ROOT__ . '/assets/modules/admin_css/rakuyoo_admin_style.css';
  wp_enqueue_style(
    $admin_style, //ハンドル
    get_stylesheet_directory_uri() . '/assets/modules/admin_css/rakuyoo_admin_style.css', //URL
    [], //依存関係
    filemtime(get_theme_file_path('/assets/modules/admin_css/rakuyoo_admin_style.css')) //バージョン番号
  );
}
