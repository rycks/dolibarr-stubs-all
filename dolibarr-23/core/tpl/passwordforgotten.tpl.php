<?php

\define('NOBROWSERNOTIF', 1);
// DDOS protection
$size = (int) ($_SERVER['CONTENT_LENGTH'] ?? 0);
$php_self = $_SERVER['PHP_SELF'];
$php_self = \str_replace('action=validatenewpassword', '', $php_self);
$titleofpage = $langs->trans('SendNewPassword');
// Javascript code on logon page only to detect user tz, dst_observed, dst_first, dst_second
$arrayofjs = array();
$disablenofollow = 1;
$colorbackhmenu1 = '60,70,100';
$colorbackhmenu1 = \getDolUserString('THEME_ELDY_ENABLE_PERSONALIZED') ? \getDolUserString('THEME_ELDY_TOPMENU_BACK1', $colorbackhmenu1) : \getDolGlobalString('THEME_ELDY_TOPMENU_BACK1', $colorbackhmenu1);
$colorbackhmenu1 = \implode(',', \colorStringToArray($colorbackhmenu1));
// Add a variable param to force not using cache (jmobile)
$php_self = \preg_replace('/[&\\?]time=(\\d+)/', '', $php_self);
// List of directories where we can find captcha handlers
$dirModCaptcha = \array_merge(array('main' => '/core/modules/security/captcha/'), isset($conf->modules_parts['captcha']) && \is_array($conf->modules_parts['captcha']) ? $conf->modules_parts['captcha'] : array());
$fullpathclassfile = '';
$moreparam = '';
// Can add extra content
$parameters = array();
$dummyobject = new \stdClass();
$result = $hookmanager->executeHooks('getPasswordForgottenPageExtraContent', $parameters, $dummyobject, $action);