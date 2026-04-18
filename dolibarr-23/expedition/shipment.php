<?php

$order_id = \GETPOSTINT('id');
// id of order
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
// Security check
$socid = 0;
$result = \restrictedArea($user, 'commande', $order_id);
$object = new \Commande($db);
$shipment = new \Expedition($db);
$extrafields = new \ExtraFields($db);
$result = \restrictedArea($user, 'expedition', 0, '');
// We use 0 for id, because there is no particular shipment on this tab, only id of order is known
$permissiontoread = $user->hasRight('expedition', 'lire');
$permissiontoadd = $user->hasRight('expedition', 'creer');
// Used by the include of actions_addupdatedelete.inc.php and actions_lineupdown.inc.php
$permissiontodelete = $user->hasRight('expedition', 'supprimer') || $permissiontoadd && (int) $object->status == $object::STATUS_DRAFT;
$permissionnote = $user->hasRight('expedition', 'creer');
// Used by the include of actions_setnotes.inc.php
$permissiondellink = $user->hasRight('expedition', 'creer');
// Used by the include of actions_dellink.inc.php
$permissiontoeditextra = $permissiontoadd;
/*
 * Actions
 */
$error = 0;
$parameters = array('socid' => $socid);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$formfile = new \FormFile($db);
$formproduct = new \FormProduct($db);
$title = $object->ref . " - " . $langs->trans('Shipments');
$help_url = 'EN:Customers_Orders|FR:Commandes_Clients|ES:Pedidos de clientes|DE:Modul_Kundenaufträge';
$object = new \Commande($db);