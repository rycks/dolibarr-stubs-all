<?php

$sql = "SELECT code, libelle FROM " . \MAIN_DB_PREFIX . "c_paiement";
$resql = $db->query($sql);
$paiements = array();
$action = \GETPOST('action', 'aZ09');
/*
 * Actions
 */
$error = 0;
$res = \dolibarr_set_const($db, "TAKEPOS_ROOT_CATEGORY_ID", \GETPOST('TAKEPOS_ROOT_CATEGORY_ID', 'alpha'), 'chaine', 0, '', $conf->entity);
$res = \dolibarr_set_const($db, "TAKEPOS_SUPPLEMENTS_CATEGORY", \GETPOST('TAKEPOS_SUPPLEMENTS_CATEGORY', 'alpha'), 'chaine', 0, '', $conf->entity);
$res = \dolibarr_set_const($db, "TAKEPOS_NUMPAD", \GETPOST('TAKEPOS_NUMPAD', 'alpha'), 'chaine', 0, '', $conf->entity);
$res = \dolibarr_set_const($db, "TAKEPOS_SORTPRODUCTFIELD", \GETPOST('TAKEPOS_SORTPRODUCTFIELD', 'alpha'), 'chaine', 0, '', $conf->entity);
$res = \dolibarr_set_const($db, "TAKEPOS_NUM_TERMINALS", \GETPOST('TAKEPOS_NUM_TERMINALS', 'alpha'), 'chaine', 0, '', $conf->entity);
$res = \dolibarr_set_const($db, "TAKEPOS_ADDON", \GETPOST('TAKEPOS_ADDON', 'alpha'), 'int', 0, '', $conf->entity);
$res = \dolibarr_set_const($db, "TAKEPOS_EMAIL_TEMPLATE_INVOICE", \GETPOST('TAKEPOS_EMAIL_TEMPLATE_INVOICE', 'alpha'), 'chaine', 0, '', $conf->entity);
/*
 * View
 */
$form = new \Form($db);
$help_url = 'EN:Module_Point_of_sale_(TakePOS)';
$linkback = '<a href="' . \DOL_URL_ROOT . '/admin/system/database.php?restore_lastsearch_values=1">' . \img_picto($langs->trans("GoBack"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("GoBack") . '</span></a>';
$head = \takepos_admin_prepare_head();
// Numbering modules
$now = \dol_now();
$dirmodels = \array_merge(array('/'), (array) $conf->modules_parts['models']);
$array = array('rowid' => 'ID', 'ref' => 'Ref', 'label' => 'Label', 'datec' => 'DateCreation', 'tms' => 'DateModification');
$substitutionarray = \pdf_getSubstitutionArray($langs, \null, \null, 2);
$htmltext = '<i>' . $langs->trans("AvailableVariables") . ':<br>';
$array = array(0 => $langs->trans("Numberspad"), 1 => $langs->trans("BillsCoinsPad"));
$formmail = new \FormMail($db);
// We set lang=null to get in priority record with no lang
$arrayofmessagename = array();