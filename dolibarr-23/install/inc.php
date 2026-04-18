<?php

\define('DOL_INC_FOR_VERSION_ERROR', '1');
\define('DOL_DOCUMENT_ROOT', '..');
$conf = new \Conf();
$includeconferror = '';
// Define localization of conf file
$conffile = "../conf/conf.php";
$conffiletoshow = "htdocs/conf/conf.php";
// For debian/redhat like systems
//$conffile = "/etc/dolibarr/conf.php";
//$conffiletoshow = "/etc/dolibarr/conf.php";
$short_options = "c:h";
$long_options = array("config:", "help");
/**
 * Print the usage when executing scripts from install/.
 *
 * Print the help text exposing the available options when executing
 * update or install script (ie. from htdocs/install/) from CLI with
 * the `php` executable. This function does not `exit` the program and
 * the caller should then call `exit` themselves since they should
 * determine whether it was an error or not.
 *
 * @param string $program the script that was originally run
 * @param string $header  the message to signal to the user
 * @return void
 */
function install_usage($program, $header)
{
}
$rest_index = 0;
$opts = \getopt($short_options, $long_options, $rest_index);
// Parse the arguments to find the options.
$args_options = \array_filter(
    \array_slice($argv, 0, $rest_index),
    /**
     * @param string $arg
     * @return bool
     */
    static function ($arg) {
        return \strlen($arg) >= 2 && $arg[0] == '-';
    }
);
$parsed_options = \array_map(
    /**
     * Previx option with '-' for single characters and -- for more than single characters
     * @param string $arg
     * @return string
     */
    static function ($arg) {
        return "-" . $arg;
    },
    \array_keys($opts)
);
// Find options (dash-prefixed) that were not parsed.
$unknown_options = \array_diff($args_options, $parsed_options);
// Tricky argument list hack, should be removed someday.
// Reset argv to remove the argument that were parsed. This is needed
// currently because some install code, like in upgrade.php, are using
// $argv[] directly with fixed index to fetch some arguments.
$argv = \array_merge(array($argv[0]), \array_slice($argv, $rest_index));
$argc = \count($argv);
// Test on filesize is to ensure that conf file is more that an empty template with just <?php in first line
$result = (include_once $conffile);
\define('MAIN_DB_PREFIX', isset($dolibarr_main_db_prefix) ? $dolibarr_main_db_prefix : '');
\define('DOL_CLASS_PATH', 'class/');
// Filesystem path to class dir
\define('DOL_DATA_ROOT', isset($dolibarr_main_data_root) ? $dolibarr_main_data_root : \DOL_DOCUMENT_ROOT . '/../documents');
\define('DOL_MAIN_URL_ROOT', isset($dolibarr_main_url_root) ? $dolibarr_main_url_root : '');
// URL relative root
$uri = \preg_replace('/^http(s?):\\/\\//i', '', \constant('DOL_MAIN_URL_ROOT'));
// $uri contains url without http*
$suburi = \strstr($uri, '/');
\define('DOL_URL_ROOT', $suburi);
// Check install.lock (for both install and upgrade)
$lockfile = \DOL_DATA_ROOT . '/install.lock';
// To lock all /install pages
$lockfile2 = \DOL_DOCUMENT_ROOT . '/install.lock';
// To lock all /install pages (recommended)
$upgradeunlockfile = \DOL_DATA_ROOT . '/upgrade.unlock';
// To unlock upgrade process
$upgradeunlockfile2 = \DOL_DOCUMENT_ROOT . '/upgrade.unlock';
$islocked = \false;
\define('SYSLOG_HANDLERS', '["mod_syslog_file"]');
\define('SYSLOG_FILE_NO_ERROR', 1);
// We init log handler for install
$handlers = array('mod_syslog_file');
// Define object $langs
$langs = new \Translate('..', $conf);
/**
 * Load conf file (file must exists)
 *
 * @param	string		$dolibarr_main_document_root		Root directory of Dolibarr bin files
 * @return	int												Return integer <0 if KO, >0 if OK
 */
function conf($dolibarr_main_document_root)
{
}
/**
 * Show HTML header of install pages
 *
 * @param	string		$subtitle			Title
 * @param 	string		$next				Next
 * @param 	string		$action    			Action code ('set' or 'upgrade')
 * @param 	string		$param				Param
 * @param	string		$forcejqueryurl		Set jquery relative URL (must end with / if defined)
 * @param   string      $csstable           Css for table
 * @return	void
 */
function pHeader($subtitle, $next, $action = 'set', $param = '', $forcejqueryurl = '', $csstable = 'main-inside')
{
}
/**
 * Print HTML footer of install pages
 *
 * @param 	integer	$nonext				1=No button "Next step", 2=Show button but disabled with a link to enable
 * @param	string	$setuplang			Language code
 * @param	string	$jscheckfunction	Add a javascript check function
 * @param	integer	$withpleasewait		Add also please wait tags
 * @param	string	$morehtml			Add more HTML content
 * @return	void
 */
function pFooter($nonext = 0, $setuplang = '', $jscheckfunction = '', $withpleasewait = 0, $morehtml = '')
{
}
/**
 * Log function for install pages
 *
 * @param	string	$message	Message
 * @param 	int		$level		Level of log
 * @return	void
 */
function dolibarr_install_syslog($message, $level = \LOG_DEBUG)
{
}
/**
 * Automatically detect Dolibarr's main document root
 *
 * @return string
 */
function detect_dolibarr_main_document_root()
{
}
/**
 * Automatically detect Dolibarr's main data root
 *
 * @param string $dolibarr_main_document_root Current main document root
 * @return string
 */
function detect_dolibarr_main_data_root($dolibarr_main_document_root)
{
}
/**
 * Automatically detect Dolibarr's main URL root
 *
 * @return string
 */
function detect_dolibarr_main_url_root()
{
}
/**
 * Replaces automatic database login by actual value
 *
 * @param string $force_install_databaserootlogin Login
 * @return string
 */
function parse_database_login($force_install_databaserootlogin)
{
}
/**
 * Replaces automatic database password by actual value
 *
 * @param string $force_install_databaserootpass Password
 * @return string
 */
function parse_database_pass($force_install_databaserootpass)
{
}