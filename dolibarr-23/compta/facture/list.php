<?php

$search_all = \trim(\GETPOST('search_all', 'alphanohtml'));
// Get Parameters
$action = \GETPOST('action', 'aZ09');
$massaction = \GETPOST('massaction', 'alpha');
$show_files = \GETPOSTINT('show_files');
$confirm = \GETPOST('confirm', 'alpha');
$toselect = \GETPOST('toselect', 'array:int');
$optioncss = \GETPOST('optioncss', 'alpha');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'invoicelist';
$mode = \GETPOST('mode', 'aZ');
$id = \GETPOSTINT('id') ? \GETPOSTINT('id') : \GETPOSTINT('facid');
// For backward compatibility
$ref = \GETPOST('ref', 'alpha');
$socid = \GETPOSTINT('socid');
$userid = \GETPOSTINT('userid');
$search_ref = \GETPOST('sf_ref') ? \GETPOST('sf_ref', 'alpha') : \GETPOST('search_ref', 'alpha');
$search_refcustomer = \GETPOST('search_refcustomer', 'alpha');
$search_type = \GETPOST('search_type', 'intcomma');
$search_subtype = \GETPOST('search_subtype', 'intcomma');
$search_project_ref = \GETPOST('search_project_ref', 'alpha');
$search_project = \GETPOST('search_project', 'alpha');
$search_company = \GETPOST('search_company', 'alpha');
$search_company_alias = \GETPOST('search_company_alias', 'alpha');
$search_parent_name = \trim(\GETPOST('search_parent_name', 'alphanohtml'));
$search_montant_ht = \GETPOST('search_montant_ht', 'alpha');
$search_montant_vat = \GETPOST('search_montant_vat', 'alpha');
$search_montant_localtax1 = \GETPOST('search_montant_localtax1', 'alpha');
$search_montant_localtax2 = \GETPOST('search_montant_localtax2', 'alpha');
$search_montant_ttc = \GETPOST('search_montant_ttc', 'alpha');
$search_login = \GETPOST('search_login', 'alpha');
$search_multicurrency_code = \GETPOST('search_multicurrency_code', 'alpha');
$search_multicurrency_tx = \GETPOST('search_multicurrency_tx', 'alpha');
$search_multicurrency_montant_ht = \GETPOST('search_multicurrency_montant_ht', 'alpha');
$search_multicurrency_montant_vat = \GETPOST('search_multicurrency_montant_vat', 'alpha');
$search_multicurrency_montant_ttc = \GETPOST('search_multicurrency_montant_ttc', 'alpha');
$search_dispute_status = \GETPOST('search_dispute_status', 'intcomma');
$search_status = \GETPOST('search_status', 'intcomma');
$search_paymentmode = \GETPOST('search_paymentmode', 'intcomma');
$search_paymentterms = \GETPOST('search_paymentterms', 'intcomma');
$search_fk_input_reason = \GETPOSTINT('search_fk_input_reason');
$search_module_source = \GETPOST('search_module_source', 'alpha');
$search_pos_source = \GETPOST('search_pos_source', 'alpha');
$search_town = \GETPOST('search_town', 'alpha');
$search_zip = \GETPOST('search_zip', 'alpha');
$search_state = \GETPOST("search_state");
$search_country = \GETPOST("search_country", 'aZ09');
$search_customer_code = \GETPOST("search_customer_code", 'alphanohtml');
$search_type_thirdparty = \GETPOST("search_type_thirdparty", 'intcomma');
$search_user = \GETPOST('search_user', 'intcomma');
$search_sale = \GETPOST('search_sale', 'intcomma');
$search_date_startday = \GETPOSTINT('search_date_startday');
$search_date_startmonth = \GETPOSTINT('search_date_startmonth');
$search_date_startyear = \GETPOSTINT('search_date_startyear');
$search_date_endday = \GETPOSTINT('search_date_endday');
$search_date_endmonth = \GETPOSTINT('search_date_endmonth');
$search_date_endyear = \GETPOSTINT('search_date_endyear');
$search_date_start = \GETPOSTDATE('search_date_start', 'getpost');
// Use tzserver because date invoice is a date without hour
$search_date_end = \GETPOSTDATE('search_date_end', 'getpostend');
$search_date_valid_startday = \GETPOSTINT('search_date_valid_startday');
$search_date_valid_startmonth = \GETPOSTINT('search_date_valid_startmonth');
$search_date_valid_startyear = \GETPOSTINT('search_date_valid_startyear');
$search_date_valid_endday = \GETPOSTINT('search_date_valid_endday');
$search_date_valid_endmonth = \GETPOSTINT('search_date_valid_endmonth');
$search_date_valid_endyear = \GETPOSTINT('search_date_valid_endyear');
$search_date_valid_start = \GETPOSTDATE('search_date_valid_start', 'getpost');
$search_date_valid_end = \GETPOSTDATE('search_date_valid_end', 'getpostend');
$search_note_private = \GETPOST('search_note_private', 'alpha');
$search_note_public = \GETPOST('search_note_public', 'alpha');
$search_datelimit_startday = \GETPOSTINT('search_datelimit_startday');
$search_datelimit_startmonth = \GETPOSTINT('search_datelimit_startmonth');
$search_datelimit_startyear = \GETPOSTINT('search_datelimit_startyear');
$search_datelimit_endday = \GETPOSTINT('search_datelimit_endday');
$search_datelimit_endmonth = \GETPOSTINT('search_datelimit_endmonth');
$search_datelimit_endyear = \GETPOSTINT('search_datelimit_endyear');
$search_datelimit_start = \GETPOSTDATE('search_datelimit_start', 'getpost');
// Use tzserver because date invoice is a date without hour
$search_datelimit_end = \GETPOSTDATE('search_datelimit_end', 'getpostend');
$search_datec_start = \GETPOSTDATE('search_datec_start', 'getpost', 'tzuserrel');
$search_datec_end = \GETPOSTDATE('search_datec_end', 'getpostend', 'tzuserrel');
$search_datem_start = \GETPOSTDATE('search_datem_start', 'getpost', 'tzuserrel');
$search_datem_end = \GETPOSTDATE('search_datem_end', 'getpostend', 'tzuserrel');
$search_categ_cus = \GETPOST("search_categ_cus", 'intcomma');
$searchCategoryInvoiceOperator = 0;
$searchCategoryInvoiceList = \GETPOST('search_category_invoice_list', 'array:int');
// to dump type seen by phpstan during analyse
// \PHPStan\dumpType($searchCategoryInvoiceList);
$search_product_category = \GETPOST('search_product_category', 'intcomma');
$search_fac_rec_source_title = \GETPOST("search_fac_rec_source_title", 'alpha');
$search_fk_fac_rec_source = \GETPOST('search_fk_fac_rec_source', 'int');
$search_import_key = \trim(\GETPOST("search_import_key", "alpha"));
$search_option = \GETPOST('search_option');
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$diroutputmassaction = $conf->invoice->dir_output . '/temp/massgeneration/' . $user->id;
$now = \dol_now();
$error = 0;
// Initialize a technical object to manage hooks of page. Note that conf->hooks_modules contains an array of hook context
$object = new \Facture($db);
$extrafields = new \ExtraFields($db);
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_') ?: [];
// List of fields to search into when doing a "search in all"
$fieldstosearchall = array('f.ref' => 'Ref', 'f.ref_client' => 'RefCustomer', 'f.note_public' => 'NotePublic', 's.nom' => "ThirdParty", 's.code_client' => "CustomerCodeShort", 's.name_alias' => "AliasNameShort", 's.zip' => "Zip", 's.town' => "Town", 'pd.description' => 'ProductDescription');
// Show POS fields if cashdesk or takepos module enabled or if global configuration to show POS fields on order list is enabled
$showpos = \isModEnabled('cashdesk') || \isModEnabled('takepos') || \getDolGlobalInt('INVOICE_SHOW_POS') ? '1' : '0';
$checkedtypetiers = '0';
$arrayfields = array(
    'f.ref' => array('label' => "Ref", 'checked' => '1', 'position' => 5),
    'f.ref_client' => array('label' => "RefCustomer", 'checked' => '-1', 'position' => 10),
    'f.type' => array('label' => "Type", 'checked' => '0', 'position' => 15),
    'f.subtype' => array('label' => "InvoiceSubtype", 'checked' => '0', 'position' => 17),
    'f.datef' => array('label' => "DateInvoice", 'checked' => '1', 'position' => 20),
    'f.date_valid' => array('label' => "DateValidation", 'checked' => '0', 'position' => 22),
    'f.date_lim_reglement' => array('label' => "DateDue", 'checked' => '1', 'position' => 25),
    'f.date_closing' => array('label' => "DateClosing", 'checked' => '0', 'position' => 30),
    'p.ref' => array('label' => "ProjectRef", 'langfile' => 'projects', 'checked' => '1', 'enabled' => \isModEnabled('project') ? '1' : '0', 'position' => 40),
    'p.title' => array('label' => "ProjectLabel", 'langfile' => 'projects', 'checked' => '0', 'enabled' => \isModEnabled('project') ? '1' : '0', 'position' => 41),
    's.nom' => array('label' => "ThirdParty", 'checked' => '1', 'position' => 50),
    's.name_alias' => array('label' => "AliasNameShort", 'checked' => '-1', 'position' => 51),
    's.code_client' => array('label' => "CustomerCodeShort", 'checked' => '-1', 'position' => 52),
    's2.nom' => array('label' => 'ParentCompany', 'position' => 32, 'checked' => '0'),
    's.town' => array('label' => "Town", 'checked' => '-1', 'position' => 55),
    's.zip' => array('label' => "Zip", 'checked' => '-1', 'position' => 60),
    'state.nom' => array('label' => "StateShort", 'checked' => '0', 'position' => 65),
    'country.code_iso' => array('label' => "Country", 'checked' => '0', 'position' => 70),
    'typent.code' => array('label' => "ThirdPartyType", 'checked' => $checkedtypetiers, 'position' => 75),
    'f.fk_mode_reglement' => array('label' => "PaymentMode", 'checked' => '1', 'position' => 80),
    'f.fk_cond_reglement' => array('label' => "PaymentConditionsShort", 'checked' => '0', 'position' => 85),
    'f.fk_input_reason' => array('label' => "Source", 'checked' => 0, 'enabled' => 1, 'position' => 88),
    'f.module_source' => array('label' => "POSModule", 'langfile' => 'cashdesk', 'checked' => $contextpage == 'poslist' ? '1' : '0', 'enabled' => $showpos, 'position' => 90),
    'f.pos_source' => array('label' => "POSTerminal", 'langfile' => 'cashdesk', 'checked' => $contextpage == 'poslist' ? '1' : '0', 'enabled' => $showpos, 'position' => 91),
    'f.total_ht' => array('label' => "AmountHT", 'checked' => '1', 'position' => 95),
    'f.total_tva' => array('label' => "AmountVAT", 'checked' => '0', 'position' => 100),
    'f.total_localtax1' => array('label' => $langs->transcountry("AmountLT1", $mysoc->country_code), 'checked' => '0', 'enabled' => $mysoc->localtax1_assuj == "1", 'position' => 110),
    'f.total_localtax2' => array('label' => $langs->transcountry("AmountLT2", $mysoc->country_code), 'checked' => '0', 'enabled' => $mysoc->localtax2_assuj == "1", 'position' => 120),
    'f.total_ttc' => array('label' => "AmountTTC", 'checked' => '0', 'position' => 130),
    'dynamount_payed' => array('label' => "AlreadyPaid", 'checked' => '0', 'position' => 140),
    'rtp' => array('label' => "RemainderToPay", 'checked' => '0', 'position' => 150),
    // Not enabled by default because slow
    'f.multicurrency_code' => array('label' => 'Currency', 'checked' => '0', 'enabled' => !\isModEnabled('multicurrency') ? '0' : '1', 'position' => 280),
    'f.multicurrency_tx' => array('label' => 'CurrencyRate', 'checked' => '0', 'enabled' => !\isModEnabled('multicurrency') ? '0' : '1', 'position' => 285),
    'f.multicurrency_total_ht' => array('label' => 'MulticurrencyAmountHT', 'checked' => '0', 'enabled' => !\isModEnabled('multicurrency') ? '0' : '1', 'position' => 290),
    'f.multicurrency_total_vat' => array('label' => 'MulticurrencyAmountVAT', 'checked' => '0', 'enabled' => !\isModEnabled('multicurrency') ? '0' : '1', 'position' => 291),
    'f.multicurrency_total_ttc' => array('label' => 'MulticurrencyAmountTTC', 'checked' => '0', 'enabled' => !\isModEnabled('multicurrency') ? '0' : '1', 'position' => 292),
    'multicurrency_dynamount_payed' => array('label' => 'MulticurrencyAlreadyPaid', 'checked' => '0', 'enabled' => !\isModEnabled('multicurrency') ? '0' : '1', 'position' => 295),
    'multicurrency_rtp' => array('label' => 'MulticurrencyRemainderToPay', 'checked' => '0', 'enabled' => !\isModEnabled('multicurrency') ? '0' : '1', 'position' => 296),
    // Not enabled by default because slow
    'total_pa' => array('label' => \getDolGlobalString('MARGIN_TYPE') == '1' ? 'BuyingPrice' : 'CostPrice', 'checked' => '0', 'position' => 300, 'enabled' => !\isModEnabled('margin') || !$user->hasRight('margins', 'liretous') ? '0' : '1'),
    'total_margin' => array('label' => 'Margin', 'langfile' => 'margins', 'checked' => '0', 'position' => 301, 'enabled' => !\isModEnabled('margin') || !$user->hasRight('margins', 'liretous') ? '0' : '1'),
    'total_margin_rate' => array('label' => 'MarginRate', 'langfile' => 'margins', 'checked' => '0', 'position' => 302, 'enabled' => !\isModEnabled('margin') || !$user->hasRight('margins', 'liretous') || !\getDolGlobalString('DISPLAY_MARGIN_RATES') ? '0' : '1'),
    'total_mark_rate' => array('label' => 'MarkRate', 'langfile' => 'margins', 'checked' => '0', 'position' => 303, 'enabled' => !\isModEnabled('margin') || !$user->hasRight('margins', 'liretous') || !\getDolGlobalString('DISPLAY_MARK_RATES') ? '0' : '1'),
    'f.datec' => array('label' => "DateCreation", 'checked' => '0', 'position' => 500),
    'f.tms' => array('type' => 'timestamp', 'label' => 'DateModificationShort', 'enabled' => '1', 'visible' => -1, 'notnull' => 1, 'position' => 502),
    'u.login' => array('label' => "UserAuthor", 'checked' => '0', 'visible' => -1, 'position' => 504),
    'sale_representative' => array('label' => "SaleRepresentativesOfThirdParty", 'checked' => '0', 'position' => 506),
    //'f.fk_user_author' =>array('type'=>'integer:User:user/class/user.class.php', 'label'=>'UserAuthor', 'enabled'=>1, 'visible'=>-1, 'position'=>506),
    //'f.fk_user_modif' =>array('type'=>'integer:User:user/class/user.class.php', 'label'=>'UserModif', 'enabled'=>1, 'visible'=>-1, 'notnull'=>-1, 'position'=>508),
    //'f.fk_user_valid' =>array('type'=>'integer:User:user/class/user.class.php', 'label'=>'UserValidation', 'enabled'=>1, 'visible'=>-1, 'position'=>510),
    //'f.fk_user_closing' =>array('type'=>'integer:User:user/class/user.class.php', 'label'=>'UserClosing', 'enabled'=>1, 'visible'=>-1, 'position'=>512),
    'f.note_public' => array('label' => 'NotePublic', 'checked' => '0', 'position' => 520, 'enabled' => !\getDolGlobalInt('MAIN_LIST_HIDE_PUBLIC_NOTES')),
    'f.note_private' => array('label' => 'NotePrivate', 'checked' => '0', 'position' => 521, 'enabled' => !\getDolGlobalInt('MAIN_LIST_HIDE_PRIVATE_NOTES')),
    'f.fk_fac_rec_source' => array('label' => 'GeneratedFromTemplate', 'checked' => '0', 'position' => 530, 'enabled' => '1'),
    'f.import_key' => array('type' => 'varchar(14)', 'label' => 'ImportId', 'enabled' => '1', 'visible' => -2, 'position' => 990),
    'f.dispute_status' => array('label' => "DisputeStatus", 'checked' => '-1', 'position' => 999),
    'f.fk_statut' => array('label' => "Status", 'checked' => '1', 'position' => 1000),
);
$subtypearray = $object->getArrayOfInvoiceSubtypes(0);
$arrayfields = \dol_sort_array($arrayfields, 'position');
// Security check
$fieldid = !empty($ref) ? 'ref' : 'rowid';
$result = \restrictedArea($user, 'facture', $id, '', '', 'fk_soc', $fieldid);
$parameters = array('socid' => $socid, 'arrayfields' => &$arrayfields);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$arrayofselected = \is_array($toselect) ? $toselect : array();
/*
 * View
 */
