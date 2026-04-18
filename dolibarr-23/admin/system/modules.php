<?php

$action = \GETPOST('action', 'aZ09');
$optioncss = \GETPOST('optioncss', 'alpha');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'moduleoverview';
$search_name = \GETPOST("search_name", 'alpha');
$search_id = \GETPOST("search_id", 'alpha');
$search_version = \GETPOST("search_version", 'alpha');
$search_permission = \GETPOST("search_permission", 'alpha');
$page = \GETPOSTINT('page');
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$form = new \Form($db);
$object = new \stdClass();
// Definition of fields for lists
$arrayfields = array('name' => array('label' => $langs->trans("Modules"), 'checked' => '1', 'position' => 10), 'version' => array('label' => $langs->trans("Version"), 'checked' => '1', 'position' => 20), 'id' => array('label' => $langs->trans("IdModule"), 'checked' => '1', 'position' => 30), 'module_position' => array('label' => $langs->trans("Position"), 'checked' => '1', 'position' => 35), 'permission' => array('label' => $langs->trans("IdPermissions"), 'checked' => '1', 'position' => 40));
$arrayfields = \dol_sort_array($arrayfields, 'position');
$param = '';
$info_admin = '';
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
// Load list of modules
$moduleList = array();
$modules = array();
$modules_files = array();
$modules_fullpath = array();
$modulesdir = \dolGetModulesDirs();
$rights_ids = array();
$arrayofpermissions = array();
$mode = '';
$arrayofmassactions = array();
$varpage = empty($contextpage) ? $_SERVER["PHP_SELF"] : $contextpage;
$htmlofselectarray = $form->multiSelectArrayWithCheckbox('selectedfields', $arrayfields, $varpage, \getDolGlobalString('MAIN_CHECKBOX_LEFT_COLUMN'));
// This also change content of $arrayfields with user setup
$selectedfields = $mode != 'kanban' ? $htmlofselectarray : '';
$moreforfilter = '';
// Fields from hook
$parameters = array('arrayfields' => $arrayfields, 'param' => $param, 'sortfield' => $sortfield, 'sortorder' => $sortorder);
$reshook = $hookmanager->executeHooks('printFieldListOption', $parameters);
$old = '';
/**
 * Compare two modules by their ID for a ascending order
 *
 * @param	stdClass 	$a		First module
 * @param	stdClass 	$b		Second module
 * @return	int					Compare result (-1, 0, 1)
 */
function compareIdAsc(\stdClass $a, \stdClass $b)
{
}
/**
 * Compare two modules by their ID for a descending order
 *
 * @param	stdClass 	$a		First module
 * @param	stdClass 	$b		Second module
 * @return	int					Compare result (-1, 0, 1)
 */
function compareIdDesc(\stdClass $a, \stdClass $b)
{
}
/**
 * Compare two modules by their ID for a ascending order
 *
 * @param	stdClass 	$a		First module
 * @param	stdClass 	$b		Second module
 * @return	int					Compare result (-1, 0, 1)
 */
function comparePermissionIdsAsc(\stdClass $a, \stdClass $b)
{
}
/**
 * Compare two modules by their permissions for a descending order
 *
 * @param	stdClass 	$a		First module
 * @param	stdClass 	$b		Second module
 * @return	int					Compare result (-1, 0, 1)
 */
function comparePermissionIdsDesc(\stdClass $a, \stdClass $b)
{
}