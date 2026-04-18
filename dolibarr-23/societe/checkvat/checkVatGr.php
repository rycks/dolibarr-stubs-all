<?php

$username = \getDolGlobalString('AADE_WEBSERVICE_USER');
// Get username from request
$password = \getDolGlobalString('AADE_WEBSERVICE_KEY');
// Get password from request
$myafm = \preg_replace('/\\D/', '', \getDolGlobalString('MAIN_INFO_TVAINTRA'));
// Get Vat from request after removing non-digit characters
$afm = \GETPOST('afm');
// Get client Vat from request
// Make call to check VAT for Greek client
$result = \checkVATGR($username, $password, $myafm, $afm);
// Encode the result as JSON and output
/**
* Request VAT details
* @param 	string 	$username 			Company AADE username
* @param 	string 	$password 			Company AADE password
* @param 	string 	$AFMcalledby 		Company vat number
* @param 	string 	$AFMcalledfor 		Client vat number
* @return   string
*/
function checkVATGR($username, $password, $AFMcalledby, $AFMcalledfor)
{
}