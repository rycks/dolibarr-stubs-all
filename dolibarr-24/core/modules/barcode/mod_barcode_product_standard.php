<?php

/**
 *	Class to manage barcode with standard rule
 */
class mod_barcode_product_standard extends \ModeleNumRefBarCode
{
    public $name = 'Standard';
    // Model Name
    /**
     * Dolibarr version of the loaded document
     * @var string Version, possible values are: 'development', 'experimental', 'dolibarr', 'dolibarr_deprecated' or a version string like 'x.y.z'''|'development'|'dolibarr'|'experimental'
     */
    public $version = 'dolibarr';
    // 'development', 'experimental', 'dolibarr'
    /**
     * @var ?string
     */
    public $searchcode;
    // Search string
    /**
     * @var ?int
     */
    public $numbitcounter;
    // Number of digits in the counter
    /**
     *	Constructor
     */
    public function __construct()
    {
    }
    /**		Return description of module
     *
     * 		@param	Translate 		$langs		Object langs
     * 		@return string      			Description of module
     */
    public function info($langs)
    {
    }
    /**
     * Return an example of result returned by getNextValue
     *
     * @param	?Translate		$langs			Object langs
     * @param	?CommonObject	$objproduct		Object
     * @return	string							Return string example
     */
    public function getExample($langs = \null, $objproduct = \null)
    {
    }
    /**
     *  Return literal barcode type code from numerical rowid type of barcode
     *
     *	@param	DoliDB	$db         Database
     *  @param  int  	$type       Type of barcode (EAN, ISBN, ...) as rowid
     *  @return string
     */
    public function literalBarcodeType($db, $type = 0)
    {
    }
    /**
     * Return next value
     *
     * @param	?CommonObject	$objproduct 	Object product (not used)
     * @param	string			$type    		Type of barcode (EAN, ISBN, ...)
     * @return 	string|int<-1,-1> 				Value if OK, '' if module not configured, <0 if KO
     */
    public function getNextValue($objproduct = \null, $type = '')
    {
    }
    /**
     * 	Check validity of code according to its rules
     *
     *	@param	DoliDB		$db					Database handler
     *	@param	string		$code				Code to check/correct
     *	@param	Product|Societe	$product			Object product
     *  @param  int<0,1>  	$thirdparty_type   	0 = customer/prospect , 1 = supplier
     *  @param	string		$type       	    type of barcode (EAN, ISBN, ...)
     *  @return int<-7,0>						0 if OK
     * 											-1 ErrorBadProductCodeSyntax
     * 											-2 ErrorProductCodeRequired
     * 											-3 ErrorProductCodeAlreadyUsed
     * 											-7 ErrorBadClass
     */
    public function verif($db, &$code, $product, $thirdparty_type, $type)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Return if a code is used (by other element)
     *
     *	@param	DoliDB		$db			Handler access base
     *	@param	string		$code		Code to check
     *	@param	Product		$product	Object product
     *	@return	int						0 if available, <0 if KO
     */
    public function verif_dispo($db, $code, $product)
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