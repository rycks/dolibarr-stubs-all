<?php

$action = \GETPOST('action', 'aZ09');
$id = \GETPOSTINT('account') ? \GETPOSTINT('account') : \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$dvid = \GETPOST('dvid', 'alpha');
$numref = \GETPOST('num', 'alpha');
$ve = \GETPOST("ve", 'alpha');
$brref = \GETPOST('brref', 'alpha');
$oldbankreceipt = \GETPOST('oldbankreceipt', 'alpha');
$newbankreceipt = \GETPOST('newbankreceipt', 'alpha');
$rel = \GETPOST("rel", 'alphanohtml');
$backtopage = \GETPOST('backtopage', 'alpha');
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT('page');
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$object = new \Account($db);
// Initialize a technical object to manage context to save list fields
$contextpage = 'banktransactionlist' . (empty($object->ref) ? '' : '-' . $object->id);
// Security check
$fieldid = !empty($ref) ? $ref : $id;
$fieldname = !empty($ref) ? 'ref' : 'rowid';
$result = \restrictedArea($user, 'banque', $fieldid, 'bank_account', '', '', $fieldname);
$error = 0;
// Define number of receipt to show (current, previous or next one ?)
$foundprevious = '';
$foundnext = '';
// Search previous receipt number
$sql = "SELECT b.num_releve as num";
$resql = $db->query($sql);
$numrows = $db->num_rows($resql);
// Search next receipt
$sql = "SELECT b.num_releve as num";
$resql = $db->query($sql);
$numrows = $db->num_rows($resql);
$sql = "SELECT b.rowid, b.dateo as do, b.datev as dv,";
// We add date of creation to have correct order when everything is done the same day
$sqlrequestforbankline = $sql;
// Test to check newbankreceipt does not exists yet
$sqltest = "SELECT b.rowid FROM " . \MAIN_DB_PREFIX . "bank as b, " . \MAIN_DB_PREFIX . "bank_account as ba";
// Need the first one only
$resql = $db->query($sqltest);
$action = 'view';
/*
 * View
 */
$form = new \Form($db);
$societestatic = new \Societe($db);
$chargestatic = new \ChargeSociales($db);
$memberstatic = new \Adherent($db);
$paymentstatic = new \Paiement($db);
$paymentsupplierstatic = new \PaiementFourn($db);
$paymentvatstatic = new \Tva($db);
$bankstatic = new \Account($db);
$banklinestatic = new \AccountLine($db);
$remisestatic = new \RemiseCheque($db);
$paymentdonationstatic = new \PaymentDonation($db);
$paymentloanstatic = new \PaymentLoan($db);
$paymentvariousstatic = new \PaymentVarious($db);
// Must be before button action
$param = '';
$sortfield = 'numr';
$sortorder = 'DESC';
// List of all standing receipts
$sql = "SELECT DISTINCT(b.num_releve) as numr";
// Count total nb of records
$totalnboflines = 0;
$resql = $db->query($sql);