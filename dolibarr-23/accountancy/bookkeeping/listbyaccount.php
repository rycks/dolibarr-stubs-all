<?php

$journal_code = \GETPOST('code_journal', 'alpha');
$account = \GETPOST("account", 'int');
$massdate = \dol_mktime(0, 0, 0, \GETPOSTINT('massdatemonth'), \GETPOSTINT('massdateday'), \GETPOSTINT('massdateyear'));
$action = \GETPOST('action', 'aZ09');
$socid = \GETPOSTINT('socid');
$mode = \GETPOST('mode', 'alpha') ? \GETPOST('mode', 'alpha') : 'customer';
// Only for tab view
$massaction = \GETPOST('massaction', 'alpha');
$confirm = \GETPOST('confirm', 'alpha');
$toselect = \GETPOST('toselect', 'array:int');
$type = \GETPOST('type', 'alpha');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : $context_default;
$search_doc_date = \GETPOSTDATE('doc_date', 'getpost');
// deprecated. Can use 'search_date_start/end'
$search_date_startyear = \GETPOSTINT('search_date_startyear');
$search_date_startmonth = \GETPOSTINT('search_date_startmonth');
$search_date_startday = \GETPOSTINT('search_date_startday');
$search_date_start = \GETPOSTDATE('search_date_start', 'getpost', 'auto', 'search_date_start_accountancy');
$search_date_endyear = \GETPOSTINT('search_date_endyear');
$search_date_endmonth = \GETPOSTINT('search_date_endmonth');
$search_date_endday = \GETPOSTINT('search_date_endday');
$search_date_end = \GETPOSTDATE('search_date_end', 'getpostend', 'auto', 'search_date_end_accountancy');
$search_date_export_startyear = \GETPOSTINT('search_date_export_startyear');
$search_date_export_startmonth = \GETPOSTINT('search_date_export_startmonth');
$search_date_export_startday = \GETPOSTINT('search_date_export_startday');
$search_date_export_start = \GETPOSTDATE('search_date_export_start', 'getpost');
$search_date_export_endyear = \GETPOSTINT('search_date_export_endyear');
$search_date_export_endmonth = \GETPOSTINT('search_date_export_endmonth');
$search_date_export_endday = \GETPOSTINT('search_date_export_endday');
$search_date_export_end = \GETPOSTDATE('search_date_export_start', 'getpostend');
$search_date_validation_startyear = \GETPOSTINT('search_date_validation_startyear');
$search_date_validation_startmonth = \GETPOSTINT('search_date_validation_startmonth');
$search_date_validation_startday = \GETPOSTINT('search_date_validation_startday');
$search_date_validation_start = \GETPOSTDATE('search_date_validation_start', 'getpost');
$search_date_validation_endyear = \GETPOSTINT('search_date_validation_endyear');
$search_date_validation_endmonth = \GETPOSTINT('search_date_validation_endmonth');
$search_date_validation_endday = \GETPOSTINT('search_date_validation_endday');
$search_date_validation_end = \GETPOSTDATE('search_date_validation_end', 'getpostend');
// Due date start
$search_date_due_start_day = \GETPOSTINT('search_date_due_start_day');
$search_date_due_start_month = \GETPOSTINT('search_date_due_start_month');
$search_date_due_start_year = \GETPOSTINT('search_date_due_start_year');
$search_date_due_start = \GETPOSTDATE('search_date_due_start_', 'getpost');
// Due date end
$search_date_due_end_day = \GETPOSTINT('search_date_due_end_day');
$search_date_due_end_month = \GETPOSTINT('search_date_due_end_month');
$search_date_due_end_year = \GETPOSTINT('search_date_due_end_year');
$search_date_due_end = \GETPOSTDATE('search_date_due_end_', 'getpostend');
$search_import_key = \GETPOST("search_import_key", 'alpha');
$search_account_category = \GETPOSTINT('search_account_category');
$search_accountancy_code_start = \GETPOST('search_accountancy_code_start', 'alpha');
$search_accountancy_code_end = \GETPOST('search_accountancy_code_end', 'alpha');
$search_doc_ref = \GETPOST('search_doc_ref', 'alpha');
$search_label_operation = \GETPOST('search_label_operation', 'alpha');
$search_mvt_num = \GETPOST('search_mvt_num', 'alpha');
$search_direction = \GETPOST('search_direction', 'alpha');
$search_ledger_code = \GETPOST('search_ledger_code', 'array');
$search_debit = \GETPOST('search_debit', 'alpha');
$search_credit = \GETPOST('search_credit', 'alpha');
$search_lettering_code = \GETPOST('search_lettering_code', 'alpha');
$search_not_reconciled = \GETPOST('search_not_reconciled', 'alpha');
// Load variable for pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : \getDolGlobalString('ACCOUNTING_LIMIT_LIST_VENTILATION', $conf->liste_limit);
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$optioncss = \GETPOST('optioncss', 'alpha');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
// Initialize a technical object to manage hooks of page. Note that conf->hooks_modules contains an array of hook context
$object = new \BookKeeping($db);
$formfile = new \FormFile($db);
$formaccounting = new \FormAccounting($db);
$form = new \Form($db);
$sql = "SELECT date_start, date_end";
$res = $db->query($sql);
$arrayfields = array(
    // 't.subledger_account'=>array('label'=>$langs->trans("SubledgerAccount"), 'checked'=>1),
    't.piece_num' => array('label' => "TransactionNumShort", 'checked' => '1'),
    't.code_journal' => array('label' => "Codejournal", 'checked' => '1'),
    't.doc_date' => array('label' => "Docdate", 'checked' => '1'),
    't.doc_ref' => array('label' => "Piece", 'checked' => '1'),
    't.label_operation' => array('label' => "Label", 'checked' => '1'),
    't.lettering_code' => array('label' => "Lettering", 'checked' => '1'),
    't.debit' => array('label' => "AccountingDebit", 'checked' => '1'),
    't.credit' => array('label' => "AccountingCredit", 'checked' => '1'),
    't.balance' => array('label' => "Balance", 'checked' => '1'),
    't.date_export' => array('label' => "DateExport", 'checked' => '-1'),
    't.date_validated' => array('label' => "DateValidation", 'checked' => '-1', 'enabled' => (string) (int) (!\getDolGlobalString("ACCOUNTANCY_DISABLE_CLOSURE_LINE_BY_LINE"))),
    't.date_lim_reglement' => array('label' => "DateDue", 'checked' => '0'),
    't.import_key' => array('label' => "ImportId", 'checked' => '-1', 'position' => 1100),
);
$error = 0;
$result = -1;
// For static analysis
$documentlink = '';
// For static analysis
// Permissions
$permissiontoread = $user->hasRight('accounting', 'mouvements', 'lire');
$permissiontoadd = $user->hasRight('accounting', 'mouvements', 'creer');
$permissiontodelete = $user->hasRight('accounting', 'mouvements', 'supprimer');
$permissiontoexport = $user->hasRight('accounting', 'mouvements', 'export');
/*
 * Action
 */
