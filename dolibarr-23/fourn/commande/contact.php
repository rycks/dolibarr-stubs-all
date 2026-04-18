<?php

$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$result = \restrictedArea($user, 'fournisseur', $id, 'commande_fournisseur', 'commande');
$object = new \CommandeFournisseur($db);
$usercancreate = $user->hasRight("fournisseur", "commande", "creer") || $user->hasRight("supplier_order", "creer");
$permissiontoadd = $usercancreate;
// Used by the include of actions_addupdatedelete.inc.php
$caneditproject = \false;
/*
 * Actions
 */
$parameters = array('id' => $id);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$formcompany = new \FormCompany($db);
$contactstatic = new \Contact($db);
$userstatic = new \User($db);