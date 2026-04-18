<?php

$action = \GETPOST('action', 'aZ09');
$value = \GETPOST('value', 'alpha');
$modulepart = \GETPOST('modulepart', 'aZ09');
/*
 * View
 */
$form = new \Form($db);
$page_name = "ImportSetup";
// Subheader
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
//$head = export_admin_prepare_head();
$h = 0;
$head = array();