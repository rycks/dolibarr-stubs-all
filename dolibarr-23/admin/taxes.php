<?php

$action = \GETPOST('action', 'aZ09');
/*
 * Actions
 */
// 0=normal, 1=option vat for services is on debit, 2=option vat for product and service on credit
// TAX_MODE=0 (most cases in FR):
//              Buy                     Sell
// Product      On delivery             On delivery
// Service      On payment              On payment
// TAX_MODE=1 (option, VAT is due at invoice date):
//              Buy                     Sell
// Product      On delivery/invoice     On delivery/invoice
// Service      On invoice              On invoice
// TAX_MODE=2 (option, VAT is due on payment date):
//              Buy                     Sell
// Product      On payment              On payment
// Service      On payment              On payment
$tax_mode = \getDolGlobalInt('TAX_MODE');
$error = 0;
// Tax mode
$tax_mode = \GETPOSTINT('tax_mode');
$res = \dolibarr_set_const($db, 'TAX_MODE', $tax_mode, 'chaine', 0, '', $conf->entity);
$res = \dolibarr_set_const($db, 'TAX_MODE_SELL_PRODUCT', $valuesellproduct, 'chaine', 0, '', $conf->entity);
$res = \dolibarr_set_const($db, 'TAX_MODE_BUY_PRODUCT', $valuebuyproduct, 'chaine', 0, '', $conf->entity);
$res = \dolibarr_set_const($db, 'TAX_MODE_SELL_SERVICE', $valuesellservice, 'chaine', 0, '', $conf->entity);
$res = \dolibarr_set_const($db, 'TAX_MODE_BUY_SERVICE', $valuebuyservice, 'chaine', 0, '', $conf->entity);
$form = new \Form($db);
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';