<?php

/**
 *	Class to manage expense report numbering rules Sand
 */
class mod_expensereport_sand extends \ModeleNumRefExpenseReport
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
    public $nom = 'Sand';
    /**
     * @var string model name
     */
    public $name = 'Sand';
    /**
     *  Renvoi la description du modele de numerotation
     *
     *  @return     string      Texte descripif
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
     *  Return next free value
     *
     *  @param  Object      $object     Object we need next value for
     *  @return string                  Value if KO, <0 if KO
     */
    public function getNextValue($object)
    {
    }
}