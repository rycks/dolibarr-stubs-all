<?php

$action = \GETPOST('action', 'aZ09');
$sortfield = \GETPOST('sortfield', 'aZ09');
$sortorder = \GETPOST('sortorder', 'aZ09');
$upload_dir = $conf->admin->dir_temp;
$error = 0;
$antivircommand = \GETPOST('MAIN_ANTIVIRUS_COMMAND', 'restricthtml');
// Use GETPOST restricthtml because we must accept ". Example c:\Progra~1\ClamWin\bin\clamscan.exe
$antivirparam = \GETPOST('MAIN_ANTIVIRUS_PARAM', 'restricthtml');
// Use GETPOST restricthtml because we must accept ". Example --database="C:\Program Files (x86)\ClamWin\lib"
$antivircommand = \dol_string_nospecial($antivircommand, '', array("|", ";", "<", ">", "&", "+"));
// Sanitize command
$antivirparam = \dol_string_nospecial($antivirparam, '', array("|", ";", "<", ">", "&", "+"));
/*
 * View
 */
$form = new \Form($db);
$wikihelp = 'EN:Setup_Security|FR:Paramétrage_Sécurité|ES:Configuración_Seguridad';
$head = \security_prepare_head();
$max = @\ini_get('upload_max_filesize');
$formfile = new \FormFile($db);
// List of document
$filearray = \dol_dir_list($upload_dir, "files", 0, '', '', $sortfield, $sortorder == 'desc' ? \SORT_DESC : \SORT_ASC, 1);