<?php
$footer_dir = 'templates/footer';
?>
</main>
<footer class="container-fluid bg-kusu-main py-3">
  <?php get_template_part($footer_dir . '/_footer_nav'); ?>
  <p class="mb-0 text-center text-kusu-txt fw-normal">&copy;&nbsp;2024&nbsp;<?= get_bloginfo() ?></p>
</footer>
<!-- <button class="btn btn-kusu-sub text-white position-sticky ">
  上端へ戻る
</button> -->
<?php wp_footer(); ?>
</body>

</html>
