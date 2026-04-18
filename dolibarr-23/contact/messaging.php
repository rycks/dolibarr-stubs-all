<?php

$mesg = '';
$error = '';
$errors = array();
// Get parameters
$action = \GETPOST('action', 'alpha') ? \GETPOST('action', 'alpha') : 'view';
$confirm = \GETPOST('confirm', 'alpha');
$backtopage = \GETPOST('backtopage', 'alpha');
$id = \GETPOSTINT('id');
$socid = \GETPOSTINT('socid');
// Initialize objects
$object = new \Contact($db);
$extrafields = new \ExtraFields($db);
$objcanvas = \null;
$canvas = !empty($object->canvas) ? $object->canvas : \GETPOST("canvas");
$actioncode = \GETPOST('actioncode', 'array:alpha', 3);
$search_rowid = \GETPOST('search_rowid');
$search_agenda_label = \GETPOST('search_agenda_label');
$result = \restrictedArea($user, 'contact', $id, 'socpeople&societe', '', '', 'rowid', 0);
// If we create a contact with no company (shared contacts), no check on write permission
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT('page');
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
/*
 *	Actions
 */
$parameters = array('id' => $id, 'objcanvas' => $objcanvas);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 *	View
 */
$form = new \Form($db);
$title = $langs->trans("ContactEvents");
$help_url = 'EN:Module_Third_Parties|FR:Module_Tiers|ES:Empresas|DE:Modul_Partner';