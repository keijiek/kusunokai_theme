<?php
require_once(__DIR__ . '/include/common/common_atts.php');
require_once(__DIR__ . '/include/common/common_tags.php');
require_once(__DIR__ . '/include/common/newsletters.php');
require_once(__DIR__ . '/include/common/notices.php');

use newsletters\NewsletterDisplayer;
use notices\NoticeDisplayer;

get_template_part(TEMPLATE_HEADER);
archive_header();

if (have_posts()) {
  if (is_post_type_archive(POST_NEWS_LETTER)) {
    display_newsletter_list();
  } elseif (is_post_type_archive(POST_NOTICE)) {
    display_notice_list();
  }
} else {
  display_nothing();
}

archive_footer();
get_template_part(TEMPLATE_FOOTER);

function display_title()
{
?>

<?php
}

/**
 * 楠の会ニュース一覧表示
 */
function display_newsletter_list()
{
?>
  <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 mt-4">
    <?php
    while (have_posts()) {
      the_post();
      (new NewsletterDisplayer(get_the_ID()))->card_of_list();
    }
    ?>
  </div>
<?php
  // include/common/common_funcsion よりページネーションを表示する共用関数
  bootstraped_pagination_link();
}


/**
 * お知らせ・一覧表示
 */
function display_notice_list()
{
  while (have_posts()) {
    the_post();
    (new NoticeDisplayer(get_the_ID()))->html();
  }
}


function archive_header()
{
?>
  <section class="<?= common_atts\section_class() ?>">
    <h2 class="<?= common_atts\h2_class() ?>">
      <?php choise_icon(); ?>
      <?= choise_title() ?>
    </h2>
  <?php
}

function archive_footer()
{
  ?>
  </section>
<?php
}

function choise_title(): string
{
  $title = get_the_archive_title();
  if (is_post_type_archive(POST_NEWS_LETTER)) {
    $title = '楠の会ニュース・一覧';
  } elseif (is_post_type_archive(POST_NOTICE)) {
    $title = 'お知らせ・一覧';
  } elseif (is_post_type_archive(POST_URGENT_NOTICE)) {
    $title = '緊急告知・一覧';
  }
  return $title;
}

function choise_icon()
{
  if (is_post_type_archive(POST_NEWS_LETTER)) {
    common_tags\bi_newspaper(30);
  } elseif (is_post_type_archive(POST_NOTICE)) {
    common_tags\bi_bell_fill(30);
  } elseif (is_post_type_archive(POST_URGENT_NOTICE)) {
    common_tags\bi_exclamation_octagon_fill(30);
  }
}

function display_nothing()
{
?>
  <p>投稿はありません。</p>
<?php
}
