<?php

/* Copyright (C) 2008-2011 Laurent Destailleur  <eldy@users.sourceforge.net>
 * Copyright (C) 2008-2017 Regis Houssin        <regis.houssin@inodbox.com>
 * Copyright (C) 2020	   Ferran Marcet        <fmarcet@2byte.es>
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
 *  \file		htdocs/core/lib/security.lib.php
 *  \ingroup    core
 *  \brief		Set of function used for dolibarr security (common function included into filefunc.inc.php)
 *  			Warning, this file must not depends on other library files, except function.lib.php
 *  			because it is used at low code level.
 */
/**
 *	Encode a string with base 64 algorithm + specific delta change.
 *
 *	@param   string		$chain		string to encode
 *	@param   string		$key		rule to use for delta ('0', '1' or 'myownkey')
 *	@return  string					encoded string
 *  @see dol_decode()
 */
function dol_encode($chain, $key = '1')
{
}
/**
 *	Decode a base 64 encoded + specific delta change.
 *  This function is called by filefunc.inc.php at each page call.
 *
 *	@param   string		$chain		string to decode
 *	@param   string		$key		rule to use for delta ('0', '1' or 'myownkey')
 *	@return  string					decoded string
 *  @see dol_encode()
 */
function dol_decode($chain, $key = '1')
{
}
/**
 * 	Returns a hash of a string.
 *  If constant MAIN_SECURITY_HASH_ALGO is defined, we use this function as hashing function (recommanded value is 'password_hash')
 *  If constant MAIN_SECURITY_SALT is defined, we use it as a salt (used only if hashing algorightm is something else than 'password_hash').
 *
 * 	@param 		string		$chain		String to hash
 * 	@param		string		$type		Type of hash ('0':auto will use MAIN_SECURITY_HASH_ALGO else md5, '1':sha1, '2':sha1+md5, '3':md5, '4':md5 for OpenLdap with no salt, '5':sha256). Use '3' here, if hash is not needed for security purpose, for security need, prefer '0'.
 * 	@return		string					Hash of string
 *  @see getRandomPassword()
 */
function dol_hash($chain, $type = '0')
{
}
/**
 * 	Compute a hash and compare it to the given one
 *  For backward compatibility reasons, if the hash is not in the password_hash format, we will try to match against md5 and sha1md5
 *  If constant MAIN_SECURITY_HASH_ALGO is defined, we use this function as hashing function.
 *  If constant MAIN_SECURITY_SALT is defined, we use it as a salt.
 *
 * 	@param 		string		$chain		String to hash (not hashed string)
 * 	@param 		string		$hash		hash to compare
 * 	@param		string		$type		Type of hash ('0':auto, '1':sha1, '2':sha1+md5, '3':md5, '4':md5 for OpenLdap, '5':sha256). Use '3' here, if hash is not needed for security purpose, for security need, prefer '0'.
 * 	@return		bool					True if the computed hash is the same as the given one
 */
function dol_verifyHash($chain, $hash, $type = '0')
{
}
/**
 *	Check permissions of a user to show a page and an object. Check read permission.
 * 	If GETPOST('action','aZ09') defined, we also check write and delete permission.
 *
 *	@param	User	$user      	  	User to check
 *	@param  string	$features	    Features to check (it must be module $object->element. Examples: 'societe', 'contact', 'produit&service', 'produit|service', ...)
 *	@param  int		$objectid      	Object ID if we want to check a particular record (optional) is linked to a owned thirdparty (optional).
 *	@param  string	$tableandshare  'TableName&SharedElement' with Tablename is table where object is stored. SharedElement is an optional key to define where to check entity for multicompany modume. Param not used if objectid is null (optional).
 *	@param  string	$feature2		Feature to check, second level of permission (optional). Can be a 'or' check with 'sublevela|sublevelb'.
 *  @param  string	$dbt_keyfield   Field name for socid foreign key if not fk_soc. Not used if objectid is null (optional)
 *  @param  string	$dbt_select     Field name for select if not rowid. Not used if objectid is null (optional)
 *  @param	int		$isdraft		1=The object with id=$objectid is a draft
 * 	@return	int						Always 1, die process if not allowed
 *  @see dol_check_secure_access_document()
 */
function restrictedArea($user, $features, $objectid = 0, $tableandshare = '', $feature2 = '', $dbt_keyfield = 'fk_soc', $dbt_select = 'rowid', $isdraft = 0)
{
}
/**
 * Check access by user to object.
 * This function is also called by restrictedArea
 *
 * @param User			$user			User to check
 * @param array			$featuresarray	Features/modules to check. Example: ('user','service','member','project','task',...)
 * @param int|string	$objectid		Object ID if we want to check a particular record (optional) is linked to a owned thirdparty (optional).
 * @param string		$tableandshare	'TableName&SharedElement' with Tablename is table where object is stored. SharedElement is an optional key to define where to check entity for multicompany modume. Param not used if objectid is null (optional).
 * @param string		$feature2		Feature to check, second level of permission (optional). Can be or check with 'level1|level2'.
 * @param string		$dbt_keyfield	Field name for socid foreign key if not fk_soc. Not used if objectid is null (optional)
 * @param string		$dbt_select		Field name for select if not rowid. Not used if objectid is null (optional)
 * @return	bool						True if user has access, False otherwise
 * @see restrictedArea()
 */
function checkUserAccessToObject($user, $featuresarray, $objectid = 0, $tableandshare = '', $feature2 = '', $dbt_keyfield = '', $dbt_select = 'rowid')
{
}
/**
 *	Show a message to say access is forbidden and stop program
 *	Calling this function terminate execution of PHP.
 *
 *	@param	string		$message			Force error message
 *	@param	int			$printheader		Show header before
 *  @param  int			$printfooter        Show footer after
 *  @param  int			$showonlymessage    Show only message parameter. Otherwise add more information.
 *  @param  array|null  $params         	Send params
 *  @return	void
 */
function accessforbidden($message = '', $printheader = 1, $printfooter = 1, $showonlymessage = 0, $params = \null)
{
}