<?php

/**
 *	Parent class for documents models
 */
abstract class ModelePDFTicket extends \CommonDocGenerator
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
 *  Parent Class of the project reference numbering model classes
 */
abstract class ModeleNumRefTicket extends \CommonNumRefGenerator
{
    // No overload code
}