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
$num = 0;
$error = 0;
$backtopage = \GETPOST('backtopage', 'alpha');
$action = \GETPOST('action', 'aZ09');
$extrafields = new \ExtraFields($db);
$object = new \Partnership($db);
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
// Test on permission not required here. This is an anonymous form. Check is done on constant to enable and mitigation.
$error = 0;
$urlback = '';
$public = \GETPOSTISSET('public') ? 1 : 0;
/*
 * View
 */
$form = new \Form($db);
$formcompany = new \FormCompany($db);
$messagemandatory = '<span class="">' . $langs->trans("FieldsWithAreMandatory", '*') . '</span>';
// Type
$partnershiptype = new \PartnershipType($db);
$listofpartnershipobj = $partnershiptype->fetchAll('', '', 1000, 0, '(active:=:1)');
$listofpartnership = array();
$country_id = \GETPOSTINT('country_id');
$country_code = \dol_user_country();
$country_code = \getCountry($country_id, '2', $db, $langs);