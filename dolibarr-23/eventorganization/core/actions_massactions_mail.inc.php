<?php

$error = 0;
// Mass actions. Controls on number of lines checked.
$maxformassaction = \getDolGlobalInt('MAIN_LIMIT_FOR_MASS_ACTIONS', 1000);
$resaction = '';
$nbsent = 0;
$nbignored = 0;
$listofobjectid = array();
$listofobjectref = array();
$oneemailperrecipient = \GETPOSTINT('oneemailperrecipient') ? 1 : 0;
$listofselectedid = array();
$listofselectedref = array();
$attendee = new \ConferenceOrBoothAttendee($db);
$objecttmp = new $objectclass($db);
$receiver = \GETPOST('receiver', 'alphawithlgt');
$action = 'list';
$massaction = '';
$reshook = $hookmanager->executeHooks('doMassActions', $parameters, $object, $action);