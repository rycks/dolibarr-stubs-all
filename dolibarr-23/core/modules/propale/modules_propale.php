<?php

// Requis car utilise dans les classes qui heritent
/**
 *	Class mere des modeles de propale
 */
abstract class ModelePDFPropales extends \CommonDocGenerator
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
    public $atleastonediscount = 0;
    /**
     * @var int<0,1>
     */
    public $atleastoneratenotnull = 0;
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
     *  Function to build document
     *
     *	@param		Propal		$object				Object source to build document
     *  @param		Translate	$outputlangs		Lang output object
     *  @param		string		$srctemplatepath	Full path of source filename for generator using a template file
     *  @param		int<0,1>	$hidedetails		Do not show line details
     *  @param		int<0,1>	$hidedesc			Do not show desc
     *  @param		int<0,1>	$hideref			Do not show ref
     *  @return		int<-1,1>							1 if OK, <=0 if KO
     */
    public abstract function write_file($object, $outputlangs, $srctemplatepath = '', $hidedetails = 0, $hidedesc = 0, $hideref = 0);
}
/**
 *	Parent class for numbering rules of proposals
 */
abstract class ModeleNumRefPropales extends \CommonNumRefGenerator
{
    /**
     *  Return next value
     *
     *  @param	?Societe	$objsoc     Object third party
     * 	@param	Propal		$propal		Object commercial proposal
     *  @return string|int<-1,0>		Next value, <=0 if KO
     */
    public abstract function getNextValue($objsoc, $propal);
    /**
     *  Return an example of numbering
     *
     *  @return     string      Example
     */
    public abstract function getExample();
}