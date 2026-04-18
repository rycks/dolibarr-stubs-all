<?php

$outputlangs = $langs;
// Security check
$id = \GETPOST('rowid') ? \GETPOSTINT('rowid') : \GETPOSTINT('id');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
// TODO Add rule to restrict access payment
//restrictedArea($user, 'facture', $id,'');
$object = new \PaymentDonation($db);
$result = $object->fetch($id);
$permissiontoread = $user->hasRight('don', 'lire');
$permissiontoadd = $user->hasRight('don', 'creer');
$permissiontodelete = $user->hasRight('don', 'supprimer');
$result = $object->delete($user);
/*
 * View
 */
$title = $langs->trans("Payment");
$don = new \Don($db);
$form = new \Form($db);
$h = 0;
$head = array();
$hselected = (string) $h;
/*
 * List of donations paid
 */
$disable_delete = 0;
$sql = 'SELECT d.rowid as did, d.paid, d.amount as d_amount, pd.amount';
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$i = 0;
$total = 0;