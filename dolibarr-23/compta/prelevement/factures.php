<?php

$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : \str_replace('_', '', \basename(\dirname(__FILE__)) . \basename(__FILE__, '.php'));
// To manage different context of search
$optioncss = \GETPOST('optioncss', 'aZ');
// Option for the css output (always '' except when 'print')
// Get supervariables
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$socid = \GETPOSTINT('socid');
$userid = \GETPOSTINT('userid');
$type = \GETPOST('type', 'aZ09');
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
$salaryBonPl = $object->checkIfSalaryBonPrelevement();
/*
 * View
 */
$form = new \Form($db);
$invoicetmp = new \Facture($db);
$thirdpartytmp = new \Societe($db);
$head = \prelevement_prepare_head($object);
$linkback = '<a href="' . \DOL_URL_ROOT . '/compta/prelevement/orders_list.php?restore_lastsearch_values=1' . ($object->type != 'bank-transfer' ? '' : '&type=bank-transfer') . '">' . $langs->trans("BackToList") . '</a>';
// Get bank account for the payment
$acc = new \Account($db);
$fk_bank_account = $object->fk_bank_account;
$labelofbankfield = "BankToReceiveWithdraw";
$modulepart = 'prelevement';
$labelfororderfield = 'WithdrawalFile';
$sql = "SELECT pf.rowid, p.type,";
// Count total nb of records
$nbtotalofrecords = '';
$resql = $db->query($sql);
$nbtotalofrecords = $db->num_rows($resql);
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$i = 0;
$param = "&id=" . (int) $id;
$massactionbutton = '';
$title = $salaryBonPl ? $langs->trans("Salaries") : ($object->type == 'bank-transfer' ? $langs->trans("SupplierInvoices") : $langs->trans("Invoices"));
$totalinvoices = 0;
$totalamount_requested = 0;
$salarytmp = \null;
$usertmp = \null;
$invoicetmpcustomer = \null;
$invoicetmpsupplier = \null;
$imaxinloop = $limit ? \min($num, $limit) : $num;