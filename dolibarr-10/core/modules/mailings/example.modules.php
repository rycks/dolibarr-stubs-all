<?php

// CHANGE THIS: Class name must be called mailing_xxx with xxx=name of your selector
/**
	    \class      mailing_example
		\brief      Class to manage a list of personalised recipients for mailing feature
*/
class mailing_example extends \MailingTargets
{
    // CHANGE THIS: Put here a name not already used
    public $name = 'example';
    // CHANGE THIS: Put here a description of your selector module.
    // This label is used if no translation is found for key MailingModuleDescXXX where XXX=name is found
    public $desc = 'Put here a description';
    // CHANGE THIS: Set to 1 if selector is available for admin users only
    public $require_admin = 0;
    // CHANGE THIS: Add a tooltip language key to add a tooltip help icon after the email target selector
    public $tooltip = 'MyTooltipLangKey';
    public $require_module = array();
    public $picto = '';
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    // CHANGE THIS: Constructor name must be called mailing_xxx with xxx=name of your selector
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
     *  This is the main function that returns the array of emails
     *
     *  @param	int		$mailing_id    	Id of mailing. No need to use it.
     *  @return int           			<0 if error, number of emails added if ok
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
     *  Return here number of distinct emails returned by your selector.
     *  For example if this selector is used to extract 500 different
     *  emails from a text file, this function must return 500.
     *
     *  @param		string		$sql		Requete sql de comptage
     *  @return		int|string				Number of recipient or '?'
     */
    public function getNbOfRecipients($sql = '')
    {
    }
    /**
     *  This is to add a form filter to provide variant of selector
     *  If used, the HTML select must be called "filter"
     *
     *  @return     string      A html select zone
     */
    public function formFilter()
    {
    }
    /**
     *  Can include an URL link on each record provided by selector
     *	shown on target page.
     *
     *  @param	int		$id		ID
     *  @return string      	Url link
     */
    public function url($id)
    {
    }
}