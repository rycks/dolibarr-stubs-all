<?php

$action = \GETPOST('action', 'aZ09');
$massaction = \GETPOST('massaction', 'alpha');
$confirm = \GETPOST('confirm', 'alpha');
$toselect = \GETPOST('toselect', 'array:int');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'bookkeepinglist';
$socid = \GETPOSTINT('socid');
$search_mvt_num = \GETPOST('search_mvt_num', 'alpha');
$search_doc_type = \GETPOST("search_doc_type", 'alpha');
$search_doc_ref = \GETPOST("search_doc_ref", 'alpha');
$search_date_startyear = \GETPOSTINT('search_date_startyear');
$search_date_startmonth = \GETPOSTINT('search_date_startmonth');
$search_date_startday = \GETPOSTINT('search_date_startday');
$search_date_endyear = \GETPOSTINT('search_date_endyear');
$search_date_endmonth = \GETPOSTINT('search_date_endmonth');
$search_date_endday = \GETPOSTINT('search_date_endday');
$search_date_start = \dol_mktime(0, 0, 0, $search_date_startmonth, $search_date_startday, $search_date_startyear);
$search_date_end = \dol_mktime(23, 59, 59, $search_date_endmonth, $search_date_endday, $search_date_endyear);
$search_doc_date = \dol_mktime(0, 0, 0, \GETPOSTINT('doc_datemonth'), \GETPOSTINT('doc_dateday'), \GETPOSTINT('doc_dateyear'));
$search_date_creation_startyear = \GETPOSTINT('search_date_creation_startyear');
$search_date_creation_startmonth = \GETPOSTINT('search_date_creation_startmonth');
$search_date_creation_startday = \GETPOSTINT('search_date_creation_startday');
$search_date_creation_endyear = \GETPOSTINT('search_date_creation_endyear');
$search_date_creation_endmonth = \GETPOSTINT('search_date_creation_endmonth');
$search_date_creation_endday = \GETPOSTINT('search_date_creation_endday');
$search_date_creation_start = \dol_mktime(0, 0, 0, $search_date_creation_startmonth, $search_date_creation_startday, $search_date_creation_startyear);
$search_date_creation_end = \dol_mktime(23, 59, 59, $search_date_creation_endmonth, $search_date_creation_endday, $search_date_creation_endyear);
$search_date_modification_startyear = \GETPOSTINT('search_date_modification_startyear');
$search_date_modification_startmonth = \GETPOSTINT('search_date_modification_startmonth');
$search_date_modification_startday = \GETPOSTINT('search_date_modification_startday');
$search_date_modification_endyear = \GETPOSTINT('search_date_modification_endyear');
$search_date_modification_endmonth = \GETPOSTINT('search_date_modification_endmonth');
$search_date_modification_endday = \GETPOSTINT('search_date_modification_endday');
$search_date_modification_start = \dol_mktime(0, 0, 0, $search_date_modification_startmonth, $search_date_modification_startday, $search_date_modification_startyear);
$search_date_modification_end = \dol_mktime(23, 59, 59, $search_date_modification_endmonth, $search_date_modification_endday, $search_date_modification_endyear);
$search_date_export_startyear = \GETPOSTINT('search_date_export_startyear');
$search_date_export_startmonth = \GETPOSTINT('search_date_export_startmonth');
$search_date_export_startday = \GETPOSTINT('search_date_export_startday');
$search_date_export_endyear = \GETPOSTINT('search_date_export_endyear');
$search_date_export_endmonth = \GETPOSTINT('search_date_export_endmonth');
$search_date_export_endday = \GETPOSTINT('search_date_export_endday');
$search_date_export_start = \dol_mktime(0, 0, 0, $search_date_export_startmonth, $search_date_export_startday, $search_date_export_startyear);
$search_date_export_end = \dol_mktime(23, 59, 59, $search_date_export_endmonth, $search_date_export_endday, $search_date_export_endyear);
$search_date_validation_startyear = \GETPOSTINT('search_date_validation_startyear');
$search_date_validation_startmonth = \GETPOSTINT('search_date_validation_startmonth');
$search_date_validation_startday = \GETPOSTINT('search_date_validation_startday');
$search_date_validation_endyear = \GETPOSTINT('search_date_validation_endyear');
$search_date_validation_endmonth = \GETPOSTINT('search_date_validation_endmonth');
$search_date_validation_endday = \GETPOSTINT('search_date_validation_endday');
$search_date_validation_start = \dol_mktime(0, 0, 0, $search_date_validation_startmonth, $search_date_validation_startday, $search_date_validation_startyear);
$search_date_validation_end = \dol_mktime(23, 59, 59, $search_date_validation_endmonth, $search_date_validation_endday, $search_date_validation_endyear);
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
$formaccounting = new \FormAccounting($db);
$form = new \Form($db);
$arrayfields = array('t.piece_num' => array('label' => $langs->trans("TransactionNumShort"), 'checked' => '1'), 't.code_journal' => array('label' => $langs->trans("Codejournal"), 'checked' => '1'), 't.doc_date' => array('label' => $langs->trans("Docdate"), 'checked' => '1'), 't.doc_ref' => array('label' => $langs->trans("Piece"), 'checked' => '1'), 't.numero_compte' => array('label' => $langs->trans("AccountAccountingShort"), 'checked' => '1'), 't.subledger_account' => array('label' => $langs->trans("SubledgerAccount"), 'checked' => '1'), 't.label_operation' => array('label' => $langs->trans("Label"), 'checked' => '1'), 't.debit' => array('label' => $langs->trans("AccountingDebit"), 'checked' => '1'), 't.credit' => array('label' => $langs->trans("AccountingCredit"), 'checked' => '1'), 't.lettering_code' => array('label' => $langs->trans("LetteringCode"), 'checked' => '1'), 't.date_creation' => array('label' => $langs->trans("DateCreation"), 'checked' => '0'), 't.tms' => array('label' => $langs->trans("DateModification"), 'checked' => '0'), 't.date_export' => array('label' => $langs->trans("DateExport"), 'checked' => '1'), 't.date_validated' => array('label' => $langs->trans("DateValidationAndLock"), 'checked' => '-1', 'enabled' => (string) (int) (!\getDolGlobalString("ACCOUNTANCY_DISABLE_CLOSURE_LINE_BY_LINE"))), 't.import_key' => array('label' => $langs->trans("ImportId"), 'checked' => '0', 'position' => 1100));
$accountancyexport = new \AccountancyExport($db);
$listofformat = $accountancyexport->getType();
$formatexportset = \getDolGlobalString('ACCOUNTING_EXPORT_MODELCSV');
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
// Export files then exit
$accountancyexport = new \AccountancyExport($db);
$error = 0;
$nbtotalofrecords = 0;
/* The fast and low memory method to get and count full list converts the sql into a sql count */
$sqlforcount = \preg_replace('/^' . \preg_quote($sqlfields, '/') . '/', 'SELECT COUNT(*) as nbtotalofrecords', $sql);
$sqlforcount = \preg_replace('/GROUP BY .*$/', '', $sqlforcount);
$resql = $db->query($sqlforcount);
//$sqlforexport = $sql;
//$sqlforexport .= $db->order($sortfield, $sortorder);
// TODO Call the fetchAll for a $limit and $offset
// Replace the fetchAll to get all ->line followed by call to ->export(). fetchAll() currently consumes too much memory on large export.
// Replace this with the query($sqlforexport) on a limited block and loop on each line to export them.
$limit = 0;
$offset = 0;
$result = $object->fetchAll($sortorder, $sortfield, $limit, $offset, $filter, 'AND', \getDolGlobalString('ACCOUNTING_REEXPORT') ? 1 : 0);
/*
 * View
 */
