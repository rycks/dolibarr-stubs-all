<?php

$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
// Security check
$fieldvalue = !empty($id) ? $id : (!empty($ref) ? $ref : '');
$fieldtype = !empty($ref) ? 'ref' : 'rowid';
$object = new \Product($db);
$permissionnote = $user->hasRight('produit', 'creer') || $user->hasRight('service', 'creer');
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 *	View
 */
$form = new \Form($db);
$help_url = '';
$title = $langs->trans('ProductServiceCard');
$shortlabel = \dol_trunc($object->label, 16);
$head = \product_prepare_head($object);
$titre = $langs->trans("CardProduct" . $object->type);
$picto = $object->type == \Product::TYPE_SERVICE ? 'service' : 'product';
$linkback = '<a href="' . \DOL_URL_ROOT . '/product/list.php?restore_lastsearch_values=1&type=' . $object->type . '">' . $langs->trans("BackToList") . '</a>';
$shownav = 1;
$cssclass = 'titlefield';