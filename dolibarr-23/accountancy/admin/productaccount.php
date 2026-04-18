<?php

// search & action GETPOST
$action = \GETPOST('action', 'aZ09');
$massaction = \GETPOST('massaction', 'alpha');
$confirm = \GETPOST('confirm', 'alpha');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : \str_replace('_', '', \basename(\dirname(__FILE__)) . \basename(__FILE__, '.php'));
// To manage different context of search
$optioncss = \GETPOST('optioncss', 'alpha');
$toselect = \GETPOST('chk_prod', 'array:int');
$default_account = \GETPOSTINT('default_account');
$searchCategoryProductOperator = \GETPOSTINT('search_category_product_operator');
$searchCategoryProductList = \GETPOST('search_category_product_list', 'array:int');
$search_ref = \GETPOST('search_ref', 'alpha');
$search_label = \GETPOST('search_label', 'alpha');
$search_desc = \GETPOST('search_desc', 'alpha');
$search_vat = \GETPOST('search_vat', 'alpha');
$search_current_account = \GETPOST('search_current_account', 'alpha');
$search_current_account_valid = \GETPOST('search_current_account_valid', 'alpha');
$search_onsell = \GETPOST('search_onsell', 'alpha');
$search_onpurchase = \GETPOST('search_onpurchase', 'alpha');
$accounting_product_mode = \GETPOST('accounting_product_mode', 'alpha');
$btn_changetype = \GETPOST('changetype', 'alpha');
// Show/hide child product variants
$show_childproducts = 0;
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : \getDolGlobalInt('ACCOUNTING_LIMIT_LIST_VENTILATION', $conf->liste_limit);
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT('page');
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$arrayfields = array();
$accounting_product_modes = array('ACCOUNTANCY_SELL', 'ACCOUNTANCY_SELL_INTRA', 'ACCOUNTANCY_SELL_EXPORT', 'ACCOUNTANCY_BUY', 'ACCOUNTANCY_BUY_INTRA', 'ACCOUNTANCY_BUY_EXPORT');
$permissiontobind = $user->hasRight('accounting', 'bind', 'write');
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \FormAccounting($db);
// For some reason typing is lost at this point
// Default AccountingAccount RowId Product / Service
// at this time ACCOUNTING_SERVICE_SOLD_ACCOUNT & ACCOUNTING_PRODUCT_SOLD_ACCOUNT are account number not accountingacount rowid
// so we need to get those the rowid of those default value first
$accounting = new \AccountingAccount($db);
// TODO: we should need to check if result is already exists accountaccount rowid.....
$aarowid_servbuy = $accounting->fetch(0, \getDolGlobalString('ACCOUNTING_SERVICE_BUY_ACCOUNT'), 1);
$aarowid_servbuy_intra = $accounting->fetch(0, \getDolGlobalString('ACCOUNTING_SERVICE_BUY_INTRA_ACCOUNT'), 1);
$aarowid_servbuy_export = $accounting->fetch(0, \getDolGlobalString('ACCOUNTING_SERVICE_BUY_EXPORT_ACCOUNT'), 1);
$aarowid_prodbuy = $accounting->fetch(0, \getDolGlobalString('ACCOUNTING_PRODUCT_BUY_ACCOUNT'), 1);
$aarowid_prodbuy_intra = $accounting->fetch(0, \getDolGlobalString('ACCOUNTING_PRODUCT_BUY_INTRA_ACCOUNT'), 1);
$aarowid_prodbuy_export = $accounting->fetch(0, \getDolGlobalString('ACCOUNTING_PRODUCT_BUY_EXPORT_ACCOUNT'), 1);
$aarowid_servsell = $accounting->fetch(0, \getDolGlobalString('ACCOUNTING_SERVICE_SOLD_ACCOUNT'), 1);
$aarowid_servsell_intra = $accounting->fetch(0, \getDolGlobalString('ACCOUNTING_SERVICE_SOLD_INTRA_ACCOUNT'), 1);
$aarowid_servsell_export = $accounting->fetch(0, \getDolGlobalString('ACCOUNTING_SERVICE_SOLD_EXPORT_ACCOUNT'), 1);
$aarowid_prodsell = $accounting->fetch(0, \getDolGlobalString('ACCOUNTING_PRODUCT_SOLD_ACCOUNT'), 1);
$aarowid_prodsell_intra = $accounting->fetch(0, \getDolGlobalString('ACCOUNTING_PRODUCT_SOLD_INTRA_ACCOUNT'), 1);
$aarowid_prodsell_export = $accounting->fetch(0, \getDolGlobalString('ACCOUNTING_PRODUCT_SOLD_EXPORT_ACCOUNT'), 1);
$aacompta_servbuy = \getDolGlobalString('ACCOUNTING_SERVICE_BUY_ACCOUNT', $langs->trans("CodeNotDef"));
$aacompta_servbuy_intra = \getDolGlobalString('ACCOUNTING_SERVICE_BUY_INTRA_ACCOUNT', $langs->trans("CodeNotDef"));
$aacompta_servbuy_export = \getDolGlobalString('ACCOUNTING_SERVICE_BUY_EXPORT_ACCOUNT', $langs->trans("CodeNotDef"));
$aacompta_prodbuy = \getDolGlobalString('ACCOUNTING_PRODUCT_BUY_ACCOUNT', $langs->trans("CodeNotDef"));
$aacompta_prodbuy_intra = \getDolGlobalString('ACCOUNTING_PRODUCT_BUY_INTRA_ACCOUNT', $langs->trans("CodeNotDef"));
$aacompta_prodbuy_export = \getDolGlobalString('ACCOUNTING_PRODUCT_BUY_EXPORT_ACCOUNT', $langs->trans("CodeNotDef"));
$aacompta_servsell = \getDolGlobalString('ACCOUNTING_SERVICE_SOLD_ACCOUNT', $langs->trans("CodeNotDef"));
$aacompta_servsell_intra = \getDolGlobalString('ACCOUNTING_SERVICE_SOLD_INTRA_ACCOUNT', $langs->trans("CodeNotDef"));
$aacompta_servsell_export = \getDolGlobalString('ACCOUNTING_SERVICE_SOLD_EXPORT_ACCOUNT', $langs->trans("CodeNotDef"));
$aacompta_prodsell = \getDolGlobalString('ACCOUNTING_PRODUCT_SOLD_ACCOUNT', $langs->trans("CodeNotDef"));
$aacompta_prodsell_intra = \getDolGlobalString('ACCOUNTING_PRODUCT_SOLD_INTRA_ACCOUNT', $langs->trans("CodeNotDef"));
$aacompta_prodsell_export = \getDolGlobalString('ACCOUNTING_PRODUCT_SOLD_EXPORT_ACCOUNT', $langs->trans("CodeNotDef"));
$title = $langs->trans("ProductsBinding");
$help_url = 'EN:Module_Double_Entry_Accounting#Setup|FR:Module_Comptabilit&eacute;_en_Partie_Double#Configuration';
$paramsCat = '';
$pcgverid = \getDolGlobalString('CHARTOFACCOUNTS');
$pcgvercode = \dol_getIdFromCode($db, $pcgverid, 'accounting_system', 'rowid', 'pcg_version');
$sql = "SELECT p.rowid, p.ref, p.label, p.description, p.tosell, p.tobuy, p.tva_tx,";
$searchCategoryProductSqlList = array();
$nbtotalofrecords = '';
$resql = $db->query($sql);
$nbtotalofrecords = $db->num_rows($resql);
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$i = 0;
$param = '';
$object = new \Product($db);
// Filter on categories
$moreforfilter = '';
$varpage = empty($contextpage) ? $_SERVER["PHP_SELF"] : $contextpage;
$selectedfields = $form->multiSelectArrayWithCheckbox('selectedfields', $arrayfields, $varpage);
// This also change content of $arrayfields
$massactionbutton = '';
$nbselected = \count($toselect);
//$buttonsave = '<input type="submit" class="button button-save" id="changeaccount" name="changeaccount" value="'.$langs->trans("Save").'">';
//print '<br><div class="center">'.$buttonsave.'</div>';
$texte = $langs->trans("ListOfProductsServices");
// Filter on categories
$moreforfilter = '';
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldPreListTitle', $parameters, $object, $action);
$listofvals = array('withoutvalidaccount' => $langs->trans("WithoutValidAccount"), 'withvalidaccount' => $langs->trans("WithValidAccount"));
$product_static = new \Product($db);
$i = 0;