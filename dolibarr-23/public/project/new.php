<?php

\define("NOLOGIN", 1);
\define("NOCSRFCHECK", 1);
\define('NOIPCHECK', '1');
\define('NOBROWSERNOTIF', '1');
// For MultiCompany module.
// Do not use GETPOST here, function is not defined and define must be done before including main.inc.php
// Because 2 entities can have the same ref.
$entity = !empty($_GET['entity']) ? (int) $_GET['entity'] : (!empty($_POST['entity']) ? (int) $_POST['entity'] : 1);
\define("DOLENTITY", $entity);
// Init vars
$errmsg = '';
$error = 0;
$backtopage = \GETPOST('backtopage', 'alpha');
$action = \GETPOST('action', 'aZ09');
$extrafields = new \ExtraFields($db);
$object = new \Project($db);
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
 * Actions
 */
$parameters = array();
// Note that $action and $object may have been modified by some hooks
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
// Test on permission not required here. This is an anonymous public submission form. Check is done on the constant to enable feature + mitigation.
$error = 0;
$urlback = '';
// Set default opportunity status
$defaultoppstatus = \getDolGlobalInt('PROJECT_DEFAULT_OPPORTUNITY_STATUS_FOR_ONLINE_LEAD');
$visibility = \getDolGlobalString('PROJET_VISIBILITY');
$proj = new \Project($db);
$thirdparty = new \Societe($db);
/*
 * View
 */
$form = new \Form($db);
$formcompany = new \FormCompany($db);
$country_id = \GETPOST('country_id');
$country_code = \dol_user_country();
$country_code = \getCountry($country_id, '2', $db, $langs);