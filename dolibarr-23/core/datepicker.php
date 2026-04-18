<?php

\define('NOREQUIREUSER', '1');
\define('NOREQUIRESOC', '1');
\define('NOCSRFCHECK', 1);
\define('NOTOKENRENEWAL', 1);
\define('NOLOGIN', 1);
\define('NOREQUIREMENU', 1);
\define('NOREQUIREHTML', 1);
$right = $langs->trans("DIRECTION") == 'rtl' ? 'left' : 'right';
$left = $langs->trans("DIRECTION") == 'rtl' ? 'right' : 'left';
// Define tradMonths javascript array (we define this in datapicker AND in parent page to avoid errors with IE8)
$tradTemp = array($langs->trans("January"), $langs->trans("February"), $langs->trans("March"), $langs->trans("April"), $langs->trans("May"), $langs->trans("June"), $langs->trans("July"), $langs->trans("August"), $langs->trans("September"), $langs->trans("October"), $langs->trans("November"), $langs->trans("December"));
$qualified = \true;
/**
 * 	Convert date to timestamp
 *
 * 	@param	string		$mysqldate		Date YYYMMDD
 *  @return	integer					Timestamp
 */
function xyzToUnixTimestamp($mysqldate)
{
}
/**
 * Show box
 *
 * @param	string	$selectedDate	Date YYYYMMDD
 * @param	int		$month			Month
 * @param 	int		$year			Year
 * @return	void
 */
function displayBox($selectedDate, $month, $year)
{
}