<?php

$socid = \GETPOSTINT('socid');
$action = \GETPOST('action', 'aZ09');
$massaction = \GETPOST('massaction', 'alpha');
$show_files = \GETPOSTINT('show_files');
$confirm = \GETPOST('confirm', 'alpha');
$toselect = \GETPOST('toselect', 'array:int');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'supplierproposallist';
$optioncss = \GETPOST('optioncss', 'alpha');
$mode = \GETPOST('mode', 'alpha');
$search_user = \GETPOST('search_user', 'intcomma');
$search_sale = \GETPOST('search_sale', 'intcomma');
$search_ref = \GETPOST('sf_ref') ? \GETPOST('sf_ref', 'alpha') : \GETPOST('search_ref', 'alpha');
$search_company = \GETPOST('search_company', 'alpha');
$search_company_alias = \GETPOST('search_company_alias', 'alpha');
$search_login = \GETPOST('search_login', 'alpha');
$search_town = \GETPOST('search_town', 'alpha');
$search_zip = \GETPOST('search_zip', 'alpha');
$search_state = \GETPOST("search_state");
$search_country = \GETPOST("search_country", 'aZ09');
$search_date_startday = \GETPOSTINT('search_date_startday');
$search_date_startmonth = \GETPOSTINT('search_date_startmonth');
$search_date_startyear = \GETPOSTINT('search_date_startyear');
$search_date_endday = \GETPOSTINT('search_date_endday');
$search_date_endmonth = \GETPOSTINT('search_date_endmonth');
$search_date_endyear = \GETPOSTINT('search_date_endyear');
$search_date_start = \dol_mktime(0, 0, 0, $search_date_startmonth, $search_date_startday, $search_date_startyear);
// Use tzserver
$search_date_end = \dol_mktime(23, 59, 59, $search_date_endmonth, $search_date_endday, $search_date_endyear);
$search_date_valid_startday = \GETPOSTINT('search_date_valid_startday');
$search_date_valid_startmonth = \GETPOSTINT('search_date_valid_startmonth');
$search_date_valid_startyear = \GETPOSTINT('search_date_valid_startyear');
$search_date_valid_endday = \GETPOSTINT('search_date_valid_endday');
$search_date_valid_endmonth = \GETPOSTINT('search_date_valid_endmonth');
$search_date_valid_endyear = \GETPOSTINT('search_date_valid_endyear');
$search_date_valid_start = \dol_mktime(0, 0, 0, $search_date_valid_startmonth, $search_date_valid_startday, $search_date_valid_startyear);
// Use tzserver
$search_date_valid_end = \dol_mktime(23, 59, 59, $search_date_valid_endmonth, $search_date_valid_endday, $search_date_valid_endyear);
$search_type_thirdparty = \GETPOST("search_type_thirdparty", 'intcomma');
$search_montant_ht = \GETPOST('search_montant_ht', 'alpha');
$search_montant_vat = \GETPOST('search_montant_vat', 'alpha');
$search_montant_ttc = \GETPOST('search_montant_ttc', 'alpha');
$search_multicurrency_code = \GETPOST('search_multicurrency_code', 'alpha');
$search_multicurrency_tx = \GETPOST('search_multicurrency_tx', 'alpha');
$search_multicurrency_montant_ht = \GETPOST('search_multicurrency_montant_ht', 'alpha');
$search_multicurrency_montant_vat = \GETPOST('search_multicurrency_montant_vat', 'alpha');
$search_multicurrency_montant_ttc = \GETPOST('search_multicurrency_montant_ttc', 'alpha');
$search_project_ref = \GETPOST('search_project_ref', 'alpha');
$search_status = \GETPOST('search_status', 'intcomma');
$search_note_private = \GETPOST('search_note_private', 'alpha');
$search_note_public = \GETPOST('search_note_public', 'alpha');
$search_product_category = \GETPOST('search_product_category', 'int');
$searchCategorySupplierPropalList = \GETPOST('search_category_supplier_proposal_list', 'array:int');
$searchCategorySupplierPropalOperator = 0;
$search_all = \trim(\GETPOST('search_all', 'alphanohtml'));
$object_statut = \GETPOST('supplier_proposal_statut', 'intcomma');
$search_btn = \GETPOST('button_search', 'alpha');
$search_remove_btn = \GETPOST('button_removefilter', 'alpha');
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT('page');
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
// Nombre de ligne pour choix de produit/service predefinis
$NBLINES = 4;
// Security check
$module = 'supplier_proposal';
$dbtable = '';
$objectid = '';
$diroutputmassaction = $conf->supplier_proposal->dir_output . '/temp/massgeneration/' . $user->id;
// Initialize a technical object to manage hooks of page. Note that conf->hooks_modules contains an array of hook context
$object = new \SupplierProposal($db);
$extrafields = new \ExtraFields($db);
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
// List of fields to search into when doing a "search in all"
$fieldstosearchall = array();
$checkedtypetiers = '0';
$arrayfields = array('sp.ref' => array('label' => $langs->trans("Ref"), 'checked' => '1'), 's.nom' => array('label' => $langs->trans("Supplier"), 'checked' => '1'), 's.name_alias' => array('label' => "AliasNameShort", 'checked' => '0'), 's.town' => array('label' => $langs->trans("Town"), 'checked' => '1'), 's.zip' => array('label' => $langs->trans("Zip"), 'checked' => '1'), 'state.nom' => array('label' => $langs->trans("StateShort"), 'checked' => '0'), 'country.code_iso' => array('label' => $langs->trans("Country"), 'checked' => '0'), 'typent.code' => array('label' => $langs->trans("ThirdPartyType"), 'checked' => $checkedtypetiers), 'sp.date_valid' => array('label' => $langs->trans("DateValidation"), 'checked' => '1'), 'sp.date_livraison' => array('label' => $langs->trans("DateEnd"), 'checked' => '1'), 'sp.total_ht' => array('label' => $langs->trans("AmountHT"), 'checked' => '1'), 'sp.total_tva' => array('label' => $langs->trans("AmountVAT"), 'checked' => '0'), 'sp.total_ttc' => array('label' => $langs->trans("AmountTTC"), 'checked' => '0'), 'sp.multicurrency_code' => array('label' => 'Currency', 'checked' => '0', 'enabled' => !\isModEnabled("multicurrency") ? '0' : '1'), 'sp.multicurrency_tx' => array('label' => 'CurrencyRate', 'checked' => '0', 'enabled' => !\isModEnabled("multicurrency") ? '0' : '1'), 'sp.multicurrency_total_ht' => array('label' => 'MulticurrencyAmountHT', 'checked' => '0', 'enabled' => !\isModEnabled("multicurrency") ? '0' : '1'), 'sp.multicurrency_total_vat' => array('label' => 'MulticurrencyAmountVAT', 'checked' => '0', 'enabled' => !\isModEnabled("multicurrency") ? '0' : '1'), 'sp.multicurrency_total_ttc' => array('label' => 'MulticurrencyAmountTTC', 'checked' => '0', 'enabled' => !\isModEnabled("multicurrency") ? '0' : '1'), 'sp.fk_projet' => array('label' => $langs->trans("RefProject"), 'checked' => '1', 'enabled' => !\isModEnabled("project") ? '0' : '1'), 'u.login' => array('label' => $langs->trans("Author"), 'checked' => '1', 'position' => 10), 'sp.datec' => array('label' => $langs->trans("DateCreation"), 'checked' => '0', 'position' => 500), 'sp.tms' => array('label' => $langs->trans("DateModificationShort"), 'checked' => '0', 'position' => 500), 'sp.note_public' => array('label' => 'NotePublic', 'checked' => '0', 'position' => 520, 'enabled' => \getDolGlobalInt('MAIN_LIST_HIDE_PUBLIC_NOTES') ? '0' : '1'), 'sp.note_private' => array('label' => 'NotePrivate', 'checked' => '0', 'position' => 521, 'enabled' => \getDolGlobalInt('MAIN_LIST_HIDE_PRIVATE_NOTES') ? '0' : '1'), 'sp.fk_statut' => array('label' => $langs->trans("Status"), 'checked' => '1', 'position' => 1000));
$arrayfields = \dol_sort_array($arrayfields, 'position');
$result = \restrictedArea($user, $module, $objectid, $dbtable);
$permissiontoread = $user->hasRight('supplier_proposal', 'lire');
$permissiontodelete = $user->hasRight('supplier_proposal', 'supprimer');
$permissiontoadd = $user->hasRight('supplier_proposal', 'creer');
$parameters = array('socid' => $socid, 'arrayfields' => &$arrayfields);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$objectclass = 'SupplierProposal';
$objectlabel = 'SupplierProposals';
$uploaddir = $conf->supplier_proposal->dir_output;
/*
 * View
 */
