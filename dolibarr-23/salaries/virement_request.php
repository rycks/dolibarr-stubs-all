<?php

$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$type = 'salaire';
$label = \GETPOST('label', 'alphanohtml');
$projectid = \GETPOSTINT('projectid') ? \GETPOSTINT('projectid') : \GETPOSTINT('fk_project');
// Security check
$socid = \GETPOSTINT('socid');
$object = new \Salary($db);
$extrafields = new \ExtraFields($db);
$childids = $user->getAllChildIds(1);
$object = new \Salary($db);
// Check current user can read this salary
$canread = 0;
$permissiontoread = $user->hasRight('salaries', 'read');
$permissiontoadd = $user->hasRight('salaries', 'write');
// Used by the include of actions_addupdatedelete.inc.php and actions_linkedfiles
$permissiontodelete = $user->hasRight('salaries', 'delete') || $permissiontoadd && isset($object->status) && $object->status == $object::STATUS_UNPAID;
$moreparam = '';
$ret = $object->fetch($id);
$isdraft = $obj->status == \FactureFournisseur::STATUS_DRAFT ? 1 : 0;
$parameters = array('socid' => $socid);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $obj, $action);
$result = $object->setPaymentMethods(\GETPOSTINT('mode_reglement_id'));
$result = $object->setBankAccount(\GETPOSTINT('fk_account'));
$action = '';
/*
 * View
 */
$form = new \Form($db);
$title = $langs->trans('Salary') . " - " . $langs->trans('Info');
$help_url = "";
$head = \salaries_prepare_head($object);
$linkback = '<a href="' . \DOL_URL_ROOT . '/salaries/list.php?restore_lastsearch_values=1' . (!empty($socid) ? '&socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
$userstatic = new \User($db);
$usercancreate = $permissiontoadd;
$totalpaid = $object->getSommePaiement();
$user_perms = $user->hasRight('virement', 'bons', 'creer');
$buttonlabel = $langs->trans("MakeTransferRequest");
$user_perms = $user->hasRight('paymentbybanktransfer', 'create');
/*
 * Payments
 */
$sql = "SELECT p.rowid, p.num_payment as num_payment, p.datep as dp, p.amount,";
$resteapayer = 0;
//print $sql;
$resql = $db->query($sql);
$totalpaid = 0;
$num = $db->num_rows($resql);
$i = 0;
$total = 0;
// print '<tr><td colspan="'.$nbcols.'" class="right">'.$langs->trans("AlreadyPaid").' :</td><td class="right nowrap amountcard">'.price($totalpaid)."</td></tr>\n";
// print '<tr><td colspan="'.$nbcols.'" class="right">'.$langs->trans("AmountExpected").' :</td><td class="right nowrap amountcard">'.price($object->amount)."</td></tr>\n";
$resteapayer = (float) $object->amount - $totalpaid;
$sql = "SELECT pfd.rowid, pfd.traite, pfd.date_demande as date_demande,";
$resql = $db->query($sql);
$hadRequest = $db->num_rows($resql);
$bprev = new \BonPrelevement($db);
$num = 0;
$i = 0;
$tmpuser = new \User($db);
$num = $db->num_rows($resql);
// Past requests when bon prelevement
$sql = "SELECT pfd.rowid, pfd.traite, pfd.date_demande as date_demande,";
$numOfBp = 0;
$resql = $db->query($sql);
$numOfBp = $db->num_rows($resql);
$i = 0;
$tmpuser = new \User($db);