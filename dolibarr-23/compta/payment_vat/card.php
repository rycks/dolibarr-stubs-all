<?php

// Security check
$id = \GETPOSTINT("id");
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm');
// TODO ajouter regle pour restreindre access paiement
//restrictedArea($user, 'facture', $id,'');
$object = new \PaymentVAT($db);
$result = $object->fetch($id);
$result = $object->delete($user);
$outputlangs = $langs;
$tva = new \Tva($db);
$form = new \Form($db);
$h = 0;
$head = array();
$hselected = (string) $h;
$linkback = '<a href="' . \DOL_URL_ROOT . '/compta/tva/payments.php">' . $langs->trans("BackToList") . '</a>';
/*
 * List of social contributions paid
 */
$disable_delete = 0;
$sql = 'SELECT f.rowid as scid, f.label as label, f.paye, f.amount as tva_amount, pf.amount';
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$i = 0;
$total = 0;