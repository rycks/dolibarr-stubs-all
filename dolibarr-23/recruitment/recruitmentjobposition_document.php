<?php

$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm');
$id = \GETPOSTINT('socid') ? \GETPOSTINT('socid') : \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
// Get parameters
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
//if (! $sortfield) $sortfield="position_name";
// Initialize a technical objects
$object = new \RecruitmentJobPosition($db);
$extrafields = new \ExtraFields($db);
$diroutputmassaction = $conf->recruitment->dir_output . '/temp/massgeneration/' . $user->id;
// Must be 'include', not 'include_once'. Include fetch and fetch_thirdparty but not fetch_optionals
$upload_dir = \null;
// Security check - Protection if external user
//if ($user->socid > 0) accessforbidden();
//if ($user->socid > 0) $socid = $user->socid;
$isdraft = $object->status == $object::STATUS_DRAFT ? 1 : 0;
$result = \restrictedArea($user, 'recruitment', $object->id, 'recruitment_recruitmentjobposition', 'recruitmentjobposition', '', 'rowid', $isdraft);
$permissiontoadd = $user->hasRight('recruitment', 'recruitmentjobposition', 'write');
/*
 * View
 */
$form = new \Form($db);
$title = $object->ref . " - " . $langs->trans('Files');
$help_url = '';
/*
 * Show tabs
 */
$head = \recruitmentjobpositionPrepareHead($object);
// Build file list
$filearray = \dol_dir_list($upload_dir, "files", 0, '', '(\\.meta|_preview.*\\.png)$', $sortfield, \strtolower($sortorder) == 'desc' ? \SORT_DESC : \SORT_ASC, 1);
$totalsize = 0;
// Object card
// ------------------------------------------------------------
$linkback = '<a href="' . \dol_buildpath('/recruitment/recruitmentjobposition_list.php', 1) . '?restore_lastsearch_values=1' . (!empty($socid) ? '&socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
$modulepart = 'recruitment';
$permissiontoadd = $user->hasRight('recruitment', 'recruitmentjobposition', 'write');
$permtoedit = $user->hasRight('recruitment', 'recruitmentjobposition', 'write');
$param = '&id=' . $object->id;
$relativepathwithnofile = 'recruitmentjobposition/' . \dol_sanitizeFileName($object->ref) . '/';
$savingdocmask = \dol_sanitizeFileName($object->ref) . '-__file__';