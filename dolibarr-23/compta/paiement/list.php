<?php

$action = \GETPOST('action', 'alpha');
$massaction = \GETPOST('massaction', 'alpha');
$confirm = \GETPOST('confirm', 'alpha');
$toselect = \GETPOST('toselect', 'array:int');
$optioncss = \GETPOST('optioncss', 'alpha');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'paymentlist';
$mode = \GETPOST('mode', 'alpha');
$facid = \GETPOST('facid', 'int');
$socid = \GETPOST('socid', 'int');
$userid = \GETPOST('userid', 'int');
$search_ref = \GETPOST("search_ref", "alpha");
$search_date_startday = \GETPOSTINT('search_date_startday');
$search_date_startmonth = \GETPOSTINT('search_date_startmonth');
$search_date_startyear = \GETPOSTINT('search_date_startyear');
$search_date_endday = \GETPOSTINT('search_date_endday');
$search_date_endmonth = \GETPOSTINT('search_date_endmonth');
$search_date_endyear = \GETPOSTINT('search_date_endyear');
$search_date_start = \dol_mktime(0, 0, 0, $search_date_startmonth, $search_date_startday, $search_date_startyear);
// Use tzserver
$search_date_end = \dol_mktime(23, 59, 59, $search_date_endmonth, $search_date_endday, $search_date_endyear);
$search_company = \GETPOST("search_company", 'alpha');
$search_paymenttype = \GETPOST("search_paymenttype");
$search_account = \GETPOST("search_account", 'alpha');
$search_payment_num = \GETPOST('search_payment_num', 'alpha');
$search_amount = \GETPOST("search_amount", 'alpha');
// alpha because we must be able to search on "< x"
$search_noteprivate = \GETPOST("search_noteprivate");
$search_status = \GETPOST('search_status', 'intcomma');
$search_sale = \GETPOSTINT('search_sale');
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$search_all = \trim(\GETPOST('search_all', 'alphanohtml'));
$arrayofselected = !empty($arrayofselected) && \is_array($arrayofselected) ? $arrayofselected : array();
// List of fields to search into when doing a "search in all"
$fieldstosearchall = array('p.ref' => "RefPayment", 's.nom' => "ThirdParty", 'p.num_paiement' => "Numero", 'p.amount' => "Amount");
$arrayfields = array('p.ref' => array('label' => "RefPayment", 'checked' => '1', 'position' => 10), 'p.datep' => array('label' => "Date", 'checked' => '1', 'position' => 20), 's.nom' => array('label' => "ThirdParty", 'checked' => '1', 'position' => 30), 'c.libelle' => array('label' => "Type", 'checked' => '1', 'position' => 40), 'transaction' => array('label' => "BankTransactionLine", 'checked' => '1', 'position' => 50, 'enabled' => (string) (int) \isModEnabled("bank")), 'ba.label' => array('label' => "BankAccount", 'checked' => '1', 'position' => 60, 'enabled' => (string) (int) \isModEnabled("bank")), 'p.num_paiement' => array('label' => "Numero", 'checked' => '1', 'position' => 70, 'tooltip' => "ChequeOrTransferNumber"), 'p.amount' => array('label' => "Amount", 'checked' => '1', 'position' => 80), 'p.note' => array('label' => "Comment", 'checked' => '-1', 'position' => 85), 'p.ext_payment_id' => array('label' => "ExtPaymentID", 'checked' => '-1', 'position' => 87), 'p.ext_payment_site' => array('label' => "ExtPaymentSite", 'checked' => '-1', 'position' => 88), 'p.tms' => array('label' => "DateModification", 'checked' => '-1', 'position' => 150), 'p.statut' => array('label' => "Status", 'checked' => '1', 'position' => 200, 'enabled' => \getDolGlobalString('BILL_ADD_PAYMENT_VALIDATION')));
$arrayfields = \dol_sort_array($arrayfields, 'position');
$object = new \Paiement($db);
$extrafields = new \ExtraFields($db);
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
$result = \restrictedArea($user, 'facture', $facid, '');
$permissiontopay = $user->hasRight('facture', 'paiement');
$permissiontodelete = $user->hasRight('facture', 'delete');
$error = 0;
$parameters = array('arrayfields' => &$arrayfields, 'socid' => $socid);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
// Mass actions
$objectclass = 'Paiement';
$objectlabel = 'Payment';
$uploaddir = $conf->invoice->dir_output . '/payments';
/*
 * View
 */
$form = new \Form($db);
$formother = new \FormOther($db);
$accountstatic = new \Account($db);
$companystatic = new \Societe($db);
$bankline = new \AccountLine($db);
$title = $langs->trans('ListPayment');
$sql = "SELECT p.rowid, p.ref, p.datep, p.fk_bank, p.statut, p.num_paiement as num_payment, p.amount, p.note as note_private,";
// Add fields from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListSelect', $parameters, $object, $action);
$sql = \preg_replace('/,\\s*$/', '', $sql);
$sqlfields = $sql;
// Add where from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListWhere', $parameters);
// Count total nb of records
$nbtotalofrecords = '';
/* The fast and low memory method to get and count full list converts the sql into a sql count */
$sqlforcount = \preg_replace('/^' . \preg_quote($sqlfields, '/') . '/', 'SELECT COUNT(DISTINCT p.rowid) as nbtotalofrecords', $sql);
$sqlforcount = \preg_replace('/GROUP BY .*$/', '', $sqlforcount);
$resql = $db->query($sqlforcount);
//print $sql;
$resql = $db->query($sql);
$num = $db->num_rows($resql);
// Output page
// --------------------------------------------------------------------
$arrayofselected = \is_array($toselect) ? $toselect : array();
$param = '';
// Add $param from hooks
$parameters = array('param' => &$param);
$reshook = $hookmanager->executeHooks('printFieldListSearchParam', $parameters, $object, $action);
// List of mass actions available
$arrayofmassactions = array();
$massactionbutton = $form->selectMassAction('', $arrayofmassactions);
$moreforfilter = '';
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldPreListTitle', $parameters, $object, $action);
$parameters = array('arrayfields' => &$arrayfields);
$varpage = empty($contextpage) ? $_SERVER["PHP_SELF"] : $contextpage;
$htmlofselectarray = $form->multiSelectArrayWithCheckbox('selectedfields', $arrayfields, $varpage, $conf->main_checkbox_left_column);
// This also change content of $arrayfields with user setup
$selectedfields = $mode != 'kanban' && $mode != 'kanbangroupby' ? $htmlofselectarray : '';
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