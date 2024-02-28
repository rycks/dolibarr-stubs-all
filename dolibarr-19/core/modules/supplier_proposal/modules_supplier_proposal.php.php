<?php

// Requis car utilise dans les classes qui heritent
/**
 *	Classe mere des modeles de propale
 */
abstract class ModelePDFSupplierProposal extends \CommonDocGenerator
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
 *	Classe mere des modeles de numerotation des references de propales
 */
abstract class ModeleNumRefSupplierProposal extends \CommonNumRefGenerator
{
    // No overload code
}