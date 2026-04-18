<?php

$action = \GETPOST('action', 'aZ09');
$value = \GETPOST('value', 'alpha');
$modulepart = \GETPOST('modulepart', 'aZ09');
// Used by actions_setmoduleoptions.inc.php
$label = \GETPOST('label', 'alpha');
$scandir = \GETPOST('scandir', 'alpha');
$type = 'supplier_payment';
$error = 0;
$maskconstsupplierpayment = \GETPOST('maskconstsupplierpayment', 'aZ09');
$masksupplierpayment = \GETPOST('masksupplierpayment', 'alpha');
$res = 0;
/*
 * View
 */
$dirmodels = \array_merge(array('/'), (array) $conf->modules_parts['models']);
$form = new \Form($db);
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$head = \supplierorder_admin_prepare_head();
// Load array def with activated templates
$def = array();
$sql = "SELECT nom";
$resql = $db->query($sql);