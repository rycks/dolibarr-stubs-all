<?php

$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$now = \dol_now();
$object = new \Propal($db);
// Security check
$socid = '';
$usercancreate = $user->hasRight("propal", "creer");
/*
 * Actions
 */
$permissionnote = $user->hasRight('propal', 'creer');
// Used by the include of actions_setnotes.inc.php
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$title = $object->ref . " - " . $langs->trans('Notes');
$help_url = 'EN:Commercial_Proposals|FR:Proposition_commerciale|ES:Presupuestos';