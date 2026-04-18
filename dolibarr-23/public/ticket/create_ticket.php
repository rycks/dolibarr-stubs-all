<?php

\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define("NOLOGIN", 1);
\define('NOIPCHECK', '1');
\define('NOBROWSERNOTIF', '1');
// For MultiCompany module.
// Do not use GETPOST here, function is not defined and define must be done before including main.inc.php
// Because 2 entities can have the same ref.
$entity = !empty($_GET['entity']) ? (int) $_GET['entity'] : (!empty($_POST['entity']) ? (int) $_POST['entity'] : 1);
\define("DOLENTITY", $entity);
// Get parameters
$id = \GETPOSTINT('id');
$msg_id = \GETPOSTINT('msg_id');
$socid = \GETPOSTINT('socid');
$suffix = "";
$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel');
$backtopage = '';
$object = new \Ticket($db);
$extrafields = new \ExtraFields($db);
$contacts = array();
$with_contact = \null;
$captchaobj = \null;
$captcha = \getDolGlobalString('MAIN_SECURITY_ENABLECAPTCHA_HANDLER', 'standard');
// List of directories where we can find captcha handlers
$dirModCaptcha = \array_merge(array('main' => '/core/modules/security/captcha/'), \is_array($conf->modules_parts['captcha']) ? $conf->modules_parts['captcha'] : array());
$fullpathclassfile = '';
/*
 * Actions
 */
$parameters = array('id' => $id);
// Note that $action and $object may have been modified by some hooks
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$formticket = new \FormTicket($db);
$arrayofjs = array();
$arrayofcss = array(\getDolGlobalString('TICKET_URL_PUBLIC_INTERFACE', '/public/ticket/') . 'css/styles.css.php');