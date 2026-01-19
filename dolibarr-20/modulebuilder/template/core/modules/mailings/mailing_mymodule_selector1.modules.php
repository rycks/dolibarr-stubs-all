<?php

/**
 * mailing_mailinglist_mymodule
 */
class mailing_mailing_mymodule_selector1 extends \MailingTargets
{
    // CHANGE THIS: Put here a name not already used
    public $name = 'mailing_mymodule_selector1';
    // CHANGE THIS: Put here a description of your selector module
    public $desc = 'Emailing target selector1';
    // CHANGE THIS: Set to 1 if selector is available for admin users only
    public $require_admin = 0;
    public $enabled = 'isModEnabled("mymodule")';
    public $require_module = array();
    /**
     * @var string 	String with the name of icon for myobject. Can be an image filename like 'object_myobject.png' of a font awesome code 'fa-...'.
     */
    public $picto = 'generic';
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /**
     *  Constructor
     *
     *  @param  DoliDB  $db     Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *  Displays the filter form that appears in the mailing recipient selection page
     *
     *  @return     string      Return select zone
     */
    public function formFilter()
    {
    }
    /**
     *  Returns url link to file of the source of the recipient of the mailing
     *
     *  @param      int         $id     ID
     *  @return     string              Url lien
     */
    public function url($id)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  This is the main function that returns the array of emails
     *
     *  @param  int     $mailing_id     Id of emailing
     *  @return int                     Return integer <0 if error, number of emails added if ok
     */
    public function add_to_target($mailing_id)
    {
    }
    /**
     *  On the main mailing area, there is a box with statistics.
     *  If you want to add a line in this report you must provide an
     *  array of SQL request that returns two field:
     *  One called "label", One called "nb".
     *
     *  @return array
     */
    public function getSqlArrayForStats()
    {
    }
    /**
     *  Return here number of distinct emails returned by your selector.
     *  For example if this selector is used to extract 500 different
     *  emails from a text file, this function must return 500.
     *
     *  @param		string			$sql 		Not use here
     *  @return 	int                 		Nb of recipients or -1 if KO
     */
    public function getNbOfRecipients($sql = '')
    {
    }
}