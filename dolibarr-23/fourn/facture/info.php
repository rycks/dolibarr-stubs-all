<?php

$action = \GETPOST('action', 'aZ09');
$id = \GETPOSTINT("facid") ? \GETPOSTINT("facid") : \GETPOSTINT("id");
$ref = \GETPOST("ref", 'alpha');
$result = \restrictedArea($user, 'fournisseur', $id, 'facture_fourn', 'facture');
$object = new \FactureFournisseur($db);
$usercancreate = $user->hasRight("fournisseur", "facture", "creer") || $user->hasRight("supplier_invoice", "creer");
$permissiontoadd = $usercancreate;
/*
 * View
 */
$form = new \Form($db);
$alreadypaid = $object->getSommePaiement();
$title = $object->ref . " - " . $langs->trans('Info');
$helpurl = "EN:Module_Suppliers_Invoices|FR:Module_Fournisseurs_Factures|ES:Módulo_Facturas_de_proveedores";
$head = \facturefourn_prepare_head($object);
$titre = $langs->trans('SupplierInvoice');
$linkback = '<a href="' . \DOL_URL_ROOT . '/fourn/facture/list.php?restore_lastsearch_values=1' . (!empty($socid) ? '&socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';