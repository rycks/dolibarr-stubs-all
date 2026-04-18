<?php

$action = \GETPOST('action', 'alpha');
$massaction = \GETPOST('massaction', 'alpha');
$optioncss = \GETPOST('optioncss', 'alpha');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'vendorpaymentlist';
$mode = \GETPOST('mode', 'alpha');
$toselect = \GETPOSTISSET('toselect') ? \GETPOST('toselect', 'array:int') : array();
$socid = \GETPOSTINT('socid');
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
$search_user = \GETPOST('search_user', 'alpha');
$search_payment_type = \GETPOST('search_payment_type');
$search_cheque_num = \GETPOST('search_cheque_num', 'alpha');
$search_bank_account = \GETPOST('search_bank_account', 'int');
$search_amount = \GETPOST('search_amount', 'alpha');
// alpha because we must be able to search on '< x'
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT('page');
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$search_all = \trim(\GETPOST('search_all', 'alphanohtml'));
// List of fields to search into when doing a "search in all"
$fieldstosearchall = array('pndf.rowid' => "RefPayment", 'u.login' => "User", 'pndf.num_payment' => "Numero", 'pndf.amount' => "Amount");
$arrayfields = array('pndf.rowid' => array('label' => "RefPayment", 'checked' => '1', 'position' => 10), 'pndf.datep' => array('label' => "Date", 'checked' => '1', 'position' => 20), 'u.login' => array('label' => "User", 'checked' => '1', 'position' => 30), 'c.libelle' => array('label' => "Type", 'checked' => '1', 'position' => 40), 'pndf.num_payment' => array('label' => "Numero", 'checked' => '1', 'position' => 50, 'tooltip' => "ChequeOrTransferNumber"), 'ba.label' => array('label' => "BankAccount", 'checked' => '1', 'position' => 60, 'enabled' => (string) (int) \isModEnabled("bank")), 'pndf.amount' => array('label' => "Amount", 'checked' => '1', 'position' => 70));
$arrayfields = \dol_sort_array($arrayfields, 'position');
$object = new \PaymentExpenseReport($db);
/*
 * Actions
 */
$childids = $user->getAllChildIds(1);
$parameters = array('socid' => $socid);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$formother = new \FormOther($db);
$accountstatic = new \Account($db);
$userstatic = new \User($db);
$paymentexpensereportstatic = new \PaymentExpenseReport($db);
$title = $langs->trans('ListPayment');
// Build and execute select
// --------------------------------------------------------------------
$sql = 'SELECT pndf.rowid, pndf.rowid as ref, pndf.datep, pndf.amount as pamount, pndf.num_payment';
// Add fields from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListSelect', $parameters, $object, $action);
$sql = \preg_replace('/,\\s*$/', '', $sql);
$sqlfields = $sql;
// Add where from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListWhere', $parameters, $object, $action);
// Count total nb of records
$nbtotalofrecords = '';
/* The fast and low memory method to get and count full list converts the sql into a sql count */
$sqlforcount = \preg_replace('/^' . \preg_quote($sqlfields, '/') . '/', 'SELECT COUNT(*) as nbtotalofrecords', $sql);
$sqlforcount = \preg_replace('/GROUP BY .*$/', '', $sqlforcount);
$resql = $db->query($sqlforcount);
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$i = 0;
$arrayofselected = \is_array($toselect) ? $toselect : array();
$param = '';
// Add $param from hooks
$parameters = array('param' => &$param);
$reshook = $hookmanager->executeHooks('printFieldListSearchParam', $parameters, $object, $action);
// List of mass actions available
$arrayofmassactions = array();
$massactionbutton = $form->selectMassAction('', $arrayofmassactions);
$newcardbutton = '';
$moreforfilter = '';
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldPreListTitle', $parameters, $object, $action);
$varpage = empty($contextpage) ? $_SERVER["PHP_SELF"] : $contextpage;
$htmlofselectarray = $form->multiSelectArrayWithCheckbox('selectedfields', $arrayfields, $varpage, \getDolGlobalString('MAIN_CHECKBOX_LEFT_COLUMN'));
// This also change content of $arrayfields with user setup
$selectedfields = $mode != 'kanban' ? $htmlofselectarray : '';
// Fields from hook
$parameters = array('arrayfields' => $arrayfields);
$reshook = $hookmanager->executeHooks('printFieldListOption', $parameters);
$totalarray = array();
// Hook fields
$parameters = array('arrayfields' => $arrayfields, 'param' => $param, 'sortfield' => $sortfield, 'sortorder' => $sortorder, 'totalarray' => &$totalarray);
$reshook = $hookmanager->executeHooks('printFieldListTitle', $parameters);
$checkedCount = 0;
// Loop on record
// --------------------------------------------------------------------
$i = 0;
$savnbfield = $totalarray['nbfield'];
$totalarray = array();
$imaxinloop = $limit ? \min($num, $limit) : $num;
$parameters = array('arrayfields' => $arrayfields, 'sql' => $sql);
$reshook = $hookmanager->executeHooks('printFieldListFooter', $parameters, $object, $action);