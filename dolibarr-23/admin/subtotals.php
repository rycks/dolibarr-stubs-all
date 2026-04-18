<?php

$action = \GETPOST('action', 'aZ09');
$formother = new \FormOther($db);
// default color const
$default = 'ffffff';
// Constant and translation of the module description
$modules = ['PROPAL' => array('lang' => 'propal', 'key' => 'Proposal', 'old_pdf' => '(azur model)'), 'COMMANDE' => array('lang' => 'orders', 'key' => 'CustomerOrder', 'old_pdf' => '(einstein model)'), 'FICHINTER' => array('lang' => 'interventions', 'key' => 'Intervention', 'old_pdf' => '(soleil model)'), 'FACTURE' => array('lang' => 'bills', 'key' => 'CustomerInvoice', 'old_pdf' => '(crabe model)'), 'FACTUREREC' => array('lang' => 'bills', 'key' => 'RecurringInvoiceTemplate')];
// Conditions for the option to be offered
$conditions = ['PROPAL' => \isModEnabled("propal"), 'COMMANDE' => \isModEnabled("order"), 'FICHINTER' => \isModEnabled("intervention"), 'FACTURE' => \isModEnabled("invoice"), 'FACTUREREC' => \isModEnabled("invoice")];
$max_depth = 0;
$colors = array();
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';