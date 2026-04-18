<?php

$action = \GETPOST('action', 'aZ09');
$list_account_main = array('ACCOUNTING_ACCOUNT_CUSTOMER', 'ACCOUNTING_ACCOUNT_SUPPLIER', 'SALARIES_ACCOUNTING_ACCOUNT_PAYMENT');
$list_account = array();
/*
 * Actions
 */
$error = 0;
$constname = 'ACCOUNTING_ACCOUNT_CUSTOMER_DEPOSIT';
$constvalue = \GETPOSTINT($constname);
$constname = 'ACCOUNTING_ACCOUNT_SUPPLIER_DEPOSIT';
$constvalue = \GETPOSTINT($constname);
$setDisableAuxiliaryAccountOnCustomerDeposit = \GETPOSTINT('value');
$res = \dolibarr_set_const($db, "ACCOUNTING_ACCOUNT_CUSTOMER_USE_AUXILIARY_ON_DEPOSIT", $setDisableAuxiliaryAccountOnCustomerDeposit, 'yesno', 0, '', $conf->entity);
$setDisableAuxiliaryAccountOnSupplierDeposit = \GETPOSTINT('value');
$res = \dolibarr_set_const($db, "ACCOUNTING_ACCOUNT_SUPPLIER_USE_AUXILIARY_ON_DEPOSIT", $setDisableAuxiliaryAccountOnSupplierDeposit, 'yesno', 0, '', $conf->entity);
/*
 * View
 */
$form = new \Form($db);
$formaccounting = new \FormAccounting($db);
$help_url = 'EN:Module_Double_Entry_Accounting#Setup|FR:Module_Comptabilit&eacute;_en_Partie_Double#Configuration';
$linkback = '';