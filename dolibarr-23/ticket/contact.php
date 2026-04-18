<?php

// Get parameters
$socid = \GETPOSTINT("socid");
$action = \GETPOST("action", 'alpha');
$track_id = \GETPOST("track_id", 'alpha');
$id = \GETPOSTINT("id");
$ref = \GETPOST('ref', 'alpha');
$type = \GETPOST('type', 'alpha');
$source = \GETPOST('source', 'alpha');
$ligne = \GETPOSTINT('ligne');
$lineid = \GETPOSTINT('lineid');
// Store current page url
$url_page_current = \DOL_URL_ROOT . '/ticket/contact.php';
$object = new \Ticket($db);
// Security check
$id = \GETPOSTINT("id");
$result = \restrictedArea($user, 'ticket', $object->id, '');
$permissiontoadd = $user->hasRight('ticket', 'write');
/*
 * Actions
 */
$error = 0;
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$result = $object->fetch($id, '', $track_id);
/*
 * View
 */
$help_url = 'FR:DocumentationModuleTicket';
$form = new \Form($db);
$formcompany = new \FormCompany($db);
$contactstatic = new \Contact($db);
$userstatic = new \User($db);