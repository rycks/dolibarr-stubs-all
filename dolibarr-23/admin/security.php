<?php

$action = \GETPOST('action', 'aZ09');
// Allow/Disallow change to clear passwords once passwords are encrypted
$allow_disable_encryption = \false;
$error = 0;
// We set entity=0 (all) because DATABASE_PWD_ENCRYPTED is a setup into conf file, so always shared for everybody
$entityforall = 0;
$sql = "SELECT u.rowid, u.pass, u.pass_crypted";
// Not a MD5 value
$resql = $db->query($sql);
$result = \encodedecode_dbpassconf(1);
$pattern = \GETPOST("pattern", "alpha");
$explodePattern = \explode(';', $pattern);
// List of ints separated with ';' containing counts
$patternInError = \false;
/*
 * View
 */
$form = new \Form($db);
$wikihelp = 'EN:Setup_Security|FR:Paramétrage_Sécurité|ES:Configuración_Seguridad';
$head = \security_prepare_head();
// Load array with all password generation modules
$dir = "../core/modules/security/generate";
$handle = \opendir($dir);
$i = 1;
$arrayhandler = array();
$tabConf = \explode(";", \getDolGlobalString('USER_PASSWORD_PATTERN'));