<?php

/* Copyright (C) 2004		Rodolphe Quiedeville <rodolphe@quiedeville.org>
 * Copyright (C) 2004		Benoit Mortier       <benoit.mortier@opensides.be>
 * Copyright (C) 2005-2021	Regis Houssin        <regis.houssin@inodbox.com>
 * Copyright (C) 2006-2021	Laurent Destailleur  <eldy@users.sourceforge.net>
 * Copyright (C) 2024		William Mead		<william.mead@manchenumerique.fr>
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
 *  @phan-file-suppress PhanTypeMismatchArgumentInternal (notifications concern 'resource)
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
     * @var array Servers (IP addresses or hostnames)
     */
    public $server = array();
    /**
     * @var string Current connected server
     */
    public $connectedServer;
    /**
     * @var int server port
     */
    public $serverPort;
    /**
     * @var string Base DN (e.g. "dc=foo,dc=com")
     */
    public $dn;
    /**
     * @var string Server type: OpenLDAP or Active Directory
     */
    public $serverType;
    /**
     * @var string LDAP protocol version
     */
    public $ldapProtocolVersion;
    /**
     * @var string Server DN
     */
    public $domain;
    /**
     * @var string Server FQDN
     */
    public $domainFQDN;
    /**
     * @var bool LDAP bind
     */
    public $bind;
    /**
     * @var string LDAP administrator user
     * Active Directory does not allow anonymous connections
     */
    public $searchUser;
    /**
     * @var string LDAP administrator password
     * Active Directory does not allow anonymous connections
     */
    public $searchPassword;
    /**
     * @var string Users DN
     */
    public $people;
    /**
     * @var string Groups DN
     */
    public $groups;
    /**
     * @var int|null Error code provided by the LDAP server
     */
    public $ldapErrorCode;
    /**
     * @var string|null Error text message
     */
    public $ldapErrorText;
    /**
     * @var string
     */
    public $filter;
    /**
     * @var string
     */
    public $filtergroup;
    /**
     * @var string
     */
    public $filtermember;
    /**
     * @var string attr_login
     */
    public $attr_login;
    /**
     * @var string attr_sambalogin
     */
    public $attr_sambalogin;
    /**
     * @var string attr_name
     */
    public $attr_name;
    /**
     * @var string attr_firstname
     */
    public $attr_firstname;
    /**
     * @var string attr_mail
     */
    public $attr_mail;
    /**
     * @var string attr_phone
     */
    public $attr_phone;
    /**
     * @var string attr_fax
     */
    public $attr_fax;
    /**
     * @var string attr_mobile
     */
    public $attr_mobile;
    /**
     * @var int badpwdtime
     */
    public $badpwdtime;
    /**
     * @var string LDAP user DN
     */
    public $ldapUserDN;
    /**
     * @var string Fetched username
     */
    public $name;
    /**
     * @var string Fetched user first name
     */
    public $firstname;
    /**
     * @var string Fetched user login
     */
    public $login;
    /**
     * @var string Fetched user phone number
     */
    public $phone;
    /**
     * @var string Fetched user fax number
     */
    public $fax;
    /**
     * @var string Fetched user email
     */
    public $mail;
    /**
     * @var string Fetched user mobile number
     */
    public $mobile;
    /**
     * @var array UserAccountControl Flags
     */
    public $uacf;
    /**
     * @var int Password last set time
     */
    public $pwdlastset;
    /**
     * @var string LDAP charset.
     * LDAP should be UTF-8 encoded
     */
    public $ldapcharset = 'UTF-8';
    /**
     * @var bool|resource The internal LDAP connection handle
     */
    public $connection;
    /**
     * @var bool|resource Result of any connections or search.
     */
    public $result;
    /**
     * @var int No LDAP synchronization
     */
    const SYNCHRO_NONE = 0;
    /**
     * @var int Dolibarr to LDAP synchronization
     */
    const SYNCHRO_DOLIBARR_TO_LDAP = 1;
    /**
     * @var int LDAP to Dolibarr synchronization
     */
    const SYNCHRO_LDAP_TO_DOLIBARR = 2;
    /**
     *  Constructor
     */
    public function __construct()
    {
    }
    // Connection handling methods -------------------------------------------
    /**
     * Connect and bind
     * Use this->server, this->serverPort, this->ldapProtocolVersion, this->serverType, this->searchUser, this->searchPassword
     * After return, this->connection and $this->bind are defined
     *
     * @see connect_bind renamed
     * @return		int		if KO: <0 || if bind anonymous: 1 || if bind auth: 2
     */
    public function connectBind()
    {
    }
    /**
     * Simply closes the connection set up earlier. Returns true if OK, false if there was an error.
     * This method seems a duplicate/alias of unbind().
     *
     * @return	boolean			true or false
     * @deprecated ldap_close is an alias of ldap_unbind, so use unbind() instead.
     * @see unbind()
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
     * Unbind of LDAP server (close connection).
     *
     * @return	boolean					true or false
     * @see close()
     */
    public function unbind()
    {
    }
    /**
     * Verify LDAP server version
     *
     * @return	int		version
     */
    public function getVersion()
    {
    }
    /**
     * Set LDAP protocol version.
     * LDAP_OPT_PROTOCOL_VERSION is a constant equal to 3
     *
     * @return	boolean		if set LDAP option OK: true, if KO: false
     */
    public function setVersion()
    {
    }
    /**
     * Set LDAP size limit.
     *
     * @return	boolean		if set LDAP option OK: true, if KO: false
     */
    public function setSizeLimit()
    {
    }
    /**
     * Set LDAP referrals.
     * LDAP_OPT_REFERRALS is a constant equal to ?
     *
     * @return	boolean		if set LDAP option OK: true, if KO: false
     */
    public function setReferrals()
    {
    }
    /**
     * 	Add an LDAP entry
     *	LDAP object connect and bind must have been done
     *
     *	@param	string	$dn			DN entry key
     *	@param	array	$info		Attributes array
     *	@param	User	$user		Object user that create
     *	@return	int					if KO: <0 || if OK: >0
     */
    public function add($dn, $info, $user)
    {
    }
    /**
     * 	Modify an LDAP entry
     *	LDAP object connect and bind must have been done
     *
     *	@param	string		$dn			DN entry key
     *	@param	array		$info		Attributes array
     *	@param	User		$user		Object user that modify
     *	@return	int						if KO: <0 || if OK: >0
     */
    public function modify($dn, $info, $user)
    {
    }
    /**
     * 	Rename an LDAP entry
     *	LDAP object connect and bind must have been done
     *
     *	@param	string		$dn				Old DN entry key (uid=qqq,ou=xxx,dc=aaa,dc=bbb) (before update)
     *	@param	string		$newrdn			New RDN entry key (uid=qqq)
     *	@param	string		$newparent		New parent (ou=xxx,dc=aaa,dc=bbb)
     *	@param	User		$user			Object user that modify
     *	@param	bool		$deleteoldrdn	If true the old RDN value(s) is removed, else the old RDN value(s) is retained as non-distinguished values of the entry.
     *	@return	int							if KO: <0 || if OK: >0
     */
    public function rename($dn, $newrdn, $newparent, $user, $deleteoldrdn = \true)
    {
    }
    /**
     *  Modify an LDAP entry (to use if dn != olddn)
     *  LDAP object connect and bind must have been done
     *
     *  @param	string	$dn			DN entry key
     *  @param	array	$info		Attributes array
     *  @param	User	$user		Object user that update
     * 	@param	string	$olddn		Old DN entry key (before update)
     * 	@param	string	$newrdn		New RDN entry key (uid=qqq) (for ldap_rename)
     *	@param	string	$newparent	New parent (ou=xxx,dc=aaa,dc=bbb) (for ldap_rename)
     *	@return	int					if KO: <0 || if OK: >0
     */
    public function update($dn, $info, $user, $olddn, $newrdn = '', $newparent = '')
    {
    }
    /**
     * 	Delete an LDAP entry
     *	LDAP object connect and bind must have been done
     *
     *	@param	string	$dn			DN entry key
     *	@return	int					if KO: <0 || if OK: >0
     */
    public function delete($dn)
    {
    }
    /**
     * Build an LDAP message
     *
     * @see dump_content renamed
     * @param	string		$dn			DN entry key
     * @param	array		$info		Attributes array
     * @return	string					Content of file
     */
    public function dumpContent($dn, $info)
    {
    }
    /**
     * 	Dump an LDAP message to ldapinput.in file
     *
     *	@param	string		$dn			DN entry key
     *	@param	array		$info		Attributes array
     *	@return	int						if KO: <0 || if OK: >0
     */
    public function dump($dn, $info)
    {
    }
    /**
     * Ping a server before ldap_connect for avoid waiting
     *
     * @param	string	$host		Server host or address
     * @param	int		$port		Server port (default 389)
     * @param	int		$timeout	Timeout in second (default 1s)
     * @return	boolean				true or false
     */
    public function serverPing($host, $port = 389, $timeout = 1)
    {
    }
    // Attribute methods -----------------------------------------------------
    /**
     * 	Add an LDAP attribute in entry
     *	LDAP object connect and bind must have been done
     *
     *	@param	string		$dn			DN entry key
     *	@param	array		$info		Attributes array
     *	@param	User		$user		Object user that create
     *	@return	int						if KO: <0 || if OK: >0
     */
    public function addAttribute($dn, $info, $user)
    {
    }
    /**
     * 	Update an LDAP attribute in entry
     *	LDAP object connect and bind must have been done
     *
     *	@param	string		$dn			DN entry key
     *	@param	array		$info		Attributes array
     *	@param	User		$user		Object user that create
     *	@return	int						if KO: <0 || if OK: >0
     */
    public function updateAttribute($dn, $info, $user)
    {
    }
    /**
     * 	Delete an LDAP attribute in entry
     *	LDAP object connect and bind must have been done
     *
     *	@param	string		$dn			DN entry key
     *	@param	array		$info		Attributes array
     *	@param	User		$user		Object user that create
     *	@return	int						if KO: <0 || if OK: >0
     */
    public function deleteAttribute($dn, $info, $user)
    {
    }
    /**
     *  Returns an array containing attributes and values for first record
     *
     *	@param	string	$dn			DN entry key
     *	@param	string	$filter		Filter
     *	@return	int|array			if KO: <=0 || if OK: array
     */
    public function getAttribute($dn, $filter)
    {
    }
    /**
     *  Returns an array containing values for an attribute and for first record matching filterrecord
     *
     * 	@param	string			$filterrecord		Record
     * 	@param	string			$attribute			Attributes
     * 	@return	array|boolean
     */
    public function getAttributeValues($filterrecord, $attribute)
    {
    }
    /**
     *	Returns an array containing a details or list of LDAP record(s).
     *	ldapsearch -LLLx -hlocalhost -Dcn=admin,dc=parinux,dc=org -w password -b "ou=adherents,ou=people,dc=parinux,dc=org" userPassword
     *
     *	@param	string	$search			 	Value of field to search, '*' for all. Not used if $activefilter is set.
     *	@param	string	$userDn			 	DN (Ex: ou=adherents,ou=people,dc=parinux,dc=org)
     *	@param	string	$useridentifier 	Name of key field (Ex: uid).
     *	@param	array	$attributeArray 	Array of fields required. Note this array must also contain field $useridentifier (Ex: sn,userPassword)
     *	@param	int		$activefilter		'1' or 'user'=use field this->filter as filter instead of parameter $search, 'group'=use field this->filtergroup as filter, 'member'=use field this->filtermember as filter
     *	@param	array	$attributeAsArray 	Array of fields wanted as an array not a string
     *	@return	array|int					if KO: <0 || if OK: array of [id_record][ldap_field]=value
     */
    public function getRecords($search, $userDn, $useridentifier, $attributeArray, $activefilter = 0, $attributeAsArray = array())
    {
    }
    /**
     *	Converts a little-endian hex-number to one, that 'hexdec' can convert
     *	Required by Active Directory
     *
     *	@param	string		$hex			Hex value
     *	@return	string						Little endian
     */
    public function littleEndian($hex)
    {
    }
    /**
     *	Gets LDAP user SID.
     *	Required by Active Directory
     *
     *	@param	string		$ldapUser		User login
     *	@return	int|string					if SID OK: SID string, if KO: -1
     */
    public function getObjectSid($ldapUser)
    {
    }
    /**
     * Returns the textual SID
     * Required by Active Directory
     *
     * @param	string	$binsid		Binary SID
     * @return	string				Textual SID
     */
    public function binSIDtoText($binsid)
    {
    }
    /**
     * 	Search method with filter
     * 	this->connection must be defined. The bind or bindauth methods must already have been called.
     * 	Do not use for search of a given properties list because of upper-lower case conflict.
     *	Only use for pages.
     *	'Fiche LDAP' shows readable fields by default.
     * 	@see bind
     * 	@see bindauth
     *
     * 	@param	string		$checkDn		Search DN (Ex: ou=users,cn=my-domain,cn=com)
     * 	@param 	string		$filter			Search filter (ex: (sn=name_person) )
     *	@return	array|int					Array with answers (lowercase key - value)
     */
    public function search($checkDn, $filter)
    {
    }
    /**
     * 	Load all attributes of an LDAP user
     *
     * 	@param	User|string	$user		Not used.
     * 	@param 	string		$filter		Filter for search. Must start with &.
     *  								Examples: &(objectClass=inetOrgPerson) &(objectClass=user)(objectCategory=person) &(isMemberOf=cn=Sales,ou=Groups,dc=opencsi,dc=com)
     *	@return	int						if KO: <0 || if OK: > 0
     */
    public function fetch($user, $filter)
    {
    }
    // helper methods
    /**
     * 	Returns the correct user identifier to use, based on the LDAP server type
     *
     *	@return	string 				Login
     */
    public function getUserIdentifier()
    {
    }
    /**
     * 	UserAccountControl Flags to more human understandable form...
     *
     *	@param	string		$uacf		UACF
     *	@return	array
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
    /**
     *	Converts ActiveDirectory time to Unix timestamp
     *
     *	@param	string	$value		AD time to convert
     *	@return	integer				Unix timestamp
     */
    public function convertTime($value)
    {
    }
    /**
     *  Convert a string into output/memory charset
     *
     *  @param	string	$str			String to convert
     *  @param	string	$pagecodefrom	Page code of src string
     *  @return	string					Converted string
     */
    private function convToOutputCharset($str, $pagecodefrom = 'UTF-8')
    {
    }
    /**
     *  Convert a string from output/memory charset
     *
     *  @param	string	$str			String to convert
     *  @param	string	$pagecodeto		Page code for result string
     *  @return	string					Converted string
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