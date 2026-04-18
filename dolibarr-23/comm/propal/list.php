<?php

// Get Parameters
$socid = \GETPOSTINT('socid');
$action = \GETPOST('action', 'aZ09');
$massaction = \GETPOST('massaction', 'alpha');
$show_files = \GETPOSTINT('show_files');
$confirm = \GETPOST('confirm', 'alpha');
$cancel = \GETPOST('cancel', 'alpha');
$toselect = \GETPOST('toselect', 'array:int');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'proposallist';
$optioncss = \GETPOST('optioncss', 'alpha');
$mode = \GETPOST('mode', 'alpha');
// Search Fields
$search_all = \trim(\GETPOST('search_all', 'alphanohtml'));
$search_user = \GETPOSTINT('search_user');
$search_sale = \GETPOSTINT('search_sale');
$search_ref = \GETPOST('sf_ref') ? \GETPOST('sf_ref', 'alpha') : \GETPOST('search_ref', 'alpha');
$search_refcustomer = \GETPOST('search_refcustomer', 'alpha');
$search_refproject = \GETPOST('search_refproject', 'alpha');
$search_project = \GETPOST('search_project', 'alpha');
$search_societe = \GETPOST('search_societe', 'alpha');
$search_societe_alias = \GETPOST('search_societe_alias', 'alpha');
$search_montant_ht = \GETPOST('search_montant_ht', 'alpha');
$search_montant_vat = \GETPOST('search_montant_vat', 'alpha');
$search_montant_ttc = \GETPOST('search_montant_ttc', 'alpha');
$search_warehouse = \GETPOST('search_warehouse', 'alpha');
$search_multicurrency_code = \GETPOST('search_multicurrency_code', 'alpha');
$search_multicurrency_tx = \GETPOST('search_multicurrency_tx', 'alpha');
$search_multicurrency_montant_ht = \GETPOST('search_multicurrency_montant_ht', 'alpha');
$search_multicurrency_montant_vat = \GETPOST('search_multicurrency_montant_vat', 'alpha');
$search_multicurrency_montant_ttc = \GETPOST('search_multicurrency_montant_ttc', 'alpha');
$search_login = \GETPOST('search_login', 'alpha');
$searchCategoryPropalList = \GETPOST('search_category_propal_list', 'array:int');
$searchCategoryPropalOperator = 0;
$search_product_category = \GETPOSTINT('search_product_category');
$search_town = \GETPOST('search_town', 'alpha');
$search_zip = \GETPOST('search_zip', 'alpha');
$search_state = \GETPOST("search_state");
$search_country = \GETPOST("search_country", 'aZ09');
$search_type_thirdparty = \GETPOST("search_type_thirdparty", 'intcomma');
$search_date_startday = \GETPOSTINT('search_date_startday');
$search_date_startmonth = \GETPOSTINT('search_date_startmonth');
$search_date_startyear = \GETPOSTINT('search_date_startyear');
$search_date_endday = \GETPOSTINT('search_date_endday');
$search_date_endmonth = \GETPOSTINT('search_date_endmonth');
$search_date_endyear = \GETPOSTINT('search_date_endyear');
$search_date_start = \dol_mktime(0, 0, 0, $search_date_startmonth, $search_date_startday, $search_date_startyear);
// Use tzserver
$search_date_end = \dol_mktime(23, 59, 59, $search_date_endmonth, $search_date_endday, $search_date_endyear);
$search_date_end_startday = \GETPOSTINT('search_date_end_startday');
$search_date_end_startmonth = \GETPOSTINT('search_date_end_startmonth');
$search_date_end_startyear = \GETPOSTINT('search_date_end_startyear');
$search_date_end_endday = \GETPOSTINT('search_date_end_endday');
$search_date_end_endmonth = \GETPOSTINT('search_date_end_endmonth');
$search_date_end_endyear = \GETPOSTINT('search_date_end_endyear');
$search_date_end_start = \dol_mktime(0, 0, 0, $search_date_end_startmonth, $search_date_end_startday, $search_date_end_startyear);
// Use tzserver
$search_date_end_end = \dol_mktime(23, 59, 59, $search_date_end_endmonth, $search_date_end_endday, $search_date_end_endyear);
$search_date_delivery_startday = \GETPOSTINT('search_date_delivery_startday');
$search_date_delivery_startmonth = \GETPOSTINT('search_date_delivery_startmonth');
$search_date_delivery_startyear = \GETPOSTINT('search_date_delivery_startyear');
$search_date_delivery_endday = \GETPOSTINT('search_date_delivery_endday');
$search_date_delivery_endmonth = \GETPOSTINT('search_date_delivery_endmonth');
$search_date_delivery_endyear = \GETPOSTINT('search_date_delivery_endyear');
$search_date_delivery_start = \dol_mktime(0, 0, 0, $search_date_delivery_startmonth, $search_date_delivery_startday, $search_date_delivery_startyear);
$search_date_delivery_end = \dol_mktime(23, 59, 59, $search_date_delivery_endmonth, $search_date_delivery_endday, $search_date_delivery_endyear);
$search_availability = \GETPOST('search_availability', 'intcomma');
$search_categ_cus = \GETPOSTINT("search_categ_cus");
$search_fk_cond_reglement = \GETPOST("search_fk_cond_reglement", 'intcomma');
$search_fk_shipping_method = \GETPOST("search_fk_shipping_method", 'intcomma');
$search_fk_input_reason = \GETPOST("search_fk_input_reason", 'intcomma');
$search_fk_mode_reglement = \GETPOST("search_fk_mode_reglement", 'intcomma');
$search_date_signature_startday = \GETPOSTINT('search_date_signature_startday');
$search_date_signature_startmonth = \GETPOSTINT('search_date_signature_startmonth');
$search_date_signature_startyear = \GETPOSTINT('search_date_signature_startyear');
$search_date_signature_endday = \GETPOSTINT('search_date_signature_endday');
$search_date_signature_endmonth = \GETPOSTINT('search_date_signature_endmonth');
$search_date_signature_endyear = \GETPOSTINT('search_date_signature_endyear');
$search_date_signature_start = \dol_mktime(0, 0, 0, $search_date_signature_startmonth, $search_date_signature_startday, $search_date_signature_startyear);
$search_date_signature_end = \dol_mktime(23, 59, 59, $search_date_signature_endmonth, $search_date_signature_endday, $search_date_signature_endyear);
$search_status = \GETPOST('search_status', 'alpha');
$search_note_public = \GETPOST('search_note_public', 'alpha');
$search_import_key = \trim(\GETPOST("search_import_key", "alpha"));
$search_option = \GETPOST('search_option', 'alpha');
// Pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
// Security check
$module = 'propal';
$dbtable = '';
$objectid = '';
$result = \restrictedArea($user, $module, $objectid, $dbtable);
$diroutputmassaction = $conf->propal->multidir_output[$conf->entity] . '/temp/massgeneration/' . $user->id;
// Initialize a technical object to manage hooks of page. Note that conf->hooks_modules contains an array of hook context
$object = new \Propal($db);
$extrafields = new \ExtraFields($db);
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
// List of fields to search into when doing a "search in all"
$fieldstosearchall = array('p.ref' => 'Ref', 'p.ref_client' => 'RefCustomer', 'pd.description' => 'ProductDescription', 's.nom' => "ThirdParty", 's.name_alias' => "AliasNameShort", 's.zip' => "Zip", 's.town' => "Town", 'p.note_public' => 'NotePublic');
$checkedtypetiers = 0;
$arrayfields = array('p.ref' => array('label' => "Ref", 'checked' => '1'), 'p.ref_client' => array('label' => "RefCustomer", 'checked' => '-1'), 'pr.ref' => array('label' => "ProjectRef", 'checked' => '1', 'enabled' => \isModEnabled('project') ? '1' : '0'), 'pr.title' => array('label' => "ProjectLabel", 'checked' => '0', 'enabled' => \isModEnabled('project') ? '1' : '0'), 's.nom' => array('label' => "ThirdParty", 'checked' => '1'), 's.name_alias' => array('label' => "AliasNameShort", 'checked' => '-1'), 's.town' => array('label' => "Town", 'checked' => '-1'), 's.zip' => array('label' => "Zip", 'checked' => '-1'), 'state.nom' => array('label' => "StateShort", 'checked' => '0'), 'country.code_iso' => array('label' => "Country", 'checked' => '0'), 'typent.code' => array('label' => "ThirdPartyType", 'checked' => (string) $checkedtypetiers), 'p.date' => array('label' => "DatePropal", 'checked' => '1'), 'p.fin_validite' => array('label' => "DateEnd", 'checked' => '1'), 'p.date_livraison' => array('label' => "DeliveryDate", 'checked' => '0'), 'p.date_signature' => array('label' => "DateSigning", 'checked' => '0'), 'ava.rowid' => array('label' => "AvailabilityPeriod", 'checked' => '0'), 'p.fk_shipping_method' => array('label' => "SendingMethod", 'checked' => '0', 'enabled' => (string) (int) \isModEnabled("shipping")), 'p.fk_input_reason' => array('label' => "Origin", 'checked' => '0', 'enabled' => '1'), 'p.fk_cond_reglement' => array('label' => "PaymentConditionsShort", 'checked' => '0'), 'p.fk_mode_reglement' => array('label' => "PaymentMode", 'checked' => '0'), 'p.total_ht' => array('label' => "AmountHT", 'checked' => '1'), 'p.total_tva' => array('label' => "AmountVAT", 'checked' => '0'), 'p.total_ttc' => array('label' => "AmountTTC", 'checked' => '0'), 'p.total_ht_invoiced' => array('label' => "AmountInvoicedHT", 'checked' => '0', 'enabled' => \getDolGlobalString('PROPOSAL_SHOW_INVOICED_AMOUNT')), 'p.total_invoiced' => array('label' => "AmountInvoicedTTC", 'checked' => '0', 'enabled' => \getDolGlobalString('PROPOSAL_SHOW_INVOICED_AMOUNT')), 'p.multicurrency_code' => array('label' => 'Currency', 'checked' => '0', 'enabled' => !\isModEnabled("multicurrency") ? '0' : '1'), 'p.multicurrency_tx' => array('label' => 'CurrencyRate', 'checked' => '0', 'enabled' => !\isModEnabled("multicurrency") ? '0' : '1'), 'p.multicurrency_total_ht' => array('label' => 'MulticurrencyAmountHT', 'checked' => '0', 'enabled' => !\isModEnabled("multicurrency") ? '0' : '1'), 'p.multicurrency_total_tva' => array('label' => 'MulticurrencyAmountVAT', 'checked' => '0', 'enabled' => !\isModEnabled("multicurrency") ? '0' : '1'), 'p.multicurrency_total_ttc' => array('label' => 'MulticurrencyAmountTTC', 'checked' => '0', 'enabled' => !\isModEnabled("multicurrency") ? '0' : '1'), 'p.multicurrency_total_ht_invoiced' => array('label' => 'MulticurrencyAmountInvoicedHT', 'checked' => '0', 'enabled' => (string) (int) (\isModEnabled("multicurrency") && \getDolGlobalString('PROPOSAL_SHOW_INVOICED_AMOUNT'))), 'p.multicurrency_total_invoiced' => array('label' => 'MulticurrencyAmountInvoicedTTC', 'checked' => '0', 'enabled' => (string) (int) (\isModEnabled("multicurrency") && \getDolGlobalString('PROPOSAL_SHOW_INVOICED_AMOUNT'))), 'u.login' => array('label' => "Author", 'checked' => '1', 'position' => 10), 'sale_representative' => array('label' => "SaleRepresentativesOfThirdParty", 'checked' => '-1'), 'total_pa' => array('label' => \getDolGlobalString('MARGIN_TYPE') == '1' ? 'BuyingPrice' : 'CostPrice', 'checked' => '0', 'position' => 300, 'enabled' => !\isModEnabled('margin') || !$user->hasRight('margins', 'liretous') ? '0' : '1'), 'total_margin' => array('label' => 'Margin', 'checked' => '0', 'position' => 301, 'enabled' => !\isModEnabled('margin') || !$user->hasRight('margins', 'liretous') ? '0' : '1'), 'total_margin_rate' => array('label' => 'MarginRate', 'checked' => '0', 'position' => 302, 'enabled' => !\isModEnabled('margin') || !$user->hasRight('margins', 'liretous') || !\getDolGlobalString('DISPLAY_MARGIN_RATES') ? '0' : '1'), 'total_mark_rate' => array('label' => 'MarkRate', 'checked' => '0', 'position' => 303, 'enabled' => !\isModEnabled('margin') || !$user->hasRight('margins', 'liretous') || !\getDolGlobalString('DISPLAY_MARK_RATES') ? '0' : '1'), 'p.datec' => array('label' => "DateCreation", 'checked' => '0', 'position' => 500), 'p.tms' => array('label' => "DateModificationShort", 'checked' => '0', 'position' => 500), 'p.date_cloture' => array('label' => "DateClosing", 'checked' => '0', 'position' => 500), 'p.note_public' => array('label' => 'NotePublic', 'checked' => '0', 'position' => 510, 'enabled' => (string) (!\getDolGlobalInt('MAIN_LIST_HIDE_PUBLIC_NOTES'))), 'p.note_private' => array('label' => 'NotePrivate', 'checked' => '0', 'position' => 511, 'enabled' => (string) (!\getDolGlobalInt('MAIN_LIST_HIDE_PRIVATE_NOTES'))), 'p.import_key' => array('type' => 'varchar(14)', 'label' => 'ImportId', 'enabled' => '1', 'visible' => -2, 'position' => 999), 'p.fk_statut' => array('label' => "Status", 'checked' => '1', 'position' => 1000));
// Permissions
$permissiontoread = $user->hasRight('propal', 'lire');
$permissiontoadd = $user->hasRight('propal', 'creer');
$permissiontodelete = $user->hasRight('propal', 'supprimer');
/*
 * Actions
 */
