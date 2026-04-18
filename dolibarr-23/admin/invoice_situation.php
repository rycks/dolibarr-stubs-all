<?php

$action = \GETPOST('action', 'aZ09');
$backtopage = \GETPOST('backtopage', 'alpha');
$value = \GETPOST('value', 'alpha');
$label = \GETPOST('label', 'alpha');
$modulepart = \GETPOST('modulepart', 'aZ09');
// Used by actions_setmoduleoptions.inc.php
$scandir = \GETPOST('scan_dir', 'alpha');
$type = 'invoice';
$form = new \Form($db);
$formSetup = new \FormSetup($db);
$item = $formSetup->newItem('INVOICE_USE_SITUATION_CREDIT_NOTE')->setAsYesNo()->nameText = $langs->trans('UseSituationInvoicesCreditNote');
//$item = $formSetup->newItem('INVOICE_USE_RETAINED_WARRANTY')
//	->setAsYesNo()
//	->nameText = $langs->trans('RetainedWarranty');
$item = $formSetup->newItem('INVOICE_USE_RETAINED_WARRANTY');
$arrayAvailableType = array(\Facture::TYPE_SITUATION => $langs->trans("InvoiceSituation"), \Facture::TYPE_STANDARD . '+' . \Facture::TYPE_SITUATION => $langs->trans("InvoiceSituation") . ' + ' . $langs->trans("InvoiceStandard"));
$item = $formSetup->newItem('INVOICE_SITUATION_DEFAULT_RETAINED_WARRANTY_PERCENT');
// Conditions paiements
$item = $formSetup->newItem('INVOICE_SITUATION_DEFAULT_RETAINED_WARRANTY_COND_ID');
/*
 * View
 */
$dirmodels = \array_merge(array('/'), (array) $conf->modules_parts['models']);
$help_url = 'EN:Invoice_Configuration|FR:Configuration_module_facture|ES:ConfiguracionFactura';
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$head = \invoice_admin_prepare_head();