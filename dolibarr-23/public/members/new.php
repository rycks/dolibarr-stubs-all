<?php

\define("NOLOGIN", 1);
\define("NOCSRFCHECK", 1);
\define('NOBROWSERNOTIF', '1');
// For MultiCompany module.
// Do not use GETPOST here, function is not defined and define must be done before including main.inc.php
// Because 2 entities can have the same ref.
$entity = !empty($_GET['entity']) ? (int) $_GET['entity'] : (!empty($_POST['entity']) ? (int) $_POST['entity'] : 1);
\define("DOLENTITY", $entity);
// Init vars
$backtopage = \GETPOST('backtopage', 'alpha');
$action = \GETPOST('action', 'aZ09');
$errmsg = '';
$num = 0;
$error = 0;
$extrafields = new \ExtraFields($db);
$object = new \Adherent($db);
$captchaobj = \null;
$captcha = \getDolGlobalString('MAIN_SECURITY_ENABLECAPTCHA_HANDLER', 'standard');
// List of directories where we can find captcha handlers
$dirModCaptcha = \array_merge(array('main' => '/core/modules/security/captcha/'), \is_array($conf->modules_parts['captcha']) ? $conf->modules_parts['captcha'] : array());
$fullpathclassfile = '';
/**
 * Force switching conf of entity, even if user is connected
 * Fox example when trying to go on public form of an other entity
 *
 * @param 	int		$newEntity		New entity
 * @return	void
 */
function force_switch_entity($newEntity)
{
}
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
// Test on permission not required here
$memberfound = \false;
// Test on permission not required here. This is an anonymous form. Check is done on constant to enable and mitigation.
$error = 0;
$urlback = '';
$morphy = \GETPOST("morphy", 'alphanohtml');
$lastname = \GETPOST("lastname", 'alphanohtml');
$firstname = \GETPOST("firstname", 'alphanohtml');
$societe = \GETPOST("societe", 'alphanohtml');
$email = \preg_replace('/\\s+/', '', \GETPOST("member_email", 'aZ09arobase'));
$country_id = \getDolGlobalInt("MEMBER_NEWFORM_FORCECOUNTRYCODE", \GETPOSTINT('country_id'));
$birthday = \dol_mktime(\GETPOSTINT("birthhour"), \GETPOSTINT("birthmin"), \GETPOSTINT("birthsec"), \GETPOSTINT("birthmonth"), \GETPOSTINT("birthday"), \GETPOSTINT("birthyear"));
// Check Captcha code if is enabled
$ok = \false;
$public = \GETPOSTISSET('public') ? 1 : 0;
/*
 * View
 */
$form = new \Form($db);
$formcompany = new \FormCompany($db);
$adht = new \AdherentType($db);
// Moral/Physic attribute
$morphys = ["phy" => $langs->trans("Physical"), "mor" => $langs->trans("Moral")];
$checkednature = \GETPOST("morphy", 'alpha');
$listetype_natures = $adht->morphyByType(1);
// Load the array of morphy per typeof membership
$listetype_natures_json = \json_encode($listetype_natures);
$arraygender = array('man' => $langs->trans("Genderman"), 'woman' => $langs->trans("Genderwoman"), 'other' => $langs->trans("Genderother"));
$country_id = \GETPOSTINT('country_id');
$country_code = \getCountry($country_id, '2', $db, $langs);
// Define amount by default to suggest
$typeid = \getDolGlobalInt('MEMBER_NEWFORM_FORCETYPE', \GETPOSTINT('typeid'));
$adht = new \AdherentType($db);
$caneditamount = $adht->caneditamount;
$amountbytype = $adht->amountByType(1);
$amountbytype_json = \json_encode($amountbytype);
$caneditamountbytype = $adht->caneditamountByType(1);
// Load the array of caneditamount per type
$caneditamountbytype_json = \json_encode($caneditamountbytype);
// Set amount for the subscription from the the type and options:
// - First check the amount of the member type.
$amount = empty($amountbytype[$typeid]) ? 0 : $amountbytype[$typeid];
// - If a min is set, we take it into account
$amount = \max(0, (float) $amount, (float) \getDolGlobalInt("MEMBER_MIN_AMOUNT"));
// Clean the amount
$amount = \price2num($amount);
// Add hook to complete the form
$parameters = array('country_id' => $country_id, 'mode' => 'new');
$reshook = $hookmanager->executeHooks('membershipNewSubscriptionPublicForm', $parameters, $object, $action);