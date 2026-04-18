<?php

// constants for IDs of core dictionaries
const DICT_FORME_JURIDIQUE = 1;
const DICT_DEPARTEMENTS = 2;
const DICT_REGIONS = 3;
const DICT_COUNTRY = 4;
const DICT_CIVILITY = 5;
const DICT_ACTIONCOMM = 6;
const DICT_CHARGESOCIALES = 7;
const DICT_TYPENT = 8;
const DICT_CURRENCIES = 9;
const DICT_TVA = 10;
const DICT_TYPE_CONTACT = 11;
const DICT_PAYMENT_TERM = 12;
const DICT_PAIEMENT = 13;
const DICT_ECOTAXE = 14;
const DICT_PAPER_FORMAT = 15;
const DICT_PROSPECTLEVEL = 16;
const DICT_TYPE_FEES = 17;
const DICT_SHIPMENT_MODE = 18;
const DICT_EFFECTIF = 19;
const DICT_INPUT_METHOD = 20;
const DICT_AVAILABILITY = 21;
const DICT_INPUT_REASON = 22;
const DICT_REVENUESTAMP = 23;
const DICT_TYPE_RESOURCE = 24;
const DICT_TYPE_CONTAINER = 25;
//const DICT_UNITS = 26;
const DICT_STCOMM = 27;
const DICT_HOLIDAY_TYPES = 28;
const DICT_LEAD_STATUS = 29;
const DICT_FORMAT_CARDS = 30;
const DICT_INVOICE_SUBTYPE = 31;
const DICT_HRM_PUBLIC_HOLIDAY = 32;
const DICT_HRM_DEPARTMENT = 33;
const DICT_HRM_FUNCTION = 34;
const DICT_EXP_TAX_CAT = 35;
const DICT_EXP_TAX_RANGE = 36;
const DICT_UNITS = 37;
const DICT_SOCIALNETWORKS = 38;
const DICT_PROSPECTCONTACTLEVEL = 39;
const DICT_STCOMMCONTACT = 40;
const DICT_TRANSPORT_MODE = 41;
const DICT_PRODUCT_NATURE = 42;
const DICT_PRODUCTBATCH_QCSTATUS = 43;
const DICT_ASSET_DISPOSAL_TYPE = 44;
$action = \GETPOST('action', 'alpha') ? \GETPOST('action', 'alpha') : 'view';
$confirm = \GETPOST('confirm', 'alpha');
$id = \GETPOSTINT('id');
$rowid = \GETPOST('rowid', 'alpha');
$entity = \GETPOST('entity', 'alpha');
// Do not use GETPOSTINT here. Should be '', 0 or >0.
$code = \GETPOST('code', 'alpha');
$from = \GETPOST('from', 'alpha');
$acts = array();
$actl = array();
// Load variable for pagination
$listoffset = \GETPOST('listoffset');
$listlimit = \GETPOST('listlimit') > 0 ? \GETPOST('listlimit') : 1000;
// To avoid too long dictionaries
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$offset = $listlimit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$search_country_id = \GETPOST('search_country_id', 'int');
$search_code = \GETPOST('search_code', 'alpha');
$search_active = \GETPOST('search_active', 'alpha');
$allowed = $user->admin;
$permissiontoadd = $allowed;
// This page is a generic page to edit dictionaries
// Put here declaration of dictionaries properties
// Sort order to show dictionary (0 is space). All other dictionaries (added by modules) will be at end of this.
$taborder = array(\DICT_CURRENCIES, \DICT_PAPER_FORMAT, \DICT_FORMAT_CARDS, 0, \DICT_COUNTRY, \DICT_REGIONS, \DICT_DEPARTEMENTS, 0, \DICT_FORME_JURIDIQUE, \DICT_TYPENT, \DICT_EFFECTIF, \DICT_PROSPECTLEVEL, \DICT_PROSPECTCONTACTLEVEL, \DICT_STCOMM, \DICT_STCOMMCONTACT, \DICT_SOCIALNETWORKS, 0, \DICT_CIVILITY, \DICT_TYPE_CONTACT, 0, \DICT_ACTIONCOMM, \DICT_TYPE_RESOURCE, 0, \DICT_LEAD_STATUS, 0, \DICT_HRM_DEPARTMENT, \DICT_HRM_FUNCTION, \DICT_HRM_PUBLIC_HOLIDAY, \DICT_HOLIDAY_TYPES, \DICT_TYPE_FEES, \DICT_EXP_TAX_CAT, \DICT_EXP_TAX_RANGE, 0, \DICT_TVA, \DICT_INVOICE_SUBTYPE, \DICT_REVENUESTAMP, \DICT_PAYMENT_TERM, \DICT_PAIEMENT, \DICT_CHARGESOCIALES, 0, \DICT_ECOTAXE, 0, \DICT_INPUT_REASON, \DICT_INPUT_METHOD, \DICT_SHIPMENT_MODE, \DICT_AVAILABILITY, \DICT_TRANSPORT_MODE, 0, \DICT_UNITS, \DICT_PRODUCT_NATURE, 0, \DICT_PRODUCTBATCH_QCSTATUS, 0, \DICT_TYPE_CONTAINER, 0, \DICT_ASSET_DISPOSAL_TYPE, 0);
// Name of SQL tables of dictionaries
$tabname = array();
// Dictionary labels
$tablib = array();
// Requests to extract data
$tabsql = array();
// Criteria to sort dictionaries
$tabsqlsort = array();
// Field names in select result for dictionary display
$tabfield = array();
// Edit field names for editing a record
$tabfieldvalue = array();
// Field names in the table for inserting a record (add field "entity" only here when dictionary is ready to personalized by entity)
$tabfieldinsert = array();
// Rowid name of field depending if field is autoincrement on or off..
// Use "" if id field is "rowid" and has autoincrement on
// Use "nameoffield" if id field is not "rowid" or has not autoincrement on
$tabrowid = array();
// Condition to show dictionary in setup page
$tabcond = array();
// List of help for fields (no more used, help is defined into tabcomplete)
$tabhelp = array();
// Table to store complete information (will replace all other tables). Key is table name.
$tabcomplete = array('c_forme_juridique' => array('picto' => 'company', 'help' => array('code' => $langs->trans("EnterAnyCode"))), 'c_departements' => array('picto' => 'state', 'help' => array('code' => $langs->trans("EnterAnyCode"))), 'c_regions' => array('picto' => 'region', 'help' => array('code' => $langs->trans("EnterAnyCode"))), 'c_country' => array('picto' => 'country', 'help' => array('code' => $langs->trans("EnterAnyCode"))), 'c_civility' => array('picto' => 'contact', 'help' => array('code' => $langs->trans("EnterAnyCode"))), 'c_actioncomm' => array('picto' => 'action', 'help' => array('code' => $langs->trans("EnterAnyCode"), 'color' => $langs->trans("ColorFormat"), 'position' => $langs->trans("PositionIntoComboList"))), 'c_chargesociales' => array('picto' => 'bill', 'help' => array('code' => $langs->trans("EnterAnyCode"))), 'c_typent' => array('picto' => 'company', 'help' => array('code' => $langs->trans("EnterAnyCode"), 'position' => $langs->trans("PositionIntoComboList"))), 'c_currencies' => array('picto' => 'multicurrency', 'help' => array('code' => $langs->trans("EnterAnyCode"), 'unicode' => $langs->trans("UnicodeCurrency"))), 'c_tva' => array('picto' => 'bill', 'help' => array('code' => $langs->trans("EnterAnyCode"), 'taux' => $langs->trans("SellTaxRate"), 'recuperableonly' => $langs->trans("RecuperableOnly"), 'localtax1_type' => $langs->trans("LocalTaxDesc"), 'localtax2_type' => $langs->trans("LocalTaxDesc"))), 'c_type_contact' => array('picto' => 'contact', 'help' => array('code' => $langs->trans("EnterAnyCode"), 'position' => $langs->trans("PositionIntoComboList"))), 'c_payment_term' => array('picto' => 'bill', 'help' => array('code' => $langs->trans("EnterAnyCode"), 'type_cdr' => $langs->trans("TypeCdr", $langs->transnoentitiesnoconv("NbOfDays"), $langs->transnoentitiesnoconv("Offset"), $langs->transnoentitiesnoconv("NbOfDays"), $langs->transnoentitiesnoconv("Offset")))), 'c_paiement' => array('picto' => 'bill', 'help' => array('code' => $langs->trans("EnterAnyCode"))), 'c_ecotaxe' => array('picto' => 'bill', 'help' => array('code' => $langs->trans("EnterAnyCode"))), 'c_paper_format' => array('picto' => 'generic', 'help' => array('code' => $langs->trans("EnterAnyCode"))), 'c_prospectlevel' => array('picto' => 'company', 'help' => array('code' => $langs->trans("EnterAnyCode"))), 'c_type_fees' => array('picto' => 'trip', 'help' => array('code' => $langs->trans("EnterAnyCode"))), 'c_shipment_mode' => array('picto' => 'shipment', 'help' => array('code' => $langs->trans("EnterAnyCode"), 'tracking' => $langs->trans("UrlTrackingDesc"))), 'c_effectif' => array('picto' => 'company', 'help' => array('code' => $langs->trans("EnterAnyCode"))), 'c_input_method' => array('picto' => 'order', 'help' => array('code' => $langs->trans("EnterAnyCode"))), 'c_input_reason' => array('picto' => 'order', 'help' => array('code' => $langs->trans("EnterAnyCode"), 'position' => $langs->trans("PositionIntoComboList"))), 'c_availability' => array('picto' => 'shipment', 'help' => array('code' => $langs->trans("EnterAnyCode"))), 'c_revenuestamp' => array('picto' => 'bill', 'help' => array('revenuestamp_type' => $langs->trans('FixedOrPercent'))), 'c_type_resource' => array('picto' => 'resource', 'help' => array('code' => $langs->trans("EnterAnyCode"))), 'c_type_container' => array('picto' => 'website', 'help' => array('code' => $langs->trans("EnterAnyCode"))), 'c_stcomm' => array('picto' => 'company', 'help' => array('code' => $langs->trans("EnterAnyCode"), 'picto' => $langs->trans("PictoHelp"))), 'c_holiday_types' => array('picto' => 'holiday', 'help' => array('affect' => $langs->trans("FollowedByACounter"), 'delay' => $langs->trans("MinimumNoticePeriod"), 'newbymonth' => $langs->trans("NbAddedAutomatically"))), 'c_lead_status' => array('picto' => 'project', 'help' => array('code' => $langs->trans("EnterAnyCode"), 'percent' => $langs->trans("OpportunityPercent"), 'position' => $langs->trans("PositionIntoComboList"))), 'c_format_cards' => array('picto' => 'generic', 'help' => array('code' => $langs->trans("EnterAnyCode"), 'name' => $langs->trans("LabelName"), 'paper_size' => $langs->trans("LabelPaperSize"))), 'c_hrm_public_holiday' => array('picto' => 'holiday', 'help' => array('code' => $langs->trans("EnterAnyCode"), 'dayrule' => "Keep empty for a date defined with month and day (most common case).<br>Use a keyword like 'easter', 'eastermonday', ... for a date predefined by complex rules.", 'country' => $langs->trans("CountryIfSpecificToOneCountry"), 'year' => $langs->trans("ZeroMeansEveryYear"))), 'c_hrm_department' => array('picto' => 'hrm', 'help' => array('code' => $langs->trans("EnterAnyCode"))), 'c_hrm_function' => array('picto' => 'hrm', 'help' => array('code' => $langs->trans("EnterAnyCode"))), 'c_exp_tax_cat' => array('picto' => 'expensereport', 'help' => array()), 'c_exp_tax_range' => array('picto' => 'expensereport', 'help' => array('range_ik' => $langs->trans('PrevRangeToThisRange'))), 'c_units' => array('picto' => 'product', 'help' => array('code' => $langs->trans("EnterAnyCode"), 'unit_type' => $langs->trans('Measuringtype_durationDesc'), 'scale' => $langs->trans('MeasuringScaleDesc'))), 'c_socialnetworks' => array('picto' => 'share-alt', 'help' => array('code' => $langs->trans("EnterAnyCode"), 'url' => $langs->trans('UrlSocialNetworksDesc'), 'icon' => $langs->trans('FafaIconSocialNetworksDesc'))), 'c_prospectcontactlevel' => array('picto' => 'company', 'help' => array('code' => $langs->trans("EnterAnyCode"))), 'c_stcommcontact' => array('picto' => 'company', 'help' => array('code' => $langs->trans("EnterAnyCode"), 'picto' => $langs->trans("PictoHelp"))), 'c_transport_mode' => array('picto' => 'incoterm', 'help' => array('code' => $langs->trans("EnterAnyCode"))), 'c_product_nature' => array('picto' => 'product', 'help' => array('code' => $langs->trans("EnterAnyCode"))), 'c_productbatch_qcstatus' => array('picto' => 'lot', 'help' => array('code' => $langs->trans("EnterAnyCode"))), 'c_asset_disposal_type' => array('picto' => 'asset', 'help' => array('code' => $langs->trans("EnterAnyCode"))), 'c_invoice_subtype' => array('picto' => 'bill', 'help' => array('code' => $langs->trans("EnterAnyCode"))));
// Complete the table $tabcomplete
$i = 0;
$keytable = '';
$arrayofkeys = \array_keys($tabcomplete);
// Define elementList and sourceList (used for dictionary type of contacts "llx_c_type_contact")
$elementList = array();
$sourceList = array();
// Define type_vatList (used for dictionary "llx_c_tva")
$type_vatList = array("0" => $langs->trans("Sell") . '+' . $langs->trans("Buy"), "1" => $langs->trans("Sell"), "2" => $langs->trans("Buy"));
// Define localtax_typeList (used for dictionary "llx_c_tva")
$localtax_typeList = array(
    "0" => $langs->trans("No"),
    "1" => $langs->trans("Yes") . ' (' . $langs->trans("Type") . " 1)",
    //$langs->trans("%ageOnAllWithoutVAT"),
    "2" => $langs->trans("Yes") . ' (' . $langs->trans("Type") . " 2)",
    //$langs->trans("%ageOnAllBeforeVAT"),
    "3" => $langs->trans("Yes") . ' (' . $langs->trans("Type") . " 3)",
    //$langs->trans("%ageOnProductsWithoutVAT"),
    "4" => $langs->trans("Yes") . ' (' . $langs->trans("Type") . " 4)",
    //$langs->trans("%ageOnProductsBeforeVAT"),
    "5" => $langs->trans("Yes") . ' (' . $langs->trans("Type") . " 5)",
    //$langs->trans("%ageOnServiceWithoutVAT"),
    "6" => $langs->trans("Yes") . ' (' . $langs->trans("Type") . " 6)",
);
/*
 * Actions
 */
