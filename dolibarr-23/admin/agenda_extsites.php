<?php

$def = array();
$action = \GETPOST('action', 'alpha');
$MAXAGENDA = \getDolGlobalString('AGENDA_EXT_NB');
// List of available colors
$colorlist = array('BECEDD', 'DDBECE', 'BFDDBE', 'F598B4', 'F68654', 'CBF654', 'A4A4A5');
$reg = array();
/*
 * Actions
 */
$error = 0;
$errors = array();
$code = $reg[1];
$value = \GETPOST($code) ? \GETPOST($code) : 1;
$res = \dolibarr_set_const($db, $code, $value, 'chaine', 0, '', $conf->entity);
/*
 * View
 */
$form = new \Form($db);
$formadmin = new \FormAdmin($db);
$formother = new \FormOther($db);
$arrayofjs = array();
$arrayofcss = array();
$wikihelp = 'EN:Module_Agenda_En|FR:Module_Agenda|ES:Módulo_Agenda|DE:Modul_Terminplanung';
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$head = \agenda_prepare_head();
$selectedvalue = \getDolGlobalInt('AGENDA_DISABLE_EXT');
$i = 1;