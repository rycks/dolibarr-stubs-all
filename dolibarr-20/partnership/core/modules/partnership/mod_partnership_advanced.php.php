<?php

/**
 *	Class to manage the Advanced numbering rule for Partnership
 */
class mod_partnership_advanced extends \ModeleNumRefPartnership
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
     *  @param  Translate	$langs      Lang object to use for output
     *  @return     string      Descriptive text
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
     *  @param  Object		$object		Object we need next value for
     *  @return string|0                Next value if OK, 0 if KO
     */
    public function getNextValue($object)
    {
    }
}