<?php

// Security check
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$actioncode = \GETPOST('actioncode', 'array:alpha', 3);
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
$object = new \User($db);
$result = $object->fetch($id, $ref, '', 1);
// Security check
$socid = 0;
$feature2 = $socid && $user->hasRight('user', 'self', 'creer') ? '' : 'user';
$result = \restrictedArea($user, 'user', $id, 'user&user', $feature2);
/*
 *	Actions
 */
$parameters = array('id' => $id);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$person_name = !empty($object->firstname) ? $object->lastname . ", " . $object->firstname : $object->lastname;
$title = $person_name . " - " . $langs->trans('Info');
$help_url = '';
$head = \user_prepare_head($object);
$title = $langs->trans("User");
$linkback = '';
$morehtmlref = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/user/vcard.php', ['id' => $object->id, 'output' => 'file', 'file' => \dol_sanitizeFileName($object->getFullName($langs) . '.vcf')]) . '" class="refid" rel="noopener">';
$urltovirtualcard = '/user/virtualcard.php?id=' . (int) $object->id;
$objUser = $object;
$objcon = new \stdClass();
$query = [];
$permok = $user->hasRight('agenda', 'myactions', 'create');
$morehtmlright = '';
$messagingUrl = \dolBuildUrl(\DOL_URL_ROOT . '/user/messaging.php', ['userid' => $object->id]);
$messagingUrl = \dolBuildUrl(\DOL_URL_ROOT . '/user/agenda.php', ['id' => $object->id]);
$param = '&id=' . \urlencode((string) $id);
$cachekey = 'count_events_user_' . $object->id;
$nbEvent = \dol_getcache($cachekey);
$titlelist = $langs->trans("ActionsOnUser") . (\is_numeric($nbEvent) ? '<span class="opacitymedium colorblack paddingleft">(' . $nbEvent . ')</span>' : '');
// List of all actions
$filters = array();