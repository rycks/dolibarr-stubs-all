<?php

// Get Parameters
$action = \GETPOST('action', 'aZ09');
$massaction = \GETPOST('massaction', 'alpha');
$confirm = \GETPOST('confirm', 'alpha');
$cancel = \GETPOST('cancel', 'alpha');
$toselect = \GETPOST('toselect', 'array:int');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'actioncommlist';
// To manage different context of search
$optioncss = \GETPOST('optioncss', 'alpha');
$mode = \GETPOST('mode', 'aZ09');
$disabledefaultvalues = \GETPOSTINT('disabledefaultvalues');
$resourceid = \GETPOSTINT("search_resourceid") ? \GETPOSTINT("search_resourceid") : \GETPOSTINT("resourceid");
$pid = \GETPOSTINT("search_projectid", 3) ? \GETPOSTINT("search_projectid", 3) : \GETPOSTINT("projectid", 3);
$search_status = \GETPOST("search_status", 'aZ09') != '' ? \GETPOST("search_status", 'aZ09') : \GETPOST("status", 'aZ09');
$search_import_key = \GETPOST("search_import_key");
$type = \GETPOST('search_type', 'alphanohtml') ? \GETPOST('search_type', 'alphanohtml') : \GETPOST('type', 'alphanohtml');
$year = \GETPOSTINT("year");
$month = \GETPOSTINT("month");
$day = \GETPOSTINT("day");
$actioncode = \GETPOST('search_actioncode', 'array:aZ09', 3);
// Search Fields
$search_id = \GETPOST('search_id', 'alpha');
$search_title = \GETPOST('search_title', 'alpha');
$search_note = \GETPOST('search_note', 'alpha');
// $dateselect is a day included inside the event range
$dateselect = \dol_mktime(0, 0, 0, \GETPOSTINT('dateselectmonth'), \GETPOSTINT('dateselectday'), \GETPOSTINT('dateselectyear'), 'tzuserrel');
$datestart_dtstart = \dol_mktime(0, 0, 0, \GETPOSTINT('datestart_dtstartmonth'), \GETPOSTINT('datestart_dtstartday'), \GETPOSTINT('datestart_dtstartyear'), 'tzuserrel');
$datestart_dtend = \dol_mktime(23, 59, 59, \GETPOSTINT('datestart_dtendmonth'), \GETPOSTINT('datestart_dtendday'), \GETPOSTINT('datestart_dtendyear'), 'tzuserrel');
$dateend_dtstart = \dol_mktime(0, 0, 0, \GETPOSTINT('dateend_dtstartmonth'), \GETPOSTINT('dateend_dtstartday'), \GETPOSTINT('dateend_dtstartyear'), 'tzuserrel');
$dateend_dtend = \dol_mktime(23, 59, 59, \GETPOSTINT('dateend_dtendmonth'), \GETPOSTINT('dateend_dtendday'), \GETPOSTINT('dateend_dtendyear'), 'tzuserrel');
$filter = \GETPOST("search_filter", 'alpha', 3) ? \GETPOST("search_filter", 'alpha', 3) : \GETPOST("filter", 'alpha', 3);
$filtert = \GETPOST("search_filtert", "intcomma", 3) ? \GETPOST("search_filtert", "intcomma", 3) : \GETPOST("filtert", "intcomma", 3);
$usergroup = \GETPOSTINT("search_usergroup", 3) ? \GETPOSTINT("search_usergroup", 3) : \GETPOSTINT("usergroup", 3);
$showbirthday = empty($conf->use_javascript_ajax) ? \GETPOSTINT("search_showbirthday") ? \GETPOSTINT("search_showbirthday") : \GETPOSTINT("showbirthday") : 1;
$search_categ_cus = \GETPOST("search_categ_cus", "intcomma", 3) ? \GETPOST("search_categ_cus", "intcomma", 3) : 0;
// Initialize a technical object to manage hooks of page. Note that conf->hooks_modules contains an array of hook context
$object = new \ActionComm($db);
$extrafields = new \ExtraFields($db);
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
// Pagination parameters
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$offset = $limit * $page;
$sortorder = "DESC,DESC";
$sortfield = "a.datep,a.id";
// Security check
$socid = \GETPOSTINT("search_socid") ? \GETPOSTINT("search_socid") : \GETPOSTINT("socid");
$canedit = 1;
// Definition of array of fields for columns
$tableprefix = 'a';
$arrayfields = array();
// Complete arrayfields with special fields
$arrayfields = \array_merge($arrayfields, array('owner' => array('label' => "Owner", 'checked' => '1', 'position' => 46), 'c.libelle' => array('label' => "Type", 'checked' => '1', 'position' => 47), 's.nom' => array('label' => "ThirdParty", 'checked' => '1', 'position' => 54), 'a.fk_element' => array('label' => "LinkedObject", 'checked' => '1', 'position' => 86)));
$arrayfields = \dol_sort_array($arrayfields, 'position');
// Security check
$result = \restrictedArea($user, 'agenda', 0, '', 'myactions');
$param = '';
$parameters = array('id' => $socid);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$percent = \null;
/*
 * View
 */
