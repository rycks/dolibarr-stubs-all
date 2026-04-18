<?php

// Get parameters
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$track_id = \GETPOST('track_id', 'alpha', 3);
$socid = \GETPOSTINT('socid');
$action = \GETPOST('action', 'aZ09');
// Store current page url
$url_page_current = \DOL_URL_ROOT . '/ticket/agenda.php';
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$page = \is_numeric($page) ? $page : 0;
$page = $page == -1 ? 0 : $page;
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$actioncode = \GETPOST('actioncode', 'array', 3);
$search_rowid = \GETPOST('search_rowid');
$search_agenda_label = \GETPOST('search_agenda_label');
// Note that conf->hooks_modules contains array
$object = new \Ticket($db);
$extrafields = new \ExtraFields($db);
// Security check
$id = \GETPOSTINT("id");
$result = \restrictedArea($user, 'ticket', $object->id, '');
$permissiontoadd = $user->hasRight('ticket', 'write');
/*
 * Actions
 */
$parameters = array('id' => $socid);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$userstat = new \User($db);
$formticket = new \FormTicket($db);
$title = $langs->trans("Ticket") . ' - ' . $object->ref . ' ' . $object->name;
$help_url = 'EN:Module_Agenda_En|FR:Module_Agenda|DE:Modul_Terminplanung';
$head = \ticket_prepare_head($object);
$morehtmlref = '<div class="refidno">';
$linkback = '<a href="' . \DOL_URL_ROOT . '/ticket/list.php"><strong>' . $langs->trans("BackToList") . '</strong></a> ';
$param = '&id=' . $object->id;
$morehtmlright = '';
$messagingUrl = \DOL_URL_ROOT . '/ticket/messaging.php?track_id=' . $object->track_id;
$messagingUrl = \DOL_URL_ROOT . '/ticket/agenda.php?track_id=' . $object->track_id;
// Show link to send an email (if read and not closed)
$btnstatus = $object->status < \Ticket::STATUS_CLOSED && $action != "presend" && $action != "presend_addmessage";
$url = 'card.php?track_id=' . $object->track_id . '&action=presend_addmessage&mode=init&private_message=0&send_email=1&backtopage=' . \urlencode($_SERVER["PHP_SELF"] . '?track_id=' . $object->track_id) . '#formmailbeforetitle';
// Show link to add a message (if read and not closed)
$btnstatus = $object->status < \Ticket::STATUS_CLOSED && $action != "presend" && $action != "presend_addmessage";
$url = 'card.php?track_id=' . $object->track_id . '&action=presend_addmessage&mode=init&backtopage=' . \urlencode($_SERVER["PHP_SELF"] . '?track_id=' . $object->track_id) . '#formmailbeforetitle';
// Show link to add event (if read and not closed)
$btnstatus = $object->status < \Ticket::STATUS_CLOSED && $action != "presend" && $action != "presend_addmessage";
$url = \DOL_URL_ROOT . '/comm/action/card.php?action=create&datep=now&origin=ticket&originid=' . $object->id . '&projectid=' . $object->fk_project . '&backtopage=' . \urlencode($_SERVER["PHP_SELF"] . '?id=' . $object->id);
$cachekey = 'count_events_ticket_' . $object->id;
$nbEvent = \dol_getcache($cachekey);
$titlelist = $langs->trans("ActionsOnTicket") . (\is_numeric($nbEvent) ? '<span class="opacitymedium colorblack paddingleft">(' . $nbEvent . ')</span>' : '');
// List of all actions
$filters = array();