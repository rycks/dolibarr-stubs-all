<?php

$action = \GETPOST('action', 'aZ09');
$massaction = \GETPOST('massaction', 'alpha');
$show_files = \GETPOSTINT('show_files');
$confirm = \GETPOST('confirm', 'alpha');
$toselect = \GETPOST('toselect', 'array:int');
$optioncss = \GETPOST('optioncss', 'alpha');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'supplierinvoicelist';
$mode = \GETPOST('mode', 'aZ');
// The output mode ('list', 'kanban', 'hierarchy', 'calendar', ...)
$search_all = \trim(\GETPOST('search_all', 'alphanohtml'));
$search_label = \GETPOST("search_label", "alpha");
$search_amount_no_tax = \GETPOST("search_amount_no_tax", "alpha");
$search_amount_all_tax = \GETPOST("search_amount_all_tax", "alpha");
$search_ref = \GETPOST('sf_ref') ? \GETPOST('sf_ref', 'alpha') : \GETPOST('search_ref', 'alpha');
$search_refsupplier = \GETPOST('search_refsupplier', 'alpha');
$search_type = \GETPOST('search_type', 'intcomma');
$search_subtype = \GETPOST('search_subtype', 'intcomma');
$search_project = \GETPOST('search_project', 'alpha');
$search_company = \GETPOST('search_company', 'alpha');
$search_company_alias = \GETPOST('search_company_alias', 'alpha');
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
$search_status = \GETPOST('search_status', 'intcomma');
// Can be '' or a numeric
$search_paymentmode = \GETPOST('search_paymentmode', 'intcomma');
$search_paymentcond = \GETPOST('search_paymentcond') ? \GETPOSTINT('search_paymentcond') : '';
$search_vat_reverse_charge = \GETPOST('search_vat_reverse_charge', 'alpha');
$search_town = \GETPOST('search_town', 'alpha');
$search_zip = \GETPOST('search_zip', 'alpha');
$search_state = \GETPOST("search_state");
$search_note_private = \GETPOST('search_note_private', 'alpha');
$search_note_public = \GETPOST('search_note_public', 'alpha');
$search_country = \GETPOST("search_country", 'aZ09');
$search_type_thirdparty = \GETPOST("search_type_thirdparty", 'intcomma');
$search_user = \GETPOST('search_user', 'intcomma');
$search_sale = \GETPOST('search_sale', 'intcomma');
$search_date_start = \GETPOSTDATE('search_date_start', '', 'tzserver');
$search_date_end = \GETPOSTDATE('search_date_end', '23:59:59', 'tzserver');
$search_datelimit_startday = \GETPOSTINT('search_datelimit_startday');
$search_datelimit_startmonth = \GETPOSTINT('search_datelimit_startmonth');
$search_datelimit_startyear = \GETPOSTINT('search_datelimit_startyear');
$search_datelimit_endday = \GETPOSTINT('search_datelimit_endday');
$search_datelimit_endmonth = \GETPOSTINT('search_datelimit_endmonth');
$search_datelimit_endyear = \GETPOSTINT('search_datelimit_endyear');
$search_datelimit_start = \dol_mktime(0, 0, 0, $search_datelimit_startmonth, $search_datelimit_startday, $search_datelimit_startyear);
$search_datelimit_end = \dol_mktime(23, 59, 59, $search_datelimit_endmonth, $search_datelimit_endday, $search_datelimit_endyear);
$search_categ_sup = \GETPOST("search_categ_sup", 'intcomma');
$searchCategorySupplierInvoiceList = \GETPOST('search_category_supplier_invoice_list', 'array:int');
$searchCategorySupplierInvoiceOperator = 0;
$search_product_category = \GETPOST('search_product_category', 'intcomma');
$search_fk_fac_rec_source = \GETPOST('search_fk_fac_rec_source', 'int');
$option = \GETPOST('search_option');
$filter = \GETPOST('filtre', 'alpha');
// Load variable for pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$socid = \GETPOSTINT('socid');
$diroutputmassaction = $conf->fournisseur->facture->dir_output . '/temp/massgeneration/' . $user->id;
$now = \dol_now();
// Initialize a technical object to manage hooks of page. Note that conf->hooks_modules contains an array of hook context
$object = new \FactureFournisseur($db);
$extrafields = new \ExtraFields($db);
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
// List of fields to search into when doing a "search in all"
$fieldstosearchall = array('f.ref' => 'Ref', 'f.ref_supplier' => 'RefSupplier', 'f.note_public' => 'NotePublic', 's.nom' => "ThirdParty", 's.code_fournisseur' => "SupplierCodeShort", 'pd.description' => 'Description');
$checkedtypetiers = '0';
$arrayfields = array(
    'f.ref' => array('label' => "Ref", 'checked' => '1', 'position' => 5),
    'f.ref_supplier' => array('label' => "RefSupplier", 'checked' => '1', 'position' => 7),
    'f.type' => array('label' => "Type", 'checked' => '0', 'position' => 15),
    'f.subtype' => array('label' => "InvoiceSubtype", 'checked' => '0', 'position' => 17),
    'f.label' => array('label' => "Label", 'checked' => '0', 'position' => 20),
    'f.datef' => array('label' => "DateInvoice", 'checked' => '1', 'position' => 25),
    'f.date_lim_reglement' => array('label' => "DateDue", 'checked' => '1', 'position' => 27),
    'p.ref' => array('label' => "ProjectRef", 'checked' => '1', 'position' => 30, 'enabled' => \isModEnabled('project') ? '1' : '0'),
    's.nom' => array('label' => "ThirdParty", 'checked' => '1', 'position' => 41),
    's.name_alias' => array('label' => "AliasNameShort", 'checked' => '0', 'position' => 42),
    's.town' => array('label' => "Town", 'checked' => '-1', 'position' => 43),
    's.zip' => array('label' => "Zip", 'checked' => '-1', 'position' => 44),
    'state.nom' => array('label' => "StateShort", 'checked' => '0', 'position' => 45),
    'country.code_iso' => array('label' => "Country", 'checked' => '0', 'position' => 46),
    'typent.code' => array('label' => "ThirdPartyType", 'checked' => $checkedtypetiers, 'position' => 48),
    'f.vat_reverse_charge' => array('label' => "VATReverseCharge", 'checked' => '0', 'position' => 49, 'enabled' => \getDolGlobalString('ACCOUNTING_FORCE_ENABLE_VAT_REVERSE_CHARGE') ? '1' : '0'),
    'f.fk_mode_reglement' => array('label' => "PaymentMode", 'checked' => '0', 'position' => 52),
    'f.fk_cond_reglement' => array('label' => "PaymentConditionsShort", 'checked' => '0', 'position' => 50),
    'f.total_ht' => array('label' => "AmountHT", 'checked' => '1', 'position' => 105),
    'f.total_vat' => array('label' => "AmountVAT", 'checked' => '0', 'position' => 110),
    'f.total_localtax1' => array('label' => $langs->transcountry("AmountLT1", $mysoc->country_code), 'checked' => '0', 'enabled' => (string) (int) ($mysoc->localtax1_assuj == "1"), 'position' => 95),
    'f.total_localtax2' => array('label' => $langs->transcountry("AmountLT2", $mysoc->country_code), 'checked' => '0', 'enabled' => (string) (int) ($mysoc->localtax2_assuj == "1"), 'position' => 100),
    'f.total_ttc' => array('label' => "AmountTTC", 'checked' => '1', 'position' => 115),
    'dynamount_payed' => array('label' => "Paid", 'checked' => '0', 'position' => 116),
    'rtp' => array('label' => "Rest", 'checked' => '0', 'position' => 117),
    'f.multicurrency_code' => array('label' => 'Currency', 'checked' => '0', 'position' => 205, 'enabled' => !\isModEnabled("multicurrency") ? '0' : '1'),
    'f.multicurrency_tx' => array('label' => 'CurrencyRate', 'checked' => '0', 'position' => 206, 'enabled' => !\isModEnabled("multicurrency") ? '0' : '1'),
    'f.multicurrency_total_ht' => array('label' => 'MulticurrencyAmountHT', 'position' => 207, 'checked' => '0', 'enabled' => !\isModEnabled("multicurrency") ? '0' : '1'),
    'f.multicurrency_total_vat' => array('label' => 'MulticurrencyAmountVAT', 'position' => 208, 'checked' => '0', 'enabled' => !\isModEnabled("multicurrency") ? '0' : '1'),
    'f.multicurrency_total_ttc' => array('label' => 'MulticurrencyAmountTTC', 'position' => 209, 'checked' => '0', 'enabled' => !\isModEnabled("multicurrency") ? '0' : '1'),
    'multicurrency_dynamount_payed' => array('label' => 'MulticurrencyAlreadyPaid', 'position' => 210, 'checked' => '0', 'enabled' => !\isModEnabled("multicurrency") ? '0' : '1'),
    'multicurrency_rtp' => array('label' => 'MulticurrencyRemainderToPay', 'checked' => '0', 'position' => 211, 'enabled' => !\isModEnabled("multicurrency") ? '0' : '1'),
    // Not enabled by default because slow
    'u.login' => array('label' => "Author", 'checked' => '-1', 'position' => 500),
    'f.datec' => array('label' => "DateCreation", 'checked' => '0', 'position' => 501),
    'f.tms' => array('label' => "DateModificationShort", 'checked' => '0', 'position' => 502),
    'f.nb_docs' => array('label' => "Documents", 'checked' => '-1', 'position' => 510),
    'f.note_public' => array('label' => 'NotePublic', 'checked' => '0', 'position' => 520, 'enabled' => \getDolGlobalInt('MAIN_LIST_HIDE_PUBLIC_NOTES') ? '0' : '1'),
    'f.note_private' => array('label' => 'NotePrivate', 'checked' => '0', 'position' => 521, 'enabled' => \getDolGlobalInt('MAIN_LIST_HIDE_PRIVATE_NOTES') ? '0' : '1'),
    'f.fk_statut' => array('label' => "Status", 'checked' => '1', 'position' => 1000),
);
$subtypearray = $object->getArrayOfInvoiceSubtypes(0);
$arrayfields = \dol_sort_array($arrayfields, 'position');
$permissiontoread = $user->hasRight("fournisseur", "facture", "lire") || $user->hasRight("supplier_invoice", "lire");
$permissiontoadd = $user->hasRight("fournisseur", "facture", "creer") || $user->hasRight("supplier_invoice", "creer");
$permissiontodelete = $user->hasRight("fournisseur", "facture", "supprimer") || $user->hasRight("supplier_invoice", "supprimer");
/*
 * Actions
 */
