<?php

/**
 *	\class mod_lot_free
 *	\brief Class allowing lot_free management of batch numbers
 */
class mod_lot_free extends \ModeleNumRefBatch
{
    /*
     * Please note this module is used by default if no module has been defined in the configuration
     *
     * Its operation must therefore remain as open as possible
     */
    // variables inherited from ModeleNumRefBatch class
    public $name = 'lot_free';
    public $version = 'dolibarr';
    /**
     *	Constructor
     */
    public function __construct()
    {
    }
    /**
     *  Return description of module
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
     * 	Return next free value
     *
     *  @param	?Societe		$objsoc		Object thirdparty
     *  @param  ?Productlot	$object		Object we need next value for
     *  @return string|int<-1,0>		Value if OK, <=0 if KO
     */
    public function getNextValue($objsoc, $object)
    {
    }
}