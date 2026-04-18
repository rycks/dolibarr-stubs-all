<?php

$action = \GETPOST('action');
$optioncss = \GETPOST('optioncss', 'aZ');
// Option for the css output (always '' except when 'print')
$account_parent = \GETPOST('account_parent');
$changeaccount = \GETPOST('changeaccount', 'array');
// Search Getpost
$search_societe = \GETPOST('search_societe', 'alpha');
$search_lineid = \GETPOST('search_lineid', 'alpha');
$search_ref = \GETPOST('search_ref', 'alpha');
$search_invoice = \GETPOST('search_invoice', 'alpha');
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
$search_country = \GETPOST('search_country', 'aZ09');
$search_tvaintra = \GETPOST('search_tvaintra', 'alpha');
// Load variable for pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : \getDolGlobalString('ACCOUNTING_LIMIT_LIST_VENTILATION', $conf->liste_limit);
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
// Initialize technical objects
$contextpage = 'accountancycustomerlines';
$formaccounting = new \FormAccounting($db);
$object = new \stdClass();
$arrayfields = array(
    'fd.rowid' => array('label' => "LineId", 'position' => 1, 'checked' => '1', 'enabled' => '1'),
    'f.ref' => array('label' => "Invoice", 'position' => 1, 'checked' => '1', 'enabled' => '1'),
    'f.datef' => array('label' => "Date", 'position' => 1, 'checked' => '1', 'enabled' => '1'),
    // f.datef, f.ref, fd.rowid
    'p.ref' => array('label' => "ProductRef", 'position' => 1, 'checked' => '1', 'enabled' => '1'),
    'fd.description' => array('label' => "ProductDescription", 'position' => 1, 'checked' => '1', 'enabled' => '1'),
    'fd.total_ht' => array('label' => "Amount", 'position' => 1, 'checked' => '1', 'enabled' => '1'),
    'fd.tva_tx' => array('label' => "VATRate", 'position' => 1, 'checked' => '1', 'enabled' => '1'),
    's.nom' => array('label' => "ThirdParty", 'position' => 1, 'checked' => '1', 'enabled' => '1'),
    'co.label' => array('label' => "Country", 'position' => 1, 'checked' => '1', 'enabled' => '1'),
    's.tva_intra' => array('label' => "VATIntra", 'position' => 1, 'checked' => '1', 'enabled' => '1'),
    'aa.account_number' => array('label' => "AccountAccounting", 'position' => 1, 'checked' => '1', 'enabled' => '1'),
);
// @phpstan-ignore-next-line
$arrayfields = \dol_sort_array($arrayfields, 'position');
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
 * Customer Invoice lines
 */
$sql = "SELECT f.rowid as facid, f.ref as ref, f.type as ftype, f.situation_cycle_ref, f.datef, f.ref_client,";
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListSelect', $parameters);
// Add table from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListFrom', $parameters, $object, $action);
$arrayofcode = \getCountriesInEEC();
$country_code_in_EEC = $country_code_in_EEC_without_me = '';
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
$thirdpartystatic = new \Societe($db);
$facturestatic = new \Facture($db);
$productstatic = new \Product($db);
$accountingaccountstatic = new \AccountingAccount($db);
$totalarray = array();
$i = 0;
$parameters = array('arrayfields' => $arrayfields, 'sql' => $sql);
$reshook = $hookmanager->executeHooks('printFieldListFooter', $parameters, $object, $action);