$error = 0;
$parameters = array('socid' => $socid, 'arrayfields' => &$arrayfields);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
// Mass actions
$objectclass = 'FactureFournisseur';
$objectlabel = 'SupplierInvoices';
$uploaddir = $conf->fournisseur->facture->dir_output;
/*
 * View
 */
$form = new \Form($db);
$formother = new \FormOther($db);
$formfile = new \FormFile($db);
$facturestatic = new \FactureFournisseur($db);
$formcompany = new \FormCompany($db);
$thirdparty = new \Societe($db);
$subtypearray = $object->getArrayOfInvoiceSubtypes(0);
$now = \dol_now();
$soc = \null;
$soc = new \Societe($db);
$title = $langs->trans("BillsSuppliers") . ($socid && $soc !== \null ? ' - ' . $soc->name : '');
$help_url = 'EN:Suppliers_Invoices|FR:FactureFournisseur|ES:Facturas_de_proveedores';
// Build and execute select
// --------------------------------------------------------------------
$sql = "SELECT";
// Add fields from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListSelect', $parameters, $object, $action);
$sql = \preg_replace('/,\\s*$/', '', $sql);
$sqlfields = $sql;
// Add table from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListFrom', $parameters, $object, $action);
$arrayofcode = \getCountriesInEEC();
$country_code_in_EEC = $country_code_in_EEC_without_me = '';
$searchCategorySupplierInvoiceSqlList = array();
$listofcategoryid = '';
$searchCategorySupplierList = $search_categ_sup ? array($search_categ_sup) : array();
$searchCategorySupplierOperator = 0;
$searchCategorySupplierSqlList = array();
$listofcategoryid = '';
// Search for tag/category ($searchCategoryProductList is an array of ID)
$searchCategoryProductList = $search_product_category ? array($search_product_category) : array();
$searchCategoryProductOperator = 0;
$searchCategoryProductSqlList = array();
$listofcategoryid = '';
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
$resql = $db->query($sqlforcount);
//print $sql;
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$soc = new \Societe($db);
$arrayofselected = \is_array($toselect) ? $toselect : array();
$param = '&socid=' . $socid;
// Add $param from hooks
$parameters = array('param' => &$param);
$reshook = $hookmanager->executeHooks('printFieldListSearchParam', $parameters, $object, $action);
// List of mass actions available
$arrayofmassactions = array('validate' => \img_picto('', 'check', 'class="pictofixedwidth"') . $langs->trans("Validate"), 'generate_doc' => \img_picto('', 'pdf', 'class="pictofixedwidth"') . $langs->trans("ReGeneratePDF"), 'builddoc' => \img_picto('', 'pdf', 'class="pictofixedwidth"') . $langs->trans("PDFMerge"));
$massactionbutton = $form->selectMassAction('', $arrayofmassactions);
$url = \DOL_URL_ROOT . '/fourn/facture/card.php?action=create';
$i = 0;
$newcardbutton = '';
// Add code for pre mass action (confirmation or email presend form)
$topicmail = "SendBillRef";
$modelmail = "invoice_supplier_send";
$objecttmp = new \FactureFournisseur($db);
$trackid = 'sinv' . $object->id;
// If the user can view prospects other than his'
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
$parameters = array('arrayfields' => $arrayfields, 'param' => $param, 'sortfield' => $sortfield, 'sortorder' => $sortorder, 'totalarray' => &$totalarray);
$reshook = $hookmanager->executeHooks('printFieldListTitle', $parameters, $object, $action);
$facturestatic = new \FactureFournisseur($db);
$supplierstatic = new \Fournisseur($db);
$projectstatic = new \Project($db);
$userstatic = new \User($db);
$discount = new \DiscountAbsolute($db);
// Loop on record
// --------------------------------------------------------------------
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
$title = '';