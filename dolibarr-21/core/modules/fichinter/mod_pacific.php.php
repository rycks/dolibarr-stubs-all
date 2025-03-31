<?php

/**
 *	Class to manage numbering of intervention cards with rule Pacific.
 */
class mod_pacific extends \ModeleNumRefFicheinter
{
    /**
     * Dolibarr version of the loaded document
     * @var string Version, possible values are: 'development', 'experimental', 'dolibarr', 'dolibarr_deprecated' or a version string like 'x.y.z'''|'development'|'dolibarr'|'experimental'
     */
    public $version = 'dolibarr';
    // 'development', 'experimental', 'dolibarr'
    public $prefix = 'FI';
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * @var string Nom du modele
     * @deprecated Use $name, getName()
     * @see $name
     */
    public $nom = 'pacific';
    /**
     * @var string model name
     */
    public $name = 'pacific';
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
     *  Return an example of numbering
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
     *  @param  CommonObject	$object		Object we need next value for
     *  @return boolean     				false if conflict, true if ok
     */
    public function canBeActivated($object)
    {
    }
    /**
     * 	Return next free value
     *
     *  @param	Societe|string		$objsoc     Object thirdparty
     *  @param  Fichinter|string	$object		Object we need next value for
     *	@return string|int<-1,0>    			Next value if OK, <=0 if KO
     */
    public function getNextValue($objsoc = '', $object = '')
    {
    }
    /**
     * 	Return next free value
     *
     *  @param	Societe		$objsoc     Object third party
     * 	@param	Fichinter	$objforref	Object for number to search
     *  @return string      			Next free value
     *  @deprecated see getNextValue
     */
    public function getNumRef($objsoc, $objforref)
    {
    }
}