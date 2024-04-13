<?php
$footer_dir = 'templates/footer';
?>
</div>
</main>
<footer class="container-fluid bg-kusu-main py-3">
  <div class="container-xxl">
    <p class="mb-0 text-left text-lg-center text-kusu-txt fw-normal">&copy;&nbsp;2024&nbsp;<?= get_bloginfo() ?></p>
  </div>
</footer>
<a class="btn btn-kusu-sub text-white p-2 position-fixed bottom-0 end-0" id="js_returnToTopButton" href="#top_of_page">
  <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-arrow-bar-up" viewBox="0 0 16 16">
    <path stroke="white" stroke-width="1.2" fill-rule="evenodd" d="M8 10a.5.5 0 0 0 .5-.5V3.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 3.707V9.5a.5.5 0 0 0 .5.5zm-7 2.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5z" />
  </svg>
</a>

<?php wp_footer(); ?>
</body>

</html>

<?php
function footer_nav(): string
{
  return wp_nav_menu([
    'theme_location' => FOOTER_MENU,
    'menu' => '',
    'menu_class' => 'd-flex flex-column flex-lg-row justify-content-center gap-3 list-unstyled',
    'menu_id' => '',
    'container' => 'nav',
    'container_class' => '',
    'container_id' => 'navbarNavDropdown',
    'container_aria_label' => 'フッターメニュー',
    // 'fallback_cb' => 'wp_page_menu',
    // 'before' => '',
    // 'after' => '',
    // 'link_before' => '',
    // 'link_after' => '',
    'echo' => false,
    // 'depth' => 0,
    // 'walker' => '',
    // 'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
    // 'item_spacing' => 'preserve'
  ]);
}
