<?php

$action = \GETPOST('action', 'aZ09');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'adminaccoutant';
$error = 0;
/*
 * Actions
 */
$parameters = array();
$object = \null;
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$help_url = '';
$head = \company_admin_prepare_head();