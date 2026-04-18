<?php

// Get parameters
$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel', 'alpha');
$backtopage = \GETPOST('backtopage', 'alpha');
$backtopageforcancel = \GETPOST('backtopageforcancel', 'alpha');
// if not set, $backtopage will be used
$confirm = \GETPOST('confirm', 'alpha');
$rowid = \GETPOSTINT('rowid');
$id = \GETPOST('id') ? \GETPOSTINT('id') : $rowid;
$typeid = \GETPOSTINT('typeid');
$userid = \GETPOSTINT('userid');
$socid = \GETPOSTINT('socid');
$ref = \GETPOST('ref', 'alpha');
$error = 0;
$object = new \Adherent($db);
$extrafields = new \ExtraFields($db);
$upload_dir = \null;
$socialnetworks = \getArrayOfSocialNetworks();
$canvas = $object->canvas ? $object->canvas : \GETPOST("canvas");
$objcanvas = \null;
// Load member
$result = $object->fetch($id, $ref);
// Define variables to know what current user can do on users
$canadduser = $user->admin || $user->hasRight('user', 'user', 'creer');
// Define variables to determine what the current user can do on the members
$canaddmember = $user->hasRight('adherent', 'creer');
$caneditfieldmember = \false;
$permissiontoeditextra = $canaddmember;
// Security check
$result = \restrictedArea($user, 'adherent', $object->id, '', '', 'socid', 'rowid', 0);
$linkofpubliclist = \DOL_MAIN_URL_ROOT . '/public/members/public_list.php' . (\isModEnabled('multicompany') ? '?entity=' . $conf->entity : '');
/*
 * 	Actions
 */
$parameters = array('id' => $id, 'rowid' => $id, 'objcanvas' => $objcanvas, 'confirm' => $confirm);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$backurlforlist = \DOL_URL_ROOT . '/adherents/list.php';
// Actions to build doc
$upload_dir = $conf->member->dir_output;
$permissiontoadd = $user->hasRight('adherent', 'creer');
// Actions to send emails
$triggersendname = 'MEMBER_SENTBYMAIL';
$paramname = 'id';
$mode = 'emailfrommember';
$trackid = 'mem' . $object->id;
/*
 * View
 */
$form = new \Form($db);
$formfile = new \FormFile($db);
$formadmin = new \FormAdmin($db);
$formcompany = new \FormCompany($db);
$title = $langs->trans("Member") . " - " . $langs->trans("Card");
$help_url = 'EN:Module_Foundations|FR:Module_Adh&eacute;rents|ES:M&oacute;dulo_Miembros|DE:Modul_Mitglieder';
$countrynotdefined = $langs->trans("ErrorSetACountryFirst") . ' (' . $langs->trans("SeeAbove") . ')';