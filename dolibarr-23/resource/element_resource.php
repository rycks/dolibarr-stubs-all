<?php

/*
$sortorder = GETPOST('sortorder','alpha');
$sortfield = GETPOST('sortfield','alpha');
$page = GETPOST('page','int');
*/
$object = new \Dolresource($db);
// Get parameters
$id = \GETPOSTINT('id');
// resource id
$element_id = \GETPOSTINT('element_id');
// element_id
$element_ref = \GETPOST('ref', 'alpha');
// element ref
$element = \GETPOST('element', 'alpha');
// element_type
$action = \GETPOST('action', 'alpha');
$mode = \GETPOST('mode', 'alpha');
$lineid = \GETPOSTINT('lineid');
$resource_id = \GETPOSTINT('fk_resource');
$resource_type = \GETPOST('resource_type', 'alpha');
$busy = \GETPOSTINT('busy');
$mandatory = \GETPOSTINT('mandatory');
$cancel = \GETPOST('cancel', 'alpha');
$confirm = \GETPOST('confirm', 'alpha');
$socid = \GETPOSTINT('socid');
// TODO
//$permissiontoadd should be set according to $element
//$permissiontodelete should be set according to $element
$permissiontoadd = $user->hasRight('resource', 'write');
$permissiontodelete = $user->hasRight('resource', 'delete');
/*
 * Actions
 */
$parameters = array('resource_id' => $resource_id);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$error = 0;
$objstat = \null;
$parameters = array('resource_id' => $resource_id);
$reshook = $hookmanager->executeHooks('getElementResources', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$pagetitle = $langs->trans('ResourceElementPage');
$help_url = '';
$now = \dol_now();
$delay_warning = \getDolGlobalInt('MAIN_DELAY_ACTIONS_TODO') * 24 * 60 * 60;
// Load available resource, declared by modules
$ret = \count($object->available_resources);