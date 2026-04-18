<?php

$fieldid = \GETPOSTISSET("ref") ? 'ref' : 'rowid';
$result = \restrictedArea($user, 'banque', $id, 'bank_account&bank_account', '', '', $fieldid);
$vline = \GETPOST('vline');
$page = \GETPOSTISSET("page") ? \GETPOST("page") : 0;
/*
 * View
 */
$societestatic = new \Societe($db);
$userstatic = new \User($db);
$facturestatic = new \Facture($db);
$facturefournstatic = new \FactureFournisseur($db);
$socialcontribstatic = new \ChargeSociales($db);
$salarystatic = new \Salary($db);
$vatstatic = new \Tva($db);
$form = new \Form($db);
$object = new \Account($db);
$title = $object->ref . ' - ' . $langs->trans("PlannedTransactions");
$helpurl = "";
// Onglets
$head = \bank_prepare_head($object);
$linkback = '<a href="' . \DOL_URL_ROOT . '/compta/bank/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '';
// Remainder to pay in future
$sqls = array();
// Customer invoices
$sql = "SELECT 'invoice' as family, f.rowid as objid, f.ref as ref, f.total_ttc, f.type, f.date_lim_reglement as dlr,";
// Supplier invoices
$sql = " SELECT 'invoice_supplier' as family, ff.rowid as objid, ff.ref as ref, ff.ref_supplier as ref_supplier, (-1*ff.total_ttc) as total_ttc, ff.type, ff.date_lim_reglement as dlr,";
// Social contributions
$sql = " SELECT 'social_contribution' as family, cs.rowid as objid, cs.libelle as ref, (-1*cs.amount) as total_ttc, ccs.libelle as type, cs.date_ech as dlr,";
// Salaries
$sql = " SELECT 'salary' as family, sa.rowid as objid, sa.label as ref, (-1*sa.amount) as total_ttc, sa.dateep as dlr,";
// VAT
$sql = " SELECT 'vat' as family, t.rowid as objid, t.label as ref, (-1*t.amount) as total_ttc, t.datev as dlr,";
// others sql
$parameters = array();
$reshook = $hookmanager->executeHooks('addMoreSQL', $parameters, $object, $action);
$error = 0;
$tab_sqlobjOrder = array();
$tab_sqlobj = array();
$nbtotalofrecords = 0;
$param = '';
$sortfield = '';
$sortorder = '';
$massactionbutton = '';
$num = 0;
$picto = '';
$morehtml = '';
$limit = 0;
$solde = $object->solde(0);
// Other lines
$parameters = array('solde' => $solde);
$reshook = $hookmanager->executeHooks('printObjectLine', $parameters, $object, $action);