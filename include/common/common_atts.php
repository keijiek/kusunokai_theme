<?php

namespace common_atts;

function imploded_additional_classes(array $addtionalClasses = []): string
{
  if (count($addtionalClasses) > 0) {
    return ' ' . implode(' ', $addtionalClasses);
  }
  return '';
}

function section_class(array $addtionalClasses = []): string
{
  $classBase = 'container-fluid my-4';
  return $classBase . imploded_additional_classes($addtionalClasses);
}

function h2_class(array $addtionalClasses = []): string
{
  $classBase = 'border-bottom border-1 border-kusu-txt';
  return $classBase . imploded_additional_classes($addtionalClasses);
}
