<?php

$extrafields = new \ExtraFields($db);
$form = new \Form($db);
// List of supported format
$type2label = \ExtraFields::getListOfTypesLabels();
$action = \GETPOST('action', 'aZ09');
$attrname = \GETPOST('attrname', 'alpha');
$elementtype = 'hrm_skill';
/*
 * View
 */
$textobject = $langs->transnoentitiesnoconv("Skills");
$help_url = '';
$page_name = "HrmSetup";
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$head = \hrmAdminPrepareHead();