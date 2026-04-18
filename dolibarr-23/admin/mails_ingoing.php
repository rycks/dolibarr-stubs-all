<?php

$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel', 'alpha');
$trackid = \GETPOST('trackid');
/*
 * View
 */
$form = new \Form($db);
$linuxlike = 1;
//$wikihelp = 'EN:Setup_EMails|FR:Paramétrage_EMails|ES:Configuración_EMails';
$wikihelp = '';
$head = \email_admin_prepare_head();
// List of sending methods
$listofmethods = array();
// List of oauth services
$oauthservices = array();