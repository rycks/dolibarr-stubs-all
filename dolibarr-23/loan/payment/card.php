<?php

// Security check
$id = \GETPOSTINT("id");
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm');
// TODO ajouter regle pour restreindre access paiement
//restrictedArea($user, 'facture', $id,'');
$payment = new \PaymentLoan($db);
$result = $payment->fetch($id);
$sql = "UPDATE " . \MAIN_DB_PREFIX . "loan_schedule SET fk_bank = 0 WHERE fk_bank = " . (int) $payment->fk_bank;
$fk_loan = $payment->fk_loan;
$result = $payment->delete($user);
/*
 * View
 */
$loan = new \Loan($db);
$form = new \Form($db);
$title = $langs->trans('Loans');
$help_url = "EN:Module_Loan|FR:Module_Emprunt";
$h = 0;
$hselected = (string) $h;
$linkback = '';
$morehtmlref = '';
$morehtmlstatus = '';
/*
 * List of loans paid
 */
$disable_delete = 0;
$sql = 'SELECT l.rowid as id, l.label, l.paid, l.capital as capital, pl.amount_capital, pl.amount_insurance, pl.amount_interest';
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$i = 0;
$total = 0;