$form = new \Form($db);
$formother = new \FormOther($db);
$formfile = new \FormFile($db);
$formmargin = new \FormMargin($db);
$facturestatic = new \Facture($db);
$formcompany = new \FormCompany($db);
$companystatic = new \Societe($db);
$companyparent = new \Societe($db);
$company_url_list = array();
$soc = new \Societe($db);
$title = $langs->trans('BillsCustomers') . ' ' . ($socid > 0 && $soc !== \null ? ' - ' . $soc->name : '');
$help_url = 'EN:Customers_Invoices|FR:Factures_Clients|ES:Facturas_a_clientes';
$varpage = empty($contextpage) ? $_SERVER["PHP_SELF"] : $contextpage;
$selectedfields = $form->multiSelectArrayWithCheckbox('selectedfields', $arrayfields, $varpage);
// This also change content of $arrayfields
// Build and execute select
// --------------------------------------------------------------------
$sql = 'SELECT';
// Add fields from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListSelect', $parameters, $object, $action);
$sql = \preg_replace('/,\\s*$/', '', $sql);
$sqlfields = $sql;
$hasAnotherfilter = \false;
// Add table from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListFrom', $parameters, $object, $action);
$arrayofcode = \getCountriesInEEC();
$country_code_in_EEC = $country_code_in_EEC_without_me = '';
$searchCategoryInvoiceSqlList = array();
$listofcategoryid = '';
// Search for tag/category ($searchCategoryProductList is an array of ID)
$searchCategoryProductList = $search_product_category ? array($search_product_category) : array();
$searchCategoryProductOperator = 0;
$searchCategoryProductSqlList = array();
$listofcategoryid = '';
$searchCategoryCustomerList = $search_categ_cus ? array($search_categ_cus) : array();
$searchCategoryCustomerOperator = 0;
$searchCategoryCustomerSqlList = array();
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
// Add $param from hooks
$parameters = array('param' => &$param);
$reshook = $hookmanager->executeHooks('printFieldListSearchParam', $parameters, $object, $action);
$arrayofmassactions = array('validate' => \img_picto('', 'check', 'class="pictofixedwidth"') . $langs->trans("Validate"), 'generate_doc' => \img_picto('', 'pdf', 'class="pictofixedwidth"') . $langs->trans("ReGeneratePDF"), 'builddoc' => \img_picto('', 'pdf', 'class="pictofixedwidth"') . $langs->trans("PDFMerge"), 'presend' => \img_picto('', 'email', 'class="pictofixedwidth"') . $langs->trans("SendByMail"));
$massactionbutton = $form->selectMassAction('', $arrayofmassactions);
// Show the new button only when this page is not opened from the Extended POS
$newcardbutton = '';
$url = \DOL_URL_ROOT . '/compta/facture/card.php?action=create';
$newcardbutton = '';
// Lines of title fields
$i = 0;
$topicmail = "SendBillRef";
$modelmail = "facture_send";
$objecttmp = new \Facture($db);
$trackid = 'inv' . $object->id;
// If the user can view prospects other than his'
$moreforfilter = '';
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldPreListTitle', $parameters, $object, $action);
$varpage = empty($contextpage) ? $_SERVER["PHP_SELF"] : $contextpage;
$selectedfields = $form->multiSelectArrayWithCheckbox('selectedfields', $arrayfields, $varpage, \getDolGlobalString('MAIN_CHECKBOX_LEFT_COLUMN'));
$listtype = array(\Facture::TYPE_STANDARD => $langs->trans("InvoiceStandard"), \Facture::TYPE_DEPOSIT => $langs->trans("InvoiceDeposit"), \Facture::TYPE_CREDIT_NOTE => $langs->trans("InvoiceAvoir"), \Facture::TYPE_REPLACEMENT => $langs->trans("InvoiceReplacement"));
// Fields from hook
$parameters = array('arrayfields' => $arrayfields);
$reshook = $hookmanager->executeHooks('printFieldListOption', $parameters, $object, $action);
$totalarray = array();
// Hook fields
$parameters = array('arrayfields' => $arrayfields, 'param' => $param, 'sortfield' => $sortfield, 'sortorder' => $sortorder, 'totalarray' => &$totalarray);
$reshook = $hookmanager->executeHooks('printFieldListTitle', $parameters, $object, $action);
$projectstatic = new \Project($db);
$discount = new \DiscountAbsolute($db);
$userstatic = new \User($db);
$i = 0;
$savnbfield = $totalarray['nbfield'];
$totalarray = array();
$typenArray = $formcompany->typent_array(1);
$with_margin_info = \false;
$total_ht = 0;
$total_margin = 0;
$imaxinloop = $limit ? \min($num, $limit) : $num;
$parameters = array('arrayfields' => $arrayfields, 'sql' => $sql);
$reshook = $hookmanager->executeHooks('printFieldListFooter', $parameters, $object, $action);
$hidegeneratedfilelistifempty = 1;
// Show list of available documents
$urlsource = $_SERVER['PHP_SELF'] . '?sortfield=' . $sortfield . '&sortorder=' . $sortorder;
$filedir = $diroutputmassaction;
$genallowed = $user->hasRight("facture", "lire");
$delallowed = $user->hasRight("facture", "creer");
$title = '';