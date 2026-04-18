<?php

$action = \GETPOST('action', 'aZ09');
$what = \GETPOST('what', 'alpha');
$export_type = \GETPOST('export_type', 'alpha');
$file = \dol_sanitizeFileName(\GETPOST('filename_template', 'alpha'));
// Load variable for pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1 or if we click on clear filters or if we select empty mass action
$offset = $limit * $page;
$errormsg = '';
$utils = new \Utils($db);
$file = $conf->admin->dir_output . '/' . \dol_sanitizeFileName(\GETPOST('urlfile'));
$ret = \dol_delete_file($file, 1);
$action = '';
// Increase limit of time. Works only if we are not in safe mode
$ExecTimeLimit = 600;
$MemoryLimit = 0;
// We will send fake headers to avoid browser timeout when buffering
$time_start = \time();
$outputdir = $conf->admin->dir_output . '/backup';
$result = \dol_mkdir($outputdir);
$lowmemorydump = (int) (\GETPOSTISSET("lowmemorydump") ? \GETPOSTINT("lowmemorydump") : \getDolGlobalInt('MAIN_LOW_MEMORY_DUMP'));
$cmddump = \GETPOST("mysqldump", 'none');
// Do not sanitize here with 'alpha', will be sanitize later by dol_sanitizePathName and escapeshellarg
$cmddump = \dol_sanitizePathName($cmddump);
$basenamecmddump = \basename(\str_replace('\\', '/', $cmddump));
$cmddump = \GETPOST("postgresqldump", 'none');
// Do not sanitize here with 'alpha', will be sanitize later by dol_sanitizePathName and escapeshellarg
$cmddump = \dol_sanitizePathName($cmddump);
$what = '';