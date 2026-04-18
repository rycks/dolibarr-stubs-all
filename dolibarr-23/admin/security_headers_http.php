<?php

$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel', 'alpha');
$forceCSP = \getDolGlobalString("MAIN_SECURITY_FORCECSP");
$selectarrayCSPDirectives = \GetContentPolicyDirectives();
$selectarrayCSPSources = \GetContentPolicySources();
$forceCSPArr = \GetContentPolicyToArray($forceCSP);
$error = 0;
$reg = array();
$code = $reg[1];
$value = \GETPOST($code, 'alpha') ? \GETPOST($code, 'alpha') : 1;
/**
 * Function to fix a bad security CSP string
 *
 * @param string $securitycsp	Value of Content-Security-Policy to check and sanitize
 * @return string				New value
 */
function cleanSecurityCSP($securitycsp)
{
}
/*
 * View
 */
$form = new \Form($db);
$wikihelp = 'EN:Setup_Security|FR:Paramétrage_Sécurité|ES:Configuración_Seguridad';
$head = \security_prepare_head();
$examplecsprule = "frame-ancestors 'self'; img-src * data:; font-src *; default-src 'self' 'unsafe-inline' 'unsafe-eval' *.paypal.com *.stripe.com *.google.com *.googleapis.com *.google-analytics.com *.googletagmanager.com;";