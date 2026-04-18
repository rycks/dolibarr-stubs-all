<?php

// Get Parameters
$action = \GETPOST('action', 'aZ09') ? \GETPOST('action', 'aZ09') : 'view';
// The action 'create'/'add', 'edit'/'update', 'view', ...
$massaction = \GETPOST('massaction', 'alpha');
$toselect = \GETPOST('toselect', 'array:int');
// Array of ids of elements selected into a list
$optioncss = \GETPOST('optioncss', 'alpha');
$mode = \GETPOST('mode', 'aZ');
// The output mode ('list', 'kanban', 'hierarchy', 'calendar', ...)
$sref = \GETPOST('sref', 'alphanohtml');
$sRefSupplier = \GETPOST('srefsupplier');
$snom = \GETPOST('snom', 'alphanohtml');
$type = \GETPOST('type', 'alphanohtml');
// Load variable for pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT('page');
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$fourn_id = \GETPOST('fourn_id', 'intcomma');
$catid = \GETPOST('catid', 'intcomma');
$extrafields = new \ExtraFields($db);
// Permissions
$permissiontoadd = $user->hasRight('product', 'read') || $user->hasRight('service', 'read');
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$productstatic = new \Product($db);
$companystatic = new \Societe($db);
$title = $langs->trans('Supplier') . " - " . $langs->trans('ProductsAndServices');
// Build and execute select
// --------------------------------------------------------------------
$sql = "SELECT p.rowid, p.label, p.ref, p.fk_product_type, p.entity, p.tosell, p.tobuy, p.barcode, p.fk_barcode_type,";
// Add fields to SELECT from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListSelect', $parameters, $object, $action);
$sqlfields = $sql;
// Add WHERE filters from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListWhere', $parameters);
// Count total nb of records
$nbtotalofrecords = '';
/* The fast and low memory method to get and count full list converts the sql into a sql count */
$sqlforcount = \preg_replace('/^' . \preg_quote($sqlfields, '/') . '/', 'SELECT COUNT(*) as nbtotalofrecords', $sql);
$sqlforcount = \preg_replace('/GROUP BY .*$/', '', $sqlforcount);
$resql = $db->query($sqlforcount);
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$i = 0;
$help_url = '';
$arrayofselected = \is_array($toselect) ? $toselect : array();
$param = '';
$param = "&sref=" . $sref . "&snom=" . $snom . "&fourn_id=" . $fourn_id . (isset($type) ? "&amp;type=" . $type : "") . (empty($sRefSupplier) ? "" : "&amp;srefsupplier=" . $sRefSupplier);
$newcardbutton = '';
$arrayofmassactions = array();
$massactionbutton = $form->selectMassAction('', $arrayofmassactions);
$moreforfilter = '';
$topicmail = "Information";
$modelmail = "product";
$objecttmp = new \Product($db);
$trackid = 'prod' . $productstatic->id;
$varpage = empty($contextpage) ? $_SERVER["PHP_SELF"] : $contextpage;
$htmlofselectarray = $form->multiSelectArrayWithCheckbox('selectedfields', $arrayfields, $varpage, \getDolGlobalString('MAIN_CHECKBOX_LEFT_COLUMN'));
// This also change content of $arrayfields with user setup
$selectedfields = $mode != 'kanban' ? $htmlofselectarray : '';
// add filters from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldPreListTitle', $parameters, $productstatic, $action);
$totalarray = ['nbfield' => 0];
// add header cells from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListTitle', $parameters, $productstatic, $action);
// Loop on record
// --------------------------------------------------------------------
$i = 0;
$savnbfield = $totalarray['nbfield'];
$totalarray = array();
$imaxinloop = $limit ? \min($num, $limit) : $num;
$parameters = array('arrayfields' => $arrayfields, 'sql' => $sql);
$reshook = $hookmanager->executeHooks('printFieldListFooter', $parameters, $productstatic, $action);