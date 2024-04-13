<?php
require_once(dirname(__DIR__, 2) . '/include/common/common_atts.php');

require_once(dirname(__DIR__, 2) . '/include/common/common_tags.php');

use function common_tags\bi_file_earmark_pdf;

require_once(dirname(__DIR__, 2) . '/include/common/urgent_notices.php');

use urgent_notices\UrgentNotice;
use urgent_notices\UrgentNoticeDisplayer;
use urgent_notices\DisplayMode;
use function urgent_notices\get_urgent_notices;

require_once(dirname(__DIR__, 2) . '/include/common/newsletters.php');

use function newsletters\get_latest_newsletter;
use newsletters\Newsletter;
use newsletters\NewsletterDisplayer;
use newsletters\ThumbSizes;

require_once(dirname(__DIR__, 2) . '/include/common/notices.php');

use function notices\get_notices;
use notices\NoticeDisplayer;

get_template_part(TEMPLATE_HEADER);
display_introduction();
display_urgent_notices();
display_newesst_newsletter();
display_notices();
get_template_part(TEMPLATE_FOOTER);


/** ************************************************************************
 * 導入部の表示
 */
function display_introduction(): void
{
?>
  <section class="<?= common_atts\section_class() ?> mt-4">
    <!-- <p class="text-kusu-txt"><?= bloginfo('description') ?></p> -->
    <p style="text-indent:1rem;">宮崎県楠の会は「ひきこもり」の子を持つ親の会です。毎月の定例会を中心に、学習会・講演会・施設見学などを行いながら、当事者の社会復帰や社会的な支援制度の確立などを目指して活動しております。</p>
    <?= common_tags\anchor_to_aboutus() ?>
  </section>
  <?php
}

/** ************************************************************************
 * 「緊急告知」表示
 */
function display_urgent_notices()
{
  $urgent_notices = get_urgent_notices();
  // vardump($urgent_notices);
  if (count($urgent_notices) > 0) {
  ?>
    <section class="<?= common_atts\section_class() ?>">
      <h2 class="<?= common_atts\h2_class() ?>">
        <?php common_tags\bi_exclamation_octagon_fill(30); ?>
        緊急告知
      </h2>
      <div class="d-flex flex-column gap-5 <?= common_atts\section_content_class() ?>">
        <?php
        foreach ($urgent_notices as $ug) {
          (new UrgentNoticeDisplayer(new UrgentNotice($ug)))->html();
        }
        ?>
      </div>
    </section>
  <?php
  }
}

/** ************************************************************************
 * 「楠の会ニュース最新号」表示
 */
function display_newesst_newsletter()
{
  $latest_newsletter = get_latest_newsletter();
  if (count($latest_newsletter) > 0) {
    $newsletter_displayer = new NewsletterDisplayer($latest_newsletter[0]);
  ?>
    <section class="<?= common_atts\section_class() ?>">
      <h2 class="<?= common_atts\h2_class() ?>">
        <?php common_tags\bi_newspaper(30) ?>
        みやざき楠の会ニュース&nbsp;最新号
      </h2>
      <div class="<?= common_atts\section_content_class() ?>">
        <?= $newsletter_displayer->html(true) ?>
        <?= common_tags\anchor_to_newsletter_list() ?>
      </div>
    </section>
  <?php
  }
}

/** ************************************************************************
 * 「お知らせ」表示
 */
function display_notices(int $number_of_display = 10)
{
  $notices = get_notices($number_of_display);
  // vardump($notices);
  if (count($notices) > 0) {
  ?>
    <section class="<?= common_atts\section_class() ?>">
      <h2 class="<?= common_atts\h2_class() ?>">
        <?php common_tags\bi_bell_fill(30) ?>
        お知らせ
      </h2>
      <div class="<?= common_atts\section_content_class() ?>">
        <?php
        foreach ($notices as $n) {
          (new NoticeDisplayer($n))->html();
        }
        ?>
      </div>
      <?= common_tags\anchor_to_notice_list() ?>
    </section>
<?php
  }
}
