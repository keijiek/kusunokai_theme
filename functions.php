<?php
date_default_timezone_set("Asia/Tokyo");

/**
 * 根幹にかかわる定数
 */
define('TIME_ZONE_JP', new DateTimeZone('Asia/Tokyo'));

/** ************************************************************************
 * 定数1 : このテンプレートプロジェクト内の、主要ディレクトリのパス
 ************************************************************************ */
define('__ROOT__',       get_template_directory_uri());
define('__ASSETS_DIR__', get_template_directory_uri() . '/assets');
define('__CSS_DIR__',    get_template_directory_uri() . '/assets/css');
define('__IMG_DIR__',    get_template_directory_uri() . '/assets/images');
define('__DIST_DIR__',   get_template_directory_uri() . '/assets/dist');
define('__INC_DIR__',    get_template_directory_uri() . '/include');
define('TEMPLATE_HEADER', '/templates/header/header');
define('TEMPLATE_HEADER2', '/templates/header_v2/header');
define('TEMPLATE_FOOTER', '/templates/footer/footer');


/** ************************************************************************
 * 定数2 : カスタム投稿タイプAと、それに関連付けられたフィールドなどのスラグ
 ************************************************************************ */

/** メニューのロケーション(theme_location) */
define('COMMON_MENU', 'common_menu');
define('BOOTSTRAP_MENU', 'bootstrap_menu');
define('FOOTER_MENU', 'footer_menu');

/** カスタム投稿 */
define('POST_NEWS_LETTER', 'newsletters');
define('POST_URGENT_NOTICE', 'urgent_notices');
define('POST_NOTICE', 'notices');

/** ************************************************************************
 * 初期設定
 ************************************************************************ */
require_once(__DIR__ . '/include/initial_config/initial_config.php');

/**
 * 共通関数
 */
require_once(__DIR__ . '/include/common/common_functions.php');
require_once(__DIR__ . '/include/common/common_tags.php');
require_once(__DIR__ . '/include/common/common_atts.php');
