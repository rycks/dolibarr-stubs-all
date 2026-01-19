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
     *   Returns the description of the numbering model
     *
     *   @return     string      Texte descripif
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