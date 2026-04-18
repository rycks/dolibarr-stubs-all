<?php

$hookmanager = new \HookManager($db);
// Security check
$socid = \GETPOSTINT('socid');
// Maximum elements of the tables
$max = \getDolGlobalInt('MAIN_SIZE_SHORTLIST_LIMIT', 5);
$maxDraftCount = !\getDolGlobalString('MAIN_MAXLIST_OVERLOAD') ? 500 : $conf->global->MAIN_MAXLIST_OVERLOAD;
$maxLatestEditCount = 5;
$maxOpenCount = !\getDolGlobalString('MAIN_MAXLIST_OVERLOAD') ? 500 : $conf->global->MAIN_MAXLIST_OVERLOAD;
/*
 * View
 */
$commandestatic = new \Commande($db);
$companystatic = new \Societe($db);
$form = new \Form($db);
$formfile = new \FormFile($db);
$help_url = "EN:Module_Customers_Orders|FR:Module_Commandes_Clients|ES:Módulo_Pedidos_de_clientes";
$tmp = \getCustomerOrderPieChart($socid);
$sql = "SELECT c.rowid, c.ref, s.nom as name, s.rowid as socid";
// Add where from hooks
$parameters = array('socid' => $user->socid);
$reshook = $hookmanager->executeHooks('printFieldListWhere', $parameters, $commandestatic);
$resql = $db->query($sql);
/*
 * Latest modified orders
 */
$sql = "SELECT c.rowid, c.entity, c.ref, c.fk_statut as status, c.facture, c.date_cloture as datec, c.tms as datem,";
// Add where from hooks
$parameters = array('socid' => $user->socid);
$reshook = $hookmanager->executeHooks('printFieldListWhere', $parameters, $commandestatic);
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$sql = "SELECT c.rowid, c.entity, c.ref, c.fk_statut as status, c.facture, c.date_commande as date, s.nom as name, s.rowid as socid";
// Add where from hooks
$parameters = array('socid' => $user->socid);
$reshook = $hookmanager->executeHooks('printFieldListWhere', $parameters, $commandestatic);
$resql = $db->query($sql);
$sql = "SELECT c.rowid, c.entity, c.ref, c.fk_statut as status, c.facture, c.date_commande as date, s.nom as name, s.rowid as socid";
// Add where from hooks
$parameters = array('socid' => $user->socid);
$reshook = $hookmanager->executeHooks('printFieldListWhere', $parameters, $commandestatic);
$resql = $db->query($sql);
$parameters = array('user' => $user);
$reshook = $hookmanager->executeHooks('dashboardOrders', $parameters, $object);