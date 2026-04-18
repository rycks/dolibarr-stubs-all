<?php

$action = \GETPOST('action', 'aZ09');
$testsubscribeemail = \GETPOST("testsubscribeemail");
$testunsubscribeemail = \GETPOST("testunsubscribeemail");
$error = 0;
$tmparray = \GETPOST('constname', 'array');
$tmpvalue = \GETPOST('constvalue', 'array');
$tmpnote = \GETPOST('constnote', 'array');
$result = \dolibarr_set_const($db, \GETPOST("name", 'aZ09'), \GETPOST("value"), '', 0, '', $conf->entity);
$result = \dolibarr_del_const($db, \GETPOST("name", 'aZ09'), $conf->entity);
$email = \GETPOST($action . 'email');
/*
 * View
 */
$help_url = '';
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$head = \mailmanspip_admin_prepare_head();