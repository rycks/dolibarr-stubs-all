<?php

// required for use by classes that inherit
/**
 *	Parent class for boms models
 */
abstract class ModelePDFBoms extends \CommonDocGenerator
{
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
 *  Parent class to manage numbering of BOMs
 */
abstract class ModeleNumRefBoms
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
     *	Renvoie la description par defaut du modele de numerotation
     *
     *	@return     string      Texte descripif
     */
    public function info()
    {
    }
    /**
     *	Renvoie un exemple de numerotation
     *
     *	@return     string      Example
     */
    public function getExample()
    {
    }
    /**
     *	Test si les numeros deja en vigueur dans la base ne provoquent pas de conflits qui empecheraient cette numerotation de fonctionner.
     *
     *	@return     boolean     false si conflit, true si ok
     */
    public function canBeActivated()
    {
    }
    /**
     *	Renvoie prochaine valeur attribuee
     *
     *	@param	Societe		$objsoc     Object thirdparty
     *	@param	Object		$object		Object we need next value for
     *	@return	string      Valeur
     */
    public function getNextValue($objsoc, $object)
    {
    }
    /**
     *	Renvoie version du module numerotation
     *
     *	@return     string      Valeur
     */
    public function getVersion()
    {
    }
}