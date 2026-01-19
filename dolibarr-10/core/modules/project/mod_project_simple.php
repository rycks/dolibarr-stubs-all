<?php

/**
 * 	Class to manage the numbering module Simple for project references
 */
class mod_project_simple extends \ModeleNumRefProjects
{
    /**
     * Dolibarr version of the loaded document
     * @var string
     */
    public $version = 'dolibarr';
    // 'development', 'experimental', 'dolibarr'
    public $prefix = 'PJ';
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * @var string Nom du modele
     * @deprecated
     * @see name
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
    /**  Test si les numeros deja en vigueur dans la base ne provoquent pas de
     *   de conflits qui empechera cette numerotation de fonctionner.
     *
     *   @return     boolean     false si conflit, true si ok
     */
    public function canBeActivated()
    {
    }
    /**
     *  Return next value
     *
     *  @param   Societe	$objsoc		Object third party
     *  @param   Project	$project	Object project
     *  @return	string				Value if OK, 0 if KO
     */
    public function getNextValue($objsoc, $project)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return next reference not yet used as a reference
     *
     *  @param	Societe	$objsoc     Object third party
     *  @param  Project	$project	Object project
     *  @return string      		Next not used reference
     */
    public function project_get_num($objsoc = 0, $project = '')
    {
    }
}