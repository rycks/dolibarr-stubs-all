<?php

// Parameters
$action = \GETPOST('action', 'aZ09');
$backtopage = \GETPOST('backtopage', 'alpha');
$modulepart = \GETPOST('modulepart', 'aZ09');
// Used by actions_setmoduleoptions.inc.php
$label = \GETPOST('label', 'alpha');
$scandir = \GETPOST('scan_dir', 'alpha');
$value = \GETPOST('value', 'alpha');
$error = 0;
$dirmodels = \array_merge(['/'], (array) $conf->modules_parts['models']);
$type = 'workstation';
$moduledir = 'workstation';
$maskconst = \GETPOST('maskconstWorkstation', 'aZ09');
$maskorder = \GETPOST('maskWorkstation', 'alpha');
$res = 0;
/*
 * View
 */
$form = new \Form($db);
$help_url = '';
$page_name = "WorkstationSetup";
// Subheader
$linkback = '<a href="' . ($backtopage ? $backtopage : \DOL_URL_ROOT . '/admin/modules.php?restore_lastsearch_values=1') . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
// Configuration header
$head = \workstationAdminPrepareHead();
// Load array def with activated templates
$def = array();
$sql = "SELECT nom";
$resql = $db->query($sql);