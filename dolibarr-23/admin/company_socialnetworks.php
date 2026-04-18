<?php

$action = \GETPOST('action', 'aZ09');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'admincompany';
$listofnetworks = \getArrayOfSocialNetworks();
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$wikihelp = 'EN:First_setup|FR:Premiers_paramétrages|ES:Primeras_configuraciones';
$head = \company_admin_prepare_head();
$listofnetworks = \dol_sort_array($listofnetworks, 'label');