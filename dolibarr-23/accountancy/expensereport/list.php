<?php

$action = \GETPOST('action', 'aZ09');
$massaction = \GETPOST('massaction', 'alpha');
$confirm = \GETPOST('confirm', 'alpha');
$toselect = \GETPOST('toselect', 'array:aZ09');
// Value can be 'X_Y'
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'accountancyexpensereportlist';
// To manage different context of search
$optioncss = \GETPOST('optioncss', 'aZ');
// Option for the css output (always '' except when 'print')
// Search Getpost
$search_login = \GETPOST('search_login', 'alpha');
$search_lineid = \GETPOST('search_lineid', 'alpha');
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
$formaccounting = new \FormAccounting($db);
$accounting = new \AccountingAccount($db);
$chartaccountcode = \dol_getIdFromCode($db, \getDolGlobalString('CHARTOFACCOUNTS'), 'accounting_system', 'rowid', 'pcg_version');
$arrayfields = array(
    'erd.rowid' => array('label' => "LineId", 'position' => 1, 'checked' => '1', 'enabled' => '1'),
    'u.login' => array('label' => "Employees", 'position' => 1, 'checked' => '1', 'enabled' => '1'),
    'er.ref' => array('label' => "ExpenseReport", 'position' => 1, 'checked' => '1', 'enabled' => '1'),
    'erd.date' => array('label' => "DateOfLine", 'position' => 1, 'checked' => '1', 'enabled' => '1'),
    'f.label' => array('label' => "TypeFees", 'position' => 1, 'checked' => '1', 'enabled' => '1'),
    'erd.comments' => array('label' => "Description", 'position' => 1, 'checked' => '1', 'enabled' => '1'),
    'erd.total_ht' => array('label' => "Amount", 'position' => 1, 'checked' => '1', 'enabled' => '1'),
    'erd.tva_tx' => array('label' => "VATRate", 'position' => 1, 'checked' => '1', 'enabled' => '1'),
    'aa.data_suggest' => array('label' => "DataUsedToSuggestAccount", 'position' => 1, 'checked' => '1', 'enabled' => '1'),
    // Seems not used in search.
    'aa.account_number' => array('label' => "AccountAccountingSuggest", 'position' => 1, 'checked' => '1', 'enabled' => '1'),
);
// @phpstan-ignore-next-line
$arrayfields = \dol_sort_array($arrayfields, 'position');
$parameters = array('arrayfields' => &$arrayfields);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
// Mass actions
$objectclass = 'ExpenseReport';
$objectlabel = 'ExpenseReport';
$permissiontoread = $user->hasRight('accounting', 'read');
$permissiontodelete = $user->hasRight('accounting', 'delete');
$uploaddir = $conf->expensereport->dir_output;
$msg = '';
/*
 * View
 */
$form = new \Form($db);
$formother = new \FormOther($db);
$help_url = 'EN:Module_Double_Entry_Accounting|FR:Module_Comptabilit&eacute;_en_Partie_Double#Liaisons_comptables';
// Expense report lines
$sql = "SELECT er.ref, er.rowid as erid, er.date_debut, er.date_valid,";
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListSelect', $parameters);
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
$arrayofselected = \is_array($toselect) ? $toselect : array();
$param = '';
// Add $param from hooks
$parameters = array('param' => &$param);
$reshook = $hookmanager->executeHooks('printFieldListSearchParam', $parameters, $object, $action);
$arrayofmassactions = array('ventil' => \img_picto('', 'check', 'class="pictofixedwidth"') . $langs->trans("Ventilate"));
$massactionbutton = '';
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
$expensereport_static = new \ExpenseReport($db);
$userstatic = new \User($db);
$form = new \Form($db);
$parameters = array('arrayfields' => $arrayfields, 'sql' => $sql);
$reshook = $hookmanager->executeHooks('printFieldListFooter', $parameters, $object, $action);