<?php

$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'replenishorders';
// To manage different context of search
$sall = \GETPOST('search_all', 'alphanohtml');
$sref = \GETPOST('search_ref', 'alpha');
$snom = \GETPOST('search_nom', 'alpha');
$suser = \GETPOST('search_user', 'alpha');
$sttc = \GETPOST('search_ttc', 'alpha');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$search_product = \GETPOSTINT('search_product');
$search_dateyear = \GETPOSTINT('search_dateyear');
$search_datemonth = \GETPOSTINT('search_datemonth');
$search_dateday = \GETPOSTINT('search_dateday');
$search_date = \dol_mktime(0, 0, 0, $search_datemonth, $search_dateday, $search_dateyear);
$optioncss = \GETPOST('optioncss', 'alpha');
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTINT('page') ? \GETPOSTINT('page') : 0;
$offset = $limit * $page;
$result = \restrictedArea($user, 'produit|service');
/*
 * View
 */
$form = new \Form($db);
$helpurl = 'EN:Module_Stocks_En|FR:Module_Stock|ES:M&oacute;dulo_Stocks';
$texte = $langs->trans('ReplenishmentOrders');
$head = array();
$commandestatic = new \CommandeFournisseur($db);
$sql = 'SELECT s.rowid as socid, s.nom as name, cf.date_creation as dc,';
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$i = 0;
$param = '';
$searchpicto = $form->showFilterAndCheckAddButtons(0);
$userstatic = new \User($db);