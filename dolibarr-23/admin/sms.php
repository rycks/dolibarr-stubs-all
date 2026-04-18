<?php

$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel', 'alpha');
$substitutionarrayfortest = array('__ID__' => 'TESTIdRecord', '__PHONEFROM__' => 'TESTPhoneFrom', '__PHONETO__' => 'TESTPhoneTo', '__LASTNAME__' => 'TESTLastname', '__FIRSTNAME__' => 'TESTFirstname');
$error = 0;
$smsfrom = '';
$sendto = \GETPOST("sendto", 'alphanohtml');
$body = \GETPOST('message', 'alphanohtml');
$deliveryreceipt = \GETPOSTINT("deliveryreceipt");
$deferred = \GETPOSTINT('deferred');
$priority = \GETPOSTINT('priority');
$class = \GETPOSTINT('class');
$errors_to = \GETPOST("errorstosms", 'alphanohtml');
$formsms = new \FormSms($db);
/*
 * View
 */
$form = new \Form($db);
$linuxlike = 1;
$wikihelp = 'EN:Setup Sms|FR:Paramétrage Sms|ES:Configuración Sms';
// List of sending methods
$listofmethods = \is_array($conf->modules_parts['sms']) ? $conf->modules_parts['sms'] : array();