<?php

/**
 *	Parent class of subscription templates
 */
abstract class ModeleDon extends \CommonDocGenerator
{
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return list of active generation modules
     *
     *  @param	DoliDB  $db     			Database handler
     *  @param  integer $maxfilenamelength  Max length of value to show
     *  @return	array						List of templates
     */
    public static function liste_modeles($db, $maxfilenamelength = 0)
    {
    }
}
/**
 *	Parent class of donation numbering templates
 */
abstract class ModeleNumRefDons extends \CommonNumRefGenerator
{
    // No overload code
}