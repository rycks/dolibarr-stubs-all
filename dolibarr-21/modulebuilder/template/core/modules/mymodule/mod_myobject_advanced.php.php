<?php

/**
 *	Class to manage the Advanced numbering rule for MyObject
 */
class mod_myobject_advanced extends \ModeleNumRefMyObject
{
    /**
     * Dolibarr version of the loaded document
     * @var string Version, possible values are: 'development', 'experimental', 'dolibarr', 'dolibarr_deprecated' or a version string like 'x.y.z''development'|'experimental'|'dolibarr'
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
     *	Returns the description of the numbering model
     *
     *	@param	Translate	$langs	Translate Object
     *	@return	string				Text with description
     */
    public function info($langs)
    {
    }
    /**
     *	Return an example of numbering
     *
     *	@return	string		Example
     */
    public function getExample()
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