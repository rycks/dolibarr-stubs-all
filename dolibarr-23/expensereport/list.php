<?php

$action = \GETPOST('action', 'aZ09');
$massaction = \GETPOST('massaction', 'alpha');
$show_files = \GETPOSTINT('show_files');
$confirm = \GETPOST('confirm', 'alpha');
$cancel = \GETPOST('cancel', 'alpha');
// We click on a Cancel button
$toselect = \GETPOST('toselect', 'array:int');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'expensereportlist';
$mode = \GETPOST('mode', 'alpha');
$childids = $user->getAllChildIds(1);
$id = \GETPOSTINT('id');
$canread = 0;
$diroutputmassaction = $conf->expensereport->dir_output . '/temp/massgeneration/' . $user->id;
// Load variable for pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$search_all = \trim(\GETPOST('search_all', 'alphanohtml'));
$search_ref = \GETPOST('search_ref', 'alpha');
$search_user = \GETPOST('search_user', 'intcomma');
$search_amount_ht = \GETPOST('search_amount_ht', 'alpha');
$search_amount_vat = \GETPOST('search_amount_vat', 'alpha');
$search_amount_ttc = \GETPOST('search_amount_ttc', 'alpha');
$search_status = \GETPOST('search_status', 'intcomma') != '' ? \GETPOST('search_status', 'intcomma') : \GETPOST('statut', 'intcomma');
$search_date_startday = \GETPOSTINT('search_date_startday');
$search_date_startmonth = \GETPOSTINT('search_date_startmonth');
$search_date_startyear = \GETPOSTINT('search_date_startyear');
$search_date_startendday = \GETPOSTINT('search_date_startendday');
$search_date_startendmonth = \GETPOSTINT('search_date_startendmonth');
$search_date_startendyear = \GETPOSTINT('search_date_startendyear');
$search_date_start = \dol_mktime(0, 0, 0, $search_date_startmonth, $search_date_startday, $search_date_startyear);
// Use tzserver
$search_date_startend = \dol_mktime(23, 59, 59, $search_date_startendmonth, $search_date_startendday, $search_date_startendyear);
$search_date_endday = \GETPOSTINT('search_date_endday');
$search_date_endmonth = \GETPOSTINT('search_date_endmonth');
$search_date_endyear = \GETPOSTINT('search_date_endyear');
$search_date_endendday = \GETPOSTINT('search_date_endendday');
$search_date_endendmonth = \GETPOSTINT('search_date_endendmonth');
$search_date_endendyear = \GETPOSTINT('search_date_endendyear');
$search_date_end = \dol_mktime(0, 0, 0, $search_date_endmonth, $search_date_endday, $search_date_endyear);
// Use tzserver
$search_date_endend = \dol_mktime(23, 59, 59, $search_date_endendmonth, $search_date_endendday, $search_date_endendyear);
$optioncss = \GETPOST('optioncss', 'alpha');
// Security check
$socid = \GETPOSTINT('socid');
$result = \restrictedArea($user, 'expensereport', '', '');
// Initialize a technical object to manage hooks of page. Note that conf->hooks_modules contains an array of hook context
$object = new \ExpenseReport($db);
$extrafields = new \ExtraFields($db);
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
// List of fields to search into when doing a "search in all"
$fieldstosearchall = array('d.ref' => 'Ref', 'd.note_public' => "NotePublic", 'u.lastname' => 'EmployeeLastname', 'u.firstname' => "EmployeeFirstname", 'u.login' => "Login");
$arrayfields = array('d.ref' => array('label' => $langs->trans("Ref"), 'checked' => '1'), 'user' => array('label' => $langs->trans("User"), 'checked' => '1'), 'd.date_debut' => array('label' => $langs->trans("DateStart"), 'checked' => '1'), 'd.date_fin' => array('label' => $langs->trans("DateEnd"), 'checked' => '1'), 'd.date_valid' => array('label' => $langs->trans("DateValidation"), 'checked' => '1'), 'd.date_approve' => array('label' => $langs->trans("DateApprove"), 'checked' => '1'), 'd.total_ht' => array('label' => $langs->trans("AmountHT"), 'checked' => '1'), 'd.total_vat' => array('label' => $langs->trans("AmountVAT"), 'checked' => '-1'), 'd.total_ttc' => array('label' => $langs->trans("AmountTTC"), 'checked' => '1'), 'd.date_create' => array('label' => $langs->trans("DateCreation"), 'checked' => '0', 'position' => 500), 'd.tms' => array('label' => $langs->trans("DateModificationShort"), 'checked' => '0', 'position' => 500), 'd.fk_statut' => array('label' => $langs->trans("Status"), 'checked' => '1', 'position' => 1000));
$canedituser = !empty($user->admin) || $user->hasRight('user', 'user', 'creer');
$permissiontoread = $user->hasRight('expensereport', 'lire');
$permissiontodelete = $user->hasRight('expensereport', 'supprimer');
$objectuser = new \User($db);
$parameters = array('socid' => $socid);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
// Mass actions
$objectclass = 'ExpenseReport';
$objectlabel = 'ExpenseReport';
$uploaddir = $conf->expensereport->dir_output;
/*
 * View
 */
