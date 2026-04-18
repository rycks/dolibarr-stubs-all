<?php

$action = \GETPOST('action', 'aZ09');
// Hook to be used by external payment modules (ie Payzen, ...)
$hookmanager = new \HookManager($db);
$error = 0;
$public = \GETPOST('MEMBER_ENABLE_PUBLIC');
$minamount = \GETPOST('MEMBER_MIN_AMOUNT');
$publiccounters = \GETPOST('MEMBER_COUNTERS_ARE_PUBLIC');
$showtable = \GETPOST('MEMBER_SHOW_TABLE');
$showvoteallowed = \GETPOST('MEMBER_SHOW_VOTE_ALLOWED');
$payonline = \GETPOST('MEMBER_NEWFORM_PAYONLINE');
$forcetype = \GETPOSTINT('MEMBER_NEWFORM_FORCETYPE');
$forcemorphy = \GETPOST('MEMBER_NEWFORM_FORCEMORPHY', 'aZ09');
$res = \dolibarr_set_const($db, "MEMBER_ENABLE_PUBLIC", $public, 'chaine', 0, '', $conf->entity);
$res = \dolibarr_set_const($db, "MEMBER_NEWFORM_AMOUNT", $amount, 'chaine', 0, '', $conf->entity);
$res = \dolibarr_set_const($db, "MEMBER_MIN_AMOUNT", $minamount, 'chaine', 0, '', $conf->entity);
$res = \dolibarr_set_const($db, "MEMBER_COUNTERS_ARE_PUBLIC", $publiccounters, 'chaine', 0, '', $conf->entity);
$res = \dolibarr_set_const($db, "MEMBER_SKIP_TABLE", $showtable ? 0 : 1, 'chaine', 0, '', $conf->entity);
$res = \dolibarr_set_const($db, "MEMBER_NEWFORM_PAYONLINE", $payonline, 'chaine', 0, '', $conf->entity);
/*
 * View
 */
$form = new \Form($db);
$title = $langs->trans("MembersSetup");
$help_url = 'EN:Module_Foundations|FR:Module_Adh&eacute;rents|ES:M&oacute;dulo_Miembros|DE:Modul_Mitglieder';
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$head = \member_admin_prepare_head();
$param = '';
$enabledisablehtml = $langs->trans("EnablePublicSubscriptionForm") . ' ';
// Define $urlwithroot
$urlwithouturlroot = \preg_replace('/' . \preg_quote(\DOL_URL_ROOT, '/') . '$/i', '', \trim($dolibarr_main_url_root));
$urlwithroot = $urlwithouturlroot . \DOL_URL_ROOT;
// Show the table of all available membership types. If not, show a form (as the default was for Dolibarr <=16.0)
$skiptable = \getDolGlobalInt('MEMBER_SKIP_TABLE');
// Force Type
$adht = new \AdherentType($db);
$listofval = array();
$forcetype = \getDolGlobalInt('MEMBER_NEWFORM_FORCETYPE', -1);
// Force nature of member (mor/phy)
$morphys = ["phy" => $langs->trans("Physical"), "mor" => $langs->trans("Moral")];
$forcenature = \getDolGlobalString('MEMBER_NEWFORM_FORCEMORPHY');
// Initialize $validpaymentmethod
// The list can be complete by the hook 'doValidatePayment' executed inside getValidOnlinePaymentMethods()
$validpaymentmethod = \getValidOnlinePaymentMethods('', 1);
// Define $listofval using the $validpaymentmethod
$listofval = array();