<?php

$action = \GETPOST('action', 'aZ09');
$status = \GETPOST('status', 'alpha');
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$head = \api_admin_prepare_head();
$production_mode = \getDolGlobalBool('API_PRODUCTION_MODE');
$disable_compression = \getDolGlobalBool('API_DISABLE_COMPRESSION');
$enable_count = \getDolGlobalBool('API_ENABLE_COUNT_CALLS');
// Define $urlwithroot
$urlwithouturlroot = \preg_replace('/' . \preg_quote(\DOL_URL_ROOT, '/') . '$/i', '', \trim($dolibarr_main_url_root));
$urlwithroot = $urlwithouturlroot . \DOL_URL_ROOT;
// This is to use external domain name found into config file
//$urlwithroot=DOL_MAIN_URL_ROOT;					// This is to use same domain name than current
// Show message
$message = '';
//$url = $urlwithroot.'/api/index.php/login?login=<strong>auserlogin</strong>&password=<strong>thepassword</strong>[&reset=1]';
$url = $urlwithroot . '/api/index.php/login?login=auserlogin&password=thepassword[&reset=1]';