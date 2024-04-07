<?php

namespace initial_config;

/** ************************************************************************
 * content widht の設定。
 * add_action の第三引数=0 は処理の優先度。低いほど優先。
 */
add_action('after_setup_theme', 'initial_config\set_content_width', 0);
function set_content_width()
{
  $GLOBALS['content_width'] = apply_filters('techblog_content_width', 1920);
}
