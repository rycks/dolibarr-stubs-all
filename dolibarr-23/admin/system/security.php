<?php

$execmethod = \getDolGlobalInt('MAIN_EXEC_USE_POPEN', 1);
/*
 * View
 */
$form = new \Form($db);
// Get version of PHP
$phpversion = \version_php();
// Web user group by default
$labeluser = \dol_getwebuser('user');
$labelgroup = \dol_getwebuser('group');
$arrayout = array();
$varout = 0;
// The original value is...
$disablefunctionorign = '';
$phparray = \phpinfo_array();
/*
if (empty($disablefunctionorign)) {
	$disablefunctionorign = ini_get('disable_functions');		// Not always the real value
}
*/
$arrayoffunctionsdisabled = \explode(',', $disablefunctionorign);
$arrayoffunctionstodisable = \explode(',', 'dl,apache_note,apache_setenv,pcntl_alarm,pcntl_fork,pcntl_waitpid,pcntl_wait,pcntl_wifexited,pcntl_wifstopped,pcntl_wifsignaled,pcntl_wifcontinued,pcntl_wexitstatus,pcntl_wtermsig,pcntl_wstopsig,pcntl_signal,pcntl_signal_get_handler,pcntl_signal_dispatch,pcntl_get_last_error,pcntl_strerror,pcntl_sigprocmask,pcntl_sigwaitinfo,pcntl_sigtimedwait,pcntl_exec,pcntl_getpriority,pcntl_setpriority,pcntl_async_signals,show_source,virtual');
$i = 0;
$todisabletext = '';
$i = 0;
$todisabletext = '';
$i = 0;
// JSON
$loadedExtensions = \array_map('strtolower', \get_loaded_extensions(\false));
$test = !\in_array('json', $loadedExtensions);
// XDebug
$test = !\function_exists('xdebug_is_enabled') && !\extension_loaded('xdebug');
$arrayoffilesinroot = \dol_dir_list(\DOL_DOCUMENT_ROOT, 'all', 1, '', array('\\/custom'), 'name', \SORT_ASC, 4, 1, '', 1);
$fileswithwritepermission = array();
// $conffile is defined into filefunc.inc.php
$perms = \fileperms($dolibarr_main_document_root . '/' . $conffile);
$installlock = \DOL_DATA_ROOT . '/install.lock';
$upgradeunlock = \DOL_DATA_ROOT . '/upgrade.unlock';
$installmoduleslock = \DOL_DATA_ROOT . '/installmodules.lock';
// Is install (upgrade) locked
$test = \file_exists($installlock);
// Is addon install locked ?
$test = \file_exists($installmoduleslock);
$arrayofstreams = \stream_get_wrappers();
$sessiontimeout = \ini_get("session.gc_maxlifetime");
// Mask by default in upload
$umask = \getDolGlobalString('MAIN_UMASK');
$securityevent = new \Events($db);
$eventstolog = $securityevent->eventstolog;
$out = '';
$examplecsprule = "frame-ancestors 'self'; img-src * data:; font-src *; default-src 'self' 'unsafe-inline' 'unsafe-eval' *.paypal.com *.stripe.com *.google.com *.googleapis.com *.google-analytics.com *.googletagmanager.com *.dolistore.com *.githubusercontent.com";
$tmpurl = \constant('DOL_MAIN_URL_ROOT');
$tmpurl = \preg_replace('/^(https?:\\/\\/[^\\/]+)\\/.*$/', '\\1', $tmpurl);
$test = \isModEnabled('syslog');
$test = \isModEnabled('debugbar');
// Modules for Payments
$test = \isModEnabled('stripe');
$action = \GETPOST('action');
$exampletodecrypt = \GETPOST('exampletodecrypt', 'password');
$decryptedstring = \dolDecrypt($exampletodecrypt);
$sql = "SELECT w.rowid as id, w.ref";
$resql = $db->query($sql);
// Test compatibility of MAIN_RESTRICTHTML_ONLY_VALID_HTML
$savMAIN_RESTRICTHTML_REMOVE_ALSO_BAD_ATTRIBUTES = \getDolGlobalString('MAIN_RESTRICTHTML_REMOVE_ALSO_BAD_ATTRIBUTES');
$savMAIN_RESTRICTHTML_ONLY_VALID_HTML = \getDolGlobalString('MAIN_RESTRICTHTML_ONLY_VALID_HTML');
$savMAIN_RESTRICTHTML_ONLY_VALID_HTML_TIDY = \getDolGlobalString('MAIN_RESTRICTHTML_ONLY_VALID_HTML_TIDY');
$result = \dol_htmlwithnojs('<img onerror<=alert(document.domain)> src=>0xbeefed');
// Test compatibility of MAIN_RESTRICTHTML_ONLY_VALID_HTML_TIDY
$savMAIN_RESTRICTHTML_REMOVE_ALSO_BAD_ATTRIBUTES = \getDolGlobalString('MAIN_RESTRICTHTML_REMOVE_ALSO_BAD_ATTRIBUTES');
$savMAIN_RESTRICTHTML_ONLY_VALID_HTML = \getDolGlobalString('MAIN_RESTRICTHTML_ONLY_VALID_HTML');
$savMAIN_RESTRICTHTML_ONLY_VALID_HTML_TIDY = \getDolGlobalString('MAIN_RESTRICTHTML_ONLY_VALID_HTML_TIDY');
$result = \dol_htmlwithnojs('<img onerror<=alert(document.domain)> src=>0xbeefed');
$urlexamplebase = 'https://github.com/Dolibarr/dolibarr/blob/develop/dev/setup/fail2ban/filter.d/';
$urlexamplebase = 'https://github.com/Dolibarr/dolibarr/blob/develop/dev/setup/apache/';