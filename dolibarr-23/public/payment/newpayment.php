<?php

\define("NOLOGIN", 1);
\define("NOCSRFCHECK", 1);
\define('NOIPCHECK', '1');
\define('NOBROWSERNOTIF', '1');
\define('XFRAMEOPTIONS_ALLOWALL', '1');
// For MultiCompany module.
// Do not use GETPOST here, function is not defined and get of entity must be done before including main.inc.php
// Because 2 entities can have the same ref.
$entity = !empty($_GET['entity']) ? (int) $_GET['entity'] : (!empty($_POST['entity']) ? (int) $_POST['entity'] : (!empty($_GET['e']) ? (int) $_GET['e'] : (!empty($_POST['e']) ? (int) $_POST['e'] : 1)));
\define("DOLENTITY", $entity);
// File with generic data
// Hook to be used by external payment modules (ie Payzen, ...)
$hookmanager = new \HookManager($db);
// Security check
// No check on module enabled. Done later according to $validpaymentmethod
$action = \GETPOST('action', 'aZ09');
// Input are:
// type ('invoice','order','contractline'),
// id (object id),
// amount (required if id is empty),
// tag (a free text, required if type is empty)
// currency (iso code)
$suffix = \GETPOST("suffix", 'aZ09');
$amount = \price2num(\GETPOST("amount", 'alpha'));
$source = \GETPOST("s", 'aZ09') ? \GETPOST("s", 'aZ09') : \GETPOST("source", 'aZ09');
$getpostlang = \GETPOST('lang', 'aZ09');
$ws = \GETPOST("ws", "aZ09");
$thirdparty = \null;
// Init for static analysis
$stripecu = \null;
// Init for static analysis
$paymentintent = \null;
// Test on permission not required here (anonymous action protected by mitigation of /public/... urls)
// Finding the Attendee
$attendee = new \ConferenceOrBoothAttendee($db);
$invoiceid = \GETPOSTINT('ref');
$invoice = new \Facture($db);
$resultinvoice = $invoice->fetch($invoiceid);
$paymentmethod = \GETPOST('paymentmethod', 'alphanohtml') ? \GETPOST('paymentmethod', 'alphanohtml') : '';
// Empty in most cases. Defined when a payment mode is forced
$validpaymentmethod = array();
// Complete urls for post treatment
$ref = $REF = \GETPOST('ref', 'alpha');
$TAG = \GETPOST("tag", 'alpha');
$FULLTAG = \GETPOST("fulltag", 'alpha');
// fulltag is tag with more information
$SECUREKEY = \GETPOST("securekey");
// Secure key
$PAYPAL_API_OK = "";
$PAYPAL_API_KO = "";
$PAYPAL_API_SANDBOX = "";
$PAYPAL_API_USER = "";
$PAYPAL_API_PASSWORD = "";
$PAYPAL_API_SIGNATURE = "";
$reg = array();
// Define $urlwithroot
//$urlwithouturlroot=preg_replace('/'.preg_quote(DOL_URL_ROOT,'/').'$/i','',trim($dolibarr_main_url_root));
//$urlwithroot=$urlwithouturlroot.DOL_URL_ROOT;		// This is to use external domain name found into config file
$urlwithroot = \DOL_MAIN_URL_ROOT;
// This is to use same domain name than current. For Paypal payment, we can use internal URL like localhost.
$urlok = $urlwithroot . '/public/payment/paymentok.php?';
$urlko = $urlwithroot . '/public/payment/paymentko.php?';
$urlok = \preg_replace('/&$/', '', $urlok);
// Remove last &
$urlko = \preg_replace('/&$/', '', $urlko);
// Check parameters
$PAYPAL_API_OK = "";
$PAYPAL_API_KO = "";
// Initialize $validpaymentmethod
// The list can be complete by the hook 'doValidatePayment' executed inside getValidOnlinePaymentMethods()
$validpaymentmethod = \getValidOnlinePaymentMethods($paymentmethod);
// Check security token
$tmpsource = $source;
$valid = \true;
$tokenisok = \false;
// Common variables
$creditor = $mysoc->name;
$paramcreditor = 'ONLINE_PAYMENT_CREDITOR';
$paramcreditorlong = 'ONLINE_PAYMENT_CREDITOR_' . $suffix;
$mesg = '';
// Test on permission not required here (anonymous action protected by mitigation of /public/... urls)
$amountstripe = (float) $amount;
// Correct the amount according to unit of currency
// See https://support.stripe.com/questions/which-zero-decimal-currencies-does-stripe-support
$arrayzerounitcurrency = array('BIF', 'CLP', 'DJF', 'GNF', 'JPY', 'KMF', 'KRW', 'MGA', 'PYG', 'RWF', 'VND', 'VUV', 'XAF', 'XOF', 'XPF');
$stripeToken = \GETPOST("stripeToken", 'alpha');
$email = \GETPOST("email", 'alpha');
$thirdparty_id = \GETPOSTINT('thirdparty_id');
// Note that for payment following online registration for members, this is empty because thirdparty is created once payment is confirmed by paymentok.php
$dol_type = \GETPOST('s', 'alpha') ? \GETPOST('s', 'alpha') : \GETPOST('source', 'alpha');
$dol_id = \GETPOSTINT('dol_id');
$vatnumber = \GETPOST('vatnumber', 'alpha');
$savesource = \GETPOSTISSET('savesource') ? \GETPOSTINT('savesource') : 1;
$error = 0;
$errormessage = '';
$stripeacc = \null;
$remoteip = \getUserRemoteIP();
// This hook is used to push to $validpaymentmethod by external payment modules (ie Payzen, ...)
$parameters = array('paymentmethod' => $paymentmethod, 'validpaymentmethod' => &$validpaymentmethod);
$reshook = $hookmanager->executeHooks('doPayment', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$head = '';
$replacemainarea = (empty($conf->dol_hide_leftmenu) ? '<div>' : '') . '<div>';
// Show logo (search order: logo defined by PAYMENT_LOGO_suffix, then PAYMENT_LOGO, then small company logo, large company logo, theme logo, common logo)
// Define logo and logosmall
$logosmall = $mysoc->logo_small;
$logo = $mysoc->logo;
$paramlogo = 'ONLINE_PAYMENT_LOGO_' . $suffix;
//print '<!-- Show logo (logosmall='.$logosmall.' logo='.$logo.') -->'."\n";
// Define urllogo
$urllogo = '';
$urllogofull = '';
// Look for a personalized header file (htmlheaderpayment.html) if the payment system is called from a website
$filehtmlheader = \dol_sanitizePathName(\DOL_DATA_ROOT . ($conf->entity > 1 ? '/' . $conf->entity : '') . '/website/' . $ws . '/htmlheaderpayment.html');
// Output introduction text
$text = '';
$reg = array();
$text = '<tr><td class="center"><br>' . $text . '<br></td></tr>' . "\n";
$found = \false;
$error = 0;
$object = \null;
$tag = \null;
$fulltag = \null;
$found = \true;
$tag = \GETPOST("tag", 'alpha');
$found = \true;
$order = new \Commande($db);
$result = $order->fetch(0, $ref);
$object = $order;
$tag = '';
$fulltag = \dol_string_unaccent($fulltag);
// Object
$text = '<b>' . $langs->trans("PaymentOrderRef", $order->ref) . '</b>';
$directdownloadlink = $order->getLastMainDocLink('commande');
// Shipping address
$shipToName = $order->thirdparty->name;
$shipToStreet = $order->thirdparty->address;
$shipToCity = $order->thirdparty->town;
$shipToState = $order->thirdparty->state_code;
$shipToCountryCode = $order->thirdparty->country_code;
$shipToZip = $order->thirdparty->zip;
$shipToStreet2 = '';
$phoneNum = $order->thirdparty->phone;
$labeldesc = $langs->trans("Order") . ' ' . $order->ref;
$found = \true;
$invoice = new \Facture($db);
$result = $invoice->fetch(0, $ref);
$object = $invoice;
$fulltag = \dol_string_unaccent($fulltag);
// Object
$text = '<b>' . $langs->trans("PaymentInvoiceRef", $invoice->ref) . '</b>';
$directdownloadlink = $invoice->getLastMainDocLink('facture');
// Shipping address
$shipToName = $invoice->thirdparty->name;
$shipToStreet = $invoice->thirdparty->address;
$shipToCity = $invoice->thirdparty->town;
$shipToState = $invoice->thirdparty->state_code;
$shipToCountryCode = $invoice->thirdparty->country_code;
$shipToZip = $invoice->thirdparty->zip;
$shipToStreet2 = '';
$phoneNum = $invoice->thirdparty->phone;
$labeldesc = $langs->trans("Invoice") . ' ' . $invoice->ref;
$found = \true;
$contract = new \Contrat($db);
$contractline = new \ContratLigne($db);
$result = $contractline->fetch(0, $ref);
$object = $contractline;
$fulltag = \dol_string_unaccent($fulltag);
$qty = 1;
// Object
$text = '<b>' . $langs->trans("PaymentRenewContractId", $contract->ref, $contractline->ref) . '</b>';
$directdownloadlink = $contract->getLastMainDocLink('contract');
// Quantity
$label = $langs->trans("Quantity");
$qty = 1;
$duration = '';
// Shipping address
$shipToName = $contract->thirdparty->name;
$shipToStreet = $contract->thirdparty->address;
$shipToCity = $contract->thirdparty->town;
$shipToState = $contract->thirdparty->state_code;
$shipToCountryCode = $contract->thirdparty->country_code;
$shipToZip = $contract->thirdparty->zip;
$shipToStreet2 = '';
$phoneNum = $contract->thirdparty->phone;
$labeldesc = $langs->trans("Contract") . ' ' . $contract->ref;
$newsource = 'member';
$tag = "";
$found = \true;
$member = new \Adherent($db);
$adht = new \AdherentType($db);
$result = $member->fetch(0, $ref, 0, '', \true, \true);
$object = $member;
$fulltag = \dol_string_unaccent($fulltag);
// Object
$text = '<b>' . $langs->trans("PaymentSubscription") . '</b>';
$amountbytype = $adht->amountByType(1);
$typeid = $adht->id;
$caneditamount = $adht->caneditamount;
// Add hook to complete the form
$parameters = array('mode' => 'renewal');
$reshook = $hookmanager->executeHooks('membershipNewSubscriptionPublicForm', $parameters, $object, $action);
// Set amount for the subscription from the the type and options:
// - First check the amount of the member type if there is no previous payment.
$amount = $member->last_subscription_amount ? $member->last_subscription_amount : (empty($amountbytype[$typeid]) ? 0 : $amountbytype[$typeid]);
// - If a min is set or an amount from the posted form, we take them into account
$amount = \max(0, (float) $amount, (float) \getDolGlobalInt("MEMBER_MIN_AMOUNT"));
$caneditamount = $adht->caneditamount;
$minimumamount = !\getDolGlobalString('MEMBER_MIN_AMOUNT') ? $adht->amount : \max(\getDolGlobalString('MEMBER_MIN_AMOUNT'), $adht->amount, $amount);
// Shipping address
$shipToName = $member->getFullName($langs);
$shipToStreet = $member->address;
$shipToCity = $member->town;
$shipToState = $member->state_code;
$shipToCountryCode = $member->country_code;
$shipToZip = $member->zip;
$shipToStreet2 = '';
$phoneNum = $member->phone;
$labeldesc = $langs->trans("PaymentSubscription");
$found = \true;
$don = new \Don($db);
// @phan-suppress-next-line PhanPluginSuspiciousParamPosition
$result = $don->fetch((int) $ref);
$object = $don;
$fulltag = \dol_string_unaccent($fulltag);
// Object
$text = '<b>' . $langs->trans("PaymentDonation") . '</b>';
$valtoshow = '';
// Shipping address
$shipToName = $don->getFullName($langs);
$shipToStreet = $don->address;
$shipToCity = $don->town;
$shipToState = $don->state_code;
$shipToCountryCode = $don->country_code;
$shipToZip = $don->zip;
$shipToStreet2 = '';
$phoneNum = $don->phone;
$labeldesc = $langs->trans("PaymentSubscription");
$found = \true;
$fulltag = \dol_string_unaccent($fulltag);
$valtoshow = $amount;
// Shipping address
$shipToName = $thirdparty->getFullName($langs);
$shipToStreet = $thirdparty->address;
$shipToCity = $thirdparty->town;
$shipToState = $thirdparty->state_code;
$shipToCountryCode = $thirdparty->country_code;
$shipToZip = $thirdparty->zip;
$shipToStreet2 = '';
$phoneNum = $thirdparty->phone;
$labeldesc = $langs->trans("PaymentSubscription");
$found = \true;
$fulltag = \dol_string_unaccent($fulltag);
// Object
$text = '<b>' . $langs->trans("PaymentBoothLocation") . '</b>';
$valtoshow = $amount;
// Shipping address
$shipToName = $thirdparty->getFullName($langs);
$shipToStreet = $thirdparty->address;
$shipToCity = $thirdparty->town;
$shipToState = $thirdparty->state_code;
$shipToCountryCode = $thirdparty->country_code;
$shipToZip = $thirdparty->zip;
$shipToStreet2 = '';
$phoneNum = $thirdparty->phone;
$labeldesc = $langs->trans("PaymentSubscription");
// Save some data for the paymentok
$remoteip = \getUserRemoteIP();
$stripecu = \null;
// For any other payment services
// This hook can be used to show the embedded form to make payments with external payment modules (ie Payzen, ...)
$parameters = ['paymentmethod' => $paymentmethod, 'amount' => $amount, 'currency' => $currency, 'tag' => \GETPOST("tag", 'alpha'), 'dopayment' => \GETPOST('dopayment', 'alpha')];
// @phan-suppress-next-line PhanTypeMismatchArgumentNullable
$reshook = $hookmanager->executeHooks('doPayment', $parameters, $object, $action);