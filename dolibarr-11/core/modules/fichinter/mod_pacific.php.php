<?php

/**
 *	Class to manage numbering of intervention cards with rule Pacific.
 */
class mod_pacific extends \ModeleNumRefFicheinter
{
    /**
     * Dolibarr version of the loaded document
     * @var string
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
     * @deprecated
     * @see name
     */
    public $nom = 'pacific';
    /**
     * @var string model name
     */
    public $name = 'pacific';
    /**
     *  Return description of numbering module
     *
     *  @return     string      Text with description
     */
    public function info()
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
     *  Checks if the numbers already in force in the data base do not
     *  cause conflicts that would prevent this numbering from working.
     *
     *  @return     boolean     false if conflict, true if ok
     */
    public function canBeActivated()
    {
    }
    /**
     * 	Return next free value
     *
     *  @param	Societe		$objsoc     Object thirdparty
     *  @param  Object		$object		Object we need next value for
     *  @return string      			Value if KO, <0 if KO
     */
    public function getNextValue($objsoc = 0, $object = '')
    {
    }
    /**
     * 	Return next free value
     *
     *  @param	Societe	$objsoc     Object third party
     * 	@param	Object	$objforref	Object for number to search
     *  @return string      		Next free value
     */
    public function getNumRef($objsoc, $objforref)
    {
    }
}