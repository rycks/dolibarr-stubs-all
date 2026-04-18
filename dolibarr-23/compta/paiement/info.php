<?php

$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$socid = \GETPOSTINT('socid');
$object = new \Paiement($db);
// Must be 'include', not 'include_once'.
$result = \restrictedArea($user, $object->element, $object->id, 'paiement', '');
/*
 * Actions
 */
// None
/*
 * View
 */
$form = new \Form($db);
$head = \payment_prepare_head($object);
$linkback = '<a href="' . \DOL_URL_ROOT . '/compta/paiement/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';