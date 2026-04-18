<?php

$sref = \GETPOST("sref", 'alpha');
$snom = \GETPOST("snom", 'alpha');
$sall = \trim(\GETPOST('search_all', 'alphanohtml'));
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT('page');
$offset = $limit * $page;
$year = \dol_print_date(\dol_now('gmt'), "%Y", 'gmt');
// Security check
$result = \restrictedArea($user, 'stock');
/*
 *	View
 */
$sql = "SELECT e.rowid, e.ref, e.statut, e.lieu, e.address, e.zip, e.town, e.fk_pays,";
$result = $db->query($sql);
$num = $db->num_rows($result);
$i = 0;
$help_url = 'EN:Module_Stocks_En|FR:Module_Stock|ES:M&oacute;dulo_Stocks';
$file = 'entrepot-' . $year . '.png';
$file = 'entrepot-' . ((int) $year - 1) . '.png';