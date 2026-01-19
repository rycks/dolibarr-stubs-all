<?php

// required for use by classes that inherit
/**
 *	Parent class for documents models
 */
abstract class ModelePDFPartnership extends \CommonDocGenerator
{
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return list of active generation modules
     *
     *  @param  DoliDB  	$db                 Database handler
     *  @param  int<0,max>	$maxfilenamelength  Max length of value to show
     *  @return string[]|int<-1,0>				List of templates
     */
    public static function liste_modeles($db, $maxfilenamelength = 0)
    {
    }
}
/**
 *  Parent class to manage numbering of Partnership
 */
abstract class ModeleNumRefPartnership extends \CommonNumRefGenerator
{
    /**
     * 	Return next free value
     *
     *  @param  Partnership	$object		Object we need next value for
     *  @return string|int<-1,0>		Next value if OK, 0 if KO
     */
    public abstract function getNextValue($object);
}