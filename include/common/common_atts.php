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
  $classBase = 'container-fluid px-0 my-9';
  return $classBase . imploded_additional_classes($addtionalClasses);
}

function section_content_class(array $addtionalClasses = []): string
{
  $classBase = 'mt-6';
  return $classBase . imploded_additional_classes($addtionalClasses);
}

function h2_class(array $addtionalClasses = []): string
{
  $classBase = 'border-bottom border-1 border-kusu-txt pb-1 mb-0';
  return $classBase . imploded_additional_classes($addtionalClasses);
}
