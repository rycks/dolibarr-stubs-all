<?php

/**
 *	Class to manage MO numbering rules standard
 */
class mod_sn_standard extends \ModeleNumRefBatch
{
    /**
     * Dolibarr version of the loaded document
     * @var string
     */
    public $version = 'dolibarr';
    // 'development', 'experimental', 'dolibarr'
    public $prefix = 'SN';
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * @var string name
     */
    public $name = 'sn_standard';
    /**
     *  Return description of numbering module
     *
     *  @return     string      Text with description
     */
    public function info()
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
     *  @return     boolean     false if conflict, true if ok
     */
    public function canBeActivated()
    {
    }
    /**
     * 	Return next free value
     *
     *  @param	Societe		$objsoc     Object thirdparty
     *  @param  Object		$object		Object we need next value for
     *  @return string      			Value if KO, <0 if KO
     */
    public function getNextValue($objsoc, $object)
    {
    }
}