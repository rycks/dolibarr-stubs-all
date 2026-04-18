<?php

$rowid = \GETPOSTINT('rowid');
$entity = \GETPOSTINT('entity');
$action = \GETPOST('action', 'aZ09');
$massaction = \GETPOST('massaction', 'aZ09');
$debug = \GETPOSTINT('debug');
$consts = \GETPOST('const', 'array');
$constname = \GETPOST('constname', 'alphanohtml');
$constvalue = \GETPOST('constvalue', 'restricthtml');
// We should be able to send everything here
$constnote = \GETPOST('constnote', 'alpha');
// Load variable for pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1 or if we click on clear filters or if we select empty mass action
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$error = 0;
$nbmodified = 0;
$action = '';
$nbdeleted = 0;
$action = '';
/*
 * View
 */
$form = new \Form($db);
$wikihelp = 'EN:Setup_Other|FR:Paramétrage_Divers|ES:Configuración_Varios';
$param = '';
// Show constants
$sql = "SELECT";
$result = $db->query($sql);