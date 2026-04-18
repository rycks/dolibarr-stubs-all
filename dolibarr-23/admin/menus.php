<?php

$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel', 'alpha');
$dirstandard = array();
$dirsmartphone = array();
$dirmenus = \array_merge(array("/core/menus/"), (array) $conf->modules_parts['menus']);
$error = 0;
// This can be a big page.  The execution time limit is increased.
// This setting can only be changed when the 'safe_mode' is inactive.
$err = \error_reporting();
// Define list of menu handlers to initialize
$listofmenuhandler = array();
/*
 * View
 */
$form = new \Form($db);
$formadmin = new \FormAdmin($db);
$wikihelp = 'EN:First_setup|FR:Premiers_paramétrages|ES:Primeras_configuraciones';
$h = 0;
$head = array();