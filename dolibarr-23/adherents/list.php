<?php

// Get parameters
$action = \GETPOST('action', 'aZ09');
$massaction = \GETPOST('massaction', 'alpha');
$show_files = \GETPOSTINT('show_files');
$confirm = \GETPOST('confirm', 'alpha');
$cancel = \GETPOST('cancel', 'alpha');
$toselect = \GETPOST('toselect', 'array:int');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'memberslist';
// To manage different context of search
$backtopage = \GETPOST('backtopage', 'alpha');
$optioncss = \GETPOST('optioncss', 'aZ');
$mode = \GETPOST('mode', 'alpha');
$groupby = \GETPOST('groupby', 'aZ09');
// Example: $groupby = 'p.fk_opp_status' or $groupby = 'p.fk_statut'
// Search fields
$search = \GETPOST("search", 'alpha');
$search_id = \GETPOST('search_id', 'int');
$search_ref = \GETPOST("search_ref", 'alpha');
$search_lastname = \GETPOST("search_lastname", 'alpha');
$search_firstname = \GETPOST("search_firstname", 'alpha');
$search_gender = \GETPOST("search_gender", 'alpha');
$search_civility = \GETPOST("search_civility", 'alpha');
$search_company = \GETPOST('search_company', 'alphanohtml');
$search_login = \GETPOST("search_login", 'alpha');
$search_address = \GETPOST("search_address", 'alpha');
$search_zip = \GETPOST("search_zip", 'alpha');
$search_town = \GETPOST("search_town", 'alpha');
$search_state = \GETPOST("search_state", 'alpha');
// county / departement / federal state
$search_country = \GETPOST("search_country", 'alpha');
$search_phone = \GETPOST("search_phone", 'alpha');
$search_phone_perso = \GETPOST("search_phone_perso", 'alpha');
$search_phone_mobile = \GETPOST("search_phone_mobile", 'alpha');
$search_type = \GETPOST("search_type", 'alpha');
$search_email = \GETPOST("search_email", 'alpha');
$search_categ = \GETPOST("search_categ", 'intcomma');
$search_morphy = \GETPOST("search_morphy", 'alpha');
$search_import_key = \trim(\GETPOST("search_import_key", 'alpha'));
$socid = \GETPOSTINT('socid');
$search_filter = \GETPOST("search_filter", 'alpha');
$search_status = \GETPOST("search_status", 'intcomma');
// status
$search_datec_start = \dol_mktime(0, 0, 0, \GETPOSTINT('search_datec_start_month'), \GETPOSTINT('search_datec_start_day'), \GETPOSTINT('search_datec_start_year'));
$search_datec_end = \dol_mktime(23, 59, 59, \GETPOSTINT('search_datec_end_month'), \GETPOSTINT('search_datec_end_day'), \GETPOSTINT('search_datec_end_year'));
$search_datem_start = \dol_mktime(0, 0, 0, \GETPOSTINT('search_datem_start_month'), \GETPOSTINT('search_datem_start_day'), \GETPOSTINT('search_datem_start_year'));
$search_datem_end = \dol_mktime(23, 59, 59, \GETPOSTINT('search_datem_end_month'), \GETPOSTINT('search_datem_end_day'), \GETPOSTINT('search_datem_end_year'));
$filter = \GETPOST("filter", 'alpha');
$statut = \GETPOST("statut", 'alpha');
$search_all = \trim(\GETPOST('search_all', 'alphanohtml'));
// Load variable for pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT('page');
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$object = new \Adherent($db);
$extrafields = new \ExtraFields($db);
$diroutputmassaction = $conf->member->dir_output . '/temp/massgeneration/' . $user->id;
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
// List of fields to search into when doing a "search in all"
$fieldstosearchall = array('d.ref' => 'Ref', 'd.login' => 'Login', 'd.lastname' => 'Lastname', 'd.firstname' => 'Firstname', 'd.societe' => "Company", 'd.email' => 'EMail', 'd.address' => 'Address', 'd.zip' => 'Zip', 'd.town' => 'Town', 'd.phone' => "Phone", 'd.phone_perso' => "PhonePerso", 'd.phone_mobile' => "PhoneMobile", 'd.note_public' => 'NotePublic', 'd.note_private' => 'NotePrivate');
$arrayfields = array(
    'd.rowid' => array('label' => 'ID', 'checked' => 1, 'enabled' => \getDolGlobalInt('MAIN_SHOW_TECHNICAL_ID'), 'position' => 1),
    'd.ref' => array('label' => "Ref", 'checked' => 1),
    'd.civility' => array('label' => "Civility", 'checked' => 0),
    'd.lastname' => array('label' => "Lastname", 'checked' => 1),
    'd.firstname' => array('label' => "Firstname", 'checked' => 1),
    'd.gender' => array('label' => "Gender", 'checked' => 0),
    'd.societe' => array('label' => "Company", 'checked' => 1, 'position' => 70),
    'd.login' => array('label' => "Login", 'checked' => 1),
    'd.morphy' => array('label' => "MemberNature", 'checked' => 1),
    't.libelle' => array('label' => "MemberType", 'checked' => 1, 'position' => 55),
    'd.address' => array('label' => "Address", 'checked' => 0),
    'd.zip' => array('label' => "Zip", 'checked' => 0),
    'd.town' => array('label' => "Town", 'checked' => 0),
    'd.phone' => array('label' => "Phone", 'checked' => 0),
    'd.phone_perso' => array('label' => "PhonePerso", 'checked' => 0),
    'd.phone_mobile' => array('label' => "PhoneMobile", 'checked' => 0),
    'd.email' => array('label' => "Email", 'checked' => 1),
    'state.nom' => array('label' => "State", 'checked' => 0, 'position' => 90),
    'country.code_iso' => array('label' => "Country", 'checked' => 0, 'position' => 95),
    /*'d.note_public'=>array('label'=>"NotePublic", 'checked'=>0),
    	'd.note_private'=>array('label'=>"NotePrivate", 'checked'=>0),*/
    'd.datefin' => array('label' => "EndSubscription"),
    'd.datec' => array('label' => "DateCreation"),
    'd.birth' => array('label' => "Birthday"),
    'd.tms' => array('label' => "DateModificationShort"),
    'd.statut' => array('label' => "Status"),
    'd.import_key' => array('label' => "ImportId"),
);
// Complete array of fields for columns
$tableprefix = 'd';
//$arrayfields['anotherfield'] = array('type'=>'integer', 'label'=>'AnotherField', 'checked'=>1, 'enabled'=>1, 'position'=>90, 'csslist'=>'right');
$arrayfields = \dol_sort_array($arrayfields, 'position');
// Security check
$result = \restrictedArea($user, 'adherent');
$permissiontoread = $user->hasRight('adherent', 'lire');
$permissiontodelete = $user->hasRight('adherent', 'supprimer');
$permissiontoadd = $user->hasRight('adherent', 'creer');
$uploaddir = $conf->member->dir_output;
$error = 0;
$parameters = array('socid' => isset($socid) ? $socid : \null, 'arrayfields' => &$arrayfields);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
// Mass actions
$objectclass = 'Adherent';
$objectlabel = 'Members';
/*
 * View
 */
