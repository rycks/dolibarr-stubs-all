<?php

$action = \GETPOST('action', 'aZ09');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'adminaccoutant';
$error = 0;
/*
 * Actions
 */
// Nothing
/*
 * View
 */
$title = $langs->trans("ConfigAccountingExpert");
$help_url = '';
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$texttoshow = $langs->trans("AccountancySetupDoneFromAccountancyMenu", '{s1}' . $langs->transnoentitiesnoconv("Accounting") . ' - ' . $langs->transnoentitiesnoconv("Setup") . '{s2}');
$texttoshow = \str_replace('{s1}', '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/accountancy/index.php', ['mainmenu' => 'accountancy', 'leftmenu' => 'accountancy_admin', 'showtuto' => 1]) . '">', $texttoshow);
$texttoshow = \str_replace('{s2}', '</a>' . \img_picto("", "url", 'class="paddingleft"'), $texttoshow);