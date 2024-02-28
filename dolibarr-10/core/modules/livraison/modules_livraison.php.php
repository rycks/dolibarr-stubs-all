<?php

/**
 *	Classe mere des modeles de bon de livraison
 */
abstract class ModelePDFDeliveryOrder extends \CommonDocGenerator
{
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return list of active generation modules
     *
     *  @param  DoliDB  $db                 Database handler
     *  @param  integer	$maxfilenamelength  Max length of value to show
     *  @return array                       List of templates
     */
    public static function liste_modeles($db, $maxfilenamelength = 0)
    {
    }
}
/**
 *  \class      ModeleNumRefDeliveryOrder
 *  \brief      Classe mere des modeles de numerotation des references de bon de livraison
 */
abstract class ModeleNumRefDeliveryOrder
{
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * Return if a module can be used or not
     *
     * @return      boolean     true if module can be used
     */
    public function isEnabled()
    {
    }
    /**
     * Renvoi la description par defaut du modele de numerotation
     *
     * @return     string      Texte descripif
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
     * Test si les numeros deja en vigueur dans la base ne provoquent pas d
     * de conflits qui empechera cette numerotation de fonctionner.
     *
     * @return     boolean     false si conflit, true si ok
     */
    public function canBeActivated()
    {
    }
    /**
     * Renvoi prochaine valeur attribuee
     *
     *	@param  Societe     $objsoc         Object third party
     *  @param  Object      $object         Object delivery
     *	@return string                      Valeur
     */
    public function getNextValue($objsoc, $object)
    {
    }
    /**
     * Renvoi version du module numerotation
     *
     * @return     string      Valeur
     */
    public function getVersion()
    {
    }
}