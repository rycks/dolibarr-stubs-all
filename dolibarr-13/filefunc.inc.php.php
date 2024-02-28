<?php

\define('DOL_APPLICATION_TITLE', 'Dolibarr');
\define('DOL_VERSION', '13.0.5');
\define('EURO', \chr(128));
// Define some constants
\define('DOL_CLASS_PATH', 'class/');
// Filesystem path to class dir (defined only for some code that want to be compatible with old versions without this parameter)
\define('DOL_DATA_ROOT', $dolibarr_main_data_root);
// Filesystem data (documents)
\define('DOL_DOCUMENT_ROOT', $dolibarr_main_document_root);
\define('DOL_MAIN_URL_ROOT', $tmp);
// If $suburi is /, it is now ''
\define('DOL_URL_ROOT', $suburi);
// URL relative root ('', '/dolibarr', ...)
//print DOL_MAIN_URL_ROOT.'-'.DOL_URL_ROOT."\n";
// Define prefix MAIN_DB_PREFIX
\define('MAIN_DB_PREFIX', $dolibarr_main_db_prefix);
\define('ADODB_PATH', !isset($dolibarr_lib_ADODB_PATH) ? \DOL_DOCUMENT_ROOT . '/includes/adodbtime/' : (empty($dolibarr_lib_ADODB_PATH) ? '' : $dolibarr_lib_ADODB_PATH . '/'));
\define('TCPDF_PATH', empty($dolibarr_lib_TCPDF_PATH) ? \DOL_DOCUMENT_ROOT . '/includes/tecnickcom/tcpdf/' : $dolibarr_lib_TCPDF_PATH . '/');
\define('TCPDI_PATH', empty($dolibarr_lib_TCPDI_PATH) ? \DOL_DOCUMENT_ROOT . '/includes/tcpdi/' : $dolibarr_lib_TCPDI_PATH . '/');
\define('NUSOAP_PATH', !isset($dolibarr_lib_NUSOAP_PATH) ? \DOL_DOCUMENT_ROOT . '/includes/nusoap/lib/' : (empty($dolibarr_lib_NUSOAP_PATH) ? '' : $dolibarr_lib_NUSOAP_PATH . '/'));
\define('PHPEXCELNEW_PATH', !isset($dolibarr_lib_PHPEXCELNEW_PATH) ? \DOL_DOCUMENT_ROOT . '/includes/phpoffice/PhpSpreadsheet/' : (empty($dolibarr_lib_PHPEXCELNEW_PATH) ? '' : $dolibarr_lib_PHPEXCELNEW_PATH . '/'));
\define('ODTPHP_PATH', !isset($dolibarr_lib_ODTPHP_PATH) ? \DOL_DOCUMENT_ROOT . '/includes/odtphp/' : (empty($dolibarr_lib_ODTPHP_PATH) ? '' : $dolibarr_lib_ODTPHP_PATH . '/'));
\define('ODTPHP_PATHTOPCLZIP', !isset($dolibarr_lib_ODTPHP_PATHTOPCLZIP) ? \DOL_DOCUMENT_ROOT . '/includes/odtphp/zip/pclzip/' : (empty($dolibarr_lib_ODTPHP_PATHTOPCLZIP) ? '' : $dolibarr_lib_ODTPHP_PATHTOPCLZIP . '/'));
\define('JS_CKEDITOR', !isset($dolibarr_js_CKEDITOR) ? '' : (empty($dolibarr_js_CKEDITOR) ? '' : $dolibarr_js_CKEDITOR . '/'));
\define('JS_JQUERY', !isset($dolibarr_js_JQUERY) ? '' : (empty($dolibarr_js_JQUERY) ? '' : $dolibarr_js_JQUERY . '/'));
\define('JS_JQUERY_UI', !isset($dolibarr_js_JQUERY_UI) ? '' : (empty($dolibarr_js_JQUERY_UI) ? '' : $dolibarr_js_JQUERY_UI . '/'));
\define('DOL_DEFAULT_TTF', !isset($dolibarr_font_DOL_DEFAULT_TTF) ? \DOL_DOCUMENT_ROOT . '/includes/fonts/Aerial.ttf' : (empty($dolibarr_font_DOL_DEFAULT_TTF) ? '' : $dolibarr_font_DOL_DEFAULT_TTF));
\define('DOL_DEFAULT_TTF_BOLD', !isset($dolibarr_font_DOL_DEFAULT_TTF_BOLD) ? \DOL_DOCUMENT_ROOT . '/includes/fonts/AerialBd.ttf' : (empty($dolibarr_font_DOL_DEFAULT_TTF_BOLD) ? '' : $dolibarr_font_DOL_DEFAULT_TTF_BOLD));