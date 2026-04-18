<?php

// Get Parameters
$action = \GETPOST('action', 'alpha');
$confirm = \GETPOST('confirm', 'alpha');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'purchaseordercard';
// To manage different context of search
$cancel = \GETPOST('cancel', 'alpha');
$backtopage = \GETPOST('backtopage', 'alpha');
$backtopageforcancel = \GETPOST('backtopageforcancel', 'alpha');
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$socid = \GETPOSTINT('socid');
$projectid = \GETPOSTINT('projectid');
$lineid = \GETPOSTINT('lineid');
$origin = \GETPOST('origin', 'alpha');
$originid = \GETPOSTINT('originid') ? \GETPOSTINT('originid') : \GETPOSTINT('origin_id');
// For backward compatibility
$rank = \GETPOSTINT('rank') > 0 ? \GETPOSTINT('rank') : -1;
$stockDelete = \GETPOST('stockDelete', 'int');
// PDF
$hidedetails = \GETPOSTINT('hidedetails') ? \GETPOSTINT('hidedetails') : (\getDolGlobalString('MAIN_GENERATE_DOCUMENTS_HIDE_DETAILS') ? 1 : 0);
$hidedesc = \GETPOSTINT('hidedesc') ? \GETPOSTINT('hidedesc') : (\getDolGlobalString('MAIN_GENERATE_DOCUMENTS_HIDE_DESC') ? 1 : 0);
$hideref = \GETPOSTINT('hideref') ? \GETPOSTINT('hideref') : (\getDolGlobalString('MAIN_GENERATE_DOCUMENTS_HIDE_REF') ? 1 : 0);
$datelivraison = \dol_mktime(\GETPOSTINT('liv_hour'), \GETPOSTINT('liv_min'), \GETPOSTINT('liv_sec'), \GETPOSTINT('liv_month'), \GETPOSTINT('liv_day'), \GETPOSTINT('liv_year'));
$object = new \CommandeFournisseur($db);
$extrafields = new \ExtraFields($db);
$ret = $object->fetch($id, $ref);
$ret = $object->fetch_thirdparty();
// Security check
$isdraft = isset($object->status) && $object->status == $object::STATUS_DRAFT ? 1 : 0;
$result = \restrictedArea($user, 'fournisseur', $object, 'commande_fournisseur', 'commande', 'fk_soc', 'rowid', $isdraft);
// Common permissions
$usercanread = $user->hasRight("fournisseur", "commande", "lire") || $user->hasRight("supplier_order", "lire");
$usercancreate = $user->hasRight("fournisseur", "commande", "creer") || $user->hasRight("supplier_order", "creer");
$usercandelete = $user->hasRight("fournisseur", "commande", "supprimer") || $user->hasRight("supplier_order", "supprimer") || $usercancreate && isset($object->status) && $object->status == $object::STATUS_DRAFT;
// Advanced permissions
$usercanvalidate = !\getDolGlobalString('MAIN_USE_ADVANCED_PERMS') && !empty($usercancreate) || \getDolGlobalString('MAIN_USE_ADVANCED_PERMS') && $user->hasRight("fournisseur", "supplier_order_advance", "validate");
// Additional area permissions
$usercanapprove = $user->hasRight("fournisseur", "commande", "approuver");
$usercanapprovesecond = $user->hasRight("fournisseur", "commande", "approve2");
$usercanorder = $user->hasRight("fournisseur", "commande", "commander");
// Permissions for includes
$permissionnote = $usercancreate;
// Used by the include of actions_setnotes.inc.php
$permissiondellink = $usercancreate;
// Used by the include of actions_dellink.inc.php
$permissiontoedit = $usercancreate;
// Used by the include of actions_lineupdown.inc.php
$permissiontoadd = $usercancreate;
// Used by the include of actions_addupdatedelete.inc.php
$permissiontoeditextra = $permissiontoadd;
// Project permission
$caneditproject = \false;
$error = 0;
/*
 * Actions
 */
$parameters = array('socid' => $socid);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$backurlforlist = \DOL_URL_ROOT . '/fourn/commande/list.php' . ($socid > 0 ? '?socid=' . (int) $socid : '');
// Actions to send emails
$triggersendname = 'ORDER_SUPPLIER_SENTBYMAIL';
$autocopy = 'MAIN_MAIL_AUTOCOPY_SUPPLIER_ORDER_TO';
$trackid = 'sord' . $object->id;
// Actions to build doc
$upload_dir = $conf->fournisseur->commande->dir_output;
/*
 * View
 */
$form = new \Form($db);
$formfile = new \FormFile($db);
$formorder = new \FormOrder($db);
$productstatic = new \Product($db);
$title = $object->ref . " - " . $langs->trans('Card');
$help_url = 'EN:Module_Suppliers_Orders|FR:CommandeFournisseur|ES:Módulo_Pedidos_a_proveedores';
$now = \dol_now();
$currency_code = $conf->currency;
$societe = '';
$objectsrc = \null;
// Call Hook tabContentCreateSupplierOrder
$parameters = array();
// Note that $action and $object may be modified by hook
$reshook = $hookmanager->executeHooks('tabContentCreateSupplierOrder', $parameters, $object, $action);