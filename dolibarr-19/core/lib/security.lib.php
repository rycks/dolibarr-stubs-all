<?php

/* Copyright (C) 2008-2021 Laurent Destailleur  <eldy@users.sourceforge.net>
 * Copyright (C) 2008-2021 Regis Houssin        <regis.houssin@inodbox.com>
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
 * Return a string of random bytes (hexa string) with length = $length fro cryptographic purposes.
 *
 * @param 	int			$length		Length of random string
 * @return	string					Random string
 */
function dolGetRandomBytes($length)
{
}
/**
 *	Encode a string with a symetric encryption. Used to encrypt sensitive data into database.
 *  Note: If a backup is restored onto another instance with a different $conf->file->instance_unique_id, then decoded value will differ.
 *  This function is called for example by dol_set_const() when saving a sensible data into database configuration table llx_const.
 *
 *	@param   string		$chain		String to encode
 *	@param   string		$key		If '', we use $conf->file->instance_unique_id (so $dolibarr_main_instance_unique_id in conf.php)
 *  @param	 string		$ciphering	Default ciphering algorithm
 *  @param	 string		$forceseed	To force the seed
 *	@return  string					encoded string
 *  @since v17
 *  @see dolDecrypt(), dol_hash()
 */
function dolEncrypt($chain, $key = '', $ciphering = 'AES-256-CTR', $forceseed = '')
{
}
/**
 *	Decode a string with a symetric encryption. Used to decrypt sensitive data saved into database.
 *  Note: If a backup is restored onto another instance with a different $conf->file->instance_unique_id, then decoded value will differ.
 *
 *	@param   string		$chain		string to decode
 *	@param   string		$key		If '', we use $conf->file->instance_unique_id
 *	@return  string					encoded string
 *  @since v17
 *  @see dolEncrypt(), dol_hash()
 */
function dolDecrypt($chain, $key = '')
{
}
/**
 * 	Returns a hash (non reversible encryption) of a string.
 *  If constant MAIN_SECURITY_HASH_ALGO is defined, we use this function as hashing function (recommanded value is 'password_hash')
 *  If constant MAIN_SECURITY_SALT is defined, we use it as a salt (used only if hashing algorightm is something else than 'password_hash').
 *
 * 	@param 		string		$chain		String to hash
 * 	@param		string		$type		Type of hash ('0':auto will use MAIN_SECURITY_HASH_ALGO else md5, '1':sha1, '2':sha1+md5, '3':md5, '4': for OpenLdap, '5':sha256, '6':password_hash).
 * 										Use 'md5' if hash is not needed for security purpose. For security need, prefer 'auto'.
 * 	@param 		string		$nosalt		Do not include any salt
 * 	@return		string					Hash of string
 *  @see getRandomPassword(), dol_verifyHash()
 */
function dol_hash($chain, $type = '0', $nosalt = 0)
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
 * 	@param		string		$type		Type of hash ('0':auto, '1':sha1, '2':sha1+md5, '3':md5, '4': for OpenLdap, '5':sha256). Use '3' here, if hash is not needed for security purpose, for security need, prefer '0'.
 * 	@return		bool					True if the computed hash is the same as the given one
 *  @see dol_hash()
 */
function dol_verifyHash($chain, $hash, $type = '0')
{
}
/**
 * 	Returns a specific ldap hash of a password.
 *
 * 	@param 		string		$password	Password to hash
 * 	@param		string		$type		Type of hash
 * 	@return		string					Hash of password
 */
