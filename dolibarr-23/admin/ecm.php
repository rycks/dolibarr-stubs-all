<?php

$action = \GETPOST('action', 'aZ09');
/*
 * Action
 */
// set
$reg = array();
$code = $reg[1];
$code = $reg[1];
/*
 * View
 */
$form = new \Form($db);
$help_url = '';
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$head = \ecm_admin_prepare_head();