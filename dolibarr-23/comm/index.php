<?php

/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
// Initialize a technical object to manage hooks. Note that conf->hooks_modules contains array
$hookmanager = new \HookManager($db);
$action = \GETPOST('action', 'aZ09');
$bid = \GETPOSTINT('bid');
// Securite access client
$socid = \GETPOSTINT('socid');
$total = 0;
$max = \getDolGlobalInt('MAIN_SIZE_SHORTLIST_LIMIT', 5);
$maxofloop = \getDolGlobalInt('MAIN_MAXLIST_OVERLOAD', 500);
$now = \dol_now();
/*
 * Actions
 */
// None
/*
 * View
 */
$form = new \Form($db);
$formfile = new \FormFile($db);
$companystatic = new \Societe($db);
$propalstatic = \null;
$supplierproposalstatic = \null;
$orderstatic = \null;
$supplierorderstatic = \null;
$fichinterstatic = \null;
$tmp = \getCustomerProposalPieChart($socid);
$tmp = \getCustomerOrderPieChart($socid);
$sql = "SELECT p.rowid, p.ref, p.ref_client, p.total_ht, p.total_tva, p.total_ttc, p.fk_statut as status";
// Add where from hooks
$parameters = array('socid' => $user->socid);
$reshook = $hookmanager->executeHooks('printFieldListWhere', $parameters, $propalstatic);
$resql = $db->query($sql);
$sql = "SELECT p.rowid, p.ref, p.total_ht, p.total_tva, p.total_ttc, p.fk_statut as status";
// Add where from hooks
$parameters = array('socid' => $user->socid);
$reshook = $hookmanager->executeHooks('printFieldListWhere', $parameters, $supplierproposalstatic);
$resql = $db->query($sql);
$sql = "SELECT c.rowid, c.ref, c.ref_client, c.total_ht, c.total_tva, c.total_ttc, c.fk_statut as status";
// Add where from hooks
$parameters = array('socid' => $user->socid);
$reshook = $hookmanager->executeHooks('printFieldListWhere', $parameters, $orderstatic);
$resql = $db->query($sql);
$supplierorderstatic = new \CommandeFournisseur($db);
$sql = "SELECT cf.rowid, cf.ref, cf.ref_supplier, cf.total_ht, cf.total_tva, cf.total_ttc, cf.fk_statut as status";
// Add where from hooks
$parameters = array('socid' => $user->socid);
$reshook = $hookmanager->executeHooks('printFieldListWhere', $parameters, $supplierorderstatic);
$resql = $db->query($sql);
$sql = "SELECT f.rowid, f.ref, s.nom as name, f.fk_statut, f.duree as duration";
// Add where from hooks
$parameters = array('socid' => $user->socid);
$reshook = $hookmanager->executeHooks('printFieldListWhere', $parameters, $fichinterstatic);
$resql = $db->query($sql);
$sql = "SELECT p.rowid, p.entity, p.ref, p.fk_statut as status, p.tms as datem,";
// If the internal user must only see his customers, force searching by him
$search_sale = 0;
// Add where from hooks
$parameters = array('socid' => $user->socid);
$reshook = $hookmanager->executeHooks('printFieldListWhere', $parameters, $propalstatic);
$resql = $db->query($sql);
$commandestatic = new \Commande($db);
$sql = "SELECT c.rowid, c.entity, c.ref, c.fk_statut as status, c.facture, c.date_cloture as datec, c.tms as datem,";
// Add where from hooks
$parameters = array('socid' => $user->socid);
$reshook = $hookmanager->executeHooks('printFieldListWhere', $parameters, $orderstatic);
$resql = $db->query($sql);
// TODO A REFAIRE DEPUIS NOUVEAU CONTRAT
$staticcontrat = new \Contrat($db);
$sql = "SELECT s.rowid as socid, s.nom as name, s.name_alias";
// Add where from hooks
$parameters = array('socid' => $user->socid);
$reshook = $hookmanager->executeHooks('printFieldListWhere', $parameters, $staticcontrat);
$resql = $db->query($sql);
$sql = "SELECT p.rowid as propalid, p.entity, p.total_ttc, p.total_ht, p.total_tva, p.ref, p.ref_client, p.fk_statut, p.datep as dp, p.fin_validite as dfv";
// Add where from hooks
$parameters = array('socid' => $user->socid);
$reshook = $hookmanager->executeHooks('printFieldListWhere', $parameters, $propalstatic);
$resql = $db->query($sql);
$sql = "SELECT c.rowid as commandeid, c.total_ttc, c.total_ht, c.total_tva, c.ref, c.ref_client, c.fk_statut, c.date_valid as dv, c.facture as billed";
// Add where from hooks
$parameters = array('socid' => $user->socid);
$reshook = $hookmanager->executeHooks('printFieldListWhere', $parameters, $orderstatic);
$resql = $db->query($sql);
$parameters = array('user' => $user);
$reshook = $hookmanager->executeHooks('dashboardCommercials', $parameters, $object);