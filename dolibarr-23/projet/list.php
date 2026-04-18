<?php

$action = \GETPOST('action', 'aZ09');
$massaction = \GETPOST('massaction', 'alpha');
$show_files = \GETPOSTINT('show_files');
$confirm = \GETPOST('confirm', 'alpha');
$toselect = \GETPOST('toselect', 'array:int');
$optioncss = \GETPOST('optioncss', 'alpha');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'projectlist';
$mode = \GETPOST('mode', 'alpha');
$groupby = \GETPOST('groupby', 'aZ09');
// Example: $groupby = 'p.fk_opp_status' or $groupby = 'p.fk_statut'. Must be a field into $object->fields
$title = $langs->trans("Projects");
$diroutputmassaction = $conf->project->dir_output . '/temp/massgeneration/' . $user->id;
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$search_all = \GETPOST('search_all', 'alphanohtml');
$search_entity = \GETPOSTINT('search_entity');
$search_id = \GETPOST("search_id", 'alpha');
$search_ref = \GETPOST("search_ref", 'alpha');
$search_label = \GETPOST("search_label", 'alpha');
$search_societe = \GETPOST("search_societe", 'alpha');
$search_societe_alias = \GETPOST("search_societe_alias", 'alpha');
$search_societe_country = \GETPOST("search_societe_country", 'alpha');
$search_societe_ref_customer = \GETPOST("search_societe_ref_customer", 'alpha');
$search_societe_ref_supplier = \GETPOST("search_societe_ref_supplier", 'alpha');
$search_opp_status = \GETPOST("search_opp_status", 'alpha');
$search_opp_percent = \GETPOST("search_opp_percent", 'alpha');
$search_opp_amount = \GETPOST("search_opp_amount", 'alpha');
$search_budget_amount = \GETPOST("search_budget_amount", 'alpha');
$search_parent_ref = \GETPOST('search_parent_ref', 'alpha');
$search_parent_label = \GETPOST('search_parent_label', 'alpha');
$search_public = \GETPOST("search_public", 'intcomma');
$search_project_user = \GETPOSTINT('search_project_user');
$search_project_contact = \GETPOSTINT('search_project_contact');
$search_sale = \GETPOSTINT('search_sale');
$search_usage_opportunity = \GETPOST('search_usage_opportunity', 'intcomma');
$search_usage_task = \GETPOST('search_usage_task', 'intcomma');
$search_usage_bill_time = \GETPOST('search_usage_bill_time', 'intcomma');
$search_usage_event_organization = \GETPOST('search_usage_event_organization', 'intcomma');
$search_accept_conference_suggestions = \GETPOST('search_accept_conference_suggestions', 'intcomma');
$search_accept_booth_suggestions = \GETPOST('search_accept_booth_suggestions', 'intcomma');
$search_price_registration = \GETPOST("search_price_registration", 'alpha');
$search_price_booth = \GETPOST("search_price_booth", 'alpha');
$search_login = \GETPOST('search_login', 'alpha');
$search_import_key = \GETPOST('search_import_key', 'alpha');
$searchCategoryUserOperator = 0;
$searchCategoryProjectOperator = 0;
/*
$searchCategoryCustomerOperator = 0;
if (GETPOSTISSET('formfilteraction')) {
	$searchCategoryCustomerOperator = GETPOSTINT('search_category_customer_operator');
} elseif (getDolGlobalString('MAIN_SEARCH_CAT_OR_BY_DEFAULT')) {
	$searchCategoryCustomerOperator = getDolGlobalString('MAIN_SEARCH_CAT_OR_BY_DEFAULT');
}
$searchCategoryCustomerList = GETPOST('search_category_customer_list', 'array:int');
*/
$search_omitChildren = 0;
$mine = \GETPOST('mode') == 'mine' ? 1 : 0;
$search_sday = \GETPOSTINT('search_sday');
$search_smonth = \GETPOSTINT('search_smonth');
$search_syear = \GETPOSTINT('search_syear');
$search_eday = \GETPOSTINT('search_eday');
$search_emonth = \GETPOSTINT('search_emonth');
$search_eyear = \GETPOSTINT('search_eyear');
$search_date_start_startmonth = \GETPOSTINT('search_date_start_startmonth');
$search_date_start_startyear = \GETPOSTINT('search_date_start_startyear');
$search_date_start_startday = \GETPOSTINT('search_date_start_startday');
$search_date_start_start = \GETPOSTDATE('search_date_start_start');
// Use tzserver
$search_date_start_endmonth = \GETPOSTINT('search_date_start_endmonth');
$search_date_start_endyear = \GETPOSTINT('search_date_start_endyear');
$search_date_start_endday = \GETPOSTINT('search_date_start_endday');
$search_date_start_end = \GETPOSTDATE('search_date_start_end', 'end');
// Use tzserver
$search_date_end_startmonth = \GETPOSTINT('search_date_end_startmonth');
$search_date_end_startyear = \GETPOSTINT('search_date_end_startyear');
$search_date_end_startday = \GETPOSTINT('search_date_end_startday');
$search_date_end_start = \GETPOSTDATE('search_date_end_start');
// Use tzserver
$search_date_end_endmonth = \GETPOSTINT('search_date_end_endmonth');
$search_date_end_endyear = \GETPOSTINT('search_date_end_endyear');
$search_date_end_endday = \GETPOSTINT('search_date_end_endday');
$search_date_end_end = \GETPOSTDATE('search_date_end_end', 'end');
// Use tzserver
$search_date_creation_startmonth = \GETPOSTINT('search_date_creation_startmonth');
$search_date_creation_startyear = \GETPOSTINT('search_date_creation_startyear');
$search_date_creation_startday = \GETPOSTINT('search_date_creation_startday');
$search_date_creation_start = \GETPOSTDATE('search_date_creation_start');
// Use tzserver
$search_date_creation_endmonth = \GETPOSTINT('search_date_creation_endmonth');
$search_date_creation_endyear = \GETPOSTINT('search_date_creation_endyear');
$search_date_creation_endday = \GETPOSTINT('search_date_creation_endday');
$search_date_creation_end = \GETPOSTDATE('search_date_creation_end', 'end');
// Use tzserver
$search_date_modif_startmonth = \GETPOSTINT('search_date_modif_startmonth');
$search_date_modif_startyear = \GETPOSTINT('search_date_modif_startyear');
$search_date_modif_startday = \GETPOSTINT('search_date_modif_startday');
$search_date_modif_start = \GETPOSTDATE('search_date_modif_start');
// Use tzserver
$search_date_modif_endmonth = \GETPOSTINT('search_date_modif_endmonth');
$search_date_modif_endyear = \GETPOSTINT('search_date_modif_endyear');
$search_date_modif_endday = \GETPOSTINT('search_date_modif_endday');
$search_date_modif_end = \GETPOSTDATE('search_date_modif_end', 'end');
// Use tzserver
$search_category_array = array();
$search_category_user_array = array();
$search_option = \GETPOST('search_option', 'alpha');
// Initialize technical objects
$object = new \Project($db);
$extrafields = new \ExtraFields($db);
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
$fieldstosearchall = array();
// Definition of array of fields for columns
$tableprefix = 'p';
$arrayfields = array();
$arrayfields = \dol_sort_array($arrayfields, 'position');
// Set $groupbyvalues with array of all possible dictionary values (even if no data for this value exists).
// TODO Move this into a inc file
$groupbyvalues = array();
$groupofcollpasedvalues = array();
$groupbyold = \null;
$groupbyfield = \preg_replace('/[a-z]+\\./', '', $groupby);
// Add a filter on the group by if not yet included first
$groupbystringforsql = $groupby;
// Security check
$socid = \GETPOSTINT('socid');
/*
 * Actions
 */
