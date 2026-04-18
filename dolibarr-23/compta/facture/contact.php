<?php

$id = \GETPOST('id') ? \GETPOSTINT('id') : \GETPOSTINT('facid');
// For backward compatibility
$ref = \GETPOST('ref', 'alpha');
$lineid = \GETPOSTINT('lineid');
$socid = \GETPOSTINT('socid');
$action = \GETPOST('action', 'aZ09');
$object = new \Facture($db);
$result = \restrictedArea($user, 'facture', $object->id);
$usercancreate = $user->hasRight("facture", "creer");
/*
 * Actions
 */
$parameters = array('id' => $id);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$title = $object->ref . " - " . $langs->trans('ContactsAddresses');
$helpurl = "EN:Customers_Invoices|FR:Factures_Clients|ES:Facturas_a_clientes";
$form = new \Form($db);
$formcompany = new \FormCompany($db);
$contactstatic = new \Contact($db);
$userstatic = new \User($db);