function dolGetLdapPasswordHash($password, $type = 'md5')
{
}
/**
 *	Check permissions of a user to show a page and an object. Check read permission.
 * 	If GETPOST('action','aZ09') defined, we also check write and delete permission.
 *  This method check permission on module then call checkUserAccessToObject() for permission on object (according to entity and socid of user).
 *
 *	@param	User				$user      	  	User to check
 *	@param  string				$features	    Features to check (it must be module name or $object->element. Can be a 'or' check with 'levela|levelb'.
 *												Examples: 'societe', 'contact', 'produit&service', 'produit|service', ...)
 *												This is used to check permission $user->rights->features->...
 *	@param  int|string|Object	$object      	Object or Object ID or list of Object ID if we want to check a particular record (optional) is linked to a owned thirdparty (optional).
 *	@param  string				$tableandshare  'TableName&SharedElement' with Tablename is table where object is stored. SharedElement is an optional key to define where to check entity for multicompany module. Param not used if objectid is null (optional).
 *	@param  string				$feature2		Feature to check, second level of permission (optional). Can be a 'or' check with 'sublevela|sublevelb'.
 *												This is used to check permission $user->rights->features->feature2...
 *  @param  string				$dbt_keyfield   Field name for socid foreign key if not fk_soc. Not used if objectid is null (optional). Can use '' if NA.
 *  @param  string				$dbt_select     Field rowid name, for select into tableandshare if not "rowid". Not used if objectid is null (optional)
 *  @param	int					$isdraft		1=The object with id=$objectid is a draft
 *  @param	int					$mode			Mode (0=default, 1=return without dieing)
 * 	@return	int									If mode = 0 (default): Always 1, die process if not allowed. If mode = 1: Return 0 if access not allowed.
 *  @see dol_check_secure_access_document(), checkUserAccessToObject()
 */
function restrictedArea(\User $user, $features, $object = 0, $tableandshare = '', $feature2 = '', $dbt_keyfield = 'fk_soc', $dbt_select = 'rowid', $isdraft = 0, $mode = 0)
{
}
/**
 * Check that access by a given user to an object is ok.
 * This function is also called by restrictedArea() that check before if module is enabled and if permission of user for $action is ok.
 *
 * @param 	User				$user					User to check
 * @param 	array				$featuresarray			Features/modules to check. Example: ('user','service','member','project','task',...)
 * @param 	int|string|Object	$object					Full object or object ID or list of object id. For example if we want to check a particular record (optional) is linked to a owned thirdparty (optional).
 * @param 	string				$tableandshare			'TableName&SharedElement' with Tablename is table where object is stored. SharedElement is an optional key to define where to check entity for multicompany modume. Param not used if objectid is null (optional).
 * @param 	array|string		$feature2				Feature to check, second level of permission (optional). Can be or check with 'level1|level2'.
 * @param 	string				$dbt_keyfield			Field name for socid foreign key if not fk_soc. Not used if objectid is null (optional). Can use '' if NA.
 * @param 	string				$dbt_select				Field name for select if not rowid. Not used if objectid is null (optional).
 * @param 	string				$parenttableforentity  	Parent table for entity. Example 'fk_website@website'
 * @return	bool										True if user has access, False otherwise
 * @see restrictedArea()
 */
function checkUserAccessToObject($user, array $featuresarray, $object = 0, $tableandshare = '', $feature2 = '', $dbt_keyfield = '', $dbt_select = 'rowid', $parenttableforentity = '')
{
}
/**
 *	Show a message to say access is forbidden and stop program.
 *  This includes only HTTP header.
 *	Calling this function terminate execution of PHP.
 *
 *	@param	string		$message					Force error message
 *	@param	int			$http_response_code			HTTP response code
 *  @param	int			$stringalreadysanitized		1 if string is already sanitized with HTML entities
 *  @return	void
 *  @see accessforbidden()
 */
function httponly_accessforbidden($message = 1, $http_response_code = 403, $stringalreadysanitized = 0)
{
}
/**
 *	Show a message to say access is forbidden and stop program.
 *  This includes HTTP and HTML header and footer (except if $printheader and $printfooter is  0, use this case inside an already started page).
 *	Calling this function terminate execution of PHP.
 *
 *	@param	string		$message			Force error message
 *	@param	int			$printheader		Show header before
 *  @param  int			$printfooter        Show footer after
 *  @param  int			$showonlymessage    Show only message parameter. Otherwise add more information.
 *  @param  array|null  $params         	More parameters provided to hook
 *  @return	void
 *  @see httponly_accessforbidden()
 */
function accessforbidden($message = '', $printheader = 1, $printfooter = 1, $showonlymessage = 0, $params = \null)
{
}
/**
 *	Return the max allowed for file upload.
 *  Analyze among: upload_max_filesize, post_max_size, MAIN_UPLOAD_DOC
 *
 *  @return	array		Array with all max size for file upload
 */
function getMaxFileSizeArray()
{
}