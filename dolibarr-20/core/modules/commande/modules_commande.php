<?php

/**
 *	Parent class for orders models
 */
abstract class ModelePDFCommandes extends \CommonDocGenerator
{
    public $posxpicture;
    public $posxtva;
    public $posxup;
    public $posxqty;
    public $posxunit;
    public $posxdesc;
    public $posxdiscount;
    public $postotalht;
    public $tva;
    public $tva_array;
    public $localtax1;
    public $localtax2;
    public $atleastoneratenotnull = 0;
    public $atleastonediscount = 0;
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return list of active generation modules
     *
     *  @param	DoliDB	$db     			Database handler
     *  @param  integer	$maxfilenamelength  Max length of value to show
     *  @return	array						List of templates
     */
    public static function liste_modeles($db, $maxfilenamelength = 0)
    {
    }
}
/**
 *  Parent class to manage numbering of Sale Orders
 */
abstract class ModeleNumRefCommandes extends \CommonNumRefGenerator
{
    // No overload code
}