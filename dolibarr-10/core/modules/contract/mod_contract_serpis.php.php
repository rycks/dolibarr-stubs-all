<?php

/**
 * 	Class to manage contract numbering rules Serpis
 */
class mod_contract_serpis extends \ModelNumRefContracts
{
    /**
     * Dolibarr version of the loaded document
     * @var string
     */
    public $version = 'dolibarr';
    public $prefix = 'CT';
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * @var string Nom du modele
     * @deprecated
     * @see $name
     */
    public $nom = 'Serpis';
    /**
     * @var string model name
     */
    public $name = 'Serpis';
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
     *	Test if existing numbers make problems with numbering
     *
     *	@return     boolean     false if conflit, true if ok
     */
    public function canBeActivated()
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
     *	Return next value
     *
     *	@param	Societe		$objsoc     third party object
     *	@param	Object		$objforref  contract object
     *	@return string      			Value if OK, 0 if KO
     */
    public function contract_get_num($objsoc, $objforref)
    {
    }
}