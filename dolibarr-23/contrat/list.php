<?php

$action = \GETPOST('action', 'aZ09');
$massaction = \GETPOST('massaction', 'alpha');
$show_files = \GETPOSTINT('show_files');
$confirm = \GETPOST('confirm', 'alpha');
$toselect = \GETPOST('toselect', 'array:int');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'contractlist';
// To manage different context of search
$optioncss = \GETPOST('optioncss', 'alpha');
$mode = \GETPOST('mode', 'alpha');
$socid = \GETPOSTINT('socid');
$search_name = \GETPOST('search_name', 'alpha');
$search_email = \GETPOST('search_email', 'alpha');
$search_town = \GETPOST('search_town', 'alpha');
$search_zip = \GETPOST('search_zip', 'alpha');
$search_state = \GETPOST("search_state", 'alpha');
$search_country = \GETPOST("search_country", 'aZ09');
$search_type_thirdparty = \GETPOST("search_type_thirdparty", 'intcomma');
$search_contract = \GETPOST('search_contract', 'alpha');
$search_ref_customer = \GETPOST('search_ref_customer', 'alpha');
$search_ref_supplier = \GETPOST('search_ref_supplier', 'alpha');
$search_all = \GETPOST('search_all', 'alphanohtml');
$search_status = \GETPOST('search_status', 'alpha');
$search_signed_status = \GETPOST('search_signed_status', 'alpha');
$search_note_public = \GETPOST('search_note_public', 'alpha');
$search_note_private = \GETPOST('search_note_private', 'alpha');
$search_user = \GETPOST('search_user', 'intcomma');
$search_sale = \GETPOST('search_sale', 'intcomma');
$search_product_category = \GETPOST('search_product_category', 'intcomma');
$search_dfmonth = \GETPOSTINT('search_dfmonth');
$search_dfyear = \GETPOSTINT('search_dfyear');
$search_op2df = \GETPOST('search_op2df', 'alpha');
$search_date_startday = \GETPOSTINT('search_date_startday');
$search_date_startmonth = \GETPOSTINT('search_date_startmonth');
$search_date_startyear = \GETPOSTINT('search_date_startyear');
$search_date_endday = \GETPOSTINT('search_date_endday');
$search_date_endmonth = \GETPOSTINT('search_date_endmonth');
$search_date_endyear = \GETPOSTINT('search_date_endyear');
$search_date_start = \dol_mktime(0, 0, 0, $search_date_startmonth, $search_date_startday, $search_date_startyear);
// Use tzserver
$search_date_end = \dol_mktime(23, 59, 59, $search_date_endmonth, $search_date_endday, $search_date_endyear);
$searchCategoryCustomerOperator = 0;
$searchCategoryCustomerList = \GETPOST('search_category_customer_list', 'array');
$search_date_creation_startmonth = \GETPOSTINT('search_date_creation_startmonth');
$search_date_creation_startyear = \GETPOSTINT('search_date_creation_startyear');
$search_date_creation_startday = \GETPOSTINT('search_date_creation_startday');
$search_date_creation_start = \dol_mktime(0, 0, 0, $search_date_creation_startmonth, $search_date_creation_startday, $search_date_creation_startyear);
// Use tzserver
$search_date_creation_endmonth = \GETPOSTINT('search_date_creation_endmonth');
$search_date_creation_endyear = \GETPOSTINT('search_date_creation_endyear');
$search_date_creation_endday = \GETPOSTINT('search_date_creation_endday');
$search_date_creation_end = \dol_mktime(23, 59, 59, $search_date_creation_endmonth, $search_date_creation_endday, $search_date_creation_endyear);
// Use tzserver
$search_date_modif_startmonth = \GETPOSTINT('search_date_modif_startmonth');
$search_date_modif_startyear = \GETPOSTINT('search_date_modif_startyear');
$search_date_modif_startday = \GETPOSTINT('search_date_modif_startday');
$search_date_modif_start = \dol_mktime(0, 0, 0, $search_date_modif_startmonth, $search_date_modif_startday, $search_date_modif_startyear);
// Use tzserver
$search_date_modif_endmonth = \GETPOSTINT('search_date_modif_endmonth');
$search_date_modif_endyear = \GETPOSTINT('search_date_modif_endyear');
$search_date_modif_endday = \GETPOSTINT('search_date_modif_endday');
$search_date_modif_end = \dol_mktime(23, 59, 59, $search_date_modif_endmonth, $search_date_modif_endday, $search_date_modif_endyear);
// Use tzserver
// Load variable for pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
// Security check
$id = \GETPOSTINT('id');
$result = \restrictedArea($user, 'contrat', $id);
$diroutputmassaction = $conf->contract->dir_output . '/temp/massgeneration/' . $user->id;
// Initialize a technical object to manage hooks of page. Note that conf->hooks_modules contains an array of hook context
$object = new \Contrat($db);
$extrafields = new \ExtraFields($db);
$staticcontratligne = new \ContratLigne($db);
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
// List of fields to search into when doing a "search in all"
$fieldstosearchall = array();
$parameters = array('fieldstosearchall' => $fieldstosearchall);
$reshook = $hookmanager->executeHooks('completeFieldsToSearchAll', $parameters, $object, $action);
$arrayfields = array('c.ref' => array('label' => $langs->trans("Ref"), 'checked' => '1', 'position' => 10), 'c.ref_customer' => array('label' => $langs->trans("RefCustomer"), 'checked' => '1', 'position' => 12), 'c.ref_supplier' => array('label' => $langs->trans("RefSupplier"), 'checked' => '1', 'position' => 14), 's.nom' => array('label' => $langs->trans("ThirdParty"), 'checked' => '1', 'position' => 30), 's.email' => array('label' => $langs->trans("ThirdPartyEmail"), 'checked' => '0', 'position' => 30), 's.town' => array('label' => $langs->trans("Town"), 'checked' => '0', 'position' => 31), 's.zip' => array('label' => $langs->trans("Zip"), 'checked' => '1', 'position' => 32), 'state.nom' => array('label' => $langs->trans("StateShort"), 'checked' => '0', 'position' => 33), 'country.code_iso' => array('label' => $langs->trans("Country"), 'checked' => '0', 'position' => 34), 'sale_representative' => array('label' => $langs->trans("SaleRepresentativesOfThirdParty"), 'checked' => '-1', 'position' => 80), 'c.date_contrat' => array('label' => $langs->trans("DateContract"), 'checked' => '1', 'position' => 45), 'c.datec' => array('label' => $langs->trans("DateCreation"), 'checked' => '0', 'position' => 500), 'c.tms' => array('label' => $langs->trans("DateModificationShort"), 'checked' => '0', 'position' => 500), 'c.note_public' => array('label' => $langs->trans("NotePublic"), 'checked' => '0', 'position' => 520, 'enabled' => (string) (!\getDolGlobalInt('MAIN_LIST_HIDE_PUBLIC_NOTES'))), 'c.note_private' => array('label' => $langs->trans("NotePrivate"), 'checked' => '0', 'position' => 521, 'enabled' => (string) (!\getDolGlobalInt('MAIN_LIST_HIDE_PRIVATE_NOTES'))), 'lower_planned_end_date' => array('label' => $langs->trans("LowerDateEndPlannedShort"), 'checked' => '1', 'position' => 900, 'help' => $langs->trans("LowerDateEndPlannedShort")), 'status' => array('label' => $langs->trans("Status"), 'checked' => '1', 'position' => 1000), 'c.signed_status' => array('label' => $langs->trans('SignedStatus'), 'checked' => '0', 'position' => 1001));
$arrayfields = \dol_sort_array($arrayfields, 'position');
$permissiontoread = $user->hasRight('contrat', 'lire');
$permissiontoadd = $user->hasRight('contrat', 'creer');
$permissiontodelete = $user->hasRight('contrat', 'supprimer');
$result = \restrictedArea($user, 'contrat', 0);
$parameters = array('socid' => $socid, 'arrayfields' => &$arrayfields);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$formfile = new \FormFile($db);
$formother = new \FormOther($db);
$socstatic = new \Societe($db);
$formcompany = new \FormCompany($db);
$contracttmp = new \Contrat($db);
$now = \dol_now();
$title = "";
$sql = 'SELECT';
// Add fields from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListSelect', $parameters, $object, $action);
$sql = \preg_replace('/,\\s*$/', '', $sql);
$sqlfields = $sql;
// Add table from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListFrom', $parameters, $object, $action);
// Search for tag/category ($searchCategoryProductList is an array of ID)
$searchCategoryProductOperator = \GETPOSTINT('search_category_product_operator');
$searchCategoryProductList = array($search_product_category);
$searchCategoryProductSqlList = array();
$listofcategoryid = '';
$searchCategoryCustomerSqlList = array();
$existsCategoryCustomerList = array();
// Add where from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListWhere', $parameters, $object, $action);
// Add where from hooks
$parameters = array('search_dfyear' => $search_dfyear, 'search_op2df' => $search_op2df);
$reshook = $hookmanager->executeHooks('printFieldListGroupBy', $parameters, $object);
// Add HAVING from hooks
$parameters = array('search_dfyear' => $search_dfyear, 'search_op2df' => $search_op2df);
$reshook = $hookmanager->executeHooks('printFieldListHaving', $parameters, $object, $action);
// Count total nb of records
$nbtotalofrecords = '';
$resql = $db->query($sql);
$num = $db->num_rows($resql);
// Output page
// --------------------------------------------------------------------
$title = $langs->trans("Contracts");
$help_url = 'EN:Module_Contracts|FR:Module_Contrat|ES:Contratos_de_servicio';
$i = 0;
$arrayofselected = \is_array($toselect) ? $toselect : array();
$soc = new \Societe($db);
$param = '';
// List of mass actions available
$arrayofmassactions = array('generate_doc' => \img_picto('', 'pdf', 'class="pictofixedwidth"') . $langs->trans("ReGeneratePDF"), 'builddoc' => \img_picto('', 'pdf', 'class="pictofixedwidth"') . $langs->trans("PDFMerge"), 'presend' => \img_picto('', 'email', 'class="pictofixedwidth"') . $langs->trans("SendByMail"));
$massactionbutton = $form->selectMassAction('', $arrayofmassactions);
$url = \DOL_URL_ROOT . '/contrat/card.php?action=create';
$newcardbutton = '';
$topicmail = "SendContractRef";
$modelmail = "contract";
$objecttmp = new \Contrat($db);
$trackid = 'con' . $object->id;
$moreforfilter = '';
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldPreListTitle', $parameters, $object, $action);
$varpage = empty($contextpage) ? $_SERVER["PHP_SELF"] : $contextpage;
$selectedfields = $form->multiSelectArrayWithCheckbox('selectedfields', $arrayfields, $varpage, \getDolGlobalString('MAIN_CHECKBOX_LEFT_COLUMN'));
// Fields from hook
$parameters = array('arrayfields' => $arrayfields);
$reshook = $hookmanager->executeHooks('printFieldListOption', $parameters, $object, $action);
$totalarray = array();
// Hook fields
$parameters = array('arrayfields' => $arrayfields, 'param' => $param, 'sortfield' => $sortfield, 'sortorder' => $sortorder, 'totalarray' => &$totalarray);
$reshook = $hookmanager->executeHooks('printFieldListTitle', $parameters, $object, $action);
// Loop on record
// --------------------------------------------------------------------
$i = 0;
$savnbfield = $totalarray['nbfield'];
$totalarray = array();
$typenArray = array();
$cacheCountryIDCode = array();
$imaxinloop = $limit ? \min($num, $limit) : $num;
$parameters = array('arrayfields' => $arrayfields, 'sql' => $sql);
$reshook = $hookmanager->executeHooks('printFieldListFooter', $parameters, $object, $action);
$hidegeneratedfilelistifempty = 1;
// Show list of available documents
$urlsource = $_SERVER['PHP_SELF'] . '?sortfield=' . $sortfield . '&sortorder=' . $sortorder;
$filedir = $diroutputmassaction;
$genallowed = $permissiontoread;
$delallowed = $permissiontoadd;