<?php

$action = \GETPOST('action', 'aZ09');
$error = 0;
// This one must be after the others
$valkey = '';
$key = \GETPOST("key");
/*
 * View
 */
$form = new \Form($db);
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$head = \ldap_prepare_head();
/*
 * Test the connection
 */
$butlabel = $langs->trans("LDAPTestSynchroContact");
$testlabel = 'test';
$key = \getDolGlobalString('LDAP_KEY_CONTACTS');
$dn = \getDolGlobalString('LDAP_CONTACT_DN');
$objectclass = \getDolGlobalString('LDAP_CONTACT_OBJECT_CLASS');