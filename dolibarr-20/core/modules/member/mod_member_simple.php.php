<?php

/**
 * 	Class to manage the numbering module Simple for member references
 */
class mod_member_simple extends \ModeleNumRefMembers
{
    // variables inherited from ModeleNumRefMembers class
    public $name = 'Simple';
    public $version = 'dolibarr';
    // variables not inherited
    /**
     * @var string
     */
    public $prefix = '';
    /**
     *	Constructor
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
    public function info($langs)
    {
    }
    /**
     *  Return an example of numbering module values
     *
     * 	@return     string      Example
     */
    public function getExample()
    {
    }
    /**
     *  Checks if the numbers already in the database do not
     *  cause conflicts that would prevent this numbering working.
     *
     *	@param	CommonObject	$object	Object we need next value for
     *  @return boolean     			false if KO (there is a conflict), true if OK
     */
    public function canBeActivated($object)
    {
    }
    /**
     *  Return next value
     *
     *  @param  Societe		$objsoc		Object third party
     *  @param  Adherent	$object		Object we need next value for
     *  @return	string|-1				Value if OK, -1 if KO
     */
    public function getNextValue($objsoc, $object)
    {
    }
}