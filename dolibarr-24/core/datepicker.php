<?php

\define('NOREQUIREUSER', '1');
\define('NOREQUIRESOC', '1');
\define('NOCSRFCHECK', 1);
\define('NOTOKENRENEWAL', 1);
\define('NOLOGIN', 1);
\define('NOREQUIREMENU', 1);
\define('NOREQUIREHTML', 1);
/**
 * 	Convert date string to a Unix timestamp
 *
 * 	@param	string		$mysqldate		Date YYYMMDD
 *  @return	integer					Timestamp
 */
function xyzToUnixTimestamp($mysqldate)
{
}
/**
 * Displays the date picker box
 *
 * @param	string	$selectedDate	Date YYYYMMDD
 * @param	int		$month			Month
 * @param 	int		$year			Year
 * @return	void
 */
function displayBox($selectedDate, $month, $year)
{
}