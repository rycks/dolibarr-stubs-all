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
$now = \dol_now();
$max = \getDolGlobalInt('MAIN_SIZE_SHORTLIST_LIMIT', 5);
// Security check
$socid = \GETPOSTINT('socid');
/*
 * View
 */
$propalstatic = new \Propal($db);
$companystatic = new \Societe($db);
$form = new \Form($db);
$formfile = new \FormFile($db);
$help_url = "EN:Module_Commercial_Proposals|FR:Module_Propositions_commerciales|ES:Módulo_Presupuestos";
$tmp = \getCustomerProposalPieChart($socid);
$sql = "SELECT p.rowid, p.ref, p.ref_client, p.total_ht, p.total_tva, p.total_ttc,";
// If the internal user must only see his customers, force searching by him
$search_sale = 0;
// Add where from hooks
$parameters = array('socid' => $user->socid);
$reshook = $hookmanager->executeHooks('printFieldListWhere', $parameters, $propalstatic);
$resql = $db->query($sql);
/*
 * Last modified proposals
 */
$sql = "SELECT p.rowid, p.entity, p.ref, p.total_ht, p.total_tva, p.total_ttc, p.fk_statut as status, date_cloture as datec, p.tms as datem,";
// If the internal user must only see his customers, force searching by him
$search_sale = 0;
// Add where from hooks
$parameters = array('socid' => $user->socid);
$reshook = $hookmanager->executeHooks('printFieldListWhere', $parameters, $propalstatic);
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$sql = "SELECT s.nom as socname, s.rowid as socid, s.canvas, s.client, s.email, s.code_compta as code_compta_client,";
// If the internal user must only see his customers, force searching by him
$search_sale = 0;
// Add where from hooks
$parameters = array('socid' => $user->socid);
$reshook = $hookmanager->executeHooks('printFieldListWhere', $parameters, $propalstatic);
$resql = $db->query($sql);
$parameters = array('user' => $user);
$reshook = $hookmanager->executeHooks('dashboardPropals', $parameters, $object);