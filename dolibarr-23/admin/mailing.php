<?php

$action = \GETPOST('action', 'aZ09');
$form = new \Form($db);
/*
 * Actions
 */
$error = 0;
$mailfrom = \GETPOST('MAILING_EMAIL_FROM', 'alpha');
$mailerror = \GETPOST('MAILING_EMAIL_ERRORSTO', 'alpha');
$checkread = \GETPOST('value', 'alpha');
$checkread_key = \GETPOST('MAILING_EMAIL_UNSUBSCRIBE_KEY', 'alpha');
$contactbulkdefault = \GETPOSTINT('MAILING_CONTACT_DEFAULT_BULK_STATUS');
$batchlimit = \GETPOSTINT('MAILING_LIMIT_SENDBYWEB');
$res = \dolibarr_set_const($db, "MAILING_EMAIL_FROM", $mailfrom, 'chaine', 0, '', $conf->entity);
$res = \dolibarr_set_const($db, "MAILING_EMAIL_ERRORSTO", $mailerror, 'chaine', 0, '', $conf->entity);
$res = \dolibarr_set_const($db, "MAILING_DELAY", $mailingdelay, 'chaine', 0, '', $conf->entity);
$res = \dolibarr_set_const($db, "MAILING_CONTACT_DEFAULT_BULK_STATUS", $contactbulkdefault, 'chaine', 0, '', $conf->entity);
$res = \dolibarr_set_const($db, "MAILING_LIMIT_SENDBYWEB", $batchlimit, 'chaine', 1, '', 0);
// Create temporary encryption key if needed
$res = \dolibarr_set_const($db, "MAILING_EMAIL_UNSUBSCRIBE_KEY", $checkread_key, 'chaine', 0, '', $conf->entity);
$setonsearchandlistgooncustomerorsuppliercard = \GETPOSTINT('value');
$res = \dolibarr_set_const($db, "SOCIETE_ON_SEARCH_AND_LIST_GO_ON_CUSTOMER_OR_SUPPLIER_CARD", $setonsearchandlistgooncustomerorsuppliercard, 'yesno', 0, '', $conf->entity);
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$constname = 'MAILING_EMAIL_UNSUBSCRIBE_KEY';
$help = \img_help(1, $langs->trans("EMailHelpMsgSPFDKIM"));
$blacklist_setting = array(0 => $langs->trans('No'), 1 => $langs->trans('Yes'), 2 => $langs->trans('DefaultStatusEmptyMandatory'));
$help = \img_help(1, $langs->trans("MailingNumberOfEmailsPerBatchHelp"));