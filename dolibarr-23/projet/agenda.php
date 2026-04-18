<?php

$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$socid = \GETPOSTINT('socid');
$action = \GETPOST('action', 'aZ09');
$contextpage = \GETPOST('contextpage', 'aZ09');
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST("sortfield", "aZ09comma");
$sortorder = \GETPOST("sortorder", 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$page = \is_numeric($page) ? $page : 0;
$page = $page == -1 ? 0 : $page;
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$actioncode = \GETPOST('actioncode', 'array:alpha', 3);
$search_rowid = \GETPOST('search_rowid');
$search_agenda_label = \GETPOST('search_agenda_label');
$search_complete = \GETPOST('search_complete');
$search_filtert = \GETPOSTINT('search_filtert');
$search_dateevent_start = \GETPOSTDATE('dateevent_start');
$search_dateevent_end = \GETPOSTDATE('dateevent_end');
$object = new \Project($db);
// Security check
$id = \GETPOSTINT("id");
$socid = 0;
/*
 * Actions
 */
$parameters = array('id' => $socid);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$agenda = \isModEnabled('agenda') && ($user->hasRight('agenda', 'myactions', 'read') || $user->hasRight('agenda', 'allactions', 'read')) ? '/' . $langs->trans("Agenda") : '';
$title = $langs->trans('Events') . $agenda . ' - ' . $object->ref . ' ' . $object->name;
$help_url = "EN:Module_Projects|FR:Module_Projets|ES:M&oacute;dulo_Proyectos";
$head = \project_prepare_head($object);
$morehtmlref = '<div class="refidno">';
// Actions buttons
$out = '';
$permok = $user->hasRight('agenda', 'myactions', 'create');
//print '<div class="tabsAction">';
$morehtmlright = '';
// Show link to change view in message
$messagingUrl = \DOL_URL_ROOT . '/projet/messaging.php?id=' . $object->id;
// Show link to change view in agenda
$messagingUrl = \DOL_URL_ROOT . '/projet/agenda.php?id=' . $object->id;
$param = '&id=' . $object->id;
$cachekey = 'count_events_project_' . $object->id;
$nbEvent = \dol_getcache($cachekey);
$titlelist = $langs->trans("ActionsOnProject") . (\is_numeric($nbEvent) ? '<span class="opacitymedium colorblack paddingleft">(' . $nbEvent . ')</span>' : '');
// List of all actions
$filters = array();