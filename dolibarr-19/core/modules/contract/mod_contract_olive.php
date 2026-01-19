<?php

/**
 * 	Class to manage contract numbering rules Olive
 */
class mod_contract_olive extends \ModelNumRefContracts
{
    /**
     * @var string Nom du modele
     * @deprecated
     * @see $name
     */
    public $nom = 'Olive';
    /**
     * @var string model name
     */
    public $name = 'Olive';
    public $code_modifiable = 1;
    // Code modifiable
    public $code_modifiable_invalide = 1;
    // Code modifiable si il est invalide
    public $code_modifiable_null = 1;
    // Code modifiables si il est null
    public $code_null = 1;
    // Code facultatif
    /**
     * Dolibarr version of the loaded document
     * @var string
     */
    public $version = 'dolibarr';
    // 'development', 'experimental', 'dolibarr'
    /**
     * @var int Automatic numbering
     */
    public $code_auto = 0;
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
     * @param	Societe		$objsoc		Object thirdparty
     * @param	Contrat		$contract	Object contract
     * @return	string					Return next value
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