<?php

\define("NOLOGIN", 1);
\define("NOCSRFCHECK", 1);
\define('NOIPCHECK', '1');
\define('NOBROWSERNOTIF', '1');
\define('XFRAMEOPTIONS_ALLOWALL', '1');
// For MultiCompany module.
// Do not use GETPOST here, function is not defined and this test must be done before including main.inc.php
// Because 2 entities can have the same ref.
$entity = !empty($_GET['e']) ? (int) $_GET['e'] : (!empty($_POST['e']) ? (int) $_POST['e'] : 1);
\define("DOLENTITY", $entity);
/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Societe $mysoc
 * @var Translate $langs
 * @var User $user 		User object is initialized but empty as it is a public page
 *
 * @var string $dolibarr_main_url_root
 */
// Hook to be used by external payment modules (ie Payzen, ...)
$hookmanager = new \HookManager($db);
$PAYPALTOKEN = "";
$PAYPALPAYERID = "";
$PAYPALTOKEN = \GETPOST('TOKEN');
$PAYPALPAYERID = \GETPOST('PAYERID');
/*
if (isModEnabled('paybox')) {
}
if (isModEnabled('stripe')) {
}
*/
$FULLTAG = \GETPOST('FULLTAG');
$suffix = \GETPOST("suffix", 'aZ09');
// Detect $paymentmethod
$paymentmethod = '';
$reg = array();
// Detect $ws
$reg_ws = array();
$ws = \preg_match('/WS=([^\\.]+)/', $FULLTAG, $reg_ws) ? $reg_ws[1] : 0;
$validpaymentmethod = \getValidOnlinePaymentMethods($paymentmethod);
$object = new \stdClass();
// For triggers
/** @var CommonObject $object */
$error = 0;
// Check if we have redirtodomain to do.
$ws_virtuelhost = \null;
$ws_id = 0;
$doactionsthenredirect = 0;
$doactionsthenredirect = 1;
$website = new \Website($db);
$result = $website->fetch(0, $ws);
$tracepost = "";
// Set $appli for emails title
$appli = $mysoc->name;
$error = 0;
$FinalPaymentAmt = 0;
// To avoid to make action twice
// Get on url call
$fulltag = $FULLTAG;
$onlinetoken = empty($PAYPALTOKEN) ? $_SESSION['onlinetoken'] : $PAYPALTOKEN;
$payerID = empty($PAYPALPAYERID) ? $_SESSION['payerID'] : $PAYPALPAYERID;
// Set by newpayment.php
$paymentType = $_SESSION['PaymentType'];
$currencyCodeType = $_SESSION['currencyCodeType'];
$FinalPaymentAmt = $_SESSION['FinalPaymentAmt'];
// From env
$ipaddress = $_SESSION['ipaddress'];
$errormessage = $_SESSION['errormessage'];
// Send an email
$sendemail = \getDolGlobalString('ONLINE_PAYMENT_SENDEMAIL');
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
$key = 'ONLINE_PAYMENT_MESSAGE_KO';
$type = \GETPOST('s', 'alpha');
$ref = \GETPOST('ref', 'alphanohtml');
$tag = \GETPOST('tag', 'alpha');
// Redirect to an error page
$randomseckey = \getRandomPassword(\true, \null, 20);