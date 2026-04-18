<?php

// Get Parameters
$action = \GETPOST('action', 'aZ09');
$modulepart = \GETPOST('modulepart', 'aZ09');
$barcodenumberingmodule = \GETPOST('value', 'alpha');
$res = \dolibarr_set_const($db, "BARCODE_PRODUCT_ADDON_NUM", $barcodenumberingmodule, 'chaine', 0, '', $conf->entity);
$barcodenumberingmodule = \GETPOST('value', 'alpha');
$res = \dolibarr_set_const($db, "BARCODE_THIRDPARTY_ADDON_NUM", $barcodenumberingmodule, 'chaine', 0, '', $conf->entity);
$coder = \GETPOST('coder', 'alpha');
$code_id = \GETPOSTINT('code_id');
$sqlp = "UPDATE " . \MAIN_DB_PREFIX . "c_barcode_type";
$resql = $db->query($sqlp);
/*
 * View
 */
$form = new \Form($db);
$formbarcode = new \FormBarCode($db);
$help_url = 'EN:Module_Barcode|FR:Module_Codes_Barre|ES:Módulo Código de barra|DE:Modul_Barcode';
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
// Detect bar codes modules
$barcodelist = array();
// Scan list of all barcode included provided by external modules
$dirbarcode = \array_merge(array("/core/modules/barcode/doc/"), $conf->modules_parts['barcode']);
$sql = "SELECT rowid, code as encoding, libelle as label, coder, example";
$resql = $db->query($sql);