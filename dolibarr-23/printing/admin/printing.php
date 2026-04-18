<?php

$action = \GETPOST('action', 'aZ09');
$mode = \GETPOST('mode', 'alpha');
$value = \GETPOST('value', 'alpha', 0, \null, \null, 1);
// The value may be __google__docs so we force disable of replace
$varname = \GETPOST('varname', 'alpha');
$driver = \GETPOST('driver', 'alpha');
$OAUTH_SERVICENAME_GOOGLE = 'Google';
/*
 * Action
 */
$error = 0;
$action = '';
$result = \dolibarr_set_const($db, $varname, $value, 'chaine', 0, '', $conf->entity);
$action = '';
/*
 * View
 */
$form = new \Form($db);
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$head = \printingAdminPrepareHead($mode);
$submit_enabled = 0;
$object = new \PrintingDriver($db);
$result = $object->listDrivers($db, 10);