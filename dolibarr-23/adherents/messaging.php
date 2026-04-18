<?php

$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'useragenda';
$actioncode = \GETPOST('actioncode', 'array:alpha', 3);
$id = \GETPOSTINT('rowid') ? \GETPOSTINT('rowid') : \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$search_rowid = \GETPOST('search_rowid');
$search_agenda_label = \GETPOST('search_agenda_label');
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT('page');
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$socid = \GETPOSTINT('socid');
// Security check
$result = \restrictedArea($user, 'adherent', $id);
// Initialize a technical objects
$object = new \Adherent($db);
$result = $object->fetch($id);
/*
 *	Actions
 */
$parameters = array('id' => $socid);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$person_name = !empty($object->firstname) ? $object->lastname . ", " . $object->firstname : $object->lastname;
$title = $person_name . " - " . $langs->trans('Info');
$help_url = 'EN:Module_Foundations|FR:Module_Adh&eacute;rents|ES:M&oacute;dulo_Miembros|DE:Modul_Mitglieder';
$head = \member_prepare_head($object);
$title = $langs->trans("User");
$linkback = '<a href="' . \DOL_URL_ROOT . '/adherents/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<a href="' . \DOL_URL_ROOT . '/adherents/vcard.php?id=' . $object->id . '" class="refid">';
$linkback = '';
$objUser = $object;
$objcon = new \stdClass();
$out = '';
$permok = $user->hasRight('agenda', 'myactions', 'create');
$morehtmlright = '';
$messagingUrl = \dolBuildUrl(\DOL_URL_ROOT . '/adherents/messaging.php', ['rowid' => $object->id]);
$messagingUrl = \dolBuildUrl(\DOL_URL_ROOT . '/adherents/agenda.php', ['id' => $object->id]);
$param = '&userid=' . \urlencode((string) $id);
$cachekey = 'count_events_member_' . $object->id;
$nbEvent = \dol_getcache($cachekey);
// TODO Add nb into badge in menu so we can get it from cache also here
$titlelist = $langs->trans("ActionsOnMember") . (\is_numeric($nbEvent) ? '<span class="opacitymedium colorblack paddingleft">(' . $nbEvent . ')</span>' : '');
// List of all actions
$filters = array();