<?php

$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel', 'alpha');
$backtopage = \GETPOST('backtopage', 'alpha');
$backtopageforcancel = \GETPOST('backtopageforcancel', 'alpha');
$object = new \Account($db);
$extrafields = new \ExtraFields($db);
// Security check
$id = \GETPOSTINT("id") ? \GETPOSTINT("id") : \GETPOST('ref');
$fieldid = \GETPOSTINT("id") ? 'rowid' : 'ref';
$result = \restrictedArea($user, 'banque', $id, 'bank_account&bank_account', '', '', $fieldid);
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$backurlforlist = \DOL_URL_ROOT . '/compta/bank/list.php';
/*
 * View
 */
$form = new \Form($db);
$formbank = new \FormBank($db);
$formcompany = new \FormCompany($db);
$formaccounting = new \FormAccounting($db);
$countrynotdefined = $langs->trans("ErrorSetACountryFirst") . ' (' . $langs->trans("SeeAbove") . ')';
$help_url = 'EN:Module_Banks_and_Cash|FR:Module_Banques_et_Caisses|ES:Módulo_Bancos_y_Cajas|DE:Modul_Banken_und_Barbestände';
$title = $langs->trans("BankAccount");
$selectedcode = $object->currency_code;
// Bank country
$selectedcode = '';
// Bank address
$type = \GETPOSTISSET("type") ? \GETPOSTINT('type') : \Account::TYPE_CURRENT;
$doleditor = new \DolEditor('account_comment', \GETPOST("account_comment") ? \GETPOST("account_comment") : $object->comment, '', 90, 'dolibarr_notes', '', \false, \true, \isModEnabled('fckeditor') && \getDolGlobalInt('FCKEDITOR_ENABLE_SOCIETE'), \ROWS_4, '90%');
// Other attributes
$parameters = array();
$reshook = $hookmanager->executeHooks('formObjectOptions', $parameters, $object, $action);
$startdate = \dol_mktime(12, 0, 0, \GETPOSTINT("remonth"), \GETPOSTINT('reday'), \GETPOSTINT("reyear"));
$type = \GETPOSTISSET("type") ? \GETPOSTINT('type') : \Account::TYPE_CURRENT;
// Accountancy code
$fieldrequired = '';