<?php

$action = \GETPOST('action', 'aZ09');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : \getDolDefaultContextPage(__FILE__);
$actioncode = \GETPOST('actioncode', 'array:alpha', 3);
$search_rowid = \GETPOST('search_rowid');
$search_agenda_label = \GETPOST('search_agenda_label');
$search_complete = \GETPOST('search_complete');
$search_filtert = \GETPOSTINT('search_filtert');
$search_dateevent_start = \GETPOSTDATE('dateevent_start');
$search_dateevent_end = \GETPOSTDATE('dateevent_end');
// Get Parameters
$id = \GETPOSTINT('id') ? \GETPOSTINT('id') : \GETPOSTINT('rowid');
// Pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT('page');
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
// Get object canvas (By default, this is not defined, so standard usage of dolibarr)
$objcanvas = \null;
// Security check
$result = \restrictedArea($user, 'adherent', $id);
// Initialize a technical objects
$object = new \Adherent($db);
$result = $object->fetch($id);
/*
 *	Actions
 */
$parameters = array('id' => $id, 'objcanvas' => $objcanvas);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 *	View
 */
$contactstatic = new \Contact($db);
$form = new \Form($db);
$title = $langs->trans("Member") . " - " . $langs->trans("Agenda");
$help_url = "EN:Module_Foundations|FR:Module_Adh&eacute;rents|ES:M&oacute;dulo_Miembros|DE:Modul_Mitglieder";
$head = \member_prepare_head($object);
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/adherents/list.php', ['restore_lastsearch_values' => 1]) . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/adherents/vcard.php', ['id' => $object->id]) . '" class="refid">';
//print '<div class="tabsAction">';
//print '</div>';
$newcardbutton = '';
$messagingUrl = \dolBuildUrl(\DOL_URL_ROOT . '/adherents/messaging.php', ['rowid' => $object->id]);
$messagingUrl = \dolBuildUrl(\DOL_URL_ROOT . '/adherents/agenda.php', ['id' => $object->id]);