<?php

namespace notices;

use DateInterval;
use DateTime;
use DateTimeImmutable;
use \WP_Post;

class NoticeDisplayer
{
  private Notice $data;

  function __construct(WP_Post|int $notice)
  {
    $this->data = new Notice($notice);
  }

  function html()
  {
    $flex_styles = "d-flex flex-row align-items-cente gap-2";
    $space_styles = "pt-4 pb-2 mb-0";
?>
    <article class="mt-7 mb-4">
      <h3 class="mb-0 d-flex flex-row align-items-center gap-2">
        <span class="d-block">
          <?= $this->data->title() ?>
        </span>
        <?php
        if (is_new_notice($this->data->post_date_raw())) {
        ?>
          <span class="d-block badge rounded-pill bg-kusu-sub fs-6">new</span>
        <?php
        }
        ?>
      </h3>
      <p class="text-end text-light-emphasis mb-1"><?= $this->data->post_date() ?></p>
      <div class="mt-1">
        <?= $this->data->content() ?>
      </div>
      <?php
      if ($this->data->pdf) {
        $pdf_url = $this->data->pdf['url'];
        $img_src = wp_get_attachment_image_src($this->data->pdf['ID'], 'large');
      ?>
        <div class="mt-3 row row-cols-1 row-cols-lg-2">
          <a href="<?= $pdf_url ?>" class="d-block">
            <img src="<?= $img_src[0] ?>" alt="" width="<?= $img_src[1] ?>" height="<?= $img_src[2] ?>" class="d-block w-100 h-auto object-fit-cover img-thumbnail" />
          </a>
        </div>
      <?php
      }
      ?>
    </article>
    <hr>
<?php
  }
}

function is_new_notice(string $post_date, int $duration = 14): bool
{
  $modify_value = '+' . $duration . ' day';
  $threshold = (new DateTimeImmutable($post_date, TIME_ZONE_JP))->modify($modify_value);
  $now = new DateTimeImmutable('now', TIME_ZONE_JP);
  if ($threshold >= $now) {
    return true;
  } else {
    return false;
  }
}

/**
 * お知らせ一件のクラス。post_id または WP_Post で生成できる。
 */
class Notice
{
  private bool $created_by_id = false;
  private int $id;
  private WP_Post $wp_post;
  public  $pdf;

  function __construct(WP_Post|int $notice)
  {
    if (is_int($notice)) {
      $this->created_by_id = true;
      $this->id = $notice;
      $this->wp_post = get_post($notice);
    } else {
      $this->wp_post = $notice;
      $this->id = $notice->ID;
    }

    $this->pdf = get_field('associated_pdf', $this->id) ? get_field('associated_pdf', $this->id) : false;
  }


  function title(): string
  {
    // return $this->created_by_id ? get_the_title($this->id) : get_the_title($this->wp_post);
    return $this->wp_post->post_title;
  }

  function content(): string
  {
    // return $this->created_by_id ? get_the_content() : $this->wp_post->post_content;
    return $this->wp_post->post_content;
  }

  function post_date(): string
  {
    // return $this->created_by_id ? : $this->wp_post->;
    return (new DateTimeImmutable($this->wp_post->post_date))->format('Y年n月d日');
  }

  function post_date_raw(): string
  {
    return $this->wp_post->post_date;
  }
}

function get_notices(int $number_of_notices = -1): array
{
  $args = [
    'post_type' => POST_NOTICE,
    'posts_per_page' => $number_of_notices,
  ];
  return get_posts($args);
}
