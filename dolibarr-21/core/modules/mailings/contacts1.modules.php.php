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
    /**
     * @var string condition to enable module
     */
    public $enabled = 'isModEnabled("societe")';
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'contact';
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
     *  @param		string		$sql		Requete sql de comptage
     *  @return     int|string      		Nb of recipient, or <0 if error, or '' if NA
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
     *  Provide the URL to the car of the source information of the recipient for the mailing
     *
     *  @param	int		$id		ID
     *  @return string      	URL link
     */
    public function url($id)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Add some recipients into target table
     *
     *  @param  int		$mailing_id    	Id of emailing
     *  @return int           			Return integer <0 si erreur, nb ajout si ok
     */
    public function add_to_target($mailing_id)
    {
    }
}