<?php

/**
 *	Parent class to manage intervention document templates
 */
abstract class ModelePDFProduct extends \CommonDocGenerator
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
     *	Function to build document
     *
     *	@param		Product		$object				Object source to build document
     *	@param		Translate	$outputlangs		Lang output object
     *	@param		string		$srctemplatepath	Full path of source filename for generator using a template file
     *	@param		int<0,1>	$hidedetails		Do not show line details
     *	@param		int<0,1>	$hidedesc			Do not show desc
     *	@param		int<0,1>	$hideref			Do not show ref
     *	@return		int<-1,1>						1 if OK, <=0 if KO
     */
    public abstract function write_file($object, $outputlangs, $srctemplatepath = '', $hidedetails = 0, $hidedesc = 0, $hideref = 0);
}
/**
 * Class template for classes of numbering product
 */
abstract class ModeleProductCode extends \CommonNumRefGenerator
{
    /**
     *  Return next value available
     *
     *	@param	Product|string	$objproduct	Object product
     *	@param	int				$type		Type
     *  @return string      				Value
     */
    public function getNextValue($objproduct = '', $type = -1)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Renvoi la liste des modeles de numérotation
     *
     *  @param	DoliDB	$dbs     			Database handler
     *  @param  integer	$maxfilenamelength  Max length of value to show
     *  @return	array|int					List of numbers
     */
    public static function liste_modeles($dbs, $maxfilenamelength = 0)
    {
    }
    /**
     *  Return description of module parameters
     *
     *  @param	Translate	$langs      Output language
     *  @param	Product		$product	Product object
     *  @param	int			$type		-1=Nothing, 0=Customer, 1=Supplier
     *  @return	string					HTML translated description
     */
    public function getToolTip($langs, $product, $type)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *   Check if mask/numbering use prefix
     *
     *   @return	int		0=no, 1=yes
     */
    public function verif_prefixIsUsed()
    {
    }
    /**
     * Return an example of result returned by getNextValue
     *
     * @param	?Translate		$langs		Object langs
     * @param	Product|string	$objproduct	Object product
     * @param	int<-1,2>		$type		Type of third party (1:customer, 2:supplier, -1:autodetect)
     * @return	string						Return string example
     */
    public function getExample($langs = \null, $objproduct = '', $type = -1)
    {
    }
}