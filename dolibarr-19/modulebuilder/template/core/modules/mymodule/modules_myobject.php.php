<?php

/**
 *	Parent class for documents models
 */
abstract class ModelePDFMyObject extends \CommonDocGenerator
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
 *  Parent class to manage numbering of MyObject
 */
abstract class ModeleNumRefMyObject extends \CommonNumRefGenerator
{
    // No overload code
}