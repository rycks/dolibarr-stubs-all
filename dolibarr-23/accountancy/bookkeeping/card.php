<?php

$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel', 'alpha');
$confirm = \GETPOST('confirm', 'alpha');
$type = \GETPOST('type', 'alpha');
$backtopage = \GETPOST('backtopage', 'alpha');
$optioncss = \GETPOST('optioncss', 'aZ');
// Option for the css output (always '' except when 'print')
$id = \GETPOSTINT('id');
// id of record
$mode = \GETPOST('mode', 'aZ09');
// '' or '_tmp'
$piece_num = \GETPOSTINT("piece_num") ? \GETPOSTINT("piece_num") : \GETPOST('ref');
// id of transaction (several lines share the same transaction id)
$clonedate = (int) \GETPOSTINT('clonedate');
$accountingaccount = new \AccountingAccount($db);
$accountingjournal = new \AccountingJournal($db);
$accountingaccount_number = \GETPOST('accountingaccount_number', 'alphanohtml');
$accountingaccount_label = $accountingaccount->label;
$journal_code = \GETPOST('code_journal', 'alpha');
$journal_label = $accountingjournal->label;
$subledger_account = \GETPOST('subledger_account', 'alphanohtml');
$subledger_label = \GETPOST('subledger_label', 'alphanohtml');
$label_operation = \GETPOST('label_operation', 'alphanohtml');
$debit = (float) \price2num(\GETPOST('debit', 'alpha'));
$credit = (float) \price2num(\GETPOST('credit', 'alpha'));
$save = \GETPOST('save', 'alpha');
$update = \GETPOST('update', 'alpha');
$object = new \BookKeeping($db);
$permissiontoadd = $user->hasRight('accounting', 'mouvements', 'creer');
$permissiontodelete = $user->hasRight('accounting', 'mouvements', 'supprimer');
$numRefModel = \getDolGlobalString('BOOKKEEPING_ADDON', 'mod_bookkeeping_neon');
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$error = 0;
// Delete all lines into the transaction
$toselect_str = \explode(',', \GETPOST('toselect', 'alphanohtml'));
$toselect = array();
/*
 * View
 */
$form = new \Form($db);
$formaccounting = new \FormAccounting($db);
$title = $langs->trans("CreateMvts");
$help_url = 'EN:Module_Double_Entry_Accounting|FR:Module_Comptabilit&eacute;_en_Partie_Double';
$object = new \BookKeeping($db);
$next_num_mvt = $object->getNextNumMvt('_tmp');
/*
print '<tr>';
print '<td>' . $langs->trans("Doctype") . '</td>';
print '<td><input type="text" class="minwidth200 name="doc_type" value=""/></td>';
print '</tr>';
*/
$reshookAddLine = $hookmanager->executeHooks('bookkeepingAddLine', $parameters, $object, $action);