<?php

$id = \GETPOSTINT('id');
$action = \GETPOST('action', 'aZ09');
$mode = \GETPOST('mode', 'alpha');
$confirm = \GETPOST('confirm', 'alpha');
$optioncss = \GETPOST('optioncss', 'aZ09');
$cancel = \GETPOST('cancel', 'alpha');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'usercredentials';
// To manage different context of search
$backtopage = \GETPOST('backtopage');
$backtopageforcancel = \GETPOST('backtopageforcancel');
$group = \GETPOSTINT("group", 3);
$search_secret_key = \GETPOST('search_secret_key');
// Load variable for pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$object = new \User($db);
$extrafields = new \ExtraFields($db);
$error = 0;
// Security check
$socid = 0;
$feature2 = 'user';
$result = \restrictedArea($user, 'user', $id, 'user', $feature2);
// Define value to know what current user can do on users. A test on logged user is done later to complete
$permissiontoadd = (!empty($user->admin) || $user->hasRight("user", "user", "write")) && (empty($user->socid) || $user->socid == $object->socid);
$permissiontoread = (!empty($user->admin) || $user->hasRight("user", "user", "read")) && (empty($user->socid) || $user->socid == $object->socid);
$permissiontoedit = (!empty($user->admin) || $user->hasRight("user", "user", "write")) && (empty($user->socid) || $user->socid == $object->socid);
$permissiontodisable = (!empty($user->admin) || $user->hasRight("user", "user", "delete")) && (empty($user->socid) || $user->socid == $object->socid);
$permissiontoreadgroup = $permissiontoread;
$permissiontoeditgroup = $permissiontoedit;
$permissiontoclonesuperadmin = $permissiontoadd && empty($user->entity);
$permissiontocloneadmin = $permissiontoadd && !empty($user->admin);
$permissiontocloneuser = $permissiontoadd;
$caneditpasswordandsee = \false;
$caneditpasswordandsend = \false;
// Define value to know what current user can do on properties of edited user
$permissiontoeditpasswordandsee = \false;
$permissiontoeditpasswordandsend = \false;
/*
 * Actions
 */
$parameters = array('id' => $id, 'socid' => $socid, 'group' => $group, 'caneditgroup' => $permissiontoeditgroup);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$backurlforlist = \DOL_URL_ROOT . '/user/list.php';
/*
 * View
 */
$form = new \Form($db);
$person_name = !empty($object->firstname) ? $object->lastname . ", " . $object->firstname : $object->lastname;
$title = $person_name . " - " . $langs->trans('Credentials');
$help_url = '';
$param = '';
//$tmpurlforbutton = 'javascript:console.log("open add totp form");jQuery(".divsectiontotp").toggle(); void(0);';
$newcardbutton = \dolGetButtonTitle($langs->trans('New'), '', 'fa fa-plus-circle', $_SERVER["PHP_SELF"] . '?id=' . $object->id . '&action=addtotp&token=' . \newToken() . '&backtopage=' . \urlencode($_SERVER['PHP_SELF']), '', $permissiontoadd ? 1 : 0);
//$listoftotps = $user->fetchAll($sortorder, $sortfield, 1000, 0, "(fk_user:=:".((int) $object->id).") AND (service:=:'dolibarr_totp')", true);
$listoftotps = array();
$sql = "SELECT rowid, token, state, restricted_ips, datec, tms, lastaccess FROM " . $db->prefix() . "oauth_token";
$resql = $db->query($sql);
$nbtotalofrecords = $num = \count($listoftotps);
$massactionbutton = '';
$totalarray = array();