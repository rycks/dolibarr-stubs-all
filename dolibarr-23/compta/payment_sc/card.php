<?php

// Security check
$id = \GETPOSTINT("id");
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'aZ09');
$object = new \PaymentSocialContribution($db);
$result = $object->fetch($id);
$result = \restrictedArea($user, 'payment_sc', $object, '');
$result = $object->delete($user);
$socialcontrib = new \ChargeSociales($db);
$form = new \Form($db);
$h = 0;
$head = array();
$hselected = (string) $h;
$linkback = '<a href="' . \DOL_URL_ROOT . '/compta/sociales/payments.php">' . $langs->trans("BackToList") . '</a>';
/*
 * List of social contributions paid
 */
$disable_delete = 0;
$sql = 'SELECT f.rowid as scid, f.libelle as label, f.paye, f.amount as sc_amount, pf.amount, pc.libelle as sc_type';
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$i = 0;
$total = 0;