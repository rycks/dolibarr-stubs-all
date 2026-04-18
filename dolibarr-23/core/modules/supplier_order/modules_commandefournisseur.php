<?php

// required for use by classes that inherit
/**
 *	Parent class for supplier orders models
 */
abstract class ModelePDFSuppliersOrders extends \CommonDocGenerator
{
    /**
     * @var float
     */
    public $posxpicture;
    /**
     * @var float
     */
    public $posxtva;
    /**
     * @var float
     */
    public $posxup;
    /**
     * @var float
     */
    public $posxqty;
    /**
     * @var float
     */
    public $posxunit;
    /**
     * @var float
     */
    public $posxdesc;
    /**
     * @var float
     */
    public $posxdiscount;
    /**
     * @var float
     */
    public $postotalht;
    /**
     * @var array<string,float>
     */
    public $tva;
    /**
     * @var array<string,array{amount:float}>
     */
    public $tva_array;
    /**
     * Local tax rates Array[tax_type][tax_rate]
     *
     * @var array<int,array<string,float>>
     */
    public $localtax1;
    /**
     * Local tax rates Array[tax_type][tax_rate]
     *
     * @var array<int,array<string,float>>
     */
    public $localtax2;
    /**
     * @var int<0,1>
     */
    public $atleastoneratenotnull = 0;
    /**
     * @var int<0,1>
     */
    public $atleastonediscount = 0;
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
     *	Function to build document
     *
     *	@param	CommandeFournisseur	$object				Object source to generate (or id if old method)
     *	@param	Translate			$outputlangs		Lang output object
     *	@param	string				$srctemplatepath	Full path of source filename for generator using a template file
     *	@param	int<0,1>			$hidedetails		Do not show line details
     *	@param	int<0,1>			$hidedesc			Do not show desc
     *	@param	int<0,1>			$hideref			Do not show ref
     *	@return	int<-1,1>								1 if OK, <=0 if KO
     */
    public abstract function write_file($object, $outputlangs, $srctemplatepath = '', $hidedetails = 0, $hidedesc = 0, $hideref = 0);
}
/**
 *	Parent Class of numbering models of supplier order references
 */
abstract class ModeleNumRefSuppliersOrders extends \CommonNumRefGenerator
{
    /**
     * 	Return next value
     *
     *  @param	Societe|string		$objsoc		Object third party
     *  @param  CommandeFournisseur	$object		Object
     *  @return string|int<-1,0>				Value if OK, <=0 if KO
     */
    public abstract function getNextValue($objsoc, $object);
    /**
     *  Return an example of numbering
     *
     *  @return     string      Example
     */
    public abstract function getExample();
}