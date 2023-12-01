<?php

/**
 * 	Class to manage the numbering module Simple for member references
 */
class mod_member_simple extends \ModeleNumRefMembers
{
    /**
     * Dolibarr version of the loaded document
     * @var string
     */
    public $version = 'dolibarr';
    // 'development', 'experimental', 'dolibarr'
    public $prefix = 'MEM';
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * @var string Nom du modele
     * @deprecated
     * @see $name
     */
    public $nom = 'Simple';
    /**
     * @var string model name
     */
    public $name = 'Simple';
    /**
     *  Return description of numbering module
     *
     *  @return     string      Text with description
     */
    public function info()
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
     *   @return     boolean     false if conflict, true if ok
     */
    public function canBeActivated()
    {
    }
    /**
     *  Return next value
     *
     *  @param  Societe		$objsoc		Object third party
     *  @param  Object		$object		Object we need next value for
     *  @return	string					Value if OK, 0 if KO
     */
    public function getNextValue($objsoc, $object)
    {
    }
}