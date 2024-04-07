<?php

namespace initial_config;

/**
 * 固定ページの編集画面でビジュアルエディターを禁止する
 *
 * @param [type] $wp_rich_edit
 * @return void
 */
function disable_visual_editor($wp_rich_edit)
{
  $posttype = get_post_type();
  if ($posttype === 'page') {
    return false;
  } else {
    return $wp_rich_edit;
  }
}
// add_filter('user_can_richedit', 'disable_visual_editor');

/**
 * カスタム投稿「施設情報の編集($typenow == CUSTOM_POST_TYPE__HOME_INFORMATIONS)」の編集画面をビジュアルエディターに固定。
 *
 * @return void
 */
// function disable_visual_editor_in_page()
// {
//   global $typenow;
//   if ($typenow == CUSTOM_POST_TYPE__HOME_INFORMATIONS) {
//     add_filter('user_can_richedit', 'disable_visual_editor_filter');
//   }
// }
// function disable_visual_editor_filter()
// {
//   return false;
// }
// add_action('load-post.php', 'disable_visual_editor_in_page');
// add_action('load-post-new.php', 'disable_visual_editor_in_page');
