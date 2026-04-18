<?php

$actionsave = \GETPOST("save");
$i = 0;
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
// Webservices list
$webservices = array('user' => '', 'thirdparty' => 'isModEnabled("societe")', 'contact' => 'isModEnabled("societe")', 'productorservice' => '(isModEnabled("product") || isModEnabled("service"))', 'order' => 'isModEnabled("order")', 'invoice' => 'isModEnabled("invoice")', 'supplier_invoice' => 'isModEnabled("fournisseur")', 'actioncomm' => 'isModEnabled("agenda")', 'category' => 'isModEnabled("category")', 'project' => 'isModEnabled("project")', 'other' => '');
$constname = 'WEBSERVICES_KEY';