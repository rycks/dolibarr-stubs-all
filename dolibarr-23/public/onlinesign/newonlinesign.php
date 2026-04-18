<?php

\define("NOLOGIN", 1);
\define("NOCSRFCHECK", 1);
\define('NOIPCHECK', '1');
\define('NOBROWSERNOTIF', '1');
// For MultiCompany module.
// Do not use GETPOST here, function is not defined and define must be done before including main.inc.php
// Because 2 entities can have the same ref.
$entity = !empty($_GET['entity']) ? (int) $_GET['entity'] : (!empty($_POST['entity']) ? (int) $_POST['entity'] : 1);
\define("DOLENTITY", $entity);
// Security check
// No check on module enabled. Done later according to $validpaymentmethod
// Get parameters
$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel', 'alpha');
$confirm = \GETPOST('confirm', 'alpha');
$refusepropal = \GETPOST('refusepropal', 'alpha');
$message = \GETPOST('message', 'aZ09');
// Input are:
// type ('invoice','order','contractline'),
// id (object id),
// amount (required if id is empty),
// tag (a free text, required if type is empty)
// currency (iso code)
$suffix = \GETPOST("suffix", 'aZ09');
$source = (string) \GETPOST("source", 'alpha');
$ref = $REF = \GETPOST("ref", 'alpha');
$urlok = '';
$urlko = '';
// Define $urlwithroot
//$urlwithouturlroot=preg_replace('/'.preg_quote(DOL_URL_ROOT,'/').'$/i','',trim($dolibarr_main_url_root));
//$urlwithroot=$urlwithouturlroot.DOL_URL_ROOT;		// This is to use external domain name found into config file
$urlwithroot = \DOL_MAIN_URL_ROOT;
// This is to use same domain name than current. For Paypal payment, we can use internal URL like localhost.
// Complete urls for post treatment
$SECUREKEY = \GETPOST("securekey");
$urlok = \preg_replace('/&$/', '', $urlok);
// Remove last &
$urlko = \preg_replace('/&$/', '', $urlko);
// Remove last &
$creditor = $mysoc->name;
$type = $source;
// Check securitykey
$securekeyseed = '';
$error = 0;
$sql = "UPDATE " . \MAIN_DB_PREFIX . "propal";
$resql = $db->query($sql);
// $action == "dosign" is handled later...
/*
 * View
 */
$form = new \Form($db);
$head = '';
$title = $langs->trans("OnlineSignature");
$replacemainarea = (empty($conf->dol_hide_leftmenu) ? '<div>' : '') . '<div>';
// Output introduction text
$text = '';
$reg = array();
$text = '<tr><td align="center"><br>' . $text . '<br></td></tr>' . "\n";
$found = \false;
$error = 0;
$found = \true;
$result = $object->fetch_thirdparty($object->socid);
// Amount
$amount = '<tr class="CTableRow2"><td class="CTableRow2">' . $langs->trans("Amount");
// Call Hook amountPropalSign
$parameters = array('source' => $source);
$reshook = $hookmanager->executeHooks('amountPropalSign', $parameters, $object, $action);
// Object
$text = '<b>' . $langs->trans("SignatureProposalRef", $object->ref) . '</b>';
$last_main_doc_file = $object->last_main_doc;
// Call Hook addFormSign
$parameters = array('source' => $source);
$reshook = $hookmanager->executeHooks('addFormSign', $parameters, $object, $action);