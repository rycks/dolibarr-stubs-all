<?php

$action = \GETPOST('action', 'aZ09');
$value = \GETPOST('value', 'alpha');
$label = \GETPOST('label', 'alpha');
$modulepart = \GETPOST('modulepart', 'aZ09');
// Used by actions_setmoduleoptions.inc.php
$param = \GETPOST('param', 'alpha');
$cancel = \GETPOST('cancel', 'alpha');
$scandir = \GETPOST('scandir', 'alpha');
$type = 'action';
$form = new \Form($db);
$code = $reg[1];
$value = \GETPOST($code, 'alpha') ? \GETPOST($code, 'alpha') : 1;
$code = $reg[1];
/**
 * View
 */
$formactions = new \FormActions($db);
$dirmodels = \array_merge(array('/'), (array) $conf->modules_parts['models']);
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$head = \agenda_prepare_head();
$job = new \Cronjob($db);