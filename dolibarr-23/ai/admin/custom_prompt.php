<?php

$arrayofaifeatures = \getListOfAIFeatures();
$arrayofai = \getListOfAIServices();
// Parameters
$action = \GETPOST('action', 'aZ09');
$backtopage = \GETPOST('backtopage', 'alpha');
$cancel = \GETPOST('cancel', 'alpha');
$modulepart = \GETPOST('modulepart', 'aZ09');
// Used by actions_setmoduleoptions.inc.php
$functioncode = \GETPOST('functioncode', 'alpha');
$pre_prompt = \GETPOST('prePrompt');
$post_prompt = \GETPOST('postPrompt');
$blacklists = \GETPOST('blacklists');
$test = \GETPOST('test');
$key = (string) \GETPOST('key', 'alpha');
$error = 0;
$setupnotempty = 0;
// Set this to 1 to use the factory to manage constants. Warning, the generated module will be compatible with version v15+ only
$useFormSetup = 1;
$formSetup = new \FormSetup($db);
$aiservice = \getDolGlobalString('AI_API_SERVICE', 'chatgpt');
$dirmodels = \array_merge(array('/'), (array) $conf->modules_parts['models']);
/*
 * Actions
 */
// get all configs in const AI
$currentConfigurationsJson = \getDolGlobalString('AI_CONFIGURATIONS_PROMPT');
$currentConfigurations = \json_decode($currentConfigurationsJson, \true);
$error = 0;
$blacklistArray = \array_filter(\array_map('trim', \explode(',', $blacklists)));
$newConfigurationsJson = \json_encode($currentConfigurations, \JSON_UNESCAPED_UNICODE);
$result = \dolibarr_set_const($db, 'AI_CONFIGURATIONS_PROMPT', $newConfigurationsJson, 'chaine', 0, '', $conf->entity);
$action = 'edit';
$blacklistArray = \array_filter(\array_map('trim', \explode(',', $blacklists)));
$newConfigurationsJson = \json_encode($currentConfigurations, \JSON_UNESCAPED_UNICODE);
$result = \dolibarr_set_const($db, 'AI_CONFIGURATIONS_PROMPT', $newConfigurationsJson, 'chaine', 0, '', $conf->entity);
/*
 * View
 */
$form = new \Form($db);
$formai = new \FormAI($db);
$help_url = '';
$title = "AiSetup";
// Subheader
$linkback = '<a href="' . ($backtopage ? $backtopage : \DOL_URL_ROOT . '/admin/modules.php?restore_lastsearch_values=1') . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
// Configuration header
$head = \aiAdminPrepareHead();
$newcardbutton = \dolGetButtonTitle($langs->trans('NewCustomPrompt'), '', 'fa fa-plus-circle', $_SERVER["PHP_SELF"] . '?action=create', '', 1);
$out = '';