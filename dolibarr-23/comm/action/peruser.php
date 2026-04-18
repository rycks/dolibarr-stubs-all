<?php

$MAXAGENDA = \getDolGlobalString('AGENDA_EXT_NB', 5);
$DELAYFORCACHE = 300;
// 300 seconds
$disabledefaultvalues = \GETPOSTINT('disabledefaultvalues');
$action = \GETPOST('action', 'aZ09');
$check_holiday = \GETPOSTINT('check_holiday');
$filter = \GETPOST("search_filter", 'alpha', 3) ? \GETPOST("search_filter", 'alpha', 3) : \GETPOST("filter", 'alpha', 3);
$filtert = \GETPOST("search_filtert", "intcomma", 3) ? \GETPOST("search_filtert", "intcomma", 3) : \GETPOST("filtert", "intcomma", 3);
$usergroup = \GETPOSTINT("search_usergroup", 3) ? \GETPOSTINT("search_usergroup", 3) : \GETPOSTINT("usergroup", 3);
$showbirthday = \getDolGlobalInt('AGENDA_ENABLE_SHOW_BIRTHDAY_PER_USER');
// disabled by default
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$offset = $limit * $page;
// Security check
$socid = \GETPOSTINT("search_socid") ? \GETPOSTINT("search_socid") : \GETPOSTINT("socid");
$canedit = 1;
$mode = 'show_peruser';
$resourceid = \GETPOSTINT("search_resourceid") ? \GETPOSTINT("search_resourceid") : \GETPOSTINT("resourceid");
$year = \GETPOSTINT("year") ? \GETPOSTINT("year") : \date("Y");
$month = \GETPOSTINT("month") ? \GETPOSTINT("month") : \date("m");
$week = \GETPOSTINT("week") ? \GETPOSTINT("week") : \date("W");
$day = \GETPOSTINT("day") ? \GETPOSTINT("day") : \date("d");
$pid = \GETPOSTISSET("search_projectid") ? \GETPOSTINT("search_projectid", 3) : \GETPOSTINT("projectid", 3);
$status = \GETPOSTISSET("search_status") ? \GETPOST("search_status", 'aZ09') : \GETPOST("status", 'aZ09');
// status may be 0, 50, 100, 'todo', 'na' or -1
$type = \GETPOSTISSET("search_type") ? \GETPOST("search_type", 'aZ09') : \GETPOST("type", 'aZ09');
$maxprint = \GETPOSTISSET("maxprint") ? \GETPOSTINT("maxprint") : \getDolGlobalInt('AGENDA_MAX_EVENTS_DAY_VIEW', 3);
$optioncss = \GETPOST('optioncss', 'aZ');
// Option for the css output (always '' except when 'print')
$search_categ_cus = \GETPOSTINT("search_categ_cus", 3) ? \GETPOSTINT("search_categ_cus", 3) : 0;
$actioncode = \GETPOST('search_actioncode', 'array:aZ09', 3);
$dateselect = \dol_mktime(0, 0, 0, \GETPOSTINT('dateselectmonth'), \GETPOSTINT('dateselectday'), \GETPOSTINT('dateselectyear'));
// working hours
$tmp = \getDolGlobalString('MAIN_DEFAULT_WORKING_HOURS', '9-18');
$tmp = \str_replace(' ', '', $tmp);
// FIX 7533
$tmparray = \explode('-', $tmp);
$begin_h = \GETPOSTISSET('begin_h') ? \GETPOSTINT('begin_h') : ($tmparray[0] != '' ? $tmparray[0] : 9);
$end_h = \GETPOSTISSET('end_h') ? \GETPOSTINT('end_h') : ($tmparray[1] != '' ? $tmparray[1] : 18);
// working days
$tmp = \getDolGlobalString('MAIN_DEFAULT_WORKING_DAYS', '1-5');
$tmp = \str_replace(' ', '', $tmp);
// FIX 7533
$tmparray = \explode('-', $tmp);
$begin_d = \GETPOSTISSET('begin_d') ? \GETPOSTINT('begin_d') : ($tmparray[0] != '' ? $tmparray[0] : 1);
$end_d = \GETPOSTISSET('end_d') ? \GETPOSTINT('end_d') : ($tmparray[1] != '' ? $tmparray[1] : 5);
$object = new \ActionComm($db);
$result = \restrictedArea($user, 'agenda', 0, 'actioncomm&societe', 'myactions|allactions', 'fk_soc', 'id');
$search_status = $status;
/*
 * Actions
 */
// None
/*
 * View
 */
