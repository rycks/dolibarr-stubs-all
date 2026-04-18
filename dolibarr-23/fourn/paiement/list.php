<?php

$action = \GETPOST('action', 'alpha');
$massaction = \GETPOST('massaction', 'alpha');
$optioncss = \GETPOST('optioncss', 'alpha');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'vendorpaymentlist';
$mode = \GETPOST('mode', 'aZ');
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
$search_company = \GETPOST('search_company', 'alpha');
$search_payment_type = \GETPOST('search_payment_type', 'alpha');
$search_cheque_num = \GETPOST('search_cheque_num', 'alpha');
$search_bank_account = \GETPOST('search_bank_account', 'int');
$search_amount = \GETPOST('search_amount', 'alpha');
// alpha because we must be able to search on '< x'
$search_sale = \GETPOSTINT('search_sale');
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT('page');
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$search_all = \trim(\GETPOST('search_all', 'alphanohtml'));
// List of fields to search into when doing a "search in all"
$fieldstosearchall = array('p.ref' => "RefPayment", 's.nom' => "ThirdParty", 'p.num_paiement' => "Numero", 'p.amount' => "Amount");
$arrayfields = array('p.ref' => array('label' => "RefPayment", 'checked' => '1', 'position' => 10), 'p.datep' => array('label' => "Date", 'checked' => '1', 'position' => 20), 's.nom' => array('label' => "ThirdParty", 'checked' => '1', 'position' => 30), 'c.libelle' => array('label' => "Type", 'checked' => '1', 'position' => 40), 'p.num_paiement' => array('label' => "Numero", 'checked' => '1', 'position' => 50, 'tooltip' => "ChequeOrTransferNumber"), 'ba.label' => array('label' => "BankAccount", 'checked' => '1', 'position' => 60, 'enabled' => (string) (int) \isModEnabled("bank")), 'p.amount' => array('label' => "Amount", 'checked' => '1', 'position' => 70));
$arrayfields = \dol_sort_array($arrayfields, 'position');
$object = new \PaiementFourn($db);
/*
 * Actions
 */
$parameters = array('socid' => $socid);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$title = $langs->trans('ListPayment');
$help_url = '';
$form = new \Form($db);
$formother = new \FormOther($db);
$accountstatic = new \Account($db);
$companystatic = new \Societe($db);
$paymentfournstatic = new \PaiementFourn($db);
$sql = 'SELECT p.rowid, p.ref, p.datep, p.fk_bank, p.statut, p.num_paiement as num_payment, p.amount';
$sqlfields = $sql;
// Count total nb of records
$nbtotalofrecords = '';
/* The fast and low memory method to get and count full list converts the sql into a sql count */
$sqlforcount = \preg_replace('/^' . \preg_quote($sqlfields, '/') . '/', 'SELECT COUNT(DISTINCT p.rowid) as nbtotalofrecords', $sql);
$sqlforcount = \preg_replace('/GROUP BY .*$/', '', $sqlforcount);
$resql = $db->query($sqlforcount);
//print $sql;
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$i = 0;
$param = '';
// List of mass actions available
$arrayofmassactions = array();
$massactionbutton = $form->selectMassAction('', $arrayofmassactions);
$moreforfilter = '';
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldPreListTitle', $parameters, $object, $action);
$varpage = empty($contextpage) ? $_SERVER["PHP_SELF"] : $contextpage;
$selectedfields = $form->multiSelectArrayWithCheckbox('selectedfields', $arrayfields, $varpage, \getDolGlobalString('MAIN_CHECKBOX_LEFT_COLUMN'));
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