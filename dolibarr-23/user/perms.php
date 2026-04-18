<?php

\define('CSRFCHECK_WITH_TOKEN', '1');
$id = \GETPOSTINT('id');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$module = \GETPOST('module', 'alpha');
$rights = \GETPOSTINT('rights');
$updatedmodulename = \GETPOST('updatedmodulename', 'alpha');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'userperms';
// Define if user can read permissions
$canreaduser = $user->admin || $user->hasRight("user", "user", "read");
// Define if user can modify other users and permissions
$caneditperms = $user->admin || $user->hasRight("user", "user", "write");
// Security check
$socid = 0;
$feature2 = $socid && $user->hasRight("user", "self", "write") ? '' : 'user';
$result = \restrictedArea($user, 'user', $id, 'user&user', $feature2);
$object = new \User($db);
$entity = $conf->entity;
/*
 * Actions
 */
$parameters = array('socid' => $socid);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
// Search all modules with permission and reload permissions def.
$modules = array();
$modulesdir = \dolGetModulesDirs();
// Fix bad value for module_position in table
// ------------------------------------------
$sql = "SELECT r.id, r.libelle as label, r.module, r.perms, r.subperms, r.module_position, r.family, r.family_position, r.bydefault";
$result = $db->query($sql);
/*
 *	View
 */
$form = new \Form($db);
$person_name = !empty($object->firstname) ? $object->lastname . ", " . $object->firstname : $object->lastname;
$title = $person_name . " - " . $langs->trans('Permissions');
$help_url = '';
$head = \user_prepare_head($object);
$title = $langs->trans("User");
// Read permissions of edited user
$permsuser = array();
$sql = "SELECT ur.fk_id";
$result = $db->query($sql);
// Read the permissions of a user inherited by its groups
$permsgroupbyentity = array();
$sql = "SELECT DISTINCT gr.fk_id, gu.entity";
$result = $db->query($sql);
/*
 * Part to add/remove permissions
 */
$linkback = '';
$morehtmlref = '<a href="' . \DOL_URL_ROOT . '/user/vcard.php?id=' . $object->id . '&output=file&file=' . \urlencode(\dol_sanitizeFileName($object->getFullName($langs) . '.vcf')) . '" class="refid valignmiddle" rel="noopener">';
$urltovirtualcard = '/user/virtualcard.php?id=' . (int) $object->id;
$text = $langs->trans("Type");
$type = $langs->trans("Internal");
$s = $langs->trans("WarningOnlyPermissionOfActivatedModules") . " " . $langs->trans("YouCanEnableModulesFrom");
$parameters = array('permsgroupbyentity' => $permsgroupbyentity);
$reshook = $hookmanager->executeHooks('insertExtraHeader', $parameters, $object, $action);
// Get list of all permissions
$sql = "SELECT r.id, r.libelle as label, r.module, r.perms, r.subperms, r.module_position, r.bydefault, r.family, r.family_position";
$familyinfo = array('hr' => array('position' => '001', 'label' => $langs->trans("ModuleFamilyHr")), 'crm' => array('position' => '006', 'label' => $langs->trans("ModuleFamilyCrm")), 'srm' => array('position' => '007', 'label' => $langs->trans("ModuleFamilySrm")), 'financial' => array('position' => '009', 'label' => $langs->trans("ModuleFamilyFinancial")), 'products' => array('position' => '012', 'label' => $langs->trans("ModuleFamilyProducts")), 'projects' => array('position' => '015', 'label' => $langs->trans("ModuleFamilyProjects")), 'ecm' => array('position' => '018', 'label' => $langs->trans("ModuleFamilyECM")), 'technic' => array('position' => '021', 'label' => $langs->trans("ModuleFamilyTechnic")), 'portal' => array('position' => '040', 'label' => $langs->trans("ModuleFamilyPortal")), 'interface' => array('position' => '050', 'label' => $langs->trans("ModuleFamilyInterface")), 'base' => array('position' => '060', 'label' => $langs->trans("ModuleFamilyBase")), 'other' => array('position' => '100', 'label' => $langs->trans("ModuleFamilyOther")), 'external' => array('position' => '500', 'label' => 'External'));
$arrayofpermission = array();
$cookietohidegroup = empty($_COOKIE["DOLUSER_PERMS_HIDE_GRP"]) ? '' : \preg_replace('/^,/', '', $_COOKIE["DOLUSER_PERMS_HIDE_GRP"]);
$cookietohidegrouparray = \explode(',', $cookietohidegroup);
$result = $db->query($sql);
$arrayofpermission = \dol_sort_array($arrayofpermission, 'position');
$j = 0;
$oldmod = '';
$parameters = array();
$reshook = $hookmanager->executeHooks('insertExtraFooter', $parameters, $object, $action);