<?php

$action = \GETPOST('action', 'aZ09');
$massaction = \GETPOST('massaction', 'alpha');
$show_files = \GETPOSTINT('show_files');
$confirm = \GETPOST('confirm', 'alpha');
$toselect = \GETPOST('toselect', 'array:int');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'bankaccountlist';
// To manage different context of search
$mode = \GETPOST('mode', 'aZ');
$search_ref = \GETPOST('search_ref', 'alpha');
$search_label = \GETPOST('search_label', 'alpha');
$search_number = \GETPOST('search_number', 'alpha');
$search_status = \GETPOST('search_status', 'alpha');
$optioncss = \GETPOST('optioncss', 'alpha');
$search_category_list = "";
$socid = 0;
$diroutputmassaction = $conf->bank->dir_output . '/temp/massgeneration/' . $user->id;
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT('page');
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
// Initialize a technical object to manage hooks of page. Note that conf->hooks_modules contains an array of hook context
$object = new \Account($db);
$extrafields = new \ExtraFields($db);
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
// List of fields to search into when doing a "search in all"
$fieldstosearchall = array('b.ref' => 'Ref', 'b.label' => 'Label');
$checkedtypetiers = 0;
$arrayfields = array('b.ref' => array('label' => $langs->trans("BankAccounts"), 'checked' => '1', 'position' => 10), 'b.label' => array('label' => $langs->trans("Label"), 'checked' => '1', 'position' => 12), 'accountype' => array('label' => $langs->trans("Type"), 'checked' => '1', 'position' => 14), 'b.number' => array('label' => $langs->trans("AccountIdShort"), 'checked' => '1', 'position' => 16), 'b.account_number' => array('label' => $langs->trans("AccountAccounting"), 'checked' => (string) (int) \isModEnabled('accounting'), 'position' => 18), 'b.fk_accountancy_journal' => array('label' => $langs->trans("AccountancyJournal"), 'checked' => (string) (int) \isModEnabled('accounting'), 'position' => 20), 'toreconcile' => array('label' => $langs->trans("TransactionsToConciliate"), 'checked' => '1', 'position' => 50), 'b.currency_code' => array('label' => $langs->trans("Currency"), 'checked' => '0', 'position' => 22), 'b.datec' => array('label' => $langs->trans("DateCreation"), 'checked' => '0', 'position' => 500), 'b.tms' => array('label' => $langs->trans("DateModificationShort"), 'checked' => '0', 'position' => 500), 'b.clos' => array('label' => $langs->trans("Status"), 'checked' => '1', 'position' => 1000), 'balance' => array('label' => $langs->trans("Balance"), 'checked' => '1', 'position' => 1010));
$arrayfields = \dol_sort_array($arrayfields, 'position');
$permissiontoadd = $user->hasRight('banque', 'modifier');
$permissiontodelete = $user->hasRight('banque', 'configurer');
$allowed = 0;
$parameters = array('socid' => $socid);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
// Mass actions
$objectclass = 'Account';
$objectlabel = 'FinancialAccount';
$uploaddir = $conf->banque->dir_output;
/*
 * View
 */
$form = new \FormCategory($db);
$title = $langs->trans('BankAccounts');
$help_url = 'EN:Module_Banks_and_Cash|FR:Module_Banques_et_Caisses|ES:M&oacute;dulo_Bancos_y_Cajas';
// Load array of financial accounts (opened by default)
$accounts = array();
// Build and execute select
// --------------------------------------------------------------------
$sql = "SELECT b.rowid, b.label, b.courant, b.rappro, b.account_number, b.fk_accountancy_journal, b.currency_code, b.datec as date_creation, b.tms as date_modification";
// Add fields from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListSelect', $parameters, $object, $action);
$sql = \preg_replace('/,\\s*$/', '', $sql);
$sqlfields = $sql;
// Search for tag/category ($searchCategoryBankList is an array of ID)
$searchCategoryBankList = $search_category_list;
$searchCategoryBankOperator = 0;
$searchCategoryBankSqlList = array();
$listofcategoryid = '';
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
$arrayofselected = \is_array($toselect) ? $toselect : array();
$param = '';
// Add $param from hooks
$parameters = array('param' => &$param);
$reshook = $hookmanager->executeHooks('printFieldListSearchParam', $parameters, $object, $action);
// List of mass actions available
$arrayofmassactions = array();
$massactionbutton = $form->selectMassAction('', $arrayofmassactions);
$newcardbutton = '';
$topicmail = "Information";
//$modelmail="subscription";
$objecttmp = new \Account($db);
$trackid = 'bank' . $object->id;
//if ($sall) {
//	foreach ($fieldstosearchall as $key => $val) {
//		$fieldstosearchall[$key] = $langs->trans($val);
//	}
//	print '<div class="divsearchfieldfilter">'.$langs->trans("FilterOnInto", $sall).join(', ', $fieldstosearchall).'</div>';
//}
$moreforfilter = '';
// Bank accounts
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
$i = 0;
$savnbfield = $totalarray['nbfield'];
$totalarray = array();
$total = array();
$found = 0;
$lastcurrencycode = '';
$imaxinloop = $limit ? \min($num, $limit) : $num;