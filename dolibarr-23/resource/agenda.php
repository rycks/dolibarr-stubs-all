<?php

// Get parameters
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel');
$backtopage = \GETPOST('backtopage', 'alpha');
$actioncode = \GETPOST('actioncode', 'array', 3);
$search_rowid = \GETPOST('search_rowid');
$search_agenda_label = \GETPOST('search_agenda_label');
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
// Initialize a technical objects
$extrafields = new \ExtraFields($db);
$object = new \Dolresource($db);
// Must be 'include', not 'include_once'.
$result = \restrictedArea($user, 'resource', $object->id, 'resource');
/*
 *	Actions
 */
$parameters = array('id' => $id);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 *	View
 */
$contactstatic = new \Contact($db);
$form = new \Form($db);
$picto = 'resource';
$title = $langs->trans("Agenda");
$help_url = '';
$type = $langs->trans('ResourceSingular');
$head = \resource_prepare_head($object);
$titre = $langs->trans("ResourceSingular");
$linkback = '<a href="' . \DOL_URL_ROOT . '/resource/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
$shownav = 1;