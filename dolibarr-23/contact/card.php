<?php

$error = 0;
$errors = array();
// Get parameters
$action = \GETPOST('action', 'alpha') ? \GETPOST('action', 'alpha') : 'view';
$confirm = \GETPOST('confirm', 'alpha');
$backtopage = \GETPOST('backtopage', 'alpha');
$cancel = \GETPOST('cancel', 'alpha');
$id = \GETPOSTINT('id');
$socid = \GETPOSTINT('socid');
// Initialize a technical object
$object = new \Contact($db);
$extrafields = new \ExtraFields($db);
$socialnetworks = \getArrayOfSocialNetworks();
$objcanvas = \null;
$canvas = !empty($object->canvas) ? $object->canvas : \GETPOST("canvas");
$triggermodname = 'CONTACT_MODIFY';
$permissiontoadd = $user->hasRight('societe', 'contact', 'creer');
$permissiontoeditextra = $permissiontoadd;
$result = \restrictedArea($user, 'contact', $id, 'socpeople&societe', '', '', 'rowid', 0);
// If we create a contact with no company (shared contacts), no check on write permission
/*
 *	Actions
 */
$parameters = array('id' => $id, 'objcanvas' => $objcanvas);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$backurlforlist = \DOL_URL_ROOT . '/contact/list.php';
// Actions to send emails
$triggersendname = 'CONTACT_SENTBYMAIL';
$paramname = 'id';
$mode = 'emailfromcontact';
/*
 *	View
 */
$form = new \Form($db);
$formadmin = new \FormAdmin($db);
$formcompany = new \FormCompany($db);
$objsoc = new \Societe($db);
$title = \getDolGlobalString('SOCIETE_ADDRESSES_MANAGEMENT') ? $langs->trans("Contacts") : $langs->trans("ContactsAddresses");
$help_url = 'EN:Module_Third_Parties|FR:Module_Tiers|ES:Empresas';
$countrynotdefined = $langs->trans("ErrorSetACountryFirst") . ' (' . $langs->trans("SeeAbove") . ')';