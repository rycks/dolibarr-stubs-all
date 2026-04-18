<?php

// Security check
$socid = \GETPOSTINT('socid');
// Load $resultboxes
$resultboxes = \FormOther::getBoxesArea($user, "20");
$max = \getDolGlobalInt('MAIN_SIZE_SHORTLIST_LIMIT', 5);
/*
 * View
 */
$fichinterstatic = new \Fichinter($db);
$companystatic = new \Societe($db);
$form = new \Form($db);
$formfile = new \FormFile($db);
$help_url = "EN:ModuleFichinters|FR:Module_Fiche_Interventions|ES:Módulo_FichaInterventiones";
// Statistics
$sql = "SELECT count(f.rowid), f.fk_statut";
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$total = 0;
$totalinprocess = 0;
$dataseries = array();
$colorseries = array();
$vals = array();
$bool = \false;
$listofstatus = array(\Fichinter::STATUS_DRAFT, \Fichinter::STATUS_VALIDATED, \Fichinter::STATUS_CLOSED);
$sql = "SELECT f.rowid, f.ref, s.nom as name, s.rowid as socid";
$resql = $db->query($sql);
/*
 * Last modified interventions
 */
$sql = "SELECT f.rowid, f.ref, f.fk_statut, f.date_valid as datec, f.tms as datem,";
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$sql = "SELECT f.rowid, f.ref, f.fk_statut, s.nom as name, s.rowid as socid";
$resql = $db->query($sql);
$boxlist = '<div class="twocolumns">';
$parameters = array('user' => $user);
$reshook = $hookmanager->executeHooks('dashboardInterventions', $parameters, $object);