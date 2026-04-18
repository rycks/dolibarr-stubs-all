<?php

$action = \GETPOST('action', 'aZ09');
$result1 = \dolibarr_set_const($db, "CLICKTODIAL_USE_TEL_LINK_ON_PHONE_NUMBERS", \GETPOST("CLICKTODIAL_USE_TEL_LINK_ON_PHONE_NUMBERS"), 'chaine', 0, '', $conf->entity);
$result2 = \dolibarr_set_const($db, "CLICKTODIAL_URL", \GETPOST("CLICKTODIAL_URL"), 'chaine', 0, '', $conf->entity);
$result3 = \dolibarr_set_const($db, "CLICKTODIAL_KEY_FOR_CIDLOOKUP", \GETPOST("CLICKTODIAL_KEY_FOR_CIDLOOKUP"), 'chaine', 0, '', $conf->entity);
/*
 * View
 */
$form = new \Form($db);
$wikihelp = 'EN:Module_ClickToDial_En|FR:Module_ClickToDial|ES:Módulo_ClickTodial_Es';
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
// Define $urlwithroot
$urlwithouturlroot = \preg_replace('/' . \preg_quote(\DOL_URL_ROOT, '/') . '$/i', '', \trim($dolibarr_main_url_root));
$urlwithroot = $urlwithouturlroot . \DOL_URL_ROOT;
// This is to use external domain name found into config file
//$urlwithroot=DOL_MAIN_URL_ROOT;					// This is to use same domain name than current
// Url for CIDLookup
//print '<div class="div-table-responsive-no-min">';
$url = $urlwithroot . '/public/clicktodial/cidlookup.php?securitykey=' . \getDolGlobalString('CLICKTODIAL_KEY_FOR_CIDLOOKUP', 'ValueToDefine') . '&phone=...';
$phonefortest = $mysoc->phone ?? '';
$setupcomplete = 1;