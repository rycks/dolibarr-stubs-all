<?php

/**
 * 	Class to manage the numbering module Universal for project references
 */
class mod_project_universal extends \ModeleNumRefProjects
{
    /**
     * @var DoliDB $db
     */
    public $db;
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
     * @var string Nom du modele
     * @deprecated
     * @see $name
     */
    public $nom = 'Universal';
    /**
     * @var string model name
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
     *  @param   Societe		$objsoc		Object third party
     *  @param   Project		$project	Object project
     *  @return  string|0					Value if OK, 0 if KO
     */
    public function getNextValue($objsoc, $project)
    {
    }
}