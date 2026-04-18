<?php

// Get Parameters
$socid = \GETPOSTINT('socid');
$journal_code = \GETPOST('code_journal', 'alpha');
$account = \GETPOST("account", 'int');
$massdate = \dol_mktime(0, 0, 0, \GETPOSTINT('massdatemonth'), \GETPOSTINT('massdateday'), \GETPOSTINT('massdateyear'));
// action+display Parameters
$action = \GETPOST('action', 'aZ09');
$massaction = \GETPOST('massaction', 'alpha');
$confirm = \GETPOST('confirm', 'alpha');
$toselect = \GETPOST('toselect', 'array:int');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : \str_replace('_', '', \basename(\dirname(__FILE__)) . \basename(__FILE__, '.php'));
// Search Parameters
$search_mvt_num = \GETPOST('search_mvt_num', 'alpha');
$search_doc_type = \GETPOST("search_doc_type", 'alpha');
$search_doc_ref = \GETPOST("search_doc_ref", 'alpha');
$search_doc_date = \GETPOSTDATE('doc_date', 'getpost');
// deprecated. Can use 'search_date_start/end'
$search_date_start = \GETPOSTDATE('search_date_start', 'getpost', 'auto', 'search_date_start_accountancy');
$search_date_end = \GETPOSTDATE('search_date_end', 'getpostend', 'auto', 'search_date_end_accountancy');
$search_date_creation_start = \GETPOSTDATE('search_date_creation_start', 'getpost');
$search_date_creation_end = \GETPOSTDATE('search_date_creation_end', 'getpostend');
$search_date_modification_start = \GETPOSTDATE('search_date_modification_start', 'getpost');
$search_date_modification_end = \GETPOSTDATE('search_date_modification_end', 'getpostend');
$search_date_export_start = \GETPOSTDATE('search_date_export_start', 'getpost');
$search_date_export_end = \GETPOSTDATE('search_date_export_end', 'getpostend');
$search_date_validation_start = \GETPOSTDATE('search_date_validation_start', 'getpost');
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
$search_accountancy_code = \GETPOST("search_accountancy_code", 'alpha');
$search_accountancy_code_start = \GETPOST('search_accountancy_code_start', 'alpha');
$search_accountancy_code_end = \GETPOST('search_accountancy_code_end', 'alpha');
$search_accountancy_aux_code = \GETPOST("search_accountancy_aux_code", 'alpha');
$search_accountancy_aux_code_start = \GETPOST('search_accountancy_aux_code_start', 'alpha');
$search_accountancy_aux_code_end = \GETPOST('search_accountancy_aux_code_end', 'alpha');
$search_mvt_label = \GETPOST('search_mvt_label', 'alpha');
$search_direction = \GETPOST('search_direction', 'alpha');
$search_debit = \GETPOST('search_debit', 'alpha');
$search_credit = \GETPOST('search_credit', 'alpha');
$search_ledger_code = \GETPOST('search_ledger_code', 'array');
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
$formfiscalyear = new \FormFiscalYear($db);
$formaccounting = new \FormAccounting($db);
$form = new \Form($db);
$arrayfields = array('t.piece_num' => array('label' => $langs->trans("TransactionNumShort"), 'checked' => '1'), 't.code_journal' => array('label' => $langs->trans("Codejournal"), 'checked' => '1'), 't.doc_date' => array('label' => $langs->trans("Docdate"), 'checked' => '1'), 't.doc_ref' => array('label' => $langs->trans("Piece"), 'checked' => '1'), 't.numero_compte' => array('label' => $langs->trans("AccountAccountingShort"), 'checked' => '1'), 't.subledger_account' => array('label' => $langs->trans("SubledgerAccount"), 'checked' => '1'), 't.label_operation' => array('label' => $langs->trans("Label"), 'checked' => '1'), 't.debit' => array('label' => $langs->trans("AccountingDebit"), 'checked' => '1'), 't.credit' => array('label' => $langs->trans("AccountingCredit"), 'checked' => '1'), 't.lettering_code' => array('label' => $langs->trans("LetteringCode"), 'checked' => '1'), 't.date_creation' => array('label' => $langs->trans("DateCreation"), 'checked' => '0'), 't.tms' => array('label' => $langs->trans("DateModification"), 'checked' => '0'), 't.date_export' => array('label' => $langs->trans("DateExport"), 'checked' => '0'), 't.date_validated' => array('label' => $langs->trans("DateValidationAndLock"), 'checked' => '0', 'enabled' => (string) (int) (!\getDolGlobalString("ACCOUNTANCY_DISABLE_CLOSURE_LINE_BY_LINE"))), 't.date_lim_reglement' => array('label' => $langs->trans("DateDue"), 'checked' => '0'), 't.import_key' => array('label' => $langs->trans("ImportId"), 'checked' => '0', 'position' => 1100));
$error = 0;
// Permissions
$permissiontoread = $user->hasRight('accounting', 'mouvements', 'lire');
$permissiontoadd = $user->hasRight('accounting', 'mouvements', 'creer');
$permissiontodelete = $user->hasRight('accounting', 'mouvements', 'supprimer');
$permissiontoexport = $user->hasRight('accounting', 'mouvements', 'export');
/*
 * Actions
 */
$param = '';
$filter = array();
$parameters = array('socid' => $socid);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
// Mass actions
$objectclass = 'Bookkeeping';
$objectlabel = 'Bookkeeping';
$uploaddir = $conf->societe->dir_output;
// Build and execute select (used by page and export action)
// must de set after the action that set $filter
// --------------------------------------------------------------------
$sql = 'SELECT';
$sqlfields = $sql;
// Manage filter
$sqlwhere = array();
//print $sql;
/*
 * View
 */
$formother = new \FormOther($db);
$formfile = new \FormFile($db);
$title_page = $langs->trans("Operations") . ' - ' . $langs->trans("Journals");
// Count total nb of records
$nbtotalofrecords = '';
/* The fast and low memory method to get and count full list converts the sql into a sql count */
$sqlforcount = \preg_replace('/^' . \preg_quote($sqlfields, '/') . '/', 'SELECT COUNT(*) as nbtotalofrecords', $sql);
$sqlforcount = \preg_replace('/GROUP BY .*$/', '', $sqlforcount);
$resql = $db->query($sqlforcount);
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$arrayofselected = \is_array($toselect) ? $toselect : array();
// Output page
// --------------------------------------------------------------------
$help_url = 'EN:Module_Double_Entry_Accounting|FR:Module_Comptabilit&eacute;_en_Partie_Double';
$formconfirm = '';
// List of mass actions available
$arrayofmassactions = array();
$massactionbutton = $form->selectMassAction($massaction, $arrayofmassactions);
$parameters = array('param' => $param);
$reshook = $hookmanager->executeHooks('addMoreActionsButtonsList', $parameters, $object, $action);
$newcardbutton = empty($hookmanager->resPrint) ? '' : $hookmanager->resPrint;
$url = './card.php?action=create' . (!empty($type) ? '&type=sub' : '') . '&backtopage=' . \urlencode($_SERVER['PHP_SELF']);
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
$line = new \BookKeepingLine($db);
// Loop on record
// --------------------------------------------------------------------
$i = 0;
$totalarray = array();
$parameters = array('arrayfields' => $arrayfields, 'sql' => $sql);
$reshook = $hookmanager->executeHooks('printFieldListFooter', $parameters, $object, $action);