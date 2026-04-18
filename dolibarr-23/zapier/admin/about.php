<?php

// Parameters
$action = \GETPOST('action', 'aZ09');
$backtopage = \GETPOST('backtopage', 'alpha');
/*
 * Actions
 */
// None
/*
 * View
 */
$form = new \Form($db);
$page_name = "ZapierForDolibarrSetup";
$help_url = 'EN:Module_Zapier';
// Subheader
$linkback = '<a href="' . ($backtopage ? $backtopage : \DOL_URL_ROOT . '/admin/modules.php?restore_lastsearch_values=1') . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
// Configuration header
$head = \zapierAdminPrepareHead();
$tmpmodule = new \modZapier($db);