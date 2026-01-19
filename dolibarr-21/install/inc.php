<?php

\define('DOL_INC_FOR_VERSION_ERROR', '1');
\define('DOL_DOCUMENT_ROOT', '..');
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
function usage($program, $header)
{
}
\define('MAIN_DB_PREFIX', isset($dolibarr_main_db_prefix) ? $dolibarr_main_db_prefix : '');
\define('DOL_CLASS_PATH', 'class/');
// Filesystem path to class dir
\define('DOL_DATA_ROOT', isset($dolibarr_main_data_root) ? $dolibarr_main_data_root : \DOL_DOCUMENT_ROOT . '/../documents');
\define('DOL_MAIN_URL_ROOT', isset($dolibarr_main_url_root) ? $dolibarr_main_url_root : '');
\define('DOL_URL_ROOT', $suburi);
\define('SYSLOG_HANDLERS', '["mod_syslog_file"]');
\define('SYSLOG_FILE_NO_ERROR', 1);
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