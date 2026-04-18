<?php

$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$rowid = \GETPOSTINT('rowid');
$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel', 'alpha');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'pricesuppliercard';
$socid = \GETPOSTINT('socid');
$cost_price = \GETPOSTFLOAT('cost_price');
$pmp = \GETPOSTFLOAT('pmp');
$backtopage = \GETPOST('backtopage', 'alpha');
$error = 0;
$extrafields = new \ExtraFields($db);
// Security check
$fieldvalue = !empty($id) ? $id : (!empty($ref) ? $ref : '');
$fieldtype = !empty($ref) ? 'ref' : 'rowid';
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTINT("page") ? \GETPOSTINT("page") : 0;
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$object = new \ProductFournisseur($db);
$prod = new \Product($db);
$usercanread = $object->type == \Product::TYPE_PRODUCT && $user->hasRight('produit', 'lire') || $object->type == \Product::TYPE_SERVICE && $user->hasRight('service', 'lire');
$usercancreate = $object->type == \Product::TYPE_PRODUCT && $user->hasRight('produit', 'creer') || $object->type == \Product::TYPE_SERVICE && $user->hasRight('service', 'creer');
// Case of advanced permission to write supplier prices
$usercancreate = !\getDolGlobalString('MAIN_USE_ADVANCED_PERMS') ? $usercancreate : $user->hasRight('product', 'product_advance', 'write_supplier_prices');
$parameters = array('socid' => $socid, 'id_prod' => $id);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * view
 */
$form = new \Form($db);
$title = $langs->trans('ProductServiceCard');
$helpurl = '';
$shortlabel = \dol_trunc($object->label, 16);