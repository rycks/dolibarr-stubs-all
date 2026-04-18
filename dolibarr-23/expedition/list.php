<?php

$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'shipmentlist';
// To manage different context of search
$socid = \GETPOSTINT('socid');
$action = \GETPOST('action', 'alpha');
$massaction = \GETPOST('massaction', 'alpha');
$show_files = \GETPOSTINT('show_files');
$toselect = \GETPOST('toselect', 'array:int');
$optioncss = \GETPOST('optioncss', 'alpha');
$mode = \GETPOST('mode', 'alpha');
$search_ref_exp = \GETPOST("search_ref_exp", 'alpha');
$search_ref_liv = \GETPOST('search_ref_liv', 'alpha');
$search_ref_customer = \GETPOST('search_ref_customer', 'alpha');
$search_company = \GETPOST("search_company", 'alpha');
$search_shipping_method_ids = \GETPOST('search_shipping_method_ids', 'array:int');
$search_tracking = \GETPOST("search_tracking", 'alpha');
$search_town = \GETPOST('search_town', 'alpha');
$search_zip = \GETPOST('search_zip', 'alpha');
$search_state = \GETPOST("search_state", 'alpha');
$search_country = \GETPOST("search_country", 'aZ09');
$search_type_thirdparty = \GETPOST("search_type_thirdparty", 'intcomma');
$search_billed = \GETPOST("search_billed", 'intcomma');
$search_dateshipping_start = \dol_mktime(0, 0, 0, \GETPOSTINT('search_dateshipping_startmonth'), \GETPOSTINT('search_dateshipping_startday'), \GETPOSTINT('search_dateshipping_startyear'));
$search_dateshipping_end = \dol_mktime(23, 59, 59, \GETPOSTINT('search_dateshipping_endmonth'), \GETPOSTINT('search_dateshipping_endday'), \GETPOSTINT('search_dateshipping_endyear'));
$search_datedelivery_start = \dol_mktime(0, 0, 0, \GETPOSTINT('search_datedelivery_startmonth'), \GETPOSTINT('search_datedelivery_startday'), \GETPOSTINT('search_datedelivery_startyear'));
$search_datedelivery_end = \dol_mktime(23, 59, 59, \GETPOSTINT('search_datedelivery_endmonth'), \GETPOSTINT('search_datedelivery_endday'), \GETPOSTINT('search_datedelivery_endyear'));
$search_datereceipt_start = \dol_mktime(0, 0, 0, \GETPOSTINT('search_datereceipt_startmonth'), \GETPOSTINT('search_datereceipt_startday'), \GETPOSTINT('search_datereceipt_startyear'));
$search_datereceipt_end = \dol_mktime(23, 59, 59, \GETPOSTINT('search_datereceipt_endmonth'), \GETPOSTINT('search_datereceipt_endday'), \GETPOSTINT('search_datereceipt_endyear'));
$search_all = \trim(\GETPOST('search_all', 'alphanohtml'));
$search_user = \GETPOST('search_user', 'intcomma');
$search_sale = \GETPOST('search_sale', 'intcomma');
$search_categ_cus = \GETPOST("search_categ_cus", 'intcomma');
$search_product_category = \GETPOST('search_product_category', 'intcomma');
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$search_status = \GETPOST('search_status', 'intcomma');
$search_signed_status = \GETPOST('search_signed_status', 'alpha');
$diroutputmassaction = $conf->expedition->dir_output . '/sending/temp/massgeneration/' . $user->id;
$object = new \Expedition($db);
$extrafields = new \ExtraFields($db);
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
// List of fields to search into when doing a "search in all"
$fieldstosearchall = array(
    'e.ref' => "Ref",
    's.nom' => "ThirdParty",
    'e.note_public' => 'NotePublic',
    //'e.fk_shipping_method'=>'SendingMethod', // TODO fix this, does not work
    'e.tracking_number' => "TrackingNumber",
);
$checkedtypetiers = '0';
$arrayfields = array('e.ref' => array('label' => $langs->trans("Ref"), 'checked' => '1', 'position' => 1), 'e.ref_customer' => array('label' => $langs->trans("RefCustomer"), 'checked' => '1', 'position' => 2), 's.nom' => array('label' => $langs->trans("ThirdParty"), 'checked' => '1', 'position' => 3), 's.town' => array('label' => $langs->trans("Town"), 'checked' => '1', 'position' => 4), 's.zip' => array('label' => $langs->trans("Zip"), 'checked' => '-1', 'position' => 5), 'state.nom' => array('label' => $langs->trans("StateShort"), 'checked' => '0', 'position' => 6), 'country.code_iso' => array('label' => $langs->trans("Country"), 'checked' => '0', 'position' => 7), 'typent.code' => array('label' => $langs->trans("ThirdPartyType"), 'checked' => $checkedtypetiers, 'position' => 8), 'e.date_delivery' => array('label' => $langs->trans("DateDeliveryPlanned"), 'checked' => '1', 'position' => 9), 'e.date_expedition' => array('label' => $langs->trans("DateShipping"), 'checked' => '1', 'position' => 10), 'e.fk_shipping_method' => array('label' => $langs->trans('SendingMethod'), 'checked' => '1', 'position' => 11), 'e.tracking_number' => array('label' => $langs->trans("TrackingNumber"), 'checked' => '1', 'position' => 12), 'e.weight' => array('label' => $langs->trans("Weight"), 'checked' => '0', 'position' => 13), 'e.datec' => array('label' => $langs->trans("DateCreation"), 'checked' => '0', 'position' => 500), 'e.tms' => array('label' => $langs->trans("DateModificationShort"), 'checked' => '0', 'position' => 500), 'e.fk_statut' => array('label' => $langs->trans("Status"), 'checked' => '1', 'position' => 1000), 'e.signed_status' => array('label' => 'Signed status', 'checked' => '0', 'position' => 1001), 'l.ref' => array('label' => $langs->trans("DeliveryRef"), 'checked' => '1', 'position' => 1010, 'enabled' => \getDolGlobalInt('MAIN_SUBMODULE_DELIVERY') ? '1' : '0'), 'l.date_delivery' => array('label' => $langs->trans("DateReceived"), 'position' => 1020, 'checked' => '1', 'enabled' => \getDolGlobalInt('MAIN_SUBMODULE_DELIVERY') ? '1' : '0'), 'e.billed' => array('label' => $langs->trans("Billed"), 'checked' => '1', 'position' => 1100, 'enabled' => 'getDolGlobalString("WORKFLOW_BILL_ON_SHIPMENT") !== "0"'), 'e.note_public' => array('label' => 'NotePublic', 'checked' => '0', 'enabled' => (string) (int) (!\getDolGlobalString('MAIN_LIST_ALLOW_PUBLIC_NOTES')), 'position' => 135), 'e.note_private' => array('label' => 'NotePrivate', 'checked' => '0', 'enabled' => (string) (int) (!\getDolGlobalString('MAIN_LIST_ALLOW_PRIVATE_NOTES')), 'position' => 140));
$arrayfields = \dol_sort_array($arrayfields, 'position');
// Security check
$expeditionid = \GETPOSTINT('id');
$result = \restrictedArea($user, 'expedition', $expeditionid, '');
/*
 * Actions
 */
