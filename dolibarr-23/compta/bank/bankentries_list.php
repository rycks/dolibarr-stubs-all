<?php

$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel', 'alpha');
$confirm = \GETPOST('confirm', 'alpha');
$contextpage = 'bankentrieslist';
$massaction = \GETPOST('massaction', 'alpha');
$optioncss = \GETPOST('optioncss', 'aZ09');
$mode = \GETPOST('mode', 'aZ');
$dateop = \dol_mktime(12, 0, 0, \GETPOSTINT("opmonth"), \GETPOSTINT("opday"), \GETPOSTINT("opyear"));
$search_debit = \GETPOST("search_debit", 'alpha');
$search_credit = \GETPOST("search_credit", 'alpha');
$search_type = \GETPOST("search_type", 'alpha');
$search_account = \GETPOST("search_account", 'int') ? \GETPOST("search_account", 'int') : \GETPOST("account", 'int');
$search_accountancy_code = \GETPOST('search_accountancy_code', 'alpha') ? \GETPOST('search_accountancy_code', 'alpha') : \GETPOST('accountancy_code', 'alpha');
$search_bid = \GETPOST("search_bid", 'int') ? \GETPOST("search_bid", 'int') : \GETPOST("bid", 'int');
// Category id
$search_ref = \GETPOST('search_ref', 'alpha');
$search_description = \GETPOST("search_description", 'alpha');
$search_dt_start = \dol_mktime(0, 0, 0, \GETPOSTINT('search_start_dtmonth'), \GETPOSTINT('search_start_dtday'), \GETPOSTINT('search_start_dtyear'));
$search_dt_end = \dol_mktime(0, 0, 0, \GETPOSTINT('search_end_dtmonth'), \GETPOSTINT('search_end_dtday'), \GETPOSTINT('search_end_dtyear'));
$search_dv_start = \dol_mktime(0, 0, 0, \GETPOSTINT('search_start_dvmonth'), \GETPOSTINT('search_start_dvday'), \GETPOSTINT('search_start_dvyear'));
$search_dv_end = \dol_mktime(0, 0, 0, \GETPOSTINT('search_end_dvmonth'), \GETPOSTINT('search_end_dvday'), \GETPOSTINT('search_end_dvyear'));
$search_thirdparty_user = \GETPOST("search_thirdparty", 'alpha') ? \GETPOST("search_thirdparty", 'alpha') : \GETPOST("thirdparty", 'alpha');
$search_req_nb = \GETPOST("req_nb", 'alpha');
$search_num_releve = \GETPOST("search_num_releve", 'alpha');
$search_conciliated = \GETPOST("search_conciliated", 'int');
$search_fk_bordereau = \GETPOST("search_fk_bordereau", 'int');
$optioncss = \GETPOST('optioncss', 'alpha');
$toselect = \GETPOST('toselect', 'array:int');
$num_releve = \GETPOST("num_releve", "alpha");
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT('page');
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$object = new \Account($db);
$result = $object->fetch($id, $ref);
$search_account = $object->id;
// redefine contextpage to depend on bank account
$contextpage = 'banktransactionlist' . (empty($object->id) ? '' : '-' . $object->id);
$mode_balance_ok = \false;
$sortfield = 'b.datev,b.dateo,b.rowid';
$extrafields = new \ExtraFields($db);
$extrafieldsobjectkey = 'bank';
$search_array_options = $extrafields->getOptionalsFromPost($extrafieldsobjectkey, '', 'search_');
$arrayfields = array('b.rowid' => array('label' => $langs->trans("Ref"), 'checked' => '1', 'position' => 10), 'b.label' => array('label' => $langs->trans("Description"), 'checked' => '1', 'position' => 20), 'b.dateo' => array('label' => $langs->trans("DateOperationShort"), 'checked' => '-1', 'position' => 30), 'b.datev' => array('label' => $langs->trans("DateValueShort"), 'checked' => '1', 'position' => 40), 'type' => array('label' => $langs->trans("Type"), 'checked' => '1', 'position' => 50), 'b.num_chq' => array('label' => $langs->trans("Numero"), 'checked' => '0', 'position' => 60), 'b.fk_bordereau' => array('label' => $langs->trans("ChequeNumber"), 'checked' => '0', 'position' => 65), 'bu.label' => array('label' => $langs->trans("ThirdParty") . '/' . $langs->trans("User"), 'checked' => '1', 'position' => 70), 'ba.ref' => array('label' => $langs->trans("BankAccount"), 'checked' => $id > 0 || !empty($ref) ? '0' : '1', 'position' => 80), 'b.debit' => array('label' => $langs->trans("Debit"), 'checked' => '1', 'position' => 90), 'b.credit' => array('label' => $langs->trans("Credit"), 'checked' => '1', 'position' => 100), 'balancebefore' => array('label' => $langs->trans("BalanceBefore"), 'checked' => '0', 'position' => 110), 'balance' => array('label' => $langs->trans("Balance"), 'checked' => '1', 'position' => 120), 'b.num_releve' => array('label' => $langs->trans("AccountStatement"), 'checked' => '1', 'position' => 130), 'b.conciliated' => array('label' => $langs->trans("BankLineReconciled"), 'enabled' => (string) (int) $object->rappro, 'checked' => $action == 'reconcile' ? '1' : '0', 'position' => 140));
$arrayfields = \dol_sort_array($arrayfields, 'position');
// Security check
$fieldvalue = !empty($id) ? $id : (!empty($ref) ? $ref : '');
$fieldtype = !empty($ref) ? 'ref' : 'rowid';
$result = \restrictedArea($user, 'banque', $fieldvalue, 'bank_account&bank_account', '', '', $fieldtype);
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
// All tests are required to be compatible with all browsers
$search_dt_start = '';
$search_dt_end = '';
$search_dv_start = '';
$search_dv_end = '';
$search_type = "";
$search_debit = "";
$search_credit = "";
$search_bid = "";
$search_ref = "";
$search_req_nb = '';
$search_description = '';
$search_thirdparty_user = '';
$search_num_releve = '';
$search_conciliated = '';
$search_fk_bordereau = '';
$toselect = array();
$search_account = "";
$rowids = \GETPOST('rowid', 'array:int');
$error = 0;
// Definition, nettoyage parameters
$num_releve = \GETPOST("num_releve", "alpha");
$error = 0;
$operation = \GETPOST("operation", 'alpha');
$num_chq = \GETPOST("num_chq", 'alpha');
$label = \GETPOST("label", 'alpha');
$cat1 = \GETPOST("cat1", 'alpha');
$bankaccountid = $id;
$accline = new \AccountLine($db);
$result = $accline->fetch(\GETPOSTINT("rowid"));
$result = $accline->delete($user);
$action = 'reconcile';
$accline = new \AccountLine($db);
$result = $accline->fetch(\GETPOSTINT("rowid"));
$result = $accline->delete($user);
/*
 * View
 */
