<?php

/**
 * 	Class to manage the numbering module Simple for project references
 */
class mod_task_simple extends \ModeleNumRefTask
{
    /**
     * Dolibarr version of the loaded document
     * @var string
     */
    public $version = 'dolibarr';
    // 'development', 'experimental', 'dolibarr'
    public $prefix = 'TK';
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * @var string
     * @deprecated
     * @see $name
     */
    public $nom = 'Simple';
    /**
     * @var string name
     */
    public $name = 'Simple';
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
     *	@param	Object		$object		Object we need next value for
     *  @return boolean     			false if KO (there is a conflict), true if OK
     */
    public function canBeActivated($object)
    {
    }
    /**
     *  Return next value
     *
     *  @param   Societe	$objsoc		Object third party
     *  @param   Task	$object		Object Task
     *  @return	string				Value if OK, 0 if KO
     */
    public function getNextValue($objsoc, $object)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return next reference not yet used as a reference
     *
     *  @param  Societe	$objsoc     Object third party
     *  @param  Task	$object     Object task
     *  @return string              Next not used reference
     */
    public function task_get_num($objsoc = 0, $object = '')
    {
    }
}