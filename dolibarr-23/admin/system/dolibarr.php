<?php

$action = \GETPOST('action', 'aZ09');
$sfurl = '';
$version = '0.0';
$result = \getURLContent('https://sourceforge.net/projects/dolibarr/rss');
/*
 * View
 */
$form = new \Form($db);
$help_url = '';
$title = $langs->trans("InfoDolibarr");
$version = \DOL_VERSION;
$urlofchangelog = 'https://raw.githubusercontent.com/Dolibarr/dolibarr/' . $version . '/ChangeLog';
$newversion = '';
// Now show link to the changelog
//print ' &nbsp; &nbsp; - &nbsp; &nbsp; ';
$version = \DOL_VERSION;
$i = 0;
// Thousands
$thousand = $langs->transnoentitiesnoconv("SeparatorThousand");
// Decimals
$dec = $langs->transnoentitiesnoconv("SeparatorDecimal");
// Timezone server base
$sql = "SHOW VARIABLES where variable_name = 'system_time_zone'";
$resql = $db->query($sql);
$txt = $langs->trans("OSTZ") . ' (variable system TZ): ' . (!empty($_ENV["TZ"]) ? $_ENV["TZ"] : $langs->trans("NotDefined")) . '<br>' . "\n";
// Timezone server PHP
$a = \getServerTimeZoneInt('now');
$b = \getServerTimeZoneInt('winter');
$c = \getServerTimeZoneInt('summer');
$daylight = \round($c - $b);
//print $a." ".$b." ".$c." ".$daylight;
$val = ($a >= 0 ? '+' : '') . $a;
// Client
$tz = (int) $_SESSION['dol_tz'] + (int) $_SESSION['dol_dst'];
$filesystemencoding = \ini_get("unicode.filesystem_encoding");
$tmp = \ini_get("unicode.filesystem_encoding");
// Parameters in conf.php file (when a parameter start with ?, it is shown only if defined)
$configfileparameters = array('dolibarr_main_prod' => 'Production mode (Hide all error messages)', 'dolibarr_main_instance_unique_id' => $langs->trans("InstanceUniqueID"), 'separator0' => '', 'dolibarr_main_url_root' => $langs->trans("URLRoot"), '?dolibarr_main_url_root_alt' => $langs->trans("URLRoot") . ' (alt)', 'dolibarr_main_document_root' => $langs->trans("DocumentRootServer"), '?dolibarr_main_document_root_alt' => $langs->trans("DocumentRootServer") . ' (alt)', 'dolibarr_main_data_root' => $langs->trans("DataRootServer"), 'separator1' => '', 'dolibarr_main_db_host' => $langs->trans("DatabaseServer"), 'dolibarr_main_db_port' => $langs->trans("DatabasePort"), 'dolibarr_main_db_name' => $langs->trans("DatabaseName"), 'dolibarr_main_db_type' => $langs->trans("DriverType"), 'dolibarr_main_db_user' => $langs->trans("DatabaseUser"), 'dolibarr_main_db_pass' => $langs->trans("DatabasePassword"), 'dolibarr_main_db_character_set' => $langs->trans("DBStoringCharset"), 'dolibarr_main_db_collation' => $langs->trans("DBSortingCollation"), '?dolibarr_main_db_prefix' => $langs->trans("DatabasePrefix"), 'dolibarr_main_db_readonly' => $langs->trans("ReadOnlyMode"), 'separator2' => '', 'dolibarr_main_authentication' => $langs->trans("AuthenticationMode"), '?multicompany_transverse_mode' => $langs->trans("MultiCompanyMode"), 'separator' => '', '?dolibarr_main_auth_ldap_login_attribute' => 'dolibarr_main_auth_ldap_login_attribute', '?dolibarr_main_auth_ldap_host' => 'dolibarr_main_auth_ldap_host', '?dolibarr_main_auth_ldap_port' => 'dolibarr_main_auth_ldap_port', '?dolibarr_main_auth_ldap_version' => 'dolibarr_main_auth_ldap_version', '?dolibarr_main_auth_ldap_dn' => 'dolibarr_main_auth_ldap_dn', '?dolibarr_main_auth_ldap_admin_login' => 'dolibarr_main_auth_ldap_admin_login', '?dolibarr_main_auth_ldap_admin_pass' => 'dolibarr_main_auth_ldap_admin_pass', '?dolibarr_main_auth_ldap_debug' => 'dolibarr_main_auth_ldap_debug', 'separator3' => '', '?dolibarr_lib_FPDF_PATH' => 'dolibarr_lib_FPDF_PATH', '?dolibarr_lib_TCPDF_PATH' => 'dolibarr_lib_TCPDF_PATH', '?dolibarr_lib_FPDI_PATH' => 'dolibarr_lib_FPDI_PATH', '?dolibarr_lib_TCPDI_PATH' => 'dolibarr_lib_TCPDI_PATH', '?dolibarr_lib_NUSOAP_PATH' => 'dolibarr_lib_NUSOAP_PATH', '?dolibarr_lib_GEOIP_PATH' => 'dolibarr_lib_GEOIP_PATH', '?dolibarr_lib_ODTPHP_PATH' => 'dolibarr_lib_ODTPHP_PATH', '?dolibarr_lib_ODTPHP_PATHTOPCLZIP' => 'dolibarr_lib_ODTPHP_PATHTOPCLZIP', '?dolibarr_js_CKEDITOR' => 'dolibarr_js_CKEDITOR', '?dolibarr_js_JQUERY' => 'dolibarr_js_JQUERY', '?dolibarr_js_JQUERY_UI' => 'dolibarr_js_JQUERY_UI', '?dolibarr_font_DOL_DEFAULT_TTF' => 'dolibarr_font_DOL_DEFAULT_TTF', '?dolibarr_font_DOL_DEFAULT_TTF_BOLD' => 'dolibarr_font_DOL_DEFAULT_TTF_BOLD', 'separator4' => '', 'dolibarr_main_restrict_os_commands' => 'Restrict CLI commands for backups', 'dolibarr_main_restrict_ip' => 'Restrict access to some IPs only', '?dolibarr_mailing_limit_sendbyweb' => 'Limit nb of email sent by page', '?dolibarr_mailing_limit_sendbycli' => 'Limit nb of email sent by cli', '?dolibarr_mailing_limit_sendbyday' => 'Limit nb of email sent per day', '?dolibarr_strict_mode' => 'Strict mode is on/off', '?dolibarr_nocsrfcheck' => 'Disable CSRF security checks');
$lastkeyshown = \null;
$sql = "SELECT";
$resql = $db->query($sql);