<?php

/**
 *     Class to manage the numbering module Simple for ticket references
 */
class mod_ticket_simple extends \ModeleNumRefTicket
{
    /**
     * Dolibarr version of the loaded document
     * @var string
     */
    public $version = 'dolibarr';
    // 'development', 'experimental', 'dolibarr'
    public $prefix = 'TS';
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * @var string Nom du modele
     * @deprecated
     * @see name
     */
    public $nom = 'Simple';
    /**
     * @var string model name
     */
    public $name = 'Simple';
    /**
     *  Return description of numbering module
     *
     *  @return string      Text with description
     */
    public function info()
    {
    }
    /**
     *  Return an example of numbering module values
     *
     *     @return string      Example
     */
    public function getExample()
    {
    }
    /**
     * Test si les numeros deja en vigueur dans la base ne provoquent pas de
     *   de conflits qui empechera cette numerotation de fonctionner.
     *
     *   @return boolean     false si conflit, true si ok
     */
    public function canBeActivated()
    {
    }
    /**
     *  Return next value
     *
     *  @param  Societe $objsoc    Object third party
     *  @param  Project $ticket Object ticket
     *  @return string                Value if OK, 0 if KO
     */
    public function getNextValue($objsoc, $ticket)
    {
    }
}