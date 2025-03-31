<?php

/**
 * Return the full path of the directory where a module (or an object of a module) stores its files.
 * Path may depends on the entity if a multicompany module is enabled.
 *
 * @param 	CommonObject 	$object 	Dolibarr common object.
 * @param 	string 			$module 	Override object element, for example to use 'mycompany' instead of 'societe'
 * @param	int				$forobject	Return the more complete path for the given object instead of for the module only.
 * @param	string			$mode		'output' (full main dir) or 'outputrel' (relative dir) or 'temp' (for temporary files) or 'version' (dir for archived files)
 * @return 	string|null					The path of the relative directory of the module, ending with /
 * @since Dolibarr V18
 */
function getMultidirOutput($object, $module = '', $forobject = 0, $mode = 'output')
{
}
/**
 * Return the full path of the directory where a module (or an object of a module) stores its temporary files.
 * Path may depends on the entity if a multicompany module is enabled.
 *
 * @param 	CommonObject 	$object 	Dolibarr common object
 * @param 	string 			$module 	Override object element, for example to use 'mycompany' instead of 'societe'
 * @param	int				$forobject	Return the more complete path for the given object instead of for the module only.
 * @return 	string|null					The path of the relative temp directory of the module
 */
function getMultidirTemp($object, $module = '', $forobject = 0)
{
}
/**
 * Return the full path of the directory where a module (or an object of a module) stores its versioned files.
 * Path may depends on the entity if a multicompany module is enabled.
 *
 * @param 	CommonObject 	$object 	Dolibarr common object
 * @param 	string 			$module 	Override object element, for example to use 'mycompany' instead of 'societe'
 * @param	int				$forobject	Return the more complete path for the given object instead of for the module only.
 * @return string|null					The path of the relative version directory of the module
 */
function getMultidirVersion($object, $module = '', $forobject = 0)
{
}
/**
 * Return a Dolibarr global constant string value
 *
 * @param 	string 				$key 		Key to return value, return $default if not set
 * @param 	string|int|float 	$default 	Value to return if not defined
 * @return 	string							Value returned
 * @see getDolUserString()
 */
function getDolGlobalString($key, $default = '')
{
}
/**
 * Return a Dolibarr global constant int value.
 * The constants $conf->global->xxx are loaded by the script master.inc.php included at begin of any PHP page.
 *
 * @param string 	$key 		Key to return value, return $default if not set
 * @param int 		$default 	Value to return if not defined
 * @return int					Value returned
 * @see getDolUserInt()
 */
function getDolGlobalInt($key, $default = 0)
{
}
/**
 * Return a Dolibarr global constant float value.
 * The constants $conf->global->xxx are loaded by the script master.inc.php included at begin of any PHP page.
 *
 * @param string 	$key 		Key to return value, return $default if not set
 * @param float 		$default 	Value to return if not defined
 * @return float					Value returned
 * @see getDolUserInt()
 */
function getDolGlobalFloat($key, $default = 0)
{
}
/**
 * Return a Dolibarr global constant boolean value.
 * The constants $conf->global->xxx are loaded by the script master.inc.php included at begin of any PHP page.
 *
 * @param string 	$key 		Key to return value, return $default if not set
 * @param bool 		$default 	Value to return if not defined
 * @return bool					Value returned
 */
function getDolGlobalBool($key, $default = \false)
{
}
/**
 * Return Dolibarr user constant string value
 *
 * @param string 			$key 		Key to return value, return '' if not set
 * @param string|int|float 	$default 	Value to return
 * @param User   			$tmpuser	To get another user than current user
 * @return string
 * @see getDolGlobalString()
 */
function getDolUserString($key, $default = '', $tmpuser = \null)
{
}
/**
 * Return Dolibarr user constant int value
 *
 * @param string 	$key 			Key to return value, return 0 if not set
 * @param int 		$default 		Value to return
 * @param User   	$tmpuser   		To get another user than current user
 * @return int
 */
function getDolUserInt($key, $default = 0, $tmpuser = \null)
{
}
/**
 * This mapping defines the conversion to the current internal
 * names from the alternative allowed names (including effectively deprecated
 * and future new names (not yet used as internal names).
 *
 * This allows to map any temporary or future name to the effective internal name.
 *
 * The value is typically the name of module's root directory.
 */
\define('MODULE_MAPPING', array(
    // Map deprecated names to new names
    'adherent' => 'member',
    // Has new directory
    'member_type' => 'adherent_type',
    // No directory, but file called adherent_type
    'banque' => 'bank',
    // Has new directory
    'contrat' => 'contract',
    // Has new directory
    'entrepot' => 'stock',
    // Has new directory
    'projet' => 'project',
    // Has new directory
    'categorie' => 'category',
    // Has old directory
    'commande' => 'order',
    // Has old directory
    'expedition' => 'shipping',
    // Has old directory
    'facture' => 'invoice',
    // Has old directory
    'fichinter' => 'intervention',
    // Has old directory
    'ficheinter' => 'intervention',
    // Backup for 'fichinter'
    'propale' => 'propal',
    // Has old directory
    'socpeople' => 'contact',
    // Has old directory
    'fournisseur' => 'supplier',
    // Has old directory
    'actioncomm' => 'agenda',
    // NO module directory (public dir agenda)
    'product_price' => 'productprice',
    // NO directory
    'product_fournisseur_price' => 'productsupplierprice',
));
/**
 * Is Dolibarr module enabled
 *
 * @param 	string 	$module 	Module name to check
 * @return 	boolean				True if module is enabled
 */
function isModEnabled($module)
{
}
/**
 * isDolTms check if a timestamp is valid.
 *
 * @param  int|string|null $timestamp timestamp to check
 * @return bool
 */
function isDolTms($timestamp)
{
}
/**
 * Return a DoliDB instance (database handler).
 *
 * @param   string	$type		Type of database (mysql, pgsql...)
 * @param	string	$host		Address of database server
 * @param	string	$user		Authorized username
 * @param	string	$pass		Password
 * @param	string	$name		Name of database
 * @param	int		$port		Port of database server
 * @return	DoliDB				A DoliDB instance
 */
function getDoliDBInstance($type, $host, $user, $pass, $name, $port)
{
}
/**
 * 	Get list of entity id to use.
 *
 * 	@param	string	$element		Current element
 *									'societe', 'socpeople', 'actioncomm', 'agenda', 'resource',
 *									'product', 'productprice', 'stock', 'bom', 'mo',
 *									'propal', 'supplier_proposal', 'invoice', 'supplier_invoice', 'payment_various',
 *									'categorie', 'bank_account', 'bank_account', 'adherent', 'user',
 *									'commande', 'supplier_order', 'expedition', 'intervention', 'survey',
 *									'contract', 'tax', 'expensereport', 'holiday', 'multicurrency', 'project',
 *									'email_template', 'event', 'donation'
 *									'c_paiement', 'c_payment_term', ...
 * 	@param	int<0,1>	$shared		0=Return id of current entity only,
 * 									1=Return id of current entity + shared entities (default)
 *  @param	?CommonObject			$currentobject	Current object if needed
 * 	@return	string					Entity id(s) to use ( eg. entity IN ('.getEntity(elementname).')' )
 */
function getEntity($element, $shared = 1, $currentobject = \null)
{
}
/**
 * 	Set entity id to use when to create an object
 *
 * 	@param	CommonObject	$currentobject	Current object
 * 	@return	int								Entity id to use ( eg. entity = '.setEntity($object) )
 */
function setEntity($currentobject)
{
}
/**
 * 	Return if string has a name dedicated to store a secret
 *
 * 	@param	string	$keyname	Name of key to test
 * 	@return	boolean				True if key is used to store a secret
 */
function isASecretKey($keyname)
{
}
/**
 * Return a numeric value into an Excel like column number. So 0 return 'A', 1 returns 'B'..., 26 return 'AA'
 *
 * @param	int|string		$n		Numeric value
 * @return 	string					Column in Excel format
 */
function num2Alpha($n)
{
}
/**
 * Return information about user browser
 *
 * Returns array with the following format:
 * array(
 *  'browsername' => Browser name (firefox|chrome|iceweasel|epiphany|safari|opera|ie|unknown)
 *  'browserversion' => Browser version. Empty if unknown
 *  'browseros' => Set with mobile OS (android|blackberry|ios|palm|symbian|webos|maemo|windows|unknown)
 *  'layout' => (tablet|phone|classic)
 *  'phone' => empty if not mobile, (android|blackberry|ios|palm|unknown) if mobile
 *  'tablet' => true/false
 * )
 *
 * @param string $user_agent Content of $_SERVER["HTTP_USER_AGENT"] variable
 * @return	array{browsername:string,browserversion:string,browseros:string,browserua:string,layout:string,phone:string,tablet:bool} Check function documentation
 */
function getBrowserInfo($user_agent)
{
}
/**
 *  Function called at end of web php process
 *
 *  @return	void
 */
function dol_shutdown()
{
}
/**
 * Return true if we are in a context of submitting the parameter $paramname from a POST of a form.
 * Warning:
 * For action=add, use:     $var = GETPOST('var');		// No GETPOSTISSET, so GETPOST always called and default value is retrieved if not a form POST, and value of form is retrieved if it is a form POST.
 * For action=update, use:  $var = GETPOSTISSET('var') ? GETPOST('var') : $object->var;
 *
 * @param 	string	$paramname		Name or parameter to test
 * @return 	boolean					True if we have just submit a POST or GET request with the parameter provided (even if param is empty)
 */
function GETPOSTISSET($paramname)
{
}
/**
 * Return true if the parameter $paramname is submit from a POST OR GET as an array.
 * Can be used before GETPOST to know if the $check param of GETPOST need to check an array or a string
 *
 * @param 	string		$paramname	Name or parameter to test
 * @param	int<0,3>	$method		Type of method (0 = get then post, 1 = only get, 2 = only post, 3 = post then get)
 * @return 	bool 					True if we have just submit a POST or GET request with the parameter provided (even if param is empty)
 */
function GETPOSTISARRAY($paramname, $method = 0)
{
}
/**
 *  Return value of a param into GET or POST supervariable.
 *  Use the property $user->default_values[path]['createform'] and/or $user->default_values[path]['filters'] and/or $user->default_values[path]['sortorder']
 *  Note: The property $user->default_values is loaded by main.php when loading the user.
 *
 *  @param  string  $paramname   Name of parameter to found
 *  @param  string  $check	     Type of check
 *                               '' or 'none'=no check (deprecated)
 *                               'password'=allow characters for a password
 *                               'email'=allow characters for an email
 *                               'array', 'array:restricthtml' or 'array:aZ09' to check it's an array
 *                               'int'=check it's numeric (integer or float)
 *                               'intcomma'=check it's integer+comma ('1,2,3,4...')
 *                               'alpha'=Same than alphanohtml
 *                               'alphawithlgt'=alpha with lgt
 *                               'alphanohtml'=check there is no html content and no " and no ../
 *                               'aZ'=check it's a-z only
 *                               'aZ09'=check it's simple alpha string (recommended for keys)
 *                               'aZ09arobase'=check it's a string for an element type ('myobject@mymodule')
 *                               'aZ09comma'=check it's a string for a sortfield or sortorder
 *                               'san_alpha'=Use filter_var with FILTER_SANITIZE_STRING (do not use this for free text string)
 *                               'nohtml'=check there is no html content
 *                               'restricthtml'=check html content is restricted to some tags only
 *                               'custom'= custom filter specify $filter and $options)
 *  @param	int		$method	     Type of method (0 = get then post, 1 = only get, 2 = only post, 3 = post then get)
 *  @param  ?int	$filter      Filter to apply when $check is set to 'custom'. (See http://php.net/manual/en/filter.filters.php for détails)
 *  @param  mixed	$options     Options to pass to filter_var when $check is set to 'custom'
 *  @param	int 	$noreplace	 Force disable of replacement of __xxx__ strings.
 *  @return string|array<mixed>  Value found (string or array), or '' if check fails
 */
function GETPOST($paramname, $check = 'alphanohtml', $method = 0, $filter = \null, $options = \null, $noreplace = 0)
{
}
/**
 *  Return the value of a $_GET or $_POST supervariable, converted into integer.
 *  Use the property $user->default_values[path]['creatform'] and/or $user->default_values[path]['filters'] and/or $user->default_values[path]['sortorder']
 *  Note: The property $user->default_values is loaded by main.php when loading the user.
 *
 *  @param  string		$paramname	Name of the $_GET or $_POST parameter
 *  @param  int<0,3>	$method		Type of method (0 = $_GET then $_POST, 1 = only $_GET, 2 = only $_POST, 3 = $_POST then $_GET)
 *  @return int						Value converted into integer
 */
function GETPOSTINT($paramname, $method = 0)
{
}
/**
 *  Return the value of a $_GET or $_POST supervariable, converted into float.
 *
 *  @param  string          $paramname      Name of the $_GET or $_POST parameter
 *	@param	''|'MU'|'MT'|'MS'|'CU'|'CT'|int	$rounding	Type of rounding ('', 'MU', 'MT, 'MS', 'CU', 'CT', integer) {@see price2num()}
 *  @return float                           Value converted into float
 *  @since	Dolibarr V20
 */
function GETPOSTFLOAT($paramname, $rounding = '')
{
}
/**
 * Helper function that combines values of a dolibarr DatePicker (such as Form::selectDate) for year, month, day (and
 * optionally hour, minute, second) fields to return a timestamp.
 *
 * @param 	string 		$prefix 	Prefix used to build the date selector (for instance using Form::selectDate)
 * @param 	string 		$hourTime	'getpost' to include hour, minute, second values from the HTTP request,
 * 									or 'XX:YY:ZZ' to set hour, minute, second respectively (for instance '23:59:59')
 * 									or '' means '00:00:00' (default)
 * @param 	int|string 	$gm 		Passed to dol_mktime
 * @return 	int|string  			Date as a timestamp, '' or false if error
 *
 * @see dol_mktime()
 */
function GETPOSTDATE($prefix, $hourTime = '', $gm = 'auto')
{
}
/**
 *  Return a sanitized or empty value after checking value against a rule.
 *
 *  @deprecated
 *  @param  string|array<mixed>	$out	Value to check/clear.
 *  @param  string  		$check		Type of check/sanitizing
 *  @param  ?int     		$filter		Filter to apply when $check is set to 'custom'. (See http://php.net/manual/en/filter.filters.php for détails)
 *  @param  ?mixed   		$options	Options to pass to filter_var when $check is set to 'custom'
 *  @return string|array<mixed>			Value sanitized (string or array). It may be '' if format check fails.
 */
function checkVal($out = '', $check = 'alphanohtml', $filter = \null, $options = \null)
{
}
/**
 *  Return a sanitized or empty value after checking value against a rule.
 *
 *  @param  string|array<mixed>	$out	 Value to check/clear.
 *  @param  string  		$check	     Type of check/sanitizing
 *  @param  ?int     		$filter      Filter to apply when $check is set to 'custom'. (See http://php.net/manual/en/filter.filters.php for détails)
 *  @param  ?mixed   		$options     Options to pass to filter_var when $check is set to 'custom'
 *  @return string|array<mixed>		     Value sanitized (string or array). It may be '' if format check fails.
 */
function sanitizeVal($out = '', $check = 'alphanohtml', $filter = \null, $options = \null)
{
}
/**
 *  Return a prefix to use for this Dolibarr instance, for session/cookie names or email id.
 *  The prefix is unique for instance and avoid conflict between multi-instances, even when having two instances with same root dir
 *  or two instances in same virtual servers.
 *  This function must not use dol_hash (that is used for password hash) and need to have all context $conf loaded.
 *
 *  @param  string  $mode                   '' (prefix for session name) or 'email' (prefix for email id)
 *  @return	string                          A calculated prefix
 *  @phan-suppress PhanRedefineFunction - Also defined in webportal.main.inc.php
 */
function dol_getprefix($mode = '')
{
}
/**
 *	Make an include_once using default root and alternate root if it fails.
 *  To link to a core file, use include(DOL_DOCUMENT_ROOT.'/pathtofile')
 *  To link to a module file from a module file, use include './mymodulefile';
 *  To link to a module file from a core file, then this function can be used (call by hook / trigger / speciales pages)
 *
 * 	@param	string	$relpath	Relative path to file (Ie: mydir/myfile, ../myfile, ...)
 * 	@param	string	$classname	Class name (deprecated)
 *  @return bool                True if load is a success, False if it fails
 */
function dol_include_once($relpath, $classname = '')
{
}
/**
 *	Return path of url or filesystem. Can check into alternate dir or alternate dir + main dir depending on value of $returnemptyifnotfound.
 *
 * 	@param	string	$path						Relative path to file (if mode=0) or relative url (if mode=1). Ie: mydir/myfile, ../myfile
 *  @param	int		$type						0=Used for a Filesystem path,
 *  											1=Used for an URL path (output relative),
 *  											2=Used for an URL path (output full path using same host that current url),
 *  											3=Used for an URL path (output full path using host defined into $dolibarr_main_url_root of conf file, for an access from internet)
 *  @param	int		$returnemptyifnotfound		0:If $type==0 and if file was not found into alternate dir, return default path into main dir (no test on it)
 *  											1:If $type==0 and if file was not found into alternate dir, return empty string
 *  											2:If $type==0 and if file was not found into alternate dir, test into main dir, return default path if found, empty string if not found
 *  @return string								Full filesystem path (if path=0) or '' if file not found, Full url path (if mode=1)
 */
function dol_buildpath($path, $type = 0, $returnemptyifnotfound = 0)
{
}
/**
 *	Get properties for an object - including magic properties when requested
 *
 *	Only returns properties that exist
 *
 *	@param	object		$obj		Object to get properties from
 *	@param	string[]	$properties	Optional list of properties to get.
 *  								When empty, only gets public properties.
 *	@return array<string,mixed>		Hash for retrieved values (key=name)
 */
function dol_get_object_properties($obj, $properties = [])
{
}
/**
 *	Create a clone of instance of object (new instance with same value for each properties)
 *  With native = 0: Property that are references are different memory area in the new object (full isolation clone). This means $this->object of new object may not be valid (except this->db that is voluntarly kept).
 *  With native = 1: Use PHP clone. Property that are reference are same pointer. This means $this->db of new object is still valid but point to same this->db than original object.
 *  With native = 2: Property that are reference are different memory area in the new object (full isolation clone). Only scalar and array values are cloned. This means method are not availables and $this->db of new object is not valid.
 *
 *  @template T
 *
 * 	@param	T		          $object		Object to clone
 *  @param	int		          $native		0=Full isolation method, 1=Native PHP method, 2=Full isolation method keeping only scalar and array properties (recommended)
 *	@return T                				Clone object
 *
 *  @see https://php.net/manual/language.oop5.cloning.php
 *  @phan-suppress PhanTypeExpectedObjectPropAccess
 */
function dol_clone($object, $native = 2)
{
}
/**
 *	Optimize a size for some browsers (phone, smarphone...)
 *
 * 	@param	int		$size		Size we want
 * 	@param	string	$type		Type of optimizing:
 * 								'' = function used to define a size for truncation
 * 								'width' = function is used to define a width
 *	@return int					New size after optimizing
 */
function dol_size($size, $type = '')
{
}
/**
 *	Clean a string to use it as a file name.
 *  Replace also '--' and ' -' strings, they are used for parameters separation (Note: ' - ' is allowed).
 *
 *	@param	string	$str            String to clean
 * 	@param	string	$newstr			String to replace bad chars with.
 *  @param	int	    $unaccent		1=Remove also accent (default), 0 do not remove them
 *  @param	int		$includequotes	1=Include simple quotes (double is already included by default)
 *	@return string          		String cleaned
 *
 * 	@see        	dol_string_nospecial(), dol_string_unaccent(), dol_sanitizePathName()
 */
