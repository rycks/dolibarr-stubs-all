<?php

// Parameters
$action = \GETPOST('action', 'aZ09');
$backtopage = \GETPOST('backtopage', 'alpha');
$modulepart = \GETPOST('modulepart', 'aZ09');
$content = \GETPOST('content');
$error = 0;
$setupnotempty = 0;
// Set this to 1 to use the factory to manage constants. Warning, the generated module will be compatible with version v15+ only
$useFormSetup = 1;
$formSetup = new \FormSetup($db);
// List all available IA
$arrayofai = \getListOfAIServices();
// List all available features
$arrayofaifeatures = \getListOfAIFeatures();
$item = $formSetup->newItem('AI_API_SERVICE');
$setupnotempty = +\count($formSetup->items);
$dirmodels = \array_merge(array('/'), (array) $conf->modules_parts['models']);
$action = 'edit';
/*
 * View
 */
$help_url = '';
$title = "AiSetup";
// Subheader
$linkback = '<a href="' . ($backtopage ? $backtopage : \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1])) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
// Configuration header
$head = \aiAdminPrepareHead();
$i = 0;
$i = 0;