<?php

// Get parameters
$action = \GETPOST('action', 'aZ09');
$bid = \GETPOSTINT('bid');
// Security check
$socid = '';
// Maximum elements of the tables
$max = \getDolGlobalInt('MAIN_SIZE_SHORTLIST_LIMIT', 5);
$maxDraftCount = !\getDolGlobalString('MAIN_MAXLIST_OVERLOAD') ? 500 : $conf->global->MAIN_MAXLIST_OVERLOAD;
$maxLatestEditCount = 5;
$maxOpenCount = !\getDolGlobalString('MAIN_MAXLIST_OVERLOAD') ? 500 : $conf->global->MAIN_MAXLIST_OVERLOAD;
$maxofloop = \getDolGlobalString('MAIN_MAXLIST_OVERLOAD', 500);
/*
 * Actions
 */
// None
/*
 * View
 */
$now = \dol_now();
$form = new \Form($db);
$formfile = new \FormFile($db);
$thirdpartystatic = new \Societe($db);
$tmpinvoice = new \Facture($db);
$sql = "SELECT f.rowid, f.ref, f.fk_statut as status, f.type, f.total_ht, f.total_tva, f.total_ttc, f.paye, f.tms";
// Add where from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListWhereCustomerLastModified', $parameters);
$resql = $db->query($sql);
$facstatic = new \FactureFournisseur($db);
$sql = "SELECT ff.rowid, ff.ref, ff.fk_statut as status, ff.type, ff.libelle, ff.total_ht, ff.total_tva, ff.total_ttc, ff.tms, ff.paye, ff.ref_supplier";
// Add where from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListWhereSupplierLastModified', $parameters);
$resql = $db->query($sql);
$donationstatic = new \Don($db);
$sql = "SELECT d.rowid, d.lastname, d.firstname, d.societe, d.datedon as date, d.tms as dm, d.amount, d.fk_statut as status, d.fk_soc as socid";
// Add where from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListWhereLastDonations', $parameters);
$result = $db->query($sql);
$commandestatic = new \Commande($db);
$sql = "SELECT sum(f.total_ht) as tot_fht, sum(f.total_ttc) as tot_fttc";
// Add where from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListWhereCustomerOrderToBill', $parameters);
$resql = $db->query($sql);
// TODO Mettre ici recup des actions en rapport avec la compta
$sql = '';
$i = 0;
$resql = $db->query($sql);
$parameters = array('user' => $user);
$object = \null;
$reshook = $hookmanager->executeHooks('dashboardAccountancy', $parameters, $object, $action);