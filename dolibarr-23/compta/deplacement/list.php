<?php

// Security check
$socid = \GETPOSTINT('socid');
$result = \restrictedArea($user, 'deplacement', '', '');
$search_ref = \GETPOST('search_ref', 'alpha');
$search_name = \GETPOST('search_name', 'alpha');
$search_company = \GETPOST('search_company', 'alpha');
// $search_amount=GETPOST('search_amount','alpha');
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$year = \GETPOST("year");
$month = \GETPOST("month");
$day = \GETPOST("day");
/*
 * View
 */
$formother = new \FormOther($db);
$tripandexpense_static = new \Deplacement($db);
$userstatic = new \User($db);
$childids = $user->getAllChildIds();
$sql = "SELECT s.nom, d.fk_user, s.rowid as socid,";
// If the internal user must only see his customers, force searching by him
$search_sale = 0;
//print $sql;
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$i = 0;
$searchpicto = $form->showFilterAndCheckAddButtons(0);