<?php

/**
 *	Class to manage member report numbering rules Custom
 */
class mod_member_custom extends \ModeleNumRefMembers
{
    /**
     * @var string model name
     */
    public $name = 'Custom';
    /**
     * Dolibarr version of the loaded document
     * @var string Version, possible values are: 'development', 'experimental', 'dolibarr', 'dolibarr_deprecated' or a version string like 'x.y.z'''|'development'|'dolibarr'|'experimental'
     */
    public $version = 'dolibarr';
    // 'development', 'experimental', 'dolibarr'
    /**
     * @var int		Position
     */
    public $position = 50;
    /**
     * @var string Error message
     */
    public $error = '';
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
     *  Return next free value
     *
     *  @param  ?Societe	$objsoc		Object third party
     *  @param  ?Adherent	$object		Object we need next value for
     *  @return string|int<-1,0>   			Next value if OK, -1 or 0 if KO
     */
    public function getNextValue($objsoc, $object)
    {
    }
}