<?php

/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 *
 * @var Societe $mysoc
 */
// Get parameters
$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel', 'alpha');
$confirm = \GETPOST('confirm', 'alpha');
$backtopage = \GETPOST('backtopage', 'alpha');
// if not set, a default page will be used
$backtopageforcancel = \GETPOST('backtopageforcancel', 'alpha');
// if not set, $backtopage will be used
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$fuserid = \GETPOSTINT('fuserid') ? \GETPOSTINT('fuserid') : $user->id;
$users = \GETPOST('users', 'array') ? \GETPOST('users', 'array') : array($user->id);
$groups = \GETPOST('groups', 'array');
$socid = \GETPOSTINT('socid');
$autoValidation = \GETPOSTINT('autoValidation');
$AutoSendMail = \GETPOSTINT('AutoSendMail');
$error = 0;
$now = \dol_now();
$childids = $user->getAllChildIds(1);
$morefilter = '';
$object = new \Holiday($db);
$extrafields = new \ExtraFields($db);
// Check current user can read this leave request
$canread = 0;
$permissiontoadd = 0;
$permissiontoaddall = 0;
$candelete = 0;
$result = \restrictedArea($user, 'holiday', $object->id, 'holiday', '', '', 'rowid', $object->status);
/*
 * Actions
 */
$parameters = array('socid' => $socid);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$backurlforlist = \DOL_URL_ROOT . '/holiday/list.php';
/*
 * View
 */
$form = new \Form($db);
$object = new \Holiday($db);
$listhalfday = array('morning' => $langs->trans("Morning"), "afternoon" => $langs->trans("Afternoon"));
$title = $langs->trans('Leave');
$help_url = 'EN:Module_Holiday';
/**
 * send email to validator for current leave represented by (id)
 *
 * @param int	$id 				validator for current leave represented by (id)
 * @param int	$cancreate 			flag for user right
 * @param int 	$now 				date
 * @param int	$autoValidation 	boolean flag on autovalidation
 *
 * @return stdClass
 * @throws Exception
 */
function sendMail($id, $cancreate, $now, $autoValidation)
{
}