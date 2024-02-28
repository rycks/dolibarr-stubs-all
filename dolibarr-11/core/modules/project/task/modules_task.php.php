<?php

/**
 *	Parent class for projects models
 */
abstract class ModelePDFTask extends \CommonDocGenerator
{
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return list of active generation modules
     *
     *  @param	DoliDB	$db     			Database handler
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
abstract class ModeleNumRefTask
{
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     *  Return if a module can be used or not
     *
     *  @return		boolean     true if module can be used
     */
    public function isEnabled()
    {
    }
    /**
     *  Renvoi la description par defaut du modele de numerotation
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
     *  Checks if the numbers already in force in the data base do not
     *  cause conflicts that would prevent this numbering from working.
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