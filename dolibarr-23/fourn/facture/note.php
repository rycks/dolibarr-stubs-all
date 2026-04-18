<?php

$id = \GETPOSTINT('id') ? \GETPOSTINT('id') : \GETPOSTINT('facid');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$result = \restrictedArea($user, 'fournisseur', $id, 'facture_fourn', 'facture');
$object = new \FactureFournisseur($db);
$usercancreate = $user->hasRight("fournisseur", "facture", "creer") || $user->hasRight("supplier_invoice", "creer");
$permissiontoadd = $usercancreate;
$permissionnote = $user->hasRight("fournisseur", "facture", "creer") || $user->hasRight("supplier_invoice", "creer");
// Used by the include of actions_setnotes.inc.php
/*
 * Actions
 */
$reshook = $hookmanager->executeHooks('doActions', array(), $object, $action);
$result = $object->update($user);
/*
 * View
 */
$form = new \Form($db);
$title = $object->ref . " - " . $langs->trans('Notes');
$helpurl = "EN:Module_Suppliers_Invoices|FR:Module_Fournisseurs_Factures|ES:Módulo_Facturas_de_proveedores";
$alreadypaid = $object->getSommePaiement();
$head = \facturefourn_prepare_head($object);
$titre = $langs->trans('SupplierInvoice');
// Supplier invoice card
$linkback = '<a href="' . \DOL_URL_ROOT . '/fourn/facture/list.php?restore_lastsearch_values=1' . (!empty($socid) ? '&socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
$cssclass = "titlefield";