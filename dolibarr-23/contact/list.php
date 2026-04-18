<?php

$socialnetworks = \getArrayOfSocialNetworks();
// Get parameters
$action = \GETPOST('action', 'aZ09');
$massaction = \GETPOST('massaction', 'alpha');
$show_files = \GETPOSTINT('show_files');
$confirm = \GETPOST('confirm', 'alpha');
$toselect = \GETPOST('toselect', 'array:int');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'contactlist';
$optioncss = \GETPOST('optioncss', 'alpha');
$mode = \GETPOST('mode', 'alpha');
$id = \GETPOSTINT('id');
$contactid = \GETPOSTINT('id');
$ref = '';
// There is no ref for contacts
// Search fields
$search_all = \trim(\GETPOST('search_all', 'alphanohtml'));
$search_cti = \preg_replace('/^0+/', '', \preg_replace('/[^0-9]/', '', \GETPOST('search_cti', 'alphanohtml')));
// Phone number without any special chars
$search_phone = \GETPOST("search_phone", 'alpha');
$search_id = \GETPOST("search_id", "intcomma");
$search_ref_ext = \GETPOST("search_ref_ext", "alpha");
$search_firstlast_only = \GETPOST("search_firstlast_only", 'alpha');
$search_lastname = \GETPOST("search_lastname", 'alpha');
$search_firstname = \GETPOST("search_firstname", 'alpha');
$search_societe = \GETPOST("search_societe", 'alpha');
$search_societe_alias = \GETPOST("search_societe_alias", 'alpha');
$search_poste = \GETPOST("search_poste", 'alpha');
$search_phone_perso = \GETPOST("search_phone_perso", 'alpha');
$search_phone_pro = \GETPOST("search_phone_pro", 'alpha');
$search_phone_mobile = \GETPOST("search_phone_mobile", 'alpha');
$search_fax = \GETPOST("search_fax", 'alpha');
$search_email = \GETPOST("search_email", 'alpha');
$search_ = array();
$search_priv = \GETPOST("search_priv", 'alpha');
$search_sale = \GETPOST('search_sale', 'intcomma');
$search_categ = \GETPOST("search_categ", 'intcomma');
$search_categ_thirdparty = \GETPOST("search_categ_thirdparty", 'intcomma');
$search_categ_supplier = \GETPOST("search_categ_supplier", 'intcomma');
$search_status = \GETPOST("search_status", "intcomma");
$search_type = \GETPOST('search_type', 'alpha');
$search_address = \GETPOST('search_address', 'alpha');
$search_zip = \GETPOST('search_zip', 'alpha');
$search_town = \GETPOST('search_town', 'alpha');
$search_import_key = \GETPOST("search_import_key", 'alpha');
$search_country = \GETPOST("search_country", 'aZ09');
$search_roles = \GETPOST("search_roles", 'array');
$search_level = \GETPOST("search_level", 'array');
$search_stcomm = \GETPOST('search_stcomm', 'intcomma');
$search_birthday_start = \dol_mktime(0, 0, 0, \GETPOSTINT('search_birthday_startmonth'), \GETPOSTINT('search_birthday_startday'), \GETPOSTINT('search_birthday_startyear'));
$search_birthday_end = \dol_mktime(23, 59, 59, \GETPOSTINT('search_birthday_endmonth'), \GETPOSTINT('search_birthday_endday'), \GETPOSTINT('search_birthday_endyear'));
$search_note_public = \GETPOST('search_note_public', 'alphanohtml');
$search_note_private = \GETPOST('search_note_private', 'alphanohtml');
$optioncss = \GETPOST('optioncss', 'alpha');
$place = \GETPOST('place', 'aZ09') ? \GETPOST('place', 'aZ09') : '0';
// $place is string id of table for Bar or Restaurant
$type = \GETPOST("type", 'aZ');
$view = \GETPOST("view", 'alpha');
$userid = \GETPOSTINT('userid');
$begin = \GETPOST('begin');
// Load variable for pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$title = \getDolGlobalString('SOCIETE_ADDRESSES_MANAGEMENT') ? $langs->trans("Contacts") : $langs->trans("ContactsAddresses");
// Initialize a technical object
$object = new \Contact($db);
$extrafields = new \ExtraFields($db);
$result = \restrictedArea($user, 'contact', $contactid, '');
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
// List of fields to search into when doing a "search in all"
$fieldstosearchall = array();
$parameters = array('fieldstosearchall' => $fieldstosearchall);
$reshook = $hookmanager->executeHooks('completeFieldsToSearchAll', $parameters, $object, $action);
// Definition of array of fields for columns
$arrayfields = array();
//$arrayfields['anotherfield'] = array('type'=>'integer', 'label'=>'AnotherField', 'checked'=>1, 'enabled'=>1, 'position'=>90, 'csslist'=>'right');
$arrayfields = \dol_sort_array($arrayfields, 'position');
$result = $object->fetch($id, $ref);
$permissiontoread = $user->hasRight('societe', 'contact', 'lire');
$permissiontodelete = $user->hasRight('societe', 'contact', 'supprimer');
$permissiontoadd = $user->hasRight('societe', 'contact', 'creer');
// Change customer for TakePOS
$idcustomer = \GETPOSTINT('idcustomer');
$idcontact = \GETPOSTINT('idcontact');
// Check if draft invoice already exists, if not create it
$sql = "SELECT rowid FROM " . \MAIN_DB_PREFIX . "facture where ref='(PROV-POS" . $_SESSION["takeposterminal"] . "-" . $place . ")' AND entity IN (" . \getEntity('invoice') . ")";
$result = $db->query($sql);
$num_lines = $db->num_rows($result);
$sql = "UPDATE " . \MAIN_DB_PREFIX . "facture set fk_soc=" . (int) $idcustomer . " where ref='(PROV-POS" . $_SESSION["takeposterminal"] . "-" . $place . ")'";
$resql = $db->query($sql);
$parameters = array('arrayfields' => &$arrayfields);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
// Mass actions
$objectclass = 'Contact';
$objectlabel = 'Contact';
$uploaddir = $conf->societe->dir_output;
/*
 * View
 */
$form = new \Form($db);
$formother = new \FormOther($db);
$formcompany = new \FormCompany($db);
$contactstatic = new \Contact($db);
$title = $langs->trans("ContactsAddresses");
$help_url = 'EN:Module_Third_Parties|FR:Module_Tiers|ES:M&oacute;dulo_Empresas';
$morejs = array();
$morecss = array();
$varpage = empty($contextpage) ? $_SERVER["PHP_SELF"] : $contextpage;
$selectedfields = $form->multiSelectArrayWithCheckbox('selectedfields', $arrayfields, $varpage);
// This also change content of $arrayfields
// Select every potentials, and note each potentials which fit in search parameters
$tab_level = array();
$sql = "SELECT code, label, sortorder";
$resql = $db->query($sql);
// Build and execute select
// --------------------------------------------------------------------
$sql = "SELECT s.rowid as socid, s.nom as name, s.name_alias as alias,";
// Add fields from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListSelect', $parameters, $object, $action);
$sql = \preg_replace('/,\\s*$/', '', $sql);
$sqlfields = $sql;
// Add fields from hooks - ListFrom
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListFrom', $parameters, $object, $action);
// Search Contact Categories
$searchCategoryContactList = $search_categ ? array($search_categ) : array();
$searchCategoryContactOperator = 0;
$searchCategoryContactSqlList = array();
$listofcategoryid = '';
// Search Customer Categories
$searchCategoryCustomerList = $search_categ_thirdparty ? array($search_categ_thirdparty) : array();
$searchCategoryCustomerOperator = 0;
$searchCategoryCustomerSqlList = array();
$listofcategoryid = '';
// Search Supplier Categories
$searchCategorySupplierList = $search_categ_supplier ? array($search_categ_supplier) : array();
$searchCategorySupplierOperator = 0;
$searchCategorySupplierSqlList = array();
$listofcategoryid = '';
// Add where from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListWhere', $parameters, $object, $action);
//print $sql;
// Add GroupBy from hooks
$parameters = array('fieldstosearchall' => $fieldstosearchall);
$reshook = $hookmanager->executeHooks('printFieldListGroupBy', $parameters, $object, $action);
//print $sql;
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
// List of mass actions available
$arrayofmassactions = array('presend' => \img_picto('', 'email', 'class="pictofixedwidth"') . $langs->trans("SendByMail"));
$massactionbutton = '';
$newcardbutton = '';
$parameters = array();
$reshook = $hookmanager->executeHooks('printNewCardButton', $parameters, $object);
$topicmail = "Information";
$modelmail = "contact";
$objecttmp = new \Contact($db);
$trackid = 'ctc' . $object->id;
$moreforfilter = '';
$tmptitle = $langs->trans('ContactCategoriesShort');
$parameters = array('type' => $type);
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
$imaxinloop = $limit ? \min($num, $limit) : $num;
$parameters = array('arrayfields' => $arrayfields, 'sql' => $sql);
$reshook = $hookmanager->executeHooks('printFieldListFooter', $parameters, $object, $action);