<?php

// Parameters
$action = \GETPOST('action', 'alpha');
$backtopage = \GETPOST('backtopage', 'alpha');
$value = \GETPOST('value', 'alpha');
$label = \GETPOST('label', 'alpha');
$scandir = \GETPOST('scan_dir', 'alpha');
$arrayofparameters = array('STOCKTRANSFER_MYPARAM1' => array('css' => 'minwidth200', 'enabled' => 1), 'STOCKTRANSFER_MYPARAM2' => array('css' => 'minwidth500', 'enabled' => 1));
$error = 0;
$maskconststocktransfer = \GETPOST('maskconststocktransfer', 'aZ09');
$maskstocktransfer = \GETPOST('maskStockTransfer', 'alpha');
/*
 * View
 */
$form = new \Form($db);
$dirmodels = \array_merge(array('/'), (array) $conf->modules_parts['models']);
$page_name = "StockTransferSetup";
// Subheader
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
// Configuration header
$head = \stocktransferAdminPrepareHead();
$moduledir = 'stocktransfer';
$myTmpObjects = array();