<?php

$setuplang = \GETPOST('selectlang', 'aZ09', 3) ? \GETPOST('selectlang', 'aZ09', 3) : (empty($argv[1]) ? 'auto' : $argv[1]);
// Now we load forced value from install.forced.php file.
$useforcedwizard = \false;
$forcedfile = "./install.forced.php";
$error = 0;
$ok = 0;
$db = \getDoliDBInstance($conf->db->type, $conf->db->host, $conf->db->user, $conf->db->pass, $conf->db->name, (int) $conf->db->port);
$ret = 0;