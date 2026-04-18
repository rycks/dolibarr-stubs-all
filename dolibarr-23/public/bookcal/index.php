<?php

\define("NOLOGIN", 1);
\define("NOCSRFCHECK", 1);
\define('NOBROWSERNOTIF', '1');
$action = \GETPOST('action', 'aZ09');
$id = \GETPOSTINT('id');
$id_availability = \GETPOSTINT('id_availability');
$year = \GETPOSTINT("year") ? \GETPOSTINT("year") : \idate("Y");
$month = \GETPOSTINT("month") ? \GETPOSTINT("month") : \idate("m");
$week = \GETPOSTINT("week") ? \GETPOSTINT("week") : \idate("W");
$day = \GETPOSTINT("day") ? \GETPOSTINT("day") : \idate("d");
$dateselect = \dol_mktime(0, 0, 0, \GETPOSTINT('dateselectmonth'), \GETPOSTINT('dateselectday'), \GETPOSTINT('dateselectyear'), 'tzuserrel');
$backtopage = \GETPOST("backtopage", "alpha");
$object = new \Calendar($db);
$result = $object->fetch($id);
$availability = new \Availabilities($db);
$now = \dol_now();
$nowarray = \dol_getdate($now);
$nowyear = $nowarray['year'];
$nowmonth = $nowarray['mon'];
$nowday = $nowarray['mday'];
$prev = \dol_get_prev_month($month, $year);
$prev_year = $prev['year'];
$prev_month = $prev['month'];
$next = \dol_get_next_month($month, $year);
$next_year = $next['year'];
$next_month = $next['month'];
$max_day_in_prev_month = \idate("t", \dol_mktime(0, 0, 0, $prev_month, 1, $prev_year, 'gmt'));
// Nb of days in previous month
$max_day_in_month = \idate("t", \dol_mktime(0, 0, 0, $month, 1, $year));
// Nb of days in next month
// tmpday is a negative or null cursor to know how many days before the 1st to show on month view (if tmpday=0, 1st is monday)
$tmpday = -\idate("w", \dol_mktime(12, 0, 0, $month, 1, $year, 'gmt')) + 2;
// Define firstdaytoshow and lastdaytoshow (warning: lastdaytoshow is last second to show + 1)
$firstdaytoshow = \dol_mktime(0, 0, 0, $prev_month, $max_day_in_prev_month + $tmpday, $prev_year, 'tzuserrel');
$next_day = 7 - ($max_day_in_month + 1 - $tmpday) % 7;
$lastdaytoshow = \dol_mktime(0, 0, 0, $next_month, $next_day, $next_year, 'tzuserrel');
$datechosen = \GETPOST('datechosen', 'alpha');
$datetimechosen = \GETPOSTINT('datetimechosen');
$isdatechosen = \false;
$timebooking = \GETPOST("timebooking");
$datetimebooking = \GETPOSTINT("datetimebooking");
$durationbooking = \GETPOSTINT("durationbooking");
$errmsg = '';
/**
 * Show header for booking
 *
 * Note: also called by functions.lib:recordNotFound
 *
 * @param 	string		$title				Title
 * @param 	string		$head				Head array
 * @param 	int    		$disablejs			More content into html header
 * @param 	int    		$disablehead		More content into html header
 * @param 	string[]|string	$arrayofjs			Array of complementary js files
 * @param 	string[]|string	$arrayofcss			Array of complementary css files
 * @return	void
 */
function llxHeaderVierge($title, $head = "", $disablejs = 0, $disablehead = 0, $arrayofjs = [], $arrayofcss = [])
{
}
// Test on permission not required here (anonymous action protected by mitigation of /public/... urls)
$error = 0;
$idcontact = 0;
$calendar = $object;
$contact = new \Contact($db);
$actioncomm = new \ActionComm($db);
$nb_post_max = \getDolGlobalInt("MAIN_SECURITY_MAX_POST_ON_PUBLIC_PAGES_BY_IP_ADDRESS", 200);
/*
 * View
 */
$form = new \Form($db);
// Define $urlwithroot
$urlwithouturlroot = \preg_replace('/' . \preg_quote(\DOL_URL_ROOT, '/') . '$/i', '', \trim($dolibarr_main_url_root));
$urlwithroot = $urlwithouturlroot . \DOL_URL_ROOT;
/**
 * Show event of a particular day
 *
 * @param   int		$day             		Day
 * @param   int		$month					Month
 * @param   int		$year 					Year
 * @param   int		$today 					Today's day
 * @return	void
 */
function show_bookcal_day_events($day, $month, $year, $today = 0)
{
}