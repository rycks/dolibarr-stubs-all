<?php

// Get parameters
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel');
$backtopage = \GETPOST('backtopage', 'alpha');
// Initialize a technical objects
$object = new \Evaluation($db);
$extrafields = new \ExtraFields($db);
$diroutputmassaction = $conf->hrm->dir_output . '/temp/massgeneration/' . $user->id;
// Permissions
$permissionnote = $user->hasRight('hrm', 'evaluation', 'write');
// Used by the include of actions_setnotes.inc.php
$permissiontoread = $user->hasRight('hrm', 'evaluation', 'read');
// Used by the include of actions_addupdatedelete.inc.php
// Security check (enable the most restrictive one)
//if ($user->socid > 0) accessforbidden();
//if ($user->socid > 0) $socid = $user->socid;
$isdraft = $object->status == \Evaluation::STATUS_DRAFT ? 1 : 0;
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