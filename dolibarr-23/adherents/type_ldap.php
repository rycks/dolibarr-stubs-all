<?php

$id = \GETPOSTINT('rowid');
$action = \GETPOST('action', 'aZ09');
// Security check
$result = \restrictedArea($user, 'adherent', $id, 'adherent_type');
$object = new \AdherentType($db);
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$title = $langs->trans("MembersTypeSetup");
$help_url = 'EN:Module_Services_En|FR:Module_Services|ES:M&oacute;dulo_Servicios|DE:Modul_Mitglieder';
$form = new \Form($db);
$head = \member_type_prepare_head($object);
$linkback = '<a href="' . \DOL_URL_ROOT . '/adherents/type.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
// LDAP reading
$ldap = new \Ldap();
$result = $ldap->connectBind();
$info = $object->_load_ldap_info();
$dn = $object->_load_ldap_dn($info, 1);
$search = "(" . $object->_load_ldap_dn($info, 2) . ")";
$records = $ldap->getAttribute($dn, $search);