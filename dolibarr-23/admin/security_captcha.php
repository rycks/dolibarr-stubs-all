<?php

$action = \GETPOST('action', 'aZ09');
$handler = \GETPOST('handler', 'aZ09');
$code = $reg[1];
$value = \GETPOST($code, 'alpha') ? \GETPOST($code, 'alpha') : 1;
/*
 * View
 */
$form = new \Form($db);
$wikihelp = 'EN:Setup_Security|FR:Paramétrage_Sécurité|ES:Configuración_Seguridad';
$dirModCaptcha = \array_merge(array('/core/modules/security/captcha/'), isset($conf->modules_parts['captcha']) && \is_array($conf->modules_parts['captcha']) ? $conf->modules_parts['captcha'] : array());
// Load array with all captcha generation modules
$arrayhandler = array();
$arrayhandler = \dol_sort_array($arrayhandler, 'position');
$head = \security_prepare_head();
// Set if a captcha is used on at least one place
$showavailablecaptcha = 0;
$selectedcaptcha = \getDolGlobalString('MAIN_SECURITY_ENABLECAPTCHA_HANDLER', 'standard');