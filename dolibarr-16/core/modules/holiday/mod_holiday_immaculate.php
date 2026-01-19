<?php

/**
 *	Class to manage contract numbering rules Magre
 */
class mod_holiday_immaculate extends \ModelNumRefHolidays
{
    /**
     * Dolibarr version of the loaded document
     * @var string
     */
    public $version = 'dolibarr';
    /**
     * @var string Error message
     */
    public $error = '';
    /**
     * @var string Nom du modele
     * @deprecated
     * @see $name
     */
    public $nom = 'Immaculate';
    /**
     * @var string model name
     */
    public $name = 'Immaculate';
    /**
     * @var int Automatic numbering
     */
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
     *	Return next value
     *
     *	@param	Societe		$objsoc     third party object
     *	@param	Object		$holiday	holiday object
     *	@return string      			Value if OK, 0 if KO
     */
    public function getNextValue($objsoc, $holiday)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return next value
     *
     *  @param  User		$fuser     	User object
     *  @param  Object		$objforref	Holiday object
     *  @return string      			Value if OK, 0 if KO
     */
    public function holiday_get_num($fuser, $objforref)
    {
    }
}