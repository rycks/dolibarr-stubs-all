<?php

$MAXAGENDA = \getDolGlobalString('AGENDA_EXT_NB', 5);
$DELAYFORCACHE = 300;
// 300 seconds
$action = \GETPOST('action', 'aZ09');
$optioncss = \GETPOST('optioncss', 'aZ');
// Option for the css output (always '' except when 'print')
$mode = \GETPOST('mode', 'aZ09');
$disabledefaultvalues = \GETPOSTINT('disabledefaultvalues');
$check_holiday = \GETPOSTINT('check_holiday');
$check_birthday = !empty($conf->use_javascript_ajax) ? \GETPOSTINT("check_birthday") : 1;
$filter = \GETPOST("search_filter", 'alpha', 3) ? \GETPOST("search_filter", 'alpha', 3) : \GETPOST("filter", 'alpha', 3);
$filtert = \GETPOST("search_filtert", "intcomma", 3) ? \GETPOST("search_filtert", "intcomma", 3) : \GETPOST("filtert", "intcomma", 3);
$usergroup = \GETPOST("search_usergroup", "intcomma", 3) ? \GETPOST("search_usergroup", "intcomma", 3) : \GETPOST("usergroup", "intcomma", 3);
$search_categ_cus = \GETPOST("search_categ_cus", 'intcomma', 3) ? \GETPOST("search_categ_cus", 'intcomma', 3) : 0;
$newparam = '';
// Pagination parameters
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$offset = $limit * $page;
// Security check
$socid = \GETPOSTINT("search_socid") ? \GETPOSTINT("search_socid") : \GETPOSTINT("socid");
$canedit = 1;
$resourceid = \GETPOSTINT("search_resourceid");
$year = \GETPOSTINT("year") ? \GETPOSTINT("year") : \date("Y");
$month = \GETPOSTINT("month") ? \GETPOSTINT("month") : \date("m");
$week = \GETPOSTINT("week") ? \GETPOSTINT("week") : \date("W");
$day = \GETPOSTINT("day") ? \GETPOSTINT("day") : \date("d");
$pid = \GETPOSTISSET("search_projectid") ? \GETPOSTINT("search_projectid", 3) : \GETPOSTINT("projectid", 3);
$status = \GETPOSTISSET("search_status") ? \GETPOST("search_status", 'aZ09') : \GETPOST("status", 'aZ09');
// status may be 0, 50, 100, 'todo', 'na' or -1
$type = \GETPOSTISSET("search_type") ? \GETPOST("search_type", 'aZ09') : \GETPOST("type", 'aZ09');
$maxprint = \GETPOSTISSET("maxprint") ? \GETPOSTINT("maxprint") : \getDolGlobalInt('AGENDA_MAX_EVENTS_DAY_VIEW', 3);
$dateselect = \dol_mktime(0, 0, 0, \GETPOSTINT('dateselectmonth'), \GETPOSTINT('dateselectday'), \GETPOSTINT('dateselectyear'));
$actioncode = \GETPOST('search_actioncode', 'array:aZ09', 3);
$defaultview = \getDolGlobalString('AGENDA_DEFAULT_VIEW', 'show_month');
// default for app
$defaultview = \getDolUserString('AGENDA_DEFAULT_VIEW', $defaultview);
// View by day
$object = new \ActionComm($db);
$result = \restrictedArea($user, 'agenda', 0, 'actioncomm&societe', 'myactions|allactions', 'fk_soc', 'id');
$param = '';
$param = '';
/*
 * View
 */
