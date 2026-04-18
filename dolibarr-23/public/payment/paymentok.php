<?php

\define("NOLOGIN", 1);
\define("NOCSRFCHECK", 1);
\define('NOIPCHECK', '1');
\define('NOBROWSERNOTIF', '1');
\define('XFRAMEOPTIONS_ALLOWALL', '1');
// For MultiCompany module.
// Do not use GETPOST here, function is not defined and define must be done before including main.inc.php
// Because 2 entities can have the same ref.
$entity = !empty($_GET['e']) ? (int) $_GET['e'] : (!empty($_POST['e']) ? (int) $_POST['e'] : 1);
\define("DOLENTITY", $entity);
// Hook to be used by external payment modules (ie Payzen, ...)
$hookmanager = new \HookManager($db);
// Clean parameters
$PAYPAL_API_USER = "";
$PAYPAL_API_PASSWORD = "";
$PAYPAL_API_SIGNATURE = "";
$PAYPAL_API_SANDBOX = "";
$PAYPALTOKEN = "";
$PAYPALPAYERID = "";
$PAYPAL_API_USER = \getDolGlobalString('PAYPAL_API_USER');
$PAYPAL_API_PASSWORD = \getDolGlobalString('PAYPAL_API_PASSWORD');
$PAYPAL_API_SIGNATURE = \getDolGlobalString('PAYPAL_API_SIGNATURE');
$PAYPAL_API_SANDBOX = \getDolGlobalString('PAYPAL_API_SANDBOX');
$PAYPALTOKEN = \GETPOST('TOKEN');
$PAYPALPAYERID = \GETPOST('PAYERID');
$FULLTAG = \GETPOST('FULLTAG');
$source = \GETPOST('s', 'alpha') ? \GETPOST('s', 'alpha') : \GETPOST('source', 'alpha');
$ref = \GETPOST('ref');
$suffix = \GETPOST("suffix", 'aZ09');
$membertypeid = \GETPOSTINT("membertypeid");
// Detect $paymentmethod
$paymentmethod = '';
$reg = array();
// Detect $ws
$reg_ws = array();
$ws = \preg_match('/WS=([^\\.]+)/', $FULLTAG, $reg_ws) ? $reg_ws[1] : 0;
$validpaymentmethod = \getValidOnlinePaymentMethods($paymentmethod);
// Common variables
$creditor = $mysoc->name;
$paramcreditor = 'ONLINE_PAYMENT_CREDITOR';
$paramcreditorlong = 'ONLINE_PAYMENT_CREDITOR_' . $suffix;
$ispaymentok = \false;
// If payment is ok
$PAYMENTSTATUS = $TRANSACTIONID = $LONGTRANSACTIONID = $TAXAMT = $NOTE = '';
// If payment is ko
$ErrorCode = $ErrorShortMsg = $ErrorLongMsg = $ErrorSeverityCode = '';
$object = new \stdClass();
// For triggers
$error = 0;
// Check if we have redirtodomain to do.
$ws_virtuelhost = \null;
$ws_id = 0;
$doactionsthenredirect = 0;
$doactionsthenredirect = 1;
$website = new \Website($db);
$result = $website->fetch(0, $ws);
/*
 * Actions
 */
// None
/*
 * View
 */
$now = \dol_now();
$tracepost = "";
$tracesession = "";
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
// Add steps to validate payment is complete when we enter this page
$service = $paymentmethod;
$FinalPaymentAmt = empty($_SESSION["FinalPaymentAmt"]) ? '' : $_SESSION["FinalPaymentAmt"];
$currencyCodeType = empty($_SESSION['currencyCodeType']) ? '' : $_SESSION['currencyCodeType'];
$service = 'StripeTest';
$servicestatus = 0;
// Check status of the object to verify if it is paid by external payment modules
$action = '';
$parameters = ['paymentmethod' => $paymentmethod];
$reshook = $hookmanager->executeHooks('isPaymentOK', $parameters, $object, $action);
$TRANSACTIONID = empty($_SESSION['TRANSACTIONID']) ? '' : $_SESSION['TRANSACTIONID'];
$fulltag = $FULLTAG;
$tmptag = \dolExplodeIntoArray($fulltag, '.', '=');
// Set $appli for emails title
$appli = $mysoc->name;
// Make complementary actions (post payment actions if payment is ok)
$ispostactionok = 0;
$paymentTypeId = 0;
$postactionmessages = array();
// Get on url call
$onlinetoken = empty($PAYPALTOKEN) ? $_SESSION['onlinetoken'] : $PAYPALTOKEN;
$payerID = empty($PAYPALPAYERID) ? $_SESSION['payerID'] : $PAYPALPAYERID;
// Set by newpayment.php
$currencyCodeType = empty($_SESSION['currencyCodeType']) ? '' : $_SESSION['currencyCodeType'];
$FinalPaymentAmt = empty($_SESSION["FinalPaymentAmt"]) ? '' : $_SESSION["FinalPaymentAmt"];
$paymentType = empty($_SESSION['PaymentType']) ? '' : $_SESSION['PaymentType'];
$sendemail = \getDolGlobalString('ONLINE_PAYMENT_SENDEMAIL');
$tmptag = \dolExplodeIntoArray($fulltag, '.', '=');