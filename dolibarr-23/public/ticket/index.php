<?php

\define('NOREQUIREMENU', '1');
\define('NOLOGIN', '1');
\define('NOIPCHECK', '1');
\define('NOBROWSERNOTIF', '1');
// For MultiCompany module
// Do not use GETPOST here, function is not defined and define must be done before including main.inc.php
// Because 2 entities can have the same ref.
$entity = !empty($_GET['entity']) ? (int) $_GET['entity'] : (!empty($_POST['entity']) ? (int) $_POST['entity'] : 1);
\define("DOLENTITY", $entity);
// Get parameters
$track_id = \GETPOST('track_id', 'alpha');
$action = \GETPOST('action', 'aZ09');
$suffix = "";
/*
 * View
 */
$form = new \Form($db);
$formticket = new \FormTicket($db);
$arrayofjs = array();
$arrayofcss = array(\getDolGlobalString('TICKET_URL_PUBLIC_INTERFACE', '/public/ticket/') . 'css/styles.css.php');
$baseurl = \getDolGlobalString('TICKET_URL_PUBLIC_INTERFACE', \DOL_URL_ROOT . '/public/ticket/');