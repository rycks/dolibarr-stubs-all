<?php

$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$statut = \GETPOST('statut') ? \GETPOST('statut') : 1;
$max = \getDolGlobalInt('MAIN_SIZE_SHORTLIST_LIMIT', 5);
// Security check
$socid = 0;
$id = \GETPOSTINT('id');
$result = \restrictedArea($user, 'contrat', $id);
$staticcompany = new \Societe($db);
$staticcontrat = new \Contrat($db);
$staticcontratligne = new \ContratLigne($db);
$productstatic = new \Product($db);
/*
 * Action
 */
// None
/*
 * View
 */
$now = \dol_now();
$title = $langs->trans("ContractsArea");
$help_url = 'EN:Module_Contracts|FR:Module_Contrat|ES:Contratos_de_servicio';
/*
 * Statistics
 */
$nb = array();
$total = 0;
$totalinprocess = 0;
$dataseries = array();
$vals = array();
// Search by status (except expired)
$sql = "SELECT count(cd.rowid) as nb, cd.statut as status";
$resql = $db->query($sql);
// Search by status (only expired)
$sql = "SELECT count(cd.rowid) as nb, cd.statut as status";
$resql = $db->query($sql);
$colorseries = array();
$listofstatus = array(0, 4, 4);
$bool = \false;
$listofstatus = array(0, 4, 4, 5);
$bool = \false;
$sql = "SELECT c.rowid, c.ref,";
$resql = $db->query($sql);
// Last modified contracts
$sql = 'SELECT ';
$result = $db->query($sql);
// Last modified services
$sql = "SELECT c.ref, c.fk_soc as socid,";
$resql = $db->query($sql);
// Not activated services
$sql = "SELECT c.ref, c.fk_soc as thirdpartyid, cd.rowid as cid, cd.statut, cd.label, cd.fk_product, cd.description as note, cd.fk_contrat,";
$resql = $db->query($sql);
// Expired services
$sql = "SELECT c.ref, c.fk_soc as thirdpartyid, cd.rowid as cid, cd.statut, cd.label, cd.fk_product, cd.description as note, cd.fk_contrat,";
$resql = $db->query($sql);
$parameters = array('user' => $user);
$reshook = $hookmanager->executeHooks('dashboardContracts', $parameters, $object);