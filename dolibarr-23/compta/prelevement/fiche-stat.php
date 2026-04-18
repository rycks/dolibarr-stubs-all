<?php

// Get supervariables
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$type = \GETPOST('type', 'aZ09');
// Load variable for pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$object = new \BonPrelevement($db);
$type = $object->type;
/*
 * View
 */
$form = new \Form($db);
/*
 * Stats
 */
$line = new \LignePrelevement($db);
$sql = "SELECT sum(pl.amount), pl.statut";
$resql = $db->query($sql);