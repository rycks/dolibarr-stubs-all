<?php

$action = \GETPOST('action', 'aZ09');
// Security check
$id = \GETPOSTINT('id');
$result = \restrictedArea($user, 'contact', $id, 'socpeople&societe');
$object = new \Contact($db);
$ldap = new \Ldap();
$result = $ldap->connectBind();
$info = $object->_load_ldap_info();
$dn = $object->_load_ldap_dn($info);
$olddn = $dn;
// We can say that old dn = dn as we force synchro
$result = $ldap->update($dn, $info, $user, $olddn);
/*
 *	View
 */
$form = new \Form($db);
$title = \getDolGlobalString('SOCIETE_ADDRESSES_MANAGEMENT') ? $langs->trans("Contacts") : $langs->trans("ContactsAddresses");
$help_url = 'EN:Module_Third_Parties|FR:Module_Tiers|ES:M&oacute;dulo_Empresas';
$head = \contact_prepare_head($object);
$linkback = '<a href="' . \DOL_URL_ROOT . '/contact/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
// Lecture LDAP
$ldap = new \Ldap();
$result = $ldap->connectBind();
$info = $object->_load_ldap_info();
$dn = $object->_load_ldap_dn($info, 1);
$search = "(" . $object->_load_ldap_dn($info, 2) . ")";
$records = $ldap->getAttribute($dn, $search);