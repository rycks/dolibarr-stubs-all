<?php

$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$object = new \Dolresource($db);
// Must be 'include', not 'include_once'.
$result = \restrictedArea($user, 'resource', $object->id, 'resource');
$permissionnote = $user->hasRight('resource', 'write');
// Used by the include of actions_setnotes.inc.php
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$title = '';
$help_url = '';
$form = new \Form($db);