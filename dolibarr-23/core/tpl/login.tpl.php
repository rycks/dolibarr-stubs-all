<?php

\define('NOBROWSERNOTIF', 1);
// DDOS protection
$size = empty($_SERVER['CONTENT_LENGTH']) ? 0 : (int) $_SERVER['CONTENT_LENGTH'];
$php_self = empty($php_self) ? \dol_escape_htmltag($_SERVER['PHP_SELF']) : $php_self;
$php_self = \preg_replace('/(\\?|&amp;|&)action=[^&]+/', '\\1', $php_self);
$php_self = \preg_replace('/(\\?|&amp;|&)actionlogin=[^&]+/', '\\1', $php_self);
$php_self = \preg_replace('/(\\?|&amp;|&)afteroauthloginreturn=[^&]+/', '\\1', $php_self);
$php_self = \preg_replace('/(\\?|&amp;|&)username=[^&]*/', '\\1', $php_self);
$php_self = \preg_replace('/(\\?|&amp;|&)entity=\\d+/', '\\1', $php_self);
$php_self = \preg_replace('/(\\?|&amp;|&)massaction=[^&]+/', '\\1', $php_self);
$php_self = \preg_replace('/(\\?|&amp;|&)token=[^&]+/', '\\1', $php_self);
$php_self = \preg_replace('/(&amp;)+/', '&amp;', $php_self);
// Javascript code on logon page only to detect user tz, dst_observed, dst_first, dst_second
$arrayofjs = array('/core/js/dst.js' . (empty($conf->dol_use_jmobile) ? '' : '?version=' . \urlencode(\DOL_VERSION)));
// We display application title
$application = \constant('DOL_APPLICATION_TITLE');
$applicationcustom = \getDolGlobalString('MAIN_APPLICATION_TITLE');
// $titletruedolibarrversion is defined by dol_loginfunction in security2.lib.php. We must keep the @, some tools use it to know it is login page and find true dolibarr version.
$disablenofollow = 1;
// Set a cookie to transfer rollback page information
$prefix = \dol_getprefix('');
$helpcenterlink = \getDolGlobalString('MAIN_HELPCENTER_LINKTOUSE');
$colorbackhmenu1 = '60,70,100';
$colorbackhmenu1 = \getDolUserString('THEME_ELDY_ENABLE_PERSONALIZED') ? \getDolUserString('THEME_ELDY_TOPMENU_BACK1', $colorbackhmenu1) : \getDolGlobalString('THEME_ELDY_TOPMENU_BACK1', $colorbackhmenu1);
$colorbackhmenu1 = \implode(',', \colorStringToArray($colorbackhmenu1));
// Add a variable param to force not using cache (jmobile)
$php_self = \preg_replace('/[&\\?]time=(\\d+)/', '', $php_self);
// List of directories where we can find captcha handlers
$dirModCaptcha = \array_merge(array('main' => '/core/modules/security/captcha/'), isset($conf->modules_parts['captcha']) && \is_array($conf->modules_parts['captcha']) ? $conf->modules_parts['captcha'] : array());
$fullpathclassfile = '';
$moreparam = '';
$message = '';
// Can add extra content
$parameters = array();
$dummyobject = new \stdClass();