<?php

$id = \GETPOSTINT('id') ? \GETPOSTINT('id') : \GETPOSTINT('facid');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$socid = \GETPOSTINT('socid');
$result = \restrictedArea($user, 'fournisseur', $id, 'facture_fourn', 'facture');
$object = new \FactureFournisseur($db);
$usercancreate = $user->hasRight("fournisseur", "facture", "creer") || $user->hasRight("supplier_invoice", "creer");
$permissiontoadd = $usercancreate;
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