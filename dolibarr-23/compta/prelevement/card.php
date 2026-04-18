<?php

// Get supervariables
$action = \GETPOST('action', 'aZ09');
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$socid = \GETPOSTINT('socid');
$type = \GETPOST('type', 'aZ09');
$date_trans = \dol_mktime(\GETPOSTINT('date_transhour'), \GETPOSTINT('date_transmin'), \GETPOSTINT('date_transsec'), \GETPOSTINT('date_transmonth'), \GETPOSTINT('date_transday'), \GETPOSTINT('date_transyear'));
// Load variable for pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$object = new \BonPrelevement($db);
$type = $object->type;
// Check if salary or invoice
$salaryBonPl = $object->checkIfSalaryBonPrelevement();
/*
 * Actions
 */
$parameters = array('socid' => $socid);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$head = \prelevement_prepare_head($object);
$linkback = '<a href="' . \DOL_URL_ROOT . '/compta/prelevement/orders_list.php?restore_lastsearch_values=1' . ($object->type != 'bank-transfer' ? '' : '&type=bank-transfer') . '">' . $langs->trans("BackToList") . '</a>';
// Get bank account for the payment
$acc = new \Account($db);
$fk_bank_account = $object->fk_bank_account;
// Bank account
$labelofbankfield = "BankToReceiveWithdraw";
//print $langs->trans($labelofbankfield);
$caneditbank = $permissiontoadd;
$labelfororderfield = 'WithdrawalFile';
$modulepart = 'prelevement';
// Other attributes
$parameters = array();
$reshook = $hookmanager->executeHooks('formObjectOptions', $parameters, $object, $action);
$formconfirm = '';
$ligne = new \LignePrelevement($db);
// Count total nb of records
$nbtotalofrecords = '';
$result = $db->query($sql);