function dol_sanitizeFileName($str, $newstr = '_', $unaccent = 1, $includequotes = 0)
{
}
/**
 *	Clean a string to use it as a path name. Similar to dol_sanitizeFileName but accept / and \ chars.
 *  Replace also '--' and ' -' strings, they are used for parameters separation (Note: ' - ' and 'x-y' is allowed).
 *
 *	@param	string	$str            String to clean
 * 	@param	string	$newstr			String to replace bad chars with
 *  @param	int	    $unaccent		1=Remove also accent (default), 0 do not remove them
 *	@return string          		String cleaned
 *
 * 	@see        	dol_string_nospecial(), dol_string_unaccent(), dol_sanitizeFileName()
 */
function dol_sanitizePathName($str, $newstr = '_', $unaccent = 1)
{
}
/**
 *  Clean a string to use it as an URL (into a href or src attribute)
 *
 *  @param      string		$stringtoclean		String to clean
 *  @param		int			$type				0=Accept all Url, 1=Clean external Url (keep only relative Url)
 *  @return     string     		 				Escaped string.
 */
function dol_sanitizeUrl($stringtoclean, $type = 1)
{
}
/**
 *  Clean a string to use it as an Email.
 *
 *  @param      string		$stringtoclean		String to clean. Example 'abc@mycompany.com <My name>'
 *  @return     string     		 				Escaped string.
 */
function dol_sanitizeEmail($stringtoclean)
{
}
/**
 *	Clean a string to use it as a key or code. So only char a-Z, A-Z, _ and 0-9 is kept.
 *
 *	@param	string	$str            String to clean
 *	@return string          		String cleaned (a-zA-Z_)
 *
 * 	@see        	dol_string_nospecial(), dol_string_unaccent(), dol_sanitize...()
 */
function dol_sanitizeKeyCode($str)
{
}
/**
 *	Clean a string from all accent characters to be used as ref, login or by dol_sanitizeFileName
 *
 *	@param	string	$str			String to clean
 *	@return string   	       		Cleaned string
 *
 * 	@see    		dol_sanitizeFilename(), dol_string_nospecial()
 */
function dol_string_unaccent($str)
{
}
/**
 *	Clean a string from all punctuation characters to use it as a ref or login.
 *  This is a more complete function than dol_sanitizeFileName().
 *
 *	@param	string			$str            	String to clean
 * 	@param	string			$newstr				String to replace forbidden chars with
 *  @param  string[]|string	$badcharstoreplace  Array of forbidden characters to replace. Use '' to keep default list.
 *  @param  string[]|string	$badcharstoremove   Array of forbidden characters to remove. Use '' to keep default list.
 *  @param	int<0,1>		$keepspaces			1=Do not treat space as a special char to replace or remove
 * 	@return string          					Cleaned string
 *
 * 	@see    		dol_sanitizeFilename(), dol_string_unaccent(), dol_string_nounprintableascii()
 */
function dol_string_nospecial($str, $newstr = '_', $badcharstoreplace = '', $badcharstoremove = '', $keepspaces = 0)
{
}
/**
 *	Clean a string from all non printable ASCII chars (0x00-0x1F and 0x7F). It can also removes also Tab-CR-LF. UTF8 chars remains.
 *  This can be used to sanitize a string and view its real content. Some hacks try to obfuscate attacks by inserting non printable chars.
 *  Note, for information: UTF8 on 1 byte are: \x00-\7F
 *                                 2 bytes are: byte 1 \xc0-\xdf, byte 2 = \x80-\xbf
 *                                 3 bytes are: byte 1 \xe0-\xef, byte 2 = \x80-\xbf, byte 3 = \x80-\xbf
 *                                 4 bytes are: byte 1 \xf0-\xf7, byte 2 = \x80-\xbf, byte 3 = \x80-\xbf, byte 4 = \x80-\xbf
 *	@param	string	$str            	String to clean
 *  @param	int		$removetabcrlf		Remove also CR-LF
 * 	@return string          			Cleaned string
 *
 * 	@see    		dol_sanitizeFilename(), dol_string_unaccent(), dol_string_nospecial()
 */
function dol_string_nounprintableascii($str, $removetabcrlf = 1)
{
}
/**
 *  Returns text slugified (no special char, separator is "-".
 *
 *  @param	string	$stringtoslugify		String to slugify
 *  @return string							Slugified string
 */
function dolSlugify($stringtoslugify)
{
}
/**
 *  Returns text escaped for inclusion into javascript code
 *
 *  @param	string	$stringtoescape			String to escape
 *  @param	int<0,3>	$mode				0=Escape also ' and " into ', 1=Escape ' but not " for usage into 'string', 2=Escape " but not ' for usage into "string", 3=Escape ' and " with \
 *  @param	int		$noescapebackslashn		0=Escape also \n. 1=Do not escape \n.
 *  @return string							Escaped string. Both ' and " are escaped into ' if they are escaped.
 */
function dol_escape_js($stringtoescape, $mode = 0, $noescapebackslashn = 0)
{
}
/**
 *  Returns text escaped by RFC 3986 for inclusion into a clicable link.
 *  This method can be used on the ...in links like href="javascript:..." because when clicking on such links, the browserfirst decode the strind
 *  and then interpret content that can be javascript.
 *  Usage of this escapement should be limited to links href="javascript:...". For common URL, use urlencode instead.
 *
 *  @param	string		$stringtoescape		String to escape
 *  @return string							Escaped string.
 */
function dol_escape_uri($stringtoescape)
{
}
/**
 *  Returns text escaped for inclusion into javascript code
 *
 *  @param      string		$stringtoescape		String to escape
 *  @return     string     		 				Escaped string for JSON content.
 */
function dol_escape_json($stringtoescape)
{
}
/**
 *  Returns text escaped for inclusion into a php string, build with double quotes " or '
 *
 *  @param      string		$stringtoescape		String to escape
 *  @param		int<1,2>	$stringforquotes	2=String for doublequotes, 1=String for simple quotes
 *  @return     string     		 				Escaped string for PHP content.
 */
function dol_escape_php($stringtoescape, $stringforquotes = 2)
{
}
/**
 *  Returns text escaped for all protocols (so only alpha chars and numbers)
 *
 *  @param      string		$stringtoescape		String to escape
 *  @return     string     		 				Escaped string for XML content.
 */
function dol_escape_all($stringtoescape)
{
}
/**
 *  Returns text escaped for inclusion into a XML string
 *
 *  @param      string		$stringtoescape		String to escape
 *  @return     string     		 				Escaped string for XML content.
 */
function dol_escape_xml($stringtoescape)
{
}
/**
 * Return a string label (so on 1 line only and that should not contains any HTML) ready to be output on HTML page.
 * To use text that is not HTML content inside an attribute, you can simply use only dol_escape_htmltag(). In doubt, use dolPrintHTMLForAttribute().
 *
 * @param	string	$s						String to print
 * @param	int		$escapeonlyhtmltags		1=Escape only html tags, not the special chars like accents.
 * @return	string							String ready for HTML output
 */
function dolPrintLabel($s, $escapeonlyhtmltags = 0)
{
}
/**
 * Return a string label (possible on several lines and that should not contains any HTML) ready to be output on HTML page.
 * To use text that is not HTML content inside an attribute, you can simply use only dol_escape_htmltag(). In doubt, use dolPrintHTMLForAttribute().
 *
 * @param	string	$s		String to print
 * @return	string			String ready for HTML output
 */
function dolPrintText($s)
{
}
/**
 * Return a string (that can be on several lines) ready to be output on a HTML page.
 * To output a text inside an attribute, you can use dolPrintHTMLForAttribute() or dolPrintHTMLForTextArea() inside a textarea
 * With dolPrintHTML(), only content not already in HTML is encoded with HTML.
 *
 * @param	string	$s				String to print
 * @param	int		$allowiframe	Allow iframe tags
 * @return	string					String ready for HTML output (sanitized and escape)
 * @see dolPrintHTMLForAttribute(), dolPrintHTMLFortextArea()
 */
function dolPrintHTML($s, $allowiframe = 0)
{
}
/**
 * Return a string ready to be output into an HTML attribute (alt, title, data-html, ...)
 * With dolPrintHTMLForAttribute(), the content is HTML encode, even if it is already HTML content.
 *
 * @param	string	$s						String to print
 * @param	int		$escapeonlyhtmltags		1=Escape only html tags, not the special chars like accents.
 * @return	string							String ready for HTML output
 * @see dolPrintHTML(), dolPrintHTMLFortextArea()
 */
function dolPrintHTMLForAttribute($s, $escapeonlyhtmltags = 0)
{
}
/**
 * Return a string ready to be output on a href attribute (this one need a special because we need content is HTML with no way to detect it is HTML).
 * With dolPrintHTMLForAttribute(), the content is HTML encode, even if it is already HTML content.
 *
 * @param	string	$s		String to print
 * @return	string			String ready for HTML output
 * @see dolPrintHTML(), dolPrintHTMLFortextArea()
 */
function dolPrintHTMLForAttributeUrl($s)
{
}
/**
 * Return a string ready to be output on input textarea.
 * Differs from dolPrintHTML because all tags are escape. With dolPrintHTML, all tags except common one are escaped.
 *
 * @param	string	$s				String to print
 * @param	int		$allowiframe	Allow iframe tags
 * @return	string					String ready for HTML output into a textarea
 * @see dolPrintHTML(), dolPrintHTMLForAttribute()
 */
function dolPrintHTMLForTextArea($s, $allowiframe = 0)
{
}
/**
 * Return a string ready to be output on an HTML attribute (alt, title, ...)
 *
 * @param	string	$s		String to print
 * @return	string			String ready for HTML output
 */
function dolPrintPassword($s)
{
}
/**
 *  Returns text escaped for inclusion in HTML alt or title or value tags, or into values of HTML input fields.
 *  When we need to output strings on pages, we should use:
 *        - dolPrintLabel...
 *        - dolPrintHTML... that is dol_escape_htmltag(dol_htmlwithnojs(dol_string_onlythesehtmltags(dol_htmlentitiesbr(), 1, 1, 1)), 1, 1) for notes or descriptions into textarea, add 'common' if into a html content
 *        - dolPrintPassword that is abelhtmlspecialchars( , ENT_COMPAT, 'UTF-8') for passwords.
 *
 *  @param      string		$stringtoescape			String to escape
 *  @param		int			$keepb					1=Replace b tags with escaped value (except if in $noescapetags), 0=Remove them completely
 *  @param      int         $keepn              	1=Preserve \r\n strings, 0=Replace them with escaped value, -1=Remove them. Set to 1 when escaping for a <textarea>.
 *  @param		string		$noescapetags			'' (escape all html tags) or 'common' (do not escape some common tags) or list of tags to not escape.
 *  @param		int			$escapeonlyhtmltags		1=Escape only html tags, not the special chars like accents.
 *  @param		int			$cleanalsojavascript	Clean also javascript. @TODO switch this option to 1 by default.
 *  @return     string     				 			Escaped string
 *  @see		dol_string_nohtmltag(), dol_string_onlythesehtmltags(), dol_string_nospecial(), dol_string_unaccent(), dol_htmlentitiesbr()
 */
function dol_escape_htmltag($stringtoescape, $keepb = 0, $keepn = 0, $noescapetags = '', $escapeonlyhtmltags = 0, $cleanalsojavascript = 0)
{
}
/**
 * Convert a string to lower. Never use strtolower because it does not works with UTF8 strings.
 *
 * @param 	string		$string		        String to encode
 * @param   string      $encoding           Character set encoding
 * @return 	string							String converted
 */
function dol_strtolower($string, $encoding = "UTF-8")
{
}
/**
 * Convert a string to upper. Never use strtolower because it does not works with UTF8 strings.
 *
 * @param 	string		$string		        String to encode
 * @param   string      $encoding           Character set encoding
 * @return 	string							String converted
 * @see dol_ucfirst(), dol_ucwords()
 */
function dol_strtoupper($string, $encoding = "UTF-8")
{
}
/**
 * Convert first character of the first word of a string to upper. Never use ucfirst because it does not works with UTF8 strings.
 *
 * @param   string      $string         String to encode
 * @param   string      $encoding       Character set encodign
 * @return  string                      String converted
 * @see dol_strtoupper(), dol_ucwords()
 */
function dol_ucfirst($string, $encoding = "UTF-8")
{
}
/**
 * Convert first character of all the words of a string to upper.
 *
 * @param   string      $string         String to encode
 * @param   string      $encoding       Character set encodign
 * @return  string                      String converted
 * @see dol_strtoupper(), dol_ucfirst()
 */
function dol_ucwords($string, $encoding = "UTF-8")
{
}
/**
 * Get caller info as a string that can be appended to a log message.
 *
 * @return string
 */
function getCallerInfoString()
{
}
/**
 *	Write log message into outputs. Possible outputs can be:
 *	SYSLOG_HANDLERS = ["mod_syslog_file"]  		file name is then defined by SYSLOG_FILE
 *	SYSLOG_HANDLERS = ["mod_syslog_syslog"]  	facility is then defined by SYSLOG_FACILITY
 *  Warning, syslog functions are bugged on Windows, generating memory protection faults. To solve
 *  this, use logging to files instead of syslog (see setup of module).
 *  Note: If constant 'SYSLOG_FILE_NO_ERROR' defined, we never output any error message when writing to log fails.
 *  Note: You can get log message into html sources by adding parameter &logtohtml=1 (constant MAIN_LOGTOHTML must be set)
 *  This function works only if syslog module is enabled.
 * 	This must not use any call to other function calling dol_syslog (avoid infinite loop).
 *
 * 	@param  string		$message				Line to log. ''=Show nothing
 *  @param  int<0,7>	$level					Log level
 *												On Windows LOG_ERR=4, LOG_WARNING=5, LOG_NOTICE=LOG_INFO=6, LOG_DEBUG=6 if define_syslog_variables ou PHP 5.3+, 7 if dolibarr
 *												On Linux   LOG_ERR=3, LOG_WARNING=4, LOG_NOTICE=5, LOG_INFO=6, LOG_DEBUG=7
 *  @param	int<-1,1>	$ident					1=Increase ident of 1 (after log), -1=Decrease ident of 1 (before log)
 *  @param	string		$suffixinfilename		When output is a file, append this suffix into default log filename. Example '_stripe', '_mail'
 *  @param	string		$restricttologhandler	Force output of log only to this log handler
 *  @param	?array<string,mixed>	$logcontext	If defined, an array with extra information (can be used by some log handlers)
 *  @return	void
 *  @phan-suppress PhanPluginUnknownArrayFunctionParamType  $logcontext is not defined in detail
 */
function dol_syslog($message, $level = \LOG_INFO, $ident = 0, $suffixinfilename = '', $restricttologhandler = '', $logcontext = \null)
{
}
/**
 * Create a dialog with two buttons for export and overwrite of a website
 *
 * @param 	string $name          	Unique identifier for the dialog
 * @param 	string $label         	Title of the dialog
 * @param 	string $buttonstring  	Text for the button that opens the dialog
 * @param 	string $exportSiteName 	Name of the "submit" input for site export
 * @param 	string $overwriteGitUrl URL for the link that triggers the overwrite action in GIT
 * @param	Website	$website		Website object
 * @return 	string               	HTML and JavaScript code for the button and the dialog
 */
function dolButtonToOpenExportDialog($name, $label, $buttonstring, $exportSiteName, $overwriteGitUrl, $website)
{
}
/**
 *	Return HTML code to output a button to open a dialog popup box.
 *  Such buttons must be included inside a HTML form.
 *
 *	@param	string	$name				A name for the html component
 *	@param	string	$label 	    		Label shown in Popup title top bar
 *	@param  string	$buttonstring  		button string (HTML text we can click on)
 *	@param  string	$url				Relative Url to open. For example '/project/card.php'
 *  @param	string	$disabled			Disabled text
 *  @param	string	$morecss			More CSS
 *  @param	string	$jsonopen			Some JS code to execute on click/open of popup
 *  @param	string	$backtopagejsfields	The back to page must be managed using javascript instead of a redirect.
 *  									Value is 'keyforpopupid:Name_of_html_component_to_set_with id,Name_of_html_component_to_set_with_label'
 *  @param	string	$accesskey			A key to use shortcut
 * 	@return	string						HTML component with button
 */
function dolButtonToOpenUrlInDialogPopup($name, $label, $buttonstring, $url, $disabled = '', $morecss = 'classlink button bordertransp', $jsonopen = '', $backtopagejsfields = '', $accesskey = '')
{
}
/**
 *	Show tab header of a card
 *
 *	@param	array<int,array<int<0,5>,string>>	$links				Array of tabs (0=>url, 1=>label, 2=>code, 3=>not used, 4=>text after link, 5=>morecssonlink). Currently initialized by calling a function xxx_admin_prepare_head. Note that label into $links[$i][1] must be already HTML escaped.
 *	@param	string	$active     		Active tab name (document', 'info', 'ldap', ....)
 *	@param  string	$title      		Title
 *	@param  int		$notab				-1 or 0=Add tab header, 1=no tab header (if you set this to 1, using print dol_get_fiche_end() to close tab is not required), -2=Add tab header with no sepaaration under tab (to start a tab just after), -3=Add tab header but no footer separation
 * 	@param	string	$picto				Add a picto on tab title
 *	@param	int		$pictoisfullpath	If 1, image path is a full path. If you set this to 1, you can use url returned by dol_buildpath('/mymodyle/img/myimg.png',1) for $picto.
 *  @param	string	$morehtmlright		Add more html content on right of tabs title
 *  @param	string	$morecss			More Css
 *  @param	int		$limittoshow		Limit number of tabs to show. Use 0 to use automatic default value.
 *  @param	string	$moretabssuffix		A suffix to use when you have several dol_get_fiche_head() in same page
 * 	@return	void
 *  @deprecated Use print dol_get_fiche_head() instead
 */
function dol_fiche_head($links = array(), $active = '0', $title = '', $notab = 0, $picto = '', $pictoisfullpath = 0, $morehtmlright = '', $morecss = '', $limittoshow = 0, $moretabssuffix = '')
{
}
/**
 *  Show tabs of a record
 *
 *	@param	array<int,array<int<0,5>,string>>	$links	Array of tabs (0=>url, 1=>label, 2=>code, 3=>not used, 4=>text after link, 5=>morecssonlink). Currently initialized by calling a function xxx_admin_prepare_head. Note that label into $links[$i][1] must be already HTML escaped.
 *	@param	string	$active     		Active tab name (using the old numeric int is deprecated)
 *	@param  string	$title      		Title
 *	@param  int		$notab				-1 or 0=Add tab header, 1=no tab header (if you set this to 1, using print dol_get_fiche_end() to close tab is not required), -2=Add tab header with no separation under tab (to start a tab just after), -3=-2+'noborderbottom'
 * 	@param	string	$picto				Add a picto on tab title
 *	@param	int		$pictoisfullpath	If 1, image path is a full path. If you set this to 1, you can use url returned by dol_buildpath('/mymodyle/img/myimg.png',1) for $picto.
 *  @param	string	$morehtmlright		Add more html content on right of tabs title
 *  @param	string	$morecss			More CSS on the link <a>
 *  @param	int		$limittoshow		Limit number of tabs to show. Use 0 to use automatic default value.
 *  @param	string	$moretabssuffix		A suffix to use when you have several dol_get_fiche_head() in same page
 *  @param	int     $dragdropfile       0 (default) or 1. 1 enable a drop zone for file to be upload, 0 disable it
 * 	@return	string
 */
function dol_get_fiche_head($links = array(), $active = '', $title = '', $notab = 0, $picto = '', $pictoisfullpath = 0, $morehtmlright = '', $morecss = '', $limittoshow = 0, $moretabssuffix = '', $dragdropfile = 0)
{
}
/**
 *  Show tab footer of a card
 *
 *  @param	int<-1,1>	$notab       -1 or 0=Add tab footer, 1=no tab footer
 *  @return	void
 *  @deprecated Use print dol_get_fiche_end() instead
 */
