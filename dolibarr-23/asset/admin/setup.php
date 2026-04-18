<?php

// Parameters
$action = \GETPOST('action', 'aZ09');
$backtopage = \GETPOST('backtopage', 'alpha');
$value = \GETPOST('value', 'alpha');
$label = \GETPOST('label', 'alpha');
$scandir = \GETPOST('scan_dir', 'alpha');
$type = 'asset';
$arrayofparameters = array('ASSET_ACCOUNTANCY_CATEGORY' => array('type' => 'accountancy_category', 'enabled' => 1), 'ASSET_DEPRECIATION_DURATION_PER_YEAR' => array('type' => 'string', 'css' => 'minwidth200', 'enabled' => 1));
$error = 0;
$dirmodels = \array_merge(array('/'), (array) $conf->modules_parts['models']);
$moduledir = 'asset';
$myTmpObjects = ['asset' => array('label' => 'Asset', 'includerefgeneration' => 1, 'includedocgeneration' => 0, 'class' => 'Asset')];
$tmpobjectkey = \GETPOST('object', 'aZ09');
$maskconst = \GETPOST('maskconst', 'alpha');
$mask = \GETPOST('mask', 'alpha');
/*
 * View
 */
$form = new \Form($db);
$help_url = '';
$page_name = "AssetSetup";
// Subheader
$linkback = '<a href="' . ($backtopage ? $backtopage : \DOL_URL_ROOT . '/admin/modules.php?restore_lastsearch_values=1') . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
// Configuration header
$head = \assetAdminPrepareHead();