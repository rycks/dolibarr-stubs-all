<?php

// We force security except to disable modules so we can do it if a problem occurs on a module
\define('CSRFCHECK_WITH_TOKEN', '1');
$action = \GETPOST('action', 'aZ09');
$page = \GETPOSTINT('page');
$page_y = \GETPOSTINT('page_y');
$optioncss = \GETPOST('optioncss', 'aZ09');
$sortfield = \GETPOST('sortfield', 'aZ09');
$sortorder = \GETPOST('sortorder', 'aZ09');
$mode = \GETPOST('mode', 'alpha');
$value = \GETPOST('value', 'alpha');
$search_keyword = \GETPOST('search_keyword', 'alpha');
$search_status = \GETPOST('search_status', 'alpha');
$search_nature = \GETPOST('search_nature', 'alpha');
$search_version = \GETPOST('search_version', 'alpha');
// For remotestore search
$options = array();
$familyinfo = array('hr' => array('position' => '001', 'label' => $langs->trans("ModuleFamilyHr")), 'crm' => array('position' => '006', 'label' => $langs->trans("ModuleFamilyCrm")), 'srm' => array('position' => '007', 'label' => $langs->trans("ModuleFamilySrm")), 'financial' => array('position' => '009', 'label' => $langs->trans("ModuleFamilyFinancial")), 'products' => array('position' => '012', 'label' => $langs->trans("ModuleFamilyProducts")), 'projects' => array('position' => '015', 'label' => $langs->trans("ModuleFamilyProjects")), 'ecm' => array('position' => '018', 'label' => $langs->trans("ModuleFamilyECM")), 'technic' => array('position' => '021', 'label' => $langs->trans("ModuleFamilyTechnic")), 'portal' => array('position' => '040', 'label' => $langs->trans("ModuleFamilyPortal")), 'interface' => array('position' => '050', 'label' => $langs->trans("ModuleFamilyInterface")), 'base' => array('position' => '060', 'label' => $langs->trans("ModuleFamilyBase")), 'other' => array('position' => '100', 'label' => $langs->trans("ModuleFamilyOther")));
$param = '';
$dirins = \DOL_DOCUMENT_ROOT . '/custom';
$urldolibarrmodules = 'https://www.dolistore.com/';
// Increase limit of time. Works only if we are not in safe mode
$max_execution_time_for_deploy = \getDolGlobalInt('MODULE_UPLOAD_MAX_EXECUTION_TIME', 300);
// Other method - TODO is this required ?
$max_time = @\ini_get("max_execution_time");
$dolibarrdataroot = \preg_replace('/([\\/]+)$/i', '', \DOL_DATA_ROOT);
$allowonlineinstall = \true;
$allowfromweb = 1;
$debug = \false;
$remotestore = new \ExternalModules($debug);
$object = new \stdClass();
$now = \dol_now();
/*
 * Actions
 */
$formconfirm = '';
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$mode = \GETPOST('mode', 'alpha');
$error = 0;
$modulenameval = '';
// $original_file should match format module_modulename-x.y[.z].zip
$tmpfile = $_FILES['fileinstall']['tmp_name'];
$original_file = \basename($_FILES["fileinstall"]["name"]);
$original_file = \preg_replace('/\\s*\\(\\d+\\)\\.zip$/i', '.zip', $original_file);
$newfile = \dol_sanitizePathName($conf->admin->dir_temp . '/' . $original_file . '/' . $original_file);
// Add event purge
$securityevent = new \Events($db);
$resultcreateevent = $securityevent->create($user);
// We made some check against evil eternal modules that try to low security options.
$checkOldValue = \getDolGlobalInt('CHECKLASTVERSION_EXTERNALMODULE');
$csrfCheckOldValue = \getDolGlobalInt('MAIN_SECURITY_CSRF_WITH_TOKEN');
$resarray = \activateModule($value);
/*
 * View
 */
$form = new \Form($db);
$morejs = array();
$morecss = array("/admin/remotestore/css/store.css");
$dirins_ok = \dol_is_dir($dirins);
$help_url = 'EN:First_setup|FR:Premiers_paramétrages|ES:Primeras_configuraciones';
// Search modules dirs
$modulesdir = \dolGetModulesDirs();
$arrayofnatures = array('core' => array('label' => $langs->transnoentitiesnoconv("NativeModules")), 'external' => array('label' => $langs->transnoentitiesnoconv("External") . ' - [' . $langs->trans("AllPublishers") . ']'));
$arrayofwarnings = array();
// Array of warning each module want to show when activated
$arrayofwarningsext = array();
// Array of warning each module want to show when we activate an external module
$filename = array();
$modules = array();
$orders = array();
$categ = array();
//$publisherlogoarray = array();
$i = 0;
// is a sequencer of modules found
$j = 0;
// j is module number. Automatically affected if module number not defined.
$modNameLoaded = array();
//var_dump($orders);
//var_dump($categ);
//var_dump($modules);
$nbofactivatedmodules = \count($conf->modules);
// Define $nbmodulesnotautoenabled - TODO This code is at different places
$nbmodulesnotautoenabled = \count($conf->modules);
$listofmodulesautoenabled = array('user', 'agenda', 'fckeditor', 'export', 'import');
// Start to show page
$deschelp = '';
$desc = $langs->trans("ModulesDesc", '{picto}');
$desc = \str_replace('{picto}', \img_picto('', 'switch_off', 'class="size15x"'), $desc);
$desc = \str_replace('{picto2}', \img_picto('', 'setup', 'class="size15x"'), $desc);
$head = \modules_prepare_head($nbofactivatedmodules, \count($modules), $nbmodulesnotautoenabled);
$moreforfilter = '<div class="valignmiddle">';
$array_status = array('active' => $langs->transnoentitiesnoconv("Enabled"), 'disabled' => $langs->transnoentitiesnoconv("Disabled"));
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldPreListTitle', $parameters, $object, $action);
$moreforfilter = '';
$object = new \stdClass();
$parameters = array();
$reshook = $hookmanager->executeHooks('insertExtraHeader', $parameters, $object, $action);
$disabled_modules = array();
// Show list of modules
$oldfamily = '';
$foundoneexternalmodulewithupdate = 0;
$linenum = 0;
$atleastonequalified = 0;
$atleastoneforfamily = 0;
$url = 'https://www.dolistore.com';
$url = 'https://github.com/Dolibarr/dolibarr-community-modules';
$fullurl = '<a href="' . $urldolibarrmodules . '" target="_blank" rel="noopener noreferrer">' . $urldolibarrmodules . '</a>';
$message = '';
$url = 'https://partners.dolibarr.org';