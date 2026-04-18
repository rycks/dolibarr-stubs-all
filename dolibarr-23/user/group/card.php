<?php

// Define if user can read permissions
$permissiontoadd = $user->admin || $user->hasRight("user", "user", "write");
$permissiontoread = $user->admin || $user->hasRight("user", "user", "read");
$permissiontoedit = $user->admin || $user->hasRight("user", "user", "write");
$permissiontodisable = $user->admin || $user->hasRight("user", "user", "delete");
$feature2 = 'user';
// Advanced permissions
$advancedpermsactive = \false;
$id = \GETPOSTINT('id');
$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel');
$confirm = \GETPOST('confirm', 'alpha');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'groupcard';
// To manage different context of search
$backtopage = \GETPOST('backtopage', 'alpha');
$userid = \GETPOSTINT('user');
$object = new \UserGroup($db);
$extrafields = new \ExtraFields($db);
// Security check
$result = \restrictedArea($user, 'user', $id, 'usergroup&usergroup', $feature2);
/**
 * Actions
 */
$error = 0;
$parameters = array('id' => $id, 'userid' => $userid, 'caneditperms' => $permissiontoedit);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$backurlforlist = \DOL_URL_ROOT . '/user/group/list.php';
// Actions to build doc
$upload_dir = $conf->user->dir_output . '/usergroups';
/*
 * View
 */
$title = $object->name . ' - ' . $langs->trans("Card");
$help_url = "";
$form = new \Form($db);
$fuserstatic = new \User($db);
$form = new \Form($db);
$formfile = new \FormFile($db);
$formother = new \FormOther($db);