<?php

$reception = new \Reception($db);
// Security check
$socid = '';
$result = \restrictedArea($user, 'reception', 0, '');
/*
 *	View
 */
$orderstatic = new \CommandeFournisseur($db);
$companystatic = new \Societe($db);
$helpurl = 'EN:Module_Receptions|FR:Module_Receptions|ES:M&oacute;dulo_Receptiones';
/*
 * Draft receptions
 */
$sql = "SELECT e.rowid, e.ref, e.ref_supplier,";
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$max = 5;
/*
 * Latest receptions
 */
$sql = "SELECT e.rowid, e.ref, e.ref_supplier,";
$resql = $db->query($sql);
$num = $db->num_rows($resql);
/*
 * Open pruchase orders to process
 */
$sql = "SELECT c.rowid, c.ref, c.ref_supplier as ref_supplier, c.fk_statut as status, c.billed as billed, s.nom as name, s.rowid as socid";
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$parameters = array('user' => $user);
$reshook = $hookmanager->executeHooks('dashboardWarehouseReceptions', $parameters, $object);