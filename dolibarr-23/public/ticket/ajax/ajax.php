<?php

\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define('NOREQUIRESOC', '1');
\define('NOREQUIREMENU', '1');
\define("NOLOGIN", '1');
\define('NOIPCHECK', '1');
\define('NOBROWSERNOTIF', '1');
// Load $user and permissions
/**
 * @var DoliDB $db
 */
$action = \GETPOST('action', 'aZ09');
$id = \GETPOSTINT('id');
$email = \GETPOST('email', 'custom', 0, \FILTER_VALIDATE_EMAIL);
// Test on permission not required here. Access is allowed only if TICKET_CREATE_THIRD_PARTY_WITH_CONTACT_IF_NOT_EXIST is on and option has been disabled because not secured.
$return = array('contacts' => array(), 'error' => '');