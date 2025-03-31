<?php

/**
 * 	Class du modele de numerotation de reference de projet Universal
 */
class mod_task_universal extends \ModeleNumRefTask
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
     *  @param	null|Societe|string	$objsoc	Object third party
     *  @param	null|Task|string	$object	Object Task
     *  @return	string|int<-1,0>			Value if OK, <=0 if KO
     */
    public function getNextValue($objsoc, $object)
    {
    }
}