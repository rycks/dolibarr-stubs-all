<?php

$id = \GETPOSTINT('id');
$socid = 0;
$result = \restrictedArea($user, 'agenda', $id, 'actioncomm&societe', 'myactions|allactions', 'fk_soc', 'id');
$object = new \ActionComm($db);
$usercancreate = $user->hasRight('agenda', 'allactions', 'create') || ($object->authorid == $user->id || $object->userownerid == $user->id) && $user->hasRight('agenda', 'myactions', 'create');
/*
 * View
 */
$form = new \Form($db);
$help_url = 'EN:Module_Agenda_En|FR:Module_Agenda|ES:M&omodulodulo_Agenda|DE:Modul_Terminplanung';
$head = \actions_prepare_head($object);
// Link to other agenda views
$linkback = '<a href="' . \DOL_URL_ROOT . '/comm/action/list.php?mode=show_list&restore_lastsearch_values=1">';
// Add more views from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('addCalendarView', $parameters, $object, $action);
$morehtmlref = '<div class="refidno">';