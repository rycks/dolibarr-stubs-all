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
     * Returns the default description of the numbering pattern
     *
     * @return     string      Descriptive text
     */
    public function info()
    {
    }
    /**
     * Return an example of numbering
     *
     * @return     string      Example
     */
    public function getExample()
    {
    }
    /**
     *  Checks if the numbers already in the database do not
     *  cause conflicts that would prevent this numbering working.
     *
     * @return     boolean     false if conflict, true if ok
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