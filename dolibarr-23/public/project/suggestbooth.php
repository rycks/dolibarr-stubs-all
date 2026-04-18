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
/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Societe $mysoc
 * @var Translate $langs
 * @var User $user
 */
// Init vars
$errmsg = '';
$num = 0;
$error = 0;
$errors = [];
$backtopage = \GETPOST('backtopage', 'alpha');
$action = \GETPOST('action', 'aZ09');
$eventtype = \GETPOSTINT("eventtype");
$email = \GETPOST("email");
$societe = \GETPOST("societe");
$label = \GETPOST("label");
$note = \GETPOST("note");
$datestart = \dol_mktime(0, 0, 0, \GETPOSTINT('datestartmonth'), \GETPOSTINT('datestartday'), \GETPOSTINT('datestartyear'));
$dateend = \dol_mktime(23, 59, 59, \GETPOSTINT('dateendmonth'), \GETPOSTINT('dateendday'), \GETPOSTINT('dateendyear'));
$id = \GETPOST('id');
$project = new \Project($db);
$resultproject = $project->fetch((int) $id);
// Security check
$securekeyreceived = \GETPOST('securekey', 'alpha');
$securekeytocompare = \dol_hash(\getDolGlobalString('EVENTORGANIZATION_SECUREKEY') . 'conferenceorbooth' . (int) $id, 'md5');
$extrafields = new \ExtraFields($db);
$cactioncomm = new \CActionComm($db);
$arrayofconfboothtype = $cactioncomm->liste_array('', 'id', '', 0, "module='booth@eventorganization'");
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
$reshook = $hookmanager->executeHooks('doActions', $parameters, $project, $action);
// Test on permission not required here. This is an anonymous public ssubmission. Check is done on the secureket + mitigation.
$error = 0;
$urlback = '';
$thirdparty = \null;
$contact = \null;
/*
 * View
 */
$form = new \Form($db);
$formcompany = new \FormCompany($db);
$format = 'day';
$tmparray = \dol_getdate($project->date_start_event, \false, '');
$format = 'day';
$tmparray = \dol_getdate($project->date_end_event, \false, '');
$country_id = \GETPOST('country_id');
$country_code = \dol_user_country();
$country_code = \getCountry($country_id, '2', $db, $langs);