$formother = new \FormOther($db);
$formfile = new \FormFile($db);
$title_page = $langs->trans("Operations") . ' - ' . $langs->trans("ExportAccountancy");
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
$help_url = 'EN:Module_Double_Entry_Accounting#Exports|FR:Module_Comptabilit&eacute;_en_Partie_Double#Exports';
$formconfirm = '';
$form_question = array();
// If 1 or not set, we check by default.
$checked = !isset($conf->global->ACCOUNTING_DEFAULT_NOT_NOTIFIED_EXPORT_DATE) || \getDolGlobalString('ACCOUNTING_DEFAULT_NOT_NOTIFIED_EXPORT_DATE');
// add documents in an archive for some accountancy export format
$exportTypesWithDocs = array(\AccountancyExport::$EXPORT_TYPE_QUADRATUS, \AccountancyExport::$EXPORT_TYPE_FEC, \AccountancyExport::$EXPORT_TYPE_FEC2);
$except = array();
$formconfirm = $form->formconfirm($_SERVER["PHP_SELF"] . '?' . $param, $langs->trans("ExportFilteredList") . '...', $langs->trans('ConfirmExportFile'), 'export_fileconfirm', $form_question, '', 1, 500, 700);
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
$line = new \BookKeepingLine($db);
// Loop on record
// --------------------------------------------------------------------
$i = 0;
$totalarray = array();
$parameters = array('arrayfields' => $arrayfields, 'sql' => $sql);
$reshook = $hookmanager->executeHooks('printFieldListFooter', $parameters, $object, $action);