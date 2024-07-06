<?php

/**
 *	Parent class for bank account models
 */
abstract class ModeleBankAccountDoc extends \CommonDocGenerator
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
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Write the document to disk
     *
     *	@param	Account		$object   		Object Account to generate
     *	@param	Translate	$outputlangs	Lang output object
     *	@return	int         				1 if OK, <=0 if KO
     */
    public abstract function write_file($object, $outputlangs);
    // phpcs:enable
}