function dol_fiche_end($notab = 0)
{
}
/**
 *	Return tab footer of a card
 *
 *	@param  int<-1,1>	$notab		-1 or 0=Add tab footer, 1=no tab footer
 *  @return	string
 */
function dol_get_fiche_end($notab = 0)
{
}
/**
 *  Show tab footer of a card.
 *  Note: $object->next_prev_filter can be set to restrict select to find next or previous record by $form->showrefnav.
 *
 *  @param	CommonObject $object		Object to show
 *  @param	string		$paramid   		Name of parameter to use to name the id into the URL next/previous link
 *  @param	string		$morehtml  		More html content to output just before the nav bar
 *  @param	int|bool 	$shownav	  	Show Condition (navigation is shown if value is 1 or true)
 *  @param	string		$fieldid   		Name of the field in DB to use to select next et previous (we make the select max and min on this field). Use 'none' for no prev/next search.
 *  @param	string		$fieldref   	Name of the field (object->ref) to use to select next et previous
 *  @param	string		$morehtmlref  	More html to show after the ref (see $morehtmlleft for before)
 *  @param	string		$moreparam  	More param to add in nav link url.
 *	@param	int			$nodbprefix		Do not include DB prefix to forge table name
 *	@param	string		$morehtmlleft	More html code to show before the ref (see $morehtmlref for after)
 *	@param	string		$morehtmlstatus	More html code to show under navigation arrows
 *  @param  int     	$onlybanner     Put this to 1, if the card will contains only a banner (this add css 'arearefnobottom' on div)
 *	@param	string		$morehtmlright	More html code to show before navigation arrows
 *  @return	void
 */
function dol_banner_tab($object, $paramid, $morehtml = '', $shownav = 1, $fieldid = 'rowid', $fieldref = 'ref', $morehtmlref = '', $moreparam = '', $nodbprefix = 0, $morehtmlleft = '', $morehtmlstatus = '', $onlybanner = 0, $morehtmlright = '')
{
}
/**
 * Show a string with the label tag dedicated to the HTML edit field.
 *
 * @param	string	$langkey		Translation key
 * @param 	string	$fieldkey		Key of the html select field the text refers to
 * @param	int		$fieldrequired	1=Field is mandatory
 * @return string
 * @deprecated Form::editfieldkey
 */
function fieldLabel($langkey, $fieldkey, $fieldrequired = 0)
{
}
/**
 *      Return a formatted address (part address/zip/town/state) according to country rules.
 *      See https://en.wikipedia.org/wiki/Address
 *
 *      @param  Object		$object			A company or contact object
 * 	    @param	int			$withcountry	1=Add country into address string
 *      @param	string		$sep			Separator to use to separate info when building string
 *      @param	?Translate	$outputlangs	Object lang that contains language for text translation.
 *      @param	int			$mode			0=Standard output, 1=Remove address
 *  	@param	string		$extralangcode	User extralanguage $langcode as values for address, town
 *      @return string						Formatted string
 *      @see dol_print_address()
 */
function dol_format_address($object, $withcountry = 0, $sep = "\n", $outputlangs = \null, $mode = 0, $extralangcode = '')
{
}
/**
 *	Format a string.
 *
 *	@param	string		$fmt		Format of strftime function (http://php.net/manual/fr/function.strftime.php)
 *  @param	int|false	$ts			Timestamp (If is_gmt is true, timestamp is already includes timezone and daylight saving offset, if is_gmt is false, timestamp is a GMT timestamp and we must compensate with server PHP TZ)
 *  @param	bool		$is_gmt		See comment of timestamp parameter
 *	@return	string					A formatted string
 *  @see dol_stringtotime()
 */
function dol_strftime($fmt, $ts = \false, $is_gmt = \false)
{
}
/**
 *	Output date in a string format according to outputlangs (or langs if not defined).
 * 	Return charset is always UTF-8, except if encodetoouput is defined. In this case charset is output charset
 *
 *	@param	int|string	$time			GM Timestamps date
 *	@param	string		$format      	Output date format (tag of strftime function)
 *										"%d %b %Y",
 *										"%d/%m/%Y %H:%M",
 *										"%d/%m/%Y %H:%M:%S",
 *                                      "%B"=Long text of month, "%A"=Long text of day, "%b"=Short text of month, "%a"=Short text of day
 *										"day", "daytext", "dayhour", "dayhourldap", "dayhourtext", "dayrfc", "dayhourrfc", "...inputnoreduce", "...reduceformat"
 * 	@param	string|bool	$tzoutput		true or 'gmt' => string is for Greenwich location
 * 										false or 'tzserver' => output string is for local PHP server TZ usage
 * 										'tzuser' => output string is for user TZ (current browser TZ with current dst) => In a future, we should have same behaviour than 'tzuserrel'
 *                                      'tzuserrel' => output string is for user TZ (current browser TZ with dst or not, depending on date position)
 *	@param	?Translate	$outputlangs	Object lang that contains language for text translation.
 *  @param  boolean		$encodetooutput false=no convert into output pagecode
 * 	@return string      				Formatted date or '' if time is null
 *
 *  @see        dol_mktime(), dol_stringtotime(), dol_getdate(), selectDate()
 */
function dol_print_date($time, $format = '', $tzoutput = 'auto', $outputlangs = \null, $encodetooutput = \false)
{
}
/**
 *  Return an array with locale date info.
 *  WARNING: This function use PHP server timezone by default to return locale information.
 *  Be aware to add the third parameter to "UTC" if you need to work on UTC.
 *
 *	@param	int			$timestamp      Timestamp
 *	@param	boolean		$fast           Fast mode. deprecated.
 *  @param	string		$forcetimezone	'' to use the PHP server timezone. Or use a form like 'gmt', 'Europe/Paris' or '+0200' to force timezone.
 *	@return	array{}|array{seconds:int<0,59>,minutes:int<0,59>,hours:int<0,23>,mday:int<1,31>,wday:int<0,6>,mon:int<1,12>,year:int<0,9999>,yday:int<0,366>,0:int}						Array of information
 *										'seconds' => $secs,
 *										'minutes' => $min,
 *										'hours' => $hour,
 *										'mday' => $day,
 *										'wday' => $dow,		0=sunday, 6=saturday
 *										'mon' => $month,
 *										'year' => $year,
 *										'yday' => floor($secsInYear/$_day_power)
 *										'0' => original timestamp
 * 	@see 								dol_print_date(), dol_stringtotime(), dol_mktime()
 */
function dol_getdate($timestamp, $fast = \false, $forcetimezone = '')
{
}
/**
 *	Return a timestamp date built from detailed information (by default a local PHP server timestamp)
 * 	Replace function mktime not available under Windows if year < 1970
 *	PHP mktime is restricted to the years 1901-2038 on Unix and 1970-2038 on Windows
 *
 * 	@param	int			$hour			Hour	(can be -1 for undefined)
 *	@param	int			$minute			Minute	(can be -1 for undefined)
 *	@param	int			$second			Second	(can be -1 for undefined)
 *	@param	int			$month			Month (1 to 12)
 *	@param	int			$day			Day (1 to 31)
 *	@param	int			$year			Year
 *	@param	bool|int|string	$gm			True or 1 or 'gmt'=Input information are GMT values
 *										False or 0 or 'tzserver' = local to server TZ
 *										'auto'
 *										'tzuser' = local to user TZ taking dst into account at the current date. Not yet implemented.
 *										'tzuserrel' = local to user TZ taking dst into account at the given date. Use this one to convert date input from user into a GMT date.
 *										'tz,TimeZone' = use specified timezone
 *	@param	int			$check			0=No check on parameters (Can use day 32, etc...)
 *	@return	int|string					Date as a timestamp, '' if error
 * 	@see 								dol_print_date(), dol_stringtotime(), dol_getdate()
 */
function dol_mktime($hour, $minute, $second, $month, $day, $year, $gm = 'auto', $check = 1)
{
}
/**
 *  Return date for now. In most cases, we use this function without parameters (that means GMT time).
 *
 *  @param	string		$mode	'auto' => for backward compatibility (avoid this),
 *  							'gmt' => we return GMT timestamp,
 * 								'tzserver' => we add the PHP server timezone
 *  							'tzref' => we add the company timezone. Not implemented.
 * 								'tzuser' or 'tzuserrel' => we add the user timezone
 *	@return int   $date	Timestamp
 */
function dol_now($mode = 'auto')
{
}
/**
 * Return string with formatted size
 *
 * @param	int		$size		Size to print
 * @param	int		$shortvalue	Tell if we want long value to use another unit (Ex: 1.5Kb instead of 1500b)
 * @param	int		$shortunit	Use short label of size unit (for example 'b' instead of 'bytes')
 * @return	string				Link
 */
function dol_print_size($size, $shortvalue = 0, $shortunit = 0)
{
}
/**
 * Show Url link
 *
 * @param	string		$url		Url to show
 * @param	string		$target		Target for link
 * @param	int			$max		Max number of characters to show
 * @param	int			$withpicto	With picto
 * @param	string		$morecss	More CSS
 * @return	string					HTML Link
 */
function dol_print_url($url, $target = '_blank', $max = 32, $withpicto = 0, $morecss = '')
{
}
/**
 * Show EMail link formatted for HTML output.
 *
 * @param	string		$email			EMail to show (only email, without 'Name of recipient' before)
 * @param 	int			$cid 			Id of contact if known
 * @param 	int			$socid 			Id of third party if known
 * @param 	int|string	$addlink		0=no link, 1=email has a html email link (+ link to create action if constant AGENDA_ADDACTIONFOREMAIL is on), 'thirdparty'=link to the thirdparty presend email
 * @param	int			$max			Max number of characters to show. Use -1 to hide the mail text and show only the picto.
 * @param	int			$showinvalid	1=Show warning if syntax email is wrong
 * @param	int|string	$withpicto		0=Show email, 1=Show picto of email + email, 2=Show only picto
 * @param	string		$morecss		More CSS
 * @return	string						HTML Link
 */
function dol_print_email($email, $cid = 0, $socid = 0, $addlink = 0, $max = 64, $showinvalid = 1, $withpicto = 0, $morecss = 'paddingrightonly')
{
}
/**
 * Get array of social network dictionary
 *
 * @return	array<string,array{rowid:int,label:string,url:string,icon:string,active:int}>	Array of Social Networks Dictionary
 */
function getArrayOfSocialNetworks()
{
}
/**
 * Show social network link
 *
 * @param	string		$value				Social network ID to show (only skype, without 'Name of recipient' before)
 * @param	int 		$cid 				Id of contact if known
 * @param	int 		$socid 				Id of third party if known
 * @param	string 		$type				'skype','facebook',...
 * @param	array<string,array{rowid:int,label:string,url:string,icon:string,active:int}>	$dictsocialnetworks		List of socialnetworks available
 * @return	string							HTML Link
 */
function dol_print_socialnetworks($value, $cid, $socid, $type, $dictsocialnetworks = array())
{
}
/**
 *	Format professional IDs according to their country
 *
 *	@param	string	$profID			Value of profID to format
 *	@param	string	$profIDtype		Type of profID to format ('1', '2', '3', '4', '5', '6' or 'VAT')
 *	@param	string	$countrycode	Country code to use for formatting
 *	@param	int<0,2>	$addcpButton	Add button to copy to clipboard (1 => show only on hoover ; 2 => always display )
 *	@return string					Formatted profID
 */
function dol_print_profids($profID, $profIDtype, $countrycode = '', $addcpButton = 1)
{
}
/**
 * 	Format phone numbers according to country
 *
 * 	@param  string  $phone          Phone number to format
 * 	@param  string  $countrycode    Country code to use for formatting
 * 	@param 	int		$cid 		    Id of contact if known
 * 	@param 	int		$socid          Id of third party if known
 * 	@param 	string	$addlink	    ''=no link to create action, 'AC_TEL'=add link to clicktodial (if module enabled) and add link to create event (if conf->global->AGENDA_ADDACTIONFORPHONE set), 'tel'=Force "tel:..." link
 * 	@param 	string	$separ 		    Separation between numbers for a better visibility example : xx.xx.xx.xx.xx. You can also use 'hidenum' to hide the number, keep only the picto.
 *  @param	string  $withpicto      Show picto ('fax', 'phone', 'mobile')
 *  @param	string	$titlealt	    Text to show on alt
 *  @param  int     $adddivfloat    Add div float around phone.
 *  @param	string	$morecss		Add more css
 * 	@return string 				    Formatted phone number
 */
function dol_print_phone($phone, $countrycode = '', $cid = 0, $socid = 0, $addlink = '', $separ = "&nbsp;", $withpicto = '', $titlealt = '', $adddivfloat = 0, $morecss = 'paddingright')
{
}
/**
 * 	Return an IP formatted to be shown on screen
 *
 * 	@param	string	$ip			IP
 * 	@param	int		$mode		0=return IP + country/flag, 1=return only country/flag, 2=return only IP
 * 	@return string 				Formatted IP, with country if GeoIP module is enabled
 */
function dol_print_ip($ip, $mode = 0)
{
}
/**
 * Return the real IP of remote user.
 * Take HTTP_X_FORWARDED_FOR (defined when using proxy)
 * Then HTTP_CLIENT_IP if defined (rare)
 * Then REMOTE_ADDR (the last seerver ip in proxy chain).
 * 			REMOTE_ADDR can't be modified by client and may be the IP of a proxy.
 * 			Note: that if Apache module "remoteip" module is on, $_SERVER["REMOTE_ADDR"] may be replaced y HTTP_X_FORWARDED_FOR directly
 * 					from CF-Connecting-IP, but only if remote is in trusted cloudflare list.
 *
 * @param	int		$trusted	0=Default, 1=Trusted value (the last IP that was not altered by client)
 * @return	string				Real IP of remote user.
 */
function getUserRemoteIP($trusted = 0)
{
}
/**
 * Return if we are using a HTTPS connection
 * Check HTTPS (no way to be modified by user but may be empty or wrong if user is using a proxy)
 * Take HTTP_X_FORWARDED_PROTO (defined when using proxy)
 * Then HTTP_X_FORWARDED_SSL
 *
 * @return	boolean		True if user is using HTTPS
 */
function isHTTPS()
{
}
/**
 * 	Return a country code from IP. Empty string if not found.
 *
 * 	@param	string	$ip			IP
 * 	@return string 				Country code ('us', 'fr', ...)
 */
function dolGetCountryCodeFromIp($ip)
{
}
/**
 *  Return country code for current user.
 *  If software is used inside a local network, detection may fails (we need a public ip)
 *
 *  @return     string      Country code (fr, es, it, us, ...)
 */
function dol_user_country()
{
}
/**
 *  Format address string
 *
 *  @param	string	$address    Address string, already formatted with dol_format_address()
 *  @param  string	$htmlid     Html ID (for example 'gmap')
 *  @param  string	$element    'thirdparty'|'contact'|'member'|'user'|'other'
 *  @param  int		$id         Id of object
 *  @param	int		$noprint	No output. Result is the function return
 *  @param  string  $charfornl  Char to use instead of nl2br. '' means we use a standad nl2br.
 *  @return ?string				Nothing if noprint is 0, formatted address if noprint is 1
 *  @see dol_format_address()
 */
function dol_print_address($address, $htmlid, $element, $id, $noprint = 0, $charfornl = '')
{
}
/**
 *	Return true if email syntax is ok.
 *
 *	@param	    string		$address    			email (Ex: "toto@example.com". Long form "John Do <johndo@example.com>" will be false)
 *  @param		int			$acceptsupervisorkey	If 1, the special string '__SUPERVISOREMAIL__' is also accepted as valid
 *  @param		int			$acceptuserkey			If 1, the special string '__USER_EMAIL__' is also accepted as valid
 *	@return     boolean     						true if email syntax is OK, false if KO or empty string
 *  @see isValidMXRecord()
 */
function isValidEmail($address, $acceptsupervisorkey = 0, $acceptuserkey = 0)
{
}
/**
 *	Return if the domain name has a valid MX record.
 *  WARNING: This need function idn_to_ascii, checkdnsrr and getmxrr
 *
 *	@param	    string		$domain	    			Domain name (Ex: "yahoo.com", "yhaoo.com", "dolibarr.fr")
 *	@return     int     							-1 if error (function not available), 0=Not valid, 1=Valid
 *  @see isValidEmail()
 *  @suppress PhanDeprecatedFunctionInternal Error in Phan plugins incorrectly tags some functions here
 */
function isValidMXRecord($domain)
{
}
/**
 *  Return true if phone number syntax is ok
 *  TODO Decide what to do with this
 *
 *  @param	string		$phone		phone (Ex: "0601010101")
 *  @return boolean     			true if phone syntax is OK, false if KO or empty string
 */
function isValidPhone($phone)
{
}
/**
 * Return first letters of a strings.
 * Example with nbofchar=1: 'ghi' will return 'g' but 'abc def' will return 'ad'
 * Example with nbofchar=2: 'ghi' will return 'gh' but 'abc def' will return 'abde'
 *
 * @param	string	$s				String to truncate
 * @param 	int		$nbofchar		Nb of characters to keep
 * @return	string					Return first chars.
 */
function dolGetFirstLetters($s, $nbofchar = 1)
{
}
/**
 * Make a strlen call. Works even if mbstring module not enabled
 *
 * @param   string		$string				String to calculate length
 * @param   string		$stringencoding		Encoding of string
 * @return  int								Length of string
 */
function dol_strlen($string, $stringencoding = 'UTF-8')
{
}
/**
 * Make a substring. Works even if mbstring module is not enabled for better compatibility.
 *
 * @param	string		$string				String to scan
 * @param	int			$start				Start position (0 for first char)
 * @param	int|null	$length				Length (in nb of characters or nb of bytes depending on trunconbytes param)
 * @param   string		$stringencoding		Page code used for input string encoding
 * @param	int			$trunconbytes		1=Length is max of bytes instead of max of characters
 * @return  string							substring
 */
function dol_substr($string, $start, $length = \null, $stringencoding = '', $trunconbytes = 0)
{
}
/**
 *	Truncate a string to a particular length adding '…' if string larger than length.
 * 	If length = max length+1, we do no truncate to avoid having just 1 char replaced with '…'.
 *  MAIN_DISABLE_TRUNC=1 can disable all truncings
 *
 *	@param	string	$string				String to truncate
 *	@param  int		$size				Max string size visible (excluding …). 0 for no limit. WARNING: Final string size can have 3 more chars (if we added …, or if size was max+1 so it does not worse to replace with ...)
 *	@param	string	$trunc				Where to trunc: 'right', 'left', 'middle' (size must be a 2 power), 'wrap'
 * 	@param	string	$stringencoding		Tell what is source string encoding
 *  @param	int		$nodot				Truncation do not add … after truncation. So it's an exact truncation.
 *  @param  int     $display            Trunc is used to display data and can be changed for small screen. TODO Remove this param (must be dealt with CSS)
 *	@return string						Truncated string. WARNING: length is never higher than $size if $nodot is set, but can be 3 chars higher otherwise.
 */
function dol_trunc($string, $size = 40, $trunc = 'right', $stringencoding = 'UTF-8', $nodot = 0, $display = 0)
{
}
/**
 * Return the picto for a data type
 *
 * @param 	string		$key		Key
 * @param	string		$morecss	Add more css to the object
 * @return 	string					Pïcto for the key
 */
