<?php

$error = 0;
// Permissions
$permissiontoread = $user->admin;
$permissiontoadd = $user->admin;
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
/*
 * Actions
 */
// None
/*
 * View
 */
$form = new \Form($db);
$establishmenttmp = new \Establishment($db);
$title = $langs->trans('Establishments');
// Subheader
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
// Configuration header
$head = \hrmAdminPrepareHead();
$param = '';
$sql = "SELECT e.rowid, e.rowid as ref, e.label, e.address, e.zip, e.town, e.status";
// Count total nb of records
$nbtotalofrecords = '';
$resql = $db->query($sql);
$nbtotalofrecords = $db->num_rows($resql);
$newcardbutton = '';
$result = $db->query($sql);
$num = $db->num_rows($result);
$i = 0;