$error = 0;
$objectclass = \null;
$search_code_client = '';
$parameters = array('socid' => $socid, 'arrayfields' => &$arrayfields);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
// Mass actions
$objectclass = 'Propal';
$objectlabel = 'Proposals';
$uploaddir = $conf->propal->multidir_output[$conf->entity];
$objecttmp = new $objectclass($db);
$nbok = 0;
/*
 * View
 */
$now = \dol_now();
$form = new \Form($db);
$formother = new \FormOther($db);
$formfile = new \FormFile($db);
$formpropal = new \FormPropal($db);
$formmargin = \null;
$companystatic = new \Societe($db);
$projectstatic = new \Project($db);
$formcompany = new \FormCompany($db);
$userstatic = new \User($db);
$varpage = empty($contextpage) ? $_SERVER["PHP_SELF"] : $contextpage;
$selectedfields = $form->multiSelectArrayWithCheckbox('selectedfields', $arrayfields, $varpage);
// This also change content of $arrayfields
$sql = 'SELECT';
// Add fields from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListSelect', $parameters, $object, $action);
$sql = \preg_replace('/, $/', '', $sql);
$sqlfields = $sql;
// Add table from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListFrom', $parameters, $object);
$societe_add_ref_in_list = \getDolGlobalInt('SOCIETE_ADD_REF_IN_LIST');
// Prepare the $sqltoadd for fields pd.* that need a test by doing a "or exits"
$sqltoadd = '';
$fieldstosearchallwithoutpd = array();
$fieldstosearchallwithpd = array();
// Search on user
$param = '';
$searchCategoryPropalSqlList = array();
$listofcategoryid = '';
// Search for tag/category ($searchCategoryCustomerList is an array of ID)
$searchCategoryCustomerOperator = \GETPOSTINT('search_category_customer_operator');
$searchCategoryCustomerList = $search_categ_cus !== '-1' ? \explode(',', (string) $search_categ_cus) : array();
$searchCategoryCustomerSqlList = array();
$listofcategoryid = '';
// Search for tag/category ($searchCategoryProductList is an array of ID)
$searchCategoryProductOperator = \GETPOSTINT('search_category_product_operator');
$searchCategoryProductList = array($search_product_category);
$searchCategoryProductSqlList = array();
$listofcategoryid = '';
//print $sql;
// Add where from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListWhere', $parameters, $object, $action);
// Add HAVING from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListHaving', $parameters, $object, $action);
// Count total nb of records
$nbtotalofrecords = '';
/* The fast and low memory method to get and count full list converts the sql into a sql count */
$sqlforcount = \preg_replace('/^' . \preg_quote($sqlfields, '/') . '/', 'SELECT COUNT(*) as nbtotalofrecords', $sql);
$sqlforcount = \preg_replace('/GROUP BY .*$/', '', $sqlforcount);
$resql = $db->query($sqlforcount);
$resql = $db->query($sql);
$soc = new \Societe($db);
$title = $langs->trans('Proposals') . ' - ' . $soc->name;
$num = $db->num_rows($resql);
$arrayofselected = \is_array($toselect) ? $toselect : array();
$help_url = 'EN:Commercial_Proposals|FR:Proposition_commerciale|ES:Presupuestos';
$param = '&search_status=' . \urlencode($search_status);
// Add $param from hooks
$parameters = array('param' => &$param);
$reshook = $hookmanager->executeHooks('printFieldListSearchParam', $parameters, $object, $action);
// List of mass actions available
$arrayofmassactions = array('generate_doc' => \img_picto('', 'pdf', 'class="pictofixedwidth"') . $langs->trans("ReGeneratePDF"), 'builddoc' => \img_picto('', 'pdf', 'class="pictofixedwidth"') . $langs->trans("PDFMerge"));
$massactionbutton = $form->selectMassAction('', $arrayofmassactions);
$url = \DOL_URL_ROOT . '/comm/propal/card.php?action=create';
$newcardbutton = '';
$topicmail = "SendPropalRef";
$modelmail = "propal_send";
$objecttmp = new \Propal($db);
$trackid = 'pro' . $object->id;
$i = 0;
$moreforfilter = '';
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldPreListTitle', $parameters, $object, $action);
$varpage = empty($contextpage) ? $_SERVER["PHP_SELF"] : $contextpage;
$selectedfields = $form->multiSelectArrayWithCheckbox('selectedfields', $arrayfields, $varpage, \getDolGlobalString('MAIN_CHECKBOX_LEFT_COLUMN'));
// Fields from hook
$parameters = array('arrayfields' => $arrayfields);
$reshook = $hookmanager->executeHooks('printFieldListOption', $parameters, $object, $action);
$totalarray = array('nbfield' => 0, 'val' => array('p.total_ht' => 0, 'p.total_tva' => 0, 'p.total_ttc' => 0));
// Hook fields
$parameters = array('arrayfields' => $arrayfields, 'param' => $param, 'sortfield' => $sortfield, 'sortorder' => $sortorder, 'totalarray' => &$totalarray);
$reshook = $hookmanager->executeHooks('printFieldListTitle', $parameters, $object, $action);
// Loop on record
// --------------------------------------------------------------------
$typenArray = \null;
$now = \dol_now();
$with_margin_info = \false;
$total_ht = 0;
$total_margin = 0;
$i = 0;
$savnbfield = $totalarray['nbfield'];
$totalarray = array();
$imaxinloop = $limit ? \min($num, $limit) : $num;
$parameters = array('arrayfields' => $arrayfields, 'sql' => $sql);
$reshook = $hookmanager->executeHooks('printFieldListFooter', $parameters, $object, $action);
$hidegeneratedfilelistifempty = 1;
$formfile = new \FormFile($db);
// Show list of available documents
$urlsource = $_SERVER['PHP_SELF'] . '?sortfield=' . $sortfield . '&sortorder=' . $sortorder;
$filedir = $diroutputmassaction;
$genallowed = $permissiontoread;
$delallowed = $permissiontoadd;