<?php

/**
 *  Parent class for stock models of doc generators
 */
abstract class ModelePDFStock extends \CommonDocGenerator
{
    /**
     * @var DoliDb Database handler
     */
    public $db;
    /**
     * @var string model name
     */
    public $name;
    /**
     * @var string model description (short text)
     */
    public $description;
    /**
     * @var string document type
     */
    public $type;
    /**
     * @var string		Dolibarr version of the loaded document
     */
    public $version = 'dolibarr';
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return list of active generation modules
     *
     *  @param  DoliDB      $db                 Database handler
     *  @param  integer     $maxfilenamelength  Max length of value to show
     *  @return array                           List of templates
     */
    public static function liste_modeles($db, $maxfilenamelength = 0)
    {
    }
}