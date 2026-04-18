<?php

/**
 *  Define head array for tabs of paypal tools setup pages
 *
 * @return	array<array{0:string,1:string,2:string}>	Array of tabs to show
 */
function paypaladmin_prepare_head()
{
}
/**
 * Send redirect to paypal to browser
 *
 * @param	float	$paymentAmount		Amount
 * @param   string	$currencyCodeType	Currency code
 * @param	string	$paymentType		Payment type
 * @param  	string	$returnURL			Url to use if payment is OK
 * @param   string	$cancelURL			Url to use if payment is KO
 * @param   string	$tag				Full tag
 * @return	string						No return (a redirect is done) if OK, or Error message if KO
 */
function print_paypal_redirect($paymentAmount, $currencyCodeType, $paymentType, $returnURL, $cancelURL, $tag)
{
}
/**
 *-------------------------------------------------------------------------------------------------------------------------------------------
 * Purpose:     Prepares the parameters for the SetExpressCheckout API Call.
 * Inputs:
 *      paymentAmount:      Total value of the shopping cart
 *      currencyCodeType:   Currency code value the PayPal API
 *      paymentType:        paymentType has to be one of the following values: Sale or Order or Authorization
 *      returnURL:          the page where buyers return to after they are done with the payment review on PayPal
 *      cancelURL:          the page where buyers return to when they cancel the payment review on PayPal
 *      shipToName:     the Ship to name entered on the merchant's site
 *      shipToStreet:       the Ship to Street entered on the merchant's site
 *      shipToCity:         the Ship to City entered on the merchant's site
 *      shipToState:        the Ship to State entered on the merchant's site
 *      shipToCountryCode:  the Code for Ship to Country entered on the merchant's site
 *      shipToZip:          the Ship to ZipCode entered on the merchant's site
 *      shipToStreet2:      the Ship to Street2 entered on the merchant's site
 *      phoneNum:           the phoneNum  entered on the merchant's site
 *      email:              the buyer email
 *      desc:               Product description
 * See https://developer.paypal.com/docs/classic/api/merchant/SetExpressCheckout_API_Operation_NVP/
 *
 * @param 	double 			$paymentAmount		Payment amount
 * @param 	string 			$currencyCodeType	Currency
 * @param 	string 			$paymentType		Payment type
 * @param 	string 			$returnURL			Return Url
 * @param 	string 			$cancelURL			Cancel Url
 * @param 	string 			$tag				Full tag
 * @param 	string 			$solutionType		Type ('Mark' or 'Sole')
 * @param 	string 			$landingPage		Landing page ('Login' or 'Billing')
 * @param	string			$shipToName			Ship to name
 * @param	string			$shipToStreet		Ship to street
 * @param	string			$shipToCity			Ship to city
 * @param	string			$shipToState		Ship to state
 * @param	string			$shipToCountryCode	Ship to country code
 * @param	string			$shipToZip			Ship to zip
 * @param	string			$shipToStreet2		Ship to street2
 * @param	string			$phoneNum			Phone
 * @param	string			$email				Email
 * @param	string			$desc				Description
 * @return	array<string,string>				Array
 */
function callSetExpressCheckout($paymentAmount, $currencyCodeType, $paymentType, $returnURL, $cancelURL, $tag, $solutionType, $landingPage, $shipToName, $shipToStreet, $shipToCity, $shipToState, $shipToCountryCode, $shipToZip, $shipToStreet2, $phoneNum, $email = '', $desc = '')
{
}
/**
 * 	Prepares the parameters for the GetExpressCheckoutDetails API Call.
 *
 *	@param	string	$token			Token
 *	@return	array<string,string>	The NVP Collection object of the GetExpressCheckoutDetails Call Response.
 */
function getDetails($token)
{
}
/**
 *	Validate payment
 *
 *	@param	string	$token				Token
 *	@param	string	$paymentType		Type
 *	@param	string	$currencyCodeType	Currency
 *	@param	string	$payerID			Payer ID
 *	@param	string	$ipaddress			IP Address
 *	@param	string	$FinalPaymentAmt	Amount
 *	@param	string	$tag				Full tag
 *	@return	array<string,string>
 */
