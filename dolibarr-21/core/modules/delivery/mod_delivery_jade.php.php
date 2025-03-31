<?php

/**
 *  \class      mod_delivery_jade
 *  \brief      Class du modele de numerotation de reference de bon de livraison Jade
 */
class mod_delivery_jade extends \ModeleNumRefDeliveryOrder
{
    /**
     * Dolibarr version of the loaded document
     * @var string Version, possible values are: 'development', 'experimental', 'dolibarr', 'dolibarr_deprecated' or a version string like 'x.y.z'''|'development'|'dolibarr'|'experimental'
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
    public $nom = 'Jade';
    /**
     * @var string model name
     */
    public $name = 'Jade';
    public $prefix = 'BL';
    /**
     *   Returns the description of the numbering model
     *
     *	@param	Translate	$langs      Lang object to use for output
     *  @return string      			Descriptive text
     */
    public function info($langs)
    {
    }
    /**
     *  Return an example of numbering
     *
     *  @return     string      Example
     */
    public function getExample()
    {
    }
    /**
     *  Checks if the numbers already in the database do not
     *  cause conflicts that would prevent this numbering working.
     *
     *  @param  CommonObject	$object		Object we need next value for
     *  @return boolean     				false if conflict, true if ok
     */
    public function canBeActivated($object)
    {
    }
    /**
     * 	Return next free value
     *
     *  @param	Societe		$objsoc     Object thirdparty
     *  @param  Delivery	$object		Object we need next value for
     *  @return string|int<-1,0>  		Value if OK, 0 or -1 if KO
     */
    public function getNextValue($objsoc, $object)
    {
    }
}