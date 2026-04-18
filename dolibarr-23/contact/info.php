<?php

// Security check
$id = \GETPOSTINT("id");
$result = \restrictedArea($user, 'contact', $id, 'socpeople&societe');
$object = new \Contact($db);
/*
 * 	View
 */
$form = new \Form($db);
$title = \getDolGlobalString('SOCIETE_ADDRESSES_MANAGEMENT') ? $langs->trans("Contacts") : $langs->trans("ContactsAddresses");
$help_url = 'EN:Module_Third_Parties|FR:Module_Tiers|ES:M&oacute;dulo_Empresas';