function getPictoForType($key, $morecss = '')
{
}
/**
 *	Show picto whatever it's its name (generic function)
 *
 *	@param      string		$titlealt         		Text on title tag for tooltip. Not used if param notitle is set to 1.
 *	@param      string		$picto       			Name of image file to show ('filenew', ...).
 *													For font awesome icon (example 'user'), you can use picto_nocolor to not have the color of picto forced.
 *													If no extension provided and it is not a font awesome icon, we use '.png'. Image must be stored into theme/xxx/img directory.
 *                                  				Example: picto.png                  if picto.png is stored into htdocs/theme/mytheme/img
 *                                  				Example: picto.png@mymodule         if picto.png is stored into htdocs/mymodule/img
 *                                  				Example: /mydir/mysubdir/picto.png  if picto.png is stored into htdocs/mydir/mysubdir (pictoisfullpath must be set to 1)
 *                                                  Example: fontawesome_envelope-open-text_fas_red_1em if you want to use fontaweseome icons: fontawesome_<icon-name>_<style>_<color>_<size> (only icon-name is mandatory)
 *	@param		string		$moreatt				Add more attribute on img tag (For example 'class="pictofixedwidth"')
 *	@param		int<0,1>    $pictoisfullpath		If true or 1, image path is a full path, 0 if not
 *	@param		int			$srconly				Return only content of the src attribute of img.
 *  @param		int			$notitle				1=Disable tag title. Use it if you add js tooltip, to avoid duplicate tooltip.
 *  @param		string		$alt					Force alt for blind people
 *  @param		string		$morecss				Add more class css on img tag (For example 'myclascss').
 *  @param		int 		$marginleftonlyshort	1 = Add a short left margin on picto, 2 = Add a larger left margin on picto, 0 = No margin left. Works for fontawesome picto only.
 *  @return     string       				    	Return img tag
 *  @see        img_object(), img_picto_common()
 */
function img_picto($titlealt, $picto, $moreatt = '', $pictoisfullpath = 0, $srconly = 0, $notitle = 0, $alt = '', $morecss = '', $marginleftonlyshort = 2)
{
}
/**
 *	Show a picto called object_picto (generic function)
 *
 *	@param	string	$titlealt			Text on alt and title of image. Alt only if param notitle is set to 1. If text is "TextA:TextB", use Text A on alt and Text B on title.
 *	@param	string	$picto				Name of image to show object_picto (example: user, group, action, bill, contract, propal, product, ...)
 *										For external modules use imagename@mymodule to search into directory "img" of module.
 *	@param	string	$moreatt			Add more attribute on img tag (ie: class="datecallink")
 *	@param	int		$pictoisfullpath	If 1, image path is a full path
 *	@param	int		$srconly			Return only content of the src attribute of img.
 *  @param	int		$notitle			1=Disable tag title. Use it if you add js tooltip, to avoid duplicate tooltip.
 *	@return	string						Return img tag
 *	@see	img_picto(), img_picto_common()
 */
function img_object($titlealt, $picto, $moreatt = '', $pictoisfullpath = 0, $srconly = 0, $notitle = 0)
{
}
/**
 *	Show weather picto
 *
 *	@param      string		$titlealt         	Text on alt and title of image. Alt only if param notitle is set to 1. If text is "TextA:TextB", use Text A on alt and Text B on title.
 *	@param      string|int	$picto       		Name of image file to show (If no extension provided, we use '.png'). Image must be stored into htdocs/theme/common directory. Or level of meteo image (0-4).
 *	@param		string		$moreatt			Add more attribute on img tag
 *	@param		int			$pictoisfullpath	If 1, image path is a full path
 *  @param      string      $morecss            More CSS
 *	@return     string      					Return img tag
 *  @see        img_object(), img_picto()
 */
function img_weather($titlealt, $picto, $moreatt = '', $pictoisfullpath = 0, $morecss = '')
{
}
/**
 *	Show picto (generic function)
 *
 *	@param      string		$titlealt         	Text on alt and title of image. Alt only if param notitle is set to 1. If text is "TextA:TextB", use Text A on alt and Text B on title.
 *	@param      string		$picto       		Name of image file to show (If no extension provided, we use '.png'). Image must be stored into htdocs/theme/common directory.
 *	@param		string		$moreatt			Add more attribute on img tag
 *	@param		int			$pictoisfullpath	If 1, image path is a full path
 *  @param		int			$notitle			1=Disable tag title. Use it if you add js tooltip, to avoid duplicate tooltip.
 *	@return     string      					Return img tag
 *  @see        img_object(), img_picto()
 */
function img_picto_common($titlealt, $picto, $moreatt = '', $pictoisfullpath = 0, $notitle = 0)
{
}
/**
 *	Show logo action
 *
 *	@param	string		$titlealt       Text on alt and title of image. Alt only if param notitle is set to 1. If text is "TextA:TextB", use Text A on alt and Text B on title.
 *	@param  string		$numaction   	Action id or code to show
 *	@param 	string		$picto      	Name of image file to show ('filenew', ...)
 *                                      If no extension provided, we use '.png'. Image must be stored into theme/xxx/img directory.
 *                                      Example: picto.png                  if picto.png is stored into htdocs/theme/mytheme/img
 *                                      Example: picto.png@mymodule         if picto.png is stored into htdocs/mymodule/img
 *                                      Example: /mydir/mysubdir/picto.png  if picto.png is stored into htdocs/mydir/mysubdir (pictoisfullpath must be set to 1)
 *  @param	string		$moreatt		More attributes
 *	@return string      				Return an img tag
 */
function img_action($titlealt, $numaction, $picto = '', $moreatt = '')
{
}
/**
 *  Show pdf logo
 *
 *  @param	string		$titlealt   Text on alt and title of image. Alt only if param notitle is set to 1. If text is "TextA:TextB", use Text A on alt and Text B on title.
 *  @param  int		    $size       Taille de l'icone : 3 = 16x16px , 2 = 14x14px
 *  @return string      			Retourne tag img
 */
function img_pdf($titlealt = 'default', $size = 3)
{
}
/**
 *	Show logo +
 *
 *	@param	string	$titlealt   Text on alt and title of image. Alt only if param notitle is set to 1. If text is "TextA:TextB", use Text A on alt and Text B on title.
 *	@param  string	$other      Add more attributes on img
 *	@return string      		Return tag img
 */
function img_edit_add($titlealt = 'default', $other = '')
{
}
/**
 *	Show logo -
 *
 *	@param	string	$titlealt	Text on alt and title of image. Alt only if param notitle is set to 1. If text is "TextA:TextB", use Text A on alt and Text B on title.
 *	@param  string	$other      Add more attributes on img
 *	@return string      		Return tag img
 */
function img_edit_remove($titlealt = 'default', $other = '')
{
}
/**
 *	Show logo edit/modify fiche
 *
 *	@param  string	$titlealt   Text on alt and title of image. Alt only if param notitle is set to 1. If text is "TextA:TextB", use Text A on alt and Text B on title.
 *	@param  integer	$float      If you have to put the style "float: right"
 *	@param  string	$other		Add more attributes on img
 *	@return string      		Return tag img
 */
function img_edit($titlealt = 'default', $float = 0, $other = '')
{
}
/**
 *	Show logo view card
 *
 *	@param	string	$titlealt   Text on alt and title of image. Alt only if param notitle is set to 1. If text is "TextA:TextB", use Text A on alt and Text B on title.
 *	@param  integer	$float      If you have to put the style "float: right"
 *	@param  string	$other		Add more attributes on img
 *	@return string      		Return tag img
 */
function img_view($titlealt = 'default', $float = 0, $other = 'class="valignmiddle"')
{
}
/**
 *  Show delete logo
 *
 *  @param	string	$titlealt   Text on alt and title of image. Alt only if param notitle is set to 1. If text is "TextA:TextB", use Text A on alt and Text B on title.
 *	@param  string	$other      Add more attributes on img
 *  @param	string	$morecss	More CSS
 *  @return string      		Retourne tag img
 */
function img_delete($titlealt = 'default', $other = 'class="pictodelete"', $morecss = '')
{
}
/**
 *  Show printer logo
 *
 *  @param  string  $titlealt   Text on alt and title of image. Alt only if param notitle is set to 1. If text is "TextA:TextB", use Text A on alt and Text B on title.
 *  @param  string  $other      Add more attributes on img
 *  @return string              Retourne tag img
 */
function img_printer($titlealt = "default", $other = '')
{
}
/**
 *  Show split logo
 *
 *  @param	string	$titlealt   Text on alt and title of image. Alt only if param notitle is set to 1. If text is "TextA:TextB", use Text A on alt and Text B on title.
 *	@param  string	$other      Add more attributes on img
 *  @return string      		Retourne tag img
 */
function img_split($titlealt = 'default', $other = 'class="pictosplit"')
{
}
/**
 *	Show help logo with cursor "?"
 *
 * 	@param	int              	$usehelpcursor		1=Use help cursor, 2=Use click pointer cursor, 0=No specific cursor
 * 	@param	int|string	        $usealttitle		Text to use as alt title
 * 	@return string            	           			Return tag img
 */
function img_help($usehelpcursor = 1, $usealttitle = 1)
{
}
/**
 *	Show info logo
 *
 *	@param	string	$titlealt   Text on alt and title of image. Alt only if param notitle is set to 1. If text is "TextA:TextB", use Text A on alt and Text B on title.
 *	@return string      		Return img tag
 */
function img_info($titlealt = 'default')
{
}
/**
 *	Show warning logo
 *
 *	@param	string	$titlealt   Text on alt and title of image. Alt only if param notitle is set to 1. If text is "TextA:TextB", use Text A on alt and Text B on title.
 *	@param	string	$moreatt	Add more attribute on img tag (For example 'style="float: right"'). If 1, add float: right. Can't be "class" attribute.
 *  @param	string  $morecss	Add more CSS
 *	@return string      		Return img tag
 */
function img_warning($titlealt = 'default', $moreatt = '', $morecss = 'pictowarning')
{
}
/**
 *  Show error logo
 *
 *	@param	string	$titlealt   Text on alt and title of image. Alt only if param notitle is set to 1. If text is "TextA:TextB", use Text A on alt and Text B on title.
 *	@return string      		Return img tag
 */
function img_error($titlealt = 'default')
{
}
/**
*	Show next logo
*
*	@param	string	$titlealt   Text on alt and title of image. Alt only if param notitle is set to 1. If text is "TextA:TextB", use Text A on alt and Text B on title.
*	@param	string	$moreatt	Add more attribute on img tag (For example 'style="float: right"')
*	@return string      		Return img tag
*/
function img_next($titlealt = 'default', $moreatt = '')
{
}
/**
 *	Show previous logo
 *
 *	@param	string	$titlealt   Text on alt and title of image. Alt only if param notitle is set to 1. If text is "TextA:TextB", use Text A on alt and Text B on title.
 *	@param	string	$moreatt	Add more attribute on img tag (For example 'style="float: right"')
 *	@return string      		Return img tag
 */
function img_previous($titlealt = 'default', $moreatt = '')
{
}
/**
 *	Show down arrow logo
 *
 *	@param	string	$titlealt   Text on alt and title of image. Alt only if param notitle is set to 1. If text is "TextA:TextB", use Text A on alt and Text B on title.
 *	@param  int		$selected   Selected
 *  @param	string	$moreclass	Add more CSS classes
 *	@return string      		Return img tag
 */
function img_down($titlealt = 'default', $selected = 0, $moreclass = '')
{
}
/**
 *	Show top arrow logo
 *
 *	@param	string	$titlealt   Text on alt and title of image. Alt only if param notitle is set to 1. If text is "TextA:TextB", use Text A on alt and Text B on title.
 *	@param  int		$selected	Selected
 *  @param	string	$moreclass	Add more CSS classes
 *	@return string      		Return img tag
 */
function img_up($titlealt = 'default', $selected = 0, $moreclass = '')
{
}
/**
 *	Show left arrow logo
 *
 *	@param	string	$titlealt   Text on alt and title of image. Alt only if param notitle is set to 1. If text is "TextA:TextB", use Text A on alt and Text B on title.
 *	@param  int		$selected	Selected
 *	@param	string	$moreatt	Add more attribute on img tag (For example 'style="float: right"')
 *	@return string      		Return img tag
 */
function img_left($titlealt = 'default', $selected = 0, $moreatt = '')
{
}
/**
 *	Show right arrow logo
 *
 *	@param	string	$titlealt   Text on alt and title of image. Alt only if param notitle is set to 1. If text is "TextA:TextB", use Text A on alt and Text B on title.
 *	@param  int		$selected	Selected
 *	@param	string	$moreatt	Add more attribute on img tag (For example 'style="float: right"')
 *	@return string      		Return img tag
 */
function img_right($titlealt = 'default', $selected = 0, $moreatt = '')
{
}
/**
 *	Show tick logo if allowed
 *
 *	@param	string	$allow		Allow
 *	@param	string	$titlealt   Text on alt and title of image. Alt only if param notitle is set to 1. If text is "TextA:TextB", use Text A on alt and Text B on title.
 *	@return string      		Return img tag
 */
function img_allow($allow, $titlealt = 'default')
{
}
/**
 *	Return image of a credit card according to its brand name
 *
 *	@param  string	$brand		Brand name of credit card
 *  @param  string	$morecss	More CSS
 *	@return string     			Return img tag
 */
function img_credit_card($brand, $morecss = \null)
{
}
/**
 *	Show MIME img of a file
 *
 *	@param	string	$file		Filename
 * 	@param	string	$titlealt	Text on alt and title of image. Alt only if param notitle is set to 1. If text is "TextA:TextB", use Text A on alt and Text B on title.
 *  @param	string	$morecss	More css
 *	@return string     			Return img tag
 */
function img_mime($file, $titlealt = '', $morecss = '')
{
}
/**
 *  Show search logo
 *
 *  @param	string	$titlealt   Text on alt and title of image. Alt only if param notitle is set to 1. If text is "TextA:TextB", use Text A on alt and Text B on title.
 *	@param  string	$other      Add more attributes on img
 *  @return string      		Retourne tag img
 */
function img_search($titlealt = 'default', $other = '')
{
}
/**
 *  Show search logo
 *
 *  @param	string	$titlealt   Text on alt and title of image. Alt only if param notitle is set to 1. If text is "TextA:TextB", use Text A on alt and Text B on title.
 *	@param  string	$other      Add more attributes on img
 *  @return string      		Retourne tag img
 */
function img_searchclear($titlealt = 'default', $other = '')
{
}
/**
 *	Show information in HTML for admin users or standard users
 *
 *	@param	string	$text				Text info
 *	@param  integer	$infoonimgalt		Info is shown only on alt of star picto, otherwise it is show on output after the star picto
 *	@param	int		$nodiv				No div
 *  @param  string  $admin      	    '1'=Info for admin users. '0'=Info for standard users (change only the look), 'error', 'warning', 'xxx'=Other
 *  @param	string	$morecss			More CSS ('', 'warning', 'error')
 *  @param	string	$textfordropdown	Show a text to click to dropdown the info box.
 *  @param	string	$picto				'' or 'warning'
 *	@return	string						String with info text
 */
function info_admin($text, $infoonimgalt = 0, $nodiv = 0, $admin = '1', $morecss = 'hideonsmartphone', $textfordropdown = '', $picto = '')
{
}
/**
 *  Displays error message system with all the information to facilitate the diagnosis and the escalation of the bugs.
 *  This function must be called when a blocking technical error is encountered.
 *  However, one must try to call it only within php pages, classes must return their error through their property "error".
 *
 *	@param	 	DoliDB|null     $db      	Database handler
 *	@param  	string|string[] $error		String or array of errors strings to show
 *  @param		string[]|null   $errors		Array of errors
 *	@return 	void
 *  @see    	dol_htmloutput_errors()
 */
function dol_print_error($db = \null, $error = '', $errors = \null)
{
}
/**
 * Show a public email and error code to contact if technical error
 *
 * @param	string		$prefixcode		Prefix of public error code
 * @param	string  	$errormessage	Complete error message
 * @param	string[]	$errormessages	Array of error messages
 * @param	string		$morecss		More css
 * @param	string		$email			Email
 * @return	void
 */
function dol_print_error_email($prefixcode, $errormessage = '', $errormessages = array(), $morecss = 'error', $email = '')
{
}
/**
 *	Show title line of an array
 *
 *	@param	string	$name        Label of field
 *	@param	string	$file        Url used when we click on sort picto
 *	@param	string	$field       Field to use for new sorting
 *	@param	string	$begin       ("" by default)
 *	@param	string	$moreparam   Add more parameters on sort url links ("" by default)
 *	@param  string	$moreattrib  Options of attribute td ("" by default)
 *	@param  string	$sortfield   Current field used to sort
 *	@param  string	$sortorder   Current sort order
 *  @param	string	$prefix		 Prefix for css. Use space after prefix to add your own CSS tag, for example 'mycss '.
 *  @param	string	$tooltip	 Tooltip
 *  @param	int		$forcenowrapcolumntitle		No need for use 'wrapcolumntitle' css style
 *	@return	void
 */
function print_liste_field_titre($name, $file = "", $field = "", $begin = "", $moreparam = "", $moreattrib = "", $sortfield = "", $sortorder = "", $prefix = "", $tooltip = "", $forcenowrapcolumntitle = 0)
{
}
/**
 *	Get title line of an array
 *
 *	@param	string	$name        		Translation key of field to show or complete HTML string to show
 *	@param	int		$thead		 		0=To use with standard table format, 1=To use inside <thead><tr>, 2=To use with <div>
 *	@param	string	$file        		Url used when we click on sort picto
 *	@param	string	$field       		Field to use for new sorting. Empty if this field is not sortable. Example "t.abc" or "t.abc,t.def"
 *	@param	string	$begin       		("" by default)
 *	@param	string	$moreparam   		Add more parameters on sort url links ("" by default)
 *	@param  string	$moreattrib  		Add more attributes on th ("" by default). To add more css class, use param $prefix.
 *	@param  string	$sortfield   		Current field used to sort (Ex: 'd.datep,d.id')
 *	@param  string	$sortorder   		Current sort order (Ex: 'asc,desc')
 *  @param	string	$prefix		 		Prefix for css. Use space after prefix to add your own CSS tag, for example 'mycss '.
 *  @param	int 	$disablesortlink	1=Disable sort link
 *  @param	string	$tooltip	 		Tooltip
 *  @param	int 	$forcenowrapcolumntitle		No need for use 'wrapcolumntitle' css style
 *	@return	string
 */
function getTitleFieldOfList($name, $thead = 0, $file = "", $field = "", $begin = "", $moreparam = "", $moreattrib = "", $sortfield = "", $sortorder = "", $prefix = "", $disablesortlink = 0, $tooltip = '', $forcenowrapcolumntitle = 0)
{
}
/**
 *	Show a title.
 *
 *	@param	string	$title			Title to show
 *  @return	void
 *  @deprecated						Use load_fiche_titre instead
 *  @see load_fiche_titre()
 */
function print_titre($title)
{
}
/**
 *	Show a title with picto
 *
 *	@param	string	$title				Title to show
 *	@param	string	$mesg				Added message to show on right
 *	@param	string	$picto				Icon to use before title (should be a 32x32 transparent png file)
 *	@param	int		$pictoisfullpath	1=Icon name is a full absolute url of image
 * 	@param	string	$id					To force an id on html objects by example id="name" where name is id
 * 	@return	void
 *  @deprecated Use print load_fiche_titre instead
 */
function print_fiche_titre($title, $mesg = '', $picto = 'generic', $pictoisfullpath = 0, $id = '')
{
}
/**
 *	Load a title with picto
 *
 *	@param	string	$title				Title to show (HTML sanitized content)
 *	@param	string	$morehtmlright		Added message to show on right
 *	@param	string	$picto				Icon to use before title (should be a 32x32 transparent png file)
 *	@param	int<0,1>	$pictoisfullpath	1=Icon name is a full absolute url of image
 * 	@param	string	$id					To force an id on html objects
 *  @param  string  $morecssontable     More css on table
 *	@param	string	$morehtmlcenter		Added message to show on center
 * 	@return	string
 *  @see print_barre_liste()
 */
