<?php

$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel', 'alpha');
$confirm = \GETPOST('confirm', 'alpha');
$backtopage = \GETPOST('backtopage', 'alpha');
$id = \GETPOSTINT('id');
$date_start = \dol_mktime(0, 0, 0, \GETPOSTINT('date_debutmonth'), \GETPOSTINT('date_debutday'), \GETPOSTINT('date_debutyear'));
$date_end = \dol_mktime(0, 0, 0, \GETPOSTINT('date_finmonth'), \GETPOSTINT('date_finday'), \GETPOSTINT('date_finyear'));
$date = \dol_mktime(0, 0, 0, \GETPOSTINT('datemonth'), \GETPOSTINT('dateday'), \GETPOSTINT('dateyear'));
$fk_project = \GETPOSTINT('fk_project');
$vatrate = \GETPOST('vatrate', 'alpha');
$ref = \GETPOST("ref", 'alpha');
$comments = \GETPOST('comments', 'restricthtml');
$fk_c_type_fees = \GETPOSTINT('fk_c_type_fees');
$socid = \GETPOSTINT('socid') ? \GETPOSTINT('socid') : \GETPOSTINT('socid_id');
/** @var User $user */
$childids = $user->getAllChildIds(1);
// Hack to use expensereport dir
$rootfordata = \DOL_DATA_ROOT;
$rootforuser = \DOL_DATA_ROOT;
// Define $urlwithroot
$urlwithouturlroot = \preg_replace('/' . \preg_quote(\DOL_URL_ROOT, '/') . '$/i', '', \trim($dolibarr_main_url_root));
$urlwithroot = $urlwithouturlroot . \DOL_URL_ROOT;
// This is to use external domain name found into config file
//$urlwithroot=DOL_MAIN_URL_ROOT;					// This is to use same domain name than current
// PDF
$hidedetails = \GETPOSTINT('hidedetails') ? \GETPOSTINT('hidedetails') : (\getDolGlobalString('MAIN_GENERATE_DOCUMENTS_HIDE_DETAILS') ? 1 : 0);
$hidedesc = \GETPOSTINT('hidedesc') ? \GETPOSTINT('hidedesc') : (\getDolGlobalString('MAIN_GENERATE_DOCUMENTS_HIDE_DESC') ? 1 : 0);
$hideref = \GETPOSTINT('hideref') ? \GETPOSTINT('hideref') : (\getDolGlobalString('MAIN_GENERATE_DOCUMENTS_HIDE_REF') ? 1 : 0);
$object = new \ExpenseReport($db);
$extrafields = new \ExtraFields($db);
$permissionnote = $user->hasRight('expensereport', 'creer');
// Used by the include of actions_setnotes.inc.php
$permissiondellink = $user->hasRight('expensereport', 'creer');
// Used by the include of actions_dellink.inc.php
$permissiontoadd = $user->hasRight('expensereport', 'creer');
// Used by the include of actions_addupdatedelete.inc.php and actions_lineupdown.inc.php
$permissiontoeditextra = $permissiontoadd;
$upload_dir = $conf->expensereport->dir_output . '/' . \dol_sanitizeFileName($object->ref);
$projectRequired = \isModEnabled('project') && \getDolGlobalString('EXPENSEREPORT_PROJECT_IS_REQUIRED');
$fileRequired = \getDolGlobalString('EXPENSEREPORT_FILE_IS_REQUIRED');
// Check current user can read this expense report
$canread = 0;
$candelete = 0;
$result = \restrictedArea($user, 'expensereport', $object->id, 'expensereport');
$permissiontoadd = $user->hasRight('expensereport', 'creer');
// Used by the include of actions_dellink.inc.php
/*
 * Actions
 */
$error = 0;
$value_unit_ht = \price2num(\GETPOST('value_unit_ht', 'alpha'), 'MU');
$value_unit = \price2num(\GETPOST('value_unit', 'alpha'), 'MU');
$qty = \price2num(\GETPOST('qty', 'alpha'));
$parameters = array('socid' => $socid);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$backurlforlist = \DOL_URL_ROOT . '/expensereport/list.php';
// Actions to send emails
$triggersendname = 'EXPENSEREPORT_SENTBYMAIL';
$autocopy = 'MAIN_MAIL_AUTOCOPY_EXPENSEREPORT_TO';
$trackid = 'exp' . $object->id;
// Actions to build doc
$upload_dir = $conf->expensereport->dir_output;
/*
 * View
 */
$title = $langs->trans("ExpenseReport") . " - " . $langs->trans("Card");
$help_url = "EN:Module_Expense_Reports|FR:Module_Notes_de_frais";
$form = new \Form($db);
$formfile = new \FormFile($db);
$formproject = new \FormProjets($db);
$projecttmp = new \Project($db);
$paymentexpensereportstatic = new \PaymentExpenseReport($db);
$bankaccountstatic = new \Account($db);
$ecmfilesstatic = new \EcmFiles($db);
$formexpensereport = new \FormExpenseReport($db);
$remaintopay = 0;
$defaultselectuser = $user->id;
$include_users = 'hierarchyme';
$object = new \ExpenseReport($db);
$include_users = $object->fetch_users_approver_expensereport();
// Public note
$note_public = \GETPOSTISSET('note_public') ? \GETPOST('note_public', 'restricthtml') : '';
$doleditor = new \DolEditor('note_public', $note_public, '', 80, 'dolibarr_notes', 'In', \false, \false, !\getDolGlobalString('FCKEDITOR_ENABLE_NOTE_PUBLIC') ? 0 : 1, \ROWS_3, '90%');
// Private note
$note_private = \GETPOSTISSET('note_private') ? \GETPOST('note_private', 'restricthtml') : '';
// Other attributes
$parameters = array('colspan' => ' colspan="3"', 'cols' => 3);
$reshook = $hookmanager->executeHooks('formObjectOptions', $parameters, $object, $action);
$object = new \ExpenseReport($db);
$parameters = array();
$reshook = $hookmanager->executeHooks('addMoreActionsButtons', $parameters, $object, $action);
$formactions = new \FormActions($db);
$somethingshown = $formactions->showactions($object, 'expensereport', 0);
// Presend form
$modelmail = 'expensereport_send';
$defaulttopic = 'SendExpenseReportRef';
$diroutput = $conf->expensereport->dir_output;
$trackid = 'exp' . $object->id;