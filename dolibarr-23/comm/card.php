<?php

$action = \GETPOST('action', 'aZ09');
$id = \GETPOSTINT('socid') ? \GETPOSTINT('socid') : \GETPOSTINT('id');
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT('page');
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$cancel = \GETPOST('cancel', 'alpha');
$object = new \Client($db);
$extrafields = new \ExtraFields($db);
$formfile = new \FormFile($db);
$now = \dol_now();
// Load data of third party
$res = $object->fetch($id);
$result = \restrictedArea($user, 'societe', $object->id, '&societe', '', 'fk_soc', 'rowid', 0);
$permissiontoadd = $user->hasRight('societe', 'creer');
$permissiontoeditextra = $permissiontoadd;
/*
 * Actions
 */
$error = 0;
$parameters = array('id' => $id, 'socid' => $id);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$contactstatic = new \Contact($db);
$userstatic = new \User($db);
$form = new \Form($db);
$formcompany = new \FormCompany($db);
$project = new \Project($db);
$title = $langs->trans("ThirdParty") . " - " . $langs->trans('Customer');
$help_url = 'EN:Module_Third_Parties|FR:Module_Tiers|ES:Empresas|DE:Modul_Geschäftspartner';
$head = \societe_prepare_head($object);
$linkback = '<a href="' . \DOL_URL_ROOT . '/societe/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
$isCustomer = $object->client == 1 || $object->client == 3;
$limit_field_type = '';
// Other attributes
$parameters = array('socid' => $object->id);
$boxstat = '';
// Max nb of elements in lists
$MAXLIST = \getDolGlobalInt('MAIN_SIZE_SHORTLIST_LIMIT', 5);
$parameters = array();
$reshook = $hookmanager->executeHooks('addMoreBoxStatsCustomer', $parameters, $object, $action);
$orders2invoice = \null;
$param = "";
// Allow external modules to add their own shortlist of recent objects
$parameters = array();
$reshook = $hookmanager->executeHooks('addMoreRecentObjects', $parameters, $object, $action);
$parameters = array();
$reshook = $hookmanager->executeHooks('addMoreActionsButtons', $parameters, $object, $action);