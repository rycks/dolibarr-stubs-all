<?php

/**
 * 	Class to manage contract numbering rules Olive
 */
class mod_contract_olive extends \ModelNumRefContracts
{
    // variables inherited from ModelNumRefContracts class
    public $name = 'Olive';
    public $version = 'dolibarr';
    /**
     *	Constructor
     */
    public function __construct()
    {
    }
    /**
     *	Return description of module
     *
     *	@param	Translate	$langs      Lang object to use for output
     *  @return string      			Descriptive text
     */
    public function info($langs)
    {
    }
    /**
     *	Return numbering example
     *
     *	@return     string      Example
     */
    public function getExample()
    {
    }
    /**
     * Return an example of result returned by getNextValue
     *
     *	@param	Societe		$objsoc		Object thirdparty
     *	@param	Contrat		$contract	Object contract
     *	@return string|int<-1,0>		Value if OK, <=0 if KO
     */
    public function getNextValue($objsoc, $contract)
    {
    }
    /**
     * 	Check validity of code according to its rules
     *
     *	@param	DoliDB		$db		Database handler
     *	@param	string		$code	Code to check/correct
     *	@param	Product		$product	Object product
     *  @param  int		  	$type   0 = product , 1 = service
     *  @return int					0 if OK
     * 								-1 ErrorBadProductCodeSyntax
     * 								-2 ErrorProductCodeRequired
     * 								-3 ErrorProductCodeAlreadyUsed
     * 								-4 ErrorPrefixRequired
     */
    public function verif($db, &$code, $product, $type)
    {
    }
}