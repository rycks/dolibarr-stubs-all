<?php

// Get parameters
$socid = \GETPOSTINT('socid');
$action = \GETPOST('action', 'aZ09');
$section = \GETPOSTINT('section') ? \GETPOSTINT('section') : \GETPOSTINT('section_id');
$section_dir = \GETPOST('section_dir', 'alpha');
$overwritefile = \GETPOSTINT('overwritefile');
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
$permissiontoread = $user->hasRight('ecm', 'read');
$permissiontocreate = $user->hasRight('ecm', 'upload');
$permissiontocreatedir = $user->hasRight('ecm', 'setup');
$permissiontodelete = $user->hasRight('ecm', 'upload');
$permissiontodeletedir = $user->hasRight('ecm', 'setup');
/*
 *	Actions
 */
// TODO Replace sendit and confirm_deletefile with
//$backtopage = $_SERVER["PHP_SELF"].'?file_manager=1&website='.$websitekey.'&pageid='.$pageid;	// used after a confirm_deletefile into actions_linkedfiles.inc.php
//include DOL_DOCUMENT_ROOT.'/core/actions_linkedfiles.inc.php';
$relativepath = '';
$upload_dir = $conf->ecm->dir_output . '/' . $relativepath;
$userfiles = [];
$action = 'file_manager';
$id = $ecmdir->create($user);
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
// Also into index_auto.php file
$morejs = array();
$head = \ecm_prepare_dasboard_head();
// Add filemanager component
$module = 'ecm';