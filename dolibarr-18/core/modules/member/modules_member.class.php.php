<?php

/**
 *	Parent class to manage intervention document templates
 */
abstract class ModelePDFMember extends \CommonDocGenerator
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
 *  Classe mere des modeles de numerotation des references de members
 */
abstract class ModeleNumRefMembers
{
    public $code_modifiable;
    // Editable code
    public $code_modifiable_invalide;
    // Modified code if it is invalid
    public $code_modifiable_null;
    // Modified code if it is null
    public $code_null;
    //
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     *  Return if a module can be used or not
     *
     *  @return		boolean     true if module can be used
     */
    public function isEnabled()
    {
    }
    /**
     *  Returns the default description of the numbering pattern
     *
     *  @return     string      Descriptive text
     */
    public function info()
    {
    }
    /**
     * Return name of module
     *
     *  @return string Module name
     */
    public function getName()
    {
    }
    /**
     *  Return an example of numbering
     *
     *  @return     string      Example
     */
    public function getExample()
    {
    }
    /**
     *  Checks if the numbers already in the database do not
     *  cause conflicts that would prevent this numbering working.
     *
     *  @return     boolean     false if conflict, true if ok
     */
    public function canBeActivated()
    {
    }
    /**
     *  Renvoi prochaine valeur attribuee
     *
     *	@param	Societe		$objsoc		Object third party
     *  @param  Object		$object		Object we need next value for
     *	@return	string					Valeur
     */
    public function getNextValue($objsoc, $object)
    {
    }
    /**
     *  Renvoi version du module numerotation
     *
     *  @return     string      Valeur
     */
    public function getVersion()
    {
    }
    /**
     *  Return description of module parameters
     *
     *  @param	Translate	$langs      Output language
     *  @param	Societe		$soc		Third party object
     *  @return	string					HTML translated description
     */
    public function getToolTip($langs, $soc)
    {
    }
}