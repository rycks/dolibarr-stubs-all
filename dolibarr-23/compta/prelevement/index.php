<?php

// Security check
$socid = \GETPOSTINT('socid');
$result = \restrictedArea($user, 'prelevement', '', 'bons');
$usercancreate = $user->hasRight('prelevement', 'bons', 'creer');
$newcardbutton = '';
$thirdpartystatic = new \Societe($db);
$invoicestatic = new \Facture($db);
$bprev = new \BonPrelevement($db);
/*
 * Invoices waiting for direct debit
 */
$sql = "SELECT f.ref, f.rowid, f.total_ttc, f.fk_statut as status, f.paye, f.type,";
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$i = 0;
/*
 * Direct debit orders
 */
$limit = 5;
$sql = "SELECT p.rowid, p.ref, p.amount, p.datec, p.statut";
$result = $db->query($sql);
$num = $db->num_rows($result);
$i = 0;