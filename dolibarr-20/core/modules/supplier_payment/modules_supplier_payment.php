<?php

/**
 *	Parent class for supplier invoices models
 */
abstract class ModelePDFSuppliersPayments extends \CommonDocGenerator
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
 *  ModeleNumRefSupplierPayments
 *
 *  Payment numbering references mother class
 */
abstract class ModeleNumRefSupplierPayments extends \CommonNumRefGenerator
{
    // No overload code
}