$object = new \stdClass();
$parameters = array('id' => $id, 'rowid' => $rowid, 'code' => $code, 'confirm' => $confirm, 'entity' => $entity, 'taborder' => $taborder, 'tabname' => $tabname, 'tablib' => $tablib, 'tabsql' => $tabsql, 'tabsqlsort' => $tabsqlsort, 'tabfield' => $tabfield, 'tabfieldvalue' => $tabfieldvalue, 'tabfieldinsert' => $tabfieldinsert, 'tabrowid' => $tabrowid, 'tabcond' => $tabcond, 'tabhelp' => $tabhelp, 'tabcomplete' => $tabcomplete);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$title = $langs->trans("DictionarySetup");
$linkback = '';
$titlepicto = 'title_setup';
$param = '&id=' . \urlencode((string) $id);
$paramwithsearch = $param;
// Complete search values request with sort criteria
$sqlfields = $tabsql[$id];
$tablecode = 't.code';
$tableprefix = '';
$tableprefixarray = array(\DICT_FORME_JURIDIQUE => 'f.code', \DICT_DEPARTEMENTS => 'd.code_departement', \DICT_REGIONS => 'r.code_region', \DICT_COUNTRY => 'c.code', \DICT_CIVILITY => 'c.code', \DICT_ACTIONCOMM => 'a.code', \DICT_CHARGESOCIALES => 'a.code', \DICT_TYPENT => 't.code', \DICT_CURRENCIES => 'c.code_iso', \DICT_ECOTAXE => 'e.code', \DICT_HOLIDAY_TYPES => 'h.code', \DICT_HRM_PUBLIC_HOLIDAY => 'a.code', \DICT_UNITS => 'r.code', \DICT_SOCIALNETWORKS => 's.code', 45 => 'f.code', 46 => 'f.code', 47 => 'f.code', 48 => 'f.code');
$reg = array();
$sql = $sqlfields;
// Count total nb of records
$nbtotalofrecords = '';
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$fieldlist = \explode(',', $tabfield[$id]);
$resql = $db->query($sql);
/**
 *	Show fields in insert/edit mode
 *
 * 	@param		string[]	$fieldlist		Array of fields
 * 	@param		?Object		$obj			If we show a particular record, obj is filled with record fields
 *  @param		string		$tabname		Name of SQL table
 *  @param		''|'add'|'edit'|'hide'	$context		'add'=Output field for the "add form", 'edit'=Output field for the "edit form", 'hide'=Output field for the "add form" but we don't want it to be rendered
 *	@return		string						'' or value of entity into table
 */
function dictFieldList($fieldlist, $obj = \null, $tabname = '', $context = '')
{
}