<?php

// required for use by classes that inherit
/**
 *	Parent class for documents models
 */
abstract class ModelePDFStockTransfer extends \CommonDocGenerator
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
     *	Function to build document onto disk
     *
     *	@param		StockTransfer	$object				Object StockTransfer to generate (or id if old method)
     *	@param		Translate		$outputlangs		Lang output object
     *  @param		string			$srctemplatepath	Full path of source filename for generator using a template file
     *  @param		int<0,1>		$hidedetails		Do not show line details
     *  @param		int<0,1>		$hidedesc			Do not show desc
     *  @param		int<0,1>		$hideref			Do not show ref
     *  @return     int<-1,1>      	    				1=OK, 0=KO
     */
    public abstract function write_file($object, $outputlangs, $srctemplatepath = '', $hidedetails = 0, $hidedesc = 0, $hideref = 0);
    // phpcs:enable
}
/**
 *  Parent class to manage numbering of StockTransfer
 */
abstract class ModeleNumRefStockTransfer extends \CommonNumRefGenerator
{
    /**
     * 	Return next free value
     *
     *  @param  StockTransfer|StockTransferLine	$object		Object we need next value for
     *  @return string|int<-1,0>			Value if OK, 0 if KO
     */
    public abstract function getNextValue($object);
    /**
     *  Return an example of numbering
     *
     *  @return     string      Example
     */
    public abstract function getExample();
}