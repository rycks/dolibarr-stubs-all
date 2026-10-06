<?php

/**
 *	Encode a string with base 64 algorithm + specific delta change.
 *
 *	@param   string		$chain		string to encode
 *	@param   string		$key		rule to use for delta ('0', '1' or 'myownkey')
 *	@return  string					encoded string with format 'passcrypted'
 *  @see dol_decode(), dolEncrypt()
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
 *  @see dol_encode(), dolDecrypt
 */
function dol_decode($chain, $key = '1')
{
}
/**
 * Return a string of random bytes (hexa string) with length = $length for cryptographic purposes.
 *
 * @param 	int			$length		Length of random string
 * @return	string					Random string
 */
function dolGetRandomBytes($length)
{
}
/**
 * 	Returns a specific ldap hash of a password.
 *
 * 	@param 		string		$password	Password to hash
 * 	@param		'md5'|'md5frommd5'|'smd5'|'sha'|'ssha'|'sha256'|'ssha256'|'sha384'|'ssha384'|'sha512'|'ssha512'|'crypt'|'clear'		$type		Type of hash
 * 	@return		string					Hash of password
 */
function dolGetLdapPasswordHash($password, $type = 'md5')
{
}
/**
 *	Check permissions of a user to show a page and an object. Check read, write or delete permission (depending on $mode or on GUI GETPOST() values)
 *  This method check permission on module then call checkUserAccessToObject() for permission on object (according to entity and socid of user).
 *
 *	@param	User				$user      	  	User to check
 *	@param  string				$features	    Features to check (it must be module name or $object->element. Can be a 'or' check with 'levela|levelb'.
 *												Examples: 'societe', 'contact', 'produit&service', 'produit|service', ...)
 *												This is used to check permission $user->rights->features->...
 *	@param  int|string|Object	$object      	Object (recommended) or Object ID or list of Object ID if we want to check a particular record (optional) is linked to a owned thirdparty (optional).
 *	@param  string				$tableandshare  'TableName&SharedElement' with Tablename is table where object is stored. SharedElement is an optional key to define where to check entity for multicompany module. Param not used if objectid is null (optional).
 *	@param  string				$feature2		Feature to check, second level of permission (optional). Can be a 'or' check with 'sublevela|sublevelb'.
 *												This is used to check permission $user->rights->features->feature2...
 *  @param  string				$dbt_keyfield   Field name for socid foreign key if not fk_soc. Not used if objectid is null (optional). Can use '' if NA.
 *  @param  string				$dbt_select     Field rowid name, for select into tableandshare if not "rowid". Not used if objectid is null (optional)
 *  @param	int<0,1>			$isdraft		1=The object with id=$objectid is a draft
 *  @param	int<0,1>			$nodie			Mode (0=default, 1=return without dying)
 *  @param  string  			$mode           Check permission for 'read' or 'write' or 'delete'. Use '' for automatic mode from GETPOST vars (only if in GUI context)
 * 	@return	int									If mode = 0 (default): die process if not allowed (else return 1). If mode = 1: Return 0 if access not allowed (else return 1).
 *  @see dol_check_secure_access_document(), checkUserAccessToObject()
 */
function restrictedArea(\User $user, $features, $object = 0, $tableandshare = '', $feature2 = '', $dbt_keyfield = 'fk_soc', $dbt_select = 'rowid', $isdraft = 0, $nodie = 0, $mode = '')
{
}
/**
 * Check that access by a given user to an object is ok.
 * This function is also called by restrictedArea() that check before if module is enabled and if permission of user for $action is ok.
 *
 * @param 	User				$user					User to check
 * @param 	string[]			$featuresarray			Features/modules to check. Example: ('user','service','member','project','task',...)
 * @param 	int|string|Object	$object					Object (recommended) or Object ID or list of Object id. For example if we want to check a particular record (optional) is linked to a owned thirdparty (optional).
 * @param 	string				$tableandshare			'TableName&SharedElement' with Tablename is table where object is stored. SharedElement is an optional key to define where to check entity for multicompany modume. Param not used if objectid is null (optional).
 * @param 	string[]|string		$feature2				Feature to check, second level of permission (optional). Can be or check with 'level1|level2'.
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
 *	@param	int			$http_response_code			HTTP response code (403 for forbidden access, 400 bad parameters or request)
 *  @param	int<0,1>	$stringalreadysanitized		1 if string is already sanitized with HTML entities
 *  @return	never
 *  @see accessforbidden()
 */
function httponly_accessforbidden($message = '1', $http_response_code = 403, $stringalreadysanitized = 0)
{
}
/**
 *	Show a message to say access is forbidden and stop program.
 *  This includes HTTP and HTML header and footer (except if $printheader and $printfooter is  0, use this case inside an already started page).
 *	Calling this function terminate execution of PHP.
 *
 *	@param	string		$message			Force error message
 *	@param	int<0,1>	$printheader		Show header before
 *  @param  int<0,1>	$printfooter        Show footer after
 *  @param  int<0,1>	$showonlymessage    Show only message parameter. Otherwise add more information.
 *  @param  ?array<string,mixed>	$params More parameters provided to hook
 *  @return	never
 *  @see httponly_accessforbidden()
 */
function accessforbidden($message = '', $printheader = 1, $printfooter = 1, $showonlymessage = 0, $params = \null)
{
}
/**
 *	Return the max allowed for file upload.
 *  Analyze among: upload_max_filesize, post_max_size, MAIN_UPLOAD_DOC
 *
 *	@return array{max:string,maxmin:mixed,maxphptoshow:int|string,maxphptoshowparam:''|'post_max_size'|'upload_max_filesize'}	Array with all max sizes for file upload
 */
function getMaxFileSizeArray()
{
}
/**
 * Check if IP address is in CIDR range
 *
 * @param	string		$ip			IP address to check (ex: 192.168.0.50, 2001:db8:3333:4444::5555:6666)
 * @param	string		$cidr		Network IP CIDR notation (ex: 192.168.0.0/24, 2001:db8:3333:4444::/64)
 * @return	int						1 if IP is in CIDR range, 0 if IP out of CIDR range, -1 if check error
 */
function checkIPInCidr($ip, $cidr)
{
}