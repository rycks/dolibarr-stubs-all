<?php

/**
 *  Parent class for stock models of doc generators
 */
abstract class ModelePDFStock extends \CommonDocGenerator
{
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * @var int page_largeur
     */
    public $page_largeur;
    /**
     * @var int page_hauteur
     */
    public $page_hauteur;
    /**
     * @var array format
     */
    public $format;
    /**
     * @var int marge_gauche
     */
    public $marge_gauche;
    /**
     * @var int marge_droite
     */
    public $marge_droite;
    /**
     * @var int marge_haute
     */
    public $marge_haute;
    /**
     * @var int marge_basse
     */
    public $marge_basse;
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