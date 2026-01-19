<?php

/**
 *	Parent class to manage intervention document templates
 */
abstract class ModelePDFFicheinter extends \CommonDocGenerator
{
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Return list of active generation modules
     *
     *  @param	DoliDB	$db     			Database handler
     *  @param  integer	$maxfilenamelength  Max length of value to show
     *  @return	array						List of templates
     */
    public static function liste_modeles($db, $maxfilenamelength = 0)
    {
    }
}
/**
 *  Parent class numbering models of intervention sheet references
 */
abstract class ModeleNumRefFicheinter
{
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    public $version;
    /**
     * 	Return if a module can be used or not
     *
     * 	@return		boolean     true if module can be used
     */
    public function isEnabled()
    {
    }
    /**
     * 	Returns the default description of the numbering template
     *
     * 	@return     string      Descriptive text
     */
    public function info()
    {
    }
    /**
     * 	Return a numbering example
     *
     * 	@return     string      Example
     */
    public function getExample()
    {
    }
    /**
     *  Checks if the numbers already in the database do not
     *  cause conflicts that would prevent this numbering working.
     *
     * 	@return     boolean     false if conflict, true if ok
     */
    public function canBeActivated()
    {
    }
    /**
     * 	Return the next assigned value
     *
     *  @param	Societe		$objsoc     Object thirdparty
     *  @param  Object		$object		Object we need next value for
     *  @return string      			Value if KO, <0 if KO
     */
    public function getNextValue($objsoc = 0, $object = '')
    {
    }
    /**
     * 	Return the version of the numbering module
     *
     * 	@return     string      Value
     */
    public function getVersion()
    {
    }
}
// phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
/**
 *  Create an intervention document on disk using template defined into FICHEINTER_ADDON_PDF
 *
 *  @param	DoliDB		$db  			objet base de donnee
 *  @param	Object		$object			Object fichinter
 *  @param	string		$modele			force le modele a utiliser ('' par defaut)
 *  @param	Translate	$outputlangs	objet lang a utiliser pour traduction
 *  @param  int			$hidedetails    Hide details of lines
 *  @param  int			$hidedesc       Hide description
 *  @param  int			$hideref        Hide ref
 *  @return int         				0 if KO, 1 if OK
 */
function fichinter_create($db, $object, $modele, $outputlangs, $hidedetails = 0, $hidedesc = 0, $hideref = 0)
{
}