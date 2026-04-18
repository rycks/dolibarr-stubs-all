<?php

$id = \GETPOSTINT('id');
$action = \GETPOST('action', 'aZ09');
// Security check
$socid = \GETPOSTINT("socid");
$result = \restrictedArea($user, 'banque', '', '', '');
$object = new \PaymentVarious($db);
$result = $object->fetch($id);
$head = \various_payment_prepare_head($object);
$morehtmlref = '<div class="refidno">';
$formproject = new \FormProjets($db);
$linkback = '<a href="' . \DOL_URL_ROOT . '/compta/bank/various_payment/list.php?restore_lastsearch_values=1' . (!empty($socid) ? '&socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlstatus = '';