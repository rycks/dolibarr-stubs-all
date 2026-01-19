<?php

// Required because used in classes that inherit
/**
 *	Parent class of invoice document generators
 */
abstract class ModelePDFFactures extends \CommonDocGenerator
{
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    public $tva;
    public $tva_array;
    public $localtax1;
    public $localtax2;
    public $atleastonediscount = 0;
    public $atleastoneratenotnull = 0;
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
 *  Parent class of invoice reference numbering templates
 */
abstract class ModeleNumRefFactures
{
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * Return if a module can be used or not
     *
     * @return	boolean     true if module can be used
     */
    public function isEnabled()
    {
    }
    /**
     * Renvoi la description par defaut du modele de numerotation
     *
     * @return    string      Texte descripif
     */
    public function info()
    {
    }
    /**
     * Return an example of numbering
     *
     * @return	string      Example
     */
    public function getExample()
    {
    }
    /**
     *  Checks if the numbers already in the database do not
     *  cause conflicts that would prevent this numbering working.
     *
     * @return	boolean     false if conflict, true if ok
     */
    public function canBeActivated()
    {
    }
    /**
     * Renvoi prochaine valeur attribuee
     *
     * @param	Societe		$objsoc		Objet societe
     * @param   Facture		$invoice	Objet facture
     * @param   string		$mode       'next' for next value or 'last' for last value
     * @return  string      			Value
     */
    public function getNextValue($objsoc, $invoice, $mode = 'next')
    {
    }
    /**
     * Renvoi version du modele de numerotation
     *
     * @return    string      Valeur
     */
    public function getVersion()
    {
    }
}