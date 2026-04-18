<?php

$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'shipmentlist';
// To manage different context of search
$socid = \GETPOSTINT('socid');
$action = \GETPOST('action', 'alpha');
$massaction = \GETPOST('massaction', 'alpha');
$toselect = \GETPOST('toselect', 'array:int');
$show_files = \GETPOSTINT('show_files');
$optioncss = \GETPOST('optioncss', 'alpha');
$mode = \GETPOST('mode', 'alpha');
$search_ref_rcp = \GETPOST("search_ref_rcp");
$search_ref_liv = \GETPOST('search_ref_liv');
$search_ref_supplier = \GETPOST('search_ref_supplier');
$search_company = \GETPOST("search_company");
$search_town = \GETPOST('search_town', 'alpha');
$search_zip = \GETPOST('search_zip', 'alpha');
$search_state = \GETPOST("search_state");
$search_country = \GETPOST("search_country", 'aZ09');
$search_type_thirdparty = \GETPOST("search_type_thirdparty", 'intcomma');
$search_date_delivery_startday = \GETPOSTINT('search_date_delivery_startday');
$search_date_delivery_startmonth = \GETPOSTINT('search_date_delivery_startmonth');
$search_date_delivery_startyear = \GETPOSTINT('search_date_delivery_startyear');
$search_date_delivery_endday = \GETPOSTINT('search_date_delivery_endday');
$search_date_delivery_endmonth = \GETPOSTINT('search_date_delivery_endmonth');
$search_date_delivery_endyear = \GETPOSTINT('search_date_delivery_endyear');
$search_date_delivery_start = \dol_mktime(0, 0, 0, $search_date_delivery_startmonth, $search_date_delivery_startday, $search_date_delivery_startyear);
// Use tzserver
$search_date_delivery_end = \dol_mktime(23, 59, 59, $search_date_delivery_endmonth, $search_date_delivery_endday, $search_date_delivery_endyear);
$search_date_create_startday = \GETPOSTINT('search_date_create_startday');
$search_date_create_startmonth = \GETPOSTINT('search_date_create_startmonth');
$search_date_create_startyear = \GETPOSTINT('search_date_create_startyear');
$search_date_create_endday = \GETPOSTINT('search_date_create_endday');
$search_date_create_endmonth = \GETPOSTINT('search_date_create_endmonth');
$search_date_create_endyear = \GETPOSTINT('search_date_create_endyear');
$search_date_create_start = \dol_mktime(0, 0, 0, $search_date_create_startmonth, $search_date_create_startday, $search_date_create_startyear);
// Use tzserver
$search_date_create_end = \dol_mktime(23, 59, 59, $search_date_create_endmonth, $search_date_create_endday, $search_date_create_endyear);
$search_billed = \GETPOST("search_billed", 'intcomma');
$search_status = \GETPOST('search_status', 'intcomma');
$search_all = \GETPOST('search_all', 'alphanohtml');
$search_note_private = \GETPOST('search_note_private', 'alpha');
$search_note_public = \GETPOST('search_note_public', 'alpha');
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$diroutputmassaction = $conf->reception->multidir_output[$conf->entity] . '/temp/massgeneration/' . $user->id;
$object = new \Reception($db);
$extrafields = new \ExtraFields($db);
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
// List of fields to search into when doing a "search in all"
$fieldstosearchall = array('e.ref' => "Ref", 'e.ref_supplier' => "RefSupplier", 's.nom' => "ThirdParty", 'e.note_public' => 'NotePublic');
$checkedtypetiers = '0';
$arrayfields = array('e.ref' => array('label' => $langs->trans("Ref"), 'checked' => '1'), 'e.ref_supplier' => array('label' => $langs->trans("RefSupplier"), 'checked' => '1'), 's.nom' => array('label' => $langs->trans("ThirdParty"), 'checked' => '1'), 's.town' => array('label' => $langs->trans("Town"), 'checked' => '1'), 's.zip' => array('label' => $langs->trans("Zip"), 'checked' => '1'), 'state.nom' => array('label' => $langs->trans("StateShort"), 'checked' => '0'), 'country.code_iso' => array('label' => $langs->trans("Country"), 'checked' => '0'), 'typent.code' => array('label' => $langs->trans("ThirdPartyType"), 'checked' => $checkedtypetiers), 'e.date_delivery' => array('label' => $langs->trans("DateDeliveryPlanned"), 'checked' => '1'), 'e.datec' => array('label' => $langs->trans("DateCreation"), 'checked' => '0', 'position' => 500), 'e.tms' => array('label' => $langs->trans("DateModificationShort"), 'checked' => '0', 'position' => 500), 'e.note_public' => array('label' => 'NotePublic', 'checked' => '0', 'position' => 520, 'enabled' => \getDolGlobalInt('MAIN_LIST_HIDE_PUBLIC_NOTES') ? '0' : '1'), 'e.note_private' => array('label' => 'NotePrivate', 'checked' => '0', 'position' => 521, 'enabled' => \getDolGlobalInt('MAIN_LIST_HIDE_PRIVATE_NOTES') ? '0' : '1'), 'e.fk_statut' => array('label' => $langs->trans("Status"), 'checked' => '1', 'position' => 1000), 'e.billed' => array('label' => $langs->trans("Billed"), 'checked' => '1', 'position' => 1000, 'enabled' => 'getDolGlobalString("WORKFLOW_BILL_ON_RECEPTION") !== "0"'));
$arrayfields = \dol_sort_array($arrayfields, 'position');
$error = 0;
// Security check
$receptionid = \GETPOSTINT('id');
$result = \restrictedArea($user, 'reception', $receptionid, '');
$parameters = array('socid' => $socid, 'arrayfields' => &$arrayfields);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
// Mass actions
$objectclass = 'Reception';
$objectlabel = 'Receptions';
$permissiontoread = $user->hasRight('reception', 'lire');
$permissiontoadd = $user->hasRight('reception', 'creer');
$permissiontodelete = $user->hasRight('reception', 'supprimer');
$uploaddir = $conf->reception->multidir_output[$conf->entity];
/*
 * View
 */