function load_fiche_titre($title, $morehtmlright = '', $picto = 'generic', $pictoisfullpath = 0, $id = '', $morecssontable = '', $morehtmlcenter = '')
{
}
/**
 *	Print a title with navigation controls for pagination
 *
 *	@param	string	    $title				Title to show (required). Can be a string with a <br> as a substring.
 *	@param	int|null    $page				Numero of page to show in navigation links (required)
 *	@param	string	    $file				Url of page (required)
 *	@param	string	    $options         	More parameters for links ('' by default, does not include sortfield neither sortorder). Value must be 'urlencoded' before calling function.
 *	@param	string    	$sortfield       	Field to sort on ('' by default)
 *	@param	string	    $sortorder       	Order to sort ('' by default)
 *	@param	string	    $morehtmlcenter     String in the middle ('' by default). We often find here string $massaction coming from $form->selectMassAction()
 *	@param	int		    $num				Number of records found by select with limit+1
 *	@param	int|string  $totalnboflines		Total number of records/lines for all pages (if known). Use a negative value of number to not show number. Use '' if unknown.
 *	@param	string	    $picto				Icon to use before title (should be a 32x32 transparent png file)
 *	@param	int		    $pictoisfullpath	1=Icon name is a full absolute url of image
 *  @param	string	    $morehtmlright		More html to show (after arrows)
 *  @param  string      $morecss            More css to the table
 *  @param  int         $limit              Max number of lines (-1 = use default, 0 = no limit, > 0 = limit).
 *  @param  int|string  $selectlimitsuffix    Suffix for limit ID of -1 to hide the select limit combo
 *  @param  int         $hidenavigation     Force to hide the arrows and page for navigation
 *  @param  int			$pagenavastextinput 1=Do not suggest list of pages to navigate but suggest the page number into an input field.
 *  @param	string		$morehtmlrightbeforearrow	More html to show (before arrows)
 *	@return	void
 */
function print_barre_liste($title, $page, $file, $options = '', $sortfield = '', $sortorder = '', $morehtmlcenter = '', $num = -1, $totalnboflines = '', $picto = 'generic', $pictoisfullpath = 0, $morehtmlright = '', $morecss = '', $limit = -1, $selectlimitsuffix = 0, $hidenavigation = 0, $pagenavastextinput = 0, $morehtmlrightbeforearrow = '')
{
}
/**
 *	Function to show navigation arrows into lists
 *
 *	@param	int				$page				Number of page
 *	@param	string			$file				Page URL (in most cases provided with $_SERVER["PHP_SELF"])
 *	@param	string			$options         	Other url parameters to propagate ("" by default, may include sortfield and sortorder)
 *	@param	integer			$nextpage	    	Do we show a next page button
 *	@param	string			$betweenarrows		HTML content to show between arrows. MUST contains '<li> </li>' tags or '<li><span> </span></li>'.
 *  @param	string			$afterarrows		HTML content to show after arrows. Must NOT contains '<li> </li>' tags.
 *  @param  int             $limit              Max nb of record to show  (-1 = no combo with limit, 0 = no limit, > 0 = limit)
 *	@param	int		        $totalnboflines		Total number of records/lines for all pages (if known)
 *  @param  int|string      $selectlimitsuffix  A suffix for the limit ID, or -1 to hide the select of limit
 *  @param	string			$beforearrows		HTML content to show before arrows. Must NOT contains '<li> </li>' tags.
 *  @param  int        		$hidenavigation     Force to hide the switch mode view and the navigation tool (hide limit section, html in $betweenarrows and $afterarrows but not $beforearrows)
 *	@return	void
 */
function print_fleche_navigation($page, $file, $options = '', $nextpage = 0, $betweenarrows = '', $afterarrows = '', $limit = -1, $totalnboflines = 0, $selectlimitsuffix = '', $beforearrows = '', $hidenavigation = 0)
{
}
/**
 *	Return a string with VAT rate label formatted for view output
 *	Used into pdf and HTML pages
 *
 *	@param	string	$rate			Rate value to format ('19.6', '19,6', '19.6%', '19,6%', '19.6 (CODEX)', ...)
 *  @param	boolean	$addpercent		Add a percent % sign in output
 *	@param	int		$info_bits		Miscellaneous information on vat (0=Default, 1=French NPR vat)
 *	@param	int		$usestarfornpr	-1=Never show, 0 or 1=Use '*' for NPR vat rates
 *  @param	int		$html			Used for html output
 *  @return	string					String with formatted amounts ('19,6' or '19,6%' or '8.5% (NPR)' or '8.5% *' or '19,6 (CODEX)')
 */
function vatrate($rate, $addpercent = \false, $info_bits = 0, $usestarfornpr = 0, $html = 0)
{
}
/**
 *		Function to format a value into an amount for visual output
 *		Function used into PDF and HTML pages
 *
 *		@param	string|float			$amount			Amount value to format
 *		@param	int<0,1>				$form			Type of formatting: 1=HTML, 0=no formatting (no by default)
 *		@param	Translate|string|null	$outlangs		Object langs for output. '' use default lang. 'none' use international separators.
 *		@param	int						$trunc			1=Truncate if there is more decimals than MAIN_MAX_DECIMALS_SHOWN (default), 0=Does not truncate. Deprecated because amount are rounded (to unit or total amount accuracy) before being inserted into database or after a computation, so this parameter should be useless.
 *		@param	int<-1,max>				$rounding		MINIMUM number of decimal to show: 0=no change, -1=we use min(getDolGlobalString('MAIN_MAX_DECIMALS_UNIT'), getDolGlobalString('MAIN_MAX_DECIMALS_TOT'))
 *		@param	''|'MU'|'MT'|'MS'|'CU'|'CT'|int<-2,max>	$forcerounding	MAXIMUM number of decimal to forcerounding decimal: -1=no change, -2=keep non zero part, 'MU' or 'MT' or a numeric to round to MU or MT or to a given number of decimal
 *		@param	string					$currency_code	To add currency symbol (''=add nothing, 'auto'=Use default currency, 'XXX'=add currency symbols for XXX currency)
 *		@return	string									String with formatted amount
 *
 *		@see	price2num()								Revert function of price
 */
function price($amount, $form = 0, $outlangs = '', $trunc = 1, $rounding = -1, $forcerounding = -1, $currency_code = '')
{
}
/**
 *	Function that return a number with universal decimal format (decimal separator is '.') from an amount typed by a user.
 *	Function to use on each input amount before any numeric test or database insert. A better name for this function
 *  should be roundtext2num().
 *
 *	@param	string|float	$amount			Amount to convert/clean or round
 *	@param	''|'MU'|'MT'|'MS'|'CU'|'CT'|int<0,max>	$rounding		''=No rounding
 *                                                                  'MU'=Round to Max unit price (MAIN_MAX_DECIMALS_UNIT)
 *                                                                  'MT'=Round to Max for totals with Tax (MAIN_MAX_DECIMALS_TOT)
 *                                                                  'MS'=Round to Max for stock quantity (MAIN_MAX_DECIMALS_STOCK)
 *                                                                  'CU'=Round to Max unit price of foreign currency accuracy
 *                                                                  'CT'=Round to Max for totals with Tax of foreign currency accuracy
 *                                                                  Numeric = Nb of digits for rounding (For example 2 for a percentage)
 * 	@param	int<0,2>		$option			Put 1 if you know that content is already universal format number (so no correction on decimal will be done)
 * 											Put 2 if you know that number is a user input (so we know we have to fix decimal separator).
 *	@return	string							Amount with universal numeric format (Example: '99.99999'), or error message.
 *											If conversion fails to return a numeric, it returns:
 *											- text unchanged or partial if ($rounding = ''): price2num('W9ç', '', 0)   => '9ç', price2num('W9ç', '', 1)   => 'W9ç', price2num('W9ç', '', 2)   => '9ç'
 *											- '0' if ($rounding is defined):                 price2num('W9ç', 'MT', 0) => '9',  price2num('W9ç', 'MT', 1) => '0',   price2num('W9ç', 'MT', 2) => '9'
 *											Note: The best way to guarantee a numeric value is to add a cast (float) before the price2num().
 *											If amount is null or '', it returns '' if $rounding = '', it returns '0' if $rounding is defined.
 *
 *	@see    price()							Opposite function of price2num
 */
function price2num($amount, $rounding = '', $option = 0)
{
}
/**
 * Output a dimension with best unit
 *
 * @param   float       $dimension      	Dimension
 * @param   int         $unit           	Unit scale of dimension (Example: 0=kg, -3=g, -6=mg, 98=ounce, 99=pound, ...)
 * @param   string      $type           	'weight', 'volume', ...
 * @param   Translate   $outputlangs    	Translate language object
 * @param   int<-1,max> $round          	-1 = non rounding, x = number of decimal
 * @param   string      $forceunitoutput    'no' or numeric (-3, -6, ...) compared to $unit (In most case, this value is value defined into $conf->global->MAIN_WEIGHT_DEFAULT_UNIT)
 * @param	int			$use_short_label	1=Use short label ('g' instead of 'gram'). Short labels are not translated.
 * @return  string                      	String to show dimensions
 */
function showDimensionInBestUnit($dimension, $unit, $type, $outputlangs, $round = -1, $forceunitoutput = 'no', $use_short_label = 0)
{
}
/**
 *	Return localtax rate for a particular vat, when selling a product with vat $vatrate, from a $thirdparty_buyer to a $thirdparty_seller
 *  Note: This function applies same rules than get_default_tva
 *
 * 	@param	float|string	$vatrate	        Vat rate. Can be '8.5' or '8.5 (VATCODEX)' for example
 * 	@param  int			$local		         	Local tax to search and return (1 or 2 return only tax rate 1 or tax rate 2)
 *  @param  Societe		$thirdparty_buyer    	Object of buying third party
 *  @param	Societe		$thirdparty_seller		Object of selling third party ($mysoc if not defined)
 *  @param	int			$vatnpr					If vat rate is NPR or not
 * 	@return	int<0,0>|string	   					0 if not found, localtax rate if found (Can be '20', '-19:-15:-9')
 *  @see get_default_tva()
 */
function get_localtax($vatrate, $local, $thirdparty_buyer = \null, $thirdparty_seller = \null, $vatnpr = 0)
{
}
/**
 * Return true if LocalTax (1 or 2) is unique.
 * Example: If localtax1 is 5 on line with highest common vat rate, return true
 * Example: If localtax1 is 5:8:15 on line with highest common vat rate, return false
 *
 * @param   int 	$local	Local tax to test (1 or 2)
 * @return  boolean 		True if LocalTax have multiple values, False if not
 */
function isOnlyOneLocalTax($local)
{
}
/**
 * Get values of localtaxes (1 or 2) for company country for the common vat with the highest value
 *
 * @param	int				$local 		LocalTax to get
 * @return	string						Values of localtax (Can be '20', '-19:-15:-9') or 'Error'
 */
function get_localtax_by_third($local)
{
}
/**
 *  Get tax (VAT) main information from Id.
 *  You can also call getLocalTaxesFromRate() after to get only localtax fields.
 *
 *  @param	int|string	$vatrate		    VAT ID or Rate. Value can be value or the string with code into parenthesis or rowid if $firstparamisid is 1. Example: '8.5' or '8.5 (8.5NPR)' or 123.
 *  @param	Societe		$buyer         		Company object
 *  @param	Societe		$seller        		Company object
 *  @param  int<0,1>	$firstparamisid     1 if first param is id into table (use this if you can)
 *  @return	array{}|array{rowid:int,code:string,rate:float,localtax1:float,localtax1_type:string,localtax2:float,localtax2_type:string,npr:float,accountancy_code_sell:string,accountancy_code_buy:string} array('rowid'=> , 'code'=> ...)
 *  @see getLocalTaxesFromRate()
 */
function getTaxesFromId($vatrate, $buyer = \null, $seller = \null, $firstparamisid = 1)
{
}
/**
 *  Get type and rate of localtaxes for a particular vat rate/country of a thirdparty.
 *  This does not take into account the seller setup if subject to vat or not, only country.
 *
 *  TODO This function is ALSO called to retrieve type for building PDF. Such call of function must be removed.
 *  Instead this function must be called when adding a line to get the array of possible values for localtax and type, and then
 *  provide the selected value to the function calcul_price_total.
 *
 *  @param	int|string  $vatrate			VAT ID or Rate+Code. Value can be value or the string with code into parenthesis or rowid if $firstparamisid is 1. Example: '8.5' or '8.5 (8.5NPR)' or 123.
 *  @param	int<0,2>    $local              Number of localtax (1 or 2, or 0 to return 1 & 2)
 *  @param	Societe	    $buyer         		Company object
 *  @param	Societe	    $seller        		Company object
 *  @param  int<0,1>    $firstparamisid     1 if first param is ID into table instead of Rate+code (use this if you can)
 *  @return	array{}|array{0:string,1:int|string,2:string,3:string}|array{0:string,1:int|string,2:string,3:int|string,4:string,5:string}		array(localtax_type1('1-6' or '0' if not found), rate localtax1, localtax_type2, rate localtax2, accountancycodecust, accountancycodesupp)
 *  @see getTaxesFromId()
 */
function getLocalTaxesFromRate($vatrate, $local, $buyer, $seller, $firstparamisid = 0)
{
}
/**
 *	Return vat rate of a product in a particular country, or default country vat if product is unknown.
 *  Function called by get_default_tva(). Do not use this function directly, prefer to use get_default_tva().
 *
 *  @param	int				$idprod          	Id of product or 0 if not a predefined product
 *  @param  Societe			$thirdpartytouse  	Thirdparty with a ->country_code defined (FR, US, IT, ...)
 *	@param	int				$idprodfournprice	Id product_fournisseur_price (for "supplier" proposal/order/invoice)
 *  @return float|string   					    Vat rate to use with format 5.0 or '5.0 (XXX)'
 *  @see get_default_tva(), get_product_localtax_for_country()
 */
function get_product_vat_for_country($idprod, $thirdpartytouse, $idprodfournprice = 0)
{
}
/**
 *	Return localtax vat rate of a product in a particular country or default country vat if product is unknown
 *
 *  @param	int		$idprod         		Id of product
 *  @param  int		$local          		1 for localtax1, 2 for localtax 2
 *  @param  Societe	$thirdpartytouse    	Thirdparty with a ->country_code defined (FR, US, IT, ...)
 *  @return int             				Return integer <0 if KO, Vat rate if OK
 *  @see get_product_vat_for_country()
 */
function get_product_localtax_for_country($idprod, $local, $thirdpartytouse)
{
}
/**
 *	Function that return vat rate of a product line (according to seller, buyer and product vat rate)
 *   VATRULE 1: If seller does not use VAT, default VAT is 0. End of rule.
 *   VATRULE 2: If buyer department has a VAT rule from vat rates dictionary then it's the default VAT rate. End of rule.
 *	 VATRULE 3: If the (seller country = buyer country) then the default VAT = VAT of the product sold. End of rule.
 *	 VATRULE 4: If (seller and buyer in the European Community) and (property sold = new means of transport such as car, boat, plane) then VAT by default = 0 (VAT must be paid by the buyer to the tax center of his country and not to the seller). End of rule.
 *	 VATRULE 5: If (seller and buyer in the European Community) and (buyer = individual) then VAT by default = VAT of the product sold. End of rule
 *	 VATRULE 6: If (seller and buyer in European Community) and (buyer = company) then VAT by default=0. End of rule
 *	 VATRULE 7: Otherwise the VAT proposed by default=0. End of rule.
 *
 *	@param	Societe		$thirdparty_seller    	Object Seller company
 *	@param  Societe		$thirdparty_buyer   	Object Buyer company
 *	@param  int			$idprod					Id product
 *	@param	int			$idprodfournprice		Id product_fournisseur_price (for supplier order/invoice)
 *	@return float|string   				      	Vat rate to use with format 5.0 or '5.0 (XXX)', -1 if we can't guess it
 *  @see get_default_localtax(), get_default_npr()
 */
function get_default_tva(\Societe $thirdparty_seller, \Societe $thirdparty_buyer, $idprod = 0, $idprodfournprice = 0)
{
}
/**
 *	Function that returns whether VAT must be recoverable collected VAT (e.g.: VAT NPR in France)
 *
 *	@param	Societe		$thirdparty_seller    	Thirdparty seller
 *	@param  Societe		$thirdparty_buyer   	Thirdparty buyer
 *  @param  int			$idprod                 Id product
 *  @param	int			$idprodfournprice		Id supplier price for product
 *	@return int<0,1>       			        	0 or 1
 *  @see get_default_tva(), get_default_localtax()
 */
function get_default_npr(\Societe $thirdparty_seller, \Societe $thirdparty_buyer, $idprod = 0, $idprodfournprice = 0)
{
}
/**
 *	Function that return localtax of a product line (according to seller, buyer and product vat rate)
 *   If the seller is not subject to VAT, then default VAT=0. Rule/Test ends.
 *	 If (seller country == buyer country) default VAT=sold product VAT. Rule/Test ends.
 *	 Else, default VAT=0. Rule/Test ends
 *
 *	@param	Societe		$thirdparty_seller    	Third party seller
 *	@param  Societe		$thirdparty_buyer   	Third party buyer
 *  @param	int			$local					Localtax to process (1 or 2)
 *	@param  int			$idprod					Id product
 *	@return int	        				       	localtax, -1 if it can not be determined
 *  @see get_default_tva(), get_default_npr()
 */
function get_default_localtax($thirdparty_seller, $thirdparty_buyer, $local, $idprod = 0)
{
}
/**
 *	Return yes or no in current language
 *
 *	@param	int<0, 1>|'yes'|'true'|'no'|'false'	$yesno	Value to test (1, 'yes', 'true' or 0, 'no', 'false')
 *	@param	integer|string	$format						1=Yes/No, 0=yes/no, 2=Disabled checkbox, 3=Disabled checkbox + Yes/No, 4 or Text=Use picto
 *	@param	int				$color						0=texte only, 1=Text is formatted with a color font style ('ok' or 'error'), 2=Text is formatted with 'ok' color.
 *	@return	string										HTML string
 */
function yn($yesno, $format = 1, $color = 0)
{
}
/**
 *	Return a path to have a the directory according to object where files are stored.
 *  This function is called by getMultidirOutput
 *  New usage:  $conf->module->multidir_output[$object->entity].'/'.get_exdir(0, 0, 0, 1, $object, '').'/'
 *         or:  $conf->module->dir_output.'/'.get_exdir(0, 0, 0, 0, $object, '')
 *
 *  Example of output with new usage:       $object is invoice -> 'INYYMM-ABCD'
 *  Example of output with old usage:       '015' with level 3->"0/1/5/", '015' with level 1->"5/", 'ABC-1' with level 3 ->"0/0/1/"
 *
 *	@param	string|int		$num            Id of object (deprecated, $object->id will be used in future)
 *	@param  int				$level		    Level of subdirs to return (1, 2 or 3 levels). (deprecated, global setup will be used in future)
 * 	@param	int				$alpha		    0=Keep number only to forge path, 1=Use alpha part after the - (By default, use 0). (deprecated, global option will be used in future)
 *  @param  int				$withoutslash   0=With slash at end (except if '/', we return ''), 1=without slash at end
 *  @param	?CommonObject	$object			Object to use to get ref to forge the path.
 *  @param	string			$modulepart		Type of object ('invoice_supplier, 'donation', 'invoice', ...'). Use '' for autodetect from $object.
 *  @return	string							Dir to use ending. Example '' or '1/' or '1/2/'
 *  @see getMultidirOutput()
 */
function get_exdir($num, $level, $alpha, $withoutslash, $object, $modulepart = '')
{
}
/**
 *	Creation of a directory (this can create recursive subdir)
 *
 *	@param	string		$dir		Directory to create (Separator must be '/'. Example: '/mydir/mysubdir')
 *	@param	string		$dataroot	Data root directory (To avoid having the data root in the loop. Using this will also lost the warning, on first dir, saying PHP has no permission when open_basedir is used)
 *  @param	string		$newmask	Mask for new file (Defaults to $conf->global->MAIN_UMASK or 0755 if unavailable). Example: '0444'
 *	@return int         			Return integer < 0 if KO, 0 = already exists, > 0 if OK
 */
