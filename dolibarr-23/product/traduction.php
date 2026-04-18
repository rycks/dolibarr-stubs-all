<?php

$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel', 'alpha');
// Security check
$fieldvalue = !empty($id) ? $id : (!empty($ref) ? $ref : '');
$fieldtype = !empty($ref) ? 'ref' : 'rowid';
$object = new \Product($db);
// Permissions
$usercancreate = $object->type == \Product::TYPE_PRODUCT && $user->hasRight('produit', 'creer') || $object->type == \Product::TYPE_SERVICE && $user->hasRight('service', 'creer');
/*
 * Actions
 */
$parameters = array('id' => $id, 'ref' => $ref);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$title = $langs->trans('ProductServiceCard');
$helpurl = '';
$shortlabel = \dol_trunc($object->label, 16);
$form = new \Form($db);
$formadmin = new \FormAdmin($db);
$head = \product_prepare_head($object);
$titre = $langs->trans("CardProduct" . $object->type);
$picto = $object->type == \Product::TYPE_SERVICE ? 'service' : 'product';
// Calculate $cnt_trans
$cnt_trans = 0;
$linkback = '<a href="' . \DOL_URL_ROOT . '/product/list.php?restore_lastsearch_values=1&type=' . $object->type . '">' . $langs->trans("BackToList") . '</a>';
$shownav = 1;
$parameters = array();
$reshook = $hookmanager->executeHooks('addMoreActionsButtons', $parameters, $object, $action);
$parameters = array();
$reshook = $hookmanager->executeHooks('formObjectOptions', $parameters, $object, $action);
$doleditor = new \DolEditor('desc', '', '', 160, 'dolibarr_notes', '', \false, \true, \getDolGlobalInt('FCKEDITOR_ENABLE_DETAILS'), \ROWS_3, '90%');
$parameters = array();
$reshook = $hookmanager->executeHooks('formObjectOptions', $parameters, $object, $action);