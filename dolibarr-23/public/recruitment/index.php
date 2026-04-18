<?php

\define("NOLOGIN", 1);
\define("NOCSRFCHECK", 1);
\define('NOIPCHECK', '1');
\define('NOBROWSERNOTIF', '1');
// Get parameters
$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel', 'alpha');
$SECUREKEY = \GETPOST("securekey");
$entity = \GETPOSTINT('entity') ? \GETPOSTINT('entity') : $conf->entity;
$backtopage = '';
$suffix = "";
// Load variable for pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1 or if we click on clear filters
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$object = new \RecruitmentJobPosition($db);
// Define $urlwithroot
//$urlwithouturlroot=preg_replace('/'.preg_quote(DOL_URL_ROOT,'/').'$/i','',trim($dolibarr_main_url_root));
//$urlwithroot=$urlwithouturlroot.DOL_URL_ROOT;		// This is to use external domain name found into config file
$urlwithroot = \DOL_MAIN_URL_ROOT;
/*
 * Actions
 */
// None
/*
 * View
 */
$head = '';
$arrayofjs = array();
$arrayofcss = array();
$replacemainarea = (empty($conf->dol_hide_leftmenu) ? '<div>' : '') . '<div>';
// Show logo (search order: logo defined by ONLINE_SIGN_LOGO_suffix, then ONLINE_SIGN_LOGO_, then small company logo, large company logo, theme logo, common logo)
// Define logo and logosmall
$logosmall = $mysoc->logo_small;
$logo = $mysoc->logo;
$paramlogo = 'ONLINE_RECRUITMENT_LOGO_' . $suffix;
//print '<!-- Show logo (logosmall='.$logosmall.' logo='.$logo.') -->'."\n";
// Define urllogo
$urllogo = '';
$urllogofull = '';
$results = $object->fetchAll($sortorder, $sortfield, 0, 0, '(status:=:1)');
$now = \dol_now();
$params = array();