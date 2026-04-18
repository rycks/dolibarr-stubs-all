<?php

$actionsave = \GETPOST("save", 'alphanohtml');
$i = 0;
/*
 *	View
 */
$help_url = '';
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
// Configuration header
$head = \cronadmin_prepare_head();
$disabled = '';
$constname = 'CRON_KEY';