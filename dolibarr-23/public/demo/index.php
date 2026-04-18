<?php

\define('NOLOGIN', '1');
\define('NOBROWSERNOTIF', 1);
\define('NOIPCHECK', '1');
// Initialize a technical object to manage hooks of the page.
// Note that conf->hooks_modules contains an array of hook contexats
$res = $hookmanager->initHooks(array('demo'));
$demoprofiles = array();
$alwayscheckedmodules = array();
$alwaysuncheckedmodules = array();
$alwayshiddencheckedmodules = array();
$alwayshiddenuncheckedmodules = array();
$url = '';
$url = \DOL_URL_ROOT . '/index.php' . ($url ? '?' . $url : '');
$tmpaction = 'view';
$parameters = array();
$object = new \stdClass();
$reshook = $hookmanager->executeHooks('addDemoProfile', $parameters, $object, $tmpaction);
// Note that $action and $object may have been modified by some hooks
$error = $hookmanager->error;
$errors = $hookmanager->errors;
// Search modules
$dirlist = $conf->file->dol_document_root;
// Search modules dirs
$modulesdir = \dolGetModulesDirs();
$filename = array();
$modules = array();
$orders = array();
$categ = array();
$i = 0;
// is a sequencer of modules found
$j = 0;
// j is module number. Automatically assigned if module number is not defined.
$const_name = '';
// Action run when we click on "Start" after selection modules
//print 'ee'.GETPOST("demochoice");
$disablestring = '';
/*
 * View
 */
$head = '';
$i = 0;
/**
 * Show header for demo
 *
 * Note: also called by functions.lib:recordNotFound
 *
 * @param 	string		$title				Title
 * @param 	string		$head				Head array
 * @param 	int    		$disablejs			More content into html header
 * @param 	int    		$disablehead		More content into html header
 * @param 	string[]|string	$arrayofjs			Array of complementary js files
 * @param 	string[]|string	$arrayofcss			Array of complementary css files
 * @return	void
 */
function llxHeaderVierge($title, $head = "", $disablejs = 0, $disablehead = 0, $arrayofjs = [], $arrayofcss = [])
{
}
/**
 * Show footer for demo
 *
 * Note: also called by functions.lib:recordNotFound
 *
 * @return	void
 */
function llxFooterVierge()
{
}