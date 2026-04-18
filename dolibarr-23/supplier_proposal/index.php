<?php

// Security check
$socid = \GETPOSTINT('socid');
$result = \restrictedArea($user, 'supplier_proposal');
/*
 * View
 */
$now = \dol_now();
$supplier_proposalstatic = new \SupplierProposal($db);
$companystatic = new \Societe($db);
$form = new \Form($db);
$formfile = new \FormFile($db);
$title = $langs->trans("SupplierProposalArea");
$help_url = "EN:Module_Ask_Price_Supplier|FR:Module_Demande_de_prix_fournisseur";
// Statistics
$sql = "SELECT count(p.rowid), p.fk_statut";
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$i = 0;
$total = 0;
$totalinprocess = 0;
$dataseries = array();
$colorseries = array();
$vals = array();
$listofstatus = array(0, 1, 2, 3, 4);
$sql = "SELECT c.rowid, c.ref, s.nom as socname, s.rowid as socid, s.canvas, s.client";
$resql = $db->query($sql);
$max = 5;
/*
 * Last modified askprice
 */
$sql = "SELECT c.rowid, c.ref, c.fk_statut, s.nom as socname, s.rowid as socid, s.canvas, s.client,";
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$now = \dol_now();
$sql = "SELECT s.nom as socname, s.rowid as socid, s.canvas, s.client, p.rowid as supplier_proposalid, p.total_ttc, p.total_tva, p.total_ht, p.ref, p.fk_statut, p.datec as dp";
$result = $db->query($sql);
$parameters = array('user' => $user);
$reshook = $hookmanager->executeHooks('dashboardSupplierProposal', $parameters, $object);