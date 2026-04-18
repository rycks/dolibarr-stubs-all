<?php

// Security check
$socid = \GETPOSTINT('socid');
$result = \restrictedArea($user, 'deplacement', '', '');
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
/*
 * View
 */
$tripandexpense_static = new \Deplacement($db);
$childids = $user->getAllChildIds();
//$help_url='EN:Module_Donations|FR:Module_Dons|ES:M&oacute;dulo_Donaciones';
$help_url = '';
$totalnb = 0;
$sql = "SELECT count(d.rowid) as nb, sum(d.km) as km, d.type";
$result = $db->query($sql);
$somme = array();
$nb = array();
$listoftype = $tripandexpense_static->listOfTypes();
$dataseries = array();
$max = 10;
$sql = "SELECT u.rowid as uid, u.lastname, u.firstname, d.rowid, d.dated as date, d.tms as dm, d.km, d.fk_statut";
// If the internal user must only see his customers, force searching by him
$search_sale = 0;
$result = $db->query($sql);
$var = \false;
$num = $db->num_rows($result);
$i = 0;