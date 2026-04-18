<?php

/**
 *	Class to manage barcode with standard rule
 */
class mod_barcode_thirdparty_standard extends \ModeleNumRefBarCode
{
    public $name = 'Standard';
    // Model Name
    /**
     * @var int<0,1> Editable code
     */
    public $code_modifiable;
    /**
     * @var int<0,1> Modified code if it is invalid
     */
    public $code_modifiable_invalide;
    /**
     * @var int<0,1> Modified code if it is null
     */
    public $code_modifiable_null;
    /**
     * @var int<0,1> Optional code
     */
    public $code_null;
    /**
     * Dolibarr version of the loaded document
     * @var string Version, possible values are: 'development', 'experimental', 'dolibarr', 'dolibarr_deprecated' or a version string like 'x.y.z'''|'development'|'dolibarr'|'experimental'
     */
    public $version = 'dolibarr';
    // 'development', 'experimental', 'dolibarr'
    /**
     * @var string Search string
     */
    public $searchcode;
    /**
     * Number of digits for the counter (not bits, but digits)
     *
     * @var int<0,max>
     */
    public $numbitcounter;
    /**
     * @var int<0,1>	If the prefix field of third party must be filled when using {pre}
     */
    public $prefixIsRequired;
    /**
     *	Constructor
     */
    public function __construct()
    {
    }
    /**
     * Return description of module
     *
     * @param	Translate 	$langs		Object langs
     * @return  string      			Description of module
     */
    public function info($langs)
    {
    }
    /**
     * Return an example of result returned by getNextValue
     *
     * @param	?Translate		$langs			Object langs
     * @param	?CommonObject	$objthirdparty	Object third-party / Societe
     * @return	string							Return string example
     */
    public function getExample($langs = \null, $objthirdparty = \null)
    {
    }
    /**
     *  Return literal barcode type code from numerical rowid type of barcode
     *
     *	@param	DoliDB    	$db         Database
     *  @param  int  		$type       Type of barcode (EAN, ISBN, ...) as rowid
     *  @return string
     */
    public function literalBarcodeType($db, $type = 0)
    {
    }
    /**
     * Return next value
     *
     * @param	?CommonObject	$objthirdparty  Object third-party
     * @param	string			$type       	Type of barcode (EAN, ISBN, ...)
     * @return 	string      					Value if OK, '' if module not configured, <0 if KO
     */
    public function getNextValue($objthirdparty = \null, $type = '')
    {
    }
    /**
     * 	Check validity of code according to its rules
     *
     *	@param	DoliDB		$db					Database handler
     *	@param	string		$code				Code to check/correct
     *	@param	Societe|Product	$thirdparty	Object third party
     *  @param  int<0,1>  	$thirdparty_type   	0 = customer/prospect , 1 = supplier
     *  @param	string		$type       	    type of barcode (EAN, ISBN, ...)
     *  @return int<-7,0>						0 if OK
     * 											-1 ErrorBadCustomerCodeSyntax
     * 											-2 ErrorCustomerCodeRequired
     * 											-3 ErrorCustomerCodeAlreadyUsed
     * 											-7 ErrorBadClass
     */
    public function verif($db, &$code, $thirdparty, $thirdparty_type, $type)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Return if a code is used (by other element)
     *
     *	@param	DoliDB		$db			Handler access base
     *	@param	string		$code		Code to check
     *	@param	Societe		$thirdparty	Object third-party
     *	@return	int						0 if available, <0 if KO
     */
    public function verif_dispo($db, $code, $thirdparty)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Return if a barcode value match syntax
     *
     *	@param	string	$codefortest	Code to check syntax
     *  @param	string	$typefortest	Type of barcode (ISBN, EAN, ...)
     *	@return	int						0 if OK, <0 if KO
     */
    public function verif_syntax($codefortest, $typefortest)
    {
    }
}