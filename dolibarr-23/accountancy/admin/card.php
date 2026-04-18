<?php

/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
$error = 0;
$action = \GETPOST('action', 'aZ09');
$backtopage = \GETPOST('backtopage', 'alpha');
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$rowid = \GETPOSTINT('rowid');
$cancel = \GETPOST('cancel', 'alpha');
$account_number = \GETPOST('account_number', 'alphanohtml');
$label = \GETPOST('label', 'alpha');
$object = new \AccountingAccount($db);
/*
 * View
 */
$form = new \Form($db);
$formaccounting = new \FormAccounting($db);
$accountsystem = new \AccountancySystem($db);
$title = $langs->trans('AccountAccounting') . " - " . $langs->trans('Card');
$help_url = 'EN:Module_Double_Entry_Accounting#Setup|FR:Module_Comptabilit&eacute;_en_Partie_Double#Configuration';
$sql = "SELECT DISTINCT pcg_type FROM " . \MAIN_DB_PREFIX . "accounting_account";
// just as a sanity check
$resql = $db->query($sql);