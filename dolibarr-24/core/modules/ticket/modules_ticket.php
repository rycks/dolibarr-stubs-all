<?php

/**
 *	Parent class for documents models
 */
abstract class ModelePDFTicket extends \CommonDocGenerator
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
     *  Function to build a document on disk using the generic odt module.
     *
     *	@param	User		$object				Object source to build document
     *	@param	Translate	$outputlangs		Lang output object
     *	@param	string		$srctemplatepath	Full path of source filename for generator using a template file
     *	@param	int<0,1>	$hidedetails		Do not show line details
     *	@param	int<0,1>	$hidedesc			Do not show desc
     *	@param	int<0,1>	$hideref			Do not show ref
     *	@return	int<-1,1>						1 if OK, <=0 if KO
     */
    public abstract function write_file($object, $outputlangs, $srctemplatepath = '', $hidedetails = 0, $hidedesc = 0, $hideref = 0);
    // phpcs:enable
}
/**
 *  Parent Class of the project reference numbering model classes
 */
abstract class ModeleNumRefTicket extends \CommonNumRefGenerator
{
    /**
     *  Return next value
     *
     *  @param	Societe	$objsoc		Object third party
     *  @param	Ticket	$ticket 	Object ticket
     *  @return	string|int<-1,0>	Next value if OK, <=-1 if KO
     */
    public abstract function getNextValue($objsoc, $ticket);
    /**
     *  Return an example of numbering
     *
     *  @return     string      Example
     */
    public abstract function getExample();
}