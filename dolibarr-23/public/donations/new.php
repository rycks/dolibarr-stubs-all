<?php

\define("NOLOGIN", 1);
\define("NOCSRFCHECK", 1);
\define('NOBROWSERNOTIF', '1');
// For MultiCompany module.
// Do not use GETPOST here, function is not defined and define must be done before including main.inc.php
// Because 2 entities can have the same ref.
$entity = !empty($_GET['entity']) ? (int) $_GET['entity'] : (!empty($_POST['entity']) ? (int) $_POST['entity'] : 1);
// if (is_numeric($entity)) { // $entity is casted to int
\define("DOLENTITY", $entity);
// Init vars
$backtopage = \GETPOST('backtopage', 'alpha');
$action = \GETPOST('action', 'aZ09');
$errmsg = '';
$num = 0;
$error = 0;
// Initialize a technical object to manage hooks of page. Note that conf->hooks_modules contains an array of hook context
//$hookmanager->initHooks(array( 'globalcard'));
$extrafields = new \ExtraFields($db);
$object = new \Don($db);
$captchaobj = \null;
$captcha = \getDolGlobalString('MAIN_SECURITY_ENABLECAPTCHA_HANDLER', 'standard');
// List of directories where we can find captcha handlers
$dirModCaptcha = \array_merge(array('main' => '/core/modules/security/captcha/'), \is_array($conf->modules_parts['captcha']) ? $conf->modules_parts['captcha'] : array());
$fullpathclassfile = '';
/**
 * Show header for new donation
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
 * Show footer for new donation
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
// Check Captcha code if is enabled
$ok = \false;
$public = \GETPOSTISSET('public') ? 1 : 0;
/*
 * View
 */
$form = new \Form($db);
$formcompany = new \FormCompany($db);
$project = new \Project($db);
$result = $project->fetch(\GETPOSTINT('project_id'));
$messagemandatory = '<span class="">' . $langs->trans("FieldsWithAreMandatory", '*') . '</span>';
$country_id = \GETPOSTINT('country_id');
$country_code = \getCountry($country_id, '2', $db, $langs);
// Public
$publiclabel = $langs->trans("publicDonationFieldHelp", \getDolGlobalString('MAIN_INFO_SOCIETE_NOM'));