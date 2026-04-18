<?php

// Get parameters
$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel', 'alpha');
$backtopage = \GETPOST('backtopage', 'alpha');
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$address = \GETPOST('address', 'alpha');
$zip = \GETPOST('zipcode', 'alpha');
$town = \GETPOST('town', 'alpha');
$country_id = \GETPOSTINT('country_id');
$state_id = \GETPOSTINT('state_id');
$description = \GETPOST('description', 'restricthtml');
$phone = \GETPOST('phone', 'alpha');
$email = \GETPOST('email', 'alpha');
$max_users = \GETPOSTINT('max_users');
$url = \GETPOST('url', 'alpha');
$confirm = \GETPOST('confirm', 'aZ09');
$fk_code_type_resource = \GETPOST('fk_code_type_resource', 'aZ09');
$object = new \Dolresource($db);
$extrafields = new \ExtraFields($db);
$result = \restrictedArea($user, 'resource', $object->id, 'resource');
$permissiontoadd = $user->hasRight('resource', 'write');
// Used by the include of actions_addupdatedelete.inc.php and actions_lineupdown.inc.php
$permissiontodelete = $user->hasRight('resource', 'delete');
/*
 * Actions
 */
$parameters = array('resource_id' => $id);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$title = $langs->trans($action == 'create' ? 'AddResource' : 'ResourceSingular');
$help_url = '';
$form = new \Form($db);
$formresource = new \FormResource($db);
$parameters = array();
$reshook = $hookmanager->executeHooks('addMoreActionsButtons', $parameters, $object, $action);