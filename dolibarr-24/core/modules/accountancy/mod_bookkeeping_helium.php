<?php

/**
 *	Class to manage Bookkeeping numbering rules Helium, configurable numbering model
 */
class mod_bookkeeping_helium extends \ModeleNumRefBookkeeping
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
    public $name = 'Helium';
    /**
     * @var int	position
     */
    public $position = 60;
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
     *  @param  BookKeeping		$object		Object we need next value for
     *  @return string|int<-1,0>		Value if OK, -1 if KO
     */
    public function getNextValue(\BookKeeping $object)
    {
    }
}