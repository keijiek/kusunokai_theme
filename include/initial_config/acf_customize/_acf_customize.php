<?php

namespace initial_config;

use DateTimeImmutable;

// 楠の会ニュースの「年」の初期値を動的に表示
add_filter('acf/load_field/name=newsletter_year', 'initial_config\newsletter_default_year');
function newsletter_default_year($field)
{
  $field['default_value'] = (new DateTimeImmutable('now', TIME_ZONE_JP))->modify('next month')->format('Y');
  return $field;
}

// 楠の会ニュースの「月」の初期値を動的に表示
add_filter('acf/load_field/name=newsletter_month', 'initial_config\newsletter_default_month');
function newsletter_default_month($field)
{
  $field['default_value'] = (new DateTimeImmutable('now', TIME_ZONE_JP))->modify('next month')->format('n');
  return $field;
}
