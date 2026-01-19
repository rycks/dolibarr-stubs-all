<?php

/**
 *  Class to manage the numbering module Universal for Ticket references
 */
class mod_ticket_universal extends \ModeleNumRefTicket
{
    /**
     *  Dolibarr version of the loaded document
     *  @var string Version, possible values are: 'development', 'experimental', 'dolibarr', 'dolibarr_deprecated' or a version string like 'x.y.z'''|'development'|'dolibarr'|'experimental'
     */
    public $version = 'dolibarr';
    // 'development', 'experimental', 'dolibarr'
    /**
     *  @var string Error code (or message)
     */
    public $error = '';
    /**
     *  @var string Nom du modele
     *  @deprecated
     *  @see $name
     */
    public $nom = 'Universal';
    /**
     *  @var string model name
     */
    public $name = 'Universal';
    /**
     *  Returns the description of the numbering model
     *
     *	@param	Translate	$langs      Lang object to use for output
     *  @return string      			Descriptive text
     */
    public function info($langs)
    {
    }
    /**
     *  Return an example of numbering
     *
     *  @return string      Example
     */
    public function getExample()
    {
    }
    /**
     *  Return next value
     *
     *  @param	Societe	$objsoc		Object third party
     *  @param	Ticket	$ticket 	Object ticket
     *  @return	string|int<-1,0>	Next value if OK, <=-1 if KO
     */
    public function getNextValue($objsoc, $ticket)
    {
    }
}