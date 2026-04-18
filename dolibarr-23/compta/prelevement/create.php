<?php

// Get supervariables
$action = \GETPOST('action', 'aZ09');
$massaction = \GETPOST('massaction', 'alpha');
// The bulk action (combo box choice into lists)
$toselect = \GETPOST('toselect', 'array:int');
// Array of ids of elements selected into a list
$mode = \GETPOST('mode', 'alpha') ? \GETPOST('mode', 'alpha') : 'real';
$type = \GETPOST('type', 'aZ09');
$sourcetype = \GETPOST('sourcetype', 'aZ09');
$format = \GETPOST('format', 'aZ09');
$id_bankaccount = \GETPOSTINT('id_bankaccount');
$executiondate = \dol_mktime(0, 0, 0, \GETPOSTINT('remonth'), \GETPOSTINT('reday'), \GETPOSTINT('reyear'));
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
// Security check
$socid = \GETPOSTINT('socid');
$error = 0;
$option = "";
$mesg = '';
$object = new \BonPrelevement($db);
$parameters = array('mode' => $mode, 'format' => $format, 'limit' => $limit, 'page' => $page, 'offset' => $offset);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$objectclass = "BonPrelevement";
/*
 * View
 */
$form = new \Form($db);
$thirdpartystatic = new \Societe($db);
$bprev = new \BonPrelevement($db);
$arrayofselected = \is_array($toselect) ? $toselect : array();
// List of mass actions available
$arrayofmassactions = array();
$massactionbutton = $form->selectMassAction('', $arrayofmassactions);
$modulenametoshow = "Withdraw";
$title = $langs->trans("NewStandingOrder");
// @phan-suppress-next-line PhanPluginSuspiciousParamPosition
$head = \bon_prelevement_prepare_head($bprev, $bprev->nbOfInvoiceToPay($type), $bprev->nbOfInvoiceToPay($type, 'salary'));
$labeltoshow = $langs->trans("NbOfInvoiceToWithdraw");
$sql = "SELECT f.ref, f.rowid, f.total_ttc, s.nom as name, s.rowid as socid,";
$nbtotalofrecords = '';
$result = $db->query($sql);
$nbtotalofrecords = $db->num_rows($result);
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$i = 0;
$param = '';
$title = $langs->trans("InvoiceWaitingWithdraw");
$picto = 'bill';
$tradinvoice = "Invoice";