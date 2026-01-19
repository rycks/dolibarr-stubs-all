<?php

/**
 *	Parent class to manage intervention document templates
 */
abstract class ModelePDFMember extends \CommonDocGenerator
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
     *  Function to build a document
     *
     *	@param	Adherent	$object				Object source to build document
     *	@param	Translate	$outputlangs		Lang output object
     * 	@param	string		$srctemplatepath	Full path of source filename for generator using a template file
     *	@param	string		$mode				Tell if doc module is called for 'member', ...
     *  @param  int<0,1>	$nooutput           1=Generate only file on disk and do not return it on response
     *  @param	string		$filename			Name of output file (without extension)
     *	@return	int<-1,1>        				1 if OK, <=0 if KO
     */
    public abstract function write_file($object, $outputlangs, $srctemplatepath = '', $mode = 'member', $nooutput = 0, $filename = 'tmp_cards');
    // phpcs:enable
}
/**
 *  Class mere des modeles de numerotation des references de members
 */
abstract class ModeleNumRefMembers extends \CommonNumRefGenerator
{
    /**
     *  Return description of module parameters
     *
     *  @param	Translate	$langs      Output language
     *  @param	?Societe	$soc		Third party object
     *  @return	string					HTML translated description
     */
    public function getToolTip($langs, $soc)
    {
    }
    /**
     *  Return next value
     *
     *  @param  ?Societe	$objsoc		Object third party
     *  @param  ?Adherent	$object		Object we need next value for
     *  @return	string|int<-1,0>		next value
     */
    public function getNextValue($objsoc, $object)
    {
    }
    /**
     *  Return an example of numbering
     *
     *  @return     string      Example
     */
    public abstract function getExample();
}