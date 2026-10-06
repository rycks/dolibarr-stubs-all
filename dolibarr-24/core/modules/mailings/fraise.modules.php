<?php

/**
 *   Class to generate targets according to the Fraise rule
 */
class mailing_fraise extends \MailingTargets
{
    public $name = 'FundationMembers';
    // Identifiant du module mailing
    // This label is used if no translation is found for key XXX neither MailingModuleDescXXX where XXX=name is found
    public $desc = 'Foundation members with emails';
    /**
     * @var int <0,1> Set to 1 if selector is available for admin users only
     */
    public $require_admin = 0;
    /**
     * @var string[] This module allows to select by categories must be also enabled if category module is not activated
     */
    public $require_module = array('adherent');
    /**
     * @var string condition to enable module
     */
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
     *    In the main mailing area, there is a box with statistics.
     *    If you want to add a line in this report, you must provide an
     *    array of SQL requests that return two fields:
     *    One called "label", One called "nb".
     *
     *    @return        string[]        Array with SQL requests
     */
    public function getSqlArrayForStats()
    {
    }
    /**
     *    Returns the number of distinct emails returned by your selector.
     *    For example if this selector is used to extract 500 different
     *    emails from a text file, this function must return 500.
     *
     *    @param      string    	$sql        SQL query for counting
     *    @return     int|string      			Number of recipients, or <0 if error, or '' if N/A
     */
    public function getNbOfRecipients($sql = '')
    {
    }
    /**
     *   Displays the filter form that appears on the mailing recipient selection page
     *
     *   @return     string      Returns the select area
     */
    public function formFilter()
    {
    }
    /**
     *  Provides the URL to the card of the source information of the recipient for the mailing
     *
     *  @param	int		$id		ID
     *  @return string      	URL link
     */
    public function url($id)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Adds recipients to the targets table
     *
     *  @param    int        $mailing_id        Id of emailing
     *  @return int                       Returns integer < 0 if error, number added if successful
     */
    public function add_to_target($mailing_id)
    {
    }
}