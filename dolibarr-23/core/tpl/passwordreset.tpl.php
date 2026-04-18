<?php

\define('NOBROWSERNOTIF', 1);
// DDOS protection
$size = (int) ($_SERVER['CONTENT_LENGTH'] ?? 0);
$php_self = $_SERVER['PHP_SELF'];
$php_self = \str_replace('action=validatenewpassword', '', $php_self);
$titleofpage = $langs->trans('ResetPassword');
// Javascript code on logon page only to detect user tz, dst_observed, dst_first, dst_second
$arrayofjs = array();
$disablenofollow = 1;
$colorbackhmenu1 = '60,70,100';
$colorbackhmenu1 = \getDolUserString('THEME_ELDY_ENABLE_PERSONALIZED') ? \getDolUserString('THEME_ELDY_TOPMENU_BACK1', $colorbackhmenu1) : \getDolGlobalString('THEME_ELDY_TOPMENU_BACK1', $colorbackhmenu1);
$colorbackhmenu1 = \implode(',', \colorStringToArray($colorbackhmenu1));
// Normalize value to 'x,y,z'
$edituser = new \User($db);
$result = $edituser->fetch(0, $username);
// Add a variable param to force not using cache (jmobile)
$php_self = \preg_replace('/[&\\?]time=(\\d+)/', '', $php_self);
$classfile = \DOL_DOCUMENT_ROOT . "/core/modules/security/captcha/modCaptcha" . \ucfirst($captcha) . '.class.php';
$captchaobj = \null;
$moreparam = '';
// Can add extra content
$parameters = array();
$dummyobject = new \stdClass();
$result = $hookmanager->executeHooks('getPasswordResetExtraContent', $parameters, $dummyobject, $action);