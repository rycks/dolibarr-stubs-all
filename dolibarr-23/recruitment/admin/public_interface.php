<?php

$action = \GETPOST('action', 'aZ09');
$error = 0;
$public = \GETPOST('RECRUITMENT_ENABLE_PUBLIC_INTERFACE');
$res = \dolibarr_set_const($db, "RECRUITMENT_ENABLE_PUBLIC_INTERFACE", $public, 'chaine', 0, '', $conf->entity);
/*
 * View
 */
$form = new \Form($db);
//$help_url = 'EN:Module_Foundations|FR:Module_Adh&eacute;rents|ES:M&oacute;dulo_Miembros';
$help_url = '';
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$head = \recruitmentAdminPrepareHead();
$param = '';
$enabledisablehtml = $langs->trans("EnablePublicRecruitmentPages") . ' ';
// Define $urlwithroot
$urlwithouturlroot = \preg_replace('/' . \preg_quote(\DOL_URL_ROOT, '/') . '$/i', '', \trim($dolibarr_main_url_root));
$urlwithroot = $urlwithouturlroot . \DOL_URL_ROOT;