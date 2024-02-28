<?php

/**
 * 	Classe du modele de numerotation de reference de projet Universal
 */
class mod_project_universal extends \ModeleNumRefProjects
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
     * @var string Nom du modele
     * @deprecated
     * @see name
     */
    public $nom = 'Universal';
    /**
     * @var string model name
     */
    public $name = 'Universal';
    /**
     *  Returns the description of the numbering model
     *
     *  @return     string      Texte descripif
     */
    public function info()
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
     *  @param   Project		$project	Object project
     *  @return  string					Value if OK, 0 if KO
     */
    public function getNextValue($objsoc, $project)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return next reference not yet used as a reference
     *
     *  @param	Societe		$objsoc     Object third party
     *  @param  Project		$project	Object project
     *  @return string      			Next not used reference
     */
    public function project_get_num($objsoc = 0, $project = '')
    {
    }
}