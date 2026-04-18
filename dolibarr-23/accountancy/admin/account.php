<?php

$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel', 'alpha');
$id = \GETPOSTINT('id');
$rowid = \GETPOSTINT('rowid');
$massaction = \GETPOST('massaction', 'aZ09');
$optioncss = \GETPOST('optioncss', 'alpha');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'accountingaccountlist';
// To manage different context of search
$mode = \GETPOST('mode', 'aZ');
// The output mode ('list', 'kanban', 'hierarchy', 'calendar', ...)
$search_account = \GETPOST('search_account', 'alpha');
$search_label = \GETPOST('search_label', 'alpha');
$search_labelshort = \GETPOST('search_labelshort', 'alpha');
$search_accountparent = \GETPOST('search_accountparent', 'alpha');
$search_pcgtype = \GETPOST('search_pcgtype', 'alpha');
$search_import_key = \GETPOST('search_import_key', 'alpha');
$search_reconcilable = \GETPOST("search_reconcilable", 'int');
$search_centralized = \GETPOST("search_centralized", 'int');
$search_active = \GETPOST("search_active", 'int');
$toselect = \GETPOST('toselect', 'array:int');
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$confirm = \GETPOST('confirm', 'alpha');
$chartofaccounts = \GETPOSTINT('chartofaccounts');
$permissiontoadd = $user->hasRight('accounting', 'chartofaccount');
$permissiontodelete = $user->hasRight('accounting', 'chartofaccount');
// now $permissiontoadd or $user->hasRight('accounting', 'chartofaccount') are always equal to 1
// Load variable for pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT('page');
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$object = new \AccountingAccount($db);
$arrayfields = array('aa.account_number' => array('label' => "AccountNumber", 'checked' => '1', 'csslist' => 'maxwidth50'), 'aa.label' => array('label' => "Label", 'checked' => '1'), 'aa.labelshort' => array('label' => "ShortLabel", 'checked' => '1'), 'aa.account_parent' => array('label' => "Accountparent", 'checked' => '1'), 'aa.pcg_type' => array('label' => "Pcgtype", 'checked' => '1', 'help' => 'PcgtypeDesc'), 'categories' => array('label' => "AccountingCategories", 'checked' => '-1', 'help' => 'AccountingCategoriesDesc'), 'aa.reconcilable' => array('label' => "Reconcilable", 'checked' => '1'), 'aa.centralized' => array('label' => "Centralized", 'checked' => '1', 'help' => 'CentralizedAccountHelp'), 'aa.import_key' => array('label' => "ImportId", 'checked' => '-1', 'help' => ''), 'aa.active' => array('label' => "Activated", 'checked' => '1'));
$accounting = new \AccountingAccount($db);
$parameters = array('chartofaccounts' => $chartofaccounts, 'permissiontoadd' => $permissiontoadd, 'permissiontodelete' => $permissiontodelete);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $accounting, $action);
$objectclass = 'AccountingAccount';
$uploaddir = $conf->accounting->multidir_output[$conf->entity];
/*
 * View
 */
$form = new \Form($db);
$formaccounting = new \FormAccounting($db);
$help_url = 'EN:Module_Double_Entry_Accounting#Setup|FR:Module_Comptabilit&eacute;_en_Partie_Double#Configuration';
$pcgver = \getDolGlobalInt('CHARTOFACCOUNTS');
$sql = "SELECT aa.rowid, aa.fk_pcg_version, aa.pcg_type, aa.account_number, aa.account_parent, aa.label, aa.labelshort, aa.fk_accounting_category,";
// Add fields from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListSelect', $parameters, $object, $action);
$sql = \preg_replace('/,\\s*$/', '', $sql);
// Add table from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListFrom', $parameters, $object);
$lengthpaddingaccount = 0;
$search_account_tmp = $search_account;
$weremovedsomezero = 0;
// Add where from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListWhere', $parameters, $object, $action);
//print $sql;
// Count total nb of records
$nbtotalofrecords = '';
$resql = $db->query($sql);
$nbtotalofrecords = $db->num_rows($resql);
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$arrayofselected = \is_array($toselect) ? $toselect : array();
$param = '';
// Add $param from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListSearchParam', $parameters, $object, $action);
// List of mass actions available
$arrayofmassactions = array();
$massactionbutton = $form->selectMassAction('', $arrayofmassactions);
$newcardbutton = '';
$newcardbutton = \dolGetButtonTitle($langs->trans('Addanaccount'), '', 'fa fa-plus-circle', \DOL_URL_ROOT . '/accountancy/admin/card.php?action=create', '', $permissiontoadd);
$sql = "SELECT a.rowid, a.pcg_version, a.label, a.active, c.code as country_code";
$resqlchart = $db->query($sql);
$parameters = array('chartofaccounts' => $chartofaccounts, 'permissiontoadd' => $permissiontoadd, 'permissiontodelete' => $permissiontodelete);
$reshook = $hookmanager->executeHooks('formObjectOptions', $parameters, $accounting, $action);
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldPreListTitle', $parameters, $object, $action);
$varpage = empty($contextpage) ? $_SERVER["PHP_SELF"] : $contextpage;
$htmlofselectarray = $form->multiSelectArrayWithCheckbox('selectedfields', $arrayfields, $varpage, \getDolGlobalString('MAIN_CHECKBOX_LEFT_COLUMN'));
// This also change content of $arrayfields with user setup
$selectedfields = $mode != 'kanban' ? $htmlofselectarray : '';
$accountstatic = new \AccountingAccount($db);
$accountparent = new \AccountingAccount($db);
$totalarray = array();
$moreforfilter = '';
// Fields from hook
$parameters = array('arrayfields' => $arrayfields);
$reshook = $hookmanager->executeHooks('printFieldListOption', $parameters, $object, $action);
$totalarray = array();
// Hook fields
$parameters = array('arrayfields' => $arrayfields, 'param' => $param, 'sortfield' => $sortfield, 'sortorder' => $sortorder);
$reshook = $hookmanager->executeHooks('printFieldListTitle', $parameters, $object, $action);
// Loop on record
// --------------------------------------------------------------------
$i = 0;
$parameters = array('arrayfields' => $arrayfields, 'sql' => $sql);
$reshook = $hookmanager->executeHooks('printFieldListFooter', $parameters, $object, $action);