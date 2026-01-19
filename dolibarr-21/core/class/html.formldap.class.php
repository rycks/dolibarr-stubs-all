<?php

/**
 *      Class to manage generation of HTML components for ldap module
 */
class FormLdap
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
     *	Constructor
     *
     *  @param		DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *  Return list of types of hash
     *
     *  @param	string		$selected		Preselected type
     *	@param  string		$htmlname		Name of field in form
     * 	@param	int			$showempty		Add an empty field
     *  @return	string						HTML select string
     */
    public function selectLdapPasswordHashType($selected = 'md5', $htmlname = 'ldaphashtype', $showempty = 0)
    {
    }
    /**
     *	Return list of type of synchronization
     *
     *	@param	int			$selected		Preselected type
     *	@param  string		$htmlname		Name of field in form
     *	@param	string[]	$exclude		Exclude values from the list
     *	@param	int<0,3>	$scriptonly		Add warning if synchro only work with a script (0 = disable, 1 = Dolibarr2ldap, 2 = ldap2dolibarr, 3 = all)
     * 	@param	int			$showempty		Add an empty field
     *  @return	string						HTML select string
     */
    public function selectLdapDnSynchroActive($selected = 0, $htmlname = 'activesynchro', $exclude = array(), $scriptonly = 0, $showempty = 0)
    {
    }
    /**
     *  Return list of ldap server types
     *
     *  @param	string		$selected		Preselected type
     *	@param  string		$htmlname		Name of field in form
     * 	@param	int			$showempty		Add an empty field
     *  @return	string						HTML select string
     */
    public function selectLdapServerType($selected = 'openldap', $htmlname = 'type', $showempty = 0)
    {
    }
    /**
     *  Return list of ldap server protocol version
     *
     *  @param	string		$selected		Preselected type
     *	@param  string		$htmlname		Name of field in form
     * 	@param	int			$showempty		Add an empty field
     *  @return	string						HTML select string
     */
    public function selectLdapServerProtocolVersion($selected = '3', $htmlname = 'ldapprotocolversion', $showempty = 0)
    {
    }
}