function dol_mkdir($dir, $dataroot = '', $newmask = '')
{
}
/**
 *	Change mod of a file
 *
 *  @param	string		$filepath		Full file path
 *  @param	string		$newmask		Force new mask. For example '0644'
 *	@return void
 */
function dolChmod($filepath, $newmask = '')
{
}
/**
 *	Return picto saying a field is required
 *
 *	@return  string		Chaine avec picto obligatoire
 */
function picto_required()
{
}
/**
 *	Clean a string from all HTML tags and entities.
 *  This function differs from strip_tags because:
 *  - <br> are replaced with \n if removelinefeed=0 or 1
 *  - if entities are found, they are decoded BEFORE the strip
 *  - you can decide to convert line feed into a space
 *
 *	@param	string	$stringtoclean		String to clean
 *	@param	integer	$removelinefeed		1=Replace all new lines by 1 space, 0=Only ending new lines are removed others are replaced with \n, 2=The ending new line is removed but others are kept with the same number of \n than the nb of <br> when there is both "...<br>\n..."
 *  @param  string	$pagecodeto      	Encoding of input/output string
 *  @param	integer	$strip_tags			0=Use internal strip, 1=Use strip_tags() php function (bugged when text contains a < char that is not for a html tag or when tags is not closed like '<img onload=aaa')
 *  @param	integer	$removedoublespaces	Replace double space into one space
 *	@return string	    				String cleaned
 *
 * 	@see	dol_escape_htmltag() strip_tags() dol_string_onlythesehtmltags() dol_string_neverthesehtmltags(), dolStripPhpCode()
 */
function dol_string_nohtmltag($stringtoclean, $removelinefeed = 1, $pagecodeto = 'UTF-8', $strip_tags = 0, $removedoublespaces = 1)
{
}
/**
 *	Clean a string to keep only desirable HTML tags.
 *  WARNING: This also clean HTML comments (because they can be used to obfuscate tag name).
 *
 *	@param	string		$stringtoclean			String to clean
 *  @param	int			$cleanalsosomestyles	Remove absolute/fixed positioning from inline styles
 *  @param	int			$removeclassattribute	1=Remove the class attribute from tags
 *  @param	int			$cleanalsojavascript	Remove also occurrence of 'javascript:'.
 *  @param	int			$allowiframe			Allow iframe tags.
 *  @param	string[]	$allowed_tags			List of allowed tags to replace the default list
 *  @param	int			$allowlink				Allow "link" tags (for head html section)
 *  @param	int			$allowscript			Allow "script" tags (for head html section when using GETPOST with mode 'restricthtmlallowlinkscript')
 *  @param	int			$allowstyle				Allow "style" tags (for head html section when using GETPOST with mode 'restricthtmlallowlinkscript')
 *  @param	int			$allowphp				Allow "php" tags (Deprecated. Should never be used. If you can add php, you can also print in the php the code to output the other non allowed tags)
 *	@return string	    						String cleaned
 *
 * 	@see	dol_htmlwithnojs() dol_escape_htmltag() strip_tags() dol_string_nohtmltag() dol_string_neverthesehtmltags()
 */
function dol_string_onlythesehtmltags($stringtoclean, $cleanalsosomestyles = 1, $removeclassattribute = 1, $cleanalsojavascript = 0, $allowiframe = 0, $allowed_tags = array(), $allowlink = 0, $allowscript = 0, $allowstyle = 0, $allowphp = 0)
{
}
/**
 *	Clean a string from some undesirable HTML tags.
 *  Note: Complementary to dol_string_onlythesehtmltags().
 *  This method is used for example by dol_htmlwithnojs() when option MAIN_RESTRICTHTML_REMOVE_ALSO_BAD_ATTRIBUTES is set to 1.
 *
 *	@param	string		$stringtoclean		String to clean
 *  @param	string[]	$allowed_attributes	Array of tags not allowed
 *	@return string	    					String cleaned
 *
 * 	@see	dol_escape_htmltag() strip_tags() dol_string_nohtmltag() dol_string_onlythesehtmltags() dol_string_neverthesehtmltags()
 * 	@phan-suppress PhanUndeclaredProperty
 */
function dol_string_onlythesehtmlattributes($stringtoclean, $allowed_attributes = \null)
{
}
/**
 *	Clean a string from some undesirable HTML tags.
 *  Note: You should use instead dol_string_onlythesehtmltags() that is more secured if you can.
 *
 *	@param	string		$stringtoclean			String to clean
 *  @param	string[]	$disallowed_tags		Array of tags not allowed
 *  @param	int<0,1>	$cleanalsosomestyles	Clean also some tags
 *	@return string	    					String cleaned
 *
 * 	@see	dol_escape_htmltag() strip_tags() dol_string_nohtmltag() dol_string_onlythesehtmltags() dol_string_onlythesehtmlattributes()
 */
function dol_string_neverthesehtmltags($stringtoclean, $disallowed_tags = array('textarea'), $cleanalsosomestyles = 0)
{
}
/**
 * Return first line of text. Cut will depends if content is HTML or not.
 *
 * @param 	string	$text		Input text
 * @param	int		$nboflines  Nb of lines to get (default is 1 = first line only)
 * @param   string  $charset    Charset of $text string (UTF-8 by default)
 * @return	string				Output text
 * @see dol_nboflines_bis(), dol_string_nohtmltag(), dol_escape_htmltag()
 */
function dolGetFirstLineOfText($text, $nboflines = 1, $charset = 'UTF-8')
{
}
/**
 * Replace CRLF in string with a HTML BR tag.
 * WARNING: The content after operation contains some HTML tags (the <br>) so be sure to also have
 *          encoded the special chars of stringtoencode into HTML before with dol_htmlentitiesbr().
 *
 * @param	string	$stringtoencode		String to encode
 * @param	int     $nl2brmode			0=Adding br before \n, 1=Replacing \n by br
 * @param   bool	$forxml             false=Use <br>, true=Use <br />
 * @return	string						String encoded
 * @see dol_htmlentitiesbr(), dol_nboflines(), dolGetFirstLineOfText()
 */
function dol_nl2br($stringtoencode, $nl2brmode = 0, $forxml = \false)
{
}
/**
 * Sanitize a HTML to remove js, dangerous content and external link.
 * This function is used by dolPrintHTML... function for example.
 *
 * @param	string	$stringtoencode				String to encode
 * @param	int     $nouseofiframesandbox		0=Default, 1=Allow use of option MAIN_SECURITY_USE_SANDBOX_FOR_HTMLWITHNOJS for html sanitizing (not yet working)
 * @param	string	$check						'restricthtmlnolink' or 'restricthtml' or 'restricthtmlallowclass' or 'restricthtmlallowiframe' or 'restricthtmlallowlinkscript' or 'restricthtmlallowunvalid'
 * @return	string								HTML sanitized
 */
function dol_htmlwithnojs($stringtoencode, $nouseofiframesandbox = 0, $check = 'restricthtml')
{
}
/**
 *	This function is called to encode a string into a HTML string but differs from htmlentities because
 * 	a detection is done before to see if text is already HTML or not. Also, all entities but &,<,>," are converted.
 *  This permits to encode special chars to entities with no double encoding for already encoded HTML strings.
 * 	This function also remove last EOL or BR if $removelasteolbr=1 (default).
 *  For PDF usage, you can show text by 2 ways:
 *        - writeHTMLCell -> param must be encoded into HTML.
 *        - MultiCell -> param must not be encoded into HTML.
 *        Because writeHTMLCell convert also \n into <br>, if function is used to build PDF, nl2brmode must be 1.
 *  Note: When we output string on pages, we should use
 *        - dolPrintHTML... that is dol_escape_htmltag(dol_htmlwithnojs(dol_string_onlythesehtmltags(dol_htmlentitiesbr(), 1, 1, 1), 1, 1) for notes or descriptions,
 *        - dolPrintPassword that is abelhtmlspecialchars( , ENT_COMPAT, 'UTF-8') for passwords.
 *
 *	@param	string	$stringtoencode		String to encode
 *	@param	int		$nl2brmode			0=Adding br before \n, 1=Replacing \n by br (for use with FPDF writeHTMLCell function for example)
 *  @param  string	$pagecodefrom       Pagecode stringtoencode is encoded
 *  @param	int		$removelasteolbr	1=Remove last br or lasts \n (default), 0=Do nothing
 *  @return	string						String encoded
 *  @see dol_escape_htmltag(), dolGetFirstLineOfText(), dol_string_onlythesehtmltags()
 */
function dol_htmlentitiesbr($stringtoencode, $nl2brmode = 0, $pagecodefrom = 'UTF-8', $removelasteolbr = 1)
{
}
/**
 *	This function is called to decode a HTML string (it decodes entities and br tags)
 *
 *	@param	string	$stringtodecode		String to decode
 *	@param	string	$pagecodeto			Page code for result
 *	@return	string						String decoded
 */
function dol_htmlentitiesbr_decode($stringtodecode, $pagecodeto = 'UTF-8')
{
}
/**
 *	This function remove all ending \n and br at end
 *
 *	@param	string	$stringtodecode		String to decode
 *	@return	string						String decoded
 */
function dol_htmlcleanlastbr($stringtodecode)
{
}
/**
 * Replace html_entity_decode functions to manage errors
 *
 * @param   string	$a					Operand a
 * @param   int 	$b					Operand b (ENT_QUOTES|ENT_HTML5=convert simple, double quotes, colon, e accent, ...)
 * @param   string	$c					Operand c
 * @param	int 	$keepsomeentities	Entities but &, <, >, " are not converted.
 * @return  string						String decoded
 */
function dol_html_entity_decode($a, $b, $c = 'UTF-8', $keepsomeentities = 0)
{
}
/**
 * Replace htmlentities functions.
 * Goal of this function is to be sure to have default values of htmlentities that match what we need.
 *
 * @param   string  $string         The input string to encode
 * @param   int     $flags          Flags (see PHP doc above)
 * @param   string  $encoding       Encoding page code
 * @param   bool    $double_encode  When double_encode is turned off, PHP will not encode existing html entities
 * @return  string  $ret            Encoded string
 * @see dol_htmlentitiesbr()
 */
function dol_htmlentities($string, $flags = \ENT_QUOTES | \ENT_SUBSTITUTE, $encoding = 'UTF-8', $double_encode = \false)
{
}
/**
 *	Check if a string is a correct iso string
 *	If not, it will not be considered as HTML encoded even if it is by FPDF.
 *	Example, if string contains euro symbol that has ascii code 128
 *
 *	@param	string		$s      	String to check
 *  @param	int 		$clean		Clean if it is not an ISO. Warning, if file is utf8, you will get a bad formatted file.
 *	@return	int|string  	   		0 if bad iso, 1 if good iso, Or the clean string if $clean is 1
 *  @deprecated Duplicate of ascii_check()
 *  @see ascii_check()
 */
function dol_string_is_good_iso($s, $clean = 0)
{
}
/**
 *	Return nb of lines of a clear text
 *
 *	@param	string	$s			String to check
 * 	@param	int     $maxchar	Not yet used
 *	@return	int					Number of lines
 *  @see	dol_nboflines_bis(), dolGetFirstLineOfText()
 */
function dol_nboflines($s, $maxchar = 0)
{
}
/**
 *	Return nb of lines of a formatted text with \n and <br> (WARNING: string must not have mixed \n and br separators)
 *
 *	@param	string	$text      		Text
 *	@param	int		$maxlinesize  	Linewidth in character count (default = 0 == nolimit)
 * 	@param	string	$charset		Give the charset used to encode the $text variable in memory.
 *	@return int						Number of lines
 *	@see	dol_nboflines(), dolGetFirstLineOfText()
 */
function dol_nboflines_bis($text, $maxlinesize = 0, $charset = 'UTF-8')
{
}
/**
 *	Return if a text is a html content
 *
 *	@param	string	$msg		Content to check
 *	@param	int		$option		0=Full detection, 1=Fast check
 *	@return	boolean				true/false
 *	@see	dol_concatdesc()
 */
function dol_textishtml($msg, $option = 0)
{
}
/**
 *  Concat 2 descriptions with a new line between them (second operand after first one with appropriate new line separator)
 *  text1 html + text2 html => text1 + '<br>' + text2
 *  text1 html + text2 txt  => text1 + '<br>' + dol_nl2br(text2)
 *  text1 txt  + text2 html => dol_nl2br(text1) + '<br>' + text2
 *  text1 txt  + text2 txt  => text1 + '\n' + text2
 *
 *  @param  string  $text1          Text 1
 *  @param  string  $text2          Text 2
 *  @param  bool    $forxml         true=Use <br /> instead of <br> if we have to add a br tag
 *  @param  bool    $invert         invert order of description lines (we often use config MAIN_CHANGE_ORDER_CONCAT_DESCRIPTION in this parameter)
 *  @return string                  Text 1 + new line + Text2
 *  @see    dol_textishtml()
 */
function dol_concatdesc($text1, $text2, $forxml = \false, $invert = \false)
{
}
/**
 * Return array of possible common substitutions. This includes several families like: 'system', 'mycompany', 'object', 'objectamount', 'date', 'user'
 *
 * @param	Translate       $outputlangs    Output language
 * @param	int             $onlykey		1=Do not calculate some heavy values of keys (performance enhancement when we need only the keys),
 *											2=Values are trunc and html sanitized (to use for help tooltip)
 * @param	string[]|null	$exclude		Array of family keys we want to exclude. For example array('system', 'mycompany', 'object', 'objectamount', 'date', 'user', ...)
 * @param	?CommonObject	$object			Object for keys on object
 * @param	string[]|null	$include		Array of family keys we want to include. For example array('system', 'mycompany', 'object', 'objectamount', 'date', 'user', ...)
 * @return	array<string,string>			Array of substitutions
 * @see setSubstitFromObject()
 * @phan-suppress PhanTypeArraySuspiciousNullable,PhanTypePossiblyInvalidDimOffset,PhanUndeclaredProperty
 */
function getCommonSubstitutionArray($outputlangs, $onlykey = 0, $exclude = \null, $object = \null, $include = \null)
{
}
/**
 *  Make substitution into a text string, replacing keys with vals from $substitutionarray (oldval=>newval),
 *  and texts like __(TranslationKey|langfile)__ and __[ConstantKey]__ are also replaced.
 *  Example of usage:
 *  $substitutionarray = getCommonSubstitutionArray($langs, 0, null, $thirdparty);
 *  complete_substitutions_array($substitutionarray, $langs, $thirdparty);
 *  $mesg = make_substitutions($mesg, $substitutionarray, $langs);
 *
 *  @param	string		$text	      					Source string in which we must do substitution
 *  @param  array<string,string>	$substitutionarray	Array with key->val to substitute. Example: array('__MYKEY__' => 'MyVal', ...)
 *  @param	?Translate	$outputlangs					Output language
 *  @param	int			$converttextinhtmlifnecessary	0=Convert only value into HTML if text is already in HTML
 *  													1=Will also convert initial $text into HTML if we try to insert one value that is HTML
 * 	@return string  		    						Output string after substitutions
 *  @see	complete_substitutions_array(), getCommonSubstitutionArray()
 */
function make_substitutions($text, $substitutionarray, $outputlangs = \null, $converttextinhtmlifnecessary = 0)
{
}
/**
 *  Complete the $substitutionarray with more entries coming from external module that had set the "substitutions=1" into module_part array.
 *  In this case, method completesubstitutionarray provided by module is called.
 *
 *  @param  array<string,string>	$substitutionarray		Array substitution old value => new value value
 *  @param  Translate		$outputlangs            Output language
 *  @param  ?CommonObject	$object                 Source object
 *  @param  ?mixed			$parameters       		Add more parameters (useful to pass product lines)
 *  @param  string     		$callfunc               What is the name of the custom function that will be called? (default: completesubstitutionarray)
 *  @return	void
 *  @see 	make_substitutions()
 */
function complete_substitutions_array(&$substitutionarray, $outputlangs, $object = \null, $parameters = \null, $callfunc = "completesubstitutionarray")
{
}
/**
 *    Format output for start and end date
 *
 *    @param	int	$date_start    Start date
 *    @param    int	$date_end      End date
 *    @param    string		$format        Output format
 *    @param	Translate	$outputlangs   Output language
 *    @return	void
 */
function print_date_range($date_start, $date_end, $format = '', $outputlangs = \null)
{
}
/**
 *    Format output for start and end date
 *
 *    @param	int			$date_start    		Start date
 *    @param    int			$date_end      		End date
 *    @param    string		$format        		Output date format ('day', 'dayhour', ...)
 *    @param	Translate	$outputlangs   		Output language
 *    @param	integer		$withparenthesis	1=Add parenthesis, 0=no parenthesis
 *    @return	string							String
 */
function get_date_range($date_start, $date_end, $format = '', $outputlangs = \null, $withparenthesis = 1)
{
}
/**
 * Return firstname and lastname in correct order
 *
 * @param	string	$firstname		Firstname
 * @param	string	$lastname		Lastname
 * @param	int		$nameorder		-1=Auto, 0=Lastname+Firstname, 1=Firstname+Lastname, 2=Firstname, 3=Firstname if defined else lastname, 4=Lastname, 5=Lastname if defined else firstname
 * @return	string					Firstname + lastname or Lastname + firstname
 */
function dolGetFirstLastname($firstname, $lastname, $nameorder = -1)
{
}
/**
 *	Set event message in dol_events session object. Will be output by calling dol_htmloutput_events.
 *  Note: Calling dol_htmloutput_events is done into pages by standard llxFooter() function.
 *  Note: Prefer to use setEventMessages instead.
 *
 *	@param	string|string[] $mesgs			Message string or array
 *  @param  string          $style      	Which style to use ('mesgs' by default, 'warnings', 'errors')
 *  @param	int				$noduplicate	1 means we do not add the message if already present in session stack
 *  @param	int				$attop			Add the message in the top of the stack (at bottom by default)
 *  @return	void
 *  @see	dol_htmloutput_events()
 */
function setEventMessage($mesgs, $style = 'mesgs', $noduplicate = 0, $attop = 0)
{
}
/**
 *	Set event messages in dol_events session object. Will be output by calling dol_htmloutput_events.
 *  Note: Calling dol_htmloutput_events is done into pages by standard llxFooter() function.
 *
 *	@param	string|null		$mesg			Message string
 *	@param	string[]|null	$mesgs			Message array
 *  @param  string			$style     		Which style to use ('mesgs' by default, 'warnings', 'errors')
 *  @param	string			$messagekey		A key to be used to allow the feature "Never show this message during this session again"
 *  @param	int				$noduplicate	1 means we do not add the message if already present in session stack
 *  @param	int				$attop			Add the message in the top of the stack (at bottom by default)
 *  @return	void
 *  @see	dol_htmloutput_events()
 */
function setEventMessages($mesg, $mesgs, $style = 'mesgs', $messagekey = '', $noduplicate = 0, $attop = 0)
{
}
/**
 *	Print formatted messages to output (Used to show messages on html output).
 *  Note: Calling dol_htmloutput_events is done into pages by standard llxFooter() function, so there is
 *  no need to call it explicitly.
 *
 *  @param	int		$disabledoutputofmessages	Clear all messages stored into session without displaying them
 *  @return	void
 *  @see    									dol_htmloutput_mesg()
 */
function dol_htmloutput_events($disabledoutputofmessages = 0)
{
}
/**
 *	Get formatted messages to output (Used to show messages on html output).
 *  This include also the translation of the message key.
 *
 *	@param	string		$mesgstring		Message string or message key
 *	@param	string[]	$mesgarray      Array of message strings or message keys
 *  @param  string		$style          Style of message output ('ok' or 'error')
 *  @param  int			$keepembedded   Set to 1 in error message must be kept embedded into its html place (this disable jnotify)
 *	@return	string						Return html output
 *
 *  @see    dol_print_error()
 *  @see    dol_htmloutput_errors()
 *  @see    setEventMessages()
 */
