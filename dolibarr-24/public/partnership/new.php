<?php

\define("NOLOGIN", 1);
\define("NOCSRFCHECK", 1);
\define('NOIPCHECK', '1');
\define('NOBROWSERNOTIF', '1');
\define("DOLENTITY", $entity);
/**
 * Show header for new partnership
 *
 * Note: also called by functions.lib:recordNotFound
 *
 * @param 	string		$title				Title
 * @param 	string		$head				Head array
 * @param 	int<0,1>	$disablejs			More content into html header
 * @param 	int<0,1>	$disablehead		More content into html header
 * @param 	string[]	$arrayofjs			Array of complementary js files
 * @param 	string[]	$arrayofcss			Array of complementary css files
 * @param 	string			$ws					Website ref if we are called from a website
 * @return	void
 */
function llxHeaderVierge($title, $head = "", $disablejs = 0, $disablehead = 0, $arrayofjs = [], $arrayofcss = [], $ws = '')
{
}
/**
 * Show footer for new member
 *
 * Note: also called by functions.lib:recordNotFound
 *
 * @return	void
 */
function llxFooterVierge()
{
}