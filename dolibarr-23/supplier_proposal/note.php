<?php

$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$result = \restrictedArea($user, 'supplier_proposal', $id, 'supplier_proposal');
$object = new \SupplierProposal($db);
$usercancreate = $user->hasRight("supplier_propal", "write");
/*
 * Actions
 */
$permissionnote = $user->hasRight('supplier_proposal', 'creer');
// Used by the include of actions_setnotes.inc.php
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$now = \dol_now();