$error = 0;
$parameters = array('socid' => $socid, 'arrayfields' => &$arrayfields);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$objectclass = 'Expedition';
$objectlabel = 'Sendings';
$permissiontoread = $user->hasRight('expedition', 'lire');
$permissiontoadd = $user->hasRight('expedition', 'creer');
$permissiontodelete = $user->hasRight('expedition', 'supprimer');
$uploaddir = $conf->expedition->dir_output . '/sending';
/*
 * View
 */
$now = \dol_now();
$form = new \Form($db);
$formother = new \FormOther($db);
$formfile = new \FormFile($db);
$companystatic = new \Societe($db);
$formcompany = new \FormCompany($db);
$shipment = new \Expedition($db);
$title = $langs->trans('Shipments');
$help_url = 'EN:Module_Shipments|FR:Module_Exp&eacute;ditions|ES:M&oacute;dulo_Expediciones';
$sql = 'SELECT';
// Add fields from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListSelect', $parameters, $object, $action);
$sqlfields = $sql;
// Add table from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListFrom', $parameters, $object, $action);
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
// Add HAVING from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListHaving', $parameters, $object, $action);
$nbtotalofrecords = '';
/* The fast and low memory method to get and count full list converts the sql into a sql count */
$sqlforcount = \preg_replace('/^' . \preg_quote($sqlfields, '/') . '/', 'SELECT COUNT(*) as nbtotalofrecords', $sql);
$sqlforcount = \preg_replace('/GROUP BY .*$/', '', $sqlforcount);
$resql = $db->query($sqlforcount);
//print $sql;
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$soc = new \Societe($db);
$arrayofselected = \is_array($toselect) ? $toselect : array();
$param = '';
// Add $param from hooks
$parameters = array('param' => &$param);
$reshook = $hookmanager->executeHooks('printFieldListSearchParam', $parameters, $object, $action);
$arrayofmassactions = array('generate_doc' => \img_picto('', 'pdf', 'class="pictofixedwidth"') . $langs->trans("ReGeneratePDF"), 'builddoc' => \img_picto('', 'pdf', 'class="pictofixedwidth"') . $langs->trans("PDFMerge"), 'classifyclose' => \img_picto('', 'stop-circle', 'class="pictofixedwidth"') . $langs->trans("Close"), 'presend' => \img_picto('', 'email', 'class="pictofixedwidth"') . $langs->trans("SendByMail"));
$massactionbutton = $form->selectMassAction('', $arrayofmassactions);
// Currently: a sending can't create from sending list
// $url = DOL_URL_ROOT.'/expedition/card.php?action=create';
// if (!empty($socid)) $url .= '&socid='.$socid;
// $newcardbutton = dolGetButtonTitle($langs->trans('NewSending'), '', 'fa fa-plus-circle', $url, '', $user->rights->expedition->creer);
$newcardbutton = '';
$i = 0;
$topicmail = "SendShippingRef";
$modelmail = "shipping_send";
$objecttmp = new \Expedition($db);
$trackid = 'shi' . $object->id;
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
$parameters = array('arrayfields' => $arrayfields, 'param' => $param, 'sortfield' => $sortfield, 'sortorder' => $sortorder, '$totalarray' => &$totalarray);
$reshook = $hookmanager->executeHooks('printFieldListTitle', $parameters, $object, $action);
$typenArray = $formcompany->typent_array(1);
// Loop on record
// --------------------------------------------------------------------
$i = 0;
$savnbfield = $totalarray['nbfield'];
$totalarray = array();
$imaxinloop = $limit ? \min($num, $limit) : $num;
$parameters = array('arrayfields' => $arrayfields, 'totalarray' => $totalarray, 'sql' => $sql);
$reshook = $hookmanager->executeHooks('printFieldListFooter', $parameters, $object, $action);
$hidegeneratedfilelistifempty = 1;
// Show list of available documents
$urlsource = $_SERVER['PHP_SELF'] . '?sortfield=' . $sortfield . '&sortorder=' . $sortorder;
$filedir = $diroutputmassaction;
$genallowed = $user->hasRight('expedition', 'lire');
$delallowed = $user->hasRight('expedition', 'creer');
$title = '';