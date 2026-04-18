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
     *  @param  int<0,max>	$maxfilenamelength  Max length of value to show
     *  @return string[]|int<-1,0>				List of templates
     */
    public static function liste_modeles($db, $maxfilenamelength = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Function to build a document on disk using the generic odt module.
     *
     *	@param	Task		$object					Object source to build document
     *	@param	Translate	$outputlangs			Lang output object
     * 	@param	string		$srctemplatepath		Full path of source filename for generator using a template file
     *	@return	int<-1,1>							1 if OK, <=0 if KO
     */
    public abstract function write_file($object, $outputlangs, $srctemplatepath = '');
    // phpcs:enable
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