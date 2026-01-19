<?php

/**
 *	\class 		mod_codeproduct_leopard
 *	\brief 		Class permettant la gestion leopard des codes produits
 */
class mod_sn_free extends \ModeleNumRefBatch
{
    /*
     * :warning:
     *    This module is used by default if none was set in the configuration.
     *    Therefore, the implementation must remain as open as possible.
     */
    // variables inherited from ModeleThirdPartyCode class
    public $name = 'sn_free';
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
     * Return an example of result returned by getNextValue
     *
     * @param	Societe		$objsoc	    Object thirdparty
     * @param   Productlot	$object		Object we need next value for
     * @return	string					Return next value
     */
    public function getNextValue($objsoc, $object)
    {
    }
}