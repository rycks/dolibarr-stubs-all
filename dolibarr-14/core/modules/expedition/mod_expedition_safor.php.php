<?php

/**
 *	Class to manage expedition numbering rules Safor
 */
class mod_expedition_safor extends \ModelNumRefExpedition
{
    /**
     * Dolibarr version of the loaded document
     * @var string
     */
    public $version = 'dolibarr';
    public $prefix = 'SH';
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * @var string Nom du modele
     * @deprecated
     * @see $name
     */
    public $nom = 'Safor';
    /**
     * @var string model name
     */
    public $name = 'Safor';
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
    public function expedition_get_num($objsoc, $objforref)
    {
    }
}