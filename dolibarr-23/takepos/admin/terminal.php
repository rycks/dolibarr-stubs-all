<?php

$terminal = \GETPOSTINT('terminal');
$sql = "SELECT code, libelle as label FROM " . \MAIN_DB_PREFIX . "c_paiement";
$resql = $db->query($sql);
$paiements = array();
$terminaltouse = $terminal;
/*
 * Actions
 */
$error = 0;
$res = \dolibarr_set_const($db, "TAKEPOS_TERMINAL_NAME_" . $terminaltouse, !empty(\GETPOST('terminalname' . $terminaltouse, 'restricthtml')) ? \GETPOST('terminalname' . $terminaltouse, 'restricthtml') : $langs->trans("TerminalName", $terminaltouse), 'chaine', 0, '', $conf->entity);
$res = \dolibarr_set_const($db, "CASHDESK_ID_THIRDPARTY" . $terminaltouse, \GETPOSTINT('socid') > 0 ? \GETPOSTINT('socid') : '', 'chaine', 0, '', $conf->entity);
/*
 * View
 */
$form = new \Form($db);
$formproduct = new \FormProduct($db);
$linkback = '<a href="' . \DOL_URL_ROOT . '/admin/system/database.php?restore_lastsearch_values=1">' . \img_picto($langs->trans("GoBack"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("GoBack") . '</span></a>';
$head = \takepos_admin_prepare_head();
$atleastonefound = 0;
$disabled = \getDolGlobalInt('CASHDESK_NO_DECREASE_STOCK' . $terminal);
// Options when using a special printer in TakePOS
$customprinterallowed = \true;
$orderprinterallowed = \getDolGlobalString('TAKEPOS_BAR_RESTAURANT') && \getDolGlobalInt('TAKEPOS_ORDER_PRINTERS');
$customprinttemplateallowed = \true;
$printer = new \dolReceiptPrinter($db);
$printers = array();
$printer = new \dolReceiptPrinter($db);
$templates = array();
// add free text on each terminal of cash desk
$substitutionarray = \pdf_getSubstitutionArray($langs, \null, \null, 2);
$htmltext = '<i>' . $langs->trans('AvailableVariables') . ':<br>';
$variablename = 'TAKEPOS_HEADER' . $terminaltouse;
$variablename = 'TAKEPOS_FOOTER' . $terminaltouse;