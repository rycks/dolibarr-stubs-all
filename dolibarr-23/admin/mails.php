<?php

$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel', 'alpha');
$trackid = \GETPOST('trackid');
$usersignature = $user->signature;
$substitutionarrayfortest = array(
    '__USER_LOGIN__' => $user->login,
    '__USER_EMAIL__' => $user->email,
    '__USER_FIRSTNAME__' => $user->firstname,
    '__USER_LASTNAME__' => $user->lastname,
    '__USER_SIGNATURE__' => $user->signature && !\getDolGlobalString('MAIN_MAIL_DO_NOT_USE_SIGN') ? $usersignature : '',
    // Done into actions_sendmails
    '__SENDEREMAIL_SIGNATURE__' => $user->signature && !\getDolGlobalString('MAIN_MAIL_DO_NOT_USE_SIGN') ? $usersignature : '',
    // Done into actions_sendmails
    //'__ID__' => 'RecipientID',
    //'__EMAIL__' => 'RecipientEMail',				// Done into actions_sendmails
    '__LASTNAME__' => $langs->trans("Lastname") . ' (' . $langs->trans("MailRecipient") . ')',
    '__FIRSTNAME__' => $langs->trans("Firstname") . ' (' . $langs->trans("MailRecipient") . ')',
    //'__ADDRESS__'=> $langs->trans("Address").' ('.$langs->trans("MailRecipient").')',
    //'__ZIP__'=> $langs->trans("Zip").' ('.$langs->trans("MailRecipient").')',
    //'__TOWN_'=> $langs->trans("Town").' ('.$langs->trans("MailRecipient").')',
    //'__COUNTRY__'=> $langs->trans("Country").' ('.$langs->trans("MailRecipient").')',
    '__DOL_MAIN_URL_ROOT__' => \DOL_MAIN_URL_ROOT,
    '__CHECK_READ__' => '<img src="' . \DOL_MAIN_URL_ROOT . '/public/emailing/mailing-read.php?tag=undefinedtag&securitykey=' . \dol_hash(\getDolGlobalString('MAILING_EMAIL_UNSUBSCRIBE_KEY') . "-undefinedtag", 'md5') . '" width="1" height="1" style="width:1px;height:1px" border="0" />',
);
/*
 * Actions
 */
$error = 0;
// Actions to send emails
$id = 0;
$actiontypecode = '';
// Not an event for agenda
$triggersendname = '';
// Disable triggers
$paramname = 'id';
$mode = 'emailfortest';
$trackid = $action == 'send' ? \GETPOST('trackid', 'aZ09') : $action;
$sendcontext = 'standard';
/*
 * View
 */
$form = new \Form($db);
// Set default variables
$linuxlike = 1;
$port = \getDolGlobalInt('MAIN_MAIL_SMTP_PORT', (int) \ini_get('smtp_port'));
$server = \getDolGlobalString('MAIN_MAIL_SMTP_SERVER', \ini_get('SMTP'));
$wikihelp = 'EN:Setup_EMails|FR:Paramétrage_EMails|ES:Configuración_EMails';
$head = \email_admin_prepare_head();
// List of sending methods
$listofmethods = array();
// List of oauth services
$oauthservices = array();
// From
$help = $form->textwithpicto('', $langs->trans("EMailHelpMsgSPFDKIM"));
// Default from type
$liste = array('user' => array('label' => $langs->trans('UserEmail'), 'data-html' => $langs->trans('UserEmail')), 'company' => array('label' => $langs->trans('CompanyEmail') . ' (' . \getDolGlobalString('MAIN_INFO_SOCIETE_MAIL', $langs->trans("NotDefined")) . ')', 'data-html' => $langs->trans('CompanyEmail') . ' <span class="opacitymedium">(' . \getDolGlobalString('MAIN_INFO_SOCIETE_MAIL', $langs->trans("NotDefined")) . ')</span>'));