<?php

\define('DOL_DOCUMENT_ROOT', '..');
\define('MAIN_DB_PREFIX', isset($dolibarr_main_db_prefix) ? $dolibarr_main_db_prefix : '');
\define('DOL_CLASS_PATH', 'class/');
// Filsystem path to class dir
\define('DOL_DATA_ROOT', isset($dolibarr_main_data_root) ? $dolibarr_main_data_root : '');
\define('DOL_MAIN_URL_ROOT', isset($dolibarr_main_url_root) ? $dolibarr_main_url_root : '');
\define('DOL_URL_ROOT', $suburi);
/**
 *	Load conf file (file must exists)
 *
 *	@param	string	$dolibarr_main_document_root		Root directory of Dolibarr bin files
 *	@return	int											<0 if KO, >0 if OK
 */
function conf($dolibarr_main_document_root)
{
}
/**
 * Show HTML header
 *
 * @param	string	$soutitre	Title
 * @param	string	$next		Next
 * @param	string	$action		Action code
 * @return	void
 */
function pHeader($soutitre, $next, $action = 'none')
{
}
/**
 * Print HTML footer
 *
 * @param	integer	$nonext			No button "Next step"
 * @param   string	$setuplang		Language code
 * @return	void
 */
function pFooter($nonext = 0, $setuplang = '')
{
}