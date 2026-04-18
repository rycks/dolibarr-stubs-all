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
$email = \GETPOST('email', 'email');
$suffix = "";
$object = new \ActionsTicket($db);
$backtopage = \getDolGlobalString('TICKET_URL_PUBLIC_INTERFACE', \DOL_URL_ROOT . '/public/ticket/');
$action = 'view_ticket';
$display_ticket = \false;
// Test on permission not required here. Done later by using the $track_id + check email in session
$error = 0;
// Actions to send emails (for ticket, we need to manage the addfile and removefile only)
$triggersendname = 'TICKET_SENTBYMAIL';
$paramname = 'id';
$autocopy = 'MAIN_MAIL_AUTOCOPY_TICKET_TO';
/*
 * View
 */
$form = new \Form($db);
$formticket = new \FormTicket($db);
$arrayofjs = array();
$arrayofcss = array(\getDolGlobalString('TICKET_URL_PUBLIC_INTERFACE', '/public/ticket/') . 'css/styles.css.php');