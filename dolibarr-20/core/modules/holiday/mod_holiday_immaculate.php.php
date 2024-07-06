<?php

/**
 *	Class to manage holiday numbering rules Immaculate
 */
class mod_holiday_immaculate extends \ModelNumRefHolidays
{
    // variables inherited from ModelNumRefHolidays class
    public $name = 'Immaculate';
    public $version = 'dolibarr';
    /**
     *	Constructor
     */
    public function __construct()
    {
    }
    /**
     *	Return default description of numbering model
     *
     *	@param	Translate	$langs      Lang object to use for output
     *  @return string      			Descriptive text
     */
    public function info($langs)
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
     *	@param	Holiday		$holiday	holiday object
     *	@return string|0      			Value if OK, 0 if KO
     */
    public function getNextValue($objsoc, $holiday)
    {
    }
}