$form = new \Form($db);
$userstatic = new \User($db);
$formactions = new \FormActions($db);
$actionstatic = new \ActionComm($db);
$societestatic = new \Societe($db);
$contactstatic = new \Contact($db);
$nav = '';
$now = \dol_now();
$help_url = 'EN:Module_Agenda_En|FR:Module_Agenda|ES:M&oacute;dulo_Agenda|DE:Modul_Terminplanung';
$title = $langs->trans("Agenda");
// Define list of all external calendars
// $listofextcals = array(); Not used yet in lists
$param = '';
$paramnoactionodate = $param;
// List of mass actions available
$arrayofmassactions = array('set_all_events_to_todo' => \img_picto('', 'circle', 'class="pictofixedwidth font-status1"') . $langs->trans("SetAllEventsToTodo"), 'set_all_events_to_in_progress' => \img_picto('', 'stop-circle', 'class="pictofixedwidth font-status2"') . $langs->trans("SetAllEventsToInProgress"), 'set_all_events_to_finished' => \img_picto('', 'stop-circle', 'class="pictofixedwidth badge-status5"') . $langs->trans("SetAllEventsToFinished"));
$massactionbutton = $form->selectMassAction('', $arrayofmassactions);
$sql = "SELECT";
// Add fields from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListSelect', $parameters, $object, $action);
$sqlfields = $sql;
// Add table from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListFrom', $parameters, $object, $action);
// If the internal user must only see his customers, force searching by him
$search_sale = 0;
// Add where from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListWhere', $parameters, $object, $action);
$sql1 = $sql2 = '';
//print $sql."<br>".$sql1."<br>".$sql2;
// Count total nb of records
$nbtotalofrecords = '';
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$arrayofselected = \is_array($toselect) ? $toselect : array();
// Local calendar
$newtitle = '<div class="nowrap clear inline-block minheight30">';
//$newtitle=$langs->trans($title);
$tabactive = 'cardlist';
$head = \calendars_prepare_head($param);
$nav = '';
$s = $newtitle;
// Calendars from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('addCalendarChoice', $parameters, $object, $action);
$viewyear = \is_object($object) ? \dol_print_date($object->datep, '%Y') : '';
$viewmonth = \is_object($object) ? \dol_print_date($object->datep, '%m') : '';
$viewday = \is_object($object) ? \dol_print_date($object->datep, '%d') : '';
$viewmode = '<div class="navmode inline-block">';
// Add more views from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('addCalendarView', $parameters, $object, $action);
$tmpforcreatebutton = \dol_getdate(\dol_now('tzuserrel'), \true);
$newparam = '?month=' . \str_pad((string) $month, 2, "0", \STR_PAD_LEFT) . '&year=' . $tmpforcreatebutton['year'];
$url = \DOL_URL_ROOT . '/comm/action/card.php?action=create';
$newcardbutton = \dolGetButtonTitle($langs->trans('AddAction'), '', 'fa fa-plus-circle', $url, '', (int) ($user->hasRight('agenda', 'myactions', 'create') || $user->hasRight('agenda', 'allactions', 'create')));
$objecttmp = new \ActionComm($db);
$moreforfilter = '';
$varpage = empty($contextpage) ? $_SERVER["PHP_SELF"] : $contextpage;
$selectedfields = $form->multiSelectArrayWithCheckbox('selectedfields', $arrayfields, $varpage, \getDolGlobalString('MAIN_CHECKBOX_LEFT_COLUMN'));
$i = 0;
$moreforfilter = 1;
// Fields from hook
$parameters = array('arrayfields' => $arrayfields);
$reshook = $hookmanager->executeHooks('printFieldListOption', $parameters);
$totalarray = array();
// Hook fields
$parameters = array('arrayfields' => $arrayfields, 'param' => $param, 'sortfield' => $sortfield, 'sortorder' => $sortorder);
$reshook = $hookmanager->executeHooks('printFieldListTitle', $parameters);
$now = \dol_now();
$delay_warning = \getDolGlobalInt('MAIN_DELAY_ACTIONS_TODO') * 24 * 60 * 60;
$today_start_time = \dol_mktime(0, 0, 0, (int) \date('m', $now), (int) \date('d', $now), (int) \date('Y', $now));
$caction = new \CActionComm($db);
$arraylist = $caction->liste_array(1, 'code', '', !\getDolGlobalString('AGENDA_USE_EVENT_TYPE') ? 1 : 0, '', 1);
$contactListCache = array();
$elementlinkcache = array();
// Loop on record
// --------------------------------------------------------------------
$i = 0;
//$savnbfield = $totalarray['nbfield'];
//$totalarray['nbfield'] = 0;
$imaxinloop = $limit ? \min($num, $limit) : $num;
$cache_user_list = array();