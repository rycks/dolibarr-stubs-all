<?php

$u = '';
$p = '';
$myafm = '';
$error = 0;
$errors = array();
$refalreadyexists = 0;
// Get parameters
$action = \GETPOST('action', 'aZ09') ? \GETPOST('action', 'aZ09') : 'view';
$cancel = \GETPOST('cancel', 'alpha');
$backtopage = \GETPOST('backtopage', 'alpha');
$backtopageforcancel = \GETPOST('backtopageforcancel', 'alpha');
$confirm = \GETPOST('confirm', 'alpha');
$canvas = \GETPOST('canvas', 'alpha');
$dol_openinpopup = '';
$socid = \GETPOSTINT('socid') ? \GETPOSTINT('socid') : \GETPOSTINT('id');
$socid = $user->socid;
$id = $socid;
$object = new \Societe($db);
$extrafields = new \ExtraFields($db);
$socialnetworks = \getArrayOfSocialNetworks();
// Get object canvas (By default, this is not defined, so standard usage of dolibarr)
$canvas = $object->canvas ? $object->canvas : \GETPOST("canvas");
$objcanvas = \null;
// Permissions
$permissiontoread = $user->hasRight('societe', 'lire');
$permissiontoadd = $user->hasRight('societe', 'creer');
// Used by the include of actions_addupdatedelete.inc.php and actions_lineupdown.inc.php
$permissiontodelete = $user->hasRight('societe', 'supprimer') || $permissiontoadd && isset($object->status) && $object->status == 0;
$permissionnote = $user->hasRight('societe', 'creer');
// Used by the include of actions_setnotes.inc.php
$permissiondellink = $user->hasRight('societe', 'creer');
// Used by the include of actions_dellink.inc.php
$permissiontoeditextra = $permissiontoadd;
$upload_dir = $conf->societe->multidir_output[isset($object->entity) ? $object->entity : 1];
// Security check
$result = \restrictedArea($user, 'societe', $object->id, '&societe', '', 'fk_soc', 'rowid', 0);
/*
 * Actions
 */
$parameters = array('id' => $socid, 'objcanvas' => $objcanvas);
$current_logo = '';
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$backurlforlist = \DOL_URL_ROOT . '/societe/list.php';
$id = $socid;
// Actions to send emails
$triggersendname = 'COMPANY_SENTBYMAIL';
$paramname = 'socid';
$mode = 'emailfromthirdparty';
$trackid = 'thi' . $object->id;
// Actions to build doc
$id = $socid;
$upload_dir = !empty($conf->societe->multidir_output[$object->entity ?? $conf->entity]) ? $conf->societe->multidir_output[$object->entity ?? $conf->entity] : $conf->societe->dir_output;
$permissiontoadd = $user->hasRight('societe', 'creer');
/*
 * View
 */
$form = new \Form($db);
$formfile = new \FormFile($db);
$formadmin = new \FormAdmin($db);
$formcompany = new \FormCompany($db);
$result = $object->fetch($socid);
$title = $langs->trans("ThirdParty");
$help_url = 'EN:Module_Third_Parties|FR:Module_Tiers|ES:Empresas|DE:Modul_Geschäftspartner';
$countrynotdefined = $langs->trans("ErrorSetACountryFirst") . ' (' . $langs->trans("SeeAbove") . ')';
$canvasdisplayaction = $action;