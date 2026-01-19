<?php

/* Copyright (C) 2004		Rodolphe Quiedeville <rodolphe@quiedeville.org>
 * Copyright (C) 2004		Benoit Mortier       <benoit.mortier@opensides.be>
 * Copyright (C) 2005-2017	Regis Houssin        <regis.houssin@inodbox.com>
 * Copyright (C) 2006-2015	Laurent Destailleur  <eldy@users.sourceforge.net>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <https://www.gnu.org/licenses/>.
 * or see https://www.gnu.org/
 */
/**
 *	\file 		htdocs/core/class/ldap.class.php
 *	\brief 		File of class to manage LDAP features
 *
 *  Note:
 *  LDAP_ESCAPE_FILTER is to escape char  array('\\', '*', '(', ')', "\x00")
 *  LDAP_ESCAPE_DN is to escape char  array('\\', ',', '=', '+', '<', '>', ';', '"', '#')
 */
/**
 *	Class to manage LDAP features
 */
class Ldap
{
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * @var string[]	Array of error strings
     */
    public $errors = array();
    /**
     * Tableau des serveurs (IP addresses ou nom d'hotes)
     */
    public $server = array();
    /**
     * Base DN (e.g. "dc=foo,dc=com")
     */
    public $dn;
    /**
     * type de serveur, actuellement OpenLdap et Active Directory
     */
    public $serverType;
    /**
     * Version du protocole ldap
     */
    public $ldapProtocolVersion;
    /**
     * Server DN
     */
    public $domain;
    /**
     * User administrateur Ldap
     * Active Directory ne supporte pas les connexions anonymes
     */
    public $searchUser;
    /**
     * Mot de passe de l'administrateur
     * Active Directory ne supporte pas les connexions anonymes
     */
    public $searchPassword;
    /**
     *  DN des utilisateurs
     */
    public $people;
    /**
     * DN des groupes
     */
    public $groups;
    /**
     * Code erreur retourne par le serveur Ldap
     */
    public $ldapErrorCode;
    /**
     * Message texte de l'erreur
     */
    public $ldapErrorText;
    //Fetch user
    public $name;
    public $firstname;
    public $login;
    public $phone;
    public $skype;
    public $fax;
    public $mail;
    public $mobile;
    public $uacf;
    public $pwdlastset;
    public $ldapcharset = 'UTF-8';
    // LDAP should be UTF-8 encoded
    /**
     * The internal LDAP connection handle
     */
    public $connection;
    /**
     * Result of any connections etc.
     */
    public $result;
    /**
     *  Constructor
     */
    public function __construct()
    {
    }
    // Connection handling methods -------------------------------------------
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Connect and bind
     * 	Use this->server, this->serverPort, this->ldapProtocolVersion, this->serverType, this->searchUser, this->searchPassword
     * 	After return, this->connection and $this->bind are defined
     *
     *	@return		int		<0 if KO, 1 if bind anonymous, 2 if bind auth
     */
    public function connect_bind()
    {
    }
    /**
     * Simply closes the connection set up earlier.
     * Returns true if OK, false if there was an error.
     *
     * @return	boolean			true or false
     */
    public function close()
    {
    }
    /**
     * Anonymously binds to the connection. After this is done,
     * queries and searches can be done - but read-only.
     *
     * @return	boolean			true or false
     */
    public function bind()
    {
    }
    /**
     * Binds as an authenticated user, which usually allows for write
     * access. The FULL dn must be passed. For a directory manager, this is
     * "cn=Directory Manager" under iPlanet. For a user, it will be something
     * like "uid=jbloggs,ou=People,dc=foo,dc=com".
     *
     * @param	string	$bindDn			DN
     * @param	string	$pass			Password
     * @return	boolean					true or false
     */
    public function bindauth($bindDn, $pass)
    {
    }
    /**
     * Unbind du serveur ldap.
     *
     * @return	boolean					true or false
     */
    public function unbind()
    {
    }
    /**
     * Verification de la version du serveur ldap.
     *
     * @return	string					version
     */
    public function getVersion()
    {
    }
    /**
     * Change ldap protocol version to use.
     *
     * @return	boolean                 version
     */
    public function setVersion()
    {
    }
    /**
     * changement du referrals.
     *
     * @return	boolean                 referrals
     */
    public function setReferrals()
    {
    }
    /**
     * 	Add a LDAP entry
     *	Ldap object connect and bind must have been done
     *
     *	@param	string	$dn			DN entry key
     *	@param	array	$info		Attributes array
     *	@param	User		$user		Objet user that create
     *	@return	int					<0 if KO, >0 if OK
     */
    public function add($dn, $info, $user)
    {
    }
    /**
     * 	Modify a LDAP entry
     *	Ldap object connect and bind must have been done
     *
     *	@param	string		$dn			DN entry key
     *	@param	array		$info		Attributes array
     *	@param	User		$user		Objet user that modify
     *	@return	int						<0 if KO, >0 if OK
     */
    public function modify($dn, $info, $user)
    {
    }
    /**
     * 	Rename a LDAP entry
     *	Ldap object connect and bind must have been done
     *
     *	@param	string		$dn				Old DN entry key (uid=qqq,ou=xxx,dc=aaa,dc=bbb) (before update)
     *	@param	string		$newrdn			New RDN entry key (uid=qqq)
     *	@param	string		$newparent		New parent (ou=xxx,dc=aaa,dc=bbb)
     *	@param	User			$user			Objet user that modify
     *	@param	bool			$deleteoldrdn	If true the old RDN value(s) is removed, else the old RDN value(s) is retained as non-distinguished values of the entry.
     *	@return	int							<0 if KO, >0 if OK
     */
    public function rename($dn, $newrdn, $newparent, $user, $deleteoldrdn = \true)
    {
    }
    /**
     *  Modify a LDAP entry (to use if dn != olddn)
     *  Ldap object connect and bind must have been done
     *
     *  @param	string	$dn			DN entry key
     *  @param	array	$info		Attributes array
     *  @param	User		$user		Objet user that update
     * 	@param	string	$olddn		Old DN entry key (before update)
     * 	@param	string	$newrdn		New RDN entry key (uid=qqq) (for ldap_rename)
     *	@param	string	$newparent	New parent (ou=xxx,dc=aaa,dc=bbb) (for ldap_rename)
     *	@return	int					<0 if KO, >0 if OK
     */
    public function update($dn, $info, $user, $olddn, $newrdn = \false, $newparent = \false)
    {
    }
    /**
     * 	Delete a LDAP entry
     *	Ldap object connect and bind must have been done
     *
     *	@param	string	$dn			DN entry key
     *	@return	int					<0 if KO, >0 if OK
     */
    public function delete($dn)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Build a LDAP message
     *
     *	@param	string		$dn			DN entry key
     *	@param	array		$info		Attributes array
     *	@return	string					Content of file
     */
    public function dump_content($dn, $info)
    {
    }
    /**
     * 	Dump a LDAP message to ldapinput.in file
     *
     *	@param	string		$dn			DN entry key
     *	@param	array		$info		Attributes array
     *	@return	int						<0 if KO, >0 if OK
     */
    public function dump($dn, $info)
    {
    }
    /**
     * Ping a server before ldap_connect for avoid waiting
     *
     * @param string	$host		Server host or address
     * @param int		$port		Server port (default 389)
     * @param int		$timeout	Timeout in second (default 1s)
     * @return boolean				true or false
     */
    public function serverPing($host, $port = 389, $timeout = 1)
    {
    }
    // Attribute methods -----------------------------------------------------
    /**
     * 	Add a LDAP attribute in entry
     *	Ldap object connect and bind must have been done
     *
     *	@param	string		$dn			DN entry key
     *	@param	array		$info		Attributes array
     *	@param	User		$user		Objet user that create
     *	@return	int						<0 if KO, >0 if OK
     */
    public function addAttribute($dn, $info, $user)
    {
    }
    /**
     * 	Update a LDAP attribute in entry
     *	Ldap object connect and bind must have been done
     *
     *	@param	string		$dn			DN entry key
     *	@param	array		$info		Attributes array
     *	@param	User		$user		Objet user that create
     *	@return	int						<0 if KO, >0 if OK
     */
    public function updateAttribute($dn, $info, $user)
    {
    }
    /**
     * 	Delete a LDAP attribute in entry
     *	Ldap object connect and bind must have been done
     *
     *	@param	string		$dn			DN entry key
     *	@param	array		$info		Attributes array
     *	@param	User		$user		Objet user that create
     *	@return	int						<0 if KO, >0 if OK
     */
    public function deleteAttribute($dn, $info, $user)
    {
    }
    /**
     *  Returns an array containing attributes and values for first record
     *
     *	@param	string	$dn			DN entry key
     *	@param	string	$filter		Filter
     *	@return	int|array			<0 or false if KO, array if OK
     */
    public function getAttribute($dn, $filter)
    {
    }
    /**
     *  Returns an array containing values for an attribute and for first record matching filterrecord
     *
     * 	@param	string	$filterrecord		Record
     * 	@param	string	$attribute			Attributes
     * 	@return void
     */
    public function getAttributeValues($filterrecord, $attribute)
    {
    }
    /**
     * 	Returns an array containing a details or list of LDAP record(s)
     * 	ldapsearch -LLLx -hlocalhost -Dcn=admin,dc=parinux,dc=org -w password -b "ou=adherents,ou=people,dc=parinux,dc=org" userPassword
     *
     *	@param	string	$search			 	Value of field to search, '*' for all. Not used if $activefilter is set.
     *	@param	string	$userDn			 	DN (Ex: ou=adherents,ou=people,dc=parinux,dc=org)
     *	@param	string	$useridentifier 	Name of key field (Ex: uid)
     *	@param	array	$attributeArray 	Array of fields required. Note this array must also contains field $useridentifier (Ex: sn,userPassword)
     *	@param	int		$activefilter		'1' or 'user'=use field this->filter as filter instead of parameter $search, 'group'=use field this->filtergroup as filter, 'member'=use field this->filtermember as filter
     *	@param	array	$attributeAsArray 	Array of fields wanted as an array not a string
     *	@return	array						Array of [id_record][ldap_field]=value
     */
    public function getRecords($search, $userDn, $useridentifier, $attributeArray, $activefilter = 0, $attributeAsArray = array())
    {
    }
    /**
     *  Converts a little-endian hex-number to one, that 'hexdec' can convert
     *	Required by Active Directory
     *
     *	@param	string		$hex			Hex value
     *	@return	string						Little endian
     */
    public function littleEndian($hex)
    {
    }
    /**
     *  Recupere le SID de l'utilisateur
     *	Required by Active Directory
     *
     * 	@param	string		$ldapUser		Login de l'utilisateur
     * 	@return	string						Sid
     */
    public function getObjectSid($ldapUser)
    {
    }
    /**
     * Returns the textual SID
     * Indispensable pour Active Directory
     *
     * @param	string	$binsid		Binary SID
     * @return	string				Textual SID
     */
    public function binSIDtoText($binsid)
    {
    }
    /**
     * 	Fonction de recherche avec filtre
     *	this->connection doit etre defini donc la methode bind ou bindauth doit avoir deja ete appelee
     *	Ne pas utiliser pour recherche d'une liste donnee de proprietes
     *	car conflit majuscule-minuscule. A n'utiliser que pour les pages
     *	'Fiche LDAP' qui affiche champ lisibles par defaut.
     *
     * 	@param	string		$checkDn		DN de recherche (Ex: ou=users,cn=my-domain,cn=com)
     * 	@param 	string		$filter			Search filter (ex: (sn=nom_personne) )
     *	@return	array|int					Array with answers (key lowercased - value)
     */
    public function search($checkDn, $filter)
    {
    }
    /**
     * 		Load all attribute of a LDAP user
     *
     * 		@param	User	$user		User to search for. Not used if a filter is provided.
     *      @param  string	$filter		Filter for search. Must start with &.
     *                       	       	Examples: &(objectClass=inetOrgPerson) &(objectClass=user)(objectCategory=person) &(isMemberOf=cn=Sales,ou=Groups,dc=opencsi,dc=com)
     *		@return	int					>0 if OK, <0 if KO
     */
    public function fetch($user, $filter)
    {
    }
    // helper methods
    /**
     * 	Returns the correct user identifier to use, based on the ldap server type
     *
     *	@return	string 				Login
     */
    public function getUserIdentifier()
    {
    }
    /**
     * 	UserAccountControl Flgs to more human understandable form...
     *
     *	@param	string		$uacf		UACF
     *	@return	void
     */
    public function parseUACF($uacf)
    {
    }
    /**
     * 	SamAccountType value to text
     *
     *	@param	string	$samtype	SamType
     *	@return	string				Sam string
     */
    public function parseSAT($samtype)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Convertit le temps ActiveDirectory en Unix timestamp
     *
     *	@param	string	$value		AD time to convert
     *	@return	integer				Unix timestamp
     */
    public function convert_time($value)
    {
    }
    /**
     *  Convert a string into output/memory charset
     *
     *  @param	string	$str            String to convert
     *  @param	string	$pagecodefrom	Page code of src string
     *  @return string         			Converted string
     */
    private function convToOutputCharset($str, $pagecodefrom = 'UTF-8')
    {
    }
    /**
     *  Convert a string from output/memory charset
     *
     *  @param	string	$str            String to convert
     *  @param	string	$pagecodeto		Page code for result string
     *  @return string         			Converted string
     */
    public function convFromOutputCharset($str, $pagecodeto = 'UTF-8')
    {
    }
    /**
     *	Return available value of group GID
     *
     *	@param	string	$keygroup	Key of group
     *	@return	int					gid number
     */
    public function getNextGroupGid($keygroup = 'LDAP_KEY_GROUPS')
    {
    }
}