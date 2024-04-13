<?php

namespace newsletters;

use DateTimeImmutable;
use \WP_Post;

enum ThumbSizes: string
{
  case full = 'full';
  case large = 'large';
  case medium = 'medium';
  case thumbnail = 'thumbnail';
}

/**
 * 楠の会ニュース一件のデータを持ち、表示用の基本タグを提供する
 */
class NewsletterDisplayer
{
  private Newsletter $data;
  private string $hash;

  function __construct(WP_Post|int $newsletter)
  {
    $this->data = new Newsletter($newsletter);
  }

  function card_of_list()
  {
?>
    <div class="col m-0 px-1 px-lg-2 py-3 py-lg-4">
      <div role="card">
        <p class="text-center mb-0">
          <a href="<?= $this->data->pdf_url() ?><?= $this->data->query_parameter() ?>">
            <?= $this->data->year() ?>年<?= $this->data->month() ?>月号
          </a>
        </p>
        <a class="d-block" href="<?= $this->data->pdf_url() ?><?= $this->data->query_parameter() ?>">
          <?= $this->data->thumbnail(ThumbSizes::large, ['class' => 'd-block w-100 h-auto object-fit-cover img-thumbnail']) ?>
        </a>
      </div>
    </div>
  <?php
  }

  function html(bool $is_big = false, string $prefix = '', string $suffix = '')
  {
    $this->issue_anchor($is_big, $prefix, $suffix);
    $this->thumbnail_html();
  }

  function issue_anchor(bool $is_big = false, string $prefix = '', string $suffix = '')
  {
    $fs = $is_big ? 'fs-4' : '';
    $icon_size = $is_big ? 28 : 20;
    $issue_title = $prefix . $this->data->year() . '年' . $this->data->month() . '月号' . $suffix;
  ?>
    <p class="<?= $fs ?>">
      <?= $this->bi_file_earmark_pdf($icon_size, 'text-danger') ?>
      <a href="<?= $this->data->pdf_url() ?><?= $this->data->query_parameter() ?>"><?= $issue_title ?></a>
    </p>
  <?php
  }

  function thumbnail_html()
  {
  ?>
    <div class="row row-cols-1 row-cols-lg-2">
      <a class="d-block" href="<?= $this->data->pdf_url() ?><?= $this->data->query_parameter() ?>">
        <?= $this->data->thumbnail(ThumbSizes::full) ?>
      </a>
    </div>
  <?php
  }

  private function bi_file_earmark_pdf(int $size = 16, string $class = "")
  {
  ?>
    <svg xmlns="http://www.w3.org/2000/svg" width="<?= $size ?>" height="<?= $size ?>" fill="currentColor" class="bi bi-file-earmark-pdf <?= $class ?>" viewBox="0 0 16 16">
      <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
      <path d="M4.603 14.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.697 19.697 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.188-.012.396-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.066.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.712 5.712 0 0 1-.911-.95 11.651 11.651 0 0 0-1.997.406 11.307 11.307 0 0 1-1.02 1.51c-.292.35-.609.656-.927.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.266.266 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.71 12.71 0 0 1 1.01-.193 11.744 11.744 0 0 1-.51-.858 20.801 20.801 0 0 1-.5 1.05zm2.446.45c.15.163.296.3.435.41.24.19.407.253.498.256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.876 3.876 0 0 0-.612-.053zM8.078 7.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z" />
    </svg>
<?php
  }
}

/**
 * 一件の楠の会ニュースのデータ
 */
class Newsletter
{
  private bool $created_by_id = false;
  private int $id;
  private WP_Post $wp_post;
  private $pdf_id;
  private $thumbnails;

  function __construct(WP_Post|int $newsletter)
  {
    if (is_int($newsletter)) {
      $this->created_by_id = true;
      $this->id = $newsletter;
    } else {
      $this->wp_post = $newsletter;
      $this->id = $newsletter->ID;
    }
    $this->pdf_id = get_post_meta($this->id, 'kusunokai_newsletter_pdf', true);
    $this->thumbnails = wp_get_attachment_metadata($this->pdf_id);
  }

  function id(): int
  {
    return $this->id;
  }

  function title(): string
  {
    return $this->created_by_id ? get_the_title($this->id) : get_the_title($this->wp_post);
    // return $this->wp_post->post_title;
  }

  function pdf_id()
  {
    return $this->pdf_id;
  }

  function pdf_url()
  {
    return wp_get_attachment_url($this->pdf_id);
  }

  function year(): string
  {
    return get_post_meta($this->id, 'newsletter_year', true);
  }

  function month(): string
  {
    return get_post_meta($this->id, 'newsletter_month', true);
  }

  function query_parameter(): string
  {
    $query_parameter = get_post_meta($this->id, 'newsletter_query_parameter', true);
    return $query_parameter ? '?' . $query_parameter : '';
  }

  function thumbnail(ThumbSizes $size, string|array $atts = ['class' => 'd-block w-100 h-auto object-fit-cover img-thumbnail'], bool $icon = false): string
  {
    return wp_get_attachment_image($this->pdf_id, $size->value, $icon, $atts);
  }
}

function get_newsletters(): array
{
  $get_posts_args = get_post_args_base();
  return get_posts($get_posts_args);
}

function specific_newsletter(int $year, int $month): array|false
{
  $get_posts_args = get_post_args_base();
  $get_posts_args['meta_query'] = [
    'relation' => 'AND',
    [
      'key' => 'newsletter_year',
      'value' => $year,
    ],
    [
      'key' => 'newsletter_month',
      'value' => $month,
    ]
  ];
  $result = get_posts($get_posts_args);
  if (count($result) < 1) {
    return false;
  }
  return $result;
}

function get_latest_newsletter(): array|false
{
  $gp_args = get_post_args_base(1);
  $gp_args['orderby'] = [
    'newsletter_year' => 'DESC',
    'newsletter_month' => 'DESC',
  ];
  $result = get_posts($gp_args);
  if (count($result) < 1) {
    return false;
  }
  return $result;
}

function get_post_args_base(int $number_of_newsletter = -1): array
{
  return [
    'post_type' => POST_NEWS_LETTER,
    'posts_per_page' => $number_of_newsletter,
  ];
}