$now = \dol_now();
$form = new \Form($db);
$companystatic = new \Societe($db);
$reception = new \Reception($db);
$formcompany = new \FormCompany($db);
$formfile = new \FormFile($db);
$title = $langs->trans('Receptions');
$helpurl = 'EN:Module_Receptions|FR:Module_Receptions|ES:M&oacute;dulo_Receptiones';
$sql = "SELECT e.rowid, e.ref, e.ref_supplier, e.date_reception as date_reception, e.date_delivery as delivery_date, l.date_delivery as date_reception2, e.fk_statut as status, e.billed,e.note_private, e.note_public,";
// Add fields from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListSelect', $parameters);
$sqlfields = $sql;
// Add table from hooks
$parameters = array();
// @phan-suppress-next-line PhanTypeMismatchArgumentNullable
$reshook = $hookmanager->executeHooks('printFieldListFrom', $parameters, $object);
// Add where from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListWhere', $parameters);
// Add HAVING from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListHaving', $parameters, $object);
$nbtotalofrecords = '';
/* The fast and low memory method to get and count full list converts the sql into a sql count */
$sqlforcount = \preg_replace('/^' . \preg_quote($sqlfields, '/') . '/', 'SELECT COUNT(*) as nbtotalofrecords', $sql);
$sqlforcount = \preg_replace('/GROUP BY .*$/', '', $sqlforcount);
$resql = $db->query($sqlforcount);
//print $sql;
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$reception = new \Reception($db);
$arrayofselected = \is_array($toselect) ? $toselect : array();
$param = '';
$arrayofmassactions = array('builddoc' => \img_picto('', 'pdf', 'class="pictofixedwidth"') . $langs->trans("PDFMerge"));
$massactionbutton = $form->selectMassAction('', $arrayofmassactions);
// Currently: a sending can't create from sending list
// $url = DOL_URL_ROOT.'/expedition/card.php?action=create';
// if (!empty($socid)) $url .= '&socid='.$socid;
// $newcardbutton = dolGetButtonTitle($langs->trans('NewSending'), '', 'fa fa-plus-circle', $url, '', $user->rights->expedition->creer);
$newcardbutton = '';
$i = 0;
$moreforfilter = '';
$varpage = empty($contextpage) ? $_SERVER["PHP_SELF"] : $contextpage;
$selectedfields = $form->multiSelectArrayWithCheckbox('selectedfields', $arrayfields, $varpage, \getDolGlobalString('MAIN_CHECKBOX_LEFT_COLUMN'));
// Fields from hook
$parameters = array('arrayfields' => $arrayfields);
$reshook = $hookmanager->executeHooks('printFieldListOption', $parameters);
$totalarray = array();
// Hook fields
$parameters = array('arrayfields' => $arrayfields, 'param' => $param, 'sortfield' => $sortfield, 'sortorder' => $sortorder, '$totalarray' => &$totalarray);
$reshook = $hookmanager->executeHooks('printFieldListTitle', $parameters, $object);
// Loop on record
// --------------------------------------------------------------------
$i = 0;
$savnbfield = $totalarray['nbfield'];
$totalarray = array();
$imaxinloop = $limit ? \min($num, $limit) : $num;
$parameters = array('arrayfields' => $arrayfields, 'totalarray' => $totalarray, 'sql' => $sql);
$reshook = $hookmanager->executeHooks('printFieldListFooter', $parameters);
$hidegeneratedfilelistifempty = 1;
// Show list of available documents
$urlsource = $_SERVER['PHP_SELF'] . '?sortfield=' . $sortfield . '&sortorder=' . $sortorder;
$filedir = $diroutputmassaction;
$genallowed = $user->hasRight('reception', 'lire');
$delallowed = $user->hasRight('reception', 'creer');
$title = '';