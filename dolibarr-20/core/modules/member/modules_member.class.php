<?php

/**
 *	Parent class to manage intervention document templates
 */
abstract class ModelePDFMember extends \CommonDocGenerator
{
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
 *  Class mere des modeles de numerotation des references de members
 */
abstract class ModeleNumRefMembers extends \CommonNumRefGenerator
{
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
    /**
     *  Return next value
     *
     *  @param  Societe		$objsoc		Object third party
     *  @param  Adherent	$object		Object we need next value for
     *  @return	string					next value
     */
    public function getNextValue($objsoc, $object)
    {
    }
}