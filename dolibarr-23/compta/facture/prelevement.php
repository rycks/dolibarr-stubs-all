<?php

$id = \GETPOSTINT('id') ? \GETPOSTINT('id') : \GETPOSTINT('facid');
// For backward compatibility
$ref = \GETPOST('ref', 'alpha');
$socid = \GETPOSTINT('socid');
$action = \GETPOST('action', 'aZ09');
$type = \GETPOST('type', 'aZ09');
$fieldid = !empty($ref) ? 'ref' : 'rowid';
$moreparam = '';
// Load object
$isdraft = 1;
$ret = $object->fetch($id, $ref);
$isdraft = $object->status == \FactureFournisseur::STATUS_DRAFT ? 1 : 0;
$result = \restrictedArea($user, 'fournisseur', $id, 'facture_fourn', 'facture', 'fk_soc', $fieldid, $isdraft);
/*
 * Actions
 */
$parameters = array('socid' => $socid);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$now = \dol_now();
$selleruserevenustamp = $mysoc->useRevenueStamp();
$totalpaid = $object->getSommePaiement();
$totalcreditnotes = $object->getSumCreditNotesUsed();
$totaldeposits = $object->getSumDepositsUsed();
//print "totalpaid=".$totalpaid." totalcreditnotes=".$totalcreditnotes." totaldeposts=".$totaldeposits;
// We can also use bcadd to avoid pb with floating points
// For example print 239.2 - 229.3 - 9.9; does not return 0.
//$resteapayer=bcadd($object->total_ttc,$totalpaid,$conf->global->MAIN_MAX_DECIMALS_TOT);
//$resteapayer=bcadd($resteapayer,$totalavoir,$conf->global->MAIN_MAX_DECIMALS_TOT);
$resteapayer = \price2num($object->total_ttc - $totalpaid - $totalcreditnotes - $totaldeposits, 'MT');
$author = new \User($db);
$numopen = 0;
$pending = 0;
$numclosed = 0;
// How many Direct debit or Credit transfer open requests ?
$listofopendirectdebitorcredittransfer = $object->getListOfOpenDirectDebitOrCreditTransfer($type);
$numopen = \count($listofopendirectdebitorcredittransfer);
$morehtmlref = '<div class="refidno">';
$backtopage = \urlencode($_SERVER["PHP_SELF"] . '?facid=' . $object->id);
$cannotApplyDiscount = 1;
$filtertype = 'CRDT';
$sign = 1;
$resteapayer = \price2num($object->total_ttc - $totalpaid - $totalcreditnotes - $totaldeposits, 'MT');
// Hook to change amount for other reasons, e.g. apply cash discount for payment before agreed date
$parameters = array('remaintopay' => $resteapayer);
$reshook = $hookmanager->executeHooks('finalizeAmountOfInvoice', $parameters, $object, $action);
// For which amount ?
// Note: The 2 following SQL requests are wrong but it works because we have one record into pfd for one record into pl and for into p for the same fk_facture_fourn.
// The table prelevement and prelevement_lignes and must be removed in future and merged into prelevement_demande
// Step 1: Move field fk_... of llx_prelevement into llx_prelevement_lignes
// Step 2: Move field fk_... + status into prelevement_demande.
$pending = 0;
// Get pending requests open with no transfer receipt yet
$sql = "SELECT SUM(pfd.amount) as amount";
//$sql .= " AND pfd.type = 'ban'";
$resql = $db->query($sql);
// Get pending request with a transfer receipt generated but not yet processed
$sqlPending = "SELECT SUM(pl.amount) as amount";
$resPending = $db->query($sqlPending);
$buttonlabel = $langs->trans("MakeWithdrawRequest");
$user_perms = $user->hasRight('prelevement', 'bons', 'creer');
$sql = "SELECT pfd.rowid, pfd.traite, pfd.date_demande as date_demande,";
$resql = $db->query($sql);
$num = 0;
// Past requests
$sql = "SELECT pfd.rowid, pfd.traite, pfd.date_demande, pfd.date_traite, pfd.fk_prelevement_bons, pfd.amount, pfd.fk_societe_rib, pfd.ext_payment_id, pfd.ext_payment_site,";
$resql = $db->query($sql);