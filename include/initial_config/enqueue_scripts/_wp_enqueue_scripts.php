<?php

namespace initial_config\enqueue_scripts;

use DateTimeImmutable;

define('FRONT_CSS_HANDLER', 'front_css');

add_action('wp_enqueue_scripts', 'initial_config\enqueue_scripts\enqueue_scripts');
function enqueue_scripts()
{
  $jquery = 'jquery';
  $front_css = 'front_css';
  $front_js = 'front_js';

  $is_in_development = true;
  enqueue_something('assets/dist/index.css', $front_css, [], $is_in_development);
  enqueue_something('assets/dist/index.js', $front_js, [], $is_in_development);
  enqueue_something('assets/js/index.js', 'front_js_row', [], $is_in_development);
}

function enqueue_something(string $file_path, string $handler, array $depends = [], bool $is_in_development = false)
{
  $version = get_version_hasu($file_path, $is_in_development);
  if (preg_match('/\.(css)$/i', $file_path)) {
    wp_enqueue_style($handler, get_theme_file_uri($file_path), $depends, $version);
  } elseif (preg_match('/\.(js)$/i', $file_path)) {
    wp_enqueue_script($handler, get_theme_file_uri($file_path), $depends, $version);
  }
}

function get_version_hasu(string $file_path, bool $is_in_development)
{
  return $is_in_development ? (new DateTimeImmutable())->format('YmdHis') : filemtime(get_theme_file_path($file_path));
}
