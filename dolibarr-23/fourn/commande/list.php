<?php

// Get Parameters
$action = \GETPOST('action', 'aZ09');
$massaction = \GETPOST('massaction', 'alpha');
$show_files = \GETPOSTINT('show_files');
$confirm = \GETPOST('confirm', 'alpha');
$toselect = \GETPOST('toselect', 'array:int');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'supplierorderlist';
$mode = \GETPOST('mode', 'alpha');
// Search Criteria
$search_date_order_startday = \GETPOSTINT('search_date_order_startday');
$search_date_order_startmonth = \GETPOSTINT('search_date_order_startmonth');
$search_date_order_startyear = \GETPOSTINT('search_date_order_startyear');
$search_date_order_endday = \GETPOSTINT('search_date_order_endday');
$search_date_order_endmonth = \GETPOSTINT('search_date_order_endmonth');
$search_date_order_endyear = \GETPOSTINT('search_date_order_endyear');
$search_date_order_start = \dol_mktime(0, 0, 0, $search_date_order_startmonth, $search_date_order_startday, $search_date_order_startyear);
// Use tzserver
$search_date_order_end = \dol_mktime(23, 59, 59, $search_date_order_endmonth, $search_date_order_endday, $search_date_order_endyear);
$search_date_delivery_startday = \GETPOSTINT('search_date_delivery_startday');
$search_date_delivery_startmonth = \GETPOSTINT('search_date_delivery_startmonth');
$search_date_delivery_startyear = \GETPOSTINT('search_date_delivery_startyear');
$search_date_delivery_endday = \GETPOSTINT('search_date_delivery_endday');
$search_date_delivery_endmonth = \GETPOSTINT('search_date_delivery_endmonth');
$search_date_delivery_endyear = \GETPOSTINT('search_date_delivery_endyear');
$search_date_delivery_start = \dol_mktime(0, 0, 0, $search_date_delivery_startmonth, $search_date_delivery_startday, $search_date_delivery_startyear);
// Use tzserver
$search_date_delivery_end = \dol_mktime(23, 59, 59, $search_date_delivery_endmonth, $search_date_delivery_endday, $search_date_delivery_endyear);
$search_date_valid_startday = \GETPOSTINT('search_date_valid_startday');
$search_date_valid_startmonth = \GETPOSTINT('search_date_valid_startmonth');
$search_date_valid_startyear = \GETPOSTINT('search_date_valid_startyear');
$search_date_valid_endday = \GETPOSTINT('search_date_valid_endday');
$search_date_valid_endmonth = \GETPOSTINT('search_date_valid_endmonth');
$search_date_valid_endyear = \GETPOSTINT('search_date_valid_endyear');
$search_date_valid_start = \dol_mktime(0, 0, 0, $search_date_valid_startmonth, $search_date_valid_startday, $search_date_valid_startyear);
// Use tzserver
$search_date_valid_end = \dol_mktime(23, 59, 59, $search_date_valid_endmonth, $search_date_valid_endday, $search_date_valid_endyear);
$search_date_approve_startday = \GETPOSTINT('search_date_approve_startday');
$search_date_approve_startmonth = \GETPOSTINT('search_date_approve_startmonth');
$search_date_approve_startyear = \GETPOSTINT('search_date_approve_startyear');
$search_date_approve_endday = \GETPOSTINT('search_date_approve_endday');
$search_date_approve_endmonth = \GETPOSTINT('search_date_approve_endmonth');
$search_date_approve_endyear = \GETPOSTINT('search_date_approve_endyear');
$search_date_approve_start = \dol_mktime(0, 0, 0, $search_date_approve_startmonth, $search_date_approve_startday, $search_date_approve_startyear);
// Use tzserver
$search_date_approve_end = \dol_mktime(23, 59, 59, $search_date_approve_endmonth, $search_date_approve_endday, $search_date_approve_endyear);
$search_all = \trim(\GETPOST('search_all', 'alphanohtml'));
$searchCategorySupplierOrderList = \GETPOST('search_category_supplier_order_list', 'array:int');
$searchCategorySupplierOrderOperator = 0;
$search_product_category = \GETPOSTINT('search_product_category');
$search_ref = \GETPOST('search_ref', 'alpha');
$search_refsupp = \GETPOST('search_refsupp', 'alpha');
$search_company = \GETPOST('search_company', 'alpha');
$search_company_alias = \GETPOST('search_company_alias', 'alpha');
$search_town = \GETPOST('search_town', 'alpha');
$search_zip = \GETPOST('search_zip', 'alpha');
$search_state = \GETPOST("search_state", 'alpha');
$search_country = \GETPOST("search_country", 'aZ09');
$search_type_thirdparty = \GETPOST("search_type_thirdparty", 'intcomma');
$search_user = \GETPOST('search_user', 'intcomma');
$search_request_author = \GETPOST('search_request_author', 'alpha');
$optioncss = \GETPOST('optioncss', 'alpha');
$socid = \GETPOSTINT('socid');
$search_sale = \GETPOST('search_sale', 'intcomma');
$search_total_ht = \GETPOST('search_total_ht', 'alpha');
$search_total_tva = \GETPOST('search_total_tva', 'alpha');
$search_total_ttc = \GETPOST('search_total_ttc', 'alpha');
$search_multicurrency_code = \GETPOST('search_multicurrency_code', 'alpha');
$search_multicurrency_tx = \GETPOST('search_multicurrency_tx', 'alpha');
$search_note_private = \GETPOST('search_note_private', 'alpha');
$search_note_public = \GETPOST('search_note_public', 'alpha');
$search_multicurrency_montant_ht = \GETPOST('search_multicurrency_montant_ht', 'alpha');
$search_multicurrency_montant_tva = \GETPOST('search_multicurrency_montant_tva', 'alpha');
$search_multicurrency_montant_ttc = \GETPOST('search_multicurrency_montant_ttc', 'alpha');
$optioncss = \GETPOST('optioncss', 'alpha');
$billed = \GETPOST('billed', 'int');
// Value '' must be possible
$search_project_ref = \GETPOST('search_project_ref', 'alpha');
$search_btn = \GETPOST('button_search', 'alpha');
$search_remove_btn = \GETPOST('button_removefilter', 'alpha');
$search_option = \GETPOST('search_option', 'alpha');
$diroutputmassaction = $conf->fournisseur->commande->dir_output . '/temp/massgeneration/' . $user->id;
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT('page');
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
// Initialize a technical object to manage hooks of page. Note that conf->hooks_modules contains an array of hook context
$object = new \CommandeFournisseur($db);
$extrafields = new \ExtraFields($db);
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
// List of fields to search into when doing a "search in all"
$fieldstosearchall = array();
$enabledtypetiers = 0;
// Definition of array of fields for columns
$arrayfields = array('u.login' => array('label' => "AuthorRequest", 'enabled' => '1', 'position' => 41), 's.name_alias' => array('label' => "AliasNameShort", 'position' => 51, 'checked' => '0'), 's.town' => array('label' => "Town", 'enabled' => '1', 'position' => 55, 'checked' => '0'), 's.zip' => array('label' => "Zip", 'enabled' => '1', 'position' => 56, 'checked' => '1'), 'state.nom' => array('label' => "StateShort", 'enabled' => '1', 'position' => 57), 'country.code_iso' => array('label' => "Country", 'enabled' => '1', 'position' => 58), 'typent.code' => array('label' => "ThirdPartyType", 'enabled' => $enabledtypetiers, 'position' => 59), 'cf.total_localtax1' => array('label' => $langs->transcountry("AmountLT1", $mysoc->country_code), 'checked' => '0', 'enabled' => (string) (int) ($mysoc->localtax1_assuj == "1"), 'position' => 140), 'cf.total_localtax2' => array('label' => $langs->transcountry("AmountLT2", $mysoc->country_code), 'checked' => '0', 'enabled' => (string) (int) ($mysoc->localtax2_assuj == "1"), 'position' => 145), 'cf.note_public' => array('label' => 'NotePublic', 'checked' => '0', 'enabled' => (string) (int) (!\getDolGlobalInt('MAIN_LIST_HIDE_PUBLIC_NOTES')), 'position' => 750), 'cf.note_private' => array('label' => 'NotePrivate', 'checked' => '0', 'enabled' => (string) (int) (!\getDolGlobalInt('MAIN_LIST_HIDE_PRIVATE_NOTES')), 'position' => 760));
$arrayfields = \dol_sort_array($arrayfields, 'position');
$error = 0;
// Security check
$orderid = \GETPOSTINT('orderid');
$result = \restrictedArea($user, 'fournisseur', $orderid, '', 'commande');
$permissiontoread = $user->hasRight("fournisseur", "commande", "lire") || $user->hasRight("supplier_order", "lire");
$permissiontoadd = $user->hasRight("fournisseur", "commande", "creer") || $user->hasRight("supplier_order", "creer");
$permissiontodelete = $user->hasRight("fournisseur", "commande", "supprimer") || $user->hasRight("supplier_order", "supprimer");
$permissiontovalidate = $permissiontoadd;
$permissiontoapprove = $user->hasRight("fournisseur", "commande", "approuver") || $user->hasRight("supplier_order", "approuver");
$parameters = array('socid' => $socid, 'arrayfields' => &$arrayfields);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
// Mass actions
$objectclass = 'CommandeFournisseur';
$objectlabel = 'SupplierOrders';
$uploaddir = $conf->fournisseur->commande->dir_output;
/*
 *	View
 */
