<?php

$action = \GETPOST('action', 'aZ09');
// Load variable for pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT('page');
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$error = 0;
$errors = array();
// Initialize a technical object to manage hooks of page. Note that conf->hooks_modules contains an array of hook context
$object = new \Fiscalyear($db);
// Set a fiscal year as default
$error = 0;
$defaultFiscalYear = \GETPOSTINT('value');
$defaultFiscalYearLabel = \GETPOST('label', 'alpha');
/*
 * View
 */
$max = 100;
$form = new \Form($db);
$fiscalyearstatic = new \Fiscalyear($db);
$title = $langs->trans('AccountingPeriods');
$help_url = 'EN:Module_Double_Entry_Accounting#Setup|FR:Module_Comptabilit&eacute;_en_Partie_Double#Configuration';
$sql = "SELECT f.rowid, f.label, f.date_start, f.date_end, f.statut as status, f.entity";
// Count total nb of records
$nbtotalofrecords = '';
$result = $db->query($sql);
$nbtotalofrecords = $db->num_rows($result);
$result = $db->query($sql);
$num = $db->num_rows($result);
$param = '';
$parameters = array('param' => $param);
$reshook = $hookmanager->executeHooks('addMoreActionsButtonsList', $parameters, $object, $action);
$newcardbutton = empty($hookmanager->resPrint) ? '' : $hookmanager->resPrint;
$title = $langs->trans('AccountingPeriods');
// Loop on record
// --------------------------------------------------------------------
$i = 0;