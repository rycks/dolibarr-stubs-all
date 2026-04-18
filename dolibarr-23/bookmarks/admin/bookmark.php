<?php

$action = \GETPOST('action', 'aZ09');
/*
 * Actions
 */
$error = 0;
$showmenu = \GETPOST('BOOKMARKS_SHOW_IN_MENU', 'alpha');
$res = \dolibarr_set_const($db, "BOOKMARKS_SHOW_IN_MENU", $showmenu, 'chaine', 0, '', $conf->entity);
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';