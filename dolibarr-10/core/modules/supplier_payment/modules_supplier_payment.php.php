<?php

/**
 *	Parent class for supplier invoices models
 */
abstract class ModelePDFSuppliersPayments extends \CommonDocGenerator
{
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return list of active generation models
     *
     *  @param	DoliDB	$db     			Database handler
     *  @param  integer	$maxfilenamelength  Max length of value to show
     *  @return	array						List of numbers
     */
    public static function liste_modeles($db, $maxfilenamelength = 0)
    {
    }
}
/**
 *  \class      ModeleNumRefSupplierPayments
 *  \brief      Payment numbering references mother class
 */
abstract class ModeleNumRefSupplierPayments
{
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     *	Return if a module can be used or not
     *
     *	@return		boolean     true if module can be used
     */
    public function isEnabled()
    {
    }
    /**
     *	Return the default description of numbering module
     *
     *	@return     string      Texte descripif
     */
    public function info()
    {
    }
    /**
     *	Return numbering example
     *
     *	@return     string      Example
     */
    public function getExample()
    {
    }
    /**
     *  Test if the existing numbers in the database do not cause conflicts that would prevent this numbering run.
     *
     *	@return     boolean     false si conflit, true si ok
     */
    public function canBeActivated()
    {
    }
    /**
     *	Returns the next value
     *
     *	@param	Societe		$objsoc     Object thirdparty
     *	@param	Object		$object		Object we need next value for
     *	@return	string      Valeur
     */
    public function getNextValue($objsoc, $object)
    {
    }
    /**
     *	Returns the module numbering version
     *
     *	@return     string      Value
     */
    public function getVersion()
    {
    }
}