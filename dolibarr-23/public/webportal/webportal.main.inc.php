<?php

\define('WEBPORTAL', 1);
\define('NOLOGIN', 1);
\define('NOREQUIREUSER', 1);
\define('NOREQUIREMENU', 1);
\define('NOREQUIRESOC', 1);
\define('EVEN_IF_ONLY_LOGIN_ALLOWED', 1);
\define('NOIPCHECK', 1);
/**
 *  Return a prefix to use for this Dolibarr instance, for session/cookie names or email id.
 *  The prefix is unique for instance and avoid conflict between multi-instances, even when having two instances with same root dir
 *  or two instances in same virtual servers.
 *  This function must not use dol_hash (that is used for password hash) and need to have all context $conf loaded when called.
 *
 *  @param  string  $mode                   '' (prefix for session name) or 'email' (prefix for email id)
 *  @return	string                          A calculated prefix
 */
function dol_getprefix($mode = '')
{
}
// Init session. Name of session is specific to WEBPORTAL instance.
// Must be done after the include of filefunc.inc.php so global variables of conf file are defined (like $dolibarr_main_instance_unique_id or $dolibarr_main_force_https).
// Note: the function dol_getprefix is defined into functions.lib.php but may have been defined to return a different key to manage another area to protect.
//$prefix = dol_getprefix('');
//$sessionname = 'WEBPORTAL_SESSID_' . $prefix;
//$sessiontimeout = 'WEBPORTAL_SESSTIMEOUT_' . $prefix;
//if (!empty($_COOKIE[$sessiontimeout]) && session_status() === PHP_SESSION_NONE) {
//	ini_set('session.gc_maxlifetime', $_COOKIE[$sessiontimeout]);
//}
$context = \Context::getInstance();
$logged_user = new \User($db);
$anti_spam_session_key = 'dol_antispam_value';