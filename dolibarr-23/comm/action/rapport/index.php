<?php

$action = \GETPOST('action', 'aZ09');
$month = \GETPOSTINT('month');
$year = \GETPOSTINT('year');
$optioncss = \GETPOST('optioncss', 'alpha');
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$offset = $limit * $page;
$cat = new \pdf_standard_actions($db, $month, $year);
$result = $cat->write_file(\null, $langs);
/*
 * View
 */
$formfile = new \FormFile($db);
$sql = "SELECT count(*) as cc,";
$nbtotalofrecords = '';
$result = $db->query($sql);
$nbtotalofrecords = $db->num_rows($result);
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$param = '';
$moreforfilter = '';
$i = 0;