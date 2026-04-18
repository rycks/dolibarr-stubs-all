<?php

/**
 *	Class to manage Bookkeeping numbering rules Argon
 */
class mod_bookkeeping_argon extends \ModeleNumRefBookkeeping
{
    /**
     * Dolibarr version of the loaded document
     * @var string Version, possible values are: 'development', 'experimental', 'dolibarr', 'dolibarr_deprecated' or a version string like 'x.y.z'''|'development'|'dolibarr'|'experimental'
     */
    public $version = 'dolibarr';
    // 'development', 'experimental', 'dolibarr'
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * @var string name
     */
    public $name = 'Argon';
    /**
     * @var int	position
     */
    public $position = 50;
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     *  Return description of numbering module
     *
     *	@param	Translate	$langs      Lang object to use for output
     *  @return string      			Descriptive text
     */
    public function info($langs) : string
    {
    }
    /**
     *  Return an example of numbering
     *
     *  @return     string      Example
     */
    public function getExample() : string
    {
    }
    /**
     *  Checks if the numbers already in the database do not
     *  cause conflicts that would prevent this numbering working.
     *
     *  @param  CommonObject	$object		Object we need next value for
     *  @return boolean     				false if conflict, true if ok
     */
    public function canBeActivated($object) : bool
    {
    }
    /**
     * 	Return next free value
     *
     *  @param	BookKeeping	$object		Object we need next value for
     * 	@param  string		$mode		'next' for next value or 'last' for last value
     *  @return string|int<-1,0>		Value if OK, -1 if KO
     */
    public function getNextValue(\BookKeeping $object, $mode = 'next')
    {
    }
    /**
     * Returns the prefix for current Bookkeeping object
     * Year used in prefix is the beginning fiscal year.
     *
     * @param 	BookKeeping $object		Book keeping record
     * @return 	string 					Prefix for this bookkeeping object
     */
    private function getPrefix(\BookKeeping $object) : string
    {
    }
}