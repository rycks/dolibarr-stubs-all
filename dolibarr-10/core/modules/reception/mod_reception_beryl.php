<?php

/**
 *	Class to manage reception numbering rules Beryl
 */
class mod_reception_beryl extends \ModelNumRefReception
{
    public $version = 'dolibarr';
    public $prefix = 'RCP';
    public $error = '';
    public $nom = 'Beryl';
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
     *	@param	Societe		$objsoc     Third party object
     *	@param	Object		$shipment	Shipment object
     *	@return string      			Value if OK, 0 if KO
     */
    public function getNextValue($objsoc, $shipment)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return next free value
     *
     *	@param	Societe		$objsoc     Third party object
     *	@param	Object		$objforref	Shipment object
     *	@return string      			Next free value
     */
    public function reception_get_num($objsoc, $objforref)
    {
    }
}