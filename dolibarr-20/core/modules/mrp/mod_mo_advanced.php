<?php

/**
 *	Class to manage MO numbering rules advanced
 */
class mod_mo_advanced extends \ModeleNumRefMos
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
     *  @return     string      Example
     */
    public function getExample()
    {
    }
    /**
     * 	Return next free value
     *
     *  @param	Product		$objprod    Object product
     *  @param  Mo			$object		Object we need next value for
     *  @return string|0      			Value if OK, 0 if KO
     */
    public function getNextValue($objprod, $object)
    {
    }
}