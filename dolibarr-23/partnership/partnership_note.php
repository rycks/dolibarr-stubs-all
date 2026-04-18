<?php

// Get parameters
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel');
$backtopage = \GETPOST('backtopage', 'alpha');
// Initialize a technical objects
$object = new \Partnership($db);
$extrafields = new \ExtraFields($db);
$diroutputmassaction = $conf->partnership->dir_output . '/temp/massgeneration/' . $user->id;
$permissiontoread = $user->hasRight('partnership', 'read');
$permissionnote = $user->hasRight('partnership', 'write');
// Used by the include of actions_setnotes.inc.php
$permissiontoadd = $user->hasRight('partnership', 'write');
// Used by the include of actions_addupdatedelete.inc.php
$managedfor = \getDolGlobalString('PARTNERSHIP_IS_MANAGED_FOR', 'thirdparty');
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