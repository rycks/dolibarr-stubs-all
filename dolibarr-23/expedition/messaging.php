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
// Security check
$id = \GETPOSTINT("id");
$socid = 0;
// Shipping module doesn't typically have a draft status, so simplified restrictedArea
$result = \restrictedArea($user, 'expedition', $id, 'expedition&shipping');
/*
 * Actions
 */
$object = new \Expedition($db);
$parameters = array('id' => $socid);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$agenda = \isModEnabled('agenda') && ($user->hasRight('agenda', 'myactions', 'read') || $user->hasRight('agenda', 'allactions', 'read')) ? '/' . $langs->trans("Agenda") : '';
$title = $langs->trans('Events') . $agenda . ' - ' . $object->ref;
$help_url = "EN:Module_Shippings|FR:Module_Expeditions|ES:M&oacute;dulo_Expediciones";
$head = \shipping_prepare_head($object);
$morehtmlref = '<div class="refidno">';
// Actions buttons
$out = '';
$permok = $user->hasRight('agenda', 'myactions', 'create');
$morehtmlright = '';
// Show link to change view in message
$messagingUrl = \DOL_URL_ROOT . '/expedition/messaging.php?id=' . $object->id;
// Status 2 for "current page"
// Show link to change view in agenda
$messagingUrl = \DOL_URL_ROOT . '/expedition/agenda.php?id=' . $object->id;
$param = '&id=' . $object->id;
$cachekey = 'count_events_expedition_' . $object->id;
$nbEvent = \dol_getcache($cachekey);
$titlelist = $langs->trans("ActionsOnShipping") . (\is_numeric($nbEvent) ? '<span class="opacitymedium colorblack paddingleft">(' . $nbEvent . ')</span>' : '');
// List of all actions
$filters = array();