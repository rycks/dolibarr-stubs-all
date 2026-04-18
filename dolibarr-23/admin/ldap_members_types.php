<?php

$action = \GETPOST('action', 'aZ09');
$error = 0;
// This one must be after the others
$valkey = '';
$key = \GETPOST("key");
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$head = \ldap_prepare_head();
$form = new \Form($db);