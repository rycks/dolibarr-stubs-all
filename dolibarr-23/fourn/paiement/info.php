<?php

// Get Parameters
$id = \GETPOSTINT('id');
// Initialize Objects
$object = new \PaiementFourn($db);
// Must be 'include', not 'include_once'.
$result = \restrictedArea($user, $object->element, $object->id, 'paiementfourn', '');
// Security check
$socid = '';
$head = \payment_supplier_prepare_head($object);
$linkback = '<a href="' . \DOL_URL_ROOT . '/fourn/paiement/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';