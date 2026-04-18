<?php

// Get Parameters
$action = \GETPOST('action', 'aZ09');
$massaction = \GETPOST('massaction', 'alpha');
$show_files = \GETPOSTINT('show_files');
$confirm = \GETPOST('confirm', 'alpha');
$toselect = \GETPOST('toselect', 'array:int');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'orderlist';
$optioncss = \GETPOST('optioncss', 'alpha');
$mode = \GETPOST('mode', 'aZ');
// Search Parameters
$search_datecloture_start = \GETPOSTINT('search_datecloture_start');
$search_datecloture_end = \GETPOSTINT('search_datecloture_end');
$search_dateorder_start = \dol_mktime(0, 0, 0, \GETPOSTINT('search_dateorder_start_month'), \GETPOSTINT('search_dateorder_start_day'), \GETPOSTINT('search_dateorder_start_year'));
$search_dateorder_end = \dol_mktime(23, 59, 59, \GETPOSTINT('search_dateorder_end_month'), \GETPOSTINT('search_dateorder_end_day'), \GETPOSTINT('search_dateorder_end_year'));
$search_datedelivery_start = \dol_mktime(0, 0, 0, \GETPOSTINT('search_datedelivery_start_month'), \GETPOSTINT('search_datedelivery_start_day'), \GETPOSTINT('search_datedelivery_start_year'));
$search_datedelivery_end = \dol_mktime(23, 59, 59, \GETPOSTINT('search_datedelivery_end_month'), \GETPOSTINT('search_datedelivery_end_day'), \GETPOSTINT('search_datedelivery_end_year'));
$socid = \GETPOSTINT('socid');
$search_all = \trim(\GETPOST('search_all', 'alphanohtml'));
$searchCategoryOrderOperator = 0;
$searchCategoryOrderList = \GETPOST('search_category_order_list', 'array');
$search_product_category = \GETPOST('search_product_category', 'intcomma');
$search_id = \GETPOST('search_id', 'int');
$search_ref = \GETPOST('search_ref', 'alpha') != '' ? \GETPOST('search_ref', 'alpha') : \GETPOST('sref', 'alpha');
$search_ref_ext = \GETPOST('search_ref_ext', 'alpha');
$search_ref_customer = \GETPOST('search_ref_customer', 'alpha');
$search_company = \GETPOST('search_company', 'alpha');
$search_company_alias = \GETPOST('search_company_alias', 'alpha');
$search_parent_name = \trim(\GETPOST('search_parent_name', 'alphanohtml'));
$search_town = \GETPOST('search_town', 'alpha');
$search_zip = \GETPOST('search_zip', 'alpha');
$search_state = \GETPOST('search_state', 'alpha');
$search_country = \GETPOST('search_country', 'aZ09');
$search_type_thirdparty = \GETPOST('search_type_thirdparty', 'intcomma');
$search_user = \GETPOST('search_user', 'intcomma');
$search_sale = \GETPOST('search_sale', 'intcomma');
$search_total_ht = \GETPOST('search_total_ht', 'alpha');
$search_total_vat = \GETPOST('search_total_vat', 'alpha');
$search_total_ttc = \GETPOST('search_total_ttc', 'alpha');
$search_warehouse = \GETPOST('search_warehouse', 'intcomma');
$search_note_public = \GETPOST('search_note_public', 'alphanohtml');
$search_note_private = \GETPOST('search_note_private', 'alphanohtml');
$search_module_source = \GETPOST('search_module_source', 'alphanohtml');
$search_pos_source = \GETPOST('search_pos_source', 'alphanohtml');
$search_multicurrency_code = \GETPOST('search_multicurrency_code', 'alpha');
$search_multicurrency_tx = \GETPOST('search_multicurrency_tx', 'alpha');
$search_multicurrency_montant_ht = \GETPOST('search_multicurrency_montant_ht', 'alpha');
$search_multicurrency_montant_vat = \GETPOST('search_multicurrency_montant_vat', 'alpha');
$search_multicurrency_montant_ttc = \GETPOST('search_multicurrency_montant_ttc', 'alpha');
$search_login = \GETPOST('search_login', 'alpha');
$search_categ_cus = \GETPOST("search_categ_cus", 'intcomma');
$search_billed = \GETPOST('search_billed', 'intcomma');
$search_status = \GETPOST('search_status', 'intcomma');
$search_project_ref = \GETPOST('search_project_ref', 'alpha');
$search_project = \GETPOST('search_project', 'alpha');
$search_shippable = \GETPOST('search_shippable', 'aZ09');
$search_fk_cond_reglement = \GETPOST('search_fk_cond_reglement', 'intcomma');
$search_fk_shipping_method = \GETPOST('search_fk_shipping_method', 'intcomma');
$search_fk_mode_reglement = \GETPOST('search_fk_mode_reglement', 'intcomma');
$search_fk_input_reason = \GETPOST('search_fk_input_reason', 'intcomma');
$search_option = \GETPOST('search_option', 'alpha');
$search_orderday = '';
$search_ordermonth = '';
$search_orderyear = '';
$search_deliveryday = '';
$search_deliverymonth = '';
$search_deliveryyear = '';
$search_import_key = \trim(\GETPOST("search_import_key", "alpha"));
$diroutputmassaction = $conf->order->multidir_output[$conf->entity] . '/temp/massgeneration/' . $user->id;
// Load variable for pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$show_shippable_command = \GETPOST('show_shippable_command', 'aZ09');
// Initialize a technical object to manage hooks of page. Note that conf->hooks_modules contains an array of hook context
$object = new \Commande($db);
$extrafields = new \ExtraFields($db);
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
// List of fields to search into when doing a "search in all"
$fieldstosearchall = array('c.ref' => 'Ref', 'c.ref_client' => 'RefCustomerOrder', 'pd.description' => 'ProductDescription', 's.nom' => "ThirdParty", 's.name_alias' => "AliasNameShort", 's.zip' => "Zip", 's.town' => "Town", 'c.note_public' => 'NotePublic');
// Show POS fields if cashdesk or takepos module enabled or if global configuration to show POS fields on order list is enabled
$showpos = \isModEnabled('cashdesk') || \isModEnabled('takepos') || \getDolGlobalInt('ORDER_SHOW_POS') ? '1' : '0';
$checkedtypetiers = '0';
$arrayfields = array('c.rowid' => array('label' => "ID", 'checked' => '1', 'enabled' => (string) \getDolGlobalInt('MAIN_SHOW_TECHNICAL_ID'), 'position' => 1), 'c.ref' => array('label' => "Ref", 'checked' => '1', 'position' => 5, 'searchall' => 1), 'c.ref_ext' => array('label' => "RefExt", 'checked' => '1', 'position' => 5, 'visible' => 0, 'searchall' => 1), 'c.ref_client' => array('label' => "RefCustomerOrder", 'checked' => '-1', 'position' => 10, 'searchall' => 1), 'p.ref' => array('label' => "ProjectRef", 'langfile' => 'projects', 'checked' => '-1', 'enabled' => !\isModEnabled('project') ? '0' : '1', 'position' => 20), 'p.title' => array('label' => "ProjectLabel", 'langfile' => 'projects', 'checked' => '0', 'enabled' => !\isModEnabled('project') ? '0' : '1', 'position' => 25), 's.nom' => array('label' => "ThirdParty", 'checked' => '1', 'position' => 30, 'searchall' => 1), 's.name_alias' => array('label' => "AliasNameShort", 'checked' => '-1', 'position' => 31, 'searchall' => 1), 's2.nom' => array('label' => 'ParentCompany', 'position' => 32, 'checked' => '0'), 's.town' => array('label' => "Town", 'checked' => '-1', 'position' => 35, 'searchall' => 1), 's.zip' => array('label' => "Zip", 'checked' => '-1', 'position' => 40, 'searchall' => 1), 'state.nom' => array('label' => "StateShort", 'checked' => '0', 'position' => 45), 'country.code_iso' => array('label' => "Country", 'checked' => '0', 'position' => 50), 'typent.code' => array('label' => "ThirdPartyType", 'checked' => (string) $checkedtypetiers, 'position' => 55), 'c.date_commande' => array('label' => "OrderDateShort", 'checked' => '1', 'position' => 60, 'csslist' => 'nowraponall'), 'c.delivery_date' => array('label' => "DateDeliveryPlanned", 'checked' => '1', 'enabled' => (string) (int) (!\getDolGlobalString('ORDER_DISABLE_DELIVERY_DATE')), 'position' => 65, 'csslist' => 'nowraponall'), 'c.fk_shipping_method' => array('label' => "SendingMethod", 'checked' => '-1', 'position' => 66, 'enabled' => (string) (int) \isModEnabled("shipping")), 'c.fk_cond_reglement' => array('label' => "PaymentConditionsShort", 'checked' => '-1', 'position' => 67), 'c.fk_mode_reglement' => array('label' => "PaymentMode", 'checked' => '-1', 'position' => 68), 'c.fk_input_reason' => array('label' => "Origin", 'checked' => '-1', 'position' => 69), 'c.module_source' => array('label' => "POSModule", 'langfile' => 'cashdesk', 'checked' => $contextpage == 'poslist' ? '1' : '0', 'enabled' => $showpos, 'position' => 90), 'c.pos_source' => array('label' => "POSTerminal", 'langfile' => 'cashdesk', 'checked' => $contextpage == 'poslist' ? '1' : '0', 'enabled' => $showpos, 'position' => 91), 'c.total_ht' => array('label' => "AmountHT", 'checked' => '1', 'position' => 75), 'c.total_vat' => array('label' => "AmountVAT", 'checked' => '0', 'position' => 80), 'c.total_ttc' => array('label' => "AmountTTC", 'checked' => '0', 'position' => 85), 'c.multicurrency_code' => array('label' => 'Currency', 'checked' => '0', 'enabled' => !\isModEnabled("multicurrency") ? '0' : '1', 'position' => 92), 'c.multicurrency_tx' => array('label' => 'CurrencyRate', 'checked' => '0', 'enabled' => !\isModEnabled("multicurrency") ? '0' : '1', 'position' => 95), 'c.multicurrency_total_ht' => array('label' => 'MulticurrencyAmountHT', 'checked' => '0', 'enabled' => !\isModEnabled("multicurrency") ? '0' : '1', 'position' => 100), 'c.multicurrency_total_vat' => array('label' => 'MulticurrencyAmountVAT', 'checked' => '0', 'enabled' => !\isModEnabled("multicurrency") ? '0' : '1', 'position' => 105), 'c.multicurrency_total_ttc' => array('label' => 'MulticurrencyAmountTTC', 'checked' => '0', 'enabled' => !\isModEnabled("multicurrency") ? '0' : '1', 'position' => 110), 'u.login' => array('label' => "Author", 'checked' => '-1', 'position' => 115), 'sale_representative' => array('label' => "SaleRepresentativesOfThirdParty", 'checked' => '0', 'position' => 116), 'total_pa' => array('label' => \getDolGlobalString('MARGIN_TYPE') == '1' ? 'BuyingPrice' : 'CostPrice', 'checked' => '0', 'position' => 300, 'enabled' => (string) (int) (!\isModEnabled('margin') || !$user->hasRight("margins", "liretous") ? 0 : 1)), 'total_margin' => array('label' => 'Margin', 'checked' => '0', 'position' => 301, 'enabled' => (string) (int) (!\isModEnabled('margin') || !$user->hasRight("margins", "liretous") ? 0 : 1)), 'total_margin_rate' => array('label' => 'MarginRate', 'checked' => '0', 'position' => 302, 'enabled' => (string) (int) (!\isModEnabled('margin') || !$user->hasRight("margins", "liretous") || !\getDolGlobalString('DISPLAY_MARGIN_RATES') ? 0 : 1)), 'total_mark_rate' => array('label' => 'MarkRate', 'checked' => '0', 'position' => 303, 'enabled' => (string) (int) (!\isModEnabled('margin') || !$user->hasRight("margins", "liretous") || !\getDolGlobalString('DISPLAY_MARK_RATES') ? 0 : 1)), 'c.datec' => array('label' => "DateCreation", 'checked' => '0', 'position' => 120), 'c.tms' => array('label' => "DateModificationShort", 'checked' => '0', 'position' => 125), 'c.date_cloture' => array('label' => "DateClosing", 'checked' => '0', 'position' => 130), 'c.note_public' => array('label' => 'NotePublic', 'checked' => '0', 'enabled' => (string) (int) (!\getDolGlobalInt('MAIN_LIST_HIDE_PUBLIC_NOTES')), 'position' => 135, 'searchall' => 1), 'c.note_private' => array('label' => 'NotePrivate', 'checked' => '0', 'enabled' => (string) (int) (!\getDolGlobalInt('MAIN_LIST_HIDE_PRIVATE_NOTES')), 'position' => 140), 'shippable' => array('label' => "Shippable", 'checked' => '1', 'enabled' => (string) (int) \isModEnabled("shipping"), 'position' => 990), 'c.facture' => array('label' => "Billed", 'checked' => '1', 'enabled' => (string) (int) (!\getDolGlobalString('WORKFLOW_BILL_ON_SHIPMENT')), 'position' => 995), 'c.import_key' => array('type' => 'varchar(14)', 'label' => 'ImportId', 'enabled' => '1', 'visible' => -2, 'position' => 999), 'c.fk_statut' => array('label' => "Status", 'checked' => '1', 'position' => 1000));
$parameters = array('fieldstosearchall' => $fieldstosearchall);
$reshook = $hookmanager->executeHooks('completeFieldsToSearchAll', $parameters, $object, $action);
//$arrayfields['anotherfield'] = array('type'=>'integer', 'label'=>'AnotherField', 'checked'=>1, 'enabled'=>1, 'position'=>90, 'csslist'=>'right');
$arrayfields = \dol_sort_array($arrayfields, 'position');
// Security check
$id = \GETPOSTINT('orderid', \GETPOSTINT('id'));
$permissiontoreadallthirdparty = $user->hasRight('societe', 'client', 'voir');
$permissiontoread = \false;
$permissiontovalidate = \false;
$permissiontoclose = \false;
$permissiontocancel = \false;
$permissiontosendbymail = \false;
$objectclass = \null;
$result = \restrictedArea($user, 'commande', $id, '');
$error = 0;
$parameters = array('socid' => $socid, 'arrayfields' => &$arrayfields);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
// Mass actions
$objectclass = 'Commande';
$objectlabel = 'Orders';
$permissiontoread = $user->hasRight("commande", "lire");
$permissiontoadd = $user->hasRight("commande", "creer");
$permissiontodelete = $user->hasRight("commande", "supprimer");
$uploaddir = $conf->order->multidir_output[$conf->entity];
$triggersendname = 'ORDER_SENTBYMAIL';
$year = "";
$month = "";
$objecttmp = new $objectclass($db);
$nbok = 0;
/*
 * View
 */
