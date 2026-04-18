<?php

// Parameters
$action = \GETPOST('action', 'aZ09');
$backtopage = \GETPOST('backtopage', 'alpha');
$modulepart = \GETPOST('modulepart', 'aZ09');
// Used by actions_setmoduleoptions.inc.php
$value = \GETPOST('value', 'alpha');
$label = \GETPOST('label', 'alpha');
$scandir = \GETPOST('scan_dir', 'alpha');
$type = 'myobject';
$error = 0;
$setupnotempty = 0;
// Set this to 1 to use the factory to manage constants. Warning, the generated module will be compatible with version v15+ only
$useFormSetup = 1;
$formSetup = new \FormSetup($db);
// Setup conf BOOKCAL_PUBLIC_INTERFACE_TOPIC
$item = $formSetup->newItem('BOOKCAL_PUBLIC_INTERFACE_TOPIC');
$setupnotempty = +\count($formSetup->items);
$dirmodels = \array_merge(array('/'), (array) $conf->modules_parts['models']);
$maskconst = \GETPOST('maskconst', 'aZ09');
$maskvalue = \GETPOST('maskvalue', 'alpha');
/*
 * View
 */
$form = new \Form($db);
$help_url = '';
$page_name = "BookCalSetup";
$title = $langs->trans($page_name);
// Subheader
$linkback = '<a href="' . ($backtopage ? $backtopage : \DOL_URL_ROOT . '/admin/modules.php?restore_lastsearch_values=1') . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
// Configuration header
$head = \bookcalAdminPrepareHead();