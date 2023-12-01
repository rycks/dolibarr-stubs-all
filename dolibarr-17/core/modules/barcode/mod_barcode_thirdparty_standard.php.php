<?php

/**
 *	Class to manage barcode with standard rule
 */
class mod_barcode_thirdparty_standard extends \ModeleNumRefBarCode
{
    public $name = 'Standard';
    // Model Name
    public $code_modifiable;
    // Editable code
    public $code_modifiable_invalide;
    // Modified code if it is invalid
    public $code_modifiable_null;
    // Modified code if it is null
    public $code_null;
    // Optional code
    /**
     * Dolibarr version of the loaded document
     * @var string
     */
    public $version = 'dolibarr';
    // 'development', 'experimental', 'dolibarr'
    /**
     * @var int Automatic numbering
     */
    public $code_auto;
    public $searchcode;
    // Search string
    public $numbitcounter;
    // Number of digits the counter
    public $prefixIsRequired;
    // The prefix field of third party must be filled when using {pre}
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
     * @param	Translate	$langs			Object langs
     * @param	Societe		$objthirdparty	Object third-party
     * @return	string						Return string example
     */
    public function getExample($langs, $objthirdparty = 0)
    {
    }
    /**
     *  Return literal barcode type code from numerical rowid type of barcode
     *
     *	@param	Database    $db         Database
     *  @param  int  		$type       Type of barcode (EAN, ISBN, ...) as rowid
     *  @return string
     */
    public function literalBarcodeType($db, $type = '')
    {
    }
    /**
     * Return next value
     *
     * @param	Societe		$objthirdparty     Object third-party
     * @param	string		$type       	Type of barcode (EAN, ISBN, ...)
     * @return 	string      				Value if OK, '' if module not configured, <0 if KO
     */
    public function getNextValue($objthirdparty, $type = '')
    {
    }
    /**
     * 	Check validity of code according to its rules
     *
     *	@param	DoliDB		$db					Database handler
     *	@param	string		$code				Code to check/correct
     *	@param	Societe		$thirdparty			Object third-party
     *  @param  int		  	$thirdparty_type   	0 = customer/prospect , 1 = supplier
     *  @param	string		$type       	    type of barcode (EAN, ISBN, ...)
     *  @return int								0 if OK
     * 											-1 ErrorBadCustomerCodeSyntax
     * 											-2 ErrorCustomerCodeRequired
     * 											-3 ErrorCustomerCodeAlreadyUsed
     * 											-4 ErrorPrefixRequired
     */
    public function verif($db, &$code, $thirdparty, $thirdparty_type, $type)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Return if a code is used (by other element)
     *
     *	@param	DoliDB		$db			Handler acces base
     *	@param	string		$code		Code to check
     *	@param	Societe		$thirdparty	Objet third-party
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