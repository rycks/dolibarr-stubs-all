<?php

\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
$action = \GETPOST('action', 'aZ09');
$place = \GETPOST('place', 'aZ09') ? \GETPOST('place', 'aZ09') : '0';
// $place is id of table for Bar or Restaurant
$invoiceid = \GETPOSTINT('invoiceid');
/*
 * View
 */
$arrayofcss = array('/takepos/css/pos.css.php');
$arrayofjs = array();
$head = '';
$title = '';
$disablejs = 0;
$disablehead = 0;
$head = '<link rel="stylesheet" href="css/pos.css.php">';
$usestripeterminals = 0;
$keyforstripeterminalbank = '';
$stripe = \null;
$servicestatus = 0;
$stripeacc = \null;
$service = 'StripeTest';
$site_account = $stripearrayofkeysbyenv[$servicestatus]['publishable_key'];
$stripe = new \Stripe($db);
$stripeacc = $stripe->getStripeAccount($service);
$invoicetmp = new \Facture($db);
$stripecu = $stripe->getStripeCustomerAccount($invoicetmp->socid, $servicestatus, $site_account);
// Get remote Stripe customer 'cus_...' (no remote access to Stripe here)
$keyforstripeterminalbank = "CASHDESK_ID_BANKACCOUNT_STRIPETERMINAL" . (empty($_SESSION['takeposterminal']) ? '' : $_SESSION['takeposterminal']);
$usestripeterminals = \getDolGlobalString('STRIPE_LOCATION');
$invoice = new \Facture($db);
// Define list of possible payments
$arrayOfValidPaymentModes = array();
$arrayOfValidBankAccount = array();
$sql = "SELECT code, libelle as label FROM " . \MAIN_DB_PREFIX . "c_paiement";
$resql = $db->query($sql);
$remaintopay = 0;
$alreadypayed = \is_object($invoice) ? $invoice->total_ttc - $remaintopay : 0;
$urlpaymentintent = \DOL_URL_ROOT . '/stripe/ajax/ajax.php?action=createPaymentIntent&token=' . \newToken() . '&servicestatus=' . \urlencode((string) $servicestatus);
$urlpaymentintent = \DOL_URL_ROOT . '/stripe/ajax/ajax.php?action=capturePaymentIntent&token=' . \newToken() . '&servicestatus=' . \urlencode((string) $servicestatus);
$sessioncurrency = $_SESSION["takeposcustomercurrency"] ?? '';
$multicurrency = \null;
$action_buttons = array(array("function" => "reset()", "span" => "style='font-size: 150%;'", "text" => "C", "class" => "poscolorblue"), array("function" => "parent.\$.colorbox.close();", "span" => "id='printtext' style='font-weight: bold; font-size: 18pt;'", "text" => "X", "class" => "poscolordelete"));
$numpad = \getDolGlobalInt('TAKEPOS_NUMPAD');
$paycode = $arrayOfValidPaymentModes[0]->code;
$payIcon = '';
$paycode = $arrayOfValidPaymentModes[1]->code;
$payIcon = '';
$paycode = $arrayOfValidPaymentModes[2]->code;
$payIcon = '';
$i = 3;
$keyforstripeterminalbank = "CASHDESK_ID_BANKACCOUNT_STRIPETERMINAL" . $_SESSION["takeposterminal"];
$keyforsumupbank = "CASHDESK_ID_BANKACCOUNT_SUMUP" . $_SESSION["takeposterminal"];
$parameters = array('action_buttons' => $action_buttons);
$reshook = $hookmanager->executeHooks('addMoreActionsButtons', $parameters, $invoice, $action);
$class = $i == 3 ? "calcbutton3" : "calcbutton2";
// Add code from hooks
$parameters = array();