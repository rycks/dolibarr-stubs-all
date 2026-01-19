<?php

/**
 * 	Classe du modele de numerotation de reference de projet Universal
 */
class mod_task_universal extends \ModeleNumRefTask
{
    /**
     * Dolibarr version of the loaded document
     * @var string
     */
    public $version = 'dolibarr';
    // 'development', 'experimental', 'dolibarr'
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * @var string
     * @deprecated
     * @see $name
     */
    public $nom = 'Universal';
    /**
     * @var string name
     */
    public $name = 'Universal';
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
     *  Return next value
     *
     *  @param	Societe		$objsoc		Object third party
     *  @param   Task		$object	    Object task
     *  @return  string					Value if OK, 0 if KO
     */
    public function getNextValue($objsoc, $object)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return next reference not yet used as a reference
     *
     *  @param	Societe		$objsoc     Object third party
     *  @param  Task		$object	    Object task
     *  @return string      			Next not used reference
     */
    public function project_get_num($objsoc = 0, $object = '')
    {
    }
}