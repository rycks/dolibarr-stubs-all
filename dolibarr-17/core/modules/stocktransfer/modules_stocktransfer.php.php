<?php

// required for use by classes that inherit
/**
 *	Parent class for documents models
 */
abstract class ModelePDFStockTransfer extends \CommonDocGenerator
{
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
 *  Parent class to manage numbering of StockTransfer
 */
abstract class ModeleNumRefStockTransfer
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
     *	Returns the default description of the numbering template
     *
     *	@return     string      Texte descripif
     */
    public function info()
    {
    }
    /**
     *	Returns an example of numbering
     *
     *	@return     string      Example
     */
    public function getExample()
    {
    }
    /**
     *  Checks if the numbers already in the database do not
     *  cause conflicts that would prevent this numbering working.
     *
     *	@param	Object		$object		Object we need next value for
     *	@return boolean     			false if conflict, true if ok
     */
    public function canBeActivated($object)
    {
    }
    /**
     *	Returns next assigned value
     *
     *	@param	Object		$object		Object we need next value for
     *	@return	string      Valeur
     */
    public function getNextValue($object)
    {
    }
    /**
     *	Returns version of numbering module
     *
     *	@return     string      Valeur
     */
    public function getVersion()
    {
    }
}