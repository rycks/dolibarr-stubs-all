<?php

/**
 *	Class to manage customer order numbering rules Marbre
 */
class mod_propale_marbre extends \ModeleNumRefPropales
{
    /**
     * Dolibarr version of the loaded document
     * @var string
     */
    public $version = 'dolibarr';
    // 'development', 'experimental', 'dolibarr'
    public $prefix = 'PR';
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * @var string Nom du modele
     * @deprecated
     * @see name
     */
    public $nom = 'Marbre';
    /**
     * @var string model name
     */
    public $name = 'Marbre';
    /**
     *  Return description of numbering module
     *
     *  @return     string      Text with description
     */
    public function info()
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
     *  Test si les numeros deje en vigueur dans la base ne provoquent pas de
     *  de conflits qui empechera cette numerotation de fonctionner.
     *
     *  @return     boolean     false si conflit, true si ok
     */
    public function canBeActivated()
    {
    }
    /**
     *  Return next value
     *
     *  @param	Societe		$objsoc     Object third party
     * 	@param	Propal		$propal		Object commercial proposal
     *  @return string      			Next value
     */
    public function getNextValue($objsoc, $propal)
    {
    }
    /**
     *  Return next free value
     *
     *  @param	Societe		$objsoc      	Object third party
     * 	@param	Object		$objforref		Object for number to search
     *  @return string      				Next free value
     */
    public function getNumRef($objsoc, $objforref)
    {
    }
}