<?php

namespace initial_config;

/** ************************************************************************
 * widgets_init (処理順番2)
 * ウィジェットを登録できるサイドバーを登録。
 */
add_action('widgets_init', 'initial_config\register_widgets');
function register_widgets()
{
  register_sidebar(
    array(
      'name' => 'Sidebar',
      'id' => 'sidebar-1',
      'description' => 'widgets をここに付加',
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget' => '</section>',
      'before_title' => '<h2 class="el_widgetTitle">',
      'after_title' => '</h2>',
    )
  );
}
