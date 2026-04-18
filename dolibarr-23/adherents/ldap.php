<?php

$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alphanohtml');
$action = \GETPOST('action', 'aZ09');
// Protection
$socid = 0;
$object = new \Adherent($db);
// Load member
$result = $object->fetch($id, $ref);
// Define variables to know what current user can do on users
$canadduser = !empty($user->admin) || $user->hasRight('user', 'user', 'creer');
// Define variables to determine what the current user can do on the members
$canaddmember = $user->hasRight('adherent', 'creer');
// Security check
$result = \restrictedArea($user, 'adherent', $object->id, '', '', 'socid', 'rowid', 0);
$ldap = new \Ldap();
$result = $ldap->connectBind();
/*
 *	View
 */
$form = new \Form($db);
$title = $langs->trans("Member");
$help_url = 'EN:Module_Foundations|FR:Module_Adh&eacute;rents|ES:M&oacute;dulo_Miembros|DE:Modul_Mitglieder';
$head = \member_prepare_head($object);
$linkback = '<a href="' . \DOL_URL_ROOT . '/adherents/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
$adht = new \AdherentType($db);
// Lecture LDAP
$ldap = new \Ldap();
$result = $ldap->connectBind();
$info = $object->_load_ldap_info();
$dn = $object->_load_ldap_dn($info, 1);
$search = "(" . $object->_load_ldap_dn($info, 2) . ")";