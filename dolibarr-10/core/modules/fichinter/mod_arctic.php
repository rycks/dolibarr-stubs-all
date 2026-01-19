<?php

/**
 *	Class to manage numbering of intervention cards with rule Artic.
 */
class mod_arctic extends \ModeleNumRefFicheinter
{
    /**
     * Dolibarr version of the loaded document
     * @var string
     */
    public $version = 'dolibarr';
    // 'development', 'experimental', 'dolibarr'
    /**
     * @var string Error message
     */
    public $error = '';
    /**
     * @var string Nom du modele
     * @deprecated
     * @see name
     */
    public $nom = 'arctic';
    /**
     * @var string model name
     */
    public $name = 'arctic';
    /**
     *  Renvoi la description du modele de numerotation
     *
     *  @return     string      Texte descripif
     */
    public function info()
    {
    }
    /**
     * Renvoi un exemple de numerotation
     *
     * @return     string      Example
     */
    public function getExample()
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
     *  Return next free value
     *
     *  @param	Societe		$objsoc     Object third party
     *  @param	Object		$objforref	Object for number to search
     *  @return string      			Next free value
     */
    public function getNumRef($objsoc, $objforref)
    {
    }
}