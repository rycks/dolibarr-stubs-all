<?php

// Requis car utilise dans les classes qui heritent
/**
 *	Classe mere des modeles de propale
 */
abstract class ModelePDFSupplierProposal extends \CommonDocGenerator
{
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return list of active generation modules
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
 *	Classe mere des modeles de numerotation des references de propales
 */
abstract class ModeleNumRefSupplierProposal
{
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * Return if a module can be used or not
     *
     * @return	boolean     true if module can be used
     */
    public function isEnabled()
    {
    }
    /**
     *  Renvoi la description par defaut du modele de numerotation
     *
     * 	@return     string      Texte descripif
     */
    public function info()
    {
    }
    /**
     * 	Return an example of numbering
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
     * 	Renvoi prochaine valeur attribuee
     *
     *	@param	Societe				$objsoc     			Object third party
     * 	@param	SupplierProposal	$supplier_proposal		Object commercial proposal
     *	@return string      								Valeur
     */
    public function getNextValue($objsoc, $supplier_proposal)
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
}