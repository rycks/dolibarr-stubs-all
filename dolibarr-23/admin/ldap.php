<?php

$action = \GETPOST('action', 'aZ09');
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$head = \ldap_prepare_head();
$form = new \Form($db);
$formldap = new \FormLdap($db);
// Fields from hook
$parameters = array();
$reshook = $hookmanager->executeHooks('addAdminLdapOptions', $parameters);