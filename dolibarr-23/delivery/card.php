<?php

$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$backtopage = \GETPOST('backtopage', 'alpha');
$id = \GETPOSTINT('id');
$object = new \Delivery($db);
$extrafields = new \ExtraFields($db);
// Must be 'include', not 'include_once'
$error = 0;
$result = \restrictedArea($user, 'expedition', $id, 'delivery', 'delivery');
$permissiontoread = $user->hasRight('expedition', 'delivery', 'read');
$permissiontoadd = $user->hasRight('expedition', 'delivery', 'creer');
// Used by the include of actions_addupdatedelete.inc.php and actions_lineupdown.inc.php
$permissiontodelete = $user->hasRight('expedition', 'delivery', 'supprimer') || $permissiontoadd && isset($object->status) && $object->status == $object::STATUS_DRAFT;
$permissiontovalidate = !\getDolGlobalString('MAIN_USE_ADVANCED_PERMS') && $user->hasRight('expedition', 'delivery', 'creer') || \getDolGlobalString('MAIN_USE_ADVANCED_PERMS') && $user->hasRight('expedition', 'delivery_advance', 'validate');
$permissionnote = $user->hasRight('expedition', 'delivery', 'creer');
// Used by the include of actions_setnotes.inc.php
$permissiondellink = $user->hasRight('expedition', 'delivery', 'creer');
// Used by the include of actions_dellink.inc.php
$permissiontoeditextra = $permissiontoadd;
$permissiontoeditextraline = $permissiontoadd;
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
// Note that $action and $object may have been modified by some hooks
// Delete Link
$permissiondellink = $user->hasRight('expedition', 'delivery', 'supprimer');
$array_options = array();
// $object->entrepot_id = GETPOST('entrepot_id', 'int');	entrepot_id does not exists on delivery note, only on shipment document
// We loop on each line of order to complete object delivery with qty to delivery
$commande = new \Commande($db);
$num = \count($commande->lines);
$ret = $object->create($user);
$result = $object->delete($user);
$datedelivery = \dol_mktime(\GETPOSTINT('liv_hour'), \GETPOSTINT('liv_min'), 0, \GETPOSTINT('liv_month'), \GETPOSTINT('liv_day'), \GETPOSTINT('liv_year'));
$result = $object->setDeliveryDate($user, $datedelivery);
// @phan-suppress-current-line PhanTypeMismatchProperty
$attribute_name = \GETPOST('attribute', 'aZ09');
// Fill array 'array_options' with data from update form
$ret = $extrafields->setOptionalsFromPost(\null, $object, $attribute_name);
// Actions to build doc
$upload_dir = $conf->expedition->dir_output . '/receipt';
// Actions to send emails
$triggersendname = 'DELIVERY_SENTBYMAIL';
$paramname = 'id';
$autocopy = 'MAIN_MAIL_AUTOCOPY_DELIVERY_TO';
$mode = 'emailfromdelivery';
$trackid = 'del' . $object->id;
/*
 *	View
 */
$title = $langs->trans('Delivery');
$form = new \Form($db);
$formfile = new \FormFile($db);