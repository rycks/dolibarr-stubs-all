<?php

$origin = \GETPOST('origin', 'alpha');
// Example: commande, propal
$origin_id = \GETPOSTINT('origin_id') ? \GETPOSTINT('id') : '';
$id = \GETPOSTINT('id');
$socid = \GETPOSTINT('socid');
$ref = \GETPOST('ref', 'alpha');
$line_id = \GETPOSTINT('lineid');
$facid = \GETPOSTINT('facid');
$contactid = \GETPOSTINT('contactid');
$projectid = \GETPOSTINT('projectid');
$action = \GETPOST('action', 'alpha');
$confirm = \GETPOST('confirm', 'alpha');
$cancel = \GETPOST('cancel', 'alpha');
$rank = \GETPOSTINT('rank') > 0 ? \GETPOSTINT('rank') : -1;
$lineid = \GETPOSTINT('lineid');
$backtopage = \GETPOST('backtopage', 'alpha');
//PDF
$hidedetails = \GETPOSTINT('hidedetails') ? \GETPOSTINT('hidedetails') : (\getDolGlobalString('MAIN_GENERATE_DOCUMENTS_HIDE_DETAILS') ? 1 : 0);
$hidedesc = \GETPOSTINT('hidedesc') ? \GETPOSTINT('hidedesc') : (\getDolGlobalString('MAIN_GENERATE_DOCUMENTS_HIDE_DESC') ? 1 : 0);
$hideref = \GETPOSTINT('hideref') ? \GETPOSTINT('hideref') : (\getDolGlobalString('MAIN_GENERATE_DOCUMENTS_HIDE_REF') ? 1 : 0);
$object = new \Expedition($db);
$objectorder = new \Commande($db);
$extrafields = new \ExtraFields($db);
// Must be 'include', not 'include_once'
// Permissions / Rights
$usercanread = $user->hasRight("expedition", "lire");
$usercancreate = $user->hasRight("expedition", "creer");
$usercandelete = $user->hasRight("expedition", "supprimer");
$date_delivery = \dol_mktime(\GETPOSTINT('date_deliveryhour'), \GETPOSTINT('date_deliverymin'), 0, \GETPOSTINT('date_deliverymonth'), \GETPOSTINT('date_deliveryday'), \GETPOSTINT('date_deliveryyear'));
$date_shipping = \dol_mktime(\GETPOSTINT('date_shippinghour'), \GETPOSTINT('date_shippingmin'), 0, \GETPOSTINT('date_shippingmonth'), \GETPOSTINT('date_shippingday'), \GETPOSTINT('date_shippingyear'));
$result = \restrictedArea($user, 'expedition', $object->id, '');
$permissiondellink = $user->hasRight('expedition', 'delivery', 'creer');
// Used by the include of actions_dellink.inc.php
$permissiontoadd = $user->hasRight('expedition', 'creer');
$permissiontoedit = $usercancreate;
// Used by the include of actions_lineupdown.inc.php
$permissiontoeditextra = $permissiontoadd;
$upload_dir = $conf->expedition->dir_output . '/sending';
$editColspan = 0;
$objectsrc = \null;
$typeobject = \null;
$ref_customer = \null;
$shipping_method_id = \null;
$warehouse_id = \null;
$note_public = \null;
$note_private = \null;
/*
 * Actions
 */
$error = 0;
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$backurlforlist = \DOL_URL_ROOT . '/expedition/list.php';
$triggersendname = 'SHIPPING_SENTBYMAIL';
$paramname = 'id';
$autocopy = 'MAIN_MAIL_AUTOCOPY_SHIPMENT_TO';
$mode = 'emailfromshipment';
$trackid = 'shi' . $object->id;
/*
 * View
 */
$title = $object->ref . ' - ' . $langs->trans("Card");
$help_url = 'EN:Module_Shipments|FR:Module_Expéditions|ES:M&oacute;dulo_Expediciones|DE:Modul_Lieferungen';
$form = new \Form($db);
$formfile = new \FormFile($db);
$formproduct = new \FormProduct($db);
$product_static = new \Product($db);
$shipment_static = new \Expedition($db);
$warehousestatic = new \Entrepot($db);
$expe = new \Expedition($db);