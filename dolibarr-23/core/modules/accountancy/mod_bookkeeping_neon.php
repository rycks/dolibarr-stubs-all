<?php

/**
 *	Class to manage numbering of thirdparties code
 */
class mod_bookkeeping_neon extends \ModeleNumRefBookkeeping
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
    public $name = 'Neon';
    /**
     * @var int	position
     */
    public $position = 40;
    /**
     *  Return description of module
     *
     *  @param  Translate   $langs  Object langs
     *  @return string              Description of module
     */
    public function info($langs)
    {
    }
    /**
     * Return an example of result returned by getNextValue
     *
     * @return	string						Return string example
     */
    public function getExample()
    {
    }
    /**
     * 	Return next free value
     *
     *  @param  BookKeeping		$object		Object we need next value for
     *  @return string
     */
    public function getNextValue(\BookKeeping $object)
    {
    }
}