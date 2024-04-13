<?php

namespace initial_config\manage_columns;

use DateTimeImmutable;

/**
 * 管理画面の投稿一覧表の縦列を操作する方法の大まかな手順は次の2手順
 * 1. 一覧表のコラムを編集
 * 2. 各コラムに表示したい値を取得してecho
 */

/**
 * 1. 投稿一覧表のコラムを編集。
 * 一覧表の縦列を引数 array $columns で受け取り、その配列内容を変更し、return する、という仕組み。
 * フィルターを変えれば、固定ページにも対応。
 * ポストタイプごとに処理を変える方法として、global な $post のタイプで分岐させているが、適切なフィルター名で選別することもできるらしい。
 */
add_filter('manage_posts_columns', 'initial_config\manage_columns\add_column_to_postlist');
function add_column_to_postlist(array $columns): array
{
  global $post;

  // 楠の会ニュース
  if (get_post_type($post) == POST_NEWS_LETTER) {
    // array_splice($columns, 2, 0, [
    //   "newsletter_year" => "年",
    //   "newsletter_month" => "月",
    //   "kusunokai_newsletter_pdf" => "ファイル",
    // ]);
    // array_push($columns, [
    //   "newsletter_year" => "年",
    //   "newsletter_month" => "月",
    //   "kusunokai_newsletter_pdf" => "ファイル",
    // ]);
    // vardump($columns);
    $columns = [
      'cb' => $columns['cb'],
      'title' => $columns['title'],
      'newsletter_year' => '年',
      'newsletter_month' => '月',
      'kusunokai_newsletter_pdf' => 'ファイル',
      'newsletter_query_parameter' => 'クエリパラメータ',
      'date' => $columns['date']
    ];
    return $columns;
  }

  // 緊急告知
  if (get_post_type($post) == POST_URGENT_NOTICE) {
    $columns = [
      'cb' => $columns['cb'],
      'title' => $columns['title'],
      'final_date_displaying' => '表示期限日',
      'date' => $columns['date']
    ];
    return $columns;
  }

  return $columns;
}

/**
 * 2. 各コラムに表示するデータを取得(get_post_meta)してecho
 * コラム名で処理を分岐
 */
add_action('manage_posts_custom_column', 'initial_config\manage_columns\add_value_to_columns', 10, 2);
function add_value_to_columns($column_name, $post_id)
{
  switch ($column_name) {
    case 'kusunokai_newsletter_pdf':
      $pdf_id = get_post_meta($post_id, 'kusunokai_newsletter_pdf', true);
      $value = get_post_meta($pdf_id);
      echo $value ? $value['_wp_attached_file'][0] : '-';
      break;
    case 'newsletter_year':
      $value = get_post_meta($post_id, 'newsletter_year', true);
      echo $value ? $value : '-';
      break;
    case 'newsletter_month':
      $value = get_post_meta($post_id, 'newsletter_month', true);
      echo $value ? $value : '-';
      break;
    case 'newsletter_query_parameter':
      $value = get_post_meta($post_id, 'newsletter_query_parameter', true);
      echo $value ? $value : '-';
      break;
    case 'final_date_displaying':
      $value = get_post_meta($post_id, 'final_date_displaying', true);
      echo $value ? (new DateTimeImmutable($value, TIME_ZONE_JP))->format('Y-n-d') : '-';
      break;
    default:
      echo 'test';
  }
}
