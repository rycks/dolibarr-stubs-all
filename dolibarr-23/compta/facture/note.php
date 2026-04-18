<?php

$id = \GETPOSTINT('id') ? \GETPOSTINT('id') : \GETPOSTINT('facid');
// For backward compatibility
$ref = \GETPOST('ref', 'alpha');
$socid = \GETPOSTINT('socid');
$action = \GETPOST('action', 'aZ09');
$object = new \Facture($db);
$permissionnote = $user->hasRight('facture', 'creer');
// Used by the include of actions_setnotes.inc.php
// Security check
$socid = 0;
$result = \restrictedArea($user, 'facture', $id, '');
$usercancreate = $user->hasRight("facture", "creer");
/*
 * Actions
 */
$reshook = $hookmanager->executeHooks('doActions', array(), $object, $action);
/*
 * View
 */
$form = new \Form($db);
$helpurl = "EN:Customers_Invoices|FR:Factures_Clients|ES:Facturas_a_clientes";
$object = new \Facture($db);
$head = \facture_prepare_head($object);
$totalpaid = $object->getSommePaiement();
// Invoice content
$linkback = '<a href="' . \DOL_URL_ROOT . '/compta/facture/list.php?restore_lastsearch_values=1' . (!empty($socid) ? '&socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
$cssclass = "titlefield";