<?php

\define('CSRFCHECK_WITH_TOKEN', '1');
$radio_dump = \GETPOST('radio_dump');
$action = \GETPOST('action', 'aZ09');
/*
 * View
 */
$label = $db::LABEL;
$type = $db->type;
$help_url = 'EN:Restores|FR:Restaurations|ES:Restauraciones';
// Parameters execution
$command = $db->getPathOfRestore();
$param = $dolibarr_main_db_name;
$paramcrypted = $param;
$paramclear = $param;