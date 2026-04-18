<?php

$type = \GETPOST('type', 'aZ09');
// Security check
$socid = \GETPOSTINT('socid');
/*
 * View
 */
$title = $langs->trans("WithdrawStatistics");
// Define total and nbtotal
$sql = "SELECT sum(pl.amount), count(pl.amount)";
$total = 0;
$nbtotal = 0;
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$i = 0;
$ligne = new \LignePrelevement($db);
$sql = "SELECT sum(pl.amount), count(pl.amount), pl.statut";
$resql = $db->query($sql);
// Define total and nbtotal
$sql = "SELECT sum(pl.amount), count(pl.amount)";
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$i = 0;
/*
 * Stats sur les rejets
 */
$sql = "SELECT sum(pl.amount), count(pl.amount) as cc, pr.motif";
$resql = $db->query($sql);