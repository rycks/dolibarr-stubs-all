<?php

$action = \GETPOST('action', 'alpha');
$value = \GETPOST('value', 'alpha');
$label = \GETPOST('label', 'alpha');
$scandir = \GETPOST('scan_dir', 'alpha');
$type = 'product_batch';
$error = 0;
$maskconstbatch = \GETPOST('maskconstLot', 'aZ09');
$maskbatch = \GETPOST('maskLot', 'alpha');
/*
 * View
 */
$form = new \Form($db);
$dirmodels = \array_merge(array('/'), (array) $conf->modules_parts['models']);
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$head = \product_lot_admin_prepare_head();
// Module to build doc
$def = array();
// TODO Replace with $def = getListOfModels($db, $type);
$sql = "SELECT nom";
$resql = $db->query($sql);
$filelist = array();