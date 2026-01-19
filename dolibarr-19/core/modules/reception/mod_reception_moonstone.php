<?php

/**
 *	Class to manage reception numbering rules Moonstone
 */
class mod_reception_moonstone extends \ModelNumRefReception
{
    public $version = 'dolibarr';
    public $error = '';
    public $nom = 'Moonstone';
    /**
     *  Return default description of numbering model
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
     *	@param	Societe			$objsoc     Third party object
     *	@param	Object|null		$reception	Reception object
     *	@return string      				Value if OK, 0 if KO
     */
    public function getNextValue($objsoc, $reception)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return next free value
     *
     *	@param	Societe		$objsoc     Third party object
     *	@param	Object		$objforref	Reception object
     *	@return string      			Next free value
     */
    public function reception_get_num($objsoc, $objforref)
    {
    }
}