function get_htmloutput_mesg($mesgstring = '', $mesgarray = [], $style = 'ok', $keepembedded = 0)
{
}
/**
 *  Get formatted error messages to output (Used to show messages on html output).
 *
 *  @param	string		$mesgstring		Error message
 *  @param	string[]	$mesgarray		Error messages array
 *  @param	int			$keepembedded	Set to 1 in error message must be kept embedded into its html place (this disable jnotify)
 *  @return	string                		Return html output
 *
 *  @see    dol_print_error()
 *  @see    dol_htmloutput_mesg()
 */
function get_htmloutput_errors($mesgstring = '', $mesgarray = array(), $keepembedded = 0)
{
}
/**
 *	Print formatted messages to output (Used to show messages on html output).
 *
 *	@param	string		$mesgstring		Message string or message key
 *	@param	string[]	$mesgarray      Array of message strings or message keys
 *	@param  string      $style          Which style to use ('ok', 'warning', 'error')
 *	@param  int         $keepembedded   Set to 1 if message must be kept embedded into its html place (this disable jnotify)
 *	@return	void
 *
 *	@see    dol_print_error()
 *	@see    dol_htmloutput_errors()
 *	@see    setEventMessages()
 */
function dol_htmloutput_mesg($mesgstring = '', $mesgarray = array(), $style = 'ok', $keepembedded = 0)
{
}
/**
 *  Print formatted error messages to output (Used to show messages on html output).
 *
 *  @param	string		$mesgstring		Error message
 *  @param  string[]	$mesgarray		Error messages array
 *  @param  int<0,1>	$keepembedded	Set to 1 in error message must be kept embedded into its html place (this disable jnotify)
 *  @return	void
 *
 *  @see    dol_print_error()
 *  @see    dol_htmloutput_mesg()
 */
function dol_htmloutput_errors($mesgstring = '', $mesgarray = array(), $keepembedded = 0)
{
}
/**
 * 	Advanced sort array by the value of a given key, which produces ascending (default) or descending
 *  output and uses optionally natural case insensitive sorting (which can be optionally case sensitive as well).
 *
 *  @phpstan-template T of array<string|int,mixed>
 *  @phan-template T of array<string|int,mixed>
 *  @param	array<string|int,mixed>	$array 	Array to sort (array of array('key1'=>val1,'key2'=>val2,'key3'...) or array of objects)
 *  @phpstan-param T $array
 *  @phan-param T $array
 *  @param	string		$index				Key in array to use for sorting criteria
 *  @param	string		$order				Sort order ('asc' or 'desc')
 *  @param	int<-1,1>	$natsort			If values are strings (I said value not type): 0=Use alphabetical order, 1=use "natural" sort (natsort), -1=Force alpha order
 *                                          If values are numeric (I said value not type): 0=Use numeric order (even if type is string) so use a "natural" sort, 1=use "natural" sort too (same than 0), -1=Force alphabetical order
 *  @param	int<0,1>	$case_sensitive		1=sort is case sensitive, 0=not case sensitive
 *  @param	int<0,1>	$keepindex			If 0 and index key of array to sort is a numeric, then index will be rewritten. If 1 or index key is not numeric, key for index is kept after sorting.
 *  @return	array<string|int,mixed>			Return the sorted array (the source array is not modified !)
 *  @phpstan-return T
 *  @phan-return T  // Seems useful
 *  @phan-suppress PhanTypeMismatchReturn  // T not understood without caller
 */
function dol_sort_array(&$array, $index, $order = 'asc', $natsort = 0, $case_sensitive = 0, $keepindex = 0)
{
}
/**
 *	Check if a string is in UTF8. Seems similar to utf8_valid() but in pure PHP.
 *
 *	@param	string	$str        String to check
 *	@return	boolean				True if string is UTF8 or ISO compatible with UTF8, False if not (ISO with special non utf8 char or Binary)
 *	@see utf8_valid()
 */
function utf8_check($str)
{
}
/**
 *      Check if a string is in UTF8. Seems similar to utf8_check().
 *
 *      @param	string	$str        String to check
 * 		@return	boolean				True if string is valid UTF8 string, false if corrupted
 * 		@see utf8_check()
 */
function utf8_valid($str)
{
}
/**
 *      Check if a string is in ASCII
 *
 *      @param	string	$str        String to check
 * 		@return	boolean				True if string is ASCII, False if not (byte value > 0x7F)
 */
function ascii_check($str)
{
}
/**
 *      Return a string encoded into OS filesystem encoding. This function is used to define
 * 	    value to pass to filesystem PHP functions.
 *
 *      @param	string	$str        String to encode (UTF-8)
 * 		@return	string				Encoded string (UTF-8, ISO-8859-1)
 */
function dol_osencode($str)
{
}
/**
 *      Return an id or code from a code or id.
 *      Store also Code-Id into a cache to speed up next request on same table and key.
 *
 * 		@param	DoliDB				$db				Database handler
 * 		@param	string|int			$key			Code (string) or Id (int) to get Id or Code
 * 		@param	string				$tablename		Table name without prefix
 * 		@param	string				$fieldkey		Field to search the key into
 * 		@param	string				$fieldid		Field to get
 *      @param  int					$entityfilter	Filter by entity
 *      @param	string				$filters		Filters to add. WARNING: string must be escaped for SQL and not coming from user input.
 *      @param	bool    			$useCache       If true (default), cache will be queried and updated.
 *      @return int<-1,max>|string					ID of code if OK, 0 if key empty, -1 if KO
 *      @see $langs->getLabelFromKey
 */
function dol_getIdFromCode($db, $key, $tablename, $fieldkey = 'code', $fieldid = 'id', $entityfilter = 0, $filters = '', $useCache = \true)
{
}
/**
 *	Check if a variable with name $var startx with $text.
 *  Can be used to forge dol_eval() conditions.
 *
 *  @param	string	$var		Variable
 *  @param	string	$regextext	Text that must be a valid regex string
 *  @param	int<0,1>	$matchrule	1=Test if start with, 0=Test if equal
 *  @return	boolean|string		True or False, text if bad usage.
 */
function isStringVarMatching($var, $regextext, $matchrule = 1)
{
}
/**
 * Verify if condition in string is ok or not
 *
 * @param 	string	$strToEvaluate		String with condition to check
 * @param	string	$onlysimplestring	'0' (deprecated, do not use it anymore)=Accept all chars,
 * 										'1' (most common use)=Accept only simple string with char 'a-z0-9\s^$_+-.*>&|=!?():"\',/@';',
 * 										'2' (used for example for the compute property of extrafields)=Accept also '[]'
 * @return 	boolean						True or False. Note: It returns also True if $strToEvaluate is ''. False if error
 */
function verifCond($strToEvaluate, $onlysimplestring = '1')
{
}
/**
 * Replace eval function to add more security.
 * This function is called by verifCond() or trans() and transnoentitiesnoconv().
 *
 * @param 	string		$s					String to evaluate
 * @param	int<0,1>	$returnvalue		0=No return (deprecated, used to execute eval($a=something)). 1=Value of eval is returned (used to eval($something)).
 * @param   int<0,1>	$hideerrors     	1=Hide errors
 * @param	string		$onlysimplestring	'0' (deprecated, do not use it anymore)=Accept all chars,
 *                                          '1' (most common use)=Accept only simple string with char 'a-z0-9\s^$_+-.*>&|=!?():"\',/@';',
 *                                          '2' (used for example for the compute property of extrafields)=Accept also '<[]'
 * @return	void|string						Nothing or return result of eval (even if type can be int, it is safer to assume string and find all potential typing issues as abs(dol_eval(...)).
 * @see verifCond(), checkPHPCode() to see sanitizing rules that should be very close.
 * @phan-suppress PhanPluginUnsafeEval
 */
function dol_eval($s, $returnvalue = 1, $hideerrors = 1, $onlysimplestring = '1')
{
}
/**
 * Return if var element is ok
 *
 * @param   string      $element    Variable to check
 * @return  boolean                 Return true of variable is not empty
 * @see getElementProperties()
 */
function dol_validElement($element)
{
}
/**
 * 	Return img flag of country for a language code or country code.
 *
 * 	@param	string		$codelang	Language code ('en_IN', 'fr_CA', ...) or ISO Country code on 2 characters in uppercase ('IN', 'FR')
 *  @param	string		$moreatt	Add more attribute on img tag (For example 'style="float: right"' or 'class="saturatemedium"')
 *  @param	int<0,1>	$notitlealt	No title alt
 * 	@return	string				HTML img string with flag.
 */
function picto_from_langcode($codelang, $moreatt = '', $notitlealt = 0)
{
}
/**
 * Return default language from country code.
 * Return null if not found.
 *
 * @param 	string 	$countrycode	Country code like 'US', 'FR', 'CA', 'ES', 'IN', 'MX', ...
 * @return	?string					Value of locale like 'en_US', 'fr_FR', ... or null if not found
 */
function getLanguageCodeFromCountryCode($countrycode)
{
}
/**
 *  Complete or removed entries into a head array (used to build tabs).
 *  For example, with value added by external modules. Such values are declared into $conf->modules_parts['tab'].
 *  Or by change using hook completeTabsHead
 *
 *  @param	Conf			$conf           Object conf
 *  @param  Translate		$langs          Object langs
 *  @param  ?Object 		$object         Object object
 *  @param  array<array{0:string,1:string,2:string}>	$head	List of head tabs (updated by this function)
 *  @param  int				$h				New position to fill (updated by this function)
 *  @param  string			$type           Value for object where objectvalue can be
 *                              			'thirdparty'       to add a tab in third party view
 *		                        	      	'intervention'     to add a tab in intervention view
 *     		                    	     	'supplier_order'   to add a tab in purchase order view
 *          		            	        'supplier_invoice' to add a tab in purchase invoice view
 *                  		    	        'invoice'          to add a tab in sales invoice view
 *                          			    'order'            to add a tab in sales order view
 *                          				'contract'		   to add a table in contract view
 *                      			        'product'          to add a tab in product view
 *                              			'propal'           to add a tab in propal view
 *                              			'user'             to add a tab in user view
 *                              			'group'            to add a tab in group view
 * 		        	               	     	'member'           to add a tab in foundation member view
 *      		                        	'categories_x'	   to add a tab in category view ('x': type of category (0=product, 1=supplier, 2=customer, 3=member)
 *      									'ecm'			   to add a tab for another ecm view
 *                                          'stock'            to add a tab for warehouse view
 *  @param  'add'|'remove'	$mode       	'add' to complete head, 'remove' to remove entries
 *  @param	string		$filterorigmodule	Filter on module origin: 'external' will show only external modules. 'core' only core modules. No filter (default) will add both.
 *	@return	void
 */
function complete_head_from_modules($conf, $langs, $object, &$head, &$h, $type, $mode = 'add', $filterorigmodule = '')
{
}
/**
 * Print common footer :
 * 		conf->global->MAIN_HTML_FOOTER
 *      js for switch of menu hider
 * 		js for conf->global->MAIN_GOOGLE_AN_ID
 * 		js for conf->global->MAIN_SHOW_TUNING_INFO or $_SERVER["MAIN_SHOW_TUNING_INFO"]
 * 		js for conf->logbuffer
 *
 * @param	string	$zone	'private' (for private pages) or 'public' (for public pages)
 * @return	void
 */
function printCommonFooter($zone = 'private')
{
}
/**
 * Split a string with 2 keys into key array.
 * For example: "A=1;B=2;C=2" is exploded into array('A'=>'1','B'=>'2','C'=>'3')
 *
 * @param 	?string		$string		String to explode
 * @param 	string		$delimiter	Delimiter between each couple of data. Example: ';' or '[\n;]+' or '(\n\r|\r|\n|;)'
 * @param 	string		$kv			Delimiter between key and value
 * @return	array<string,string>	Array of data exploded
 */
function dolExplodeIntoArray($string, $delimiter = ';', $kv = '=')
{
}
/**
 * Set focus onto field with selector (similar behaviour of 'autofocus' HTML5 tag)
 *
 * @param 	string	$selector	Selector ('#id' or 'input[name="ref"]') to use to find the HTML input field that must get the autofocus. You must use a CSS selector, so unique id preceding with the '#' char.
 * @return	void
 */
function dol_set_focus($selector)
{
}
/**
 * Return getmypid() or random PID when function is disabled
 * Some web hosts disable this php function for security reasons
 * and sometimes we can't redeclare function.
 *
 * @return	int
 */
function dol_getmypid()
{
}
/**
 * Generate natural SQL search string for a criteria (this criteria can be tested on one or several fields)
 *
 * @param   string|string[]	$fields 	String or array of strings, filled with the name of all fields in the SQL query we must check (combined with a OR). Example: array("p.field1","p.field2")
 * @param   string 			$value 		The value to look for.
 *                          		    If param $mode is 0, can contains several keywords separated with a space or |
 *                                      like "keyword1 keyword2" = We want record field like keyword1 AND field like keyword2
 *                                      or like "keyword1|keyword2" = We want record field like keyword1 OR field like keyword2
 *                             			If param $mode is 1, can contains an operator <, > or = like "<10" or ">=100.5 < -1000"
 *                             			If param $mode is 2 or -2, can contains a list of int id separated by comma like "1,3,4"
 *                             			If param $mode is 3 or -3, can contains a list of string separated by comma like "a,b,c".
 * @param	integer			$mode		0=value is list of keyword strings,
 * 										1=value is a numeric test (Example ">5.5 <10"),
 * 										2=value is a list of ID separated with comma (Example '1,3,4'), -2 is for exclude list,
 * 										3=value is list of string separated with comma (Example 'text 1,text 2'), -3 if for exclude list,
 * 										4=value is a list of ID separated with comma (Example '2,7') to be used to search into a multiselect string '1,2,3,4'
 * @param	integer			$nofirstand	1=Do not output the first 'AND'
 * @return 	string 			$res 		The statement to append to the SQL query
 * @see dolSqlDateFilter()
 * @see forgeSQLFromUniversalSearchCriteria()
 */
function natural_search($fields, $value, $mode = 0, $nofirstand = 0)
{
}
/**
 * Return string with full Url. The file qualified is the one defined by relative path in $object->last_main_doc
 *
 * @param   CommonObject	$object		Object
 * @return	string						Url string
 */
function showDirectDownloadLink($object)
{
}
/**
 * Return the filename of file to get the thumbs
 *
 * @param   string  $file           Original filename (full or relative path)
 * @param   string  $extName        Extension to differentiate thumb file name ('', '_small', '_mini')
 * @param   string  $extImgTarget   Force image extension for thumbs. Use '' to keep same extension than original image (default).
 * @return  string                  New file name (full or relative path, including the thumbs/). May be the original path if no thumb can exists.
 */
function getImageFileNameForSize($file, $extName, $extImgTarget = '')
{
}
/**
 * Return URL we can use for advanced preview links
 *
 * @param   string    $modulepart     propal, facture, facture_fourn, ...
 * @param   string    $relativepath   Relative path of docs.
 * @param	int<0,1>	  $alldata		  Return array with all components (1 is recommended, then use a simple a href link with the class, target and mime attribute added. 'documentpreview' css class is handled by jquery code into main.inc.php)
 * @param	string	  $param		  More param on http links
 * @return  string|array{}|array{target:string,css:string,url:string,mime:string}	Output string with href link or array with all components of link
 */
function getAdvancedPreviewUrl($modulepart, $relativepath, $alldata = 0, $param = '')
{
}
/**
 * Make content of an input box selected when we click into input field.
 *
 * @param int		$idcode			Id of special code
 * @return string
 */
function getLabelSpecialCode($idcode)
{
}
/**
 * Make content of an input box selected when we click into input field.
 *
 * @param string	$htmlname		Id of html object ('#idvalue' or '.classvalue')
 * @param string	$addlink		Add a 'link to' after
 * @param string	$textonlink		Text to show on link or 'image'
 * @return string
 */
function ajax_autoselect($htmlname, $addlink = '', $textonlink = 'Link')
{
}
/**
 *	Return if a file is qualified for preview
 *
 *	@param	string	$file		Filename we looking for information
 *	@return int<0,1>			1 If allowed, 0 otherwise
 *  @see    dol_mimetype(), image_format_supported() from images.lib.php
 */
function dolIsAllowedForPreview($file)
{
}
/**
 *	Return MIME type of a file from its name with extension.
 *
 *	@param	string	$file		Filename we looking for MIME type
 *  @param  string	$default    Default mime type if extension not found in known list
 * 	@param	int<0,4>	$mode	0=Return full mime, 1=otherwise short mime string, 2=image for mime type, 3=source language, 4=css of font fa
 *	@return string 		    	Return a mime type family (text/xxx, application/xxx, image/xxx, audio, video, archive)
 *  @see    dolIsAllowedForPreview(), image_format_supported() from images.lib.php
 */
function dol_mimetype($file, $default = 'application/octet-stream', $mode = 0)
{
}
/**
 * Return the value of a filed into a dictionary for the record $id.
 * This also set all the values into a cache for a next search.
 *
 * @param string	$tablename		Name of table dictionary (without the MAIN_DB_PREFIX, example: 'c_holiday_types')
 * @param string	$field			The name of field where to find the value to return
 * @param int		$id				Id of line record
 * @param bool		$checkentity	Add filter on entity
 * @param string	$rowidfield		Name of the column rowid (to use for the filter on $id)
 * @return string					The value of field $field. This also set $dictvalues cache.
 */
function getDictionaryValue($tablename, $field, $id, $checkentity = \false, $rowidfield = 'rowid')
{
}
/**
 *	Return true if the color is light
 *
 *  @param	string	$stringcolor		String with hex (FFFFFF) or comma RGB ('255,255,255')
 *  @return	int<-1,1>					-1 : Error with argument passed |0 : color is dark | 1 : color is light
 */
function colorIsLight($stringcolor)
{
}
/**
 * Function to test if an entry is enabled or not
 *
 * @param	int<0,1>	$type_user					0=We test for internal user, 1=We test for external user
 * @param	array{enabled:int<0,1>,module:string,perms:string} $menuentry	Array for feature entry to test
 * @param	string[]	$listofmodulesforexternal	Array with list of modules allowed to external users
 * @return	int<0,2>								0=Hide, 1=Show, 2=Show gray
 */
function isVisibleToUserType($type_user, &$menuentry, &$listofmodulesforexternal)
{
}
/**
 * Round to next multiple.
 *
 * @param 	float	$n		Number to round up
 * @param 	int		$x		Multiple. For example 60 to round up to nearest exact minute for a date with seconds.
 * @return 	int				Value rounded.
 */
function roundUpToNextMultiple($n, $x = 5)
{
}
/**
 * Function dolGetBadge
 *
 * @param   string  			$label      label of badge no html : use in alt attribute for accessibility
 * @param   string  			$html       optional : label of badge with html
 * @param   string  			$type       type of badge : Primary Secondary Success Danger Warning Info Light Dark status0 status1 status2 status3 status4 status5 status6 status7 status8 status9
 * @param   ''|'pill'|'dot'		$mode		Default '' , 'pill', 'dot'
 * @param   string  			$url        the url for link
 * @param   array<string,mixed>	$params		Various params for future : recommended rather than adding more function arguments. array('attr'=>array('title'=>'abc'))
 * @return  string              			Html badge
 */
