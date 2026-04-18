<?php

// Get parameters
$action = \GETPOST('action', 'aZ09');
$section = \GETPOST('section');
$newfolder = \GETPOST('newfolder');
$numero_ftp = \GETPOST("numero_ftp");
/* if (! $numero_ftp) $numero_ftp=1; */
$file = \GETPOST("file");
$confirm = \GETPOST('confirm');
$upload_dir = $conf->ftp->dir_temp;
$download_dir = $conf->ftp->dir_temp;
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$s_ftp_name = 'FTP_NAME_' . $numero_ftp;
$s_ftp_server = 'FTP_SERVER_' . $numero_ftp;
$s_ftp_port = 'FTP_PORT_' . $numero_ftp;
$s_ftp_user = 'FTP_USER_' . $numero_ftp;
$s_ftp_password = 'FTP_PASSWORD_' . $numero_ftp;
$s_ftp_passive = 'FTP_PASSIVE_' . $numero_ftp;
$ftp_name = \getDolGlobalString($s_ftp_name);
$ftp_server = \getDolGlobalString($s_ftp_server);
$ftp_port = \getDolGlobalString($s_ftp_port);
$ftp_user = \getDolGlobalString($s_ftp_user);
$ftp_password = \getDolGlobalString($s_ftp_password);
$ftp_passive = \getDolGlobalInt($s_ftp_passive);
// For result on connection
$ok = 0;
$conn_id = \null;
// FTP connection ID
$mesg = '';
$result = \restrictedArea($user, 'ftp', '');
$newsectioniso = \null;
// set up a connection or die
$newsectioniso = \null;
$ecmdir = new \EcmDirectory($db);
$id = $ecmdir->create($user);
$form = new \Form($db);
$formfile = new \FormFile($db);
$userstatic = new \User($db);
$disconnect = \dol_ftp_close($conn_id);