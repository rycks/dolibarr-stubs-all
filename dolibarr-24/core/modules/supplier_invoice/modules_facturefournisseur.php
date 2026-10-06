<?php

// required for use by classes that inherit
/**
 *	Parent class for supplier invoices models
 */
abstract class ModelePDFSuppliersInvoices extends \CommonDocGenerator
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
     *  @param		FactureFournisseur	$object				Object to generate
     *  @param		Translate			$outputlangs		Lang output object
     *  @param		string				$srctemplatepath	Full path of source filename for generator using a template file
     *  @param		int<0,1>			$hidedetails		Do not show line details
     *  @param		int<0,1>			$hidedesc			Do not show desc
     *  @param		int<0,1>			$hideref			Do not show ref
     *  @return		int<-1,1>								1=OK, <=0=KO
     */
    public abstract function write_file($object, $outputlangs, $srctemplatepath = '', $hidedetails = 0, $hidedesc = 0, $hideref = 0);
    // phpcs:enable
}
/**
 *	Parent Class of numbering models of suppliers invoices references
 */
abstract class ModeleNumRefSuppliersInvoices extends \CommonNumRefGenerator
{
    /**
     * Return next value
     *
     * @param	?Societe			$objsoc		Object third party
     * @param  	?FactureFournisseur	$object		Object invoice
     * @param   string				$mode		'next' for next value or 'last' for last value
     * @return 	string|int<-1,0>				Value if OK, <=0 if KO
     */
    public abstract function getNextValue($objsoc, $object, $mode = 'next');
    /**
     *  Return an example of numbering
     *
     *  @return     string      Example
     */
    public abstract function getExample();
}