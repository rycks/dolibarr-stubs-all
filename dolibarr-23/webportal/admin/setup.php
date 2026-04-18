<?php

// Parameters
$action = \GETPOST('action', 'aZ09');
$backtopage = \GETPOST('backtopage', 'alpha');
$modulepart = \GETPOST('modulepart', 'aZ09');
// Used by actions_setmoduleoptions.inc.php
$value = \GETPOST('value', 'alpha');
$label = \GETPOST('label', 'alpha');
$scandir = \GETPOST('scan_dir', 'alpha');
$type = 'webportal';
$error = 0;
$setupnotempty = 0;
// Set this to 1 to use the factory to manage constants. Warning, the generated module will be compatible with version v15+ only
$useFormSetup = 1;
$formSetup = new \FormSetup($db);
// Add logged user
//$formSetup->newItem('WEBPORTAL_USER_LOGGED2')->setAsSelectUser();
// only enabled users
$userList = $formSetup->form->select_dolusers(\getDolGlobalInt('WEBPORTAL_USER_LOGGED'), 'WEBPORTAL_USER_LOGGED', 1, \null, 0, '', '', '0', 0, 0, '', 0, '', '', 1, 2);
$item = $formSetup->newItem('WEBPORTAL_USER_LOGGED');
// TODO Add a property mandatory to set style to "fieldrequired" and to add a check in submit
// root url
// @var	FormSetupItem	$item
$item = $formSetup->newItem('WEBPORTAL_ROOT_URL')->setAsString();
$dirmodels = \array_merge(array('/'), (array) $conf->modules_parts['models']);
$moduledir = 'webportal';
$myTmpObjects = array();
$tmpobjectkey = \GETPOST('object', 'aZ09');
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
// Define $urlwithroot
$urlwithouturlroot = \preg_replace('/' . \preg_quote(\DOL_URL_ROOT, '/') . '$/i', '', \trim($dolibarr_main_url_root));
$urlwithroot = $urlwithouturlroot . \DOL_URL_ROOT;