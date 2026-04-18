<?php

\define('NOREQUIREMENU', '1');
\define("NOLOGIN", '1');
\define('NOIPCHECK', '1');
\define('NOBROWSERNOTIF', '1');
// If this page is public (can be called outside logged session)
// For MultiCompany module.
// Do not use GETPOST here, function is not defined and define must be done before including main.inc.php
// Because 2 entities can have the same ref.
$entity = !empty($_GET['entity']) ? (int) $_GET['entity'] : (!empty($_POST['entity']) ? (int) $_POST['entity'] : 1);
\define("DOLENTITY", $entity);
// Get parameters
$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel');
$track_id = \GETPOST('track_id', 'alpha');
$email = \strtolower(\GETPOST('email', 'alpha'));
$suffix = "";
$moreforfilter = "";
$object = new \Ticket($db);
/*
 * View
 */
$form = new \Form($db);
$user_assign = new \User($db);
$user_create = new \User($db);
$formTicket = new \FormTicket($db);
$arrayofjs = array();
$arrayofcss = array(\getDolGlobalString('TICKET_URL_PUBLIC_INTERFACE', '/public/ticket/') . 'css/styles.css.php');
$display_ticket_list = \false;
$error = 0;