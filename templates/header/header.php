<?php
$header_dir = 'templates/header';
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<?php get_template_part($header_dir . '/_el_head'); ?>

<body <?php body_class(); ?> id="top_of_page">
  <?php
  wp_body_open();
  get_template_part($header_dir . '/_el_header');
  ?>
  <main>
