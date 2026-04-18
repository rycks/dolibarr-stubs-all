<?php

$extrafields = new \ExtraFields($db);
$form = new \Form($db);
// List of supported format
$type2label = \ExtraFields::getListOfTypesLabels();
// Get Parameters
$action = \GETPOST('action', 'aZ09');
$attrname = \GETPOST('attrname', 'alpha');
$elementtype = 'hrm_job';
/*
 * View
 */
$textobject = $langs->transnoentitiesnoconv("JobProfile");
$help_url = '';
$page_name = "HrmSetup";
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$head = \hrmAdminPrepareHead();