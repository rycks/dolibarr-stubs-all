<?php

$servicename = 'PayBox';
$action = \GETPOST('action', 'aZ09');
$error = 0;
//$result=dolibarr_set_const($db, "PAYBOX_IBS_DEVISE", GETPOST("PAYBOX_IBS_DEVISE"),'chaine',0,'',$conf->entity);
$result = \dolibarr_set_const($db, "PAYBOX_CGI_URL_V1", \GETPOST('PAYBOX_CGI_URL_V1', 'alpha'), 'chaine', 0, '', $conf->entity);
$result = \dolibarr_set_const($db, "PAYBOX_CGI_URL_V2", \GETPOST('PAYBOX_CGI_URL_V2', 'alpha'), 'chaine', 0, '', $conf->entity);
$result = \dolibarr_set_const($db, "PAYBOX_IBS_SITE", \GETPOST('PAYBOX_IBS_SITE', 'alpha'), 'chaine', 0, '', $conf->entity);
$result = \dolibarr_set_const($db, "PAYBOX_IBS_RANG", \GETPOST('PAYBOX_IBS_RANG', 'alpha'), 'chaine', 0, '', $conf->entity);
$result = \dolibarr_set_const($db, "PAYBOX_PBX_IDENTIFIANT", \GETPOST('PAYBOX_PBX_IDENTIFIANT', 'alpha'), 'chaine', 0, '', $conf->entity);
$result = \dolibarr_set_const($db, "ONLINE_PAYMENT_CREDITOR", \GETPOST('ONLINE_PAYMENT_CREDITOR', 'alpha'), 'chaine', 0, '', $conf->entity);
$result = \dolibarr_set_const($db, "PAYBOX_BANK_ACCOUNT_FOR_PAYMENTS", \GETPOSTINT('PAYBOX_BANK_ACCOUNT_FOR_PAYMENTS'), 'chaine', 0, '', $conf->entity);
$result = \dolibarr_set_const($db, "ONLINE_PAYMENT_CSS_URL", \GETPOST('ONLINE_PAYMENT_CSS_URL', 'alpha'), 'chaine', 0, '', $conf->entity);
$result = \dolibarr_set_const($db, "ONLINE_PAYMENT_MESSAGE_FORM", \GETPOST('ONLINE_PAYMENT_MESSAGE_FORM', 'restricthtml'), 'chaine', 0, '', $conf->entity);
$result = \dolibarr_set_const($db, "ONLINE_PAYMENT_MESSAGE_OK", \GETPOST('ONLINE_PAYMENT_MESSAGE_OK', 'restricthtml'), 'chaine', 0, '', $conf->entity);
$result = \dolibarr_set_const($db, "ONLINE_PAYMENT_MESSAGE_KO", \GETPOST('ONLINE_PAYMENT_MESSAGE_KO', 'restricthtml'), 'chaine', 0, '', $conf->entity);
$result = \dolibarr_set_const($db, "ONLINE_PAYMENT_SENDEMAIL", \GETPOST('ONLINE_PAYMENT_SENDEMAIL', 'alpha'), 'chaine', 0, '', $conf->entity);
// Payment token for URL
$result = \dolibarr_set_const($db, "PAYMENT_SECURITY_TOKEN", \GETPOST('PAYMENT_SECURITY_TOKEN', 'alpha'), 'chaine', 0, '', $conf->entity);
$result = \dolibarr_set_const($db, "PAYMENT_SECURITY_TOKEN_UNIQUE", \GETPOST('PAYMENT_SECURITY_TOKEN_UNIQUE', 'alpha'), 'chaine', 0, '', $conf->entity);
$result = \dolibarr_set_const($db, "PAYBOX_HMAC_KEY", \dol_encode(\GETPOST('PAYBOX_HMAC_KEY', 'alpha')), 'chaine', 0, '', $conf->entity);
/*
 *	View
 */
$IBS_SITE = "1999888";
$IBS_RANG = "99";
$IBS_DEVISE = "978";
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$h = 0;
$head = array();
$doleditor = new \DolEditor('ONLINE_PAYMENT_MESSAGE_FORM', $conf->global->ONLINE_PAYMENT_MESSAGE_FORM, '', 100, 'dolibarr_details', 'In', \false, \true, \true, \ROWS_2, '90%');
$doleditor = new \DolEditor('ONLINE_PAYMENT_MESSAGE_OK', $conf->global->ONLINE_PAYMENT_MESSAGE_OK, '', 100, 'dolibarr_details', 'In', \false, \true, \true, \ROWS_2, '90%');
$doleditor = new \DolEditor('ONLINE_PAYMENT_MESSAGE_KO', $conf->global->ONLINE_PAYMENT_MESSAGE_KO, '', 100, 'dolibarr_details', 'In', \false, \true, \true, \ROWS_2, '90%');