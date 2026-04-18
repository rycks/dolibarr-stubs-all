<?php

// Get parameters
$action = \GETPOST("action", 'alpha', 3);
$cancel = \GETPOST('cancel', 'alpha');
$backtopage = \GETPOST('backtopage');
$id = \GETPOSTINT("id");
$source = \GETPOST("source", "alpha");
// source can be a source or a paymentmode
$ribid = \GETPOSTINT("ribid");
// Security check
$socid = \GETPOSTINT("socid");
// Initialize objects
$object = new \Societe($db);
$companybankaccount = new \CompanyBankAccount($db);
$companypaymentmode = new \CompanyPaymentMode($db);
$prelevement = new \BonPrelevement($db);
$extrafields = new \ExtraFields($db);
// Permissions
$permissiontoread = $user->hasRight('societe', 'lire');
$permissiontoadd = $user->hasRight('societe', 'creer');
// Used by the include of actions_addupdatedelete.inc.php and actions_builddoc.inc.php
$permissiontoaddupdatepaymentinformation = $user->hasRight('societe', 'thirdparty_paymentinformation', 'write');
// Check permission on company
$result = \restrictedArea($user, 'societe', '', '');
$stripe = \null;
// Stripe object
$stripeacc = \null;
// Stripe Account
$stripecu = \null;
// Remote stripe customer
$servicestatus = 0;
$site_account = 'UnknownSiteAccount';
$service = 'StripeTest';
$site_account = $stripearrayofkeysbyenv[$servicestatus]['publishable_key'];
$stripe = new \Stripe($db);
$stripeacc = $stripe->getStripeAccount($service);
// Get Stripe OAuth connect account (no remote access to Stripe here)
$stripecu = $stripe->getStripeCustomerAccount($object->id, $servicestatus, $site_account);
$error = 0;
$morehtmlright = '';
$parameters = array('id' => $socid);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$savid = $id;
$id = $socid;
$upload_dir = $conf->societe->multidir_output[$object->entity ?? $conf->entity];
$id = $savid;
/*
 *	View
 */
$form = new \Form($db);
$formother = new \FormOther($db);
$formfile = new \FormFile($db);
$title = $langs->trans("ThirdParty");
$help_url = '';
$head = \societe_prepare_head($object);
$actionforadd = 'update';
$actionforadd = 'add';
$linkback = '<a href="' . \DOL_URL_ROOT . '/societe/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
$showcardpaymentmode = 0;
// Get list of remote payment modes
$listofsources = array();
$customerstripe = \null;
$nblocal = 0;
$nbremote = 0;
$arrayofremoteban = array();
$rib_list = $object->get_all_rib();
//Hook to display your print listing (list of CB card from Stancer Plugin for example)
$parameters = array('arrayfields' => array(), 'param' => '', 'sortfield' => '', 'sortorder' => '', 'linetype' => '');
$reshook = $hookmanager->executeHooks('printNewTable', $parameters, $object);
$linkback = '<a href="' . \DOL_URL_ROOT . '/societe/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
$required = \getDolGlobalInt('WITHDRAWAL_WITHOUT_BIC') == 0 ? "fieldrequired" : "";
// Show fields of bank account
$bankaccount = $companybankaccount;
$linkback = '<a href="' . \DOL_URL_ROOT . '/societe/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';