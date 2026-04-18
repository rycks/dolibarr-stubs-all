<?php

$WIDTH = \DolGraph::getDefaultGraphSizeForStats('width', '380');
// Large for one graph in a smarpthone.
$HEIGHT = \DolGraph::getDefaultGraphSizeForStats('height', '160');
$id = \GETPOST('account') ? \GETPOST('account', 'alpha') : \GETPOST('id');
$ref = \GETPOST('ref');
// Security check
$fieldvalue = !empty($id) ? $id : (!empty($ref) ? $ref : '');
$fieldtype = !empty($ref) ? 'ref' : 'rowid';
$result = \restrictedArea($user, 'banque', $fieldvalue, 'bank_account&bank_account', '', '', $fieldtype);
$year_start = \GETPOST('year_start');
//$year_current = strftime("%Y", time());
$year_current = (int) \dol_print_date(\time(), "%Y");
/*
 * View
 */
$error = 0;
// Get account information
$object = new \Account($db);
$annee = '';
$totentrees = array();
$totsorties = array();
$title = $object->ref . ' - ' . $langs->trans("IOMonthlyReporting");
$helpurl = "";
// Ce rapport de tresorerie est base sur llx_bank (car doit inclure les transactions sans facture)
// plutot que sur llx_paiement + llx_paiementfourn
$sql = "SELECT SUM(b.amount)";
$resql = $db->query($sql);
$encaiss = array();
$decaiss = array();
$sql = "SELECT SUM(b.amount)";
$resql = $db->query($sql);
// Tabs tab / graph
$head = \bank_prepare_head($object);
$title = $langs->trans("FinancialAccount") . " : " . $object->label;
$link = $year_start ? '<a href="' . $_SERVER["PHP_SELF"] . '?account=' . $object->id . '&year_start=' . ($year_start - 1) . '">' . \img_previous('', 'class="valignbottom"') . "</a> " . $langs->trans("Year") . ' <a href="' . $_SERVER["PHP_SELF"] . '?account=' . $object->id . '&year_start=' . ($year_start + 1) . '">' . \img_next('', 'class="valignbottom"') . '</a>' : '';
$linkback = '<a href="' . \DOL_URL_ROOT . '/compta/bank/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '';
$head = \bank_report_prepare_head($object);
// Current balance
$balance = 0;
$sql = "SELECT SUM(b.amount) as total";
$resql = $db->query($sql);
$obj = $db->fetch_object($resql);
$nbcol = '';
// BUILDING GRAPHICS
$year = $year_end;
$result = \dol_mkdir($conf->bank->dir_temp);