$parameters = array('socid' => $socid, 'status' => $status, 'year' => $year, 'month' => $month, 'day' => $day, 'type' => $type, 'maxprint' => $maxprint, 'filter' => $filter, 'filtert' => $filtert, 'showbirthday' => $showbirthday, 'canedit' => $canedit, 'optioncss' => $optioncss, 'actioncode' => $actioncode, 'pid' => $pid, 'resourceid' => $resourceid, 'usergroup' => $usergroup);
$reshook = $hookmanager->executeHooks('beforeAgendaPerUser', $parameters, $object, $action);
$form = new \Form($db);
$companystatic = new \Societe($db);
$help_url = 'EN:Module_Agenda_En|FR:Module_Agenda|ES:M&oacute;dulo_Agenda|DE:Modul_Terminplanung';
$now = \dol_now();
$nowarray = \dol_getdate($now);
$nowyear = $nowarray['year'];
$nowmonth = $nowarray['mon'];
$nowday = $nowarray['mday'];
$listofextcals = array();
$prev = \dol_get_first_day_week($day, $month, $year);
$first_day = $prev['first_day'];
$first_month = $prev['first_month'];
$first_year = $prev['first_year'];
$week = $prev['week'];
$day = (int) $day;
$next = \dol_get_next_week($day, (int) $week, $month, $year);
$next_year = $next['year'];
$next_month = $next['month'];
$next_day = $next['day'];
$max_day_in_month = \date("t", \dol_mktime(0, 0, 0, $month, 1, $year));
$tmpday = $first_day;
//print 'xx'.$prev_year.'-'.$prev_month.'-'.$prev_day;
//print 'xx'.$next_year.'-'.$next_month.'-'.$next_day;
$title = $langs->trans("DoneAndToDoActions");
$param = '';
$paramnoactionodate = $param;
$prev = \dol_get_first_day_week($day, $month, $year);
//print "day=".$day." month=".$month." year=".$year;
//var_dump($prev); exit;
$prev_year = $prev['prev_year'];
$prev_month = $prev['prev_month'];
$prev_day = $prev['prev_day'];
$first_day = $prev['first_day'];
$first_month = $prev['first_month'];
$first_year = $prev['first_year'];
$week = $prev['week'];
$day = (int) $day;
$next = \dol_get_next_week($first_day, (int) $week, $first_month, $first_year);
$next_year = $next['year'];
$next_month = $next['month'];
$next_day = $next['day'];
// Define firstdaytoshow and lastdaytoshow. Warning: lastdaytoshow is last second to show + 1
// $firstdaytoshow and lastdaytoshow become a gmt dates to use to search/compare because first_xxx are in tz idea and we used tzuserrel
$firstdaytoshow = \dol_mktime(0, 0, 0, $first_month, $first_day, $first_year, 'tzuserrel');
$nb_weeks_to_show = \getDolGlobalString('AGENDA_NB_WEEKS_IN_VIEW_PER_USER') ? (int) $conf->global->AGENDA_NB_WEEKS_IN_VIEW_PER_USER * 7 : 7;
$lastdaytoshow = \dol_time_plus_duree($firstdaytoshow, $nb_weeks_to_show, 'd');
//print $firstday.'-'.$first_month.'-'.$first_year;
//print dol_print_date($firstdaytoshow, 'dayhour', 'gmt');
//print dol_print_date($lastdaytoshow,'dayhour', 'gmt');
$max_day_in_month = \idate("t", \dol_mktime(0, 0, 0, $month, 1, $year, 'gmt'));
$tmpday = $first_day;
$picto = 'calendarweek';
// Show navigation bar
$nav = '<div class="navselectiondate inline-block nowraponall">';
// Must be after the nav definition
$paramnodate = $param;
//print 'x'.$param;
$paramnoaction = \preg_replace('/mode=[a-z_]+/', '', \preg_replace('/action=[a-z_]+/', '', $param));
$paramnoactionodate = \preg_replace('/mode=[a-z_]+/', '', \preg_replace('/action=[a-z_]+/', '', $paramnodate));
$head = \calendars_prepare_head($paramnoaction);
$mode = 'show_peruser';
$massactionbutton = '';
$viewmode = '<div class="navmode inline-block">';
// Add more views from hooks
$parameters = array();
$object = \null;
$reshook = $hookmanager->executeHooks('addCalendarView', $parameters, $object, $action);
$newparam = '';
$newcardbutton = '';
$tmpforcreatebutton = \dol_getdate(\dol_now('tzuserrel'), \true);
$urltocreateaction = \DOL_URL_ROOT . '/comm/action/card.php?action=create';
$link = '';
// Define the legend/list of calendard to show
$s = '';
$showextcals = $listofextcals;
$bookcalcalendars = array();
$sql = "SELECT ba.rowid, bc.label, bc.ref, bc.rowid as id_cal";
$resql = $db->query($sql);
// Birthdays
//$s.='<div class="nowrap float"><input type="checkbox" id="check_birthday" name="check_birthday"> '.$langs->trans("AgendaShowBirthdayEvents").' &nbsp; </div>';
// Bookcal Calendar
/*
if (isModEnabled("bookcal")) {
	if (!empty($bookcalcalendars["calendars"])) {
		foreach ($bookcalcalendars["calendars"] as $key => $value) {
			$label = $value['label'];
			$s .= '<div class="nowrap inline-block minheight30">';
			$s .= '<input '.(GETPOST('check_bookcal_calendar_'.$value['id']) ? "checked" : "").' type="checkbox" id="check_bookcal_calendar_'.$value['id'].'" name="check_bookcal_calendar_'.$value['id'].'" class="check_bookcal_calendar_'.$value['id'].'">';
			$s .= '<label for="check_bookcal_calendar_'.$value['id'].'" class="labelcalendar">';
			$s .= '<span class="check_bookcal_calendar_'.$value['id'].'_text">'.$langs->trans("AgendaShowBookcalCalendar", $label).'</span>';
			$s .= '</label> &nbsp; </div>';
		}
	}
}
*/
// Calendars from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('addCalendarChoice', $parameters, $object, $action);
// Load events from database into $eventarray
$eventarray = array();
// DEFAULT CALENDAR + AUTOEVENT CALENDAR + CONFERENCEBOOTH CALENDAR
$sql = "SELECT";
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListSelect', $parameters);
// If the internal user must only see his customers, force searching by him
$search_sale = 0;
$resql = $db->query($sql);
// always false @phpstan-ignore-line
// Add events in array
$sql = 'SELECT sp.rowid, sp.lastname, sp.firstname, sp.birthday';
$resql = $db->query($sql);
$sql = "SELECT u.rowid as uid, u.lastname, u.firstname, u.statut, x.rowid, x.date_debut as date_start, x.date_fin as date_end, x.halfday, x.statut as status";
$resql = $db->query($sql);
// Complete $eventarray with events coming from external module
$parameters = array();
$object = \null;
$reshook = $hookmanager->executeHooks('getCalendarEvents', $parameters, $object, $action);
// Sort events
/*
foreach ($eventarray as $keyDate => &$dateeventarray) {
	usort($dateeventarray, 'sort_events_by_date');
}
*/
$maxnbofchar = 18;
$cachethirdparties = array();
$cachecontacts = array();
$cacheusers = array();
// default values
$theme_datacolor = array(array(137, 86, 161), array(60, 147, 183), array(250, 190, 80), array(80, 166, 90), array(190, 190, 100), array(91, 115, 247), array(140, 140, 220), array(190, 120, 120), array(115, 125, 150), array(100, 170, 20), array(150, 135, 125), array(85, 135, 150), array(150, 135, 80), array(150, 80, 150));
// Define theme_datacolor array
$color_file = \DOL_DOCUMENT_ROOT . "/theme/" . $conf->theme . "/theme_vars.inc.php";
$massactionbutton = '';
$num = 0;
$link = '';
$newparam = $param;
// newparam is for birthday links
$newparam = \preg_replace('/showbirthday=/i', 'showbirthday_=', $newparam);
// To avoid replacement when replace day= is done
$newparam = \preg_replace('/mode=show_month&?/i', '', $newparam);
$newparam = \preg_replace('/mode=show_week&?/i', '', $newparam);
$newparam = \preg_replace('/day=[0-9]+&?/i', '', $newparam);
$newparam = \preg_replace('/month=[0-9]+&?/i', '', $newparam);
$newparam = \preg_replace('/year=[0-9]+&?/i', '', $newparam);
$newparam = \preg_replace('/viewweek=[0-9]+&?/i', '', $newparam);
$newparam = \preg_replace('/showbirthday_=/i', 'showbirthday=', $newparam);
// Line header with list of days
//print "begin_d=".$begin_d." end_d=".$end_d;
$currentdaytoshow = $firstdaytoshow;
//print dol_print_date($currentdaytoshow, 'dayhour', 'gmt');
$colorsbytype = array();
/**
 * Show event line of a particular day for a user
 *
 * @param   User    $username		Login
 * @param   int		$day            Day
 * @param   int		$month          Month
 * @param   int		$year           Year
 * @param   int		$monthshown     Current month shown in calendar view
 * @param   string	$style          Style to use for this day
 * @param   array<int,ActionComm[]>	$eventarray      Array of events
 * @param   int		$maxprint       Nb of actions to show each day on month view (0 means no limit)
 * @param   int		$maxnbofchar    Nb of characters to show for event line
 * @param   string	$newparam       Parameters on current URL
 * @param   int		$showinfo       Add extended information (used by day view)
 * @param   int		$minheight      Minimum height for each event. 60px by default.
 * @param	boolean	$showheader		Show header
 * @param	array<string,string>	$colorsbytype	Array with colors by type
 * @param	bool	$var			true or false for alternat style on tr/td
 * @return	void
 */
function show_day_events2($username, $day, $month, $year, $monthshown, $style, &$eventarray, $maxprint = 0, $maxnbofchar = 16, $newparam = '', $showinfo = 0, $minheight = 60, $showheader = \false, $colorsbytype = array(), $var = \false)
{
}