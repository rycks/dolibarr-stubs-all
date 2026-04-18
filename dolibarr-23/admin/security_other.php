<?php

$action = \GETPOST('action', 'aZ09');
/*
 * Actions
 */
$reg = array();
$code = $reg[1];
$value = \GETPOST($code, 'alpha') ? \GETPOST($code, 'alpha') : 1;
/*
 * View
 */
$form = new \Form($db);
$wikihelp = 'EN:Setup_Security|FR:Paramétrage_Sécurité|ES:Configuración_Seguridad';
$head = \security_prepare_head();
$sessiontimeout = \ini_get("session.gc_maxlifetime");