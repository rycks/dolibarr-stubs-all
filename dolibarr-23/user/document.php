<?php

$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm');
$id = \GETPOSTINT('userid') ? \GETPOSTINT('userid') : \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'userdoc';
// Define value to know what current user can do on users
$permissiontoadd = !empty($user->admin) || $user->hasRight("user", "user", "write");
$permissiontoread = !empty($user->admin) || $user->hasRight("user", "user", "read");
$permissiontoedit = !empty($user->admin) || $user->hasRight("user", "user", "write");
$permissiontodisable = !empty($user->admin) || $user->hasRight("user", "user", "delete");
$permissiontoreadgroup = $permissiontoread;
$permissiontoeditgroup = $permissiontoedit;
$permissiontoadd = $permissiontoedit;
// Used by the include of actions_addupdatedelete.inc.php and actions_linkedfiles
$permtoedit = $permissiontoedit;
// Security check
$socid = 0;
$feature2 = 'user';
$result = \restrictedArea($user, 'user', $id, 'user&user', $feature2);
// Get parameters
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$object = new \User($db);
$upload_dir = \null;
/*
 * Actions
 */
$parameters = array('id' => $socid);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$person_name = !empty($object->firstname) ? $object->lastname . ", " . $object->firstname : $object->lastname;
$title = $person_name . " - " . $langs->trans('Documents');
$help_url = '';
$head = \user_prepare_head($object);
$linkback = '';
$morehtmlref = '<a href="' . \DOL_URL_ROOT . '/user/vcard.php?id=' . $object->id . '&output=file&file=' . \urlencode(\dol_sanitizeFileName($object->getFullName($langs) . '.vcf')) . '" class="refid valignmiddle" rel="noopener">';
$urltovirtualcard = '/user/virtualcard.php?id=' . (int) $object->id;
// Build file list
$filearray = \dol_dir_list($upload_dir, "files", 0, '', '(\\.meta|_preview.*\\.png)$', $sortfield, \strtolower($sortorder) == 'desc' ? \SORT_DESC : \SORT_ASC, 1);
$totalsize = 0;
$modulepart = 'user';
$param = '&id=' . $object->id;