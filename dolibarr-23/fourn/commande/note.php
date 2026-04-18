<?php

// Get Parameters
$id = \GETPOSTINT('facid') ? \GETPOSTINT('facid') : \GETPOSTINT('id');
$ref = \GETPOST('ref');
$action = \GETPOST('action', 'aZ09');
$result = \restrictedArea($user, 'fournisseur', $id, 'commande_fournisseur', 'commande');
$object = new \CommandeFournisseur($db);
// Permissions
$permissionnote = $user->hasRight("fournisseur", "commande", "creer") || $user->hasRight("supplier_order", "creer");
// Used by the include of actions_setnotes.inc.php
$usercancreate = $user->hasRight("fournisseur", "commande", "creer") || $user->hasRight("supplier_order", "creer");
$permissiontoadd = $usercancreate;
// Used by the include of actions_addupdatedelete.inc.php
$caneditproject = \false;
/*
 * Actions
 */
$reshook = $hookmanager->executeHooks('doActions', array(), $object, $action);
/*
 * View
 */
$title = $object->ref . " - " . $langs->trans('Notes');
$help_url = 'EN:Module_Suppliers_Orders|FR:CommandeFournisseur|ES:Módulo_Pedidos_a_proveedores';
$form = new \Form($db);
/* *************************************************************************** */
/*                                                                             */
/* Card view and edit mode                                                       */
/*                                                                             */
/* *************************************************************************** */
$now = \dol_now();