$filter = array();
$param = '';
$url_param = '';
$parameters = array('socid' => $socid);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
// param with type of list
$url_param = \substr($param, 1);
// Mass actions
$objectclass = 'Bookkeeping';
$objectlabel = 'Bookkeeping';
$uploaddir = $conf->societe->dir_output;
/*
 * View
 */
$formaccounting = new \FormAccounting($db);
$formfile = new \FormFile($db);
$formother = new \FormOther($db);
$form = new \Form($db);
$title_page = $langs->trans("Operations") . ' - ' . $langs->trans("VueByAccountAccounting") . ' (';
$help_url = 'EN:Module_Double_Entry_Accounting|FR:Module_Comptabilit&eacute;_en_Partie_Double';
$companystatic = new \Societe($db);
$res = $companystatic->fetch($socid);
// List
$nbtotalofrecords = '';
$num = 0;
//$num = count($object->lines);
$num = $result;
$arrayofselected = \is_array($toselect) ? $toselect : array();
// Print form confirm
$formconfirm = '';
// List of mass actions available
$arrayofmassactions = array();
$massactionbutton = $form->selectMassAction($massaction, $arrayofmassactions);
$parameters = array('param' => $param);
$reshook = $hookmanager->executeHooks('addMoreActionsButtonsList', $parameters, $object, $action);
$newcardbutton = empty($hookmanager->resPrint) ? '' : $hookmanager->resPrint;
$varpage = empty($contextpage) ? $_SERVER["PHP_SELF"] : $contextpage;
$selectedfields = $form->multiSelectArrayWithCheckbox('selectedfields', $arrayfields, $varpage, \getDolGlobalString('MAIN_CHECKBOX_LEFT_COLUMN'));
$moreforfilter = '';
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldPreListTitle', $parameters, $object, $action);
// Fields from hook
$parameters = array('arrayfields' => $arrayfields);
$reshook = $hookmanager->executeHooks('printFieldListOption', $parameters);
// Hook fields
$parameters = array('arrayfields' => $arrayfields, 'param' => $param, 'sortfield' => $sortfield, 'sortorder' => $sortorder);
$reshook = $hookmanager->executeHooks('printFieldListTitle', $parameters);
$displayed_account_number = \null;
// Start with undefined to be able to distinguish with empty
$objectstatic = \null;
// Init for static analysis
$objectlink = '';
// Init for static analysis
$result = -1;
// Init for static analysis
// Loop on record
// --------------------------------------------------------------------
$i = 0;
$totalarray = array();
$sous_total_debit = 0;
$sous_total_credit = 0;
// Init for static analysis
$colspan = 0;
// colspan before field 'label of operation'
$colspanend = 0;
// colspan after debit/credit
$accountg = '-';
$colspan = 0;
// colspan before field 'label of operation'
$colspanend = 3;
// Show balance of last shown account
$balance = $sous_total_debit - $sous_total_credit;
// Show total line
$trforbreaknobg = 1;
$parameters = array('arrayfields' => $arrayfields);
$reshook = $hookmanager->executeHooks('printFieldListFooter', $parameters, $object, $action);