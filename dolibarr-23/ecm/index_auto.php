<?php

// Get parameters
$socid = \GETPOSTINT('socid');
$action = \GETPOST('action', 'aZ09');
$section = \GETPOSTINT('section') ? \GETPOSTINT('section') : \GETPOSTINT('section_id');
$module = \GETPOST('module', 'alpha');
$section_dir = \GETPOST('section_dir', 'alpha');
$search_doc_ref = \GETPOST('search_doc_ref', 'alpha');
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$ecmdir = new \EcmDirectory($db);
$result = $ecmdir->fetch($section);
$form = new \Form($db);
$ecmdirstatic = new \EcmDirectory($db);
$userstatic = new \User($db);
$error = 0;
$result = \restrictedArea($user, 'ecm', 0);
$id = $ecmdir->create($user);
$action = 'file_manager';
$ecmdirtmp = new \EcmDirectory($db);
$diroutputslash = \str_replace('\\', '/', $conf->ecm->dir_output);
// Scan directory tree on disk
$disktree = \dol_dir_list($conf->ecm->dir_output, 'directories', 1, '', '^temp$', '', 0, 0);
// Scan directory tree in database
$sqltree = $ecmdirstatic->get_full_arbo(0);
$adirwascreated = 0;
$sql = "UPDATE " . \MAIN_DB_PREFIX . "ecm_directories set cachenbofdoc = -1 WHERE cachenbofdoc < 0";
/*
 *	View
 */
// Define height of file area (depends on $_SESSION["dol_screenheight"])
//print $_SESSION["dol_screenheight"];
$maxheightwin = isset($_SESSION["dol_screenheight"]) && $_SESSION["dol_screenheight"] > 466 ? $_SESSION["dol_screenheight"] - 136 : 660;
// Also into index.php file
$moreheadcss = '';
$moreheadjs = '';
$morejs = array();
// Add sections to manage
$rowspan = 0;
$sectionauto = array();
$parameters = array();
$reshook = $hookmanager->executeHooks('addSectionECMAuto', $parameters);
$head = \ecm_prepare_dasboard_head();
// Toolbar
$url = !empty($conf->use_javascript_ajax) && !\getDolGlobalString('MAIN_ECM_DISABLE_JS') ? '#' : $_SERVER["PHP_SELF"] . '?action=refreshmanual' . ($module ? '&amp;module=' . $module : '') . ($section ? '&amp;section=' . $section : '');
$showonrightsize = '';
// Start right panel
$mode = 'noajax';
$url = \DOL_URL_ROOT . '/ecm/index_auto.php';