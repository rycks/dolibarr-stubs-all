<?php

\define('CSRFCHECK_WITH_TOKEN', '1');
$id = \GETPOSTINT('id');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$module = \GETPOST('module', 'alpha');
$rights = \GETPOSTINT('rights');
$updatedmodulename = \GETPOST('updatedmodulename', 'alpha');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'groupperms';
// Define if user can read permissions
$permissiontoread = $user->admin || $user->hasRight("user", "user", "read");
// Define if user can modify group permissions
$permissiontoedit = $user->admin || $user->hasRight("user", "user", "write");
// Advanced permissions
$advancedpermsactive = \false;
// Security check
$socid = 0;
$object = new \UserGroup($db);
$entity = $conf->entity;
/*
 * Actions
 */
$parameters = array('socid' => $socid);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$formother = new \FormOther($db);
$title = $object->name . " - " . $langs->trans('Permissions');
$help_url = '';
$head = \group_prepare_head($object);
$title = $langs->trans("Group");
// Charge les modules soumis a permissions
$modules = array();
$modulesdir = \dolGetModulesDirs();
// Read permissions of group
$permsgroupbyentity = array();
$sql = "SELECT DISTINCT r.id, r.libelle, r.module, r.perms, r.subperms, r.module_position, r.family, r.family_position, gr.entity";
$result = $db->query($sql);
/*
 * Part to add/remove permissions
 */
$linkback = '<a href="' . \DOL_URL_ROOT . '/user/group/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
// Common attributes
$keyforbreak = '';
$s = $langs->trans("WarningOnlyPermissionOfActivatedModules") . " " . $langs->trans("YouCanEnableModulesFrom");
$parameters = array();
$reshook = $hookmanager->executeHooks('insertExtraHeader', $parameters, $object, $action);
// Get list of all permissions
$sql = "SELECT r.id, r.libelle as label, r.module, r.perms, r.subperms, r.module_position, r.bydefault, r.family, r.family_position";
$familyinfo = array('hr' => array('position' => '001', 'label' => $langs->trans("ModuleFamilyHr")), 'crm' => array('position' => '006', 'label' => $langs->trans("ModuleFamilyCrm")), 'srm' => array('position' => '007', 'label' => $langs->trans("ModuleFamilySrm")), 'financial' => array('position' => '009', 'label' => $langs->trans("ModuleFamilyFinancial")), 'products' => array('position' => '012', 'label' => $langs->trans("ModuleFamilyProducts")), 'projects' => array('position' => '015', 'label' => $langs->trans("ModuleFamilyProjects")), 'ecm' => array('position' => '018', 'label' => $langs->trans("ModuleFamilyECM")), 'technic' => array('position' => '021', 'label' => $langs->trans("ModuleFamilyTechnic")), 'portal' => array('position' => '040', 'label' => $langs->trans("ModuleFamilyPortal")), 'interface' => array('position' => '050', 'label' => $langs->trans("ModuleFamilyInterface")), 'base' => array('position' => '060', 'label' => $langs->trans("ModuleFamilyBase")), 'other' => array('position' => '100', 'label' => $langs->trans("ModuleFamilyOther")));
$arrayofpermission = array();
$cookietohidegroup = empty($_COOKIE["DOLUSER_PERMS_HIDE_GRP"]) ? '' : \preg_replace('/^,/', '', $_COOKIE["DOLUSER_PERMS_HIDE_GRP"]);
$cookietohidegrouparray = \explode(',', $cookietohidegroup);
$result = $db->query($sql);
$arrayofpermission = \dol_sort_array($arrayofpermission, 'position');
$j = 0;
$oldmod = '';
$parameters = array();
$reshook = $hookmanager->executeHooks('insertExtraFooter', $parameters, $object, $action);