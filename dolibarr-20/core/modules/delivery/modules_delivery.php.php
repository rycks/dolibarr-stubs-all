<?php

/**
 *	Class mere des modeles de bon de livraison
 */
abstract class ModelePDFDeliveryOrder extends \CommonDocGenerator
{
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
 *  Class mere des modeles de numerotation des references de bon de livraison
 */
abstract class ModeleNumRefDeliveryOrder extends \CommonNumRefGenerator
{
    // No overload code
}