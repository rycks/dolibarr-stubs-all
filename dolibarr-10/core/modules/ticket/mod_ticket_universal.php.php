<?php

/**
 *     Classe du modele de numerotation de reference de projet Universal
 */
class mod_ticket_universal extends \ModeleNumRefTicket
{
    /**
     * Dolibarr version of the loaded document
     * @var string
     */
    public $version = 'dolibarr';
    // 'development', 'experimental', 'dolibarr'
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * @var string Nom du modele
     * @deprecated
     * @see name
     */
    public $nom = 'Universal';
    /**
     * @var string model name
     */
    public $name = 'Universal';
    /**
     *  Renvoi la description du modele de numerotation
     *
     *  @return string      Texte descripif
     */
    public function info()
    {
    }
    /**
     *  Renvoi un exemple de numerotation
     *
     *  @return string      Example
     */
    public function getExample()
    {
    }
    /**
     *  Return next value
     *
     *  @param  Societe $objsoc    Object third party
     *  @param  Project $ticket Object ticket
     *  @return string                    Value if OK, 0 if KO
     */
    public function getNextValue($objsoc, $ticket)
    {
    }
}