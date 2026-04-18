<?php

\define("NOLOGIN", 1);
\define("NOCSRFCHECK", 1);
\define('NOIPCHECK', '1');
\define('NOBROWSERNOTIF', '1');
// For MultiCompany module.
// Do not use GETPOST here, function is not defined and define must be done before including main.inc.php
// Because 2 entities can have the same ref
$entity = !empty($_GET['entity']) ? (int) $_GET['entity'] : (!empty($_POST['entity']) ? (int) $_POST['entity'] : 1);
\define("DOLENTITY", $entity);
/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Societe $mysoc
 * @var Translate $langs
 * @var User $user
 *
 * @var string $dolibarr_main_url_root
 */
// Init vars
$errmsg = '';
$errors = array();
$error = 0;
$backtopage = \GETPOST('backtopage', 'alpha');
$action = \GETPOST('action', 'aZ09');
$email = \GETPOST("email");
$societe = \GETPOST("societe");
$emailcompany = \GETPOST("emailcompany");
$note_public = \GETPOST('note_public', "restricthtml");
$firstname = \GETPOST('firstname');
$lastname = \GETPOST('lastname');
// Getting id from Post and decoding it
$type = \GETPOST('type', 'aZ09');
$conference = new \ConferenceOrBooth($db);
$confattendee = new \ConferenceOrBoothAttendee($db);
$project = new \Project($db);
$object = $confattendee;
$resultconf = $conference->fetch($id);
$resultproject = $project->fetch($conference->fk_project);
$currentnbofattendees = 0;
$resultproject = $project->fetch($id);
// Security check
$securekeyreceived = \GETPOST('securekey', 'alpha');
$securekeytocompare = \dol_hash(\getDolGlobalString('EVENTORGANIZATION_SECUREKEY') . 'conferenceorbooth' . (int) $id, 'md5');
$extrafields = new \ExtraFields($db);
// fetch optionals attributes and labels
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
// Test on permission not required. Check are done on securitykey and mitigation
$error = 0;
$urlback = '';
$thirdparty = \null;
/*
 * View
 */
$form = new \Form($db);
$formcompany = new \FormCompany($db);
$format = 'day';
$tmparray = \dol_getdate($project->date_start_event, \false, '');
$format = 'day';
$tmparray = \dol_getdate($project->date_end_event, \false, '');
$maxattendees = 0;