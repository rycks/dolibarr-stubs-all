<?php

$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$socid = \GETPOSTINT('socid');
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$object = new \Contrat($db);
$permissiontoadd = $user->hasRight('contrat', 'creer');
//  Used by the include of actions_addupdatedelete.inc.php and actions_lineupdown.inc.php
$result = \restrictedArea($user, 'contrat', $object->id);
/*
 * Actions
 */
$parameters = array('id' => $id);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$title = $langs->trans("Contract");
$help_url = 'EN:Module_Contracts|FR:Module_Contrat|ES:Contratos_de_servicio';
$form = new \Form($db);
$formcompany = new \FormCompany($db);
$contactstatic = new \Contact($db);
$userstatic = new \User($db);