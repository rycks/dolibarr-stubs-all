<?php

$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel', 'alpha');
$usersignature = $user->signature;
$substitutionarrayfortest = array(
    '__ID__' => 'RecipientIdRecord',
    '__USER_LOGIN__' => $user->login,
    '__USER_EMAIL__' => $user->email,
    '__USER_SIGNATURE__' => $user->signature && !\getDolGlobalString('MAIN_MAIL_DO_NOT_USE_SIGN') ? $usersignature : '',
    // Done into actions_sendmails
    '__SENDEREMAIL_SIGNATURE__' => $user->signature && !\getDolGlobalString('MAIN_MAIL_DO_NOT_USE_SIGN') ? $usersignature : '',
    // Done into actions_sendmails
    //'__EMAIL__' => 'RecipientEMail',				// Done into actions_sendmails
    '__LASTNAME__' => 'RecipientLastname',
    '__FIRSTNAME__' => 'RecipientFirstname',
    '__ADDRESS__' => 'RecipientAddress',
    '__ZIP__' => 'RecipientZip',
    '__TOWN_' => 'RecipientTown',
    '__COUNTRY__' => 'RecipientCountry',
    '__DOL_MAIN_URL_ROOT__' => \DOL_MAIN_URL_ROOT,
    '__CHECK_READ__' => '<img src="' . \DOL_MAIN_URL_ROOT . '/public/emailing/mailing-read.php?tag=undefinedtag&securitykey=' . \dol_hash(\getDolGlobalString('MAILING_EMAIL_UNSUBSCRIBE_KEY') . "-undefinedtag", 'md5') . '" width="1" height="1" style="width:1px;height:1px" border="0"/>',
);
// List of sending methods
$listofmethods = array();
// Actions to send emails
$id = 0;
$actiontypecode = '';
// Not an event for agenda
$triggersendname = '';
// Disable triggers
$paramname = 'id';
$mode = 'emailfortest';
$trackid = $action == 'testhtml' ? "testhtml" : "test";
$sendcontext = 'emailing';
/*
 * View
 */
$form = new \Form($db);
$linuxlike = 1;
$port = \getDolGlobalInt('MAIN_MAIL_SMTP_PORT_EMAILING', (int) \ini_get('smtp_port'));
$server = \getDolGlobalString('MAIN_MAIL_SMTP_SERVER_EMAILING', \ini_get('SMTP'));
$wikihelp = 'EN:Setup_EMails|FR:Paramétrage_EMails|ES:Configuración_EMails';
$head = \email_admin_prepare_head();
// List of oauth services
$oauthservices = array();