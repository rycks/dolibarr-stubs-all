<?php

/**
 * Replace session_start()
 *
 * @return void
 */
function dol_session_start()
{
}
/**
 * Replace session_regenerate_id()
 *
 * @return bool True if success, false if failed
 */
function dol_session_regenerate_id()
{
}
/**
 * Destroy and recreate a new session without losing content.
 * Not used yet.
 *
 * @param  string	$sessionname	Session name
 * @return void
 */
function dol_session_rotate($sessionname = '')
{
}
// Define localization of conf file
// --- Start of part replaced by Dolibarr packager makepack-dolibarr
$conffile = "conf/conf.php";
$conffiletoshow = "htdocs/conf/conf.php";
// For debian/redhat like systems
//$conffile = "/etc/dolibarr/conf.php";
//$conffiletoshow = "/etc/dolibarr/conf.php";
// Include configuration
// --- End of part replaced by Dolibarr packager makepack-dolibarr
// Include configuration
// @phpstan-ignore-next-line
$result = @(include_once $conffile);
// Clean parameters
$dolibarr_main_data_root = empty($dolibarr_main_data_root) ? '' : \trim($dolibarr_main_data_root);
$dolibarr_main_url_root = \trim(\preg_replace('/\\/+$/', '', empty($dolibarr_main_url_root) ? '' : $dolibarr_main_url_root));
$dolibarr_main_url_root_alt = empty($dolibarr_main_url_root_alt) ? '' : \trim($dolibarr_main_url_root_alt);
$dolibarr_main_document_root = empty($dolibarr_main_document_root) ? '' : \trim($dolibarr_main_document_root);
$dolibarr_main_document_root_alt = empty($dolibarr_main_document_root_alt) ? '' : \trim($dolibarr_main_document_root_alt);
\define('DOL_DOCUMENT_ROOT', $dolibarr_main_document_root);
// Define some constants
\define('DOL_CLASS_PATH', 'class/');
// Filesystem path to class dir (defined only for some code that want to be compatible with old versions without this parameter)
\define('DOL_DATA_ROOT', $dolibarr_main_data_root);
// Filesystem data (documents)
// Try to autodetect DOL_MAIN_URL_ROOT and DOL_URL_ROOT when root is not directly the main domain.
// Note: autodetect works only in case 1, 2, 3 and 4 of phpunit test CoreTest.php. For case 5, 6, only setting value into conf.php will works.
$tmp = '';
$found = 0;
$real_dolibarr_main_document_root = \str_replace('\\', '/', \realpath($dolibarr_main_document_root));
$paths = \explode('/', \str_replace('\\', '/', $_SERVER["SCRIPT_NAME"]));
// C) Value reported by web server, to say full path on filesystem of a file. Ex: /dolibarr/htdocs/admin/system/phpinfo.php
// Try to detect if $_SERVER["DOCUMENT_ROOT"]+start of $_SERVER["SCRIPT_NAME"] is $dolibarr_main_document_root. If yes, relative url to add before dol files is this start part.
$concatpath = '';
$tmp3 = '';
\define('DOL_MAIN_URL_ROOT', $tmp);
// URL absolute root (https://sss/dolibarr, ...)
$uri = \preg_replace('/^http(s?):\\/\\//i', '', \constant('DOL_MAIN_URL_ROOT'));
// $uri contains url without http*
$suburi = \strstr($uri, '/');
\define('DOL_URL_ROOT', $suburi);
//print DOL_MAIN_URL_ROOT.'-'.DOL_URL_ROOT."\n";
// Define prefix MAIN_DB_PREFIX
\define('MAIN_DB_PREFIX', $dolibarr_main_db_prefix);
\define('TCPDF_PATH', empty($dolibarr_lib_TCPDF_PATH) ? \DOL_DOCUMENT_ROOT . '/includes/tecnickcom/tcpdf/' : $dolibarr_lib_TCPDF_PATH . '/');
\define('TCPDI_PATH', empty($dolibarr_lib_TCPDI_PATH) ? \DOL_DOCUMENT_ROOT . '/includes/tcpdi/' : $dolibarr_lib_TCPDI_PATH . '/');
\define('NUSOAP_PATH', !isset($dolibarr_lib_NUSOAP_PATH) ? \DOL_DOCUMENT_ROOT . '/includes/nusoap/lib/' : (empty($dolibarr_lib_NUSOAP_PATH) ? '' : $dolibarr_lib_NUSOAP_PATH . '/'));
\define('PHPEXCELNEW_PATH', !isset($dolibarr_lib_PHPEXCELNEW_PATH) ? \DOL_DOCUMENT_ROOT . '/includes/phpoffice/phpspreadsheet/src/PhpSpreadsheet/' : (empty($dolibarr_lib_PHPEXCELNEW_PATH) ? '' : $dolibarr_lib_PHPEXCELNEW_PATH . '/'));
\define('ODTPHP_PATH', !isset($dolibarr_lib_ODTPHP_PATH) ? \DOL_DOCUMENT_ROOT . '/includes/odtphp/' : (empty($dolibarr_lib_ODTPHP_PATH) ? '' : $dolibarr_lib_ODTPHP_PATH . '/'));
\define('ODTPHP_PATHTOPCLZIP', !isset($dolibarr_lib_ODTPHP_PATHTOPCLZIP) ? \DOL_DOCUMENT_ROOT . '/includes/odtphp/zip/pclzip/' : (empty($dolibarr_lib_ODTPHP_PATHTOPCLZIP) ? '' : $dolibarr_lib_ODTPHP_PATHTOPCLZIP . '/'));
\define('JS_CKEDITOR', !isset($dolibarr_js_CKEDITOR) ? '' : (empty($dolibarr_js_CKEDITOR) ? '' : $dolibarr_js_CKEDITOR . '/'));
\define('JS_JQUERY', !isset($dolibarr_js_JQUERY) ? '' : (empty($dolibarr_js_JQUERY) ? '' : $dolibarr_js_JQUERY . '/'));
\define('JS_JQUERY_UI', !isset($dolibarr_js_JQUERY_UI) ? '' : (empty($dolibarr_js_JQUERY_UI) ? '' : $dolibarr_js_JQUERY_UI . '/'));
\define('DOL_DEFAULT_TTF', !isset($dolibarr_font_DOL_DEFAULT_TTF) ? \DOL_DOCUMENT_ROOT . '/includes/fonts/Aerial.ttf' : (empty($dolibarr_font_DOL_DEFAULT_TTF) ? '' : $dolibarr_font_DOL_DEFAULT_TTF));
\define('DOL_DEFAULT_TTF_BOLD', !isset($dolibarr_font_DOL_DEFAULT_TTF_BOLD) ? \DOL_DOCUMENT_ROOT . '/includes/fonts/AerialBd.ttf' : (empty($dolibarr_font_DOL_DEFAULT_TTF_BOLD) ? '' : $dolibarr_font_DOL_DEFAULT_TTF_BOLD));