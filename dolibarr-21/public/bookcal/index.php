<?php

\define("NOLOGIN", 1);
\define("NOCSRFCHECK", 1);
\define('NOBROWSERNOTIF', '1');
/**
 * Show header for booking
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