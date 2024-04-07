<?php
get_template_part(TEMPLATE_HEADER);
$section_classes = common_atts\section_class();
$h2_class = common_atts\h2_class();
?>
<!-- 緊急告知 -->
<section class="<?= $section_classes ?>" style="height:1000px">
  <h2 class="<?= $h2_class ?>">緊急告知</h2>

</section>

<!-- 楠の会ニュース最新 -->
<section class="<?= $section_classes ?>" style="height:1000px">
  <h2 class="<?= $h2_class ?>">『みやざき楠の会ニュース』最新号</h2>

</section>

<!-- お知らせ -->
<section class="<?= $section_classes ?>" style="height:1000px">
  <h2 class="<?= $h2_class ?>">お知らせ</h2>

</section>
<?php
get_template_part(TEMPLATE_FOOTER);
