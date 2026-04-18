<?php

$id = \GETPOSTINT('id');
$action = \GETPOST('action', 'aZ09');
$object = new \Tva($db);
// Security check
$socid = \GETPOSTINT('socid');
$result = \restrictedArea($user, 'tax', '', 'tva', 'charges');
$result = $object->setValueFrom('label', \GETPOST('lib', 'alpha'), '', \null, 'text', '', $user, 'TAX_MODIFY');
/*
 * View
 */
$title = $langs->trans("VAT") . " - " . $langs->trans("Info");
$help_url = '';
$object = new \Tva($db);
$head = \vat_prepare_head($object);
$morehtmlref = '<div class="refidno">';
$linkback = '<a href="' . \DOL_URL_ROOT . '/compta/tva/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';