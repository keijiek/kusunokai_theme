<?php

/**
 * デバッグ用
 */
function vardump($meg)
{
  echo "<pre>";
  var_dump($meg);
  echo "</pre>";
}

/**
 * paginate_link のラッパー。bootstrap に適合するように。
 */
function bootstraped_pagination_link($args = array())
{

  //１ページの時は出力しない
  if ($GLOBALS['wp_query']->max_num_pages <= 1) {
    return;
  }

  //現在のページ数
  $current = max(1, get_query_var('paged'));


  $args = array(
    'prev_text' => __('«'),
    'next_text' => __('»'),
    'mid_size' => 2,
    'type' => "array",
    'prev_next' => true
  );

  $pa = paginate_links($args);

  foreach ($pa as &$p) {
    $p = str_replace("page-numbers", "page-link", $p);
  }
  unset($p);

?>
  <nav aria-label="Page navigation">
    <ul class="pager pagination my-4 justify-content-center">
      <?php
      foreach ($pa as $p) {
        $active = "";
        if (strpos($p, "current") !== false) {
          $active = " active";
        }
        echo "<li class=\"page-item{$active}\">{$p}</li>";
      }
      ?>
    </ul>
  </nav>

<?php
}
?>
