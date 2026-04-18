<?php

$action = \GETPOST('action', 'aZ09');
$value = \GETPOST('value');
$label = \GETPOST('label', 'alpha');
$scandir = \GETPOST('scan_dir', 'alpha');
$type = 'donation';
/*
 * Action
 */
$error = 0;
$modele = \GETPOST('module', 'alpha');
$don = new \Don($db);
// Search template files
$dir = \DOL_DOCUMENT_ROOT . "/core/modules/dons/";
$file = $modele . ".modules.php";
$account = \GETPOST('DONATION_ACCOUNTINGACCOUNT', 'alpha');
$res = \dolibarr_set_const($db, "DONATION_ACCOUNTINGACCOUNT", $account, 'chaine', 0, '', $conf->entity);
$freemessage = \GETPOST('DONATION_MESSAGE', 'restricthtml');
// No alpha here, we want exact string
$res = \dolibarr_set_const($db, "DONATION_MESSAGE", $freemessage, 'chaine', 0, '', $conf->entity);
// Other cases
$reg = array();
$code = $reg[1];
$code = $reg[1];
/*
 * View
 */
$dir = "../../core/modules/dons/";
$form = new \Form($db);
$help_url = '';
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$head = \donation_admin_prepare_head();
// Defined the template definition table
$type = 'donation';
$def = array();
$sql = "SELECT nom";
$resql = $db->query($sql);
$handle = \opendir($dir);
$label = $langs->trans("AccountAccounting");