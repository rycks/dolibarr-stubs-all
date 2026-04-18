<?php

$lastkeyshown = \null;
// Parameters in conf.php file (when a parameter start with ?, it is shown only if defined)
$configfileparameters = array('dolibarr_main_url_root', 'dolibarr_main_url_root_alt', 'dolibarr_main_document_root', 'dolibarr_main_document_root_alt', 'dolibarr_main_data_root', 'separator', 'dolibarr_main_db_host', 'dolibarr_main_db_port', 'dolibarr_main_db_name', 'dolibarr_main_db_type', 'dolibarr_main_db_user', 'dolibarr_main_db_pass', 'dolibarr_main_db_character_set', 'dolibarr_main_db_collation', '?dolibarr_main_db_prefix', 'separator', 'dolibarr_main_authentication', 'separator', '?dolibarr_main_auth_ldap_login_attribute', '?dolibarr_main_auth_ldap_host', '?dolibarr_main_auth_ldap_port', '?dolibarr_main_auth_ldap_version', '?dolibarr_main_auth_ldap_dn', '?dolibarr_main_auth_ldap_admin_login', '?dolibarr_main_auth_ldap_admin_pass', '?dolibarr_main_auth_ldap_debug', 'separator', '?dolibarr_lib_FPDF_PATH', '?dolibarr_lib_TCPDF_PATH', '?dolibarr_lib_FPDI_PATH', '?dolibarr_lib_TCPDI_PATH', '?dolibarr_lib_NUSOAP_PATH', '?dolibarr_lib_GEOIP_PATH', '?dolibarr_lib_ODTPHP_PATH', '?dolibarr_lib_ODTPHP_PATHTOPCLZIP', '?dolibarr_js_CKEDITOR', '?dolibarr_js_JQUERY', '?dolibarr_js_JQUERY_UI', '?dolibarr_font_DOL_DEFAULT_TTF', '?dolibarr_font_DOL_DEFAULT_TTF_BOLD', 'separator', '?dolibarr_mailing_limit_sendbyweb', '?dolibarr_mailing_limit_sendbycli', '?dolibarr_mailing_limit_sendbyday', '?dolibarr_strict_mode');
$configfilelib = array(
    //					'separator',
    $langs->trans("URLRoot"),
    $langs->trans("URLRoot") . ' (alt)',
    $langs->trans("DocumentRootServer"),
    $langs->trans("DocumentRootServer") . ' (alt)',
    $langs->trans("DataRootServer"),
    'separator',
    $langs->trans("DatabaseServer"),
    $langs->trans("DatabasePort"),
    $langs->trans("DatabaseName"),
    $langs->trans("DriverType"),
    $langs->trans("DatabaseUser"),
    $langs->trans("DatabasePassword"),
    $langs->trans("DBStoringCharset"),
    $langs->trans("DBSortingCharset"),
    $langs->trans("Prefix"),
    'separator',
    $langs->trans("AuthenticationMode"),
    'separator',
    'dolibarr_main_auth_ldap_login_attribute',
    'dolibarr_main_auth_ldap_host',
    'dolibarr_main_auth_ldap_port',
    'dolibarr_main_auth_ldap_version',
    'dolibarr_main_auth_ldap_dn',
    'dolibarr_main_auth_ldap_admin_login',
    'dolibarr_main_auth_ldap_admin_pass',
    'dolibarr_main_auth_ldap_debug',
    'separator',
    'dolibarr_lib_TCPDF_PATH',
    'dolibarr_lib_FPDI_PATH',
    'dolibarr_lib_NUSOAP_PATH',
    'dolibarr_lib_GEOIP_PATH',
    'dolibarr_lib_ODTPHP_PATH',
    'dolibarr_lib_ODTPHP_PATHTOPCLZIP',
    'dolibarr_js_CKEDITOR',
    'dolibarr_js_JQUERY',
    'dolibarr_js_JQUERY_UI',
    'dolibarr_font_DOL_DEFAULT_TTF',
    'dolibarr_font_DOL_DEFAULT_TTF_BOLD',
    'separator',
    'Limit nb of email sent by page',
    'Strict mode is on/off',
);
$i = 0;
$sql = "SELECT";
$resql = $db->query($sql);