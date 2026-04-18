<?php

$action = \GETPOST('action', 'aZ09');
$value = \GETPOST('value', 'alpha');
$modulepart = \GETPOST('modulepart', 'aZ09');
// Used by actions_setmoduleoptions.inc.php
$label = \GETPOST('label', 'alpha');
$scandir = \GETPOST('scan_dir', 'alpha');
$type = 'stock';
$page_y = \GETPOST('page_y');
/*
 * Action
 */
$error = 0;
$reg = array();
$result = 1;
$result = 1;
$value = \GETPOST('default_warehouse', 'alpha');
$res = \dolibarr_set_const($db, "MAIN_DEFAULT_WAREHOUSE", $value, 'chaine', 0, '', $conf->entity);
$modele = \GETPOST('module', 'alpha');
$object = new \Entrepot($db);
// Search template files
$file = '';
$classname = '';
$dirmodels = \array_merge(array('/'), (array) $conf->modules_parts['models']);
/*
 * View
 */
$form = new \Form($db);
$dirmodels = \array_merge(array('/'), (array) $conf->modules_parts['models']);
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$head = \stock_admin_prepare_head();
$form = new \Form($db);
$formproduct = new \FormProduct($db);
$disableStockCalculateOn = array();
$found = 0;
$found = 0;
$virtualdiffersfromphysical = 0;
// Load array def with activated templates
$def = array();
$sql = "SELECT nom";
$resql = $db->query($sql);