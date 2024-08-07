<?php

/**
 *    Class to generate target according to rule Fraise
 */
class mailing_fraise extends \MailingTargets
{
    public $name = 'FundationMembers';
    // Identifiant du module mailing
    // This label is used if no translation is found for key XXX neither MailingModuleDescXXX where XXX=name is found
    public $desc = 'Foundation members with emails';
    // Set to 1 if selector is available for admin users only
    public $require_admin = 0;
    public $require_module = array('adherent');
    public $enabled = 'isModEnabled("member")';
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'user';
    /**
     *    Constructor
     *
     *  @param        DoliDB        $db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *    On the main mailing area, there is a box with statistics.
     *    If you want to add a line in this report you must provide an
     *    array of SQL request that returns two field:
     *    One called "label", One called "nb".
     *
     *    @return        string[]        Array with SQL requests
     */
    public function getSqlArrayForStats()
    {
    }
    /**
     *    Return here number of distinct emails returned by your selector.
     *    For example if this selector is used to extract 500 different
     *    emails from a text file, this function must return 500.
     *
     *    @param      string    	$sql        Requete sql de comptage
     *    @return     int|string      			Nb of recipient, or <0 if error, or '' if NA
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
     *  @param    int        $id        ID
     *  @return     string      Url lien
     */
    public function url($id)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Ajoute destinataires dans table des cibles
     *
     *  @param    int        $mailing_id        Id of emailing
     *  @return int                       Return integer < 0 si erreur, nb ajout si ok
     */
    public function add_to_target($mailing_id)
    {
    }
}