<?php

/**
 *	Class to offer a selector of emailing targets from contacts
 */
class mailing_contacts1 extends \MailingTargets
{
    public $name = 'ContactCompanies';
    // Identifiant du module mailing
    // This label is used if no translation is found for key XXX neither MailingModuleDescXXX where XXX=name is found
    public $desc = 'Contacts of thirdparties (prospects, customers, suppliers...)';
    public $require_module = array("societe");
    // Module mailing actif si modules require_module actifs
    public $require_admin = 0;
    // Module mailing actif pour user admin ou non
    public $picto = 'contact';
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /**
     *  Constructor
     *
     *  @param      DoliDB      $db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *	On the main mailing area, there is a box with statistics.
     *	If you want to add a line in this report you must provide an
     *	array of SQL request that returns two field:
     *	One called "label", One called "nb".
     *
     *	@return		string[]		Array with SQL requests
     */
    public function getSqlArrayForStats()
    {
    }
    /**
     *	Return here number of distinct emails returned by your selector.
     *	For example if this selector is used to extract 500 different
     *	emails from a text file, this function must return 500.
     *
     *  @param		string	$sql		Requete sql de comptage
     *	@return		int
     */
    public function getNbOfRecipients($sql = '')
    {
    }
    /**
     *   Affiche formulaire de filtre qui apparait dans page de selection des destinataires de mailings
     *
     *   @return     string      Retourne zone select
     */
    public function formFilter()
    {
    }
    /**
     *  Renvoie url lien vers fiche de la source du destinataire du mailing
     *
     *  @param	int		$id		ID
     *  @return string      	Url lien
     */
    public function url($id)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Ajoute destinataires dans table des cibles
     *
     *  @param  int		$mailing_id    	Id of emailing
     *  @return int           			<0 si erreur, nb ajout si ok
     */
    public function add_to_target($mailing_id)
    {
    }
}