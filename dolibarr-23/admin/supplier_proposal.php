<?php

$action = \GETPOST('action', 'aZ09');
$value = \GETPOST('value', 'alpha');
$modulepart = \GETPOST('modulepart', 'aZ09');
// Used by actions_setmoduleoptions.inc.php
$label = \GETPOST('label', 'alpha');
$scandir = \GETPOST('scan_dir', 'alpha');
$type = 'supplier_proposal';
$error = 0;
$maskconstsupplier_proposal = \GETPOST('maskconstsupplier_proposal', 'aZ09');
$masksupplier_proposal = \GETPOST('masksupplier_proposal', 'alpha');
$res = 0;
$modele = \GETPOST('module', 'alpha');
$supplier_proposal = new \SupplierProposal($db);
// Search template files
$file = '';
$classname = '';
$dirmodels = \array_merge(array('/'), (array) $conf->modules_parts['models']);
$draft = \GETPOST('SUPPLIER_PROPOSAL_DRAFT_WATERMARK', 'alpha');
$res = \dolibarr_set_const($db, "SUPPLIER_PROPOSAL_DRAFT_WATERMARK", \trim($draft), 'chaine', 0, '', $conf->entity);
$freetext = \GETPOST('SUPPLIER_PROPOSAL_FREE_TEXT', 'restricthtml');
// No alpha here, we want exact string
$res = \dolibarr_set_const($db, "SUPPLIER_PROPOSAL_FREE_TEXT", $freetext, 'chaine', 0, '', $conf->entity);
$res = \dolibarr_set_const($db, "BANK_ASK_PAYMENT_BANK_DURING_SUPPLIER_PROPOSAL", $value, 'chaine', 0, '', $conf->entity);
// Activate a model
$reg = array();
/*
 * Affiche page
 */
$dirmodels = \array_merge(array('/'), (array) $conf->modules_parts['models']);
$form = new \Form($db);
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$head = \supplier_proposal_admin_prepare_head();
// Load array def with activated templates
$def = array();
$sql = "SELECT nom";
$resql = $db->query($sql);
$substitutionarray = \pdf_getSubstitutionArray($langs, \null, \null, 2);
$htmltext = '<i>' . $langs->trans("AvailableVariables") . ':<br>';
$variablename = 'SUPPLIER_PROPOSAL_FREE_TEXT';