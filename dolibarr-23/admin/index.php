<?php

$action = '';
/*
 * View
 */
$wikihelp = 'EN:First_setup|FR:Premiers_paramétrages|ES:Primeras_configuraciones';
// Show info depending on country if defined
$constkey = 'MAIN_INFO_SETUP_FOR_COUNTRY_' . $mysoc->country_code;
// Define $nbmodulesnotautoenabled - TODO This code is at different places
$nbmodulesnotautoenabled = \count($conf->modules);
$listofmodulesautoenabled = array('user', 'agenda', 'fckeditor', 'export', 'import');
// Add hook to add information
$parameters = array();
$object = new \stdClass();
$reshook = $hookmanager->executeHooks('addHomeSetup', $parameters, $object, $action);