$parameters = array('socid' => $socid, 'status' => $status, 'year' => $year, 'month' => $month, 'day' => $day, 'type' => $type, 'maxprint' => $maxprint, 'filter' => $filter, 'filtert' => $filtert, 'showbirthday' => $check_birthday, 'canedit' => $canedit, 'optioncss' => $optioncss, 'actioncode' => $actioncode, 'pid' => $pid, 'resourceid' => $resourceid, 'usergroup' => $usergroup);
$reshook = $hookmanager->executeHooks('beforeAgenda', $parameters, $object, $action);
$form = new \Form($db);
$companystatic = new \Societe($db);
$contactstatic = new \Contact($db);
$userstatic = new \User($db);
$help_url = 'EN:Module_Agenda_En|FR:Module_Agenda|ES:M&oacute;dulo_Agenda|DE:Modul_Terminplanung';
$now = \dol_now();
$nowarray = \dol_getdate($now);
$nowyear = $nowarray['year'];
$nowmonth = $nowarray['mon'];
$nowday = $nowarray['mday'];
$listofextcals = array();
$firstdaytoshow = 0;
$max_day_in_month = 0;
$lastdaytoshow = 0;
$tmpday = 0;
$datestart = 0;
$dateend = 0;
$first_day = 0;
$first_month = 0;
$first_year = 0;
$prev_day = 0;
$prev_month = 0;
$prev_year = 0;
$max_day_in_prev_month = 0;
$next_day = 0;
$next_month = 0;
$next_year = 0;
$prev = \dol_get_prev_month($month, $year);
$prev_year = $prev['year'];
$prev_month = $prev['month'];
$next = \dol_get_next_month($month, $year);
$next_year = $next['year'];
$next_month = $next['month'];
$max_day_in_prev_month = (int) \date("t", \dol_mktime(12, 0, 0, $prev_month, 1, $prev_year, 'gmt'));
// Nb of days in previous month
$max_day_in_month = (int) \date("t", \dol_mktime(12, 0, 0, $month, 1, $year, 'gmt'));
// Nb of days in next month
// tmpday is a negative or null cursor to know how many days before the 1st to show on month view (if tmpday=0, 1st is monday)
$tmpday = -(int) \date("w", \dol_mktime(12, 0, 0, $month, 1, $year, 'gmt')) + 2;
// Define firstdaytoshow and lastdaytoshow (warning: lastdaytoshow is last second to show + 1)
$firstdaytoshow = \dol_mktime(0, 0, 0, $prev_month, $max_day_in_prev_month + $tmpday, $prev_year, 'tzuserrel');
$next_day = 7 - ($max_day_in_month + 1 - $tmpday) % 7;
$lastdaytoshow = \dol_mktime(0, 0, 0, $next_month, $next_day, $next_year, 'tzuserrel');
//print 'xx'.$prev_year.'-'.$prev_month.'-'.$prev_day;
//print 'xx'.$next_year.'-'.$next_month.'-'.$next_day;
//print dol_print_date($firstdaytoshow,'dayhour').' '.dol_print_date($lastdaytoshow,'dayhour');
/*$title = $langs->trans("DoneAndToDoActions");
if ($status == 'done') {
	$title = $langs->trans("DoneActions");
}
if ($status == 'todo') {
	$title = $langs->trans("ToDoActions");
}
*/
$param = '';
// Show navigation bar
$nav = '';
// Must be after the nav definition
$paramnodate = $param;
//print 'x'.$param;
/*$tabactive = '';
 if ($mode == 'show_month') $tabactive = 'cardmonth';
 if ($mode == 'show_week') $tabactive = 'cardweek';
 if ($mode == 'show_day')  $tabactive = 'cardday';
 if ($mode == 'show_list') $tabactive = 'cardlist';
 if ($mode == 'show_pertuser') $tabactive = 'cardperuser';
 if ($mode == 'show_pertype') $tabactive = 'cardpertype';
 */
