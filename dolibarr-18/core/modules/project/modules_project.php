<?php

/**
 *	Parent class for projects models
 */
abstract class ModelePDFProjects extends \CommonDocGenerator
{
    /**
     * @var DoliDb Database handler
     */
    public $db;
    /**
     * @var string model name
     */
    public $name;
    /**
     * @var string model description (short text)
     */
    public $description;
    /**
     * @var string document type
     */
    public $type;
    /**
     * @var int page_largeur
     */
    public $page_largeur;
    /**
     * @var int page_hauteur
     */
    public $page_hauteur;
    /**
     * @var array format
     */
    public $format;
    /**
     * @var int marge_gauche
     */
    public $marge_gauche;
    /**
     * @var int marge_droite
     */
    public $marge_droite;
    /**
     * @var int marge_haute
     */
    public $marge_haute;
    /**
     * @var int marge_basse
     */
    public $marge_basse;
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return list of active generation modules
     *
     *  @param  DoliDB	$db     			Database handler
     *  @param  integer	$maxfilenamelength  Max length of value to show
     *  @return	array						List of templates
     */
    public static function liste_modeles($db, $maxfilenamelength = 0)
    {
    }
}
/**
 *  Classe mere des modeles de numerotation des references de projets
 */
abstract class ModeleNumRefProjects
{
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * @var string $version
     */
    public $version;
    /**
     *  Return if a module can be used or not
     *
     *  @return		boolean     true if module can be used
     */
    public function isEnabled()
    {
    }
    /**
     *  Returns the default description of the numbering pattern
     *
     *  @return     string      Descriptive text
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
     *  Checks if the numbers already in the database do not
     *  cause conflicts that would prevent this numbering working.
     *
     *  @return     boolean     false if conflict, true if ok
     */
    public function canBeActivated()
    {
    }
    /**
     *  Renvoi prochaine valeur attribuee
     *
     *	@param	Societe		$objsoc		Object third party
     *	@param	Project		$project	Object project
     *	@return	string					Valeur
     */
    public function getNextValue($objsoc, $project)
    {
    }
    /**
     *  Renvoi version du module numerotation
     *
     *  @return     string      Valeur
     */
    public function getVersion()
    {
    }
}