$error = 0;
$parameters = array('socid' => $socid, 'arrayfields' => &$arrayfields);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
// Mass actions
$objectclass = 'Project';
$objectlabel = 'Project';
$permissiontoread = $user->hasRight('projet', 'lire');
$permissiontodelete = $user->hasRight('projet', 'supprimer');
$permissiontoadd = $user->hasRight('projet', 'creer');
$uploaddir = $conf->project->dir_output;
$form = new \Form($db);
$formcompany = new \FormCompany($db);
$companystatic = new \Societe($db);
$taskstatic = new \Task($db);
$formother = new \FormOther($db);
$formproject = new \FormProjets($db);
$userstatic = new \User($db);
$now = \dol_now();
$help_url = "EN:Module_Projects|FR:Module_Projets|ES:M&oacute;dulo_Proyectos";
$title = $langs->trans("LeadsOrProjects");
$morejs = array();
$morecss = array();
// Get list of project id allowed to user (in a string list separated by comma)
$projectsListId = '';
// Get id of types of contacts for projects (This list never contains a lot of elements)
$listofprojectcontacttype = array();
$listofprojectcontacttypeexternal = array();
$sql = "SELECT ctc.rowid, ctc.code, ctc.source FROM " . \MAIN_DB_PREFIX . "c_type_contact as ctc";
$resql = $db->query($sql);
$varpage = empty($contextpage) ? $_SERVER["PHP_SELF"] : $contextpage;
$selectedfields = $form->multiSelectArrayWithCheckbox('selectedfields', $arrayfields, $varpage);
// This also change content of $arrayfields
// Build and execute select
// --------------------------------------------------------------------
$sql = "SELECT";
// Add fields from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListSelect', $parameters, $object, $action);
$sql = \preg_replace('/,\\s*$/', '', $sql);
$sqlfields = $sql;
// We'll need this table joined to the select in order to filter by sale
// No check is done on company permission because readability is managed by public status of project and assignment.
//if ($search_sale > 0 || (! $user->rights->societe->client->voir && ! $socid)) $sql .= " LEFT JOIN ".MAIN_DB_PREFIX."societe_commerciaux as sc ON sc.fk_soc = s.rowid";
// Add table from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListFrom', $parameters, $object, $action);
// Search for tag/category of User ($searchCategoryUserList is an array of ID)
$searchCategoryUserList = $search_category_user_array;
$searchCategoryUserSqlList = array();
$listofcategoryid = '';
// Search for tag/category or Project ($searchCategoryProjectList is an array of ID)
$searchCategoryProjectList = $search_category_array;
$searchCategoryProjectSqlList = array();
$listofcategoryid = '';
// Add where from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListWhere', $parameters, $object);
//print $sql;
// Count total nb of records
$nbtotalofrecords = '';
/* The fast and low memory method to get and count full list converts the sql into a sql count */
$sqlforcount = \preg_replace('/^' . \preg_quote($sqlfields, '/') . '/', 'SELECT COUNT(*) as nbtotalofrecords', $sql);
$sqlforcount = \preg_replace('/GROUP BY .*$/', '', $sqlforcount);
$resql = $db->query($sqlforcount);
//print $sql;
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$arrayofselected = \is_array($toselect) ? $toselect : array();
$param = '';
// Add $param from hooks
$parameters = array('param' => &$param);
$reshook = $hookmanager->executeHooks('printFieldListSearchParam', $parameters, $object, $action);
// List of mass actions available
$arrayofmassactions = array('validate' => \img_picto('', 'check', 'class="pictofixedwidth"') . $langs->trans("Validate"), 'generate_doc' => \img_picto('', 'pdf', 'class="pictofixedwidth"') . $langs->trans("ReGeneratePDF"));
$massactionbutton = $form->selectMassAction('', $arrayofmassactions);
$url = \DOL_URL_ROOT . '/projet/card.php?action=create';
$newcardbutton = '';
// Show description of content
$htmltooltip = '';
$topicmail = "Information";
$modelmail = "project";
$objecttmp = new \Project($db);
$trackid = 'proj' . $object->id;
$moreforfilter = '';
$tmptitle = $langs->trans('ProjectsWithThisUserAsContact');
//$includeonly = 'hierarchyme';
$includeonly = '';
$tmptitle = $langs->trans('ProjectsWithThisContact');
$varpage = empty($contextpage) ? $_SERVER["PHP_SELF"] : $contextpage;
$htmlofselectarray = $form->multiSelectArrayWithCheckbox('selectedfields', $arrayfields, $varpage, \getDolGlobalString('MAIN_CHECKBOX_LEFT_COLUMN'));
// This also change content of $arrayfields with user setup
$selectedfields = $mode != 'kanban' && $mode != 'kanbangroupby' ? $htmlofselectarray : '';
// Fields from hook
$parameters = array('arrayfields' => $arrayfields);
$reshook = $hookmanager->executeHooks('printFieldListOption', $parameters);
$totalarray = array();
// Hook fields
$parameters = array('arrayfields' => $arrayfields, 'param' => $param, 'sortfield' => $sortfield, 'sortorder' => $sortorder, 'totalarray' => &$totalarray);
$reshook = $hookmanager->executeHooks('printFieldListTitle', $parameters, $object, $action);
$i = 0;
$savnbfield = $totalarray['nbfield'];
$totalarray = array('nbfield' => 0, 'val' => array());
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