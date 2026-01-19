<?php

/**
 *	Parent class to manage holidays document templates
 */
abstract class ModelePDFHoliday extends \CommonDocGenerator
{
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Return list of active generation modules
     *
     *  @param  DoliDB  $db     			Database handler
     *  @param  integer	$maxfilenamelength  Max length of value to show
     *  @return	array						List of templates
     */
    public static function liste_modeles($db, $maxfilenamelength = 0)
    {
    }
}
/**
 * Parent class for all holidays numbering modules
 */
class ModelNumRefHolidays extends \CommonNumRefGenerator
{
    // No overload code
}