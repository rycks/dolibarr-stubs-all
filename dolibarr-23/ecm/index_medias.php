<?php

// Get parameters
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$backtopage = \GETPOST('backtopage', 'alpha');
$socid = \GETPOSTINT('socid');
$file_manager = \GETPOST('file_manager', 'alpha');
$section = \GETPOSTINT('section') ? \GETPOSTINT('section') : \GETPOSTINT('section_id');
$section_dir = \GETPOST('section_dir', 'alpha');
$overwritefile = \GETPOSTINT('overwritefile');
$pageid = \GETPOSTINT('pageid');
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
$permissiontoread = $user->hasRight('ecm', 'read') || $user->hasRight('mailing', 'lire') || $user->hasRight('website', 'read');
$permissiontouploadfile = $user->hasRight('ecm', 'setup') || $user->hasRight('mailing', 'creer') || $user->hasRight('website', 'write');
$permissiontoadd = $permissiontouploadfile;
// Used by the include of actions_addupdatedelete.inc.php and actions_linkedfiles
$diroutput = $conf->medias->multidir_output[$conf->entity];
$relativepath = $section_dir;
$upload_dir = \preg_replace('/\\/$/', '', $diroutput) . '/' . \preg_replace('/^\\//', '', $relativepath);
$websitekey = '';
/*
 *	Actions
 */
$savbacktopage = $backtopage;
$backtopage = $_SERVER["PHP_SELF"] . '?file_manager=1&website=' . \urlencode((string) $websitekey) . '&pageid=' . \urlencode((string) $pageid) . (\GETPOST('section_dir', 'alpha') ? '&section_dir=' . \urlencode((string) \GETPOST('section_dir', 'alpha')) : '');
// This manage 'sendit', 'confirm_deletefile', 'renamefile' action when submitting new file.
$backtopage = $savbacktopage;
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
$moreheadcss = '';
$moreheadjs = '';
$morejs = array();
$head = \ecm_prepare_dasboard_head();
// Add filemanager component
$module = 'medias';