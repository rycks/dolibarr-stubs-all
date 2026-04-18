<?php

// Get Parameters
$action = \GETPOST('action', 'aZ09');
// Other parameters HRM_*
$list = array();
// Permissions
$permissiontoread = $user->admin;
$permissiontoadd = $user->admin;
$error = 0;
/*
 * View
 */
$title = $langs->trans('Parameters');
$form = new \Form($db);
// Subheader
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
// Configuration header
$head = \hrm_admin_prepare_head();