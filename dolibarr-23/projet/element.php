<?php

$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$datesrfc = \GETPOST('datesrfc');
// deprecated
$dateerfc = \GETPOST('dateerfc');
// deprecated
$dates = \dol_mktime(0, 0, 0, \GETPOSTINT('datesmonth'), \GETPOSTINT('datesday'), \GETPOSTINT('datesyear'));
$datee = \dol_mktime(23, 59, 59, \GETPOSTINT('dateemonth'), \GETPOSTINT('dateeday'), \GETPOSTINT('dateeyear'));
$mine = \GETPOST('mode') == 'mine' ? 1 : 0;
$object = new \Project($db);
// Security check
$socid = $object->socid;
//if ($user->socid > 0) $socid = $user->socid;    // For external user, no check is done on company because readability is managed by public status of project and assignment.
$result = \restrictedArea($user, 'projet', $object->id, 'projet&project');
// Check if user has access to any financial module (not just project time)
$canSeeFinancials = \isModEnabled('invoice') && $user->hasRight('facture', 'lire') || \isModEnabled('supplier_invoice') && ($user->hasRight('fournisseur', 'facture', 'lire') || $user->hasRight('supplier_invoice', 'lire')) || \isModEnabled('salaries') && $user->hasRight('salaries', 'read') || \isModEnabled('expensereport') && $user->hasRight('expensereport', 'lire') || \isModEnabled('don') && $user->hasRight('don', 'lire') || \isModEnabled('tax') && $user->hasRight('tax', 'charges', 'lire') || \isModEnabled('bank') && $user->hasRight('banque', 'lire');
$total_duration = 0;
$total_ttc_by_line = 0;
$total_ht_by_line = 0;
$expensereport = \null;
$othermessage = '';
$tmpprojtime = array();
$nbAttendees = 0;
$permissiontoadd = $user->hasRight('projet', 'creer');
$permissiontodelete = $user->hasRight('projet', 'supprimer');
$permissiondellink = $user->hasRight('projet', 'creer');
// Used by the include of actions_dellink.inc.php
$permissiontoeditextra = $permissiontoadd;
$error = 0;
// @phan-suppress-current-line PhanTypeMismatchProperty
$attribute_name = \GETPOST('attribute', 'aZ09');
// Fill array 'array_options' with data from update form
$ret = $extrafields->setOptionalsFromPost(\null, $object, $attribute_name);
$error = 0;
/*
 *	View
 */
$title = $langs->trans('ProjectReferers') . ' - ' . $object->ref . ' ' . $object->name;
$help_url = 'EN:Module_Projects|FR:Module_Projets|ES:M&oacute;dulo_Proyectos|DE:Modul_Projekte';
$form = new \Form($db);
$formproject = new \FormProjets($db);
$formfile = new \FormFile($db);
$userstatic = new \User($db);
// To verify role of users
$userAccess = $object->restrictedProjectArea($user);
$head = \project_prepare_head($object);
$morehtmlref = '<div class="refidno">';
$code = \dol_getIdFromCode($db, $object->opp_status, 'c_lead_status', 'rowid', 'code');
$start = \dol_print_date($object->date_start, 'day');
$end = \dol_print_date($object->date_end, 'day');
// Other attributes
$cols = 2;
/*
 * Referrer types
 */