$paramnoaction = \preg_replace('/mode=[a-z_]+/', '', \preg_replace('/action=[a-z_]+/', '', $param));
$paramnoactionodate = \preg_replace('/mode=[a-z_]+/', '', \preg_replace('/action=[a-z_]+/', '', $paramnodate));
$head = \calendars_prepare_head($paramnoaction);
$viewmode = '<div class="navmode inline-block">';
// Add more views from hooks
$parameters = array();
$object = \null;
$reshook = $hookmanager->executeHooks('addCalendarView', $parameters, $object, $action);
// To add a space before the navigation tools
$newparam = '';
$newcardbutton = '';
// Define the legend/list of calendard to show
$s = '';
$showextcals = $listofextcals;
$bookcalcalendars = array();
$sql = "SELECT ba.rowid, bc.label, bc.ref, bc.rowid as id_cal";
$resql = $db->query($sql);
// Calendars from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('addCalendarChoice', $parameters, $object, $action);
// Load events from database into $eventarray
$eventarray = array();
$nbevents = 0;
// DEFAULT CALENDAR + AUTOEVENT CALENDAR + CONFERENCEBOOTH CALENDAR
$sql = 'SELECT ';
// Add fields from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListSelect', $parameters, $object, $action);
$sqlfields = $sql;
// Add table from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListFrom', $parameters, $object, $action);
// If the internal user must only see his customers, force searching by him
$search_sale = 0;
$MAXONSAMEPAGE = 5000;
$resql = $db->query($sql);
// Add events in array
$sql = 'SELECT sp.rowid, sp.lastname, sp.firstname, sp.birthday';
$resql = $db->query($sql);
$sql = "SELECT u.rowid as uid, u.lastname, u.firstname, u.statut, x.rowid, x.date_debut as date_start, x.date_fin as date_end, x.halfday, x.statut as status";
$resql = $db->query($sql);
// Complete $eventarray with events coming from external module
$parameters = array();
$object = \null;
$reshook = $hookmanager->executeHooks('getCalendarEvents', $parameters, $object, $action);
$maxnbofchar = 0;
$cachethirdparties = array();
$cachecontacts = array();
$cacheusers = array();
// default values
$theme_datacolor = array(array(137, 86, 161), array(60, 147, 183), array(250, 190, 80), array(80, 166, 90), array(190, 190, 100), array(91, 115, 247), array(140, 140, 220), array(190, 120, 120), array(115, 125, 150), array(100, 170, 20), array(150, 135, 125), array(85, 135, 150), array(150, 135, 80), array(150, 80, 150));
// Define theme_datacolor array
$color_file = \DOL_DOCUMENT_ROOT . "/theme/" . $conf->theme . "/theme_vars.inc.php";
$massactionbutton = '';
/**
 * Show event of a particular day
 *
 * @param	DoliDB	$db              Database handler
 * @param   int		$day             Day
 * @param   int		$month           Month
 * @param   int		$year            Year
 * @param   int		$monthshown      Current month shown in calendar view
 * @param   string	$style           Style to use for this day
 * @param   array<int,ActionComm[]>	$eventarray      Array of events
 * @param   int		$maxprint        Nb of actions to show each day on month view (0 means no limit)
 * @param   int		$maxnbofchar     Nb of characters to show for event line
 * @param   string	$newparam        Parameters on current URL
 * @param   int		$showinfo        Add extended information (used by day and week view)
 * @param   int		$minheight       Minimum height for each event. 60px by default.
 * @param	int<-1,1>	$nonew			 0=Add "new entry button", 1=No "new entry button", -1=Only "new entry button"
 * @param	array{}|array{help:'toreporttype',0:array{0:int,1:int,2:int},1:array{0:int,1:int,2:int},2:array{0:int,1:int,2:int}}	$bookcalcalendarsarray	 Used for Bookcal module array of calendar of bookcal
 * @return	void
 */
function show_day_events($db, $day, $month, $year, $monthshown, $style, &$eventarray, $maxprint = 0, $maxnbofchar = 16, $newparam = '', $showinfo = 0, $minheight = 60, $nonew = 0, $bookcalcalendarsarray = array())
{
}
/**
 * Change color with a delta
 *
 * @param	string	$color		Color
 * @param 	int		$minus		Delta (1 = 16 unit). Positive value = darker color, Negative value = brighter color.
 * @param   int     $minusunit  Minus unit
 * @return	string				New color
 */
function dol_color_minus($color, $minus, $minusunit = 16)
{
}
/**
 * Sort events by date
 *
 * @param   object  $a      Event A
 * @param   object  $b      Event B
 * @return  int             Return integer < 0 if event A should be before event B, > 0 otherwise, 0 if they have the exact same time slot
 */
function sort_events_by_date($a, $b)
{
}
/**
 * Sort events by percentage
 *
 * @param   object  $a      Event A
 * @param   object  $b      Event B
 * @return  int             Return integer < 0 if event A should be before event B, > 0 otherwise, 0 if they have the exact same percentage
 */
function sort_events_by_percentage($a, $b)
{
}