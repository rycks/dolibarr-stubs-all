<?php

// required for use by classes that inherit
/**
 *	Parent class for supplier invoices models
 */
abstract class ModelePDFSuppliersInvoices extends \CommonDocGenerator
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
 *	Parent Class of numbering models of suppliers invoices references
 */
abstract class ModeleNumRefSuppliersInvoices
{
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    public $version;
    /**  Return if a model can be used or not
     *
     *   @return	boolean     true if model can be used
     */
    public function isEnabled()
    {
    }
    /**  Returns the default description of the model numbering
     *
     *   @return    string      Description Text
     */
    public function info()
    {
    }
    /**   Returns a numbering example
     *
     *    @return   string      Example
     */
    public function getExample()
    {
    }
    /**  Tests if the numbers already in force in the database do not cause conflicts that would prevent this numbering.
     *
     *   @return	boolean     false if conflict, true if ok
     */
    public function canBeActivated()
    {
    }
    /**  Returns next value assigned
     *
     * @param	Societe		$objsoc     Object third party
     * @param  	Object	    $object		Object
     * @param	string		$mode       'next' for next value or 'last' for last value
     * @return 	string      			Value if OK, 0 if KO
     */
    public function getNextValue($objsoc, $object, $mode = 'next')
    {
    }
    /**   Returns version of the model numbering
     *
     *    @return     string      Value
     */
    public function getVersion()
    {
    }
}