$form = new \Form($db);
$formother = new \FormOther($db);
$formaccounting = new \FormAccounting($db);
$companystatic = new \Societe($db);
$bankaccountstatic = new \Account($db);
$userstatic = new \User($db);
$banktransferstatic = new \BonPrelevement($db);
$societestatic = new \Societe($db);
$userstatic = new \User($db);
$chargestatic = new \ChargeSociales($db);
$loanstatic = new \Loan($db);
$memberstatic = new \Adherent($db);
$donstatic = new \Don($db);
$paymentstatic = new \Paiement($db);
$paymentsupplierstatic = new \PaiementFourn($db);
$paymentscstatic = new \PaymentSocialContribution($db);
$paymentvatstatic = new \PaymentVAT($db);
$paymentsalstatic = new \PaymentSalary($db);
$paymentdonationstatic = new \PaymentDonation($db);
$paymentvariousstatic = new \PaymentVarious($db);
$paymentexpensereportstatic = new \PaymentExpenseReport($db);
$bankstatic = new \Account($db);
$banklinestatic = new \AccountLine($db);
$bordereaustatic = new \RemiseCheque($db);
$now = \dol_now();
// Must be before button action
$param = '';
$totalarray = array('nbfield' => 0, 'totalcred' => 0, 'totaldeb' => 0);
$options = array();
$buttonreconcile = '';
$morehtmlref = '';
$help_url = '';
$bankcateg = new \BankCateg($db);
$arrayofbankcateg = $bankcateg->fetchAll();
// Bank card
$head = \bank_prepare_head($object);
$activetab = 'journal';
$linkback = '<a href="' . \DOL_URL_ROOT . '/compta/bank/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
$sql = "SELECT b.rowid, b.dateo as do, b.datev as dv, b.amount, b.label, b.rappro as conciliated, b.num_releve, b.num_chq,";
// Add fields from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListSelect', $parameters, $object, $action);
// Add fields from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListJoin', $parameters, $object, $action);
// Add where from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListWhere', $parameters, $object, $action);
$nbtotalofrecords = '';
$nbtotalofpages = 0;
// We open a list of transaction of a dedicated account and no page was set by default
// We force on last page.
$page = $nbtotalofpages - 1;
$offset = $limit * $page;
// If we made a search and result has low page than the page number we were on
$page = $nbtotalofpages - 1;
$offset = $limit * $page;
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$arrayofselected = !empty($toselect) && \is_array($toselect) ? $toselect : array();
// List of mass actions available
$arrayofmassactions = array();
$massactionbutton = $form->selectMassAction('', $arrayofmassactions);
// Code to adjust value date with plus and less picto using an Ajax call instead of a full reload of page
$urlajax = \DOL_URL_ROOT . '/core/ajax/bankconciliate.php?format=dayreduceformat&token=' . \currentToken();
$i = 0;
// Title
$bankcateg = new \BankCateg($db);
$newcardbutton = '';
$morehtml = '';
$morehtmlright = '<!-- Add New button -->' . $newcardbutton;
$picto = 'bank_account';
$moreforfilter = '';
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldPreListTitle', $parameters, $object, $action);
$varpage = empty($contextpage) ? $_SERVER["PHP_SELF"] : $contextpage;
$htmlofselectarray = $form->multiSelectArrayWithCheckbox('selectedfields', $arrayfields, $varpage, \getDolGlobalString('MAIN_CHECKBOX_LEFT_COLUMN'));
// This also change content of $arrayfields with user setup
$selectedfields = $mode != 'kanban' ? $htmlofselectarray : '';
$totalarray = array();
// Hook fields
$parameters = array('arrayfields' => $arrayfields, 'param' => $param, 'sortfield' => $sortfield, 'sortorder' => $sortorder, 'totalarray' => &$totalarray);
$reshook = $hookmanager->executeHooks('printFieldListTitle', $parameters, $object, $action);
$balance = 0;
// For balance
$balancebefore = 0;
// For balance
$balancecalculated = \false;
$posconciliatecol = 0;
$cachebankaccount = array();
$sign = 1;
// Loop on each record
$i = 0;
$savnbfield = $totalarray['nbfield'];
$totalarray = array();
$imaxinloop = $limit ? \min($num, $limit) : $num;