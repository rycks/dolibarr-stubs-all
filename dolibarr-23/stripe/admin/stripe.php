<?php

$servicename = 'Stripe';
$listofsupportedhooks = array('payment_intent.payment_failed', 'payment_intent.succeeded');
$action = \GETPOST('action', 'aZ09');
/*
 * Actions
 */
$error = 0;
$result = \dolibarr_set_const($db, "ONLINE_PAYMENT_CREDITOR", \GETPOST('ONLINE_PAYMENT_CREDITOR', 'alpha'), 'chaine', 0, '', $conf->entity);
$result = \dolibarr_set_const($db, "STRIPE_BANK_ACCOUNT_FOR_PAYMENTS", \GETPOSTINT('STRIPE_BANK_ACCOUNT_FOR_PAYMENTS'), 'chaine', 0, '', $conf->entity);
$result = \dolibarr_set_const($db, "STRIPE_USER_ACCOUNT_FOR_ACTIONS", \GETPOSTINT('STRIPE_USER_ACCOUNT_FOR_ACTIONS'), 'chaine', 0, '', $conf->entity);
$result = \dolibarr_set_const($db, "STRIPE_BANK_ACCOUNT_FOR_BANKTRANSFERS", \GETPOSTINT('STRIPE_BANK_ACCOUNT_FOR_BANKTRANSFERS'), 'chaine', 0, '', $conf->entity);
$result = \dolibarr_set_const($db, "ONLINE_PAYMENT_CSS_URL", \GETPOST('ONLINE_PAYMENT_CSS_URL', 'alpha'), 'chaine', 0, '', $conf->entity);
$result = \dolibarr_set_const($db, "ONLINE_PAYMENT_MESSAGE_FORM", \GETPOST('ONLINE_PAYMENT_MESSAGE_FORM', 'restricthtml'), 'chaine', 0, '', $conf->entity);
$result = \dolibarr_set_const($db, "ONLINE_PAYMENT_MESSAGE_OK", \GETPOST('ONLINE_PAYMENT_MESSAGE_OK', 'restricthtml'), 'chaine', 0, '', $conf->entity);
$result = \dolibarr_set_const($db, "ONLINE_PAYMENT_MESSAGE_KO", \GETPOST('ONLINE_PAYMENT_MESSAGE_KO', 'restricthtml'), 'chaine', 0, '', $conf->entity);
$result = \dolibarr_set_const($db, "ONLINE_PAYMENT_SENDEMAIL", \GETPOST('ONLINE_PAYMENT_SENDEMAIL'), 'chaine', 0, '', $conf->entity);
// Stock decrement
//$result = dolibarr_set_const($db, "ONLINE_PAYMENT_WAREHOUSE", (GETPOST('ONLINE_PAYMENT_WAREHOUSE', 'alpha') > 0 ? GETPOST('ONLINE_PAYMENT_WAREHOUSE', 'alpha') : ''), 'chaine', 0, '', $conf->entity);
//if (! $result > 0)
//	$error ++;
// Payment token for URL
$result = \dolibarr_set_const($db, "PAYMENT_SECURITY_TOKEN", \GETPOST('PAYMENT_SECURITY_TOKEN', 'alpha'), 'chaine', 0, '', $conf->entity);
$liveenable = \GETPOSTINT('value');
$res = \dolibarr_set_const($db, "STRIPE_LIVE", $liveenable, 'yesno', 0, '', $conf->entity);
//TODO: import script for stripe account saving in alone or connect mode for stripe.class.php
/*
 *	View
 */
$form = new \Form($db);
$formproduct = new \FormProduct($db);
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$head = \stripeadmin_prepare_head();
$stripearrayofwebhookevents = array('account.updated', 'payout.created', 'payout.paid', 'charge.pending', 'charge.refunded', 'charge.succeeded', 'charge.failed', 'payment_intent.succeeded', 'payment_intent.payment_failed', 'payment_method.attached', 'payment_method.updated', 'payment_method.card_automatically_updated', 'payment_method.detached', 'source.chargeable', 'customer.deleted');
$out = \img_picto('', 'globe') . ' <span class="opacitymedium">' . $langs->trans("ToOfferALinkForTestWebhook") . '</span> ';
$url = \dol_buildpath('/public/stripe/ipn.php', 3);
$out = \img_picto('', 'globe', 'class="pictofixedwidth"') . ' <span class="opacitymedium">' . $langs->trans("ToOfferALinkForLiveWebhook") . '</span> ';
$url = \dol_buildpath('/public/stripe/ipn.php', 3);
$service = 'StripeTest';
$servicestatus = 0;
// Define the array $location
$location = array();
$doleditor = new \DolEditor('ONLINE_PAYMENT_MESSAGE_FORM', \getDolGlobalString("ONLINE_PAYMENT_MESSAGE_FORM"), '', 100, 'dolibarr_details', 'In', \false, \true, \true, \ROWS_2, '90%');
$doleditor = new \DolEditor('ONLINE_PAYMENT_MESSAGE_OK', \getDolGlobalString("ONLINE_PAYMENT_MESSAGE_OK"), '', 100, 'dolibarr_details', 'In', \false, \true, \true, \ROWS_2, '90%');
$doleditor = new \DolEditor('ONLINE_PAYMENT_MESSAGE_KO', \getDolGlobalString("ONLINE_PAYMENT_MESSAGE_KO"), '', 100, 'dolibarr_details', 'In', \false, \true, \true, \ROWS_2, '90%');
$token = '';