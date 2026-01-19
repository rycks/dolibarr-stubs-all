<?php

/**
 *	Class to manage the Standard numbering rule for MyObject
 */
class mod_myobject_standard extends \ModeleNumRefMyObject
{
    /**
     * Dolibarr version of the loaded document
     * @var string Version, possible values are: 'development', 'experimental', 'dolibarr', 'dolibarr_deprecated' or a version string like 'x.y.z'''|'development'|'dolibarr'|'experimental'
     */
    public $version = 'dolibarr';
    // 'development', 'experimental', 'dolibarr'
    /**
     * @var string
     */
    public $prefix = 'MYOBJECT';
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * @var string name
     */
    public $name = 'standard';
    /**
     *  Return description of numbering module
     *
     *  @param      Translate   $langs Translate Object
     *  @return     string             Text with description
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
     *  @return bool						false if conflict, true if ok
     */
    public function canBeActivated($object)
    {
    }
    /**
     * 	Return next free value
     *
     *  @param  MyObject		$object		Object we need next value for
     *  @return string|int<-1,0>			Next value if OK, <=0 if KO
     */
    public function getNextValue($object)
    {
    }
}