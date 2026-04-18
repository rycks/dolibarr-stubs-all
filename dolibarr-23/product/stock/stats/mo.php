<?php

$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
// Security check
$fieldvalue = !empty($id) ? $id : (!empty($ref) ? $ref : '');
$fieldtype = !empty($ref) ? 'ref' : 'rowid';
$socid = 0;
// Load variable for pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$search_month = \GETPOST('search_month');
// Can be ''
$search_year = \GETPOST('search_year');
/*
 * View
 */
$staticmo = new \Mo($db);
$staticmoligne = new \MoLine($db);
$form = new \Form($db);
$formother = new \FormOther($db);
$object = new \Productlot($db);
$batch = '';
$objectid = 0;
$result = $object->fetch($id, $objectid, $batch);
$parameters = array('id' => $id);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $product, $action);
$helpurl = '';
$shortlabel = \dol_trunc($object->batch, 16);
$title = $langs->trans('Batch') . " " . $shortlabel . " - " . $langs->trans('Referers');
$helpurl = 'EN:Module_Products|FR:Module_Produits|ES:M&oacute;dulo_Productos';