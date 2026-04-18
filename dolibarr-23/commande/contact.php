<?php

$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$result = \restrictedArea($user, 'commande', $id, '');
$usercancreate = $user->hasRight("commande", "creer");
$object = new \Commande($db);
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
$formother = new \FormOther($db);
$contactstatic = new \Contact($db);
$userstatic = new \User($db);