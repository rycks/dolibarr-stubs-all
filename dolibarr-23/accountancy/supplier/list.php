<?php

$action = \GETPOST('action', 'aZ09');
$massaction = \GETPOST('massaction', 'alpha');
$confirm = \GETPOST('confirm', 'alpha');
$toselect = \GETPOST('toselect', 'array:aZ09');
// Value can be 'X_Y'
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'accountancysupplierlist';
// To manage different context of search
$optioncss = \GETPOST('optioncss', 'alpha');
$default_account = \GETPOSTINT('default_account');
// Search Getpost
$search_lineid = \GETPOST('search_lineid', 'alpha');
// Can be '> 100'
$search_societe = \GETPOST('search_societe', 'alpha');
$search_ref = \GETPOST('search_ref', 'alpha');
$search_ref_supplier = \GETPOST('search_ref_supplier', 'alpha');
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
$formaccounting = new \FormAccounting($db);
$accountingAccount = new \AccountingAccount($db);
$chartaccountcode = \dol_getIdFromCode($db, \getDolGlobalString('CHARTOFACCOUNTS'), 'accounting_system', 'rowid', 'pcg_version');
$arrayfields = array(
    'l.rowid' => array('label' => "LineId", 'position' => 1, 'checked' => '1', 'enabled' => '1'),
    'f.ref' => array('label' => "Invoice", 'position' => 1, 'checked' => '1', 'enabled' => '1'),
    'f.libelle' => array('label' => "InvoiceLabel", 'position' => 1, 'checked' => '-1', 'enabled' => '1'),
    'f.datef' => array('label' => "Date", 'position' => 1, 'checked' => '1', 'enabled' => '1'),
    // f.datef, f.ref, l.rowid
    'p.ref' => array('label' => "ProductRef", 'position' => 1, 'checked' => '1', 'enabled' => '1'),
    'l.description' => array('label' => "ProductDescription", 'position' => 1, 'checked' => '-1', 'enabled' => '1'),
    'l.total_ht' => array('label' => "Amount", 'position' => 1, 'checked' => '1', 'enabled' => '1'),
    'l.tva_tx' => array('label' => "VATRate", 'position' => 1, 'checked' => '1', 'enabled' => '1'),
    's.nom' => array('label' => "ThirdParty", 'position' => 1, 'checked' => '1', 'enabled' => '1'),
    'co.label' => array('label' => "Country", 'position' => 1, 'checked' => '1', 'enabled' => '1'),
    's.tva_intra' => array('label' => "VATIntraShort", 'position' => 1, 'checked' => '1', 'enabled' => '1'),
    'aa.data_suggest' => array('label' => "DataUsedToSuggestAccount", 'position' => 1, 'checked' => '1', 'enabled' => '1'),
    // Seems not used in search.
    'aa.account_number' => array('label' => "AccountAccountingSuggest", 'position' => 1, 'checked' => '1', 'enabled' => '1'),
);
// @phpstan-ignore-next-line
$arrayfields = \dol_sort_array($arrayfields, 'position');
$object = \null;
$parameters = array('arrayfields' => &$arrayfields);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
// Mass actions
$objectclass = 'AccountingAccount';
$permissiontoread = $user->hasRight('accounting', 'read');
$permissiontodelete = $user->hasRight('accounting', 'delete');
$uploaddir = $conf->accounting->dir_output;
$msg = '';
/*
 * View
 */
$form = new \Form($db);
$formother = new \FormOther($db);
$help_url = 'EN:Module_Double_Entry_Accounting|FR:Module_Comptabilit&eacute;_en_Partie_Double#Liaisons_comptables';
// Supplier Invoice Lines
$sql = "SELECT f.rowid as facid, f.ref, f.ref_supplier, f.libelle as invoice_label, f.datef, f.type as ftype, f.fk_facture_source,";
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListSelect', $parameters);
$alias_societe_perentity = !\getDolGlobalString('MAIN_COMPANY_PERENTITY_SHARED') ? "s" : "spe";
$alias_product_perentity = !\getDolGlobalString('MAIN_PRODUCT_PERENTITY_SHARED') ? "p" : "ppe";
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
$arrayofselected = \is_array($toselect) ? $toselect : array();
$param = '';
// Add $param from hooks
$parameters = array('param' => &$param);
$reshook = $hookmanager->executeHooks('printFieldListSearchParam', $parameters, $object, $action);
$arrayofmassactions = array('set_default_account' => \img_picto('', 'check', 'class="pictofixedwidth"') . $langs->trans("ConfirmPreselectAccount"), 'ventil' => \img_picto('', 'check', 'class="pictofixedwidth"') . $langs->trans("Ventilate"));
//if ($user->hasRight('mymodule', 'supprimer')) $arrayofmassactions['predelete'] = img_picto('', 'delete', 'class="pictofixedwidth"').$langs->trans("Delete");
//if (in_array($massaction, array('presend','predelete'))) $arrayofmassactions=array();
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
$thirdpartystatic = new \Societe($db);
$facturefourn_static = new \FactureFournisseur($db);
$facturefourn_static_det = new \SupplierInvoiceLine($db);
$product_static = new \Product($db);
$accountingaccount_codetotid_cache = array();
$suggestedaccountingaccountfor = '';
$suggestedaccountingaccountbydefaultfor = '';
$totalarray = array();
$parameters = array('arrayfields' => $arrayfields, 'sql' => $sql);
$reshook = $hookmanager->executeHooks('printFieldListFooter', $parameters, $object, $action);