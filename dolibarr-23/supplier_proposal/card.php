<?php

$error = 0;
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$socid = \GETPOSTINT('socid');
$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel', 'alpha');
$backtopage = \GETPOST('backtopage', 'alpha');
$backtopageforcancel = \GETPOST('backtopageforcancel', 'alpha');
$origin = \GETPOST('origin', 'alpha');
$originid = \GETPOSTINT('originid');
$confirm = \GETPOST('confirm', 'alpha');
$lineid = \GETPOSTINT('lineid');
$contactid = \GETPOSTINT('contactid');
$projectid = \GETPOSTINT('projectid');
$rank = \GETPOSTINT('rank') > 0 ? \GETPOSTINT('rank') : -1;
// PDF
$hidedetails = \GETPOSTINT('hidedetails') ? \GETPOSTINT('hidedetails') : (\getDolGlobalString('MAIN_GENERATE_DOCUMENTS_HIDE_DETAILS') ? 1 : 0);
$hidedesc = \GETPOSTINT('hidedesc') ? \GETPOSTINT('hidedesc') : (\getDolGlobalString('MAIN_GENERATE_DOCUMENTS_HIDE_DESC') ? 1 : 0);
$hideref = \GETPOSTINT('hideref') ? \GETPOSTINT('hideref') : (\getDolGlobalString('MAIN_GENERATE_DOCUMENTS_HIDE_REF') ? 1 : 0);
// Nombre de ligne pour choix de produit/service predefinis
$NBLINES = 4;
$object = new \SupplierProposal($db);
$extrafields = new \ExtraFields($db);
$objectsrc = \null;
$ret = $object->fetch($id, $ref);
// Common permissions
$usercanread = $user->hasRight('supplier_proposal', 'lire');
$usercancreate = $user->hasRight('supplier_proposal', 'creer');
$usercandelete = $user->hasRight('supplier_proposal', 'supprimer');
// Advanced permissions
$usercanvalidate = !\getDolGlobalString('MAIN_USE_ADVANCED_PERMS') && !empty($usercancreate) || \getDolGlobalString('MAIN_USE_ADVANCED_PERMS') && $user->hasRight('supplier_proposal', 'validate_advance');
$usercansend = !\getDolGlobalString('MAIN_USE_ADVANCED_PERMS') || $user->hasRight('supplier_proposal', 'send_advance');
// Additional area permissions
$usercanclose = $user->hasRight('supplier_proposal', 'cloturer');
$usercancreateorder = $user->hasRight('fournisseur', 'commande', 'creer') || $user->hasRight('supplier_order', 'creer');
// Permissions for includes
$permissionnote = $usercancreate;
// Used by the include of actions_setnotes.inc.php
$permissiondellink = $usercancreate;
// Used by the include of actions_dellink.inc.php
$permissiontoedit = $usercancreate;
// Used by the include of actions_lineupdown.inc.php
$permissiontoadd = $usercancreate;
$permissiontoeditextra = $permissiontoadd;
$result = \restrictedArea($user, 'supplier_proposal', $object->id);
/*
 * Actions
 */
$parameters = array('socid' => $socid);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$backurlforlist = \DOL_URL_ROOT . '/supplier_proposal/list.php';
// Actions to send emails
$triggersendname = 'PROPOSAL_SUPPLIER_SENTBYMAIL';
$autocopy = 'MAIN_MAIL_AUTOCOPY_SUPPLIER_PROPOSAL_TO';
$trackid = 'spro' . $object->id;
// Actions to build doc
$upload_dir = $conf->supplier_proposal->dir_output;
/*
 * View
 */
$title = $object->ref . " - " . $langs->trans('Card');
$help_url = 'EN:Ask_Price_Supplier|FR:Demande_de_prix_fournisseur';
$form = new \Form($db);
$formother = new \FormOther($db);
$formfile = new \FormFile($db);
$formmargin = new \FormMargin($db);
$companystatic = new \Societe($db);
$now = \dol_now();
$currency_code = $conf->currency;
$soc = new \Societe($db);
$object = new \SupplierProposal($db);
// Call Hook tabContentCreateSupplierProposal
$parameters = array();
// Note that $action and $object may be modified by hook
$reshook = $hookmanager->executeHooks('tabContentCreateSupplierProposal', $parameters, $object, $action);