$form = new \Form($db);
$formother = new \FormOther($db);
$formfile = new \FormFile($db);
$formpropal = new \FormPropal($db);
$companystatic = new \Societe($db);
$formcompany = new \FormCompany($db);
$now = \dol_now();
$soc = new \Societe($db);
$varpage = empty($contextpage) ? $_SERVER["PHP_SELF"] : $contextpage;
$selectedfields = $form->multiSelectArrayWithCheckbox('selectedfields', $arrayfields, $varpage);
// This also change content of $arrayfields
$title = $langs->trans('ListOfSupplierProposals');
$help_url = 'EN:Ask_Price_Supplier|FR:Demande_de_prix_fournisseur';
// Build and execute select
// --------------------------------------------------------------------
$sql = 'SELECT';
// Add fields from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListSelect', $parameters);
$searchCategorySupplierPropalSqlList = array();
$listofcategoryid = '';
// Search for tag/category ($searchCategoryProductList is an array of ID)
$searchCategoryProductOperator = \GETPOSTINT('search_category_product_operator');
$searchCategoryProductList = array($search_product_category);
$searchCategoryProductSqlList = array();
$listofcategoryid = '';
// Add where from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListWhere', $parameters, $object, $action);
// Count total nb of records
$nbtotalofrecords = '';
$resql = $db->query($sql);
$nbtotalofrecords = $db->num_rows($resql);
$resql = $db->query($sql);
$objectstatic = new \SupplierProposal($db);
$userstatic = new \User($db);
$num = $db->num_rows($resql);
$arrayofselected = \is_array($toselect) ? $toselect : array();
$param = '';
// List of mass actions available
$arrayofmassactions = array('generate_doc' => \img_picto('', 'pdf', 'class="pictofixedwidth"') . $langs->trans("ReGeneratePDF"), 'builddoc' => \img_picto('', 'pdf', 'class="pictofixedwidth"') . $langs->trans("PDFMerge"));
$massactionbutton = $form->selectMassAction('', $arrayofmassactions);
$url = \DOL_URL_ROOT . '/supplier_proposal/card.php?action=create';
$newcardbutton = '';
$topicmail = "SendSupplierProposalRef";
$modelmail = "supplier_proposal_send";
$objecttmp = new \SupplierProposal($db);
$trackid = 'spro' . $object->id;
$i = 0;
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
$now = \dol_now();
$i = 0;
$total = 0;
$subtotal = 0;
$userstatic = new \User($db);
$objectstatic = new \SupplierProposal($db);
$projectstatic = new \Project($db);
$savnbfield = $totalarray['nbfield'];
$totalarray = array('nbfield' => 0, 'val' => array(), 'pos' => array());
$imaxinloop = $limit ? \min($num, $limit) : $num;
$parameters = array('arrayfields' => $arrayfields, 'sql' => $sql);
$reshook = $hookmanager->executeHooks('printFieldListFooter', $parameters);
$hidegeneratedfilelistifempty = 1;
// Show list of available documents
$urlsource = $_SERVER['PHP_SELF'] . '?sortfield=' . $sortfield . '&sortorder=' . $sortorder;
$filedir = $diroutputmassaction;
$genallowed = $user->hasRight('supplier_proposal', 'lire');
$delallowed = $user->hasRight('supplier_proposal', 'creer');