$form = new \Form($db);
$formother = new \FormOther($db);
$formfile = new \FormFile($db);
$formmargin = \null;
$companystatic = new \Societe($db);
$company_url_list = array();
$formcompany = new \FormCompany($db);
$projectstatic = new \Project($db);
$now = \dol_now();
$varpage = empty($contextpage) ? $_SERVER["PHP_SELF"] : $contextpage;
$selectedfields = $form->multiSelectArrayWithCheckbox('selectedfields', $arrayfields, $varpage);
// This also change content of $arrayfields
$title = $langs->trans("Orders");
$help_url = "EN:Module_Customers_Orders|FR:Module_Commandes_Clients|ES:Módulo_Pedidos_de_clientes";
// Build and execute select
// --------------------------------------------------------------------
$sql = 'SELECT';
// Add fields from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListSelect', $parameters, $object, $action);
$sql = \preg_replace('/,\\s*$/', '', $sql);
$sqlfields = $sql;
// Add table from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListFrom', $parameters, $object, $action);
$searchCategoryOrderSqlList = array();
$listofcategoryid = '';
// Search for tag/category ($searchCategoryCustomerList is an array of ID)
$searchCategoryCustomerOperator = \GETPOSTINT('search_category_customer_operator');
$searchCategoryCustomerList = array($search_categ_cus);
$searchCategoryCustomerSqlList = array();
$listofcategoryid = '';
// Search for tag/category ($searchCategoryProductList is an array of ID)
$searchCategoryProductOperator = \GETPOSTINT('search_category_product_operator');
$searchCategoryProductList = array($search_product_category);
$searchCategoryProductSqlList = array();
$listofcategoryid = '';
// Add where from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListWhere', $parameters, $object, $action);
// Prepare the $sqltoadd for fields pd.* that need a test by doing a "or exits"
$sqltoadd = '';
$fieldstosearchallwithoutpd = array();
$fieldstosearchallwithpd = array();
// Add HAVING from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListHaving', $parameters, $object, $action);
//print $sql;
// Count total nb of records
$nbtotalofrecords = '';
/* The fast and low memory method to get and count full list converts the sql into a sql count */
$sqlforcount = \preg_replace('/^' . \preg_quote($sqlfields, '/') . '/', 'SELECT COUNT(*) as nbtotalofrecords', $sql);
$sqlforcount = \preg_replace('/GROUP BY .*$/', '', $sqlforcount);
$resql = $db->query($sqlforcount);
//print $sql;
$resql = $db->query($sql);
$soc = new \Societe($db);
$title = $langs->trans('CustomersOrders') . ' - ' . $soc->name;
$num = $db->num_rows($resql);
$arrayofselected = \is_array($toselect) ? $toselect : array();
$arrayofselected = \is_array($toselect) ? $toselect : array();
$param = '';
// Add $param from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListSearchParam', $parameters, $object, $action);
// List of mass actions available
$arrayofmassactions = array('generate_doc' => \img_picto('', 'pdf', 'class="pictofixedwidth"') . $langs->trans("ReGeneratePDF"), 'builddoc' => \img_picto('', 'pdf', 'class="pictofixedwidth"') . $langs->trans("PDFMerge"));
$massactionbutton = $form->selectMassAction('', $arrayofmassactions);
$url = \DOL_URL_ROOT . '/commande/card.php?action=create';
$newcardbutton = '';
$topicmail = "SendOrderRef";
$modelmail = "order_send";
$objecttmp = new \Commande($db);
$trackid = 'ord' . $object->id;
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
$totalarray = array('nbfield' => 0, 'val' => array('c.total_ht' => 0, 'c.total_tva' => 0, 'c.total_ttc' => 0), 'pos' => array());
// Hook fields
$parameters = array('arrayfields' => $arrayfields, 'param' => $param, 'sortfield' => $sortfield, 'sortorder' => $sortorder, 'totalarray' => &$totalarray);
$reshook = $hookmanager->executeHooks('printFieldListTitle', $parameters, $object, $action);
$total = 0;
$subtotal = 0;
$productstat_cache = array();
$productstat_cachevirtual = array();
$getNomUrl_cache = array();
$generic_commande = new \Commande($db);
$generic_product = new \Product($db);
$userstatic = new \User($db);
$with_margin_info = \false;
$total_ht = 0;
$total_margin = 0;
// Loop on record
// --------------------------------------------------------------------
$i = 0;
$savnbfield = $totalarray['nbfield'];
$totalarray = array();
$imaxinloop = $limit ? \min($num, $limit) : $num;
$parameters = array('arrayfields' => $arrayfields, 'sql' => $sql);
$reshook = $hookmanager->executeHooks('printFieldListFooter', $parameters, $object, $action);
$hidegeneratedfilelistifempty = 1;
// Show list of available documents
$urlsource = $_SERVER['PHP_SELF'] . '?sortfield=' . $sortfield . '&sortorder=' . $sortorder;
$filedir = $diroutputmassaction;
$genallowed = $permissiontoread;
$delallowed = $permissiontoadd;