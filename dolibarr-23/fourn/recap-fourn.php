<?php

// Security check
$socid = \GETPOSTINT("socid");
// Load variable for pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
/*
 * View
 */
$form = new \Form($db);
$userstatic = new \User($db);
$societe = new \Societe($db);
/*
 * Show tabs
 */
$head = \societe_prepare_head($societe);