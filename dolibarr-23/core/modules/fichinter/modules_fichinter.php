<?php

/**
 *	Parent class to manage intervention document templates
 */
abstract class ModelePDFFicheinter extends \CommonDocGenerator
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
     *  Function to build pdf onto disk
     *
     *  @param		Fichinter		$object				Object to generate
     *  @param		Translate		$outputlangs		Lang output object
     *  @param		string			$srctemplatepath	Full path of source filename for generator using a template file
     *  @param		int<0,1>		$hidedetails		Do not show line details
     *  @param		int<0,1>		$hidedesc			Do not show desc
     *  @param		int<0,1>		$hideref			Do not show ref
     *  @return		int<0,1>							1=OK, 0=KO
     */
    public abstract function write_file($object, $outputlangs, $srctemplatepath = '', $hidedetails = 0, $hidedesc = 0, $hideref = 0);
}
/**
 *  Parent class numbering models of intervention sheet references
 */
abstract class ModeleNumRefFicheinter extends \CommonNumRefGenerator
{
    /**
     * 	Return next free value
     *
     *  @param	Societe|string		$objsoc     Object thirdparty
     *  @param  Fichinter|string	$object		Object we need next value for
     *	@return string|int<-1,0>    			Next value if OK, <=0 if KO
     */
    public abstract function getNextValue($objsoc = '', $object = '');
    /**
     *  Return an example of numbering
     *
     *  @return     string      Example
     */
    public abstract function getExample();
}
// phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
/**
 *  Create an intervention document on disk using template defined into FICHEINTER_ADDON_PDF
 *
 *  @param	DoliDB		$db  			object base de donnee
 *  @param	Object		$object			Object fichinter
 *  @param	string		$modele			force le modele a utiliser ('' par default)
 *  @param	Translate	$outputlangs	object lang a utiliser pour traduction
 *  @param  int			$hidedetails    Hide details of lines
 *  @param  int			$hidedesc       Hide description
 *  @param  int			$hideref        Hide ref
 *  @return int         				0 if KO, 1 if OK
 */
function fichinter_create($db, $object, $modele, $outputlangs, $hidedetails = 0, $hidedesc = 0, $hideref = 0)
{
}