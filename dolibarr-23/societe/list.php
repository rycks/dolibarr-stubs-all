<?php

// Get parameters
$action = \GETPOST('action', 'aZ09');
$massaction = \GETPOST('massaction', 'alpha');
$show_files = \GETPOSTINT('show_files');
$confirm = \GETPOST('confirm', 'alpha');
$toselect = \GETPOST('toselect', 'array:int');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'thirdpartylist';
$optioncss = \GETPOST('optioncss', 'alpha');
$mode = \GETPOST("mode", 'alpha');
// Search fields
$search_all = \trim(\GETPOST('search_all', 'alphanohtml'));
$search_cti = \preg_replace('/^0+/', '', \preg_replace('/[^0-9]/', '', \GETPOST('search_cti', 'alphanohtml')));
// Phone number without any special chars
$search_id = \GETPOST("search_id", 'int');
$search_nom = \trim(\GETPOST("search_nom", 'restricthtml'));
$search_alias = \trim(\GETPOST("search_alias", 'restricthtml'));
$search_nom_only = \trim(\GETPOST("search_nom_only", 'restricthtml'));
$search_ref_ext = \trim(\GETPOST("search_ref_ext", 'restricthtml'));
$search_barcode = \trim(\GETPOST("search_barcode", 'alpha'));
$search_customer_code = \trim(\GETPOST('search_customer_code', 'alpha'));
$search_supplier_code = \trim(\GETPOST('search_supplier_code', 'alpha'));
$search_account_customer_code = \trim(\GETPOST('search_account_customer_code', 'alpha'));
$search_account_supplier_code = \trim(\GETPOST('search_account_supplier_code', 'alpha'));
$search_address = \trim(\GETPOST('search_address', 'alpha'));
$search_zip = \trim(\GETPOST("search_zip", 'alpha'));
$search_town = \trim(\GETPOST("search_town", 'alpha'));
$search_state = \trim(\GETPOST("search_state", 'alpha'));
$search_region = \trim(\GETPOST("search_region", 'alpha'));
$search_email = \trim(\GETPOST('search_email', 'alpha'));
$search_noemail = \trim(\GETPOST('search_noemail', 'alpha'));
$search_phone = \trim(\GETPOST('search_phone', 'alpha'));
$search_phone_mobile = \trim(\GETPOST('search_phone_mobile', 'alpha'));
$search_fax = \trim(\GETPOST('search_fax', 'alpha'));
$search_url = \trim(\GETPOST('search_url', 'alpha'));
$search_idprof1 = \trim(\GETPOST('search_idprof1', 'alpha'));
$search_idprof2 = \trim(\GETPOST('search_idprof2', 'alpha'));
$search_idprof3 = \trim(\GETPOST('search_idprof3', 'alpha'));
$search_idprof4 = \trim(\GETPOST('search_idprof4', 'alpha'));
$search_idprof5 = \trim(\GETPOST('search_idprof5', 'alpha'));
$search_idprof6 = \trim(\GETPOST('search_idprof6', 'alpha'));
$search_vat = \trim(\GETPOST('search_vat', 'alpha'));
$search_sale = "";
$search_categ_cus = \GETPOSTINT("search_categ_cus");
$search_categ_sup = \GETPOSTINT("search_categ_sup");
$searchCategoryCustomerOperator = \GETPOSTINT('search_category_customer_operator');
$searchCategorySupplierOperator = \GETPOSTINT('search_category_supplier_operator');
$searchCategoryCustomerList = \GETPOST('search_category_customer_list', 'array:int');
$searchCategorySupplierList = \GETPOST('search_category_supplier_list', 'array:int');
$search_country = \GETPOST("search_country", 'aZ09');
$search_type_thirdparty = \GETPOST("search_type_thirdparty", 'intcomma');
$search_price_level = \GETPOST('search_price_level', 'int');
$search_staff = \GETPOST("search_staff", 'int');
$search_legalform = \GETPOST("search_legalform", 'int');
$search_status = \GETPOST("search_status", 'intcomma');
$search_type = \GETPOST('search_type', 'alpha');
$search_level = \GETPOST("search_level", "array:alpha");
$search_stcomm = \GETPOST('search_stcomm', "array:int");
$search_import_key = \trim(\GETPOST("search_import_key", "alpha"));
$search_parent_name = \trim(\GETPOST('search_parent_name', 'alpha'));
$search_note_public = \GETPOST('search_note_public', 'alphanohtml');
$search_note_private = \GETPOST('search_note_private', 'alphanohtml');
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
$type = \GETPOST('type', 'alpha');
$place = \GETPOST('place', 'aZ09') ? \GETPOST('place', 'aZ09') : '0';
// $place is string id of table for Bar or Restaurant
$diroutputmassaction = $conf->societe->dir_output . '/temp/massgeneration/' . $user->id;
// Load variable for pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
// Initialize a technical objects to manage hooks of page. Note that conf->hooks_modules contains an array of hook context
$object = new \Societe($db);
$extrafields = new \ExtraFields($db);
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
// List of fields to search into when doing a "search in all"
$fieldstosearchall = array('s.nom' => "ThirdPartyName", 's.name_alias' => "AliasNameShort", 's.code_client' => "CustomerCode", 's.code_fournisseur' => "SupplierCode", 's.code_compta' => "CustomerAccountancyCodeShort", 's.code_compta_fournisseur' => "SupplierAccountancyCodeShort", 's.zip' => "Zip", 's.town' => "Town", 's.email' => "EMail", 's.url' => "URL", 's.tva_intra' => "VATIntra", 's.siren' => "ProfId1", 's.siret' => "ProfId2", 's.ape' => "ProfId3", 's.phone' => "Phone", 's.phone_mobile' => "PhoneMobile", 's.fax' => "Fax");
$parameters = array('fieldstosearchall' => $fieldstosearchall);
$reshook = $hookmanager->executeHooks('completeFieldsToSearchAll', $parameters, $object, $action);
// Define list of fields to show into list
$checkedcustomercode = \in_array($contextpage, array('thirdpartylist', 'customerlist', 'prospectlist', 'poslist')) ? '1' : '0';
$checkedsuppliercode = \in_array($contextpage, array('supplierlist')) ? '1' : '0';
$checkedcustomeraccountcode = \in_array($contextpage, array('customerlist')) ? '1' : '0';
$checkedsupplieraccountcode = \in_array($contextpage, array('supplierlist')) ? '1' : '0';
$checkedtypetiers = '1';
$checkedprofid1 = '0';
$checkedprofid2 = '0';
$checkedprofid3 = '0';
$checkedprofid4 = '0';
$checkedprofid5 = '0';
$checkedprofid6 = '0';
//$checkedprofid4=((($tmp = $langs->transnoentities("ProfId4".$mysoc->country_code)) && $tmp != "ProfId4".$mysoc->country_code && $tmp != '-') ? '1' : '0');
//$checkedprofid5=((($tmp = $langs->transnoentities("ProfId5".$mysoc->country_code)) && $tmp != "ProfId5".$mysoc->country_code && $tmp != '-') ? '1' : '0');
//$checkedprofid6=((($tmp = $langs->transnoentities("ProfId6".$mysoc->country_code)) && $tmp != "ProfId6".$mysoc->country_code && $tmp != '-') ? '1' : '0');
$checkprospectlevel = \in_array($contextpage, array('prospectlist')) ? '1' : '0';
$checkstcomm = \in_array($contextpage, array('prospectlist')) ? '1' : '0';
$arrayfields = array('s.rowid' => array('label' => "TechnicalID", 'position' => 1, 'checked' => '-1', 'enabled' => '1'), 's.nom' => array('label' => "ThirdPartyName", 'position' => 2, 'checked' => '1'), 's.name_alias' => array('label' => "AliasNameShort", 'position' => 3, 'checked' => '1'), 's.ref_ext' => array('label' => "RefExt", 'position' => 4, 'checked' => '-1', 'enabled' => (string) \getDolGlobalInt('MAIN_LIST_SHOW_REF_EXT')), 's.barcode' => array('label' => "Gencod", 'position' => 5, 'checked' => '1', 'enabled' => (string) (int) \isModEnabled('barcode')), 's.code_client' => array('label' => "CustomerCodeShort", 'position' => 10, 'checked' => $checkedcustomercode), 's.code_fournisseur' => array('label' => "SupplierCodeShort", 'position' => 11, 'checked' => $checkedsuppliercode, 'enabled' => (string) (int) (\isModEnabled("supplier_order") || \isModEnabled("supplier_invoice"))), 's.code_compta' => array('label' => "CustomerAccountancyCodeShort", 'position' => 13, 'checked' => $checkedcustomeraccountcode), 's.code_compta_fournisseur' => array('label' => "SupplierAccountancyCodeShort", 'position' => 14, 'checked' => $checkedsupplieraccountcode, 'enabled' => (string) (int) (\isModEnabled("supplier_order") || \isModEnabled("supplier_invoice"))), 's.address' => array('label' => "Address", 'position' => 19, 'checked' => '0'), 's.zip' => array('label' => "Zip", 'position' => 20, 'checked' => '1'), 's.town' => array('label' => "Town", 'position' => 21, 'checked' => '0'), 'state.nom' => array('label' => "State", 'position' => 22, 'checked' => '0'), 'region.nom' => array('label' => "Region", 'position' => 23, 'checked' => '0'), 'country.code_iso' => array('label' => "Country", 'position' => 24, 'checked' => '0'), 's.email' => array('label' => "Email", 'position' => 25, 'checked' => '0'), 'su.noemail' => array('label' => "No_Email", 'position' => 26, 'checked' => '0'), 's.url' => array('label' => "Url", 'position' => 26, 'checked' => '0'), 's.phone' => array('label' => "Phone", 'position' => 27, 'checked' => '1'), 's.fax' => array('label' => "Fax", 'position' => 28, 'checked' => '0'), 'typent.code' => array('label' => "ThirdPartyType", 'position' => 29, 'checked' => $checkedtypetiers), 'staff.code' => array('label' => "Workforce", 'position' => 31, 'checked' => '0'), 'legalform.code' => array('label' => 'JuridicalStatus', 'position' => 32, 'checked' => '0'), 's.phone_mobile' => array('label' => "PhoneMobile", 'position' => 35, 'checked' => '0'), 's.siren' => array('label' => "ProfId1Short", 'position' => 40, 'checked' => $checkedprofid1), 's.siret' => array('label' => "ProfId2Short", 'position' => 41, 'checked' => $checkedprofid2), 's.ape' => array('label' => "ProfId3Short", 'position' => 42, 'checked' => $checkedprofid3), 's.idprof4' => array('label' => "ProfId4Short", 'position' => 43, 'checked' => $checkedprofid4), 's.idprof5' => array('label' => "ProfId5Short", 'position' => 44, 'checked' => $checkedprofid5), 's.idprof6' => array('label' => "ProfId6Short", 'position' => 45, 'checked' => $checkedprofid6), 's.tva_intra' => array('label' => "VATIntraShort", 'position' => 50, 'checked' => '0'), 'customerorsupplier' => array('label' => 'NatureOfThirdParty', 'position' => 61, 'checked' => '1'), 's.fk_prospectlevel' => array('label' => "ProspectLevel", 'position' => 62, 'checked' => $checkprospectlevel), 's.fk_stcomm' => array('label' => "StatusProsp", 'position' => 63, 'checked' => $checkstcomm), 's2.nom' => array('label' => 'ParentCompany', 'position' => 64, 'checked' => '0'), 's.ip' => array('type' => 'ip', 'label' => "IPAddress", 'checked' => '-2', 'position' => 500), 's.datec' => array('label' => "DateCreation", 'checked' => '0', 'position' => 501), 's.tms' => array('label' => "DateModificationShort", 'checked' => '0', 'position' => 505), 's.note_public' => array('label' => 'NotePublic', 'checked' => '0', 'position' => 520, 'enabled' => (string) (int) (!\getDolGlobalInt('MAIN_LIST_HIDE_PUBLIC_NOTES'))), 's.note_private' => array('label' => 'NotePrivate', 'checked' => '0', 'position' => 521, 'enabled' => (string) (int) (!\getDolGlobalInt('MAIN_LIST_HIDE_PRIVATE_NOTES'))), 's.status' => array('label' => "Status", 'checked' => '1', 'position' => 1000), 's.import_key' => array('label' => "ImportId", 'checked' => '0', 'position' => 1100));
// @phpstan-ignore-next-line
$arrayfields = \dol_sort_array($arrayfields, 'position');
// Security check
$socid = \GETPOSTINT('socid');
$result = \restrictedArea($user, 'societe', $socid, '');
$permissiontoadd = $user->hasRight('societe', 'lire');
$parameters = array('arrayfields' => &$arrayfields);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
// Mass actions
$objectclass = 'Societe';
$objectlabel = 'ThirdParty';
$permissiontoread = $user->hasRight('societe', 'lire');
$permissiontodelete = $user->hasRight('societe', 'supprimer');
$permissiontoadd = $user->hasRight("societe", "creer");
$uploaddir = $conf->societe->dir_output;
/*
 * View
 */
