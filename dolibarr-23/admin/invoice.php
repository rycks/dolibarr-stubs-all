<?php

$action = \GETPOST('action', 'aZ09');
$value = \GETPOST('value', 'alpha');
$modulepart = \GETPOST('modulepart', 'aZ09');
// Used by actions_setmoduleoptions.inc.php
$label = \GETPOST('label', 'alpha');
$scandir = \GETPOST('scan_dir', 'alpha');
$type = 'invoice';
$error = 0;
$reg = array();
$maskconstinvoice = \GETPOST('maskconstinvoice', 'aZ09');
$maskconstreplacement = \GETPOST('maskconstreplacement', 'aZ09');
$maskconstcredit = \GETPOST('maskconstcredit', 'aZ09');
$maskconstdeposit = \GETPOST('maskconstdeposit', 'aZ09');
$maskinvoice = \GETPOST('maskinvoice', 'alpha');
$maskreplacement = \GETPOST('maskreplacement', 'alpha');
$maskcredit = \GETPOST('maskcredit', 'alpha');
$maskdeposit = \GETPOST('maskdeposit', 'alpha');
$res = 0;
/*
 * View
 */
$dirmodels = \array_merge(array('/'), (array) $conf->modules_parts['models']);
$title = $langs->trans("BillsSetup");
$form = new \Form($db);
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$head = \invoice_admin_prepare_head();
$arrayofmodules = array();
$arrayofmodules = \dol_sort_array($arrayofmodules, 'position');
// Load array def with activated templates
$type = 'invoice';
$def = array();
$sql = "SELECT nom";
$resql = $db->query($sql);
$activatedModels = array();
$listtype = array(\Facture::TYPE_STANDARD => $langs->trans("InvoiceStandard"), \Facture::TYPE_REPLACEMENT => $langs->trans("InvoiceReplacement"), \Facture::TYPE_CREDIT_NOTE => $langs->trans("InvoiceAvoir"), \Facture::TYPE_DEPOSIT => $langs->trans("InvoiceDeposit"));
$sql = "SELECT rowid, label, clos";
$resql = $db->query($sql);
$FACTURE_CHQ_NUMBER = \getDolGlobalInt('FACTURE_CHQ_NUMBER');
$sql = "SELECT rowid, label";
$resql = $db->query($sql);
$substitutionarray = \pdf_getSubstitutionArray($langs, \null, \null, 2);
$htmltext = '<i>' . $langs->trans("AvailableVariables") . ':<br>';
$variablename = 'INVOICE_FREE_TEXT';