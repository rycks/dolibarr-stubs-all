<?php

// required for use by classes that inherit
/**
 *	Parent class for boms models
 */
abstract class ModelePDFBom extends \CommonDocGenerator
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
abstract class ModeleNumRefBoms extends \CommonNumRefGenerator
{
    // No overload code
}