<?php

/**
 *	Parent class of sending receipts models
 */
abstract class ModelePdfReception extends \CommonDocGenerator
{
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
 *  Parent Class of numbering models of sending receipts references
 */
abstract class ModelNumRefReception
{
    public $error = '';
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
     *	@return     boolean     false if conflit, true if ok
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