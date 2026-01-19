<?php

// required for use by classes that inherit
/**
 *	Parent class for supplier orders models
 */
abstract class ModelePDFSuppliersOrders extends \CommonDocGenerator
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
     *  @return	array						List of templates
     */
    public static function liste_modeles($db, $maxfilenamelength = 0)
    {
    }
}
/**
 *	Parent Class of numbering models of suppliers orders references
 */
abstract class ModeleNumRefSuppliersOrders
{
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**  Return if a model can be used or not
     *
     *   @return	boolean     true if model can be used
     */
    public function isEnabled()
    {
    }
    /**  Returns default description of numbering model
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
    /**  Tests if existing numbers make problems with numbering
     *
     *   @return	boolean     false if conflict, true if ok
     */
    public function canBeActivated()
    {
    }
    /**  Returns next value assigned
     *
     *  @param	Societe		$objsoc     Object third party
     *  @param  Object	    $object		Object
     *  @return string      			Valeur
     */
    public function getNextValue($objsoc = 0, $object = '')
    {
    }
    /**   Returns version of the numbering model
     *
     *    @return     string      Value
     */
    public function getVersion()
    {
    }
}