<?php

$optioncss = \GETPOST('optioncss', 'aZ');
// Option for the css output (always '' except when 'print')
$account_parent = \GETPOST('account_parent');
$changeaccount = \GETPOST('changeaccount', 'array');
// Search Getpost
$search_lineid = \GETPOST('search_lineid', 'alpha');
// Can be '> 100'
$search_login = \GETPOST('search_login', 'alpha');
$search_expensereport = \GETPOST('search_expensereport', 'alpha');
$search_label = \GETPOST('search_label', 'alpha');
$search_desc = \GETPOST('search_desc', 'alpha');
$search_amount = \GETPOST('search_amount', 'alpha');
$search_account = \GETPOST('search_account', 'alpha');
$search_vat = \GETPOST('search_vat', 'alpha');
$search_date_startday = \GETPOSTINT('search_date_startday');
$search_date_startmonth = \GETPOSTINT('search_date_startmonth');
$search_date_startyear = \GETPOSTINT('search_date_startyear');
$search_date_endday = \GETPOSTINT('search_date_endday');
$search_date_endmonth = \GETPOSTINT('search_date_endmonth');
$search_date_endyear = \GETPOSTINT('search_date_endyear');
$search_date_start = \dol_mktime(0, 0, 0, $search_date_startmonth, $search_date_startday, $search_date_startyear);
// Use tzserver
$search_date_end = \dol_mktime(23, 59, 59, $search_date_endmonth, $search_date_endday, $search_date_endyear);
// Load variable for pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : \getDolGlobalString('ACCOUNTING_LIMIT_LIST_VENTILATION', $conf->liste_limit);
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
// Initialize technical objects
$contextpage = 'accountancyexpensereportlines';
$formaccounting = new \FormAccounting($db);
$arrayfields = array('erd.rowid' => array('label' => "LineId", 'position' => 1, 'checked' => '1', 'enabled' => '1'), 'u.login' => array('label' => "Employees", 'position' => 1, 'checked' => '1', 'enabled' => '1'), 'er.ref' => array('label' => "ExpenseReport", 'position' => 1, 'checked' => '1', 'enabled' => '1'), 'erd.date' => array('label' => "DateOfLine", 'position' => 1, 'checked' => '1', 'enabled' => '1'), 'f.label' => array('label' => "TypeFees", 'position' => 1, 'checked' => '1', 'enabled' => '1'), 'erd.comments' => array('label' => "Description", 'position' => 1, 'checked' => '1', 'enabled' => '1'), 'erd.total_ht' => array('label' => "Amount", 'position' => 1, 'checked' => '1', 'enabled' => '1'), 'erd.tva_tx' => array('label' => "VATRate", 'position' => 1, 'checked' => '1', 'enabled' => '1'), 'aa.account_number' => array('label' => "AccountAccounting", 'position' => 1, 'checked' => '1', 'enabled' => '1'));
// @phpstan-ignore-next-line
$arrayfields = \dol_sort_array($arrayfields, 'position');
$object = \null;
$action = '';
/*
 * Actions
 */
$parameters = array('arrayfields' => &$arrayfields);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$formother = new \FormOther($db);
$help_url = 'EN:Module_Double_Entry_Accounting|FR:Module_Comptabilit&eacute;_en_Partie_Double#Liaisons_comptables';
/*
 * Expense reports lines
 */
$sql = "SELECT er.ref, er.rowid as erid,";
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListSelect', $parameters, $object, $action);
// Add table from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListFrom', $parameters, $object, $action);
// We don't share object for accountancy
// Add where from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListWhere', $parameters);
// Count total nb of records
$nbtotalofrecords = '';
$result = $db->query($sql);
$nbtotalofrecords = $db->num_rows($result);
$result = $db->query($sql);
$num_lines = $db->num_rows($result);
$i = 0;
$param = '';
// Add $param from hooks
$parameters = array('param' => &$param);
$reshook = $hookmanager->executeHooks('printFieldListSearchParam', $parameters, $object, $action);
$moreforfilter = '';
$varpage = $contextpage;
$htmlofselectarray = $form->multiSelectArrayWithCheckbox('selectedfields', $arrayfields, $varpage, $conf->main_checkbox_left_column);
// This also change content of $arrayfields with user setup
$selectedfields = $htmlofselectarray;
// Fields from hook
$parameters = array('arrayfields' => $arrayfields);
$reshook = $hookmanager->executeHooks('printFieldListOption', $parameters, $object, $action);
// Fields title label
// --------------------------------------------------------------------
$totalarray = array();
// Hook fields
$parameters = array('arrayfields' => $arrayfields, 'param' => $param, 'sortfield' => $sortfield, 'sortorder' => $sortorder);
$reshook = $hookmanager->executeHooks('printFieldListTitle', $parameters, $object, $action);
$expensereportstatic = new \ExpenseReport($db);
$accountingaccountstatic = new \AccountingAccount($db);
$userstatic = new \User($db);
$i = 0;
$parameters = array('arrayfields' => $arrayfields, 'sql' => $sql);
$reshook = $hookmanager->executeHooks('printFieldListFooter', $parameters, $object, $action);