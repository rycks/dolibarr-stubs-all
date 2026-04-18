<?php

// Get parameters
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'alpha');
$cancel = \GETPOST('cancel');
$backtopage = \GETPOST('backtopage', 'alpha');
// Initialize a technical objects
$object = new \StockTransfer($db);
$extrafields = new \ExtraFields($db);
$diroutputmassaction = $conf->stocktransfer->dir_output . '/temp/massgeneration/' . $user->id;
$permissionnote = $user->hasRight('stocktransfer', 'stocktransfer', 'write');
// Used by the include of actions_setnotes.inc.php
$permissiontoadd = $user->hasRight('stocktransfer', 'stocktransfer', 'write');
// Must be 'include', not 'include_once'
/*
 * View
 */
$form = new \Form($db);
//$help_url='EN:Customers_Orders|FR:Commandes_Clients|ES:Pedidos de clientes';
$help_url = '';