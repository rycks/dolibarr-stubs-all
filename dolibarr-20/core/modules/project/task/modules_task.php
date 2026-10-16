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
     *  @param  DoliDB  	$db                 Database handler
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
    /**
     *  Return next value
     *
     *  @param	null|Societe|string	$objsoc	Object third party
     *  @param	null|Task|string	$object	Object Task
     *  @return	string|int<-1,0>			Value if OK, <=0 if KO
     */
    public abstract function getNextValue($objsoc, $object);
    /**
     *  Return an example of numbering
     *
     *  @return     string      Example
     */
    public abstract function getExample();
}