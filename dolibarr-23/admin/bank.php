<?php

$action = \GETPOST('action', 'aZ09');
$actionsave = \GETPOST('save', 'alpha');
$value = \GETPOST('value', 'alpha');
$label = \GETPOST('label', 'alpha');
$scandir = \GETPOST('scan_dir', 'alpha');
$type = 'bankaccount';
$error = 0;
$constname = \preg_replace('/^set/', '', $action);
$constvalue = \GETPOSTINT('value');
$res = \dolibarr_set_const($db, $constname, $constvalue, 'yesno', 0, '', $conf->entity);
$i = 1;
$errorsaved = 0;
$error = 0;
$modele = \GETPOST('module', 'alpha');
// Search template files
$file = '';
$classname = '';
$dirmodels = \array_merge(array('/'), (array) $conf->modules_parts['models']);
/*
 * View
 */
$form = new \Form($db);
$formother = new \FormOther($db);
$dirmodels = \array_merge(array('/'), (array) $conf->modules_parts['models']);
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$head = \bank_admin_prepare_head(\null);
$bankorder = array();
$i = 0;
$nbofbank = \count($bankorder);
// Load array def with activated templates
$def = array();
$sql = "SELECT nom";
$resql = $db->query($sql);