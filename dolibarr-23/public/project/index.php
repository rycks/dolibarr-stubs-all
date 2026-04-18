<?php

\define("NOLOGIN", 1);
\define("NOCSRFCHECK", 1);
\define('NOIPCHECK', '1');
\define('NOBROWSERNOTIF', '1');
// For MultiCompany module.
// Do not use GETPOST here, function is not defined and get of entity must be done before including main.inc.php
// Because 2 entities can have the same ref.
$entity = !empty($_GET['entity']) ? (int) $_GET['entity'] : (!empty($_POST['entity']) ? (int) $_POST['entity'] : (!empty($_GET['e']) ? (int) $_GET['e'] : (!empty($_POST['e']) ? (int) $_POST['e'] : 1)));
\define("DOLENTITY", $entity);
// File with generic data
// Security check
// No check on module enabled. Done later according to $validpaymentmethod
$errmsg = '';
$error = 0;
$action = \GETPOST('action', 'aZ09');
$id = \GETPOSTINT('id');
$securekeyreceived = \GETPOST("securekey", 'alpha');
$securekeytocompare = \dol_hash(\getDolGlobalString('EVENTORGANIZATION_SECUREKEY') . 'conferenceorbooth' . (int) $id, 'md5');
// Define $urlwithroot
//$urlwithouturlroot=preg_replace('/'.preg_quote(DOL_URL_ROOT,'/').'$/i','',trim($dolibarr_main_url_root));
//$urlwithroot=$urlwithouturlroot.DOL_URL_ROOT;		// This is to use external domain name found into config file
$urlwithroot = \DOL_MAIN_URL_ROOT;
// This is to use same domain name than current. For Paypal payment, we can use internal URL like localhost.
$project = new \Project($db);
$resultproject = $project->fetch($id);
$extrafields = new \ExtraFields($db);
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
function llxHeaderVierge($title, $head = "", $disablejs = 0, $disablehead = 0, $arrayofjs = [], $arrayofcss = [])
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
/*
 * View
 */
$head = '';
$replacemainarea = (empty($conf->dol_hide_leftmenu) ? '<div>' : '') . '<div>';
$format = 'day';
$tmparray = \dol_getdate($project->date_start_event, \false, '');
$format = 'day';
$tmparray = \dol_getdate($project->date_end_event, \false, '');
// Output introduction text
$foundaction = 0;
$suffix = '';