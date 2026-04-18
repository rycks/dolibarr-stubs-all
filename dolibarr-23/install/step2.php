<?php

$ok = 0;
// This page can be long. We increase the time allowed. / Cette page peut etre longue. On augmente le delai autorise.
// Only works if you are not in safe_mode. / Ne fonctionne que si on est pas en safe_mode.
$err = \error_reporting();
$action = \GETPOST('action', 'aZ09') ? \GETPOST('action', 'aZ09') : (empty($argv[1]) ? '' : $argv[1]);
$setuplang = \GETPOST('selectlang', 'aZ09', 3) ? \GETPOST('selectlang', 'aZ09', 3) : (empty($argv[2]) ? 'auto' : $argv[2]);
// Choice of DBMS
$choix = 0;
//if (empty($choix)) dol_print_error(null,'Database type '.$dolibarr_main_db_type.' not supported into step2.php page');
// Now we load forced values from install.forced.php file.
$useforcedwizard = \false;
$forcedfile = "./install.forced.php";
$useforcedwizard = \true;
$error = 0;
$db = \getDoliDBInstance($conf->db->type, $conf->db->host, $conf->db->user, $conf->db->pass, $conf->db->name, (int) $conf->db->port);
$versionarray = array();
$requestnb = 0;
// To disable some code, so you can call step2 with url like
// http://localhost/dolibarrnew/install/step2.php?action=set&token='.newToken().'&createtables=0&createkeys=0&createfunctions=0&createdata=llx_20_c_departements
$createtables = \GETPOSTISSET('createtables') ? \GETPOST('createtables') : 1;
$createkeys = \GETPOSTISSET('createkeys') ? \GETPOST('createkeys') : 1;
$createfunctions = \GETPOSTISSET('createfunctions') ? \GETPOST('createfunction') : 1;
$createdata = \GETPOSTISSET('createdata') ? \GETPOST('createdata') : 1;
$ret = 0;
// Unique id of instance
$hash_unique_id = \dol_hash('dolibarr' . $conf->file->instance_unique_id, 'sha256');
// Note: if the global salt changes, this hash changes too so ping may be counted twice. We don't mind. It is for statistics purpose only.
$out = '<br>';