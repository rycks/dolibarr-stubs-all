<?php

$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel', 'alpha');
$id = \GETPOSTINT('socid') ? \GETPOSTINT('socid') : \GETPOSTINT('id');
$result = \restrictedArea($user, 'societe&fournisseur', $id, '&societe', '', 'rowid');
$object = new \Fournisseur($db);
$extrafields = new \ExtraFields($db);
$permissiontoadd = $user->hasRight('societe', 'creer');
$permissiontoeditextra = $permissiontoadd;
// Security check
$result = \restrictedArea($user, 'societe', $id, '&societe', '', 'fk_soc', 'rowid', 0);
/*
 * Actions
 */
$error = 0;
$parameters = array('id' => $id);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$contactstatic = new \Contact($db);
$form = new \Form($db);
// Load data of third party
$res = $object->fetch($id);
$title = $langs->trans("ThirdParty") . " - " . $langs->trans('Supplier');
$help_url = '';
/*
 * Show tabs
 */
$head = \societe_prepare_head($object);
$linkback = '<a href="' . \DOL_URL_ROOT . '/societe/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
//print $langs->trans('VATIntra').'</td><td>';
$vattoshow = $object->tva_intra ? \showValueWithClipboardCPButton(\dol_escape_htmltag($object->tva_intra)) : '';
$form = new \Form($db);
$amount_discount = $object->getAvailableDiscounts(\null, '', 0, 1);
// Other attributes
$parameters = array('socid' => $object->id, 'colspan' => ' colspan="3"', 'colspanvalue' => '3');
$boxstat = '';
// Nbre max d'elements des petites listes
$MAXLIST = \getDolGlobalInt('MAIN_SIZE_SHORTLIST_LIMIT', 5);
$parameters = array();
$reshook = $hookmanager->executeHooks('addMoreBoxStatsSupplier', $parameters, $object, $action);
$MAXLIST = \getDolGlobalInt('MAIN_SIZE_SHORTLIST_LIMIT', 5);
/*
 * Latest supplier proposal
 */
$proposalstatic = new \SupplierProposal($db);
/*
 * Latest supplier orders
 */
$orderstatic = new \CommandeFournisseur($db);
$orders2invoice = 0;
$facturestatic = new \FactureFournisseur($db);
// Allow external modules to add their own shortlist of recent objects
$parameters = array();
$reshook = $hookmanager->executeHooks('addMoreRecentObjects', $parameters, $object, $action);
$parameters = array();
$reshook = $hookmanager->executeHooks('addMoreActionsButtons', $parameters, $object, $action);