<?php

$action = \GETPOST('action', 'aZ09');
$optioncss = \GETPOST('optioncss', 'alpha');
$type = \GETPOST('type', 'alpha');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : $context_default;
$show_subgroup = \GETPOST('show_subgroup', 'alpha');
$search_date_start = \GETPOSTDATE('date_start', 'getpost', 'auto', 'search_date_start_accountancy');
$search_date_end = \GETPOSTDATE('date_end', 'getpostend', 'auto', 'search_date_end_accountancy');
$search_ledger_code = \GETPOST('search_ledger_code', 'array');
$search_accountancy_code_start = \GETPOST('search_accountancy_code_start', 'alpha');
$search_accountancy_code_end = \GETPOST('search_accountancy_code_end', 'alpha');
$search_not_reconciled = \GETPOST('search_not_reconciled', 'alpha');
// Load variable for pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT('page');
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
// Initialize a technical object to manage hooks of page. Note that conf->hooks_modules contains an array of hook context
$object = new \BookKeeping($db);
// Note that conf->hooks_modules contains array
$formaccounting = new \FormAccounting($db);
$form = new \Form($db);
$sql = "SELECT date_start, date_end";
$res = $db->query($sql);
// Permissions
$permissiontoread = $user->hasRight('accounting', 'mouvements', 'lire');
$permissiontoadd = $user->hasRight('accounting', 'mouvements', 'creer');
$permissiontodelete = $user->hasRight('accounting', 'mouvements', 'supprimer');
$permissiontoexport = $user->hasRight('accounting', 'mouvements', 'export');
/*
 * Action
 */
$param = '';
$urlparam = '';
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$filter = array();
// param with type of list
$url_param = \substr($param, 1);
$exportType = \GETPOST('export_type');
$help_url = 'EN:Module_Double_Entry_Accounting|FR:Module_Comptabilit&eacute;_en_Partie_Double';
// List
$nbtotalofrecords = '';
$url_param = '';
$parameters = array();
$reshook = $hookmanager->executeHooks('addMoreActionsButtons', $parameters, $object, $action);
$newcardbutton = empty($hookmanager->resPrint) ? '' : $hookmanager->resPrint;
$selectedfields = '';
$moreforfilter = '';
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldPreListTitle', $parameters, $object, $action);
$colspan = \getDolGlobalString('ACCOUNTANCY_SHOW_OPENING_BALANCE') ? 5 : 4;
// Fields from hook
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListOption', $parameters, $object);
// Hook fields
$parameters = array('param' => $param, 'sortfield' => $sortfield, 'sortorder' => $sortorder);
$reshook = $hookmanager->executeHooks('printFieldListTitle', $parameters, $object);
$total_debit = 0;
$total_credit = 0;
$sous_total_debit = 0;
$sous_total_credit = 0;
$total_opening_balance = 0;
$sous_total_opening_balance = 0;
$displayed_account = "";
$accountingaccountstatic = new \AccountingAccount($db);
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListFooter', $parameters, $object, $action);