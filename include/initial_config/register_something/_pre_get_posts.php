<?php

/**
 * pre_get_posts に挿入する処理群
 */
add_action('pre_get_posts', 'orderby_modified_posts');
function orderby_modified_posts($query)
{
  // 管理画面とフロント側を分けて設定。こうしないと両方に効いてしまう。
  if (is_admin()) {
    return;
  } else {
    // archive-newsletter で事前取得のqueryパラメータに順番(orderby)等を設定する。事前取得データを無視して WP_Query を使う手もあるだろうが、不要な処理を発生させるのが嫌なので。
    if (is_post_type_archive(POST_NEWS_LETTER)) {
      $query->set('posts_per_page', -1);
      $query->set('orderby', [
        'menu_order' => 'ASC'
      ]);
    }
    if (is_post_type_archive(POST_NOTICE)) {
      $query->set('posts_per_page', 6);
      $query->set('orderby', [
        'menu_order' => 'ASC'
      ]);
    }
  }
}
