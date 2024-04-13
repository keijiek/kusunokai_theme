<?php

namespace common_tags;

require_once(__DIR__ . '/common_atts.php');

function section_h2(string $child): void
{
  $class = \common_atts\h2_class();
  echo "<h2 class=\"{$class}\">{$child}</h2>";
}


function anchor_to_aboutus(string $additional_class = 'mt-4'): void
{
  anchor_to_base('about_us', '宮崎県楠の会について', $additional_class);
}

function anchor_to_newsletter_list(string $additional_class = 'mt-4'): void
{
  anchor_to_base(POST_NEWS_LETTER, '楠の会ニュース一覧を見る', $additional_class);
}


function anchor_to_notice_list(string $additional_class = 'mt-4'): void
{
  anchor_to_base(POST_NOTICE, 'お知らせ一覧を見る', $additional_class);
}


function anchor_to_base(string $href, string $child, string $additional_class): void
{
  $added_class = $additional_class ? ' ' . $additional_class : '';
?>
  <p class="text-end<?= $added_class ?>">
    <a href="<?= home_url() ?>/<?= $href ?>/"><?= $child ?><?php bi_caret_right_fill(26) ?></a>
  </p>
<?php
}

function bi_caret_right_fill(int $size = 16, string $class = "")
{
?>
  <svg xmlns="http://www.w3.org/2000/svg" width="<?= $size ?>" height="<?= $size ?>" fill="currentColor" class="bi bi-caret-right-fill <?= $class ?>" viewBox="0 0 16 16">
    <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
  </svg>
<?php
}

function bi_file_earmark_pdf(int $size = 16, string $class = "")
{
?>
  <svg xmlns="http://www.w3.org/2000/svg" width="<?= $size ?>" height="<?= $size ?>" fill="currentColor" class="bi bi-file-earmark-pdf <?= $class ?>" viewBox="0 0 16 16">
    <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
    <path d="M4.603 14.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.697 19.697 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.188-.012.396-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.066.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.712 5.712 0 0 1-.911-.95 11.651 11.651 0 0 0-1.997.406 11.307 11.307 0 0 1-1.02 1.51c-.292.35-.609.656-.927.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.266.266 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.71 12.71 0 0 1 1.01-.193 11.744 11.744 0 0 1-.51-.858 20.801 20.801 0 0 1-.5 1.05zm2.446.45c.15.163.296.3.435.41.24.19.407.253.498.256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.876 3.876 0 0 0-.612-.053zM8.078 7.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z" />
  </svg>
<?php
}


function bi_exclamation_octagon_fill(int $size = 16, string $class = "")
{
?>
  <svg xmlns="http://www.w3.org/2000/svg" width="<?= $size ?>" height="<?= $size ?>" fill="currentColor" class="bi bi-exclamation-octagon-fill <?= $class ?>" viewBox="0 0 16 16">
    <path d="M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353L11.46.146zM8 4c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995A.905.905 0 0 1 8 4zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
  </svg>
<?php
}


function bi_exclamation_diamond_fill(int $size = 16, string $class = "")
{
?>
  <svg xmlns="http://www.w3.org/2000/svg" width="<?= $size ?>" height="<?= $size ?>" fill="currentColor" class="bi bi-exclamation-diamond-fill <?= $class ?>" viewBox="0 0 16 16">
    <path d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098L9.05.435zM8 4c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995A.905.905 0 0 1 8 4zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
  </svg>
<?php
}


function bi_exclamation_lg(int $size = 16, string $class = "")
{
?>
  <svg xmlns="http://www.w3.org/2000/svg" width="<?= $size ?>" height="<?= $size ?>" fill="currentColor" class="bi bi-exclamation-lg <?= $class ?>" viewBox="0 0 16 16">
    <path d="M7.005 3.1a1 1 0 1 1 1.99 0l-.388 6.35a.61.61 0 0 1-1.214 0L7.005 3.1ZM7 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0Z" />
  </svg>
<?php
}


function bi_newspaper(int $size = 16, string $class = "")
{
?>
  <svg xmlns="http://www.w3.org/2000/svg" width="<?= $size ?>" height="<?= $size ?>" fill="currentColor" class="bi bi-newspaper <?= $class ?>" viewBox="0 0 16 16">
    <path d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5v-11zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5H12z" />
    <path d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z" />
  </svg>
<?php
}


function bi_bell_fill(int $size = 16, string $class = "")
{
?>
  <svg xmlns="http://www.w3.org/2000/svg" width="<?= $size ?>" height="<?= $size ?>" fill="currentColor" class="bi bi-bell-fill <?= $class ?>" viewBox="0 0 16 16">
    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z" />
  </svg>
<?php
}


function section_hearder_base(string $title)
{
?>
  <section class="<?= \common_atts\section_class() ?>">
    <h2 class="<?= \common_atts\h2_class() ?>"><?= $title ?></h2>
    <div class="<?= \common_atts\section_content_class() ?>">
    <?php
  }

  function section_footer_base()
  {
    ?>
    </div>
  </section>
<?php
  }
