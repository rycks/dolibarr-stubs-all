<?php

\define('EURO', \chr(128));
/*
 * Disable some not used PHP stream
 */
$listofwrappers = \stream_get_wrappers();
// We need '.phar' for geoip2. TODO Replace phar in geoip with exploded files so we can disable phar by default.
// phar stream does not auto unserialize content (possible code execution) since PHP 8.1
// zip stream is necessary by excel import module
$arrayofstreamtodisable = array('compress.zlib', 'compress.bzip2', 'ftp', 'ftps', 'glob', 'data', 'expect', 'ogg', 'rar', 'zlib');
/*
 * Create $conf object
 */
$conf = new \Conf();
/*
 * Create object $langs (must be before all other code)
 */
$langs = \null;
/*
 * Create object $db
 */
$db = \null;
$db = \getDoliDBInstance($conf->db->type, $conf->db->host, $conf->db->user, $conf->db->pass, $conf->db->name, (int) $conf->db->port);
$langcode = \GETPOST('lang', 'aZ09') ? \GETPOST('lang', 'aZ09', 1) : \getDolGlobalString('MAIN_LANG_DEFAULT', 'auto');
$mysoc = new \Societe($db);