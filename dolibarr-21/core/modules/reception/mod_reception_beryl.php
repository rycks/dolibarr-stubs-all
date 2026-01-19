<?php

/**
 *	Class to manage reception numbering rules Beryl
 */
class mod_reception_beryl extends \ModelNumRefReception
{
    public $version = 'dolibarr';
    /**
     * @var string
     */
    public $prefix = 'RCP';
    public $error = '';
    /**
     * @var string
     */
    public $nom = 'Beryl';
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
     *	@param	CommonObject	$object	Object we need next value for
     *  @return boolean     			false if KO (there is a conflict), true if OK
     */
    public function canBeActivated($object)
    {
    }
    /**
     *	Return next value
     *
     *	@param	Societe		$objsoc		Third party object
     *	@param	?Reception	$reception	Reception object
     *	@return string|int<-1,0>		Value if OK, -1 if KO
     */
    public function getNextValue($objsoc, $reception)
    {
    }
}