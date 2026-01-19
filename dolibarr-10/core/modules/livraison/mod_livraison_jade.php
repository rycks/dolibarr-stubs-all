<?php

/**
 *  \class      mod_livraison_jade
 *  \brief      Classe du modele de numerotation de reference de bon de livraison Jade
 */
class mod_livraison_jade extends \ModeleNumRefDeliveryOrder
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
     * @see $name
     */
    public $nom = 'Jade';
    /**
     * @var string model name
     */
    public $name = 'Jade';
    public $prefix = 'BL';
    /**
     *   Renvoi la description du modele de numerotation
     *
     *   @return     string      Texte descripif
     */
    public function info()
    {
    }
    /**
     *  Renvoi un exemple de numerotation
     *
     *  @return     string      Example
     */
    public function getExample()
    {
    }
    /**
     *  Test si les numeros deja en vigueur dans la base ne provoquent pas de
     *  de conflits qui empechera cette numerotation de fonctionner.
     *
     *  @return     boolean     false si conflit, true si ok
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
    public function getNextValue($objsoc, $object)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return next free ref
     *
     *  @param  Societe     $objsoc         Object thirdparty
     *  @param  Object      $object         Object livraison
     *  @return string                      Texte descriptif
     */
    public function livraison_get_num($objsoc = 0, $object = '')
    {
    }
}