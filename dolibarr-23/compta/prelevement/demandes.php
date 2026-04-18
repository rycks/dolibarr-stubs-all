<?php

// Security check
$socid = \GETPOSTINT('socid');
$status = \GETPOSTINT('status');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'directdebitcredittransferlist';
// To manage different context of search
$backtopage = \GETPOST('backtopage', 'alpha');
// Go back to a dedicated page
$optioncss = \GETPOST('optioncss', 'aZ');
// Option for the css output (always '' except when 'print')
$type = \GETPOST('type', 'aZ09');
$sourcetype = \GETPOST('sourcetype', 'aZ');
$search_facture = \GETPOST('search_facture', 'alpha');
$search_societe = \GETPOST('search_societe', 'alpha');
// Load variable for pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1 or if we click on clear filters or if we select empty mass action
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$massactionbutton = '';
/*
 * Actions
 */
$parameters = array('socid' => $socid, 'limit' => $limit, 'page' => $page, 'offset' => $offset);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$thirdpartystatic = new \Societe($db);
$sql = "SELECT f.ref, f.rowid, f.total_ttc,";
// Count total nb of records
$nbtotalofrecords = '';
$resql = \null;
$resql = $db->query($sql);
$nbtotalofrecords = $db->num_rows($resql);
$newcardbutton = '<a class="marginrightonly" href="' . \DOL_URL_ROOT . '/compta/prelevement/index.php">' . $langs->trans("GoBack") . '</a>';
$param = '';
$label = 'NewStandingOrder';
$typefilter = '';
$userstatic = new \User($db);
$salarystatic = new \Salary($db);
$i = 0;