function dolGetBadge($label, $html = '', $type = 'primary', $mode = '', $url = '', $params = array())
{
}
/**
 * Output the badge of a status.
 *
 * @param   string  			$statusLabel		Label of badge no html : use in alt attribute for accessibility
 * @param   string  			$statusLabelShort	Short label of badge no html
 * @param   string  			$html				Optional : label of badge with html
 * @param   string  			$statusType			status0 status1 status2 status3 status4 status5 status6 status7 status8 status9 : image name or badge name
 * @param   int<0,6>			$displayMode		0=Long label, 1=Short label, 2=Picto + Short label, 3=Picto, 4=Picto + Long label, 5=Short label + Picto, 6=Long label + Picto
 * @param   string  			$url				The url for link
 * @param   array<string,mixed>	$params				Various params. Example: array('tooltip'=>'no|...', 'badgeParams'=>...)
 * @return  string									Html status string
 */
function dolGetStatus($statusLabel = '', $statusLabelShort = '', $html = '', $statusType = 'status0', $displayMode = 0, $url = '', $params = array())
{
}
/**
 * Function dolGetButtonAction
 *
 * @param string    	$label      	Label or tooltip of button if $text is provided. Also used as tooltip in title attribute. Can be escaped HTML content or full simple text.
 * @param string    	$text       	Optional : short label on button. Can be escaped HTML content or full simple text.
 * @param string 		$actionType 	'default', 'danger', 'email', 'clone', 'cancel', 'delete', ...
 *
 * @param string|array<int,array{lang:string,enabled:bool,perm:bool,label:string,url:string,urlroot?:string,isDropDown?:int<0,1>}> 	$url        	Url for link or array of subbutton description
 *
 *                                                                                                                                                  Example when an array is used:
 *                                                                                                                                                  $arrayforbutaction = array(
 *                                                                                                                                                  10 => array('attr' => array('class'=>''), 'lang'=>'propal', 'enabled'=>isModEnabled("propal"), 'perm'=>$user->hasRight('propal', 'creer'), 'label' => 'AddProp', 'url'=>'/comm/propal/card.php?action=create&amp;projectid='.$object->id.'&amp;socid='.$object->socid),
 *                                                                                                                                                  20 => array('attr' => array('class'=>''), 'lang'=>'mymodule', 'enabled'=>isModEnabled("mymodule"), 'perm'=>$user->hasRight('mymodule', 'write'), 'label' => 'MyModuleAction', 'urlroot'=>dol_build_patch('/mymodule/mypage.php?action=create')),
 *                                                                                                                                                  30 => array('attr' => array('class'=>''), 'lang'=>'mymodule', 'enabled'=>isModEnabled("mymodule"), 'perm'=>$user->hasRight('mymodule', 'write'), 'label' => 'MyModuleOtherAction', 'urlraw' => '# || external Url || javascript: || tel: || mailto:' ),
 *                                                                                                                                                  );                                                                                                               );
 * @param string    	$id         	Attribute id of action button. Example 'action-delete'. This can be used for full ajax confirm if this code is reused into the ->formconfirm() method.
 * @param int|boolean	$userRight  	User action right. Use 0 if user has no permission. It will add the message "No permission" on tooltip. Use -1 to have button not allowed without adding the message (because an explicit label is already set).
 * // phpcs:disable
 * @param array{confirm?:array{url?:string,title?:string,content?:string,use_unsecured_unescapedattr?:bool|string[],action-btn-label?:string,cancel-btn-label?:string,modal?:bool},attr?:array<string,mixed>,areDropdownButtons?:bool,backtopage?:string,lang?:string,enabled?:bool,perm?:int<0,1>,label?:string,url?:string,isDropdown?:int<0,1>,isDropDown?:int<0,1>}	$params = [ // Various params for future : recommended rather than adding more function arguments
 *                                                                                                                                                                                                                                                                                                                                      'attr' => [ // to add or override button attributes
 *                                                                                                                                                                                                                                                                                                                                      'xxxxx' => '', // your xxxxx attribute you want
 *                                                                                                                                                                                                                                                                                                                                      'class' => 'reposition', // to add more css class to the button class attribute
 *                                                                                                                                                                                                                                                                                                                                      'classOverride' => '' // to replace class attribute of the button
 *                                                                                                                                                                                                                                                                                                                                      ],
 *                                                                                                                                                                                                                                                                                                                                      'confirm' => [
 *                                                                                                                                                                                                                                                                                                                                      'url' => 'http://', // Override Url to go when user click on action btn, if empty default url is $url.?confirm=yes, for no js compatibility use $url for fallback confirm.
 *                                                                                                                                                                                                                                                                                                                                      'title' => '', // Override title of modal,  if empty default title use "ConfirmBtnCommonTitle" lang key
 *                                                                                                                                                                                                                                                                                                                                      'action-btn-label' => '', // Override label of action button,  if empty default label use "Confirm" lang key
 *                                                                                                                                                                                                                                                                                                                                      'cancel-btn-label' => '', // Override label of cancel button,  if empty default label use "CloseDialog" lang key
 *                                                                                                                                                                                                                                                                                                                                      'content' => '', // Override text of content,  if empty default content use "ConfirmBtnCommonContent" lang key
 *                                                                                                                                                                                                                                                                                                                                      'modal' => true, // true|false to display dialog as a modal (with dark background)
 *                                                                                                                                                                                                                                                                                                                                      'isDropDown' => false, // true|false to display dialog as a dropdown list (css dropdown-item with dark background)
 *                                                                                                                                                                                                                                                                                                                                      ],
 *                                                                                                                                                                                                                                                                                                                                      ]
 * // phpcs:enable
 *                                                                                                                                                                                                                                                                                                                                                                              Example: array('attr' => array('class' => 'reposition'))
 * @return string               		html button
 */
function dolGetButtonAction($label, $text = '', $actionType = 'default', $url = '', $id = '', $userRight = 1, $params = array())
{
}
/**
 * An function to complete dropdown url in dolGetButtonAction
 *
 * @param string 				$url 			the Url to complete
 * @param array<string,mixed> 	$params 		params of dolGetButtonAction function
 * @param bool 					$addDolUrlRoot 	to add root url
 * @return string
 */
function dolCompletUrlForDropdownButton(string $url, array $params, bool $addDolUrlRoot = \true)
{
}
/**
 * Add space between dolGetButtonTitle
 *
 * @param  string $moreClass 	more css class label
 * @return string 				html of title separator
 */
function dolGetButtonTitleSeparator($moreClass = "")
{
}
/**
 * get field error icon
 *
 * @param  string  $fieldValidationErrorMsg 	Message to add in tooltip
 * @return string html output
 */
function getFieldErrorIcon($fieldValidationErrorMsg)
{
}
/**
 * Function dolGetButtonTitle : this kind of buttons are used in title in list
 *
 * @param string    $label      label of button
 * @param string    $helpText   optional : content for help tooltip
 * @param string    $iconClass  class for icon element (Example: 'fa fa-file')
 * @param string    $url        the url for link
 * @param string    $id         attribute id of button
 * @param int<-2,2>	$status     0 no user rights, 1 active, 2 current action or selected, -1 Feature Disabled (deprecated, use -2 instead), -2 disable Other reason use param $helpText as tooltip help
 * @param array<string,mixed>	$params		various parameters for future : recommended rather than adding more function arguments
 * @return string               html button
 */
function dolGetButtonTitle($label, $helpText = '', $iconClass = 'fa fa-file', $url = '', $id = '', $status = 1, $params = array())
{
}
/**
 * Get an array with properties of an element.
 *
 * @param   string $elementType       Element type (Value of $object->element or value of $object->element@$object->module). Example:
 *                                    'action', 'facture', 'project', 'project_task' or
 *                                    'myobject@mymodule' (or old syntax 'mymodule_myobject' like 'project_task')
 * @return  array{module:string,element:string,table_element:string,subelement:string,classpath:string,classfile:string,classname:string,dir_output:string,dir_temp:string,parent_element:string}		array('module'=>, 'classpath'=>, 'element'=>, 'subelement'=>, 'classfile'=>, 'classname'=>, 'dir_output'=>, 'dir_temp'=>)
 * @see fetchObjectByElement(), getMultidirOutput()
 */
function getElementProperties($elementType)
{
}
/**
 * Fetch an object from its id and element_type
 * Inclusion of classes is automatic
 *
 * @param	int     	$element_id 		Element id (Use this or element_ref but not both. If id and ref are empty, object with no fetch is returned)
 * @param	string  	$element_type 		Element type ('module' or 'myobject@mymodule' or 'mymodule_myobject')
 * @param	string     	$element_ref 		Element ref (Use this or element_id but not both. If id and ref are empty, object with no fetch is returned)
 * @param	int<0,2>	$useCache 			If you want to store object in cache or get it from cache 0 => no use cache , 1 use cache, 2 force reload  cache
 * @param	int			$maxCacheByType 	Number of object in cache for this element type
 * @return 	int<-1,0>|CommonObject 			object || 0 || <0 if error
 * @see getElementProperties()
 */
function fetchObjectByElement($element_id, $element_type, $element_ref = '', $useCache = 0, $maxCacheByType = 10)
{
}
/**
 * Return if a file can contains executable content
 *
 * @param   string  $filename       File name to test
 * @return  boolean                 True if yes, False if no
 */
function isAFileWithExecutableContent($filename)
{
}
/**
 * Return the value of token currently saved into session with name 'newtoken'.
 * This token must be send by any POST as it will be used by next page for comparison with value in session.
 *
 * @since Dolibarr v10.0.7
 * @return  string
 */
function newToken()
{
}
/**
 * Return the value of token currently saved into session with name 'token'.
 * For ajax call, you must use this token as a parameter of the call into the js calling script (the called ajax php page must also set constant NOTOKENRENEWAL).
 *
 * @since Dolibarr v10.0.7
 * @return  string
 */
function currentToken()
{
}
/**
 * Return a random string to be used as a nonce value for js
 *
 * @return  string
 */
function getNonce()
{
}
/**
 * Start a table with headers and a optional clickable number (don't forget to use "finishSimpleTable()" after the last table row)
 *
 * @param string	$header			The first left header of the table (automatic translated)
 * @param string	$link			(optional) The link to a internal dolibarr page, where to go on clicking on the number or the ... (without the first "/")
 * @param string	$arguments		(optional) Additional arguments for the link (e.g. "search_status=0")
 * @param integer	$emptyColumns	(optional) Number of empty columns to add after the first column
 * @param integer	$number			(optional) The number that is shown right after the first header, when -1 the link is shown as '...'
 * @param string	$pictofulllist 	(optional) The picto to use for the full list link
 * @return void
 *
 * @see finishSimpleTable()
 */
function startSimpleTable($header, $link = "", $arguments = "", $emptyColumns = 0, $number = -1, $pictofulllist = '')
{
}
/**
 * Add the correct HTML close tags for "startSimpleTable(...)" (use after the last table line)
 *
 * @param 	bool 	$addLineBreak	(optional) Add a extra line break after the complete table (\<br\>)
 * @return 	void
 *
 * @see startSimpleTable()
 */
function finishSimpleTable($addLineBreak = \false)
{
}
/**
 * Add a summary line to the current open table ("None", "XMoreLines" or "Total xxx")
 *
 * @param integer	$tableColumnCount		The complete count columns of the table
 * @param integer	$num					The count of the rows of the table, when it is zero (0) the "$noneWord" is shown instead
 * @param integer	$nbofloop				(optional)	The maximum count of rows thaht the table show (when it is zero (0) no summary line will show, expect "$noneWord" when $num === 0)
 * @param integer	$total					(optional)	The total value thaht is shown after when the table has minimum of one entire
 * @param string	$noneWord				(optional)	The word that is shown when the table has no entries ($num === 0)
 * @param boolean	$extraRightColumn		(optional)	Add a additional column after the summary word and total number
 * @return void
 */
function addSummaryTableLine($tableColumnCount, $num, $nbofloop = 0, $total = 0, $noneWord = "None", $extraRightColumn = \false)
{
}
/**
 *  Return a file on output using a low memory. It can return very large files with no need of memory.
 *  WARNING: This close output buffers.
 *
 *  @param	string		$fullpath_original_file_osencoded	Full path of file to return.
 *  @param	int<-1,2>	$method								-1 automatic, 0=readfile, 1=fread, 2=stream_copy_to_stream
 *  @return void
 */
function readfileLowMemory($fullpath_original_file_osencoded, $method = -1)
{
}
/**
 * Create a button to copy $valuetocopy in the clipboard (for copy and paste feature).
 * Code that handle the click is inside core/js/lib_foot.js.php.
 *
 * @param 	string 		$valuetocopy 		The value to print
 * @param	int<0,1>	$showonlyonhover	Show the copy-paste button only on hover
 * @param	string		$texttoshow			Replace the value to show with this text. Use 'none' to show no text (only the copy-paste picto)
 * @return 	string 							The string to print for the button
 */
function showValueWithClipboardCPButton($valuetocopy, $showonlyonhover = 1, $texttoshow = '')
{
}
/**
 * Decode an encode string. The string can be encoded in json format (recommended) or with serialize (avoid this)
 *
 * @param 	string	$stringtodecode		String to decode (json or serialize coded)
 * @return	mixed						The decoded object.
 */
function jsonOrUnserialize($stringtodecode)
{
}
/**
 * forgeSQLFromUniversalSearchCriteria
 *
 * @param 	?string		$filter		String with universal search string. Must be '(aaa:bbb:ccc) OR (ddd:eeee:fff) ...' with
 * 									aaa is a field name (with alias or not) and
 * 									bbb is one of this operator '=', '<', '>', '<=', '>=', '!=', 'in', 'notin', 'like', 'notlike', 'is', 'isnot'.
 * 									ccc must not contains ( or )
 * 									Example: '((client:=:1) OR ((client:>=:2) AND (client:<=:3))) AND (client:!=:8) AND (nom:like:'a%')'
 * @param	string		$errorstr	Error message string
 * @param	int<0,1>	$noand		1=Do not add the AND before the condition string.
 * @param	int<0,1>	$nopar		1=Do not add the parenthesis around the final condition string.
 * @param	int<0,1>	$noerror	1=If search criteria is not valid, does not return an error string but invalidate the SQL
 * @return	string					Return forged SQL string
 * @see dolSqlDateFilter()
 * @see natural_search()
 */
function forgeSQLFromUniversalSearchCriteria($filter, &$errorstr = '', $noand = 0, $nopar = 0, $noerror = 0)
{
}
/**
 * Explode an universal search string with AND parts.
 * This is used to output the search criteria in an UFS (Universal Filter Syntax) input component.
 *
 * @param 	string			$sqlfilters			Universal SQL filter string. Must have been trimmed before.
 * @return 	string[]							Array of AND
 */
function dolForgeExplodeAnd($sqlfilters)
{
}
/**
 * Return if a $sqlfilters parameter has a valid balance of parenthesis
 *
 * @param	string  		$sqlfilters     	Universal SQL filter string. Must have been trimmed before.
 * @param	string			$error				Returned error message
 * @param	int				$parenthesislevel	Returned level of global parenthesis that we can remove/simplify, 0 if error or we can't simplify.
 * @return 	boolean			   					True if valid, False if not valid ($error returned parameter is filled with the reason in such a case)
 * @see forgeSQLFromUniversalSearchCriteria()
 */
function dolCheckFilters($sqlfilters, &$error = '', &$parenthesislevel = 0)
{
}
/**
 * Function to forge a SQL criteria from a Dolibarr filter syntax string.
 * This method is called by forgeSQLFromUniversalSearchCriteria()
 *
 * @param  string[]	$matches       Array of found string by regex search. Example: "t.ref:like:'SO-%'" or "t.date_creation:<:'20160101'" or "t.nature:is:NULL"
 * @return string                  Forged criteria. Example: "" or "()"
 */
function dolForgeDummyCriteriaCallback($matches)
{
}
/**
 * Function to forge a SQL criteria from a USF (Universal Filter Syntax) string.
 * This method is called by forgeSQLFromUniversalSearchCriteria()
 *
 * @param  string[]	$matches       	Array of found string by regex search.
 * 									Example: "t.ref:like:'SO-%'" or "t.date_creation:<:'20160101'" or "t.date_creation:<:'2016-01-01 12:30:00'" or "t.nature:is:NULL"
 * @return string                  	Forged criteria. Example: "t.field LIKE 'abc%'"
 */
function dolForgeSQLCriteriaCallback($matches)
{
}
/**
 * Get timeline icon
 *
 * @param 	ActionComm 	$actionstatic 	actioncomm
 * @param 	array<int,array{percent:int}>	$histo 			histo
 * @param 	int 		$key 			key
 * @return 	string						String with timeline icon
 * @deprecated Use actioncomm->getPictoType() instead
 */
function getTimelineIcon($actionstatic, &$histo, $key)
{
}
/**
 * getActionCommEcmList
 *
 * @param	ActionComm		$object			Object ActionComm
 * @return 	array<int,stdClass>				Array of documents in index table
 */
function getActionCommEcmList($object)
{
}
/**
 *	Show html area with actions in messaging format.
 *	Note: Global parameter $param must be defined.
 *
 *	@param	Conf				$conf		Object conf
 *	@param	Translate			$langs		Object langs
 *	@param	DoliDB				$db			Object db
 *	@param	?CommonObject		$filterobj	Filter on object Adherent|Societe|Project|Product|CommandeFournisseur|Dolresource|Ticket|... to list events linked to an object
 *	@param	?Contact			$objcon		Filter on object contact to filter events on a contact
 *	@param  int					$noprint	Return string but does not output it
 *	@param  string				$actioncode	Filter on actioncode
 *	@param  string				$donetodo	Filter on event 'done' or 'todo' or ''=nofilter (all).
 *	@param  array<string,string>	$filters	Filter on other fields
 *	@param  string				$sortfield	Sort field
 *	@param  string				$sortorder	Sort order
 *	@return	?string							Return html part or void if noprint is 1
 */
function show_actions_messaging($conf, $langs, $db, $filterobj, $objcon = \null, $noprint = 0, $actioncode = '', $donetodo = 'done', $filters = array(), $sortfield = 'a.datep,a.id', $sortorder = 'DESC')
{
}
/**
 * Helper function that combines values of a dolibarr DatePicker (such as Form::selectDate) for year, month, day (and
 * optionally hour, minute, second) fields to return a portion of URL reproducing the values from the current HTTP
 * request.
 *
 * @param 	string $prefix 		Prefix used to build the date selector (for instance using Form::selectDate)
 * @param 	?int $timestamp 	If null, the timestamp will be created from request data
 * @param 	string $hourTime 	If timestamp is null, will be passed to GETPOSTDATE to construct the timestamp
 * @param 	string $gm 			If timestamp is null, will be passed to GETPOSTDATE to construct the timestamp
 * @return 	string 				Portion of URL with query parameters for the specified date
 */
function buildParamDate($prefix, $timestamp = \null, $hourTime = '', $gm = 'auto')
{
}
/**
 * Displays an error page when a record is not found. It allows customization of the message,
 * whether to include the header and footer, and if only the message should be shown without additional details.
 * The function also supports executing additional hooks for customized handling of error pages.
 *
 * @param string 	$message Custom error message to display. If empty, a default "Record Not Found" message is shown.
 * @param int<0,1> 	$printheader Determines if the page header should be printed (1 = yes, 0 = no).
 * @param int<0,1> 	$printfooter Determines if the page footer should be printed (1 = yes, 0 = no).
 * @param int<0,1> 	$showonlymessage If set to 1, only the error message is displayed without any additional information or hooks.
 * @param mixed 	$params Optional parameters to pass to hooks for further processing or customization.
 * @global Conf $conf Dolibarr configuration object (global)
 * @global DoliDB $db Database connection object (global)
 * @global Translate $langs Language translation object, initialized within the function if not already.
 * @global HookManager $hookmanager Hook manager object, initialized within the function if not already for executing hooks.
 * @global string $action Current action, can be modified by hooks.
 * @global object $object Current object, can be modified by hooks.
 * @return void This function terminates script execution after outputting the error page.
 */
function recordNotFound($message = '', $printheader = 1, $printfooter = 1, $showonlymessage = 0, $params = \null)
{
}