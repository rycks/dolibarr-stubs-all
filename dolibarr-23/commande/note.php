<?php

$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$socid = \GETPOSTINT('socid');
$action = \GETPOST('action', 'aZ09');
// Security check
$socid = 0;
$result = \restrictedArea($user, 'commande', $id, '');
$usercancreate = $user->hasRight("commande", "creer");
$permissionnote = $user->hasRight('commande', 'creer');
// Used by the include of actions_setnotes.inc.php
$object = new \Commande($db);
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$title = $object->ref . " - " . $langs->trans('Notes');
$help_url = 'EN:Customers_Orders|FR:Commandes_Clients|ES:Pedidos de clientes|DE:Modul_Kundenaufträge';
$form = new \Form($db);
$head = \commande_prepare_head($object);
// Order card
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/commande/list.php', ['restore_lastsearch_values' => 1, 'socid' => !empty($socid) ? $socid : '']) . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
$cssclass = "titlefield";
$dirtpls = \array_merge($conf->modules_parts['tpl'], array('/core/tpl'));