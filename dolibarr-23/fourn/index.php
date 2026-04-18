<?php

// Security check
$socid = \GETPOSTINT("socid");
$result = \restrictedArea($user, 'societe', $socid, '');
/*
 * View
 */
$commandestatic = new \CommandeFournisseur($db);
$facturestatic = new \FactureFournisseur($db);
$companystatic = new \Societe($db);
// Orders
$sql = "SELECT count(cf.rowid), cf.fk_statut";
$resql = $db->query($sql);
$sql = "SELECT cf.rowid, cf.ref, cf.total_ttc,";
$resql = $db->query($sql);
$sql = "SELECT ff.ref_supplier, ff.rowid, ff.total_ttc, ff.type";
$resql = $db->query($sql);
/*
 * List last modified supliers
 */
$max = 10;
$sql = "SELECT s.rowid as socid, s.nom as name, s.town, s.datec, s.tms, s.prefix_comm, s.code_fournisseur";
$resql = $db->query($sql);
$categstatic = new \Categorie($db);