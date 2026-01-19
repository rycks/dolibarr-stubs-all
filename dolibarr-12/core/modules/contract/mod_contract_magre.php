<?php

/**
 *	Class to manage contract numbering rules Magre
 */
class mod_contract_magre extends \ModelNumRefContracts
{
    /**
     * Dolibarr version of the loaded document
     * @var string
     */
    public $version = 'dolibarr';
    /**
     * @var string Error message
     */
    public $error = '';
    /**
     * @var string nom
     * @deprecated
     * @see $name
     */
    public $nom = 'Magre';
    /**
     * @var string name
     */
    public $name = 'Magre';
    /**
     * @var int Automatic numbering
     */
    public $code_auto = 1;
    /**
     *	Return default description of numbering model
     *
     *	@return     string      text description
     */
    public function info()
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
     *	@param	Object		$contract	contract object
     *	@return string      			Value if OK, 0 if KO
     */
    public function getNextValue($objsoc, $contract)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return next value
     *
     *  @param	Societe		$objsoc     third party object
     *  @param	Object		$objforref	contract object
     *  @return string      			Value if OK, 0 if KO
     */
    public function contract_get_num($objsoc, $objforref)
    {
    }
}