<?php

namespace initial_config;

add_action('init', 'initial_config\register_whole_post_type');
function register_whole_post_type()
{
  register_newsletter_post_type();
  register_urgent_notice_post_type();
  register_general_notice_post_type();
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
      'menu_icon'     => 'dashicons-media-document',
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
      'has_archive'   => false,
      'show_in_rest'  => true,
      'menu_position' => 05,
      'menu_icon'     => 'dashicons-warning',
      'supports'      => [
        'title',
        'editor'
      ]
    ]
  );
}

function register_general_notice_post_type()
{
  register_post_type(
    POST_NOTICE,
    [
      'label'         => 'お知らせ',
      'public'        => true,
      'has_archive'   => true,
      'show_in_rest'  => true,
      'menu_position' => 05,
      'menu_icon'     => 'dashicons-bell',
      'supports'      => [
        'title',
        'editor'
      ]
    ]
  );
}
