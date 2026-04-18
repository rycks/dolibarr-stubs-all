<?php

$action = \GETPOST('action', 'aZ09');
// Hook to be used by external payment modules (ie Payzen, ...)
$hookmanager = new \HookManager($db);
$error = 0;
$public = \GETPOST('DONATION_ENABLE_PUBLIC');
$minamount = \GETPOST('DONATION_MIN_AMOUNT');
$publiccounters = \GETPOST('DONATION_COUNTERS_ARE_PUBLIC');
$payonline = \GETPOST('DONATION_NEWFORM_PAYONLINE');
$res = \dolibarr_set_const($db, "DONATION_ENABLE_PUBLIC", $public, 'chaine', 0, '', $conf->entity);
$res = \dolibarr_set_const($db, "DONATION_MIN_AMOUNT", $minamount, 'chaine', 0, '', $conf->entity);
$res = \dolibarr_set_const($db, "DONATION_COUNTERS_ARE_PUBLIC", $publiccounters, 'chaine', 0, '', $conf->entity);
$res = \dolibarr_set_const($db, "DONATION_NEWFORM_PAYONLINE", $payonline, 'chaine', 0, '', $conf->entity);
/*
 * View
 */
$form = new \Form($db);
$title = $langs->trans("DonationsSetup");
$help_url = 'EN:Module_Donation|FR:Module_Don';
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$head = \donation_admin_prepare_head();
$param = '';
$enabledisablehtml = $langs->trans("EnablePublicDonationForm") . ' ';
// Define $urlwithroot
$urlwithouturlroot = \preg_replace('/' . \preg_quote(\DOL_URL_ROOT, '/') . '$/i', '', \trim($dolibarr_main_url_root));
$urlwithroot = $urlwithouturlroot . \DOL_URL_ROOT;
// Initialize $validpaymentmethod
// The list can be complete by the hook 'doValidatePayment' executed inside getValidOnlinePaymentMethods()
$validpaymentmethod = \getValidOnlinePaymentMethods('', 1);
// Define $listofval using the $validpaymentmethod
$listofval = array();