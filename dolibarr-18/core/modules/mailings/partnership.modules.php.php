<?php

/**
 *	Class to manage a list of personalised recipients for mailing feature
 */
class mailing_partnership extends \MailingTargets
{
    // This label is used if no translation is found for key XXX neither MailingModuleDescXXX where XXX=name is found
    public $name = 'PartnershipThirdpartiesOrMembers';
    public $desc = "Thirdparties or members included into a partnership program";
    public $require_admin = 0;
    public $require_module = array('partnership');
    // This module allows to select by categories must be also enabled if category module is not activated
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'partnership';
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    public $enabled = 'isModEnabled("partnership")';
    /**
     *	Constructor
     *
     *  @param		DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    This is the main function that returns the array of emails
     *
     *    @param	int		$mailing_id    	Id of mailing. No need to use it.
     *    @return   int 					<0 if error, number of emails added if ok
     */
    public function add_to_target($mailing_id)
    {
    }
    /**
     *	On the main mailing area, there is a box with statistics.
     *	If you want to add a line in this report you must provide an
     *	array of SQL request that returns two field:
     *	One called "label", One called "nb".
     *
     *	@return		array		Array with SQL requests
     */
    public function getSqlArrayForStats()
    {
    }
    /**
     *	Return here number of distinct emails returned by your selector.
     *	For example if this selector is used to extract 500 different
     *	emails from a text file, this function must return 500.
     *
     *  @param      string			$sql        Requete sql de comptage
     *  @return     int|string      			Nb of recipient, or <0 if error, or '' if NA
     */
    public function getNbOfRecipients($sql = '')
    {
    }
    /**
     *  This is to add a form filter to provide variant of selector
     *	If used, the HTML select must be called "filter"
     *
     *  @return     string      A html select zone
     */
    public function formFilter()
    {
    }
    /**
     *  Can include an URL link on each record provided by selector shown on target page.
     *
     *  @param	int		$id			ID
     *  @param	string	$sourcetype	Source type
     *  @return string      		Url link
     */
    public function url($id, $sourcetype = 'thirdparty')
    {
    }
}