<?php

/**
 * 	Class to manage contract numbering rules madonna
 */
class mod_holiday_madonna extends \ModelNumRefHolidays
{
    /**
     * Dolibarr version of the loaded document
     * @var string
     */
    public $version = 'dolibarr';
    public $prefix = 'HL';
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * @var string Nom du modele
     * @deprecated
     * @see $name
     */
    public $nom = 'Madonna';
    /**
     * @var string model name
     */
    public $name = 'Madonna';
    public $code_auto = 1;
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
     *	@return     boolean     false if conflit, true if ok
     */
    public function canBeActivated()
    {
    }
    /**
     *	Return next value
     *
     *	@param	Societe		$objsoc     third party object
     *	@param	Object		$holiday	Holiday object
     *	@return string      			Value if OK, 0 if KO
     */
    public function getNextValue($objsoc, $holiday)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Return next value
     *
     *	@param	User		$fuser     	User object
     *	@param	Object		$objforref	Holiday object
     *	@return string      			Value if OK, 0 if KO
     */
    public function holiday_get_num($fuser, $objforref)
    {
    }
}