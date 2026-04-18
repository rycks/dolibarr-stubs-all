<?php

$action = \GETPOST('action', 'aZ09');
$defaultoppstatus = \getDolGlobalInt('PROJECT_DEFAULT_OPPORTUNITY_STATUS_FOR_ONLINE_LEAD');
$visibility = \GETPOST('PROJET_VISIBILITY', 'alpha');
$error = 0;
$public = \GETPOST('PROJECT_ENABLE_PUBLIC');
$defaultoppstatus = \GETPOSTINT('PROJECT_DEFAULT_OPPORTUNITY_STATUS_FOR_ONLINE_LEAD');
$res = \dolibarr_set_const($db, "PROJET_VISIBILITY", $visibility, 'chaine', 0, '', $conf->entity);
$res = \dolibarr_set_const($db, "PROJECT_ENABLE_PUBLIC", $public, 'chaine', 0, '', $conf->entity);
$res = \dolibarr_set_const($db, "PROJECT_DEFAULT_OPPORTUNITY_STATUS_FOR_ONLINE_LEAD", $defaultoppstatus, 'chaine', 0, '', $conf->entity);
/*
 * View
 */
$form = new \Form($db);
$formproject = new \FormProjets($db);
$title = $langs->trans("ProjectsSetup");
$help_url = '';
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$head = \project_admin_prepare_head();
$param = '';
$param = '';
$enabledisablehtml = $langs->trans("EnablePublicLeadForm") . ' ';
// Define $urlwithroot
$urlwithouturlroot = \preg_replace('/' . \preg_quote(\DOL_URL_ROOT, '/') . '$/i', '', \trim($dolibarr_main_url_root));
$urlwithroot = $urlwithouturlroot . \DOL_URL_ROOT;