<?php

\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define('NOREQUIRESOC', '1');
\define('NOREQUIREMENU', '1');
\define("NOLOGIN", '1');
\define('NOBROWSERNOTIF', '1');
/**
 * @var DoliDB $db
 */
$action = \GETPOST('action', 'aZ09');
$id = \GETPOSTINT('id');
$datetocheckbooking = \GETPOSTINT('datetocheck');
$error = 0;
// Security check
/*if (!defined("NOLOGIN")) {	// No need of restrictedArea if not logged: Later the select will filter on public articles only if not logged.
	restrictedArea($user, 'knowledgemanagement', 0, 'knowledgemanagement_knowledgerecord', 'knowledgerecord');
}*/
$result = "{}";
// Test on permission not required here (anonymous action protected by mitigation of /public/... urls)
$response = array();
$result = $response;