$form = new \Form($db);
$formother = new \FormOther($db);
$membertypestatic = new \AdherentType($db);
$memberstatic = new \Adherent($db);
$now = \dol_now();
// Page Header
$title = $langs->trans("Members");
$help_url = 'EN:Module_Foundations|FR:Module_Adh&eacute;rents|ES:M&oacute;dulo_Miembros|DE:Modul_Mitglieder';
$morejs = array();
$morecss = array();
// Build and execute select
// --------------------------------------------------------------------
$sql = "SELECT";
// Add fields from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListSelect', $parameters, $object, $action);
$sql = \preg_replace('/,\\s*$/', '', $sql);
$sqlfields = $sql;
$searchCategoryContactList = $search_categ ? array($search_categ) : array();
$searchCategoryContactOperator = 0;
$searchCategoryContactSqlList = array();
$listofcategoryid = '';
// Add where from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListWhere', $parameters, $object, $action);
// Count total nb of records
$nbtotalofrecords = '';
/* The fast and low memory method to get and count full list converts the sql into a sql count */
$sqlforcount = \preg_replace('/^' . \preg_quote($sqlfields, '/') . '/', 'SELECT COUNT(*) as nbtotalofrecords', $sql);
$sqlforcount = \preg_replace('/GROUP BY .*$/', '', $sqlforcount);
$resql = $db->query($sqlforcount);
$resql = $db->query($sql);
$num = $db->num_rows($resql);
// Can use also classforhorizontalscrolloftabs instead of bodyforlist for no horizontal scroll
$arrayofselected = \is_array($toselect) ? $toselect : array();
// $parameters
$query = [];
// Add $query from hooks
$parameters = array('query' => &$query);
$reshook = $hookmanager->executeHooks('printFieldListSearchParam', $parameters, $object, $action);
// Note that $action and $object may have been modified by hook
// build $param
$param = \http_build_query($query);
// List of mass actions available
$arrayofmassactions = array();
$massactionbutton = $form->selectMassAction('', $arrayofmassactions);
$newcardbutton = '';
$queryforbutton = $query;
// Add code for pre mass action (confirmation or email presend form)
$topicmail = "Information";
$modelmail = "member";
$objecttmp = new \Adherent($db);
$trackid = 'mem' . $object->id;
$varpage = empty($contextpage) ? $_SERVER["PHP_SELF"] : $contextpage;
$htmlofselectarray = $form->multiSelectArrayWithCheckbox('selectedfields', $arrayfields, $varpage, \getDolGlobalString('MAIN_CHECKBOX_LEFT_COLUMN'));
// This also change content of $arrayfields with user setup
$selectedfields = $mode != 'kanban' ? $htmlofselectarray : '';
$moreforfilter = '';
$parameters = array('arrayfields' => &$arrayfields);
$reshook = $hookmanager->executeHooks('printFieldPreListTitle', $parameters, $object, $action);
// Fields from hook
$parameters = array('arrayfields' => $arrayfields);
$reshook = $hookmanager->executeHooks('printFieldListOption', $parameters);
$totalarray = array();
// Hook fields
$parameters = array('arrayfields' => $arrayfields, 'totalarray' => &$totalarray, 'param' => $param, 'sortfield' => $sortfield, 'sortorder' => $sortorder);
$reshook = $hookmanager->executeHooks('printFieldListTitle', $parameters);
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