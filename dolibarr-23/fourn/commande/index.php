<?php

$max = \getDolGlobalInt('MAIN_SIZE_SHORTLIST_LIMIT', 5);
// Security check
$orderid = \GETPOST('orderid');
$socid = \GETPOSTINT('socid');
$result = \restrictedArea($user, 'fournisseur', $orderid, '', 'commande');
$commandestatic = new \CommandeFournisseur($db);
$userstatic = new \User($db);
$formfile = new \FormFile($db);
/*
 * Statistics
 */
$sql = "SELECT count(cf.rowid) as nb, fk_statut as status";
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$i = 0;
$total = 0;
$dataseries = array();
$colorseries = array();
$vals = array();
$listofstatus = array(0, 1, 2, 3, 4, 5, 6, 9);
$sql = "SELECT c.rowid, c.ref, s.nom as name, s.rowid as socid";
$resql = $db->query($sql);
/*
 * List of users allowed to approve
 */
$sql = "SELECT";
// An external user can not approve
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$i = 0;
/*
 * Last modified orders
*/
$sql = "SELECT c.rowid, c.ref, c.fk_statut as status, c.tms, c.billed, s.nom as name, s.rowid as socid";
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$parameters = array('user' => $user);
$reshook = $hookmanager->executeHooks('dashboardOrdersSuppliers', $parameters, $object);