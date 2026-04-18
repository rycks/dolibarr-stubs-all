<?php

// Get parameters
$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel', 'alpha');
$confirm = \GETPOST('confirm', 'alpha');
$backtopage = \GETPOST('backtopage', 'alpha');
$backtopageforcancel = \GETPOST('backtopageforcancel', 'alpha');
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$fuserid = \GETPOSTINT('fuserid') ? \GETPOSTINT('fuserid') : ($action == 'create' ? $user->id : 0);
$socid = \GETPOSTINT('socid');
$error = 0;
$errors = [];
$now = \dol_now();
$childids = $user->getAllChildIds(1);
$morefilter = '';
$object = new \Holiday($db);
$extrafields = new \ExtraFields($db);
$permissiontoapprove = $user->hasRight('holiday', 'approve');
$canread = 0;
$permissiontoadd = 0;
$permissiontoaddall = 0;
$permissiontoeditextra = $permissiontoadd;
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
$formfile = new \FormFile($db);
$object = new \Holiday($db);
$listhalfday = array('morning' => $langs->trans("Morning"), "afternoon" => $langs->trans("Afternoon"));
$title = $langs->trans('Leave');
$help_url = 'EN:Module_Holiday';
$edit = \false;