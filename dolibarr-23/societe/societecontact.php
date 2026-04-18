<?php

// Get parameters
$id = \GETPOSTINT('id') ? \GETPOSTINT('id') : \GETPOSTINT('socid');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'thirdpartylist';
$massaction = \GETPOST('massaction', 'alpha');
$optioncss = \GETPOST('optioncss', 'alpha');
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$result = \restrictedArea($user, 'societe', $id, '');
// Initialize objects
$object = new \Societe($db);
/*
 * Actions
 */
$parameters = array('id' => $id);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$formcompany = new \FormCompany($db);
$formother = new \FormOther($db);
$contactstatic = new \Contact($db);
$userstatic = new \User($db);
$title = $langs->trans("ContactAddress", $object->name);
$help_url = 'EN:Module_Third_Parties|FR:Module_Tiers|ES:Empresas';