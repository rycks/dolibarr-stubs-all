<?php

$upload_dir = $conf->admin->dir_temp;
/*
 * Actions
 */
$error = 0;
/*
 * View
 */
$form = new \Form($db);
$wikihelp = 'EN:Setup_Security|FR:Paramétrage_Sécurité|ES:Configuración_Seguridad';
$head = \security_prepare_head();