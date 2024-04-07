<?php

namespace initial_config\customize_features;

/**
 * 特定のページの表示において、p タグの自動挿入を止める。
 */
// add_filter('the_content', 'customize_features\wpautop_filter', 9);
function wpautop_filter($content)
{
  global $post;
  $remove_filter = false;

  //自動整形を無効にする投稿タイプを記述 ＝固定ページ
  // $arr_types = array('page');
  $arr_types = ['page'];
  $post_type = get_post_type($post->ID);
  if (in_array($post_type, $arr_types)) {
    $remove_filter = true;
  }

  //投稿ページ以外の自動整形を無効にしたければ
  if (!is_single()) {
    $remove_filter = true;
  }

  // 特定のページの自動整形を無効にしたければ*****にページIDを入れる
  // if (get_the_ID() == "*****") {
  //   $remove_filter = true;
  // }

  // 処理の根幹。
  // 判定をせず、単純に、`remove_filter('the_content', 'wpautop');`を the_content() の前に書くだけでも p と br の出力を止めることが可能。
  if ($remove_filter) {
    remove_filter('the_content', 'wpautop');
    remove_filter('the_excerpt', 'wpautop');
  }
  return $content;
}
