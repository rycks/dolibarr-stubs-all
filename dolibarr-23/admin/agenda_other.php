<?php

$action = \GETPOST('action', 'aZ09');
$value = \GETPOST('value', 'alpha');
$label = \GETPOST('label', 'alpha');
$modulepart = \GETPOST('modulepart', 'aZ09');
// Used by actions_setmoduleoptions.inc.php
$param = \GETPOST('param', 'alpha');
$cancel = \GETPOST('cancel', 'alpha');
$scandir = \GETPOST('scan_dir', 'alpha');
$type = 'action';
/*
 *	Actions
 */
$error = 0;
$errors = array();
$reg = array();
$code = $reg[1];
$value = \GETPOST($code, 'alpha') ? \GETPOST($code, 'alpha') : 1;
$code = $reg[1];
$getDefaultFilter = \GETPOST('AGENDA_DEFAULT_FILTER_TYPE');
$defaultfilter = \is_array($getDefaultFilter) ? \implode(',', $getDefaultFilter) : $getDefaultFilter;
$defaultValues = new \DefaultValues($db);
$result = $defaultValues->fetchAll('', '', 0, 0, "(t.page:=:'comm/action/card.php') AND (t.param:=:'complete') AND (t.user_id:=:0) AND (t.type:=:'createform') AND (t.entity:=:" . (int) $conf->entity . ")");
$resultCreat = $defaultValues->create($user);
/**
 * View
 */
$form = new \Form($db);
$formactions = new \FormActions($db);
$dirmodels = \array_merge(array('/'), (array) $conf->modules_parts['models']);
$wikihelp = 'EN:Module_Agenda_En|FR:Module_Agenda|ES:Módulo_Agenda|DE:Modul_Terminplanung';
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$head = \agenda_prepare_head();
/*
 *  Miscellaneous
 */
// Define an array def of models
$def = array();
$sql = "SELECT nom";
$resql = $db->query($sql);
$htmltext = $langs->trans("ThisValueCanOverwrittenOnUserLevel", $langs->transnoentitiesnoconv("UserGUISetup"));
$tmplist = array('' => '&nbsp;', 'show_list' => $langs->trans("ViewList"), 'show_month' => $langs->trans("ViewCal"), 'show_week' => $langs->trans("ViewWeek"), 'show_day' => $langs->trans("ViewDay"), 'show_peruser' => $langs->trans("ViewPerUser"));
$defval = 'na';
$defaultValues = new \DefaultValues($db);
$result = $defaultValues->fetchAll('', '', 0, 0, "(t.page:=:'comm/action/card.php') AND (t.param:=:'complete') AND (t.user_id:=:0) AND (t.type:=:'createform') AND (t.entity:=:" . (int) $conf->entity . ")");
$multiselect = 0;