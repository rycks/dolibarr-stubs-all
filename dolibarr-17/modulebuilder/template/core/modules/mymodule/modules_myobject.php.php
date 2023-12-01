<?php

// required for use by classes that inherit
/**
 *	Parent class for documents models
 */
abstract class ModelePDFMyObject extends \CommonDocGenerator
{
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
 *  Parent class to manage numbering of MyObject
 */
abstract class ModeleNumRefMyObject
{
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     *	Return if a module can be used or not
     *
     *	@return		boolean     true if module can be used
     */
    public function isEnabled()
    {
    }
    /**
     *	Returns the default description of the numbering template
     *
     *	@return     string      Texte descripif
     */
    public function info()
    {
    }
    /**
     *	Returns an example of numbering
     *
     *	@return     string      Example
     */
    public function getExample()
    {
    }
    /**
     *  Checks if the numbers already in the database do not
     *  cause conflicts that would prevent this numbering working.
     *
     *	@param	Object		$object		Object we need next value for
     *	@return boolean     			false if conflict, true if ok
     */
    public function canBeActivated($object)
    {
    }
    /**
     *	Returns next assigned value
     *
     *	@param	Object		$object		Object we need next value for
     *	@return	string      Valeur
     */
    public function getNextValue($object)
    {
    }
    /**
     *	Returns version of numbering module
     *
     *	@return     string      Valeur
     */
    public function getVersion()
    {
    }
}