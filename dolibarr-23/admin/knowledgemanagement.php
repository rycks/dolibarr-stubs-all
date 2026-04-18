<?php

// Parameters
$action = \GETPOST('action', 'aZ09');
$backtopage = \GETPOST('backtopage', 'alpha');
$value = \GETPOST('value', 'alpha');
$modulepart = \GETPOST('modulepart', 'aZ09');
// Used by actions_setmoduleoptions.inc.php
$label = \GETPOST('label', 'alpha');
$scandir = \GETPOST('scan_dir', 'alpha');
$type = 'knowledgemanagement';
$arrayofparameters = array();
$error = 0;
$setupnotempty = 0;
$moduledir = 'knowledgemanagement';
$myTmpObjects = array();
$tmpobjectkey = \GETPOST('object', 'aZ09');
$maskconst = \GETPOST('maskconst', 'aZ09');
$maskdata = \GETPOST('maskKnowledgeRecord', 'alpha');
/*
 * View
 */
$form = new \Form($db);
$dirmodels = \array_merge(array('/'), (array) $conf->modules_parts['models']);
$page_name = "KnowledgeManagementSetup";
// Subheader
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
// Configuration header
$head = \knowledgemanagementAdminPrepareHead();