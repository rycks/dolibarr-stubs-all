<?php

/**
 *	Parent class of sending receipts models
 */
abstract class ModelePdfExpedition extends \CommonDocGenerator
{
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return list of active generation models
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
 *  Parent Class of numbering models of sending receipts references
 */
abstract class ModelNumRefExpedition extends \CommonNumRefGenerator
{
    // No overload code
}