<?php

// Parameters
$action = \GETPOST('action', 'aZ09');
$backtopage = \GETPOST('backtopage', 'alpha');
$arrayofparameters = array();
/*
 * View
 */
$page_name = 'ZapierForDolibarrSetup';
$help_url = 'EN:Module_Zapier';
// Subheader
$linkback = '<a href="' . ($backtopage ? $backtopage : \DOL_URL_ROOT . '/admin/modules.php?restore_lastsearch_values=1') . '">' . $langs->trans("BackToModuleList") . '</a>';
// Configuration header
$head = \zapierAdminPrepareHead();