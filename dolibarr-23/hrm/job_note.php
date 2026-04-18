<?php

// Get parameters
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel');
$backtopage = \GETPOST('backtopage', 'alpha');
// Initialize a technical objects
$object = new \Job($db);
$extrafields = new \ExtraFields($db);
$diroutputmassaction = $conf->hrm->dir_output . '/temp/massgeneration/' . $user->id;
// Permissions
$permissiontoread = $user->hasRight('hrm', 'all', 'read');
$permissionnote = $user->hasRight('hrm', 'all', 'write');
/*
 * Actions
 */
$reshook = $hookmanager->executeHooks('doActions', array(), $object, $action);
/*
 * View
 */
$form = new \Form($db);
//$help_url='EN:Customers_Orders|FR:Commandes_Clients|ES:Pedidos de clientes';
$help_url = '';