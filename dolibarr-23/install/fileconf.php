<?php

$err = 0;
$setuplang = \GETPOST("selectlang", 'alpha', 3) ? \GETPOST("selectlang", 'alpha', 3) : (\GETPOST('lang', 'alpha', 1) ? \GETPOST('lang', 'alpha', 1) : 'auto');
// Now we load forced values from install.forced.php file.
$useforcedwizard = \false;
$forcedfile = "./install.forced.php";
$defaultype = !empty($dolibarr_main_db_type) ? $dolibarr_main_db_type : (empty($force_install_type) ? 'mysqli' : $force_install_type);
$modules = array();
$nbok = $nbko = 0;
$option = '';
// Scan les drivers
$dir = \DOL_DOCUMENT_ROOT . '/core/db';
$handle = \opendir($dir);
$checked = 0;
// If $force_install_databasepass is on, we don't want to set password, we just show '***'. Real value will be extracted from the forced install file at step1.
// @phan-suppress-next-line PhanParamSuspiciousOrder
$autofill = !empty($_SESSION['dol_save_pass']) ? $_SESSION['dol_save_pass'] : \str_pad('', \strlen($force_install_databasepass), '*');
$checked = 0;
$force_install_databaserootlogin = \parse_database_login($force_install_databaserootlogin);
$force_install_databaserootpass = \parse_database_pass($force_install_databaserootpass);
// If $force_install_databaserootpass is on, we don't want to set password here, we just show '***'. Real value will be extracted from the forced install file at step1.
// @phan-suppress-next-line PhanParamSuspiciousOrder
$autofill = !empty($force_install_databaserootpass) ? \str_pad('', \strlen($force_install_databaserootpass), '*') : (isset($db_pass_root) ? $db_pass_root : '');