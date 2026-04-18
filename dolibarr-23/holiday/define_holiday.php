<?php

$action = \GETPOST('action', 'aZ09');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'defineholidaylist';
$massaction = \GETPOST('massaction', 'alpha');
$optioncss = \GETPOST('optioncss', 'alpha');
$mode = \GETPOST('optioncss', 'aZ');
$search_name = \GETPOST('search_name', 'alpha');
$search_supervisor = \GETPOST('search_supervisor', "intcomma");
// Load variable for pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$toselect = \GETPOST('toselect', 'array:int');
// Array of ids of elements selected into a list
$confirm = \GETPOST('confirm', 'alpha');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$extrafields = new \ExtraFields($db);
$holiday = new \Holiday($db);
$arrayfields = array('cp.rowid' => array('label' => $langs->trans("Employee"), 'checked' => '1', 'position' => 20), 'cp.fk_user' => array('label' => $langs->trans("Supervisor"), 'checked' => '1', 'position' => 30), 'cp.nbHoliday' => array('label' => $langs->trans("MenuConfCP"), 'checked' => '1', 'position' => 40), 'cp.note_public' => array('label' => $langs->trans("Note"), 'checked' => '1', 'position' => 50));
$permissiontoread = $user->hasRight('holiday', 'read');
$permissiontoreadall = $user->hasRight('holiday', 'readall');
$permissiontowrite = $user->hasRight('holiday', 'write');
$permissiontowriteall = $user->hasRight('holiday', 'writeall');
$permissiontodelete = $user->hasRight('holiday', 'delete');
$permissiontoapprove = $user->hasRight('holiday', 'approve');
$permissiontosetup = $user->hasRight('holiday', 'define_holiday');
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
// Mass actions
$objectclass = 'Holiday';
$objectlabel = 'Holiday';
$uploaddir = $conf->holiday->dir_output;
/*
 * View
 */
$form = new \Form($db);
$userstatic = new \User($db);
$title = $langs->trans('CPTitreMenu');
$help_url = 'EN:Module_Holiday';
$typeleaves = $holiday->getTypes(1, 1);
$result = $holiday->updateBalance();
// List of mass actions available
$arrayofmassactions = array();
$massactionbutton = $form->selectMassAction('', $arrayofmassactions);
$title = $langs->trans("MenuConfCP");
$lastUpdate = $holiday->getConfCP('lastUpdate');
$filters = '';
// Filter on array of ids of all children
$userchilds = array();
// Only employee users are visible
$listUsers = $holiday->fetchUsers(\false, \true, $filters);
$i = 0;