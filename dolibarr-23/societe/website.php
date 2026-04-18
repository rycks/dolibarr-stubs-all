<?php

// Get parameters
$action = \GETPOST('action', 'aZ09') ? \GETPOST('action', 'aZ09') : 'view';
// The action 'add', 'create', 'edit', 'update', 'view', ...
$show_files = \GETPOSTINT('show_files');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'websitelist';
// To manage different context of search
$backtopage = \GETPOST('backtopage', 'alpha');
// Go back to a dedicated page
$optioncss = \GETPOST('optioncss', 'aZ');
// Option for the css output (always '' except when 'print')
$toselect = \GETPOST('toselect', 'array:int');
// Array of ids of elements selected into a list
$optioncss = \GETPOST('optioncss', 'aZ');
// Option for the css output (always '' except when 'print')
$mode = \GETPOST('mode', 'aZ');
// The output mode ('list', 'kanban', 'hierarchy', 'calendar', ...)
$id = \GETPOSTINT('id') ? \GETPOSTINT('id') : \GETPOSTINT('socid');
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
// Initialize a technical objects
$object = new \Societe($db);
$objectwebsiteaccount = new \SocieteAccount($db);
$extrafields = new \ExtraFields($db);
$diroutputmassaction = \isModEnabled('website') ? $conf->website->dir_output . '/temp/massgeneration/' . $user->id : '';
$search_array_options = $extrafields->getOptionalsFromPost($objectwebsiteaccount->table_element, '', 'search_');
// Remove this field, we are already on the thirdparty
// Initialize array of search criteria
$search_all = \GETPOST("search_all", 'alpha');
/** @var array<string[]|string> $search */
$search = array();
// List of fields to search into when doing a "search in all"
$fieldstosearchall = array();
// Definition of array of fields for columns
$arrayfields = array();
$arrayfields = \dol_sort_array($arrayfields, 'position');
// Security check
$id = \GETPOSTINT('id') ? \GETPOSTINT('id') : \GETPOSTINT('socid');
$result = \restrictedArea($user, 'societe', $object->id, '&societe');
$permissiontoread = $user->hasRight('societe', 'lire');
$permissiontoadd = $user->hasRight('societe', 'create');
$permissiontodelete = $user->hasRight('societe', 'supprimer');
/*
 *	Actions
 */
$parameters = array('id' => $id);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
// Mass actions
$objectclass = 'WebsiteAccount';
$objectlabel = 'WebsiteAccount';
$uploaddir = empty($conf->societe->multidir_output[$object->entity ?? $conf->entity]) ? $conf->societe->dir_output : $conf->societe->multidir_output[$object->entity ?? $conf->entity];
/*
 *	View
 */
$form = new \Form($db);
$title = $langs->trans("WebsiteAccounts");
$help_url = '';
// Build and execute select
// --------------------------------------------------------------------
$site_filter_list = array();
$sql = 'SELECT ';
// Add fields from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListSelect', $parameters, $objectwebsiteaccount, $action);
$sql = \preg_replace('/,\\s*$/', '', $sql);
$sqlfields = $sql;
// Add table from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListFrom', $parameters, $object, $action);
// Add where from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListWhere', $parameters, $objectwebsiteaccount, $action);
/* If a group by is required
 $sql.= " GROUP BY "
 foreach($objectwebsiteaccount->fields as $key => $val) {
 $sql .= "t.".$db->sanitize($key).", ";
 }
 // Add fields from extrafields
 if (!empty($extrafields->attributes[$object->table_element]['label'])) {
 foreach ($extrafields->attributes[$object->table_element]['label'] as $key => $val) $sql.=($extrafields->attributes[$object->table_element]['type'][$key] != 'separate' ? "ef.".$key.', ' : '');
 // Add groupby from hooks
 $parameters=array();
 $reshook = $hookmanager->executeHooks('printFieldListGroupBy',$parameters);    // Note that $action and $objectwebsiteaccount may have been modified by hook
 $sql.=$hookmanager->resPrint;
 */
// Count total nb of records
$nbtotalofrecords = '';
$resql = $db->query($sql);
$nbtotalofrecords = $db->num_rows($resql);
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$arrayofselected = \is_array($toselect) ? $toselect : array();
$param = 'id=' . $object->id;
$head = \societe_prepare_head($object);
$linkback = '<a href="' . \DOL_URL_ROOT . '/societe/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
$socstat = $object;
$tmpcheck = $socstat->check_codeclient();
$tmpcheck = $socstat->check_codefournisseur();
$newcardbutton = '';
// List of mass actions available
$arrayofmassactions = array();
$massactionbutton = $form->selectMassAction('', $arrayofmassactions);
$topicmail = "Information";
$modelmail = "societeaccount";
$objecttmp = new \SocieteAccount($db);
$trackid = 'thi' . $object->id;
/*if ($search_all)
{
	foreach($fieldstosearchall as $key => $val) $fieldstosearchall[$key]=$langs->trans($val);
	print '<div class="divsearchfieldfilter">'.$langs->trans("FilterOnInto", $search_all) . join(', ', $fieldstosearchall).'</div>';
}*/
$moreforfilter = '';
/*$moreforfilter.='<div class="divsearchfield">';
$moreforfilter.= $langs->trans('MyFilter') . ': <input type="text" name="search_myfield" value="'.dol_escape_htmltag($search_myfield).'">';
$moreforfilter.= '</div>';*/
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldPreListTitle', $parameters, $objectwebsiteaccount, $action);
$varpage = empty($contextpage) ? $_SERVER["PHP_SELF"] : $contextpage;
$htmlofselectarray = $form->multiSelectArrayWithCheckbox('selectedfields', $arrayfields, $varpage, \getDolGlobalString('MAIN_CHECKBOX_LEFT_COLUMN'));
// This also change content of $arrayfields with user setup
$selectedfields = $mode != 'kanban' ? $htmlofselectarray : '';
// Fields from hook
$parameters = array('arrayfields' => $arrayfields);
$reshook = $hookmanager->executeHooks('printFieldListOption', $parameters, $objectwebsiteaccount, $action);
$totalarray = array();
// Hook fields
$parameters = array('arrayfields' => $arrayfields, 'param' => $param, 'sortfield' => $sortfield, 'sortorder' => $sortorder, 'totalarray' => &$totalarray);
$reshook = $hookmanager->executeHooks('printFieldListTitle', $parameters, $objectwebsiteaccount, $action);
// Detect if we need a fetch on each output line
$needToFetchEachLine = 0;
// Loop on record
// --------------------------------------------------------------------
$i = 0;
$savnbfield = $totalarray['nbfield'];
$totalarray = array();
$imaxinloop = $limit ? \min($num, $limit) : $num;
$parameters = array('arrayfields' => $arrayfields, 'sql' => $sql);
$reshook = $hookmanager->executeHooks('printFieldListFooter', $parameters, $objectwebsiteaccount, $action);
$hidegeneratedfilelistifempty = 1;
$formfile = new \FormFile($db);
// Show list of available documents
$urlsource = $_SERVER['PHP_SELF'] . '?sortfield=' . $sortfield . '&sortorder=' . $sortorder;
$filedir = $diroutputmassaction;
$genallowed = $permissiontoread;
$delallowed = $permissiontoadd;