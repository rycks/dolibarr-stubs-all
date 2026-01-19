<?php

/**
 *	Parent class of sending receipts models
 */
abstract class ModelePdfExpedition extends \CommonDocGenerator
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
 *  Parent Class of numbering models of sending receipts references
 */
abstract class ModelNumRefExpedition
{
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    public $version;
    /** Return if a model can be used or not
     *
     *  @return		boolean     true if model can be used
     */
    public function isEnabled()
    {
    }
    /**
     *	Return default description of numbering model
     *
     *	@return     string      text description
     */
    public function info()
    {
    }
    /**
     *	Returns numbering example
     *
     *	@return     string      Example
     */
    public function getExample()
    {
    }
    /**
     *	Test if existing numbers make problems with numbering
     *
     *	@return     boolean     false if conflict, true if ok
     */
    public function canBeActivated()
    {
    }
    /**
     *	Returns next value assigned
     *
     *	@param	Societe		$objsoc     Third party object
     *	@param	Object		$shipment	Shipment object
     *	@return	string					Value
     */
    public function getNextValue($objsoc, $shipment)
    {
    }
    /**
     *	Returns version of the numbering model
     *
     *	@return     string      Value
     */
    public function getVersion()
    {
    }
}