<?php

namespace initial_config;

/** ************************************************************************
 * after_theme_setup (処理順番1)
 * 備え付けの機能を活性化。
 */
add_action('after_setup_theme', 'initial_config\activate_essentials');
function activate_essentials()
{
  // 【必須】: html 文字列が、第二引数に指定した箇所で html5 準拠になる。
  add_theme_support('html5', ['comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script']);

  // 【必須】: <title> タグを自動で挿入する機能を活性化
  add_theme_support('title-tag');

  // 【必須】: サムネイル機能の活性化。第二引数は、サムネイル活性化の対象となる投稿タイプなどのスラグの配列(例: ['post','page'])
  add_theme_support('post-thumbnails');

  // ウィジェット更新時の自動再読み込み
  add_theme_support('customize-selective-refresh-widgets');

  // RSS feed の追加, 今どきこれは要るのか？
  // add_theme_support('automatic-feed-links');
}
