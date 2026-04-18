<?php

$res = @(include '../../main.inc.php');
$search_boxvalue = \GETPOST('q', 'restricthtml');
$arrayresult = array();
// Execute hook addSearchEntry
$parameters = array('search_boxvalue' => $search_boxvalue, 'arrayresult' => $arrayresult);
$reshook = $hookmanager->executeHooks('addSearchEntry', $parameters);
$key = 'searchinto' . \getDolGlobalString('DEFAULT_SEARCH_INTO_MODULE');
// Sort on position
$arrayresult = \dol_sort_array($arrayresult, 'position');