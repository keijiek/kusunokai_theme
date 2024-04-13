<?php
$header_dir = 'templates/header';
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<?php get_template_part($header_dir . '/_el_head'); ?>

<body <?php body_class(); ?> id="top_of_page">
  <?php wp_body_open(); ?>
  <header class="bg-kusu-main sticky-top">
    <div class="container-xxl" role="presentation">
      <?php get_template_part($header_dir . '/_el_navbar'); ?>
    </div>
  </header>
  <main class="container">
    <div class="container-xxl" role="presentation">
