<?php

/**
 *	Parent class to manage holidays document templates
 */
abstract class ModelePDFHoliday extends \CommonDocGenerator
{
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Return list of active generation modules
     *
     *  @param  DoliDB  $db     			Database handler
     *  @param  integer	$maxfilenamelength  Max length of value to show
     *  @return	array						List of templates
     */
    public static function liste_modeles($db, $maxfilenamelength = 0)
    {
    }
}
/**
 * Parent class for all holidays numbering modules
 */
class ModelNumRefHolidays
{
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     *	Return if a module can be used or not
     *
     * 	@return		boolean     true if module can be used
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
     *	Return numbering example
     *
     *	@return     string      Example
     */
    public function getExample()
    {
    }
    /**
     *	Test if existing numbers make problems with numbering
     *
     *	@return		boolean		false if conflict, true if ok
     */
    public function canBeActivated()
    {
    }
    /**
     *	Return next value
     *
     *	@param	Societe		$objsoc     third party object
     *	@param	Object		$holiday	Holiday object
     *	@return	string					Value if OK, 0 if KO
     */
    public function getNextValue($objsoc, $holiday)
    {
    }
    /**
     *	Return numbering version module
     *
     *	@return     string      Value
     */
    public function getVersion()
    {
    }
}