<?php

// Parameters
$action = \GETPOST('action', 'aZ09');
$backtopage = \GETPOST('backtopage', 'alpha');
$object = new \stdClass();
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
// Convert action set_XXX and del_XXX to set var (this is used when no javascript on for ajax_constantonoff)
$regs = array();
$csscontent = \GETPOST('WEBPORTAL_CUSTOM_CSS', 'restricthtml');
// Will return a sanitized HTML content (so with double spaes that may be replaced with one, ...
$csscontent = \dol_string_nohtmltag($csscontent, 2, 'UTF-8', 0, 0);
/*
 * View
 */
$title = "WebPortalSetup";
$wikihelp = 'EN:First_setup|FR:Premiers_param&eacute;trages|ES:Primeras_configuraciones';
// Subheader
$linkback = '<a href="' . ($backtopage ? $backtopage : \DOL_URL_ROOT . '/admin/modules.php?restore_lastsearch_values=1') . '">' . $langs->trans("BackToModuleList") . '</a>';
// Configuration header
$head = \webportalAdminPrepareHead();
$customcssValue = \getDolGlobalString('WEBPORTAL_CUSTOM_CSS');
$doleditor = new \DolEditor('WEBPORTAL_CUSTOM_CSS', $customcssValue, '80%', 400, 'Basic', 'In', \true, \false, 'ace', 10, '90%');