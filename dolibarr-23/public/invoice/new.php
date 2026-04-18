<?php

\define("NOLOGIN", 1);
\define("NOCSRFCHECK", 1);
\define('NOBROWSERNOTIF', '1');
// For MultiCompany module.
// Do not use GETPOST here, function is not defined and define must be done before including main.inc.php
// Because 2 entities can have the same ref.
$entity = !empty($_GET['entity']) ? (int) $_GET['entity'] : (!empty($_POST['entity']) ? (int) $_POST['entity'] : 1);
// if (is_numeric($entity)) { // $entity is casted to int
\define("DOLENTITY", $entity);
// Init vars
$backtopage = \GETPOST('backtopage', 'alpha');
$action = \GETPOST('action', 'aZ09');
$ws = \GETPOST('ws', 'aZ09');
// Website reference where the this public page is embedded or from where is called
$paymentmethod = \GETPOST('paymentmethod', 'aZ09');
// Payment method to use
$errmsg = '';
$num = 0;
$error = 0;
// Initialize a technical object to manage hooks of page. Note that conf->hooks_modules contains an array of hook context
//$hookmanager->initHooks(array( 'globalcard'));
$extrafields = new \ExtraFields($db);
$object = new \Facture($db);
/**
 * Show header for new donation
 *
 * Note: also called by functions.lib:recordNotFound
 *
 * @param 	string		$title				Title
 * @param 	string		$head				Head array
 * @param 	int    		$disablejs			More content into html header
 * @param 	int    		$disablehead		More content into html header
 * @param 	string[]|string	$arrayofjs			Array of complementary js files
 * @param 	string[]|string	$arrayofcss			Array of complementary css files
 * @param 	string			$ws					Website ref if we are called from a website
 * @return	void
 */
function llxHeaderVierge($title, $head = "", $disablejs = 0, $disablehead = 0, $arrayofjs = [], $arrayofcss = [], $ws = '')
{
}
/**
 * Show footer for new donation
 *
 * Note: also called by functions.lib:recordNotFound
 *
 * @return	void
 */
function llxFooterVierge()
{
}
/*
 * Actions
 */
$parameters = array();
// Note that $action and $object may have been modified by some hooks
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
// Test on permission not required here. This is an anonymous form. Check is done on constant to enable and mitigation.
$error = 0;
$urlback = '';
$email = \GETPOST("email", "aZ09arobase");
$firstname = \GETPOST("firstname", "aZ09");
$lastname = \GETPOST("lastname", "aZ09");
$societe = \GETPOST("societe", "aZ09");
$idprof2 = \GETPOST("idprof2", "aZ09");
$tva_intra = \GETPOST("tva_intra", "aZ09");
$address = \GETPOST("address");
$zipcode = \GETPOST("zipcode", "aZ09");
$town = \GETPOST("town", "aZ09");
$country_id = \GETPOSTINT("country_id");
$amount = (float) \GETPOST("amount", "int");
$companyId = 0;
$productIdForFreeAmountInvoice = (int) \getDolGlobalString('PRODUCT_ID_FOR_FREE_AMOUNT_INVOICE');
// Check Captcha code if is enabled
$sessionkey = 'dol_antispam_value';
$ok = \array_key_exists($sessionkey, $_SESSION) && \strtolower($_SESSION[$sessionkey]) == \strtolower(\GETPOST('code'));
// Create invoice for this donation
$invoice = new \Facture($db);
/*
 * View
 */
$form = new \Form($db);
$formcompany = new \FormCompany($db);
$messagemandatory = '<span class="">' . $langs->trans("FieldsWithAreMandatory", '*') . '</span>';
$country_id = \GETPOSTINT('country_id');
$country_code = \getCountry($country_id, '2', $db, $langs);
// Amount
$amount = (float) (\GETPOST('amount') ? \price2num(\GETPOST('amount', 'alpha'), 'MT', 2) : '');
// - If a min is set, we take it into account
$amount = \max(0, (float) $amount, (float) \getDolGlobalInt("DONATION_INVOICE_MIN_AMOUNT"));
// Clean the amount
$amount = \price2num($amount);
$showedamount = $amount > 0 ? $amount : 5;