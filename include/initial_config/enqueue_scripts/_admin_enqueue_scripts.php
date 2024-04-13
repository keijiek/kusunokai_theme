<?php

namespace initial_config\enqueue_scripts;

add_action('admin_enqueue_scripts', 'initial_config\enqueue_scripts\admin_enqueue_scripts');
function admin_enqueue_scripts()
{
  $admin_style = 'admin_style';
  $file_path = '/assets/css/admin.css';
  wp_enqueue_style(
    $admin_style, //ハンドル
    get_stylesheet_directory_uri() . $file_path, //URL
    [], //依存関係
    filemtime(get_theme_file_path($file_path)) //バージョン番号
  );
}
