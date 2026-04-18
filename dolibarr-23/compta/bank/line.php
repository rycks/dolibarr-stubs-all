<?php

$id = \GETPOSTINT('rowid');
$rowid = \GETPOSTINT('rowid');
$accountoldid = \GETPOSTINT('account');
// GETPOST('account') is old account id
$accountid = \GETPOSTINT('accountid');
// GETPOST('accountid') is new account id
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$orig_account = \GETPOST("orig_account");
$backtopage = \GETPOST('backtopage', 'alpha');
$cancel = \GETPOST('cancel', 'alpha');
// Security check
$fieldvalue = !empty($id) ? $id : (!empty($ref) ? $ref : '');
$fieldtype = !empty($ref) ? 'ref' : 'rowid';
$socid = 0;
$result = \restrictedArea($user, 'banque', $accountoldid, 'bank_account');
$object = new \AccountLine($db);
$extrafields = new \ExtraFields($db);
$result = $object->fetch($id);
/*
 * Actions
 */
$error = 0;
$parameters = array('socid' => $socid);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$cat1 = \GETPOSTINT("cat1");
$acsource = new \Account($db);
$actarget = new \Account($db);
$num_rel = \trim(\GETPOST("num_rel"));
$rappro = \GETPOST('reconciled') ? 1 : 0;
/*
 * View
 */
$form = new \Form($db);
$arrayselected = array();
$c = new \Categorie($db);
$cats = $c->containing($rowid, \Categorie::TYPE_BANK_LINE);
$head = \bankline_prepare_head($rowid);
$sql = "SELECT b.rowid, b.dateo as do, b.datev as dv, b.amount, b.label, b.rappro,";
$result = $db->query($sql);
$i = 0;
$total = 0;