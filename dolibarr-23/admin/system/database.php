<?php

$action = \GETPOST('action', 'aZ09');
/*
 * Actions
 */
$logsql = '';
$resultsql = \null;
/*
 * View
 */
$form = new \Form($db);
$defaultcollation = $db->getDefaultCollationDatabase();
$tooltipexample = "<br>SHOW VARIABLES LIKE 'collation_database' (cached)<br>You can avoid cache effect with:<br>SELECT DEFAULT_COLLATION_NAME FROM information_schema.SCHEMATA WHERE SCHEMA_NAME = '" . $db->escape($conf->db->name) . "'";
$listofvars = $db->getServerParametersValues();
$listofstatus = $db->getServerStatusValues();
$arraylist = array('listofvars', 'listofstatus');