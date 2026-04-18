<?php

\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define("NOLOGIN", 1);
\define("NOCSRFCHECK", 1);
\define('NOIPCHECK', '1');
// It's a wrapper, so empty header
/**
 * Header function
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
/**
 * Footer function
 *
 * Note: also called by functions.lib:recordNotFound
 *
 * @return	void
 */
function llxFooterVierge()
{
}
// For MultiCompany module.
// Do not use GETPOST here, function is not defined and define must be done before including main.inc.php
// Because 2 entities can have the same ref
$entity = !empty($_GET['entity']) ? (int) $_GET['entity'] : (!empty($_POST['entity']) ? (int) $_POST['entity'] : 1);
\define("DOLENTITY", $entity);
$agenda = new \ActionComm($db);
// Define format, type and filter
$format = 'ical';
$type = 'event';
$filters = array();
$reshook = $hookmanager->executeHooks('doActions', $filters);
// Define filename with prefix on filters predica (each predica set must have on cache file)
$shortfilename = 'calendar';
$filename = $shortfilename;
$cachedelay = 0;
$exportholidays = \GETPOSTINT('includeholidays');
$result = $agenda->build_exportfile($format, $type, $cachedelay, $filename, $filters, $exportholidays);
$result = $agenda->build_exportfile($format, $type, $cachedelay, $filename, $filters, $exportholidays);