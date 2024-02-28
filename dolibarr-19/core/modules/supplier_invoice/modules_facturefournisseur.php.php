<?php

// required for use by classes that inherit
/**
 *	Parent class for supplier invoices models
 */
abstract class ModelePDFSuppliersInvoices extends \CommonDocGenerator
{
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return list of active generation models
     *
     *  @param	DoliDB	$db     			Database handler
     *  @param  integer	$maxfilenamelength  Max length of value to show
     *  @return	array						List of numbers
     */
    public static function liste_modeles($db, $maxfilenamelength = 0)
    {
    }
}
/**
 *	Parent Class of numbering models of suppliers invoices references
 */
abstract class ModeleNumRefSuppliersInvoices extends \CommonNumRefGenerator
{
    // No overload code
}