<?php

$action = \GETPOST('action', 'aZ09');
$nbletter = \GETPOSTINT('ACCOUNTING_LETTERING_NBLETTERS');
// New form setup options
$formSetup = new \FormSetup($db);
$item = $formSetup->newItem('ACCOUNTING_MANAGE_ZERO')->setAsYesNo();
// Parameters ACCOUNTING_* and others
$list = array('ACCOUNTING_LENGTH_GACCOUNT', 'ACCOUNTING_LENGTH_AACCOUNT');
$list_binding = array('ACCOUNTING_DEFAULT_PERIOD_ON_TRANSFER', 'ACCOUNTING_DATE_START_BINDING', 'ACCOUNTING_LABEL_OPERATION_ON_TRANSFER');
// Parameters for export options
$main_option = array('ACCOUNTING_EXPORT_PREFIX_SPEC');
$accountancyexport = new \AccountancyExport($db);
$configuration = $accountancyexport->getTypeConfig();
$listparam = $configuration['param'];
$listformat = $configuration['format'];
$listcr = $configuration['cr'];
$model_option = array('1' => array('label' => 'ACCOUNTING_EXPORT_FORMAT', 'param' => $listformat), '2' => array('label' => 'ACCOUNTING_EXPORT_SEPARATORCSV', 'param' => ''), '3' => array('label' => 'ACCOUNTING_EXPORT_ENDLINE', 'param' => $listcr), '4' => array('label' => 'ACCOUNTING_EXPORT_DATE', 'param' => ''));
$error = 0;
$accounting_mode = \getDolGlobalString('ACCOUNTING_MODE', 'CREANCES-DETTES');
$constname = \preg_replace('/^set/', '', $action);
$constvalue = \GETPOSTINT('value');
$res = \dolibarr_set_const($db, $constname, $constvalue, 'yesno', 0, '', $conf->entity);
$error = 0;
$accounting_modes = array('CREANCES-DETTES', 'RECETTES-DEPENSES');
$accounting_mode = \GETPOST('accounting_mode', 'alpha');
$error = 0;
$error = 0;
$error = 0;
$error = 0;
// Export options
$modelcsv = \GETPOSTINT('ACCOUNTING_EXPORT_MODELCSV');
// reload
$configuration = $accountancyexport->getTypeConfig();
$listparam = $configuration['param'];
$setenabledraftexport = \GETPOSTINT('value');
$res = \dolibarr_set_const($db, "ACCOUNTING_ENABLE_EXPORT_DRAFT_JOURNAL", $setenabledraftexport, 'yesno', 0, '', $conf->entity);
$setdisablebindingonsales = \GETPOSTINT('value');
$res = \dolibarr_set_const($db, "ACCOUNTING_DISABLE_BINDING_ON_SALES", $setdisablebindingonsales, 'yesno', 0, '', $conf->entity);
$setdisablebindingonpurchases = \GETPOSTINT('value');
$res = \dolibarr_set_const($db, "ACCOUNTING_DISABLE_BINDING_ON_PURCHASES", $setdisablebindingonpurchases, 'yesno', 0, '', $conf->entity);
$setdisablebindingonexpensereports = \GETPOSTINT('value');
$res = \dolibarr_set_const($db, "ACCOUNTING_DISABLE_BINDING_ON_EXPENSEREPORTS", $setdisablebindingonexpensereports, 'yesno', 0, '', $conf->entity);
$setdisabletransferonassets = \GETPOSTINT('value');
$res = \dolibarr_set_const($db, "ACCOUNTING_DISABLE_TRANSFER_ON_ASSETS", $setdisabletransferonassets, 'yesno', 0, '', $conf->entity);
$setdisabletransferondiscounts = \GETPOSTINT('value');
$res = \dolibarr_set_const($db, "ACCOUNTING_DISABLE_TRANSFER_ON_DISCOUNTS", $setdisabletransferondiscounts, 'yesno', 0, '', $conf->entity);
$setenablelettering = \GETPOSTINT('value');
$res = \dolibarr_set_const($db, "ACCOUNTING_ENABLE_LETTERING", $setenablelettering, 'yesno', 0, '', $conf->entity);
$setenableautolettering = \GETPOSTINT('value');
$res = \dolibarr_set_const($db, "ACCOUNTING_ENABLE_AUTOLETTERING", $setenableautolettering, 'yesno', 0, '', $conf->entity);
$setenablevatreversecharge = \GETPOSTINT('value');
$res = \dolibarr_set_const($db, "ACCOUNTING_FORCE_ENABLE_VAT_REVERSE_CHARGE", $setenablevatreversecharge, 'yesno', 0, '', $conf->entity);
$setenabletabonthirdparty = \GETPOSTINT('value');
$res = \dolibarr_set_const($db, "ACCOUNTING_ENABLE_TABONTHIRDPARTY", $setenabletabonthirdparty, 'yesno', 0, '', $conf->entity);
$maskconstbookkeeping = \GETPOST('maskconstbookkeeping', 'aZ09');
$maskbookkeeping = \GETPOST('maskbookkeeping', 'alpha');
$res = 0;
/*
 * View
 */
$form = new \Form($db);
$title = $langs->trans('ConfigAccountingExpert');
$help_url = 'EN:Module_Double_Entry_Accounting#Setup|FR:Module_Comptabilit&eacute;_en_Partie_Double#Configuration';
$linkback = '';
// Accountancy Numbering model
$dirmodels = \array_merge(array('/'), (array) $conf->modules_parts['models']);
$arrayofmodules = array();
$arrayofmodules = \dol_sort_array($arrayofmodules, 'position');
$num = \count($main_option);
$num2 = \count($model_option);