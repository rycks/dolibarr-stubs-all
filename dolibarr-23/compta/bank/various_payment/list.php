<?php

$optioncss = \GETPOST('optioncss', 'alpha');
$mode = \GETPOST('mode', 'alpha');
$massaction = \GETPOST('massaction', 'aZ09');
$toselect = \GETPOST('toselect', 'array:int');
// Array of ids of elements selected into a list
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'directdebitcredittransferlist';
// To manage different context of search
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$search_ref = \GETPOST('search_ref', 'alpha');
$search_user = \GETPOST('search_user', 'alpha');
$search_label = \GETPOST('search_label', 'alpha');
$search_datep_start = \dol_mktime(0, 0, 0, \GETPOSTINT('search_date_startmonth'), \GETPOSTINT('search_date_startday'), \GETPOSTINT('search_date_startyear'));
$search_datep_end = \dol_mktime(23, 59, 59, \GETPOSTINT('search_date_endmonth'), \GETPOSTINT('search_date_endday'), \GETPOSTINT('search_date_endyear'));
$search_datev_start = \dol_mktime(0, 0, 0, \GETPOSTINT('search_date_value_startmonth'), \GETPOSTINT('search_date_value_startday'), \GETPOSTINT('search_date_value_startyear'));
$search_datev_end = \dol_mktime(23, 59, 59, \GETPOSTINT('search_date_value_endmonth'), \GETPOSTINT('search_date_value_endday'), \GETPOSTINT('search_date_value_endyear'));
$search_amount_deb = \GETPOST('search_amount_deb', 'alpha');
$search_amount_cred = \GETPOST('search_amount_cred', 'alpha');
$search_bank_account = \GETPOST('search_account', "intcomma");
$search_bank_entry = \GETPOST('search_bank_entry', 'alpha');
$search_accountancy_account = \GETPOST("search_accountancy_account");
$search_accountancy_subledger = \GETPOST("search_accountancy_subledger");
$search_type_id = \GETPOST('search_type_id', 'int');
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
// Initialize a technical objects
$object = new \PaymentVarious($db);
$extrafields = new \ExtraFields($db);
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
$filtre = \GETPOST("filtre", 'alpha');
$search_all = \trim(\GETPOST('search_all', 'alphanohtml'));
/*
* TODO: fill array "$fields" in "/compta/bank/class/paymentvarious.class.php" and use
*
*
* $object = new PaymentVarious($db);
*
* $search = array();
* foreach ($object->fields as $key => $val)
* {
*	if (GETPOST('search_'.$key, 'alpha')) $search[$key] = GETPOST('search_'.$key, 'alpha');
* }

* $fieldstosearchall = array();
* foreach ($object->fields as $key => $val)
* {
*	if ($val['searchall']) $fieldstosearchall['t.'.$key] = $val['label'];
* }
*
*/
// List of fields to search into when doing a "search in all"
$fieldstosearchall = array('v.rowid' => "Ref", 'v.label' => "Label", 'v.datep' => "DatePayment", 'v.datev' => "DateValue", 'v.amount' => $langs->trans("Debit") . ", " . $langs->trans("Credit"));
// Definition of fields for lists
$arrayfields = array('ref' => array('label' => "Ref", 'checked' => '1', 'position' => 100), 'label' => array('label' => "Label", 'checked' => '1', 'position' => 110), 'datep' => array('label' => "DatePayment", 'checked' => '1', 'position' => 120), 'datev' => array('label' => "DateValue", 'checked' => '-1', 'position' => 130), 'type' => array('label' => "PaymentMode", 'checked' => '1', 'position' => 140), 'project' => array('label' => "Project", 'checked' => '-1', 'position' => 200, "enabled" => (string) (int) \isModEnabled('project')), 'bank' => array('label' => "BankAccount", 'checked' => '1', 'position' => 300, "enabled" => (string) (int) \isModEnabled("bank")), 'entry' => array('label' => "BankTransactionLine", 'checked' => '1', 'position' => 310, "enabled" => (string) (int) \isModEnabled("bank")), 'account' => array('label' => "AccountAccountingShort", 'checked' => '1', 'position' => 400, "enabled" => (string) (int) \isModEnabled('accounting')), 'subledger' => array('label' => "SubledgerAccount", 'checked' => '1', 'position' => 410, "enabled" => (string) (int) \isModEnabled('accounting')), 'debit' => array('label' => "Debit", 'checked' => '1', 'position' => 500), 'credit' => array('label' => "Credit", 'checked' => '1', 'position' => 510));
$arrayfields = \dol_sort_array($arrayfields, 'position');
// Security check
$socid = \GETPOSTINT("socid");
$result = \restrictedArea($user, 'banque', '', '', '');
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$proj = \null;
$accountingaccount = new \AccountingAccount($db);
$bankline = new \AccountLine($db);
$variousstatic = new \PaymentVarious($db);
$accountstatic = \null;
$accountingjournal = \null;
$title = $langs->trans("VariousPayments");
//$help_url = "EN:Module_MyObject|FR:Module_MyObject_FR|ES:Módulo_MyObject";
$help_url = '';
// Build and execute select
// --------------------------------------------------------------------
$sql = "SELECT v.rowid, v.sens, v.amount, v.label, v.datep as datep, v.datev as datev, v.fk_typepayment as type, v.num_payment, v.fk_bank, v.accountancy_code, v.subledger_account, v.fk_projet as fk_project,";
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
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$arrayofselected = \is_array($toselect) ? $toselect : array();
$param = '';
$url = \DOL_URL_ROOT . '/compta/bank/various_payment/card.php?action=create';
// List of mass actions available
$arrayofmassactions = array();
$massactionbutton = $form->selectMassAction('', $arrayofmassactions);
$newcardbutton = '';
$arrayofmassactions = array();
$moreforfilter = '';
$varpage = empty($contextpage) ? $_SERVER["PHP_SELF"] : $contextpage;
$htmlofselectarray = $form->multiSelectArrayWithCheckbox('selectedfields', $arrayfields, $varpage, \getDolGlobalString('MAIN_CHECKBOX_LEFT_COLUMN'));
// This also change content of $arrayfields with user setup
$selectedfields = $mode != 'kanban' ? $htmlofselectarray : '';
$totalarray = array();
// Hook fields
$parameters = array('arrayfields' => $arrayfields, 'param' => $param, 'sortfield' => $sortfield, 'sortorder' => $sortorder, 'totalarray' => &$totalarray);
$reshook = $hookmanager->executeHooks('printFieldListTitle', $parameters, $object, $action);
// Loop on record
// --------------------------------------------------------------------
$i = 0;
$savnbfield = $totalarray['nbfield'];
$totalarray = array();
$imaxinloop = $limit ? \min($num, $limit) : $num;
$parameters = array('arrayfields' => $arrayfields, 'sql' => $sql);
$reshook = $hookmanager->executeHooks('printFieldListFooter', $parameters, $object);