<?php

use newsletters\NewsletterDisplayer;

require_once(__DIR__ . '/include/common/common_atts.php');
require_once(__DIR__ . '/include/common/common_tags.php');
require_once(__DIR__ . '/include/common/newsletters.php');

get_template_part(TEMPLATE_HEADER);

if (have_posts()) {
  while (have_posts()) {
    the_post();
    singular_header();

    /**
     * ページ判定し、表示内容を変える。
     */
    if (is_singular(POST_NOTICE)) {
      display_notice();
    } elseif (is_page()) {
      display_page();
    } elseif (is_singular(POST_NEWS_LETTER)) {
      display_kusunokai_news();
    } elseif (is_singular(POST_URGENT_NOTICE)) {
      display_urgent_notice();
    }

    singular_footer();
  }
}
get_template_part(TEMPLATE_FOOTER);


/** ************************************************************************
 * 楠の会ニュース1件の表示(pdfを見せればよいので不要だが、投稿画面からその投稿の表示を求められる可能性があるので、一応)
 */
function display_kusunokai_news()
{
  $newsletter_displayer = new NewsletterDisplayer(get_the_ID());
  $newsletter_displayer->html();
?>
  <?= common_tags\anchor_to_newsletter_list() ?>
<?php
}


/** ************************************************************************
 * お知らせ1件の表示
 */
function display_notice(): void
{
  the_content();
  echo common_tags\anchor_to_newsletter_list();
}

/** ************************************************************************
 * 緊急告知1件の表示。不要だが、投稿画面から投稿ページの表示を求められる可能性があるので、一応。
 */
function display_urgent_notice(): void
{
  the_content();
}

/** ************************************************************************
 * 固定ページ(共通)の表示
 */
function display_page()
{
  the_content();
}


/** ************************************************************************
 * singular の共通ヘッダー
 */
function singular_header(): void
{
  common_tags\section_hearder_base(get_the_title());
}

/** ************************************************************************
 * singular の共通フッター
 */
function singular_footer(): void
{
  common_tags\section_footer_base();
}
