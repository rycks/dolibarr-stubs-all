<?php

/**
 *	Class to manage expedition numbering rules Ribera
 */
class mod_expedition_ribera extends \ModelNumRefExpedition
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
     * @var string Nom du modele
     * @deprecated
     * @see $name
     */
    public $nom = 'Ribera';
    /**
     * @var string model name
     */
    public $name = 'Ribera';
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
     *	@param	Societe		$objsoc     Third party object
     *	@param	Expedition	$shipment	Shipment object
     *	@return string|0      			Value if OK, 0 if KO
     */
    public function getNextValue($objsoc, $shipment)
    {
    }
}