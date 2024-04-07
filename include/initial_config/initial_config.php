<?php

/**
 * activate_features 機能のアクティベート
 */
require_once(__DIR__ . '/activate_features/_set_content_width.php');
require_once(__DIR__ . '/activate_features/_activate_essentials.php');

/**
 * customize_features (機能のカスタマイズ)
 */
// require_once(__DIR__ . '/customize_features/_customize_features.php');
// require_once(__DIR__ . '/customize_features/_deactivate_features.php');

/**
 * enqueue_scripts (css や js 等の読み込み)
 */
require_once(__DIR__ . '/enqueue_scripts/_wp_enqueue_scripts.php');
// require_once(__DIR__ . '/enqueue_scripts/_admin_enqueue_scripts.php');

/**
 * register_something (メニュ・カスタムポスト・タクソノミーなどの登録)
 */
require_once(__DIR__ . '/register_something/_regist_posts.php');
require_once(__DIR__ . '/register_something/_register_menus.php');
// require_once(__DIR__ . '/register_something/_register_widgets.php');

/**
 * ACF カスタム
 */
require_once(__DIR__ . '/acf_customize/_acf_customize.php');
