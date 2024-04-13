<?php

namespace urgent_notices;

use \DateTimeImmutable;
use WP_Post;

require_once(dirname(__DIR__, 2) . '/include/common/common_tags.php');

use function common_tags\bi_exclamation_diamond_fill;
use function common_tags\bi_exclamation_octagon_fill;
use function common_tags\bi_exclamation_lg;

function get_urgent_notices(): array
{
  $today = (new DateTimeImmutable("now", TIME_ZONE_JP))->format('Ymd');
  $get_posts_args = [
    'post_type' => POST_URGENT_NOTICE,
    'posts_per_page' => -1,
    'meta_query' => [
      'relation' => 'OR',
      [
        'key' => 'final_date_displaying',
        'value' => $today,
        'compare' => '>=',
        'type' => 'date'
      ],
      [
        'key' => 'final_date_displaying',
        'value' => '',
        'compare' => '=',
      ]
    ],
  ];
  return get_posts($get_posts_args);
}

/**
 * 1件の緊急告知を表示する関数
 */
function display_single_urgent_notice(UrgentNotice $urgent_notice): void
{
?>
  <article class="alert alert-danger pt-4 pb-2">
    <h3 class="alert-heading"><?= $urgent_notice->title() ?></h3>
    <div class="">
      <?= $urgent_notice->content() ?>
    </div>
  </article>
  <?php
}

enum DisplayMode: int
{
  case normal = 0;
  case alert = 1;
}

class UrgentNoticeDisplayer
{
  private UrgentNotice $data;

  function __construct(UrgentNotice|int $urgent_notice)
  {
    $this->data = $urgent_notice;
  }

  function html()
  {
    return $this->html_base('danger');
  }

  private function html_base(string $type): void
  {
    $flex_styles = "d-flex flex-row align-items-cente gap-2";
    $space_styles = "pt-4 pb-2 mb-0";
  ?>
    <article class="alert alert-<?= $type ?> <?= $flex_styles ?> <?= $space_styles ?>">
      <div>
        <h3 class="alert-heading d-flex align-items-center gap-2">
          <?php bi_exclamation_diamond_fill(26, 'd-block ') ?>
          <?= $this->data->title() ?>
        </h3>
        <div>
          <?= $this->data->content() ?>
        </div>
      </div>
    </article>
<?php
  }
}

/**
 * １件の緊急告知データを抱えるクラス。
 */
class UrgentNotice
{
  private WP_Post $urgent_notice;
  private mixed $final_date_displaying;

  function __construct(WP_Post $urgent_notice)
  {
    $this->urgent_notice = $urgent_notice;
    $this->final_date_displaying = get_post_meta($urgent_notice->ID, 'final_date_displaying', true);
  }

  function title(): string
  {
    return $this->urgent_notice->post_title;
  }
  function content(): string
  {
    return $this->urgent_notice->post_content;
  }

  function deadline(): DateTimeImmutable|false
  {
    if (!$this->final_date_displaying) {
      return false;
    }
    return new DateTimeImmutable($this->final_date_displaying, TIME_ZONE_JP);
  }
}
