<?php

$id = \GETPOSTINT('id') ? \GETPOSTINT('id') : \GETPOSTINT('facid');
// For backward compatibility
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$morejs = '';
$origin = '';
$object = new \Reception($db);
$permissionnote = $user->hasRight('reception', 'creer');
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$form = new \Form($db);
$head = \reception_prepare_head($object);
// Reception card
$linkback = '<a href="' . \DOL_URL_ROOT . '/reception/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
$cssclass = 'titlefield';