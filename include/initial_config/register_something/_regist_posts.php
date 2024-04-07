<?php

namespace initial_config;

add_action('init', 'initial_config\register_whole_post_type');
function register_whole_post_type()
{
  register_newsletter_post_type();
  register_urgent_notice_post_type();
}

/**
 * 楠の会ニュースの投稿機能
 */
function register_newsletter_post_type()
{
  register_post_type(
    POST_NEWS_LETTER,
    [
      'label'         => '楠の会ニュース',
      'public'        => true,
      'has_archive'   => true,
      'show_in_rest'  => true,
      'menu_position' => 05,
      'supports'      => [
        'title',
      ]
    ]
  );
}

function register_urgent_notice_post_type()
{
  register_post_type(
    POST_URGENT_NOTICE,
    [
      'label'         => '緊急告知',
      'public'        => true,
      'has_archive'   => true,
      'show_in_rest'  => true,
      'menu_position' => 05,
      'supports'      => [
        'title',
        'editor'
      ]
    ]
  );
}
