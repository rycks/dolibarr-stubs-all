<?php

$error = 0;
$action = \GETPOST('action', 'aZ09');
$result1 = \dolibarr_set_const($db, "DEBUGBAR_LOGS_LINES_NUMBER", \GETPOSTINT('DEBUGBAR_LOGS_LINES_NUMBER'), 'chaine', 0, '', 0);
$result2 = \dolibarr_set_const($db, "DEBUGBAR_USE_LOG_FILE", \GETPOSTINT('DEBUGBAR_USE_LOG_FILE'), 'chaine', 0, '', 0);
$form = new \Form($db);
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';