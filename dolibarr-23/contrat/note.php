<?php

$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$socid = \GETPOSTINT('socid');
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$object = new \Contrat($db);
$permissiontoadd = $user->hasRight('contrat', 'creer');
//  Used by the include of actions_addupdatedelete.inc.php and actions_lineupdown.inc.php
$permissionnote = $user->hasRight('contrat', 'creer');
// Used by the include of actions_setnotes.inc.php
$result = \restrictedArea($user, 'contrat', $object->id);
/*
 * Actions
 */
$reshook = $hookmanager->executeHooks('doActions', array(), $object, $action);
/*
 * View
 */
$title = $langs->trans("Contract");
$help_url = 'EN:Module_Contracts|FR:Module_Contrat|ES:Contratos_de_servicio';
$form = new \Form($db);
$head = \contract_prepare_head($object);
$hselected = 2;
// Contract card
$linkback = '<a href="' . \DOL_URL_ROOT . '/contrat/list.php?restore_lastsearch_values=1' . (!empty($socid) ? '&socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '';
$absolute_discount = $object->thirdparty->getAvailableDiscounts();
//print '<br>';
$cssclass = 'titlefield';