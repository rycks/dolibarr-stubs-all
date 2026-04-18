<?php

$supportedoauth2array = \getSupportedOauth2Array();
$action = \GETPOST('action', 'aZ09');
$mode = \GETPOST('mode', 'alpha');
$value = \GETPOST('value', 'alpha');
$varname = \GETPOST('varname', 'alpha');
$driver = \GETPOST('driver', 'alpha');
/*
 * Action
 */
$error = 0;
$setupconstarray = \GETPOST('setupdriver', 'array');
$action = '';
$result = \dolibarr_set_const($db, $varname, $value, 'chaine', 0, '', $conf->entity);
$action = '';
$keyforprovider = \GETPOST('keyforprovider');
$OAUTH_SERVICENAME = \GETPOST('service');
// Show value of token
$tokenobj = \null;
$keyforsupportedoauth2array = $OAUTH_SERVICENAME;
$keyforsupportedoauth2array = \preg_replace('/-.*$/', '', \strtoupper($keyforsupportedoauth2array));
$keyforsupportedoauth2array = 'OAUTH_' . $keyforsupportedoauth2array . '_NAME';
$keyforparamtenant = 'OAUTH_' . \strtoupper(empty($supportedoauth2array[$keyforsupportedoauth2array]['callbackfile']) ? 'Unknown' : $supportedoauth2array[$keyforsupportedoauth2array]['callbackfile']) . ($keyforprovider ? '-' . $keyforprovider : '') . '_TENANT';
// Dolibarr storage
$storage = new \OAuth\Common\Storage\DoliStorage($db, $conf, $keyforprovider, \getDolGlobalString($keyforparamtenant));
/*
 * View
 */
// Define $urlwithroot
$urlwithouturlroot = \preg_replace('/' . \preg_quote(\DOL_URL_ROOT, '/') . '$/i', '', \trim($dolibarr_main_url_root));
$urlwithroot = $urlwithouturlroot . \DOL_URL_ROOT;
// This is to use external domain name found into config file
//$urlwithroot=DOL_MAIN_URL_ROOT;					// This is to use same domain name than current
$form = new \Form($db);
$title = $langs->trans("TokenManager");
$help_url = 'EN:Module_OAuth|FR:Module_OAuth_FR|ES:Módulo_OAuth_ES';
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$head = \oauthadmin_prepare_head();
// Define $listinsetup
$listinsetup = array();
$oauthstateanticsrf = \bin2hex(\random_bytes(128 / 8));