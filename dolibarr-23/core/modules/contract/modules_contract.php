<?php

/**
 *	Parent class to manage intervention document templates
 */
abstract class ModelePDFContract extends \CommonDocGenerator
{
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Return list of active generation modules
     *
     *  @param	DoliDB		$db     			Database handler
     *  @param  int<0,max>	$maxfilenamelength  Max length of value to show
     *  @return	string|int<-1,0>			List of templates, 0 if no module, -1 if error
     */
    public static function liste_modeles($db, $maxfilenamelength = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Function to build a document on disk
     *
     *  @param      Contrat     $object             Object source to build document
     *  @param      Translate   $outputlangs        Lang output object
     *  @param      string      $srctemplatepath    Full path of source filename for generator using a template file
     *  @param      int<0,1>    $hidedetails        Do not show line details
     *  @param      int<0,1>    $hidedesc           Do not show desc
     *  @param      int<0,1>    $hideref            Do not show ref
     *  @return     int<-1,1>                       1 if OK, <=0 if KO
     */
    public abstract function write_file($object, $outputlangs, $srctemplatepath = '', $hidedetails = 0, $hidedesc = 0, $hideref = 0);
    // phpcs:enable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
}
/**
 * Parent class for all contract numbering modules
 */
abstract class ModelNumRefContracts extends \CommonNumRefGenerator
{
    /**
     *	Return next value
     *
     *	@param	Societe			$objsoc     third party object
     *	@param	Contrat			$contract	contract object
     *	@return string|int<-1,0>  			Next value if OK, -1 or 0 if KO
     */
    public abstract function getNextValue($objsoc, $contract);
    /**
     *  Return an example of numbering
     *
     *  @return     string      Example
     */
    public abstract function getExample();
}