<?php

// Parameters
$action = \GETPOST('action', 'aZ09');
$backtopage = \GETPOST('backtopage', 'alpha');
$value = \GETPOST('value', 'alpha');
$label = \GETPOST('label', 'alpha');
$modulepart = \GETPOST('modulepart', 'aZ09');
// Used by actions_setmoduleoptions.inc.php
$scandir = \GETPOST('scan_dir', 'alpha');
$type = 'evaluation';
$arrayofparameters = array('HRM_MAXRANK' => array('type' => 'integer', 'enabled' => 1, 'css' => ''), 'HRM_DEFAULT_SKILL_DESCRIPTION' => array('type' => 'varchar', 'enabled' => 1, 'css' => ''));
$error = 0;
$setupnotempty = 0;
$dirmodels = \array_merge(array('/'), (array) $conf->modules_parts['models']);
$moduledir = 'hrm';
// TODO Scan list of objects to fill this array
$myTmpObjects = ['evaluation' => ['label' => 'Evaluation', 'includerefgeneration' => 1, 'includedocgeneration' => 1, 'class' => 'Evaluation']];
$tmpobjectkey = \GETPOST('object', 'aZ09');
$max_rank = \GETPOSTINT('HRM_MAXRANK');
/*
 * View
 */
$form = new \Form($db);
$help_url = '';
$page_name = "HRMSetup";
// Subheader
$linkback = '<a href="' . ($backtopage ? $backtopage : \DOL_URL_ROOT . '/admin/modules.php?restore_lastsearch_values=1') . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
// Configuration header
$head = \hrmAdminPrepareHead();