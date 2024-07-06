<?php

/**
 * 	Class to manage holiday numbering rules Madonna
 */
class mod_holiday_madonna extends \ModelNumRefHolidays
{
    // variables inherited from ModelNumRefHolidays class
    public $name = 'Madonna';
    public $version = 'dolibarr';
    // variables not inherited
    /**
     * @var string
     */
    public $prefix = 'HL';
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
     *	Test if existing numbers make problems with numbering
     *
     *  @param  CommonObject	$object		Object we need next value for
     *  @return boolean     				false if conflict, true if ok
     */
    public function canBeActivated($object)
    {
    }
    /**
     *	Return next value
     *
     *	@param	Societe		$objsoc     third party object
     *	@param	Holiday		$holiday	Holiday object
     *	@return string|-1      			Value if OK, -1 if KO
     */
    public function getNextValue($objsoc, $holiday)
    {
    }
}