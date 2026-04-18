<?php

// Get parameters
$id = \GETPOSTINT('id');
$action = \GETPOST('action', 'alpha');
$confirm = \GETPOST('confirm');
$cancel = \GETPOST('cancel', 'alpha');
$backtopage = \GETPOST('backtopage', 'alpha');
$accountid = \GETPOSTINT("accountid") > 0 ? \GETPOSTINT("accountid") : 0;
$label = \GETPOST("label", "alpha");
$sens = \GETPOSTINT("sens");
$amount = \GETPOST("amount");
$paymenttype = \GETPOST("paymenttype", "aZ09");
$accountancy_code = \GETPOST("accountancy_code", "alpha");
$projectid = \GETPOSTINT('projectid') ? \GETPOSTINT('projectid') : \GETPOSTINT('fk_project');
// Security check
$socid = \GETPOSTINT("socid");
$result = \restrictedArea($user, 'banque', '', '', '');
$object = new \PaymentVarious($db);
$permissiontoadd = $user->hasRight('banque', 'modifier');
$permissiontodelete = $user->hasRight('banque', 'modifier');
/**
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$originalId = $id;
/*
 *	View
 */
$form = new \Form($db);
$object = new \PaymentVarious($db);
$result = $object->fetch($id);
$title = $object->ref . " - " . $langs->trans('Card');
$help_url = 'EN:Module_Suppliers_Invoices|FR:Module_Fournisseurs_Factures|ES:Módulo_Facturas_de_proveedores|DE:Modul_Lieferantenrechnungen';
$options = array();
$bankcateg = new \BankCateg($db);
$arrayofbankcategs = $bankcateg->fetchAll();
// Other attributes
$parameters = array();
$reshook = $hookmanager->executeHooks('formObjectOptions', $parameters, $object, $action);
$labelsens = $form->textwithpicto($langs->trans('Sens'), $langs->trans("AccountingDirectionHelp"));
$sensarray = array('0' => $langs->trans("Debit"), '1' => $langs->trans("Credit"));
$alreadyaccounted = $object->getVentilExportCompta();
$head = \various_payment_prepare_head($object);
$morehtmlref = '<div class="refidno">';
$linkback = '<a href="' . \DOL_URL_ROOT . '/compta/bank/various_payment/list.php?restore_lastsearch_values=1' . (!empty($socid) ? '&socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlstatus = '';
// Account of Chart of account
$editvalue = '';
$bankaccountnotfound = 0;
// Other attributes
$parameters = array('socid' => $object->id);