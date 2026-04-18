<?php

/**
 *	Class to manage MO numbering rules advanced
 */
class mod_mo_advanced extends \ModeleNumRefMos
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
     * @var string name
     */
    public $name = 'advanced';
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
     *  Return an example of numbering
     *
     *  @return     string|int<0,0>      Example
     */
    public function getExample()
    {
    }
    /**
     * 	Return next free value
     *
     *  @param	Product			$objprod    Object product
     *  @param  Mo				$object		Object we need next value for
     *  @return string|int<-1,0>			Value if OK, <=0 if KO
     */
    public function getNextValue($objprod, $object)
    {
    }
}