function confirmPayment($token, $paymentType, $currencyCodeType, $payerID, $ipaddress, $FinalPaymentAmt, $tag)
{
}
/**
 *	This function makes a DoDirectPayment API call
 *
 *  paymentType:        paymentType has to be one of the following values: Sale or Order or Authorization
 *  paymentAmount:      total value of the shopping cart
 *  currencyCode:       currency code value the PayPal API
 *  firstName:          first name as it appears on credit card
 *  lastName:           last name as it appears on credit card
 *  street:             buyer's street address line as it appears on credit card
 *  city:               buyer's city
 *  state:              buyer's state
 *  countryCode:        buyer's country code
 *  zip:                buyer's zip
 *  creditCardType:     buyer's credit card type (i.e. Visa, MasterCard ... )
 *  creditCardNumber:   buyers credit card number without any spaces, dashes or any other characters
 *  expDate:            credit card expiration date
 *  cvv2:               Card Verification Value
 *	@return		array<string,string>	The NVP Collection object of the DoDirectPayment Call Response.
 */
/*
function DirectPayment($paymentType, $paymentAmount, $creditCardType, $creditCardNumber, $expDate, $cvv2, $firstName, $lastName, $street, $city, $state, $zip, $countryCode, $currencyCode, $tag)
{
	//declaring of global variables
	global $conf, $langs;
	global $API_Endpoint, $API_Url, $API_version, $USE_PROXY, $PROXY_HOST, $PROXY_PORT;
	global $PAYPAL_API_USER, $PAYPAL_API_PASSWORD, $PAYPAL_API_SIGNATURE;

	//Construct the parameter string that describes DoDirectPayment
	$nvpstr = '';
	$nvpstr = $nvpstr . "&AMT=" . urlencode($paymentAmount);              // deprecated by paypal
	$nvpstr = $nvpstr . "&CURRENCYCODE=" . urlencode($currencyCode);
	$nvpstr = $nvpstr . "&PAYMENTACTION=" . urlencode($paymentType);      // deprecated by paypal
	$nvpstr = $nvpstr . "&CREDITCARDTYPE=" . urlencode($creditCardType);
	$nvpstr = $nvpstr . "&ACCT=" . urlencode($creditCardNumber);
	$nvpstr = $nvpstr . "&EXPDATE=" . urlencode($expDate);
	$nvpstr = $nvpstr . "&CVV2=" . urlencode($cvv2);
	$nvpstr = $nvpstr . "&FIRSTNAME=" . urlencode($firstName);
	$nvpstr = $nvpstr . "&LASTNAME=" . urlencode($lastName);
	$nvpstr = $nvpstr . "&STREET=" . urlencode($street);
	$nvpstr = $nvpstr . "&CITY=" . urlencode($city);
	$nvpstr = $nvpstr . "&STATE=" . urlencode($state);
	$nvpstr = $nvpstr . "&COUNTRYCODE=" . urlencode($countryCode);
	$nvpstr = $nvpstr . "&IPADDRESS=" . getUserRemotIP();
	$nvpstr = $nvpstr . "&INVNUM=" . urlencode($tag);

	$resArray=hash_call("DoDirectPayment", $nvpstr);

	return $resArray;
}
*/
/**
 * hash_call: Function to perform the API call to PayPal using API signature
 *
 * @param	string	$methodName 	is name of API  method.
 * @param	string	$nvpStr 		is nvp string.
 * @return	array<string,string>		returns an associative array containing the response from the server.
 */
function hash_call($methodName, $nvpStr)
{
}
/**
 * This function will take NVPString and convert it to an Associative Array and it will decode the response.
 * It is useful to search for a particular key and displaying arrays.
 *
 * @param	string	$nvpstr 		NVPString
 * @return	array<string,string>	nvpArray = Associative Array
 */
function deformatNVP($nvpstr)
{
}
/**
 * 	Get API errors
 *
 * 	@return	string[]		Array of errors
 */
function getApiError()
{
}