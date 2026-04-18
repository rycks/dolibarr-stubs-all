<?php

$action = \GETPOST('action', 'aZ09');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'auditeventslist';
// To manage different context of search
$optioncss = \GETPOST('optioncss', 'aZ');
// Option for the css output (always '' except when 'print')
// Load variable for pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1 or if we click on clear filters
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$securityevent = new \Events($db);
$eventstolog = $securityevent->eventstolog;
/*
 * View
 */
$form = new \Form($db);
$varpage = empty($contextpage) ? $_SERVER["PHP_SELF"] : $contextpage;
$selectedfields = '';
$wikihelp = 'EN:Setup_Security|FR:Paramétrage_Sécurité|ES:Configuración_Seguridad';
$head = \security_prepare_head();
$s = $langs->trans("SeeReportPage", '{s1}' . $langs->transnoentities("Home") . ' - ' . $langs->transnoentities("AdminTools") . ' - ' . $langs->transnoentities("Audit") . '{s2}');