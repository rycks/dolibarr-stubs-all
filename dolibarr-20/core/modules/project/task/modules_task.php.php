<?php

/**
 *	Parent class for task models
 */
abstract class ModelePDFTask extends \CommonDocGenerator
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
 * Parent class of task reference numbering models
 */
abstract class ModeleNumRefTask extends \CommonNumRefGenerator
{
    // No overload code
}