$form = new \Form($db);
$formother = new \FormOther($db);
$formfile = new \FormFile($db);
$formexpensereport = new \FormExpenseReport($db);
$fuser = new \User($db);
$title = $langs->trans("TripsAndExpenses");
$help_url = '';
$morejs = array();
$morecss = array();
$max_year = 5;
$min_year = 10;
// Get current user id
$user_id = $user->id;
// Build and execute select
// --------------------------------------------------------------------
$sql = "SELECT d.rowid, d.ref, d.fk_user_author, d.total_ht, d.total_tva, d.total_ttc, d.fk_statut as status,";
// Add fields from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListSelect', $parameters, $object, $action);
$sql = \preg_replace('/,\\s*$/', '', $sql);
$sqlfields = $sql;
// Add where from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListWhere', $parameters, $object, $action);
// Count total nb of records
$nbtotalofrecords = '';
/* The fast and low memory method to get and count full list converts the sql into a sql count */
$sqlforcount = \preg_replace('/^' . \preg_quote($sqlfields, '/') . '/', 'SELECT COUNT(*) as nbtotalofrecords', $sql);
$sqlforcount = \preg_replace('/GROUP BY .*$/', '', $sqlforcount);
$resql = $db->query($sqlforcount);
//print $sql;
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$arrayofselected = \is_array($toselect) ? $toselect : array();
$param = '';
// List of mass actions available
$arrayofmassactions = array('generate_doc' => \img_picto('', 'pdf', 'class="pictofixedwidth"') . $langs->trans("ReGeneratePDF"), 'builddoc' => \img_picto('', 'pdf', 'class="pictofixedwidth"') . $langs->trans("PDFMerge"), 'presend' => \img_picto('', 'email', 'class="pictofixedwidth"') . $langs->trans("SendByMail"));
$massactionbutton = $form->selectMassAction('', $arrayofmassactions);
// For user tab
$title = $langs->trans("User");
$linkback = '<a href="' . \DOL_URL_ROOT . '/user/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
$head = \user_prepare_head($fuser);
// Add code for pre mass action (confirmation or email presend form)
$topicmail = "SendExpenseReport";
$modelmail = "expensereport";
$objecttmp = new \ExpenseReport($db);
$trackid = 'exp' . $object->id;
$moreforfilter = '';
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldPreListTitle', $parameters, $object, $action);
$varpage = empty($contextpage) ? $_SERVER["PHP_SELF"] : $contextpage;
$htmlofselectarray = $form->multiSelectArrayWithCheckbox('selectedfields', $arrayfields, $varpage, \getDolGlobalString('MAIN_CHECKBOX_LEFT_COLUMN'));
// This also change content of $arrayfields with user setup
$selectedfields = $mode != 'kanban' ? $htmlofselectarray : '';
// Fields from hook
$parameters = array('arrayfields' => $arrayfields);
$reshook = $hookmanager->executeHooks('printFieldListOption', $parameters, $object, $action);
$totalarray = array();
// Hook fields
$parameters = array('arrayfields' => $arrayfields, 'param' => $param, 'sortfield' => $sortfield, 'sortorder' => $sortorder);
$reshook = $hookmanager->executeHooks('printFieldListTitle', $parameters, $object, $action);
// Loop on record
// --------------------------------------------------------------------
$total_total_ht = 0;
$total_total_ttc = 0;
$total_total_tva = 0;
$expensereportstatic = new \ExpenseReport($db);
$usertmp = new \User($db);
$parameters = array('arrayfields' => $arrayfields, 'sql' => $sql);
$reshook = $hookmanager->executeHooks('printFieldListFooter', $parameters, $object, $action);
$hidegeneratedfilelistifempty = 1;
// Show list of available documents
$urlsource = $_SERVER['PHP_SELF'] . '?sortfield=' . $sortfield . '&sortorder=' . $sortorder;
$filedir = $diroutputmassaction;
$genallowed = $user->hasRight('expensereport', 'lire');
$delallowed = $user->hasRight('expensereport', 'creer');