<?php

/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
$loanid = \GETPOSTINT('loanid');
$action = \GETPOST('action', 'aZ09');
// Security check
$socid = 0;
$object = new \Loan($db);
$echeances = new \LoanSchedule($db);
$permissiontoadd = $user->hasRight('loan', 'write');
$i = 1;
$i = 1;
/*
 * View
 */
$form = new \Form($db);
$formproject = new \FormProjets($db);
$title = $langs->trans("Loan") . ' - ' . $langs->trans("FinancialCommitment");
$help_url = 'EN:Module_Loan|FR:Module_Emprunt';
$head = \loan_prepare_head($object);
$linkback = '<a href="' . \DOL_URL_ROOT . '/loan/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
$morehtmlstatus = '';
$colspan = 6;