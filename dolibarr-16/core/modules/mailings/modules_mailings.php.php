<?php

/**
 *		Parent class of emailing target selectors modules
 */
class MailingTargets
{
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /**
     * @var string	Condition to be enabled
     */
    public $enabled;
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    public $tooltip = '';
    /**
     *	Constructor
     *
     *  @param		DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     * Return description of email selector
     *
     * @return     string      Return translation of module label. Try translation of $this->name then translation of 'MailingModuleDesc'.$this->name, or $this->desc if not found
     */
    public function getDesc()
    {
    }
    /**
     *	Return number of records for email selector
     *
     *  @return     integer      Example
     */
    public function getNbOfRecords()
    {
    }
    /**
     * Retourne nombre de destinataires
     *
     * @param      string		$sql        Sql request to count
     * @return     int|string      			Nb of recipient, or <0 if error, or '' if NA
     */
    public function getNbOfRecipients($sql)
    {
    }
    /**
     * Affiche formulaire de filtre qui apparait dans page de selection
     * des destinataires de mailings
     *
     * @return     string      Retourne zone select
     */
    public function formFilter()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Met a jour nombre de destinataires
     *
     * @param	int		$mailing_id          Id of emailing
     * @return  int			                 < 0 si erreur, nb destinataires si ok
     */
    public function update_nb($mailing_id)
    {
    }
    /**
     * Add a list of targets int the database
     *
     * @param	int		$mailing_id    Id of emailing
     * @param   array	$cibles        Array with targets
     * @return  int      			   < 0 si erreur, nb ajout si ok
     */
    public function addTargetsToDatabase($mailing_id, $cibles)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Supprime tous les destinataires de la table des cibles
     *
     *  @param  int		$mailing_id        Id of emailing
     *  @return	void
     */
    public function clear_target($mailing_id)
    {
    }
}