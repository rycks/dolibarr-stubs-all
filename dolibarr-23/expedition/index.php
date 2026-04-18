<?php

$socid = \GETPOSTINT('socid');
/*
 *	View
 */
$orderstatic = new \Commande($db);
$companystatic = new \Societe($db);
$shipment = new \Expedition($db);
$helpurl = 'EN:Module_Shipments|FR:Module_Exp&eacute;ditions|ES:M&oacute;dulo_Expediciones';
/*
 * Shipments to validate
 */
$clause = " WHERE ";
$sql = "SELECT e.rowid, e.ref, e.ref_customer,";
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$max = 5;
/*
 * Latest shipments
 */
$sql = "SELECT e.rowid, e.ref, e.ref_customer,";
$resql = $db->query($sql);
$num = $db->num_rows($resql);
/*
 * Open orders
 */
$sql = "SELECT c.rowid, c.ref, c.ref_client as ref_customer, c.fk_statut as status, c.facture as billed, s.nom as name, s.rowid as socid";
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListWhereOpenedOrders', $parameters, $object);
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$parameters = array('user' => $user);
$reshook = $hookmanager->executeHooks('dashboardWarehouseSendings', $parameters, $object);