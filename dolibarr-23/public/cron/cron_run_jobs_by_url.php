<?php

\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define('NOLOGIN', '1');
\define('NOIPCHECK', '1');
\define('USESUFFIXINLOG', '_cron');
// For MultiCompany module.
// Do not use GETPOST here, function is not defined and define must be done before including main.inc.php
// Because 2 entities can have the same ref
$entity = !empty($_GET['entity']) ? (int) $_GET['entity'] : (!empty($_POST['entity']) ? (int) $_POST['entity'] : 1);
\define("DOLENTITY", $entity);
/*
 * View
 */
// current date
$now = \dol_now();
// Check the key, avoid that a stranger starts cron
$key = \GETPOST('securitykey', 'alpha');
// Check the key, avoid that a stranger starts cron
$userlogin = \GETPOST('userlogin', 'alpha');
$user = new \User($db);
$result = $user->fetch(0, $userlogin);
$id = \GETPOST('id', 'alpha');
// We accept non numeric id. We will filter later.
// create a jobs object
$object = new \Cronjob($db);
$filter = array();
$result = $object->fetchAll('ASC,ASC,ASC', 't.priority,t.entity,t.rowid', 0, 0, 1, $filter, 0);
// TODO Duplicate code. This sequence of code must be shared with code into cron_run_jobs.php script.
// current date
$nbofjobs = \count($object->lines);
$nbofjobslaunchedok = 0;
$nbofjobslaunchedko = 0;