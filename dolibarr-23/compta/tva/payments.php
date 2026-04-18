<?php

$mode = \GETPOST("mode", 'alpha');
$year = \GETPOSTINT("year");
$filtre = \GETPOST("filtre", 'alpha');
$optioncss = \GETPOST('optioncss', 'alpha');
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = (string) \GETPOST('sortfield', 'aZ09comma');
$sortorder = (string) \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$object = new \Tva($db);
//restrictedArea($user, 'tax|salaries', '', '', 'charges|');
$result = \restrictedArea($user, 'tax', '', 'tva', 'charges');
/*
 * View
 */
$tva_static = new \Tva($db);
$tva = new \Tva($db);
$accountlinestatic = new \AccountLine($db);
$payment_vat_static = new \PaymentVAT($db);
$sal_static = new \PaymentSalary($db);
$title = $langs->trans("VATPayments");
$param = '';
$center = '';
$sql = "SELECT tva.rowid, tva.label as label, b.fk_account, ptva.fk_bank";
$sortfield = (string) $sortfield;
$resql = $db->query($sql);
$sql = "SELECT tva.rowid, tva.label as label, b.fk_account, ptva.fk_bank";