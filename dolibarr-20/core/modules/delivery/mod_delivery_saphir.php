<?php

/**
 *	\class      mod_delivery_saphir
 *	\brief      Class du modele de numerotation de reference de livraison Saphir
 */
class mod_delivery_saphir extends \ModeleNumRefDeliveryOrder
{
    /**
     * Dolibarr version of the loaded document
     * @var string
     */
    public $version = 'dolibarr';
    // 'development', 'experimental', 'dolibarr'
    /**
     * @var string Error message
     */
    public $error = '';
    /**
     * @var string Nom du modele
     * @deprecated
     * @see $name
     */
    public $nom = 'Saphir';
    /**
     * @var string model name
     */
    public $name = 'Saphir';
    /**
     *  Returns the description of the numbering model
     *
     *	@param	Translate	$langs      Lang object to use for output
     *  @return string      			Descriptive text
     */
    public function info($langs)
    {
    }
    /**
     *  Return an example of number
     *
     *  @return     string      Example
     */
    public function getExample()
    {
    }
    /**
     *  Return next value
     *
     *  @param	Societe		$objsoc     	Object third party
     *  @param  Delivery	$object			Object delivery
     *  @return string|0      				Value if OK, 0 if KO
     */
    public function getNextValue($objsoc, $object)
    {
    }
    /**
     *  Return next free value
     *
     *  @param	Societe		$objsoc     Object third party
     * 	@param	Delivery	$objforref	Object for number to search
     *  @return string|0      			Next free value, 0 if KO
     *  @deprecated see getNextValue
     */
    public function getNumRef($objsoc, $objforref)
    {
    }
}