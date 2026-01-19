<?php

/**
 *	Class to manage a list of personalised recipients for mailing feature
 */
class mailing_advthirdparties extends \MailingTargets
{
    public $name = 'ThirdPartyAdvancedTargeting';
    // This label is used if no translation is found for key XXX neither MailingModuleDescXXX where XXX=name is found
    public $desc = "Third parties";
    public $require_admin = 0;
    public $require_module = array("none");
    // This module should not be displayed as Selector in mailling
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'company';
    public $enabled = 'isModEnabled("societe")';
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
     *    @param	array	$socid  		Array of id soc to add
     *    @param	int		$type_of_target	Defined in advtargetemailing.class.php
     *    @param	array	$contactid 		Array of contact id to add
     *    @return   int 					Return integer <0 if error, number of emails added if ok
     */
    public function add_to_target_spec($mailing_id, $socid, $type_of_target, $contactid)
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
     *  @param		string			$sql 		Not use here
     * 	@return     int|string      			Nb of recipient, or <0 if error, or '' if NA
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
     *  @param	int		$id		ID
     *  @param	string		$type	type
     *  @return string      	Url link
     */
    public function url($id, $type)
    {
    }
}