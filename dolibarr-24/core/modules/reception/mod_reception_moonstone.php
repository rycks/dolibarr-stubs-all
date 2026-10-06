<?php

/**
 *	Class to manage reception numbering rules Moonstone
 */
class mod_reception_moonstone extends \ModelNumRefReception
{
    public $version = 'dolibarr';
    public $error = '';
    /**
     * @var string
     */
    public $nom = 'Moonstone';
    /**
     *  Return default description of numbering model
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
     *	@param	Societe		$objsoc		Third party object
     *	@param	?Reception	$reception	Reception object
     *	@return string|int<-1,0>		Value if OK, -1 if KO
     */
    public function getNextValue($objsoc, $reception)
    {
    }
}