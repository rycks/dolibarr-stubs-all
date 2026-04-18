<?php

$id = \GETPOSTINT('id');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
// Security check
$socid = \GETPOSTINT('socid');
$object = new \ActionComm($db);
// Get parameters
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$upload_dir = $conf->agenda->dir_output . '/' . \dol_sanitizeFileName($object->ref);
$modulepart = 'actions';
$result = \restrictedArea($user, 'agenda', $id, 'actioncomm&societe', 'myactions|allactions', 'fk_soc', 'id');
$usercancreate = $user->hasRight('agenda', 'allactions', 'create') || ($object->authorid == $user->id || $object->userownerid == $user->id) && $user->hasRight('agenda', 'myactions', 'create');
$permissiontoadd = $usercancreate;
/*
 * View
 */
$form = new \Form($db);
$help_url = 'EN:Module_Agenda_En|FR:Module_Agenda|ES:M&omodulodulo_Agenda|DE:Modul_Terminplanung';
$now = \dol_now();
$delay_warning = \getDolGlobalInt('MAIN_DELAY_ACTIONS_TODO') * 24 * 60 * 60;
$result1 = $object->fetch($id);
$result2 = $object->fetch_thirdparty();
$result3 = $object->fetch_contact();
$result4 = $object->fetch_userassigned();
$result5 = $object->fetch_optionals();
$author = new \User($db);
$head = \actions_prepare_head($object);
// Link to other agenda views
$linkback = '<a href="' . \DOL_URL_ROOT . '/comm/action/list.php?mode=show_list&restore_lastsearch_values=1">';
// Add more views from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('addCalendarView', $parameters, $object, $action);
$morehtmlref = '<div class="refidno">';
$listofuserid = array();
$listofcontactid = array();
// not used yet
$listofotherid = array();
// Build file list
$filearray = \dol_dir_list($upload_dir, "files", 0, '', '(\\.meta|_preview.*\\.png)$', $sortfield, \strtolower($sortorder) == 'desc' ? \SORT_DESC : \SORT_ASC, 1);
$totalsize = 0;
$modulepart = 'actions';
$permissiontoadd = $user->hasRight('agenda', 'myactions', 'create') || $user->hasRight('agenda', 'allactions', 'create');
$param = '&id=' . $object->id;