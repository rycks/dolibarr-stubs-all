<?php

$action = \GETPOST('action', 'aZ09');
$modulepart = \GETPOST('modulepart', 'aZ09');
$value = \GETPOST('value', 'alpha');
$label = \GETPOST('label', 'alpha');
$scandir = \GETPOST('scan_dir', 'alpha');
$type = 'project';
/*
 * Actions
 */
$error = 0;
$maskconstproject = \GETPOST('maskconstproject', 'aZ09');
$maskproject = \GETPOST('maskproject', 'alpha');
$maskconstmasktask = \GETPOST('maskconsttask', 'aZ09');
$masktaskt = \GETPOST('masktask', 'alpha');
$res = 0;
/*
 * View
 */
$form = new \Form($db);
$dirmodels = \array_merge(array('/'), (array) $conf->modules_parts['models']);
$form = new \Form($db);
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$head = \project_admin_prepare_head();
// Defini tableau def de modele
$type = 'project';
$def = array();
// TODO Replace with $def = getListOfModels($db, $type);
$sql = "SELECT nom";
$resql = $db->query($sql);
$filelist = array();
// Defini tableau def de modele
$type = 'project_task';
$def = array();
$sql = "SELECT nom";
$resql = $db->query($sql);
// Other options
$form = new \Form($db);
$key = 'PROJECT_CLASSIFY_CLOSED_WHEN_ALL_TASKS_DONE';