<?php

$action = \GETPOST('action', 'aZ09');
$error = 0;
$public = \GETPOST('PARTNERSHIP_ENABLE_PUBLIC');
$res = \dolibarr_set_const($db, "PARTNERSHIP_ENABLE_PUBLIC", $public, 'chaine', 0, '', $conf->entity);
/*
 * View
 */
$form = new \Form($db);
$title = $langs->trans('PartnershipSetup');
$help_url = '';
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$head = \partnershipAdminPrepareHead();
$param = '';
$enabledisablehtml = $langs->trans("EnablePublicSubscriptionForm") . ' ';
// Define $urlwithroot
$urlwithouturlroot = \preg_replace('/' . \preg_quote(\DOL_URL_ROOT, '/') . '$/i', '', \trim($dolibarr_main_url_root));
$urlwithroot = $urlwithouturlroot . \DOL_URL_ROOT;