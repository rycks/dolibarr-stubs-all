<?php

$id = \GETPOSTINT('id');
$action = \GETPOST('action', 'aZ09');
$socid = 0;
$object = new \UserGroup($db);
$permissiontoread = \true;
$ldap = new \Ldap();
$result = $ldap->connectBind();
/*
 *	View
 */
$form = new \Form($db);
$title = $object->name . " - " . $langs->trans('LDAP');
$help_url = '';
$head = \group_prepare_head($object);
$linkback = '<a href="' . \DOL_URL_ROOT . '/user/group/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
// Lecture LDAP
$ldap = new \Ldap();
$result = $ldap->connectBind();
$info = $object->_load_ldap_info();
$dn = $object->_load_ldap_dn($info, 1);
$search = "(" . $object->_load_ldap_dn($info, 2) . ")";
$records = $ldap->getAttribute($dn, $search);