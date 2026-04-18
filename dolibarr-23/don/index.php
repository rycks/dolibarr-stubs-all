<?php

$donation_static = new \Don($db);
// Security check
$result = \restrictedArea($user, 'don');
/*
 * Actions
 */
// None
/*
 * View
 */
$donstatic = new \Don($db);
$help_url = 'EN:Module_Donations|FR:Module_Dons|ES:M&oacute;dulo_Donaciones|DE:Modul_Spenden';
$nb = array();
$somme = array();
$total = 0;
$sql = "SELECT count(d.rowid) as nb, sum(d.amount) as somme , d.fk_statut";
$result = $db->query($sql);
$listofsearchfields = array();
$dataseries = array();
$colorseries = array();
$listofstatus = array(0, 1, -1, 2);
$total = 0;
$totalnb = 0;
$max = \getDolGlobalInt('MAIN_SIZE_SHORTLIST_LIMIT', 5);
/*
 * Last modified donations
 */
$sql = "SELECT c.rowid, c.ref, c.fk_statut, c.societe, c.lastname, c.firstname, c.tms as datem, c.amount, c.fk_soc as socid";
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$parameters = array('user' => $user);
$reshook = $hookmanager->executeHooks('dashboardDonation', $parameters, $object);