$now = \dol_now();
$form = new \Form($db);
$thirdpartytmp = new \Fournisseur($db);
$commandestatic = new \CommandeFournisseur($db);
$formfile = new \FormFile($db);
$formorder = new \FormOrder($db);
$formother = new \FormOther($db);
$formcompany = new \FormCompany($db);
$title = $langs->trans("SuppliersOrders");
//$help_url="EN:Module_Customers_Orders|FR:Module_Commandes_Clients|ES:Módulo_Pedidos_de_clientes";
$help_url = '';
$varpage = empty($contextpage) ? $_SERVER["PHP_SELF"] : $contextpage;
$selectedfields = $form->multiSelectArrayWithCheckbox('selectedfields', $arrayfields, $varpage);
// This also change content of $arrayfields
$sql = 'SELECT';
// Add fields from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListSelect', $parameters, $object);
$sqlfields = $sql;
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListFrom', $parameters, $object);
$searchCategorySupplierOrderSqlList = array();
$listofcategoryid = '';
// Search for tag/category ($searchCategoryProductList is an array of ID)
$searchCategoryProductOperator = \GETPOSTINT('search_category_product_operator');
$searchCategoryProductList = array($search_product_category);
$searchCategoryProductSqlList = array();
$listofcategoryid = '';
// Add where from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListWhere', $parameters, $object);
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
$parameters = array('param' => &$param);
$reshook = $hookmanager->executeHooks('printFieldListSearchParam', $parameters, $object);
// List of mass actions available
$arrayofmassactions = array('generate_doc' => \img_picto('', 'pdf', 'class="pictofixedwidth"') . $langs->trans("ReGeneratePDF"), 'builddoc' => \img_picto('', 'pdf', 'class="pictofixedwidth"') . $langs->trans("PDFMerge"), 'presend' => \img_picto('', 'email', 'class="pictofixedwidth"') . $langs->trans("SendByMail"));
$massactionbutton = $form->selectMassAction('', $arrayofmassactions);
$url = \DOL_URL_ROOT . '/fourn/commande/card.php?action=create';
$newcardbutton = '';
$topicmail = "SendOrderRef";
$modelmail = "order_supplier_send";
$objecttmp = new \CommandeFournisseur($db);
// in case $object is not the good object
$trackid = 'sord' . $object->id;
$moreforfilter = '';
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldPreListTitle', $parameters, $object, $action);
$varpage = empty($contextpage) ? $_SERVER["PHP_SELF"] : $contextpage;
$selectedfields = $form->multiSelectArrayWithCheckbox('selectedfields', $arrayfields, $varpage, \getDolGlobalString('MAIN_CHECKBOX_LEFT_COLUMN'));
// Fields from hook
$parameters = array('arrayfields' => $arrayfields);
$reshook = $hookmanager->executeHooks('printFieldListOption', $parameters);
$totalarray = array();
// Hook fields
$parameters = array('arrayfields' => $arrayfields, 'param' => $param, 'sortfield' => $sortfield, 'sortorder' => $sortorder);
$reshook = $hookmanager->executeHooks('printFieldListTitle', $parameters);
$total = 0;
$subtotal = 0;
$productstat_cache = array();
$userstatic = new \User($db);
$objectstatic = new \CommandeFournisseur($db);
$projectstatic = new \Project($db);
$i = 0;
$savnbfield = $totalarray['nbfield'];
$totalarray = array('nbfield' => 0, 'val' => array(), 'pos' => array());
$imaxinloop = $limit ? \min($num, $limit) : $num;
$parameters = array('arrayfields' => $arrayfields, 'sql' => $sql);
$reshook = $hookmanager->executeHooks('printFieldListFooter', $parameters);
$hidegeneratedfilelistifempty = 1;
// Show list of available documents
$urlsource = $_SERVER['PHP_SELF'] . '?sortfield=' . $sortfield . '&sortorder=' . $sortorder;
$filedir = $diroutputmassaction;
$genallowed = $permissiontoread;
$delallowed = $permissiontoadd;