<?php

\define("NOLOGIN", 1);
\define("NOCSRFCHECK", 1);
\define('NOBROWSERNOTIF', '1');
// For MultiCompany module.
// Do not use GETPOST here, function is not defined and define must be done before including main.inc.php
// Because 2 entities can have the same ref
$entity = !empty($_GET['entity']) ? (int) $_GET['entity'] : (!empty($_POST['entity']) ? (int) $_POST['entity'] : 1);
// if (is_numeric($entity)) { // value is casted to int so always numeric
\define("DOLENTITY", $entity);
/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
// Init vars
$backtopage = \GETPOST('backtopage', 'alpha');
$action = \GETPOST('action', 'aZ09');
$errmsg = '';
$num = 0;
$error = 0;
// permissions
$permissiontoadd = $user->hasRight('societe', 'creer');
$extrafields = new \ExtraFields($db);
$object = new \Societe($db);
// fetch optionals attributes and labels
/**
 * Show header for new prospect
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
 * Show footer for new societe
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
// Test on permission not required here. This is a public page. Security is done on constant and mitigation.
$error = 0;
$urlback = '';
/*
 * View
 */
$form = new \Form($db);
$formcompany = new \FormCompany($db);
$adht = new \AdherentType($db);
$formadmin = new \FormAdmin($db);
$messagemandatory = '<span class="">' . $langs->trans("FieldsWithAreMandatory", '*') . '</span>';