<?php

// Parameters
$action = \GETPOST('action', 'aZ09');
$backtopage = \GETPOST('backtopage', 'alpha');
$modulepart = \GETPOST('modulepart', 'aZ09');
// Used by actions_setmoduleoptions.inc.php
$value = \GETPOST('value', 'alpha');
$label = \GETPOST('label', 'alpha');
$scandir = \GETPOST('scan_dir', 'alpha');
$error = 0;
$setupnotempty = 0;
// Set this to 1 to use the factory to manage constants. Warning, the generated module will be compatible with version v15+ only
$useFormSetup = 1;
$formSetup = new \FormSetup($db);
$webPortalTheme = new \WebPortalTheme();
// Setup conf for secondary color
$item = $formSetup->newItem('WEBPORTAL_PRIMARY_COLOR');
// Login theme
$options = ['default' => ['id' => 'default-login-theme', 'label' => '<img src="' . \DOL_URL_ROOT . '/public/webportal/img/login-tpl/default.svg" alt="' . \dolPrintHTMLForAttribute($langs->trans('UseDefaultLoginForm')) . '" />', 'labelIsHtml' => \true], 'right' => ['id' => 'right-login-theme', 'label' => '<img src="' . \DOL_URL_ROOT . '/public/webportal/img/login-tpl/right.svg" alt="' . \dolPrintHTMLForAttribute($langs->trans('UseRightLoginForm')) . '" />', 'labelIsHtml' => \true]];
$item = $formSetup->newItem('WEBPORTAL_LOGIN_FORM_THEME')->setAsRadio($options);
// Logo URL
$item = $formSetup->newItem('WEBPORTAL_LOGIN_LOGO_URL');
$item = $formSetup->newItem('WEBPORTAL_MENU_LOGO_URL');
// Background URL
$item = $formSetup->newItem('WEBPORTAL_LOGIN_BACKGROUND');
$item = $formSetup->newItem('WEBPORTAL_BANNER_BACKGROUND');
$item = $formSetup->newItem('WEBPORTAL_BANNER_BACKGROUND_IS_DARK')->setAsYesNo();
/*
 * View
 */
$form = new \Form($db);
$help_url = '';
$title = "WebPortalSetup";
// Subheader
$linkback = '<a href="' . ($backtopage ? $backtopage : \DOL_URL_ROOT . '/admin/modules.php?restore_lastsearch_values=1') . '">' . $langs->trans("BackToModuleList") . '</a>';
// Configuration header
$head = \webportalAdminPrepareHead();