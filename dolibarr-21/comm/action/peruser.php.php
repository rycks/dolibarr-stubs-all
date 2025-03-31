<?php

/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
$MAXAGENDA = \getDolGlobalString('AGENDA_EXT_NB', 5);
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