<?php

\define('CSRFCHECK_WITH_TOKEN', '1');
$id = \GETPOSTINT('id');
$action = \GETPOST('action', 'aZ09');
$backtopage = \GETPOST('backtopage', 'alpha');
$splitamounts = \GETPOST('splitamounts', 'array');
// Security check
$socid = \GETPOSTINT('id') ? \GETPOSTINT('id') : \GETPOSTINT('socid');
$result = \restrictedArea($user, 'societe', $id, '&societe', '', 'fk_soc', 'rowid', 0);
$permissiontocreate = $user->hasRight('societe', 'creer') || $user->hasRight('facture', 'creer');
$error = 0;
$remid = \GETPOSTINT("remid") ? \GETPOSTINT("remid") : 0;
$discount = new \DiscountAbsolute($db);
$res = $discount->fetch($remid);
$amount_ttc_1 = \GETPOST('amount_ttc_1', 'alpha');
$amount_ttc_1 = \price2num($amount_ttc_1);
$amount_ttc_2 = \GETPOST('amount_ttc_2', 'alpha');
$amount_ttc_2 = \price2num($amount_ttc_2);
$error = 0;
$remid = \GETPOSTINT("remid") ? \GETPOSTINT("remid") : 0;
$discount = new \DiscountAbsolute($db);
$res = $discount->fetch($remid);
$amount = \price2num(\GETPOST('amount', 'alpha'), '', 2);
$desc = \GETPOST('desc', 'alpha');
$tva_tx = \GETPOST('tva_tx', 'alpha');
$discount_type = \GETPOSTISSET('discount_type') ? \GETPOST('discount_type', 'alpha') : 0;
$price_base_type = \GETPOST('price_base_type', 'alpha');
$discount = new \DiscountAbsolute($db);
$result = $discount->fetch(\GETPOSTINT("remid"));
$result = $discount->delete($user);
/*
 * View
 */
$form = new \Form($db);
$facturestatic = new \Facture($db);
$facturefournstatic = new \FactureFournisseur($db);
$tmpuser = new \User($db);
// On recupere les donnees societes par l'objet
$object = new \Societe($db);
$isCustomer = $object->client == 1 || $object->client == 3;
$isSupplier = $object->fournisseur == 1;
// Display tabs
$head = \societe_prepare_head($object);
$linkback = '<a href="' . \DOL_URL_ROOT . '/societe/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';