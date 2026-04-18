<?php

\define("NOLOGIN", 1);
\define("NOCSRFCHECK", 1);
\define('NOIPCHECK', '1');
\define('NOBROWSERNOTIF', '1');
// For MultiCompany module.
// Do not use GETPOST here, function is not defined and define must be done before including main.inc.php
// Because 2 entities can have the same ref.
$entity = !empty($_GET['e']) ? (int) $_GET['e'] : (!empty($_POST['e']) ? (int) $_POST['e'] : 1);
\define("DOLENTITY", $entity);
$object = new \stdClass();
// For triggers
$error = 0;
// Security check
$id = \GETPOSTINT("id");
$securekeyreceived = \GETPOST("securekey");
$securekeytocompare = \dol_hash(\getDolGlobalString('EVENTORGANIZATION_SECUREKEY') . 'conferenceorbooth' . (int) $id, 'md5');
/**
 * Show header for new member
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
function llxHeaderSubscriptionOk($title, $head = "", $disablejs = 0, $disablehead = 0, $arrayofjs = [], $arrayofcss = [])
{
}
/*
 * Actions
 */
/*
 * View
 */
$now = \dol_now();
$tracepost = "";
$head = '';
$suffix = '';