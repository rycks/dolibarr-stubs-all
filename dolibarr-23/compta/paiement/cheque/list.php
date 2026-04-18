<?php

$search_ref = \GETPOST('search_ref', 'alpha');
$search_date_startday = \GETPOSTINT('search_date_startday');
$search_date_startmonth = \GETPOSTINT('search_date_startmonth');
$search_date_startyear = \GETPOSTINT('search_date_startyear');
$search_date_endday = \GETPOSTINT('search_date_endday');
$search_date_endmonth = \GETPOSTINT('search_date_endmonth');
$search_date_endyear = \GETPOSTINT('search_date_endyear');
$search_date_start = \dol_mktime(0, 0, 0, $search_date_startmonth, $search_date_startday, $search_date_startyear);
// Use tzserver
$search_date_end = \dol_mktime(23, 59, 59, $search_date_endmonth, $search_date_endday, $search_date_endyear);
$search_account = \GETPOST('search_account', 'alpha');
$search_amount = \GETPOST('search_amount', 'alpha');
$mode = \GETPOST('mode', 'alpha');
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$optioncss = \GETPOST('optioncss', 'alpha');
$view = \GETPOST("view", 'alpha');
$form = new \Form($db);
$formother = new \FormOther($db);
$checkdepositstatic = new \RemiseCheque($db);
$accountstatic = new \Account($db);
// List of payment mode to support
// Example: BANK_PAYMENT_MODES_FOR_DEPOSIT_MANAGEMENT = 'CHQ','TRA'
$arrayofpaymentmodetomanage = \explode(',', \getDolGlobalString('BANK_PAYMENT_MODES_FOR_DEPOSIT_MANAGEMENT', 'CHQ'));
$arrayoflabels = array();
$arrayfields = array('bc.ref' => array('label' => "Ref", 'checked' => '1', 'position' => 10), 'bc.type' => array('label' => "Type", 'checked' => '1', 'position' => 20), 'bc.date_bordereau' => array('label' => "DateCreation", 'checked' => '1', 'position' => 30), 'ba.label' => array('label' => "BankAccount", 'checked' => '1', 'position' => 40), 'bc.nbcheque' => array('label' => "NbOfCheques", 'checked' => '1', 'position' => 50), 'bc.amount' => array('label' => "Amount", 'checked' => '1', 'position' => 60), 'bc.statut' => array('label' => "Status", 'checked' => '1', 'position' => 70));
$arrayfields = \dol_sort_array($arrayfields, 'position');
$object = new \RemiseCheque($db);
// Security check
$result = \restrictedArea($user, 'banque', '', '');
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$title = $langs->trans("ChequeDeposits");
$sql = "SELECT bc.rowid, bc.ref, bc.date_bordereau,";
// Add fields from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListSelect', $parameters);
$sqlfields = $sql;
// Add where from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListWhere', $parameters);
// Count total nb of records
$nbtotalofrecords = '';
/* The fast and low memory method to get and count full list converts the sql into a sql count */
$sqlforcount = \preg_replace('/^' . \preg_quote($sqlfields, '/') . '/', 'SELECT COUNT(*) as nbtotalofrecords', $sql);
$sqlforcount = \preg_replace('/GROUP BY .*$/', '', $sqlforcount);
$resql = $db->query($sqlforcount);
//print "$sql";
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$i = 0;
$param = '';
$url = \DOL_URL_ROOT . '/compta/paiement/cheque/card.php?action=new';
$newcardbutton = '';
$varpage = empty($contextpage) ? $_SERVER["PHP_SELF"] : $contextpage;
$selectedfields = $form->multiSelectArrayWithCheckbox('selectedfields', $arrayfields, $varpage, \getDolGlobalString('MAIN_CHECKBOX_LEFT_COLUMN'));
// This also change content of $arrayfields
$massactionbutton = '';
$moreforfilter = '';
// Fields from hook
$parameters = array('arrayfields' => $arrayfields);
$reshook = $hookmanager->executeHooks('printFieldListOption', $parameters);
$totalarray = array();
// Hook fields
$parameters = array('arrayfields' => $arrayfields, 'param' => $param, 'sortfield' => $sortfield, 'sortorder' => $sortorder);
$reshook = $hookmanager->executeHooks('printFieldListTitle', $parameters);
$checkedCount = 0;