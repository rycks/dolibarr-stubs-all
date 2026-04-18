<?php

// Security check
$socid = \GETPOSTINT('socid');
$result = \restrictedArea($user, 'paymentbybanktransfer', '', '');
$usercancreate = $user->hasRight('paymentbybanktransfer', 'create');
$thirdpartystatic = new \Societe($db);
$invoicestatic = new \FactureFournisseur($db);
$bprev = new \BonPrelevement($db);
$salary = new \Salary($db);
$userstatic = new \User($db);
$newcardbutton = '';
$totaltoshow = 0;
$sql = "SELECT f.ref, f.rowid, f.total_ttc, f.fk_statut, f.paye, f.type, f.datef, f.date_lim_reglement,";
$resql = $db->query($sql);
$sqlForSalary = "SELECT * FROM " . \MAIN_DB_PREFIX . "salary as s, " . \MAIN_DB_PREFIX . "prelevement_demande as pd";
$resql2 = $db->query($sqlForSalary);
/*
 * Withdraw receipts
 */
$limit = 5;
$sql = "SELECT p.rowid, p.ref, p.amount, p.datec, p.date_trans, p.statut as status, p.type";
$result = $db->query($sql);
$num = $db->num_rows($result);
$i = 0;