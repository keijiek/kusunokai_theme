<?php

namespace notices;

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
    <article class="mt-7">
      <h3 class="mb-0"><?= $this->data->title() ?></h3>
      <p class="text-end text-light-emphasis mb-1"><?= $this->data->post_date() ?></p>
      <div class="mt-1">
        <?= $this->data->content() ?>
      </div>
    </article>
<?php
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
}

function get_notices(int $number_of_notices = -1): array
{
  $args = [
    'post_type' => POST_NOTICE,
    'posts_per_page' => $number_of_notices,
  ];
  return get_posts($args);
}