/*
REM: Rules on permissions to see thirdparties
Internal or External user + No permission to see customers => See nothing
Internal user socid=0 + Permission to see ALL customers    => See all thirdparties
Internal user socid=0 + No permission to see ALL customers => See only thirdparties linked to user that are sale representative
External user socid=x + Permission to see ALL customers    => Can see only himself
External user socid=x + No permission to see ALL customers => Can see only himself
*/
$form = new \Form($db);
$formother = new \FormOther($db);
$companystatic = new \Societe($db);
$companyparent = new \Societe($db);
$formcompany = new \FormCompany($db);
$prospectstatic = new \Client($db);
$now = \dol_now();
$title = $langs->trans("ThirdParties");
$help_url = 'EN:Module_Third_Parties|FR:Module_Tiers|ES:Empresas';
// Select every potentials, and note each potentials which fit in search parameters
$tab_level = array();
$sql = "SELECT code, label, sortorder";
$resql = $db->query($sql);
// Build and execute select
// --------------------------------------------------------------------
$sql = "SELECT s.rowid, s.nom as name, s.name_alias, s.ref_ext, s.barcode, s.address, s.town, s.zip, s.datec, s.code_client, s.code_fournisseur, s.logo,";
// Add fields from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListSelect', $parameters, $object, $action);
$sql = \preg_replace('/,\\s*$/', '', $sql);
//$sql .= ", COUNT(rc.rowid) as anotherfield";
$sqlfields = $sql;
// Add table from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListFrom', $parameters, $object, $action);
$search_sale_req = \array_filter($search_sale, function (string $value) : bool {
    $value = \intval($value);
    return $value >= 0;
});
$search_sale_req = \implode(',', $search_sale_req);
$searchCategoryCustomerSqlList = array();
$listofcategoryid = '';
$searchCategorySupplierSqlList = array();
$listofcategoryid = '';
// Filter on type of thirdparty
$reshook = $hookmanager->executeHooks('filterType', array('search_type' => $search_type), $sql);
// Add where from hooks
$parameters = array('socid' => $socid, 'sql' => $sql);
$reshook = $hookmanager->executeHooks('printFieldListWhere', $parameters, $object, $action);
// Add GroupBy from hooks
$parameters = array('fieldstosearchall' => $fieldstosearchall);
$reshook = $hookmanager->executeHooks('printFieldListGroupBy', $parameters, $object, $action);
// Count total nb of records
$nbtotalofrecords = '';
/* The fast and low memory method to get and count full list converts the sql into a sql count */
$sqlforcount = \preg_replace('/^' . \preg_quote($sqlfields, '/') . '/', 'SELECT COUNT(*) as nbtotalofrecords', $sql);
$sqlforcount = \preg_replace('/GROUP BY .*$/', '', $sqlforcount);
$resql = $db->query($sqlforcount);
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$obj = $db->fetch_object($resql);
$id = $obj->rowid;
// Output page
// --------------------------------------------------------------------
$paramsCat = '';
$arrayofselected = \is_array($toselect) ? $toselect : array();
$param = '';
// Add $param from hooks
$parameters = array('param' => &$param);
$reshook = $hookmanager->executeHooks('printFieldListSearchParam', $parameters, $object, $action);
// List of mass actions available
$arrayofmassactions = array('presend' => \img_picto('', 'email', 'class="pictofixedwidth"') . $langs->trans("SendByMail"));
$massactionbutton = $form->selectMassAction('', $arrayofmassactions);
$typefilter = '';
$label = 'MenuNewThirdParty';
$typefilter = '&amp;type=' . $type;
$newcardbutton = '';
$parameters = array();
$reshook = $hookmanager->executeHooks('printNewCardButton', $parameters, $object);
$textprofid = array();
// Add code for pre mass action (confirmation or email presend form)
$topicmail = "Information";
$modelmail = "thirdparty";
$objecttmp = new \Societe($db);
$trackid = 'thi' . $object->id;
$moreforfilter = '';
// If the user can view prospects other than his'
$userlist = $form->select_dolusers('', '', 0, \null, 0, '', '', '0', 0, 0, 'u.statut:=:1', 0, '', '', 0, 1);
$varpage = empty($contextpage) ? $_SERVER["PHP_SELF"] : $contextpage;
$htmlofselectarray = $form->multiSelectArrayWithCheckbox('selectedfields', $arrayfields, $varpage, $conf->main_checkbox_left_column);
// This also change content of $arrayfields with user setup
$selectedfields = $mode != 'kanban' ? $htmlofselectarray : '';
$reshook = $hookmanager->executeHooks('selectProspectCustomerType', array('client_type' => $search_type));
// Fields from hook
$parameters = array('arrayfields' => $arrayfields);
$reshook = $hookmanager->executeHooks('printFieldListOption', $parameters, $object, $action);
$totalarray = array();
// Hook fields
$parameters = array('arrayfields' => $arrayfields, 'param' => $param, 'sortfield' => $sortfield, 'sortorder' => $sortorder);
$reshook = $hookmanager->executeHooks('printFieldListTitle', $parameters, $object, $action);
// Loop on record
// --------------------------------------------------------------------
$i = 0;
$savnbfield = $totalarray['nbfield'];
$totalarray = array();
$imaxinloop = $limit ? \min($num, $limit) : $num;
$parameters = array('arrayfields' => $arrayfields, 'sql' => $sql);
$reshook = $hookmanager->executeHooks('printFieldListFooter', $parameters, $object, $action);