<?php

/**
 *	Class to manage mailman and spip
 */
class MailmanSpip
{
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * @var string[]	Array of error strings
     */
    public $errors = array();
    /**
     * @var array
     */
    public $mladded_ok;
    /**
     * @var array
     */
    public $mladded_ko;
    /**
     * @var array
     */
    public $mlremoved_ok;
    /**
     * @var array
     */
    public $mlremoved_ko;
    /**
     *	Constructor
     *
     *	@param 		DoliDB		$db		Database handler
     */
    public function __construct($db)
    {
    }
    /**
     * Function used to check if SPIP is enabled on the system
     *
     * @return boolean
     */
    public function isSpipEnabled()
    {
    }
    /**
     * Function used to check if the SPIP config is correct
     *
     * @return boolean
     */
    public function checkSpipConfig()
    {
    }
    /**
     * Function used to connect to SPIP
     *
     * @return boolean|DoliDB		Boolean of DoliDB
     */
    public function connectSpip()
    {
    }
    /**
     * Function used to connect to Mailman
     *
     * @param	Adherent 	$object 	Object with the data
     * @param	string 	$url    	Mailman URL to be called with patterns
     * @param	string	$list		Name of mailing-list
     * @return 	mixed				Boolean or string
     */
    private function callMailman($object, $url, $list)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Fonction qui donne les droits redacteurs dans spip
     *
     *	@param	Adherent	$object		Object with data (->firstname, ->lastname, ->email and ->login)
     *  @return	int						=0 if KO, >0 if OK
     */
    public function add_to_spip($object)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Fonction qui enleve les droits redacteurs dans spip
     *
     *	@param	Adherent	$object		Object with data (->login)
     *  @return	int					=0 if KO, >0 if OK
     */
    public function del_to_spip($object)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Indicate if the user is an existing editor in spip
     *
     *	@param	object	$object		Object with data (->login)
     *  @return int     			1=exists, 0=does not exists, -1=error
     */
    public function is_in_spip($object)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Subscribe an email to all mailing-lists
     *
     *	@param	Adherent	$object		Object with data (->email, ->pass, ->element, ->type)
     *  @param	string		$listes    	To force mailing-list (string separated with ,)
     *  @return	int		  				Return integer <0 if KO, >=0 if OK
     */
    public function add_to_mailman($object, $listes = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Unsubscribe an email from all mailing-lists
     *  Used when a user is resiliated
     *
     *	@param	Adherent	$object		Object with data (->email, ->pass, ->element, ->type)
     *  @param	string	    $listes     To force mailing-list (string separated with ,)
     *  @return int         		    Return integer <0 if KO, >=0 if OK
     */
    public function del_to_mailman($object, $listes = '')
    {
    }
}