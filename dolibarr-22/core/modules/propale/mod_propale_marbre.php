<?php

/**
 *	Class to manage business proposition rules Marbre
 */
class mod_propale_marbre extends \ModeleNumRefPropales
{
    /**
     * Dolibarr version of the loaded document
     * @var string Version, possible values are: 'development', 'experimental', 'dolibarr', 'dolibarr_deprecated' or a version string like 'x.y.z'''|'development'|'dolibarr'|'experimental'
     */
    public $version = 'dolibarr';
    // 'development', 'experimental', 'dolibarr'
    /**
     * @var string prefix
     */
    public $prefix = 'PR';
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * @var string Nom du modele
     * @deprecated
     * @see $name
     */
    public $nom = 'Marbre';
    /**
     * @var string model name
     */
    public $name = 'Marbre';
    /**
     *  Return description of numbering module
     *
     *	@param	Translate	$langs      Lang object to use for output
     *  @return string      			Descriptive text
     */
    public function info($langs)
    {
    }
    /**
     *  Return an example of numbering module values
     *
     *  @return     string      Example
     */
    public function getExample()
    {
    }
    /**
     *  Checks if the numbers already in the database do not
     *  cause conflicts that would prevent this numbering working.
     *
     *	@param	CommonObject	$object	Object we need next value for
     *  @return boolean     			false if KO (there is a conflict), true if OK
     */
    public function canBeActivated($object)
    {
    }
    /**
     *  Return next value
     *
     *  @param	?Societe	$objsoc     Object third party
     * 	@param	Propal		$propal		Object commercial proposal
     *  @return string|int<-1,0>		Next value, <=0 if KO
     */
    public function getNextValue($objsoc, $propal)
    {
    }
    /**
     *  Return next free value
     *
     *  @param	Societe		$objsoc      	Object third party
     * 	@param	Propal		$objforref		Object for number to search
     *  @return string|-1      				Next free value, -1 if KO
     *  @deprecated see getNextValue
     */
    public function getNumRef($objsoc, $objforref)
    {
    }
}