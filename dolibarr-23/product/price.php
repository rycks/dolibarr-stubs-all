<?php

/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Societe $mysoc
 * @var Translate $langs
 * @var User $user
 */
$prodcustprice = \null;
$error = 0;
$errors = array();
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel', 'alpha');
$eid = \GETPOSTINT('eid');
$search_soc = \GETPOST('search_soc');
// Security check
$fieldvalue = !empty($id) ? $id : (!empty($ref) ? $ref : '');
$fieldtype = !empty($ref) ? 'ref' : 'rowid';
$object = new \Product($db);
$extrafields = new \ExtraFields($db);
$maxpricesupplier = 0;
$parameters = array('id' => $id, 'ref' => $ref);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$maxpricesupplier = 0;
/*
 * View
 */
$form = new \Form($db);
$title = $langs->trans('ProductServiceCard');
$helpurl = '';
$shortlabel = \dol_trunc($object->label, 16);
$head = \product_prepare_head($object);
$titre = $langs->trans("CardProduct" . $object->type);
$picto = $object->type == \Product::TYPE_SERVICE ? 'service' : 'product';
$linkback = '<a href="' . \DOL_URL_ROOT . '/product/list.php?restore_lastsearch_values=1&type=' . $object->type . '">' . $langs->trans("BackToList") . '</a>';
$shownav = 1;
$soc = \null;
$parameters = array();
$reshook = $hookmanager->executeHooks('addMoreActionsButtons', $parameters, $object, $action);
$prodcustprice = new \ProductCustomerPrice($db);
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTINT("page") ? \GETPOSTINT("page") : 0;
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
// Build filter to display only concerned lines
$filter = array('t.fk_product' => (string) $object->id);
$sql = "SELECT p.rowid, p.price, p.price_ttc, p.price_base_type, p.tva_tx, p.default_vat_code, p.recuperableonly, p.localtax1_tx, p.localtax1_type, p.localtax2_tx, p.localtax2_type,";
// $sql .= $db->plimit();
//print $sql;
$result = $db->query($sql);