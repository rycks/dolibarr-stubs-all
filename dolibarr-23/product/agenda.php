<?php

$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : \str_replace('_', '', \basename(\dirname(__FILE__)) . \basename(__FILE__, '.php'));
$actioncode = \GETPOST('actioncode', 'array:alpha', 3);
$search_rowid = \GETPOST('search_rowid');
$search_agenda_label = \GETPOST('search_agenda_label');
$search_complete = \GETPOST('search_complete');
$search_filtert = \GETPOSTINT('search_filtert');
$search_dateevent_start = \GETPOSTDATE('dateevent_start');
$search_dateevent_end = \GETPOSTDATE('dateevent_end');
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$object = new \Product($db);
// Security check
$socid = 0;
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
$title = $langs->trans("Agenda");
$help_url = 'EN:Module_Agenda_En|FR:Module_Agenda|DE:Modul_Terminplanung';
$type = $langs->trans('Product');
$head = \product_prepare_head($object);
$titre = $langs->trans("CardProduct" . $object->type);
$picto = $object->type == \Product::TYPE_SERVICE ? 'service' : 'product';
$linkback = '<a href="' . \DOL_URL_ROOT . '/product/list.php?restore_lastsearch_values=1&type=' . $object->type . '">' . $langs->trans("BackToList") . '</a>';
$shownav = 1;
// Actions buttons
$objproduct = $object;
$objcon = new \stdClass();
$out = '';
$morehtmlright = '';
$messagingUrl = \DOL_URL_ROOT . '/product/messaging.php?id=' . $object->id;
$messagingUrl = \DOL_URL_ROOT . '/product/agenda.php?id=' . $object->id;
$permok = $user->hasRight('agenda', 'myactions', 'create');
$linktocreatetimeBtnStatus = $user->hasRight('agenda', 'myactions', 'create') || $user->hasRight('agenda', 'allactions', 'create');
$param = '&id=' . $id;
$cachekey = 'count_events_product_' . $object->id;
$nbEvent = \dol_getcache($cachekey);
$titlelist = $langs->trans("ActionsOnProduct") . (\is_numeric($nbEvent) ? '<span class="opacitymedium colorblack paddingleft">(' . $nbEvent . ')</span>' : '');
// List of all actions
$filters = array();