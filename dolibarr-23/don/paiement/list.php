<?php

$action = \GETPOST('action', 'aZ09') ? \GETPOST('action', 'aZ09') : 'view';
// The action 'create'/'add', 'edit'/'update', 'view', ...
$massaction = \GETPOST('massaction', 'alpha');
// The bulk action (combo box choice into lists)
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'sclist';
$mode = \GETPOST('mode', 'alpha');
$paiementid = \GETPOSTINT('paiementid');
$search_ref = \GETPOST("search_ref", "alpha");
$search_date_startday = \GETPOSTINT('search_date_startday');
$search_date_startmonth = \GETPOSTINT('search_date_startmonth');
$search_date_startyear = \GETPOSTINT('search_date_startyear');
$search_date_endday = \GETPOSTINT('search_date_endday');
$search_date_endmonth = \GETPOSTINT('search_date_endmonth');
$search_date_endyear = \GETPOSTINT('search_date_endyear');
$search_date_start = \dol_mktime(0, 0, 0, $search_date_startmonth, $search_date_startday, $search_date_startyear);
$search_date_end = \dol_mktime(23, 59, 59, $search_date_endmonth, $search_date_endday, $search_date_endyear);
$search_company = \GETPOST("search_company", 'alpha');
$search_paymenttype = \GETPOST("search_paymenttype", "intcomma");
$search_account = \GETPOST("search_account", 'alpha');
$search_payment_num = \GETPOST('search_payment_num', 'alpha');
$search_amount = \GETPOST("search_amount", 'alpha');
$search_status = \GETPOST('search_status', 'intcomma');
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$search_all = \trim(\GETPOST('search_all', 'alphanohtml'));
$object = new \Don($db);
$morejs = array();
$morecss = array();
// List of fields to search into when doing a "search in all"
$fieldstosearchall = array('pd.rowid' => "RefPayment", 's.nom' => "ThirdParty", 'pd.num_paiement' => "Numero", 'pd.amount' => "Amount");
$arrayfields = array('pd.rowid' => array('label' => "RefPayment", 'checked' => '1', 'position' => 10), 'pd.datep' => array('label' => "Date", 'checked' => '1', 'position' => 20), 's.nom' => array('label' => "ThirdParty", 'checked' => '1', 'position' => 30), 'c.code' => array('label' => "Type", 'checked' => '1', 'position' => 40), 'pd.num_paiement' => array('label' => "Numero", 'checked' => '1', 'position' => 50, 'tooltip' => "ChequeOrTransferNumber"), 'transaction' => array('label' => "BankTransactionLine", 'checked' => '1', 'position' => 60, 'enabled' => (string) (int) \isModEnabled("bank")), 'ba.label' => array('label' => "BankAccount", 'checked' => '1', 'position' => 70, 'enabled' => (string) (int) \isModEnabled("bank")), 'pd.amount' => array('label' => "Amount", 'checked' => '1', 'position' => 80));
$arrayfields = \dol_sort_array($arrayfields, 'position');
$optioncss = \GETPOST('optioncss', 'alpha');
$moreforfilter = \GETPOST('moreforfilter', 'alpha');
// Security check
$result = \restrictedArea($user, 'don');
$permissiontoread = $user->hasRight('don', 'read');
$permissiontoadd = $user->hasRight('don', 'write');
$permissiontodelete = $user->hasRight('don', 'delete');
/*
 * Actions
 */
$parameters = array('socid' => $paiementid);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$companystatic = new \Societe($db);
$bankline = new \AccountLine($db);
$accountstatic = new \Account($db);
$title = $langs->trans("Donations");
$help_url = 'EN:Module_Donations|FR:Module_Dons|ES:M&oacute;dulo_Donaciones|DE:Modul_Spenden';
// Build and execute select
// --------------------------------------------------------------------
$sql = "SELECT pd.rowid as payment_id, pd.amount, pd.datep, pd.fk_typepayment, pd.num_payment, pd.amount, pd.fk_bank, ";
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
$resql = $db->query($sql);
$num = $db->num_rows($resql);
// Can use also classforhorizontalscrolloftabs instead of bodyforlist for no horizontal scroll
$param = '';
$varpage = empty($contextpage) ? $_SERVER["PHP_SELF"] : $contextpage;
$selectedfields = $form->multiSelectArrayWithCheckbox('selectedfields', $arrayfields, $varpage, \getDolGlobalString('MAIN_CHECKBOX_LEFT_COLUMN'));
// This also change content of $arrayfields
$massactionbutton = '';
$moreforfilter = '';
// Fields from hook
$parameters = array('arrayfields' => $arrayfields);
$reshook = $hookmanager->executeHooks('printFieldListOption', $parameters, $object, $action);
$totalarray = array();
// Hook fields
$parameters = array('arrayfields' => $arrayfields, 'param' => $param, 'sortfield' => $sortfield, 'sortorder' => $sortorder);
$reshook = $hookmanager->executeHooks('printFieldListTitle', $parameters);
// Detect if we need a fetch on each output line
$needToFetchEachLine = 0;
// Loop on record
// --------------------------------------------------------------------
$i = 0;
$savnbfield = $totalarray['nbfield'];
$totalarray = array();
$imaxinloop = $limit ? \min($num, $limit) : $num;
$parameters = array('arrayfields' => $arrayfields, 'sql' => $sql);
$reshook = $hookmanager->executeHooks('printFieldListFooter', $parameters, $object, $action);