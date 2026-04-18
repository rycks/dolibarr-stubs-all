<?php

$action = \GETPOST('action', 'alpha');
$confirm = \GETPOST('confirm', 'alpha');
$optioncss = \GETPOST('optioncss', 'alpha');
$cancel = \GETPOST('cancel', 'alpha');
$backtopage = \GETPOST('backtopage', 'alpha');
$backtopageforcancel = \GETPOST('backtopageforcancel', 'alpha');
$facid = \GETPOSTINT('facid');
$socid = \GETPOSTINT('socid');
$accountid = \GETPOSTINT('accountid');
$day = \GETPOSTINT('day');
$month = \GETPOSTINT('month');
$year = \GETPOSTINT('year');
$search_ref = \GETPOST('search_ref', 'alpha');
$search_account = \GETPOST('search_account', 'alpha');
$search_paymenttype = \GETPOST('search_paymenttype');
$search_amount = \GETPOST('search_amount', 'alpha');
// alpha because we must be able to search on "< x"
$search_company = \GETPOST('search_company', 'alpha');
$search_payment_num = \GETPOST('search_payment_num', 'alpha');
$displayAllInvoices = \getDolGlobalInt('MAIN_PAIMENTS_SHOW_ALL_INVOICE_TYPES', 0);
$limit = \GETPOSTINT('limit') ? \GETPOST('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$amounts = array();
$amountsresttopay = array();
$addwarning = 0;
$multicurrency_amounts = array();
$multicurrency_amountsresttopay = array();
$object = new \PaiementFourn($db);
$extrafields = new \ExtraFields($db);
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
$arrayfields = array();
$permissiontoadd = $user->hasRight("fournisseur", "facture", "creer") || $user->hasRight("supplier_invoice", "creer");
/*
 * Actions
 */
$error = 0;
$parameters = array('socid' => $socid);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$formquestion = array();
/*
 * View
 */
$form = new \Form($db);
$formother = new \FormOther($db);
$supplierstatic = new \Societe($db);
$invoicesupplierstatic = new \FactureFournisseur($db);
$object = new \FactureFournisseur($db);
$result = $object->fetch($facid);
$datefacture = \dol_mktime(12, 0, 0, \GETPOSTINT('remonth'), \GETPOSTINT('reday'), \GETPOSTINT('reyear'));
$dateinvoice = $datefacture == '' ? !\getDolGlobalString('MAIN_AUTOFILL_DATE') ? -1 : '' : $datefacture;
$sql = 'SELECT s.nom as name, s.rowid as socid,';
$resql = $db->query($sql);