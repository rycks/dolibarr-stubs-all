<?php

// Get parameters
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel', 'alpha');
$backtopage = \GETPOST('backtopage', 'alpha');
// Initialize a technical objects
$object = new \Calendar($db);
$extrafields = new \ExtraFields($db);
$diroutputmassaction = $conf->bookcal->dir_output . '/temp/massgeneration/' . $user->id;
// There is several ways to check permission.
$permissiontoread = $user->hasRight('bookcal', 'calendar', 'read');
$permissiontoadd = $user->hasRight('bookcal', 'calendar', 'write');
$permissionnote = $user->hasRight('bookcal', 'calendar', 'write');
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
//$help_url='EN:Customers_Orders|FR:Commandes_Clients|ES:Pedidos de clientes';
$help_url = '';
$title = $langs->trans('Calendar') . ' - ' . $langs->trans("Notes");