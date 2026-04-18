<?php

\define('CSRFCHECK_WITH_TOKEN', '1');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$form = new \Form($db);
$userstatic = new \User($db);
$usefilter = 0;
$listofsessions = \listOfSessions();
$num = \count($listofsessions);
// Do not show number (0) if no session found (it means we can't know)
$savehandler = \ini_get("session.save_handler");
$savepath = \ini_get("session.save_path");
$openbasedir = \ini_get("open_basedir");
$phparray = \phpinfo_array();
$suhosin = empty($phparray['suhosin']["suhosin.session.encrypt"]["local"]) ? '' : $phparray['suhosin']["suhosin.session.encrypt"]["local"];
$i = 0;