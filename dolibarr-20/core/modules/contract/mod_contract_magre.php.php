<?php

/**
 *	Class to manage contract numbering rules Magre
 */
class mod_contract_magre extends \ModelNumRefContracts
{
    // variables inherited from ModelNumRefContracts class
    public $name = 'Magre';
    public $version = 'dolibarr';
    public $error = '';
    /**
     *	Constructor
     */
    public function __construct()
    {
    }
    /**
     *	Return default description of numbering model
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
     *	Return next value
     *
     *	@param	Societe		$objsoc     third party object
     *	@param	Contrat		$contract	contract object
     *	@return string|0      			Next value if OK, 0 if KO
     */
    public function getNextValue($objsoc, $contract)
    {
    }
}