<?php

$id = \GETPOSTINT('id');
$action = \GETPOST('action', 'aZ09');
$contextpage = \GETPOST('contextpage', 'aZ') ?: 'userldap';
// To manage different context of search
// Security check
$socid = 0;
$feature2 = $socid && $user->hasRight('user', 'self', 'creer') ? '' : 'user';
$result = \restrictedArea($user, 'user', $id, 'user&user', $feature2);
$object = new \User($db);
/*
 * Actions
 */
$parameters = array('id' => $socid);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$person_name = !empty($object->firstname) ? $object->lastname . ", " . $object->firstname : $object->lastname;
$title = $person_name . " - " . $langs->trans('LDAP');
$help_url = '';
$head = \user_prepare_head($object);
$title = $langs->trans("User");
$linkback = '';
$ldap = new \Ldap();
$result = $ldap->connectBind();
$userSID = '';
// Lecture LDAP
$ldap = new \Ldap();
$result = $ldap->connectBind();
$info = $object->_load_ldap_info();
$dn = $object->_load_ldap_dn($info, 1);
$search = "(" . $object->_load_ldap_dn($info, 2) . ")";
$records = $ldap->getAttribute($dn, $search);