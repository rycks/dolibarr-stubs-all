<?php

// Initialize a technical object to manage hooks. Note that conf->hooks_modules contains array
$hookmanager = new \HookManager($db);
$socid = \GETPOSTINT('socid');
// Security check
$result = \restrictedArea($user, 'societe|contact', 0, '', '', '', '');
$thirdparty_static = new \Societe($db);
$contact_static = new \Contact($db);
// Load $resultboxes
$resultboxes = \FormOther::getBoxesArea($user, "3");
$zone = \GETPOSTINT('areacode');
$userid = \GETPOSTINT('userid');
$boxorder = \GETPOST('boxorder', 'aZ09');
$result = \InfoBox::saveboxorder($db, $zone, $boxorder, $userid);
$max = \getDolGlobalInt('MAIN_SIZE_SHORTLIST_LIMIT', 5);
/*
 * View
 */
$transAreaType = $langs->trans("ThirdPartiesArea");
$helpurl = 'EN:Module_Third_Parties|FR:Module_Tiers|ES:M&oacute;dulo_Terceros';
// Statistics area
$third = array('customer' => 0, 'prospect' => 0, 'supplier' => 0, 'other' => 0);
$total = 0;
$sql = "SELECT s.rowid, s.client, s.fournisseur";
// Add where from hooks
$parameters = array('socid' => $socid);
$reshook = $hookmanager->executeHooks('printFieldListWhere', $parameters, $thirdparty_static);
//print $sql;
$result = $db->query($sql);
$thirdpartygraph = '<div class="div-table-responsive-no-min">';
$dataseries = array();
$dolgraph = new \DolGraph();
$thirdpartycateggraph = '';
$thirdpartycateggraph = '<div class="div-table-responsive-no-min">';
$sql = "SELECT c.label, count(*) as nb";
$total = 0;
$result = $db->query($sql);
/*
 * Latest modified third parties
 */
$sql = "SELECT s.rowid, s.nom as name, s.email, s.client, s.fournisseur";
// Add where from hooks
$parameters = array('socid' => $socid);
$reshook = $hookmanager->executeHooks('printFieldListWhere', $parameters, $thirdparty_static);
//print $sql;
$lastmodified = "";
$result = $db->query($sql);
$num = $db->num_rows($result);
$i = 0;
/*
 * Latest modified contacts
 */
$sql = "SELECT s.rowid, s.nom as name, s.email, s.client, s.fournisseur";
// Add where from hooks
$parameters = array('socid' => $socid);
$reshook = $hookmanager->executeHooks('printFieldListWhere', $parameters, $thirdparty_static);
//print $sql;
$lastmodifiedcontact = '';
$result = $db->query($sql);
$num = $db->num_rows($result);
$i = 0;
$boxlist = '<div class="twocolumns">';
$parameters = array('user' => $user);
$reshook = $hookmanager->executeHooks('dashboardThirdparties', $parameters, $thirdparty_static);