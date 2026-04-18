<?php

$id = \GETPOSTINT('id') ? \GETPOSTINT('id') : \GETPOSTINT('orderid');
$ref = \GETPOST('ref', 'alpha');
$socid = \GETPOSTINT('socid');
$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel', 'alpha');
$confirm = \GETPOST('confirm', 'alpha');
$backtopage = \GETPOST('backtopage', 'alpha');
$lineid = \GETPOSTINT('lineid');
$contactid = \GETPOSTINT('contactid');
$projectid = \GETPOSTINT('projectid');
$origin = \GETPOST('origin', 'alpha');
$originid = \GETPOSTINT('originid') ? \GETPOSTINT('originid') : \GETPOSTINT('origin_id');
// For backward compatibility
$rank = \GETPOSTINT('rank') > 0 ? \GETPOSTINT('rank') : -1;
// Type Contact default
$type_contact_code = \getDolGlobalString('ORDER_TYPE_CONTACT_DEFAULT') ? \getDolGlobalString('ORDER_TYPE_CONTACT_DEFAULT') : 'CUSTOMER';
// PDF
$hidedetails = \GETPOSTINT('hidedetails') ? \GETPOSTINT('hidedetails') : (\getDolGlobalString('MAIN_GENERATE_DOCUMENTS_HIDE_DETAILS') ? 1 : 0);
$hidedesc = \GETPOSTINT('hidedesc') ? \GETPOSTINT('hidedesc') : (\getDolGlobalString('MAIN_GENERATE_DOCUMENTS_HIDE_DESC') ? 1 : 0);
$hideref = \GETPOSTINT('hideref') ? \GETPOSTINT('hideref') : (\getDolGlobalString('MAIN_GENERATE_DOCUMENTS_HIDE_REF') ? 1 : 0);
$array_options = 0;
$object_id = 0;
$price_base_type = \null;
$lineClassName = \null;
$remise_percent = \null;
$ref_client = \null;
$availability_id = \null;
$shipping_method_id = \null;
$warehouse_id = \null;
$demand_reason_id = \null;
$formproject = \null;
$objectsrc = \null;
$note_public = \null;
$note_private = \null;
$result = \restrictedArea($user, 'commande', $id);
$object = new \Commande($db);
$extrafields = new \ExtraFields($db);
// Must be 'include', not 'include_once'
// Permissions / Rights
$usercanread = $user->hasRight("commande", "lire");
$usercancreate = $user->hasRight("commande", "creer");
$usercandelete = $user->hasRight("commande", "supprimer");
// Advanced permissions
$usercanclose = !\getDolGlobalString('MAIN_USE_ADVANCED_PERMS') && !empty($usercancreate) || \getDolGlobalString('MAIN_USE_ADVANCED_PERMS') && $user->hasRight('commande', 'order_advance', 'close');
$usercanvalidate = !\getDolGlobalString('MAIN_USE_ADVANCED_PERMS') && $usercancreate || \getDolGlobalString('MAIN_USE_ADVANCED_PERMS') && $user->hasRight('commande', 'order_advance', 'validate');
$usercancancel = !\getDolGlobalString('MAIN_USE_ADVANCED_PERMS') && $usercancreate || \getDolGlobalString('MAIN_USE_ADVANCED_PERMS') && $user->hasRight('commande', 'order_advance', 'annuler');
$usercansend = !\getDolGlobalString('MAIN_USE_ADVANCED_PERMS') || $user->hasRight('commande', 'order_advance', 'send');
$usercangeneratedoc = !\getDolGlobalString('MAIN_USE_ADVANCED_PERMS') || $user->hasRight('commande', 'order_advance', 'generetedoc');
$usermustrespectpricemin = \getDolGlobalString('MAIN_USE_ADVANCED_PERMS') && !$user->hasRight('produit', 'ignore_price_min_advance') || !\getDolGlobalString('MAIN_USE_ADVANCED_PERMS');
$usercancreatepurchaseorder = $user->hasRight('fournisseur', 'commande', 'creer') || $user->hasRight('supplier_order', 'creer');
$permissionnote = $usercancreate;
//  Used by the include of actions_setnotes.inc.php
$permissiondellink = $usercancreate;
//  Used by the include of actions_dellink.inc.php
$permissiontoadd = $usercancreate;
//  Used by the include of actions_addupdatedelete.inc.php and actions_lineupdown.inc.php
$permissiontoeditextra = $usercancreate;
$error = 0;
$date_delivery = \dol_mktime(\GETPOSTINT('liv_hour'), \GETPOSTINT('liv_min'), 0, \GETPOSTINT('liv_month'), \GETPOSTINT('liv_day'), \GETPOSTINT('liv_year'));
$selectedLines = array();
/*
 * Actions
 */
$parameters = array('socid' => $socid);
// Note that $action and $object may be modified by some hooks
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$backurlforlist = \DOL_URL_ROOT . '/commande/list.php';
$selectedLines = \GETPOST('toselect', 'array:int');
// Actions to build doc
$upload_dir = !empty($conf->commande->multidir_output[$object->entity ?? $conf->entity]) ? $conf->commande->multidir_output[$object->entity ?? $conf->entity] : $conf->commande->dir_output;
$permissiontoadd = $usercancreate;
// Actions to send emails
$triggersendname = 'ORDER_SENTBYMAIL';
$paramname = 'id';
$autocopy = 'MAIN_MAIL_AUTOCOPY_ORDER_TO';
// used to know the automatic BCC to add
$trackid = 'ord' . $object->id;
/*
 *	View
 */
$title = $object->ref . " - " . $langs->trans('Card');
$help_url = 'EN:Customers_Orders|FR:Commandes_Clients|ES:Pedidos de clientes|DE:Modul_Kundenaufträge';
$form = new \Form($db);
$formfile = new \FormFile($db);
$formorder = new \FormOrder($db);
$formmargin = new \FormMargin($db);
$soc = new \Societe($db);
//$remise_absolue = 0;
$currency_code = $conf->currency;
$cond_reglement_id = \GETPOSTINT('cond_reglement_id');
$deposit_percent = \GETPOSTFLOAT('cond_reglement_id_deposit_percent');
$mode_reglement_id = \GETPOSTINT('mode_reglement_id');
$fk_account = \GETPOSTINT('fk_account');
// Call Hook tabContentCreateOrder
$parameters = array();
// Note that $action and $object may be modified by hook
$reshook = $hookmanager->executeHooks('tabContentCreateOrder', $parameters, $object, $action);