$listofreferent = array('entrepot' => array('name' => "Warehouse", 'title' => "ListWarehouseAssociatedProject", 'class' => 'Entrepot', 'table' => 'entrepot', 'datefieldname' => 'date_entrepot', 'urlnew' => \DOL_URL_ROOT . '/product/stock/card.php?action=create&projectid=' . $id . '&backtopage=' . \urlencode($_SERVER['PHP_SELF'] . '?id=' . $id), 'lang' => 'entrepot', 'buttonnew' => 'AddWarehouse', 'project_field' => 'fk_project', 'testnew' => $user->hasRight('stock', 'creer'), 'test' => \isModEnabled('stock') && $user->hasRight('stock', 'lire') && \getDolGlobalString('WAREHOUSE_ASK_WAREHOUSE_DURING_PROJECT')), 'propal' => array('name' => "Proposals", 'title' => "ListProposalsAssociatedProject", 'class' => 'Propal', 'table' => 'propal', 'datefieldname' => 'datep', 'urlnew' => \DOL_URL_ROOT . '/comm/propal/card.php?action=create&origin=project&originid=' . $id . '&socid=' . $socid . '&backtopage=' . \urlencode($_SERVER['PHP_SELF'] . '?id=' . $id), 'lang' => 'propal', 'buttonnew' => 'AddProp', 'testnew' => $user->hasRight('propal', 'creer'), 'test' => \isModEnabled('propal') && $user->hasRight('propal', 'lire')), 'order' => array('name' => "CustomersOrders", 'title' => "ListOrdersAssociatedProject", 'class' => 'Commande', 'table' => 'commande', 'datefieldname' => 'date_commande', 'urlnew' => \DOL_URL_ROOT . '/commande/card.php?action=create&projectid=' . $id . '&socid=' . $socid . '&backtopage=' . \urlencode($_SERVER['PHP_SELF'] . '?id=' . $id), 'lang' => 'orders', 'buttonnew' => 'CreateOrder', 'testnew' => $user->hasRight('commande', 'creer'), 'test' => \isModEnabled('order') && $user->hasRight('commande', 'lire')), 'invoice' => array('name' => "CustomersInvoices", 'title' => "ListInvoicesAssociatedProject", 'class' => 'Facture', 'margin' => 'add', 'table' => 'facture', 'datefieldname' => 'datef', 'urlnew' => \DOL_URL_ROOT . '/compta/facture/card.php?action=create&projectid=' . $id . '&socid=' . $socid . '&backtopage=' . \urlencode($_SERVER['PHP_SELF'] . '?id=' . $id), 'lang' => 'bills', 'buttonnew' => 'CreateBill', 'testnew' => $user->hasRight('facture', 'creer'), 'test' => \isModEnabled('invoice') && $user->hasRight('facture', 'lire')), 'invoice_predefined' => array('name' => "PredefinedInvoices", 'title' => "ListPredefinedInvoicesAssociatedProject", 'class' => 'FactureRec', 'table' => 'facture_rec', 'datefieldname' => 'datec', 'urlnew' => \DOL_URL_ROOT . '/compta/facture/card.php?action=create&projectid=' . $id . '&socid=' . $socid . '&backtopage=' . \urlencode($_SERVER['PHP_SELF'] . '?id=' . $id), 'lang' => 'bills', 'buttonnew' => 'CreateBill', 'testnew' => $user->hasRight('facture', 'creer'), 'test' => \isModEnabled('invoice') && $user->hasRight('facture', 'lire')), 'proposal_supplier' => array(
    'name' => "SupplierProposals",
    'title' => "ListSupplierProposalsAssociatedProject",
    'class' => 'SupplierProposal',
    'table' => 'supplier_proposal',
    'datefieldname' => 'date_valid',
    'urlnew' => \DOL_URL_ROOT . '/supplier_proposal/card.php?action=create&projectid=' . $id . '&backtopage=' . \urlencode($_SERVER['PHP_SELF'] . '?id=' . $id),
    // No socid parameter here, the socid is often the customer and we create a supplier object
    'lang' => 'supplier_proposal',
    'buttonnew' => 'AddSupplierProposal',
    'testnew' => $user->hasRight('supplier_proposal', 'creer'),
    'test' => \isModEnabled('supplier_proposal') && $user->hasRight('supplier_proposal', 'lire'),
), 'order_supplier' => array(
    'name' => "SuppliersOrders",
    'title' => "ListSupplierOrdersAssociatedProject",
    'class' => 'CommandeFournisseur',
    'table' => 'commande_fournisseur',
    'datefieldname' => 'date_commande',
    'urlnew' => \DOL_URL_ROOT . '/fourn/commande/card.php?action=create&projectid=' . $id . '&backtopage=' . \urlencode($_SERVER['PHP_SELF'] . '?id=' . $id),
    // No socid parameter here, the socid is often the customer and we create a supplier object
    'lang' => 'suppliers',
    'buttonnew' => 'AddSupplierOrder',
    'testnew' => $user->hasRight('fournisseur', 'commande', 'creer') || $user->hasRight('supplier_order', 'creer'),
    'test' => \isModEnabled('supplier_order') && $user->hasRight('fournisseur', 'commande', 'lire') || $user->hasRight('supplier_order', 'lire'),
), 'invoice_supplier' => array(
    'name' => "BillsSuppliers",
    'title' => "ListSupplierInvoicesAssociatedProject",
    'class' => 'FactureFournisseur',
    'margin' => 'minus',
    'table' => 'facture_fourn',
    'datefieldname' => 'datef',
    'urlnew' => \DOL_URL_ROOT . '/fourn/facture/card.php?action=create&projectid=' . $id . '&backtopage=' . \urlencode($_SERVER['PHP_SELF'] . '?id=' . $id),
    // No socid parameter here, the socid is often the customer and we create a supplier object
    'lang' => 'suppliers',
    'buttonnew' => 'AddSupplierInvoice',
    'testnew' => $user->hasRight('fournisseur', 'facture', 'creer') || $user->hasRight('supplier_invoice', 'creer'),
    'test' => \isModEnabled('supplier_invoice') && $user->hasRight('fournisseur', 'facture', 'lire') || $user->hasRight('supplier_invoice', 'lire'),
), 'contract' => array('name' => "Contracts", 'title' => "ListContractAssociatedProject", 'class' => 'Contrat', 'table' => 'contrat', 'datefieldname' => 'date_contrat', 'urlnew' => \DOL_URL_ROOT . '/contrat/card.php?action=create&projectid=' . $id . '&socid=' . $socid . '&backtopage=' . \urlencode($_SERVER['PHP_SELF'] . '?id=' . $id), 'lang' => 'contracts', 'buttonnew' => 'AddContract', 'testnew' => $user->hasRight('contrat', 'creer'), 'test' => \isModEnabled('contract') && $user->hasRight('contrat', 'lire')), 'intervention' => array('name' => "Interventions", 'title' => "ListFichinterAssociatedProject", 'class' => 'Fichinter', 'table' => 'fichinter', 'datefieldname' => 'date_valid', 'disableamount' => 0, 'margin' => '', 'urlnew' => \DOL_URL_ROOT . '/fichinter/card.php?action=create&origin=project&originid=' . $id . '&socid=' . $socid . '&backtopage=' . \urlencode($_SERVER['PHP_SELF'] . '?id=' . $id), 'lang' => 'interventions', 'buttonnew' => 'AddIntervention', 'testnew' => $user->hasRight('ficheinter', 'creer'), 'test' => \isModEnabled('intervention') && $user->hasRight('ficheinter', 'lire')), 'shipping' => array('name' => "Shippings", 'title' => "ListShippingAssociatedProject", 'class' => 'Expedition', 'table' => 'expedition', 'datefieldname' => 'date_valid', 'urlnew' => \DOL_URL_ROOT . '/expedition/card.php?action=create&origin=project&originid=' . $id . '&socid=' . $socid . '&backtopage=' . \urlencode($_SERVER['PHP_SELF'] . '?id=' . $id), 'lang' => 'sendings', 'buttonnew' => 'CreateShipment', 'testnew' => 0, 'test' => \isModEnabled('shipping') && $user->hasRight('expedition', 'lire')), 'mrp' => array('name' => "MO", 'title' => "ListMOAssociatedProject", 'class' => 'Mo', 'table' => 'mrp_mo', 'datefieldname' => 'date_valid', 'urlnew' => \DOL_URL_ROOT . '/mrp/mo_card.php?action=create&origin=project&originid=' . $id . '&socid=' . $socid . '&backtopage=' . \urlencode($_SERVER['PHP_SELF'] . '?id=' . $id), 'lang' => 'mrp', 'buttonnew' => 'CreateMO', 'testnew' => $user->hasRight('mrp', 'write'), 'project_field' => 'fk_project', 'nototal' => 1, 'test' => \isModEnabled('mrp') && $user->hasRight('mrp', 'read')), 'trip' => array('name' => "TripsAndExpenses", 'title' => "ListExpenseReportsAssociatedProject", 'class' => 'Deplacement', 'table' => 'deplacement', 'datefieldname' => 'dated', 'margin' => 'minus', 'disableamount' => 1, 'urlnew' => \DOL_URL_ROOT . '/deplacement/card.php?action=create&projectid=' . $id . '&socid=' . $socid . '&backtopage=' . \urlencode($_SERVER['PHP_SELF'] . '?id=' . $id), 'lang' => 'trips', 'buttonnew' => 'AddTrip', 'testnew' => $user->hasRight('deplacement', 'creer'), 'test' => \isModEnabled('deplacement') && $user->hasRight('deplacement', 'lire')), 'expensereport' => array('name' => "ExpenseReports", 'title' => "ListExpenseReportsAssociatedProject", 'class' => 'ExpenseReportLine', 'table' => 'expensereport_det', 'datefieldname' => 'date', 'margin' => 'minus', 'disableamount' => 0, 'urlnew' => \DOL_URL_ROOT . '/expensereport/card.php?action=create&projectid=' . $id . '&socid=' . $socid . '&backtopage=' . \urlencode($_SERVER['PHP_SELF'] . '?id=' . $id), 'lang' => 'trips', 'buttonnew' => 'AddTrip', 'testnew' => $user->hasRight('expensereport', 'creer'), 'test' => \isModEnabled('expensereport') && $user->hasRight('expensereport', 'lire')), 'donation' => array('name' => "Donation", 'title' => "ListDonationsAssociatedProject", 'class' => 'Don', 'margin' => 'add', 'table' => 'don', 'datefieldname' => 'datedon', 'disableamount' => 0, 'urlnew' => \DOL_URL_ROOT . '/don/card.php?action=create&projectid=' . $id . '&socid=' . $socid . '&backtopage=' . \urlencode($_SERVER['PHP_SELF'] . '?id=' . $id), 'lang' => 'donations', 'buttonnew' => 'AddDonation', 'testnew' => $user->hasRight('don', 'creer'), 'test' => \isModEnabled('don') && $user->hasRight('don', 'lire')), 'loan' => array('name' => "Loan", 'title' => "ListLoanAssociatedProject", 'class' => 'Loan', 'margin' => '', 'table' => 'loan', 'datefieldname' => 'datestart', 'disableamount' => 0, 'urlnew' => \DOL_URL_ROOT . '/loan/card.php?action=create&projectid=' . $id . '&socid=' . $socid . '&backtopage=' . \urlencode($_SERVER['PHP_SELF'] . '?id=' . $id), 'lang' => 'loan', 'buttonnew' => 'AddLoan', 'testnew' => $user->hasRight('loan', 'write'), 'test' => \isModEnabled('loan') && $user->hasRight('loan', 'read')), 'chargesociales' => array('name' => "SocialContribution", 'title' => "ListSocialContributionAssociatedProject", 'class' => 'ChargeSociales', 'margin' => 'minus', 'table' => 'chargesociales', 'datefieldname' => 'date_ech', 'disableamount' => 0, 'urlnew' => \DOL_URL_ROOT . '/compta/sociales/card.php?action=create&projectid=' . $id . '&backtopage=' . \urlencode($_SERVER['PHP_SELF'] . '?id=' . $id), 'lang' => 'compta', 'buttonnew' => 'AddSocialContribution', 'testnew' => $user->hasRight('tax', 'charges', 'lire'), 'test' => \isModEnabled('tax') && $user->hasRight('tax', 'charges', 'lire')), 'project_task' => array('name' => "TaskTimeSpent", 'title' => "ListTaskTimeUserProject", 'class' => 'Task', 'margin' => 'minus', 'table' => 'projet_task', 'datefieldname' => 'element_date', 'disableamount' => $canSeeFinancials ? 0 : 1, 'urlnew' => \DOL_URL_ROOT . '/projet/tasks/time.php?withproject=1&action=createtime&projectid=' . $id . '&backtopage=' . \urlencode($_SERVER['PHP_SELF'] . '?id=' . $id), 'buttonnew' => 'AddTimeSpent', 'testnew' => $user->hasRight('project', 'creer'), 'test' => \isModEnabled('project') && $user->hasRight('projet', 'lire') && !\getDolGlobalString('PROJECT_HIDE_TASKS')), 'stock_mouvement' => array('name' => "MouvementStockAssociated", 'title' => "ListMouvementStockProject", 'class' => 'StockTransfer', 'table' => 'stocktransfer_stocktransfer', 'datefieldname' => 'datem', 'margin' => 'minus', 'project_field' => 'fk_project', 'disableamount' => 0, 'test' => \isModEnabled('stock') && $user->hasRight('stock', 'mouvement', 'lire') && \getDolGlobalString('STOCK_MOVEMENT_INTO_PROJECT_OVERVIEW')), 'salaries' => array('name' => "Salaries", 'title' => "ListSalariesAssociatedProject", 'class' => 'Salary', 'table' => 'salary', 'datefieldname' => 'datesp', 'margin' => 'minus', 'disableamount' => 0, 'urlnew' => \DOL_URL_ROOT . '/salaries/card.php?action=create&projectid=' . $id . '&backtopage=' . \urlencode($_SERVER['PHP_SELF'] . '?id=' . $id), 'lang' => 'salaries', 'buttonnew' => 'AddSalary', 'testnew' => $user->hasRight('salaries', 'write'), 'test' => \isModEnabled('salaries') && $user->hasRight('salaries', 'read')), 'variouspayment' => array('name' => "VariousPayments", 'title' => "ListVariousPaymentsAssociatedProject", 'class' => 'PaymentVarious', 'table' => 'payment_various', 'datefieldname' => 'datev', 'margin' => 'minus', 'disableamount' => 0, 'urlnew' => \DOL_URL_ROOT . '/compta/bank/various_payment/card.php?action=create&projectid=' . $id . '&backtopage=' . \urlencode($_SERVER['PHP_SELF'] . '?id=' . $id), 'lang' => 'banks', 'buttonnew' => 'AddVariousPayment', 'testnew' => $user->hasRight('banque', 'modifier'), 'test' => \isModEnabled("bank") && $user->hasRight('banque', 'lire') && !\getDolGlobalString('BANK_USE_OLD_VARIOUS_PAYMENT')));
$parameters = array('listofreferent' => $listofreferent);
$resHook = $hookmanager->executeHooks('completeListOfReferent', $parameters, $object, $action);
$tablename = \GETPOST("tablename", "aZ09");
$elementselectid = \GETPOSTINT("elementselect");
$result = $object->update_element($tablename, $elementselectid);
$elementuser = new \User($db);
$showdatefilter = 0;
$tooltiponprofit = $langs->trans("ProfitIsCalculatedWith") . "<br>\n";
$tooltiponprofitplus = $tooltiponprofitminus = '';
$total_revenue_ht = 0;
$balance_ht = 0;
$balance_ttc = 0;
$conforboothattendee = new \ConferenceOrBoothAttendee($db);
$result = $conforboothattendee->fetchAll('', '', 0, 0, '(t.fk_project:=:' . (int) $object->id . ') AND (t.status:=:' . \ConferenceOrBoothAttendee::STATUS_VALIDATED . ')');
$total_time = 0;
/**
 * Return if we should do a group by customer with sub-total
 *
 * @param 	string	$tablename		Name of table
 * @return	boolean					True to tell to make a group by sub-total
 */
function canApplySubtotalOn($tablename)
{
}
/**
 * sortElementsByClientName
 *
 * @param 	array<int,string>		$elementarray	Element array
 * @return	array<int,string>						Element array sorted
 */
function sortElementsByClientName($elementarray)
{
}