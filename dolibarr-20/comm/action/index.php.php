<?php

/**
 * Show event of a particular day
 *
 * @param	DoliDB	$db              Database handler
 * @param   int		$day             Day
 * @param   int		$month           Month
 * @param   int		$year            Year
 * @param   int		$monthshown      Current month shown in calendar view
 * @param   string	$style           Style to use for this day
 * @param   array	$eventarray      Array of events
 * @param   int		$maxprint        Nb of actions to show each day on month view (0 means no limit)
 * @param   int		$maxnbofchar     Nb of characters to show for event line
 * @param   string	$newparam        Parameters on current URL
 * @param   int		$showinfo        Add extended information (used by day and week view)
 * @param   int		$minheight       Minimum height for each event. 60px by default.
 * @param	int		$nonew			 0=Add "new entry button", 1=No "new entry button", -1=Only "new entry button"
 * @param	array{}|array{0:array{0:int,1:int,2:int},1:array{0:int,1:int,2:int},2:array{0:int,1:int,2:int}}	$bookcalcalendarsarray	 Used for Bookcal module array of calendar of bookcal
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