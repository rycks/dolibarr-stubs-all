<?php

$action = \GETPOST('action', 'aZ09');
$backtopage = \GETPOST('backtopage');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'thirdpartyagenda';
$actioncode = \GETPOST('actioncode', 'array:alpha', 3);
$search_rowid = \GETPOST('search_rowid');
$search_agenda_label = \GETPOST('search_agenda_label');
$search_complete = \GETPOST('search_complete');
$search_filtert = \GETPOSTINT('search_filtert');
$search_dateevent_start = \GETPOSTDATE('dateevent_start');
$search_dateevent_end = \GETPOSTDATE('dateevent_end');
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT('page');
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$actioncode = \GETPOST('actioncode', 'array', 3);
// Initialize a technical objects
$object = new \Societe($db);
// Security check
$socid = \GETPOSTINT('socid');
$result = $object->fetch($socid);
$result = \restrictedArea($user, 'societe', $socid, '&societe');
/*
 *	Actions
 */
$parameters = array('id' => $socid);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 *	View
 */
$title = $langs->trans("Agenda");
$help_url = '';
$head = \societe_prepare_head($object);
$linkback = '<a href="' . \DOL_URL_ROOT . '/societe/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '';
// Actions buttons
$objthirdparty = $object;
$objcon = new \stdClass();
$out = '';
$permok = $user->hasRight('agenda', 'myactions', 'create');
$morehtmlright = '';
$messagingUrl = \DOL_URL_ROOT . '/societe/messaging.php?socid=' . $object->id;
$messagingUrl = \DOL_URL_ROOT . '/societe/agenda.php?socid=' . $object->id;
$param = '&socid=' . \urlencode((string) $socid);
$cachekey = 'count_events_thirdparty_' . $object->id;
$nbEvent = \dol_getcache($cachekey);
$titlelist = $langs->trans("ActionsOnCompany") . (\is_numeric($nbEvent) ? '<span class="opacitymedium colorblack paddingleft">(' . $nbEvent . ')</span>' : '');
// List of all actions
$filters = array();