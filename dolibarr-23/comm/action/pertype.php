<?php

$action = \GETPOST('action', 'aZ09');
$disabledefaultvalues = \GETPOSTINT('disabledefaultvalues');
$filter = \GETPOST("search_filter", 'alpha', 3) ? \GETPOST("search_filter", 'alpha', 3) : \GETPOST("filter", 'alpha', 3);
$filtert = \GETPOST("search_filtert", "intcomma", 3) ? \GETPOST("search_filtert", "intcomma", 3) : \GETPOST("filtert", "intcomma", 3);
$usergroup = \GETPOSTINT("search_usergroup", 3) ? \GETPOSTINT("search_usergroup", 3) : \GETPOSTINT("usergroup", 3);
//if (! ($usergroup > 0) && ! ($filtert > 0)) $filtert = $user->id;
// $showbirthday = empty($conf->use_javascript_ajax)?GETPOST("showbirthday","int"):1;
$showbirthday = 0;
// Sorting
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$offset = $limit * $page;
// Security check
$socid = \GETPOSTINT("search_socid") ? \GETPOSTINT("search_socid") : \GETPOSTINT("socid");
$canedit = 1;
$mode = 'show_pertype';
$resourceid = \GETPOSTINT("search_resourceid") ? \GETPOSTINT("search_resourceid") : \GETPOSTINT("resourceid");
$year = \GETPOSTINT("year") ? \GETPOSTINT("year") : \date("Y");
$month = \GETPOSTINT("month") ? \GETPOSTINT("month") : \date("m");
$week = \GETPOSTINT("week") ? \GETPOSTINT("week") : \date("W");
$day = \GETPOSTINT("day") ? \GETPOSTINT("day") : \date("d");
$pid = \GETPOSTISSET("search_projectid") ? \GETPOSTINT("search_projectid", 3) : \GETPOSTINT("projectid", 3);
$status = \GETPOSTISSET("search_status") ? \GETPOST("search_status", 'aZ09') : \GETPOST("status", 'aZ09');
$type = \GETPOSTISSET("search_type") ? \GETPOST("search_type", 'alpha') : \GETPOST("type", 'alpha');
$maxprint = \GETPOSTINT("maxprint") != '' ? \GETPOSTINT("maxprint") : $conf->global->AGENDA_MAX_EVENTS_DAY_VIEW;
$optioncss = \GETPOST('optioncss', 'aZ');
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
$begin_d = 1;
$end_d = 53;
// Initialize object
$object = new \ActionComm($db);
$result = \restrictedArea($user, 'agenda', 0, 'actioncomm&societe', 'myactions');
$search_status = $status;
/*
 * Actions
 */
// None
/*
 * View
 */
$parameters = array('socid' => $socid, 'status' => $status, 'year' => $year, 'month' => $month, 'day' => $day, 'type' => $type, 'maxprint' => $maxprint, 'filter' => $filter, 'filtert' => $filtert, 'showbirthday' => $showbirthday, 'canedit' => $canedit, 'optioncss' => $optioncss, 'actioncode' => $actioncode, 'pid' => $pid, 'resourceid' => $resourceid, 'usergroup' => $usergroup);
$reshook = $hookmanager->executeHooks('beforeAgendaPerType', $parameters, $object, $action);
$form = new \Form($db);
$companystatic = new \Societe($db);
$help_url = 'EN:Module_Agenda_En|FR:Module_Agenda|ES:M&oacute;dulo_Agenda|DE:Modul_Terminplanung';
$now = \dol_now();
$nowarray = \dol_getdate($now);
$nowyear = $nowarray['year'];
$nowmonth = $nowarray['mon'];
$nowday = $nowarray['mday'];
// Define list of all external calendars (global setup)
$listofextcals = array();
$first_day = 1;
$first_month = 1;
$first_year = $year;
$prev = \dol_get_first_day_week($day, $month, $year);
$week = $prev['week'];
$day = (int) $day;
$next = \dol_get_next_day($day, $month, $year);
$next_year = $year + 1;
$next_month = $month;
$next_day = $day;
$max_day_in_month = \date("t", \dol_mktime(0, 0, 0, $month, 1, $year));
$tmpday = $first_day;
//print 'xx'.$prev_year.'-'.$prev_month.'-'.$prev_day;
//print 'xx'.$next_year.'-'.$next_month.'-'.$next_day;
$title = $langs->trans("DoneAndToDoActions");
$param = '';
$paramnoactionodate = $param;
$prev_year = $year - 1;
$prev_month = $month;
$prev_day = $day;
$first_day = 1;
$first_month = 1;
$first_year = $year;
$prev = \dol_get_first_day_week(1, 1, $year);
$week = $prev['week'];
$day = (int) $day;
$next = \dol_get_next_day(31, 12, $year);
$next_year = $year + 1;
$next_month = $month;
$next_day = $day;
// Define firstdaytoshow and lastdaytoshow. Warning: lastdaytoshow is last second to show + 1
// $firstdaytoshow and lastdaytoshow become a gmt dates to use to search/compare because first_xxx are in tz idea and we used tzuserrel
$firstdaytoshow = \dol_mktime(0, 0, 0, $first_month, $first_day, $first_year, 'tzuserrel');
$lastdaytoshow = \dol_time_plus_duree($firstdaytoshow, 7, 'd');
//print $firstday.'-'.$first_month.'-'.$first_year;
//print dol_print_date($firstdaytoshow, 'dayhour', 'gmt');
//print dol_print_date($lastdaytoshow,'dayhour', 'gmt');
$max_day_in_month = \date("t", \dol_mktime(0, 0, 0, $month, 1, $year, 'gmt'));
$tmpday = $first_day;
$picto = 'calendarweek';
// Show navigation bar
$nav = '<div class="navselectiondate inline-block nowraponall">';
//print 'x'.$param;
$paramnoaction = \preg_replace('/action=[a-z_]+/', '', $param);
$head = \calendars_prepare_head($paramnoaction);
$showextcals = $listofextcals;
$s = '';
$massactionbutton = '';
$viewmode = '<div class="navmode inline-block">';
// Add more views from hooks
$parameters = array();
$object = \null;
$reshook = $hookmanager->executeHooks('addCalendarView', $parameters, $object, $action);
$newparam = '';
$newcardbutton = '';
$link = '';
//print load_fiche_titre('', $link.' &nbsp; &nbsp; '.$nav.' '.$newcardbutton, '');
// Local calendar
$newtitle = '<div class="nowrap clear inline-block minheight30">';
//$newtitle=$langs->trans($title);
$s = $newtitle;
// Get event in an array
$eventarray = array();
// DEFAULT CALENDAR + AUTOEVENT CALENDAR + CONFERENCEBOOTH CALENDAR
$sql = "SELECT";
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListSelect', $parameters);
// If the internal user must only see his customers, force searching by him
$search_sale = 0;
$resql = $db->query($sql);
$maxnbofchar = 18;
$cachethirdparties = array();
$cachecontacts = array();
$cacheusers = array();
// default values
$theme_datacolor = array(array(120, 130, 150), array(200, 160, 180), array(190, 190, 220));
// Define theme_datacolor array
$color_file = \DOL_DOCUMENT_ROOT . "/theme/" . $conf->theme . "/theme_vars.inc.php";
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
$i = 0;
$i = 0;
$typeofevents = array();
// Load array of colors by type
$colorsbytype = array();
$labelbytype = array();
$sql = "SELECT code, color, libelle as label FROM " . \MAIN_DB_PREFIX . "c_actioncomm ORDER BY position";
$resql = $db->query($sql);
// Loop on each user to show calendar
$todayarray = \dol_getdate($now, \true);
$sav = $tmpday;
$showheader = \true;
$var = \false;
/**
 * Show event line of a particular day for a user
 *
 * @param	string  $username		Login
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
 * @param	bool	$showheader		Show header
 * @param	array<string,string>	$colorsbytype	Array with colors by type
 * @param	bool	$var			true or false for alternat style on tr/td
 * @return	void
 */
function show_day_events_pertype($username, $day, $month, $year, $monthshown, $style, &$eventarray, $maxprint = 0, $maxnbofchar = 16, $newparam = '', $showinfo = 0, $minheight = 60, $showheader = \false, $colorsbytype = array(), $var = \false)
{
}