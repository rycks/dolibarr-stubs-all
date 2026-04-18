<?php

$action = \GETPOST('action', 'aZ09');
$id = \GETPOSTINT('id');
$socid = \GETPOSTINT('socid');
$permissiontoadd = $user->hasRight('supplier_proposal', 'creer');
/*
 * Actions
 */
// None
/*
 *	View
 */
$form = new \Form($db);
$object = new \SupplierProposal($db);
$title = $object->ref . " - " . $langs->trans('Info');
$help_url = 'EN:Ask_Price_Supplier|FR:Demande_de_prix_fournisseur';
$head = \supplier_proposal_prepare_head($object);
// Supplier proposal card
$linkback = '<a href="' . \DOL_URL_ROOT . '/supplier_proposal/list.php?restore_lastsearch_values=1' . (!empty($socid) ? '&socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';