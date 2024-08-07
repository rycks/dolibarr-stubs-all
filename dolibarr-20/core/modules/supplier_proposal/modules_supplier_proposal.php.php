<?php

// Requis car utilise dans les classes qui heritent
/**
 *	Perent class of the Proposal models
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
 *	Parent class of the Proposal numbering model classes
 */
abstract class ModeleNumRefSupplierProposal extends \CommonNumRefGenerator
{
    // No overload code
}