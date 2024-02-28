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
     * @var string model description (short text)
     */
    public $description;
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
abstract class ModeleNumRefProjects extends \CommonNumRefGenerator
{
    // No overload code
}