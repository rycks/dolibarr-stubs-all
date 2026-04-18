<?php

$servicename = 'PayPal';
$action = \GETPOST('action', 'aZ09');
$error = 0;
$result = \dolibarr_set_const($db, "PAYPAL_API_USER", \GETPOST('PAYPAL_API_USER', 'alpha'), 'chaine', 0, '', $conf->entity);
$result = \dolibarr_set_const($db, "PAYPAL_API_PASSWORD", \GETPOST('PAYPAL_API_PASSWORD', 'alpha'), 'chaine', 0, '', $conf->entity);
$result = \dolibarr_set_const($db, "PAYPAL_API_SIGNATURE", \GETPOST('PAYPAL_API_SIGNATURE', 'alpha'), 'chaine', 0, '', $conf->entity);
$result = \dolibarr_set_const($db, "PAYPAL_SSLVERSION", \GETPOST('PAYPAL_SSLVERSION', 'alpha'), 'chaine', 0, '', $conf->entity);
$result = \dolibarr_set_const($db, "ONLINE_PAYMENT_CREDITOR", \GETPOST('ONLINE_PAYMENT_CREDITOR', 'alpha'), 'chaine', 0, '', $conf->entity);
$result = \dolibarr_set_const($db, "PAYPAL_BANK_ACCOUNT_FOR_PAYMENTS", \GETPOSTINT('PAYPAL_BANK_ACCOUNT_FOR_PAYMENTS'), 'chaine', 0, '', $conf->entity);
$result = \dolibarr_set_const($db, "PAYPAL_API_INTEGRAL_OR_PAYPALONLY", \GETPOST('PAYPAL_API_INTEGRAL_OR_PAYPALONLY', 'alpha'), 'chaine', 0, '', $conf->entity);
$result = \dolibarr_set_const($db, "ONLINE_PAYMENT_CSS_URL", \GETPOST('ONLINE_PAYMENT_CSS_URL', 'alpha'), 'chaine', 0, '', $conf->entity);
$result = \dolibarr_set_const($db, "PAYPAL_ADD_PAYMENT_URL", \GETPOST('PAYPAL_ADD_PAYMENT_URL', 'alpha'), 'chaine', 0, '', $conf->entity);
$result = \dolibarr_set_const($db, "ONLINE_PAYMENT_MESSAGE_FORM", \GETPOST('ONLINE_PAYMENT_MESSAGE_FORM', 'restricthtml'), 'chaine', 0, '', $conf->entity);
$result = \dolibarr_set_const($db, "ONLINE_PAYMENT_MESSAGE_OK", \GETPOST('ONLINE_PAYMENT_MESSAGE_OK', 'restricthtml'), 'chaine', 0, '', $conf->entity);
$result = \dolibarr_set_const($db, "ONLINE_PAYMENT_MESSAGE_KO", \GETPOST('ONLINE_PAYMENT_MESSAGE_KO', 'restricthtml'), 'chaine', 0, '', $conf->entity);
$result = \dolibarr_set_const($db, "ONLINE_PAYMENT_SENDEMAIL", \GETPOST('ONLINE_PAYMENT_SENDEMAIL', 'alpha'), 'chaine', 0, '', $conf->entity);
// Payment token for URL
$result = \dolibarr_set_const($db, "PAYMENT_SECURITY_TOKEN", \GETPOST('PAYMENT_SECURITY_TOKEN', 'alpha'), 'chaine', 0, '', $conf->entity);
$liveenable = \GETPOSTINT('value') ? 0 : 1;
$res = \dolibarr_set_const($db, "PAYPAL_API_SANDBOX", $liveenable, 'yesno', 0, '', $conf->entity);
/*
 *	View
 */
$form = new \Form($db);
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$head = \paypaladmin_prepare_head();
$doleditor = new \DolEditor('ONLINE_PAYMENT_MESSAGE_FORM', \getDolGlobalString('ONLINE_PAYMENT_MESSAGE_FORM'), '', 100, 'dolibarr_details', 'In', \false, \true, \true, \ROWS_4, '90%');
$doleditor = new \DolEditor('ONLINE_PAYMENT_MESSAGE_OK', \getDolGlobalString('ONLINE_PAYMENT_MESSAGE_OK'), '', 100, 'dolibarr_details', 'In', \false, \true, \true, \ROWS_4, '90%');
$doleditor = new \DolEditor('ONLINE_PAYMENT_MESSAGE_KO', \getDolGlobalString('ONLINE_PAYMENT_MESSAGE_KO'), '', 100, 'dolibarr_details', 'In', \false, \true, \true, \ROWS_4, '90%');
$realpaypalurl = 'www.paypal.com';
$sandboxpaypalurl = 'developer.paypal.com';
$token = '';