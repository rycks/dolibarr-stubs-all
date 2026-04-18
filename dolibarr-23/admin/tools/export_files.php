<?php

\define('CSRFCHECK_WITH_TOKEN', '1');
$action = \GETPOST('action', 'aZ09');
$what = \GETPOST('what', 'alpha');
$export_type = \GETPOST('export_type', 'alpha');
$file = \trim(\GETPOST('zipfilename_template', 'alpha'));
$compression = \GETPOST('compression', 'aZ09');
$file = \dol_sanitizeFileName($file, '_', 1, 1);
$file = \preg_replace('/(\\.zip|\\.tar|\\.tgz|\\.gz|\\.tar\\.gz|\\.bz2|\\.zst)$/i', '', $file);
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$offset = $limit * $page;
$errormsg = '';
$filerelative = \dol_sanitizeFileName(\GETPOST('urlfile', 'alpha'));
$filepath = $conf->admin->dir_output . '/' . $filerelative;
$ret = \dol_delete_file($filepath, 1);
$action = '';
/*
 * View
 */
// Increase limit of time. Works only if we are not in safe mode
$ExecTimeLimit = \getDolGlobalInt('MAIN_ADMIN_TOOLS_EXPORT_FILES_EXEC_TIME_LIMIT', 1800);
/* If value has been forced with a php_admin_value, this has no effect. Example of value: '512M' */
$MemoryLimit = \getDolGlobalString('MAIN_MEMORY_LIMIT_ARCHIVE_DATAROOT');
$form = new \Form($db);
$formfile = new \FormFile($db);
//$help_url='EN:Backups|FR:Sauvegardes|ES:Copias_de_seguridad';
//llxHeader('','',$help_url);
//print load_fiche_titre($langs->trans("Backup"),'','title_setup');
// Start with empty buffer
$dump_buffer = '';
$dump_buffer_len = 0;
// We will send fake headers to avoid browser timeout when buffering
$time_start = \time();
$outputdir = $conf->admin->dir_output . '/documents';
$result = \dol_mkdir($outputdir);
$utils = new \Utils($db);
$dirtoswitch = \dirname($fulldirtocompress);
$dirtocompress = \basename($fulldirtocompress);
$excludefiles = '/(\\.back|\\.old|\\.log|\\.pdf_preview-.*\\.png|[\\/\\\\]temp[\\/\\\\]|[\\/\\\\]admin[\\/\\\\]documents[\\/\\\\])/i';
//var_dump($fulldirtocompress);
//var_dump($outputdir."/".$file);exit;
$rootdirinzip = '';
$ret = \dol_compress_dir($fulldirtocompress, $outputdir . "/" . $file, $compression, $excludefiles, $rootdirinzip);
// Redirect to calling page
$returnto = 'dolibarr_export.php';