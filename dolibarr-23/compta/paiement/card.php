<?php

$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$backtopage = \GETPOST('backtopage', 'alpha');
$socid = \GETPOSTINT('socid');
$object = new \Paiement($db);
// Must be 'include', not 'include_once'.
$result = \restrictedArea($user, $object->element, $object->id, 'paiement');
$stripecu = \null;
$stripeacc = \null;
$service = 'StripeTest';
$servicestatus = 0;
$site_account = $stripearrayofkeysbyenv[$servicestatus]['publishable_key'];
$stripe = new \Stripe($db);
$stripeacc = $stripe->getStripeAccount($service);
$error = 0;
/*
 * Actions
 */
$parameters = array('socid' => $socid);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$thirdpartystatic = new \Societe($db);
$result = $object->fetch($id, $ref);
$form = new \Form($db);
$head = \payment_prepare_head($object);
$linkback = '<a href="' . \DOL_URL_ROOT . '/compta/paiement/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
// Payment type (VIR, LIQ, ...)
$labeltype = $langs->trans("PaymentType" . $object->type_code) != "PaymentType" . $object->type_code ? $langs->trans("PaymentType" . $object->type_code) : $object->type_label;
$disable_delete = 0;
$bankline = \null;
$bankline = new \AccountLine($db);
// Other attributes
$cols = 2;
// Other attributes
$parameters = array();
$reshook = $hookmanager->executeHooks('formObjectOptions', $parameters, $object, $action);
/*
 * List of invoices
 */
$sql = 'SELECT f.rowid as facid, f.ref, f.type, f.total_ttc, f.paye, f.entity, f.fk_statut, pf.amount, s.nom as name, s.rowid as socid';
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$i = 0;
$total = 0;
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListTitle', $parameters, $object, $action);
$params = array();