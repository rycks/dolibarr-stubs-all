<?php

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
 *									'product', 'productprice', 'stock',
 *									'propal', 'supplier_proposal', 'invoice', 'facture_fourn', 'payment_various',
 *									'categorie', 'bank_account', 'bank_account', 'adherent', 'user',
 *									'commande', 'commande_fournisseur', 'expedition', 'intervention', 'survey',
 *									'contract', 'tax', 'expensereport', 'holiday', 'multicurrency', 'project',
 *									'email_template', 'event', 'donation'
 *									'c_paiement', 'c_payment_term', ...
 * 	@param	int		$shared			0=Return id of current entity only,
 * 									1=Return id of current entity + shared entities (default)
 *  @param	object	$currentobject	Current object if needed
 * 	@return	mixed					Entity id(s) to use ( eg. entity IN ('.getEntity(elementname).')' )
 */
function getEntity($element, $shared = 1, $currentobject = \null)
{
}
/**
 * 	Set entity id to use when to create an object
 *
 * 	@param	object	$currentobject	Current object
 * 	@return	mixed					Entity id to use ( eg. entity = '.setEntity($object) )
 */
function setEntity($currentobject)
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
 * @return	array Check function documentation
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
 * Return true if we are in a context of submitting a parameter
 *
 * @param 	string	$paramname		Name or parameter to test
 * @return 	boolean					True if we have just submit a POST or GET request with the parameter provided (even if param is empty)
 */
function GETPOSTISSET($paramname)
{
}
/**
 *  Return value of a param into GET or POST supervariable.
 *  Use the property $user->default_values[path]['creatform'] and/or $user->default_values[path]['filters'] and/or $user->default_values[path]['sortorder']
 *  Note: The property $user->default_values is loaded by main.php when loading the user.
 *
 *  @param  string  $paramname   Name of parameter to found
 *  @param  string  $check	     Type of check
 *                               ''=no check (deprecated)
 *                               'none'=no check (only for param that should have very rich content)
 *                               'int'=check it's numeric (integer or float)
 *                               'intcomma'=check it's integer+comma ('1,2,3,4...')
 *                               'alpha'=check it's text and sign
 *                               'aZ'=check it's a-z only
 *                               'aZ09'=check it's simple alpha string (recommended for keys)
 *                               'array'=check it's array
 *                               'san_alpha'=Use filter_var with FILTER_SANITIZE_STRING (do not use this for free text string)
 *                               'nohtml', 'alphanohtml'=check there is no html content
 *                               'custom'= custom filter specify $filter and $options)
 *  @param	int		$method	     Type of method (0 = get then post, 1 = only get, 2 = only post, 3 = post then get)
 *  @param  int     $filter      Filter to apply when $check is set to 'custom'. (See http://php.net/manual/en/filter.filters.php for détails)
 *  @param  mixed   $options     Options to pass to filter_var when $check is set to 'custom'
 *  @param	string	$noreplace	 Force disable of replacement of __xxx__ strings.
 *  @return string|string[]      Value found (string or array), or '' if check fails
 */
function GETPOST($paramname, $check = 'none', $method = 0, $filter = \null, $options = \null, $noreplace = 0)
{
}
/**
 *  Return a prefix to use for this Dolibarr instance, for session/cookie names or email id.
 *  The prefix is unique for instance and avoid conflict between multi-instances, even when having two instances with same root dir
 *  or two instances in same virtual servers.
 *
 *  @param  string  $mode                   '' (prefix for session name) or 'email' (prefix for email id)
 *  @return	string                          A calculated prefix
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
 *  @param	int		$type						0=Used for a Filesystem path, 1=Used for an URL path (output relative), 2=Used for an URL path (output full path using same host that current url), 3=Used for an URL path (output full path using host defined into $dolibarr_main_url_root of conf file)
 *  @param	int		$returnemptyifnotfound		0:If $type==0 and if file was not found into alternate dir, return default path into main dir (no test on it)
 *  											1:If $type==0 and if file was not found into alternate dir, return empty string
 *  											2:If $type==0 and if file was not found into alternate dir, test into main dir, return default path if found, empty string if not found
 *  @return string								Full filesystem path (if path=0) or '' if file not found, Full url path (if mode=1)
 */
function dol_buildpath($path, $type = 0, $returnemptyifnotfound = 0)
{
}
/**
 *	Create a clone of instance of object (new instance with same value for properties)
 *  With native = 0: Property that are reference are also new object (full isolation clone). This means $this->db of new object is not valid.
 *  With native = 1: Use PHP clone. Property that are reference are same pointer. This means $this->db of new object is still valid but point to same this->db than original object.
 *
 * 	@param	object	$object		Object to clone
 *  @param	int		$native		0=Full isolation method, 1=Native PHP method
 *	@return object				Clone object
 *  @see https://php.net/manual/language.oop5.cloning.php
 */
function dol_clone($object, $native = 0)
{
}
/**
 *	Optimize a size for some browsers (phone, smarphone, ...)
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
 *	Clean a string to use it as a file name
 *
 *	@param	string	$str            String to clean
 * 	@param	string	$newstr			String to replace bad chars with
 *  @param	int	    $unaccent		1=Remove also accent (default), 0 do not remove them
 *	@return string          		String cleaned (a-zA-Z_)
 *
 * 	@see        	dol_string_nospecial(), dol_string_unaccent(), dol_sanitizePathName()
 */
function dol_sanitizeFileName($str, $newstr = '_', $unaccent = 1)
{
}
/**
 *	Clean a string to use it as a path name
 *
 *	@param	string	$str            String to clean
 * 	@param	string	$newstr			String to replace bad chars with
 *  @param	int	    $unaccent		1=Remove also accent (default), 0 do not remove them
 *	@return string          		String cleaned (a-zA-Z_)
 *
 * 	@see        	dol_string_nospecial(), dol_string_unaccent(), dol_sanitizeFileName()
 */
function dol_sanitizePathName($str, $newstr = '_', $unaccent = 1)
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
 *  This is a more complete function than dol_sanitizeFileName.
 *
 *	@param	string	$str            	String to clean
 * 	@param	string	$newstr				String to replace forbidden chars with
 *  @param  array	$badcharstoreplace  List of forbidden characters
 * 	@return string          			Cleaned string
 *
 * 	@see    		dol_sanitizeFilename(), dol_string_unaccent()
 */
function dol_string_nospecial($str, $newstr = '_', $badcharstoreplace = '')
{
}
/**
 *  Returns text escaped for inclusion into javascript code
 *
 *  @param      string		$stringtoescape		String to escape
 *  @param		int		$mode				0=Escape also ' and " into ', 1=Escape ' but not " for usage into 'string', 2=Escape " but not ' for usage into "string", 3=Escape ' and " with \
 *  @param		int		$noescapebackslashn	0=Escape also \n. 1=Do not escape \n.
 *  @return     string     		 				Escaped string. Both ' and " are escaped into ' if they are escaped.
 */
function dol_escape_js($stringtoescape, $mode = 0, $noescapebackslashn = 0)
{
}
/**
 *  Returns text escaped for inclusion in HTML alt or title tags, or into values of HTML input fields.
 *
 *  @param      string		$stringtoescape		String to escape
 *  @param		int			$keepb				1=Preserve b tags (otherwise, remove them)
 *  @param      int         $keepn              1=Preserve \r\n strings (otherwise, replace them with escaped value). Set to 1 when escaping for a <textarea>.
 *  @param		string		$keepmoretags		'' or 'common' or list of tags
 *  @return     string     				 		Escaped string
 *  @see		dol_string_nohtmltag(), dol_string_nospecial(), dol_string_unaccent()
 */
function dol_escape_htmltag($stringtoescape, $keepb = 0, $keepn = 0, $keepmoretags = '')
{
}
/**
 * Convert a string to lower. Never use strtolower because it does not works with UTF8 strings.
 *
 * @param 	string		$utf8_string		String to encode
 * @return 	string							String converted
 */
function dol_strtolower($utf8_string)
{
}
/**
 * Convert a string to upper. Never use strtolower because it does not works with UTF8 strings.
 *
 * @param 	string		$utf8_string		String to encode
 * @return 	string							String converted
 */
function dol_strtoupper($utf8_string)
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
 *  @param  int			$level					Log level
 *												On Windows LOG_ERR=4, LOG_WARNING=5, LOG_NOTICE=LOG_INFO=6, LOG_DEBUG=6 si define_syslog_variables ou PHP 5.3+, 7 si dolibarr
 *												On Linux   LOG_ERR=3, LOG_WARNING=4, LOG_INFO=6, LOG_DEBUG=7
 *  @param	int			$ident					1=Increase ident of 1, -1=Decrease ident of 1
 *  @param	string		$suffixinfilename		When output is a file, append this suffix into default log filename.
 *  @param	string		$restricttologhandler	Force output of log only to this log handler
 *  @param	array|null	$logcontext				If defined, an array with extra informations (can be used by some log handlers)
 *  @return	void
 */
function dol_syslog($message, $level = \LOG_INFO, $ident = 0, $suffixinfilename = '', $restricttologhandler = '', $logcontext = \null)
{
}
/**
 *	Show tab header of a card
 *
 *	@param	array	$links				Array of tabs. Currently initialized by calling a function xxx_admin_prepare_head
 *	@param	string	$active     		Active tab name (document', 'info', 'ldap', ....)
 *	@param  string	$title      		Title
 *	@param  int		$notab				-1 or 0=Add tab header, 1=no tab header (if you set this to 1, using dol_fiche_end() to close tab is not required), -2=Add tab header with no seaparation under tab (to start a tab just after)
 * 	@param	string	$picto				Add a picto on tab title
 *	@param	int		$pictoisfullpath	If 1, image path is a full path. If you set this to 1, you can use url returned by dol_buildpath('/mymodyle/img/myimg.png',1) for $picto.
 *  @param	string	$morehtmlright		Add more html content on right of tabs title
 *  @param	string	$morecss			More Css
 * 	@return	void
 */
function dol_fiche_head($links = array(), $active = '0', $title = '', $notab = 0, $picto = '', $pictoisfullpath = 0, $morehtmlright = '', $morecss = '')
{
}
/**
 *  Show tab header of a card
 *
 *	@param	array	$links				Array of tabs
 *	@param	string	$active     		Active tab name
 *	@param  string	$title      		Title
 *	@param  int		$notab				-1 or 0=Add tab header, 1=no tab header (if you set this to 1, using dol_fiche_end() to close tab is not required), -2=Add tab header with no seaparation under tab (to start a tab just after)
 * 	@param	string	$picto				Add a picto on tab title
 *	@param	int		$pictoisfullpath	If 1, image path is a full path. If you set this to 1, you can use url returned by dol_buildpath('/mymodyle/img/myimg.png',1) for $picto.
 *  @param	string	$morehtmlright		Add more html content on right of tabs title
 *  @param	string	$morecss			More Css
 * 	@return	string
 */
function dol_get_fiche_head($links = array(), $active = '', $title = '', $notab = 0, $picto = '', $pictoisfullpath = 0, $morehtmlright = '', $morecss = '')
{
}
/**
 *  Show tab footer of a card
 *
 *  @param	int		$notab       -1 or 0=Add tab footer, 1=no tab footer
 *  @return	void
 */
function dol_fiche_end($notab = 0)
{
}
/**
 *	Return tab footer of a card
 *
 *	@param  int		$notab		-1 or 0=Add tab footer, 1=no tab footer
 *  @return	string
 */
function dol_get_fiche_end($notab = 0)
{
}
/**
 *  Show tab footer of a card.
 *  Note: $object->next_prev_filter can be set to restrict select to find next or previous record by $form->showrefnav.
 *
 *  @param	Object	$object			Object to show
 *  @param	string	$paramid   		Name of parameter to use to name the id into the URL next/previous link
 *  @param	string	$morehtml  		More html content to output just before the nav bar
 *  @param	int		$shownav	  	Show Condition (navigation is shown if value is 1)
 *  @param	string	$fieldid   		Nom du champ en base a utiliser pour select next et previous (we make the select max and min on this field). Use 'none' for no prev/next search.
 *  @param	string	$fieldref   	Nom du champ objet ref (object->ref) a utiliser pour select next et previous
 *  @param	string	$morehtmlref  	More html to show after ref
 *  @param	string	$moreparam  	More param to add in nav link url.
 *	@param	int		$nodbprefix		Do not include DB prefix to forge table name
 *	@param	string	$morehtmlleft	More html code to show before ref
 *	@param	string	$morehtmlstatus	More html code to show under navigation arrows
 *  @param  int     $onlybanner     Put this to 1, if the card will contains only a banner (this add css 'arearefnobottom' on div)
 *	@param	string	$morehtmlright	More html code to show before navigation arrows
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
 * Return string to add class property on html element with pair/impair.
 *
 * @param	string	$var			0 or 1
 * @param	string	$moreclass		More class to add
 * @return	string					String to add class onto HTML element
 */
function dol_bc($var, $moreclass = '')
{
}
/**
 *      Return a formated address (part address/zip/town/state) according to country rules.
 *      See https://en.wikipedia.org/wiki/Address
 *
 *      @param  Object		$object			A company or contact object
 * 	    @param	int			$withcountry	1=Add country into address string
 *      @param	string		$sep			Separator to use to build string
 *      @param	Translate	$outputlangs	Object lang that contains language for text translation.
 *      @param	int			$mode			0=Standard output, 1=Remove address
 *      @return string						Formated string
 *      @see dol_print_address()
 */
function dol_format_address($object, $withcountry = 0, $sep = "\n", $outputlangs = '', $mode = 0)
{
}
/**
 *	Format a string.
 *
 *	@param	string	$fmt		Format of strftime function (http://php.net/manual/fr/function.strftime.php)
 *  @param	int		$ts			Timesamp (If is_gmt is true, timestamp is already includes timezone and daylight saving offset, if is_gmt is false, timestamp is a GMT timestamp and we must compensate with server PHP TZ)
 *  @param	int		$is_gmt		See comment of timestamp parameter
 *	@return	string				A formatted string
 */
function dol_strftime($fmt, $ts = \false, $is_gmt = \false)
{
}
/**
 *	Output date in a string format according to outputlangs (or langs if not defined).
 * 	Return charset is always UTF-8, except if encodetoouput is defined. In this case charset is output charset
 *
 *	@param	int			$time			GM Timestamps date
 *	@param	string		$format      	Output date format (tag of strftime function)
 *										"%d %b %Y",
 *										"%d/%m/%Y %H:%M",
 *										"%d/%m/%Y %H:%M:%S",
 *                                      "%B"=Long text of month, "%A"=Long text of day, "%b"=Short text of month, "%a"=Short text of day
 *										"day", "daytext", "dayhour", "dayhourldap", "dayhourtext", "dayrfc", "dayhourrfc", "...reduceformat"
 * 	@param	string		$tzoutput		true or 'gmt' => string is for Greenwich location
 * 										false or 'tzserver' => output string is for local PHP server TZ usage
 * 										'tzuser' => output string is for user TZ (current browser TZ with current dst) => In a future, we should have same behaviour than 'tzuserrel'
 *                                      'tzuserrel' => output string is for user TZ (current browser TZ with dst or not, depending on date position) (TODO not implemented yet)
 *	@param	Translate	$outputlangs	Object lang that contains language for text translation.
 *  @param  boolean		$encodetooutput false=no convert into output pagecode
 * 	@return string      				Formated date or '' if time is null
 *
 *  @see        dol_mktime(), dol_stringtotime(), dol_getdate()
 */
function dol_print_date($time, $format = '', $tzoutput = 'tzserver', $outputlangs = '', $encodetooutput = \false)
{
}
/**
 *  Return an array with locale date info.
 *  PHP getdate is restricted to the years 1901-2038 on Unix and 1970-2038 on Windows
 *  WARNING: This function always use PHP server timezone to return locale informations !!!
 *  Usage must be avoid.
 *  FIXME: Replace this with PHP date function and a parameter $gm
 *
 *	@param	int			$timestamp      Timestamp
 *	@param	boolean		$fast           Fast mode
 *	@return	array						Array of informations
 *										If no fast mode:
 *										'seconds' => $secs,
 *										'minutes' => $min,
 *										'hours' => $hour,
 *										'mday' => $day,
 *										'wday' => $dow,		0=sunday, 6=saturday
 *										'mon' => $month,
 *										'year' => $year,
 *										'yday' => floor($secsInYear/$_day_power),
 *										'weekday' => gmdate('l',$_day_power*(3+$dow)),
 *										'month' => gmdate('F',mktime(0,0,0,$month,2,1971)),
 *										If fast mode:
 *										'seconds' => $secs,
 *										'minutes' => $min,
 *										'hours' => $hour,
 *										'mday' => $day,
 *										'mon' => $month,
 *										'year' => $year,
 *										'yday' => floor($secsInYear/$_day_power),
 *										'leap' => $leaf,
 *										'ndays' => $ndays
 * 	@see 								dol_print_date(), dol_stringtotime(), dol_mktime()
 */
function dol_getdate($timestamp, $fast = \false)
{
}
/**
 *	Return a timestamp date built from detailed informations (by default a local PHP server timestamp)
 * 	Replace function mktime not available under Windows if year < 1970
 *	PHP mktime is restricted to the years 1901-2038 on Unix and 1970-2038 on Windows
 *
 * 	@param	int			$hour			Hour	(can be -1 for undefined)
 *	@param	int			$minute			Minute	(can be -1 for undefined)
 *	@param	int			$second			Second	(can be -1 for undefined)
 *	@param	int			$month			Month (1 to 12)
 *	@param	int			$day			Day (1 to 31)
 *	@param	int			$year			Year
 *	@param	mixed		$gm				True or 1 or 'gmt'=Input informations are GMT values
 *										False or 0 or 'server' = local to server TZ
 *										'user' = local to user TZ
 *										'tz,TimeZone' = use specified timezone
 *	@param	int			$check			0=No check on parameters (Can use day 32, etc...)
 *	@return	int|string					Date as a timestamp, '' or false if error
 * 	@see 								dol_print_date(), dol_stringtotime(), dol_getdate()
 */
function dol_mktime($hour, $minute, $second, $month, $day, $year, $gm = \false, $check = 1)
{
}
/**
 *  Return date for now. In most cases, we use this function without parameters (that means GMT time).
 *
 *  @param	string		$mode	'gmt' => we return GMT timestamp,
 * 								'tzserver' => we add the PHP server timezone
 *  							'tzref' => we add the company timezone
 * 								'tzuser' => we add the user timezone
 *	@return int   $date	Timestamp
 */
function dol_now($mode = 'gmt')
{
}
/**
 * Return string with formated size
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
 * @return	string					HTML Link
 */
function dol_print_url($url, $target = '_blank', $max = 32, $withpicto = 0)
{
}
/**
 * Show EMail link
 *
 * @param	string		$email			EMail to show (only email, without 'Name of recipient' before)
 * @param 	int			$cid 			Id of contact if known
 * @param 	int			$socid 			Id of third party if known
 * @param 	int			$addlink		0=no link, 1=email has a html email link (+ link to create action if constant AGENDA_ADDACTIONFOREMAIL is on)
 * @param	int			$max			Max number of characters to show
 * @param	int			$showinvalid	1=Show warning if syntax email is wrong
 * @param	int			$withpicto		Show picto
 * @return	string						HTML Link
 */
function dol_print_email($email, $cid = 0, $socid = 0, $addlink = 0, $max = 64, $showinvalid = 1, $withpicto = 0)
{
}
/**
 * Get array of social network dictionary
 *
 * @return  array       Array of Social Networks Dictionary
 */
function getArrayOfSocialNetworks()
{
}
/**
 * Show social network link
 *
 * @param	string		$value			Skype to show (only skype, without 'Name of recipient' before)
 * @param	int 		$cid 			Id of contact if known
 * @param	int 		$socid 			Id of third party if known
 * @param	string 		$type			'skype','facebook',...
 * @return	string						HTML Link
 */
function dol_print_socialnetworks($value, $cid, $socid, $type)
{
}
/**
 * 	Format phone numbers according to country
 *
 * 	@param  string  $phone          Phone number to format
 * 	@param  string  $countrycode    Country code to use for formatting
 * 	@param 	int		$cid 		    Id of contact if known
 * 	@param 	int		$socid          Id of third party if known
 * 	@param 	string	$addlink	    ''=no link to create action, 'AC_TEL'=add link to clicktodial (if module enabled) and add link to create event (if conf->global->AGENDA_ADDACTIONFORPHONE set)
 * 	@param 	string	$separ 		    Separation between numbers for a better visibility example : xx.xx.xx.xx.xx
 *  @param	string  $withpicto      Show picto
 *  @param	string	$titlealt	    Text to show on alt
 *  @param  int     $adddivfloat    Add div float around phone.
 * 	@return string 				    Formated phone number
 */
function dol_print_phone($phone, $countrycode = '', $cid = 0, $socid = 0, $addlink = '', $separ = "&nbsp;", $withpicto = '', $titlealt = '', $adddivfloat = 0)
{
}
/**
 * 	Return an IP formated to be shown on screen
 *
 * 	@param	string	$ip			IP
 * 	@param	int		$mode		0=return IP + country/flag, 1=return only country/flag, 2=return only IP
 * 	@return string 				Formated IP, with country if GeoIP module is enabled
 */
function dol_print_ip($ip, $mode = 0)
{
}
/**
 * Return the IP of remote user.
 * Take HTTP_X_FORWARDED_FOR (defined when using proxy)
 * Then HTTP_CLIENT_IP if defined (rare)
 * Then REMOTE_ADDR (no way to be modified by user but may be wrong if user is using a proxy)
 *
 * @return	string		Ip of remote user.
 */
function getUserRemoteIP()
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
 *  @param	string	$address    Address
 *  @param  int		$htmlid     Html ID (for example 'gmap')
 *  @param  int		$mode       thirdparty|contact|member|other
 *  @param  int		$id         Id of object
 *  @param	int		$noprint	No output. Result is the function return
 *  @param  string  $charfornl  Char to use instead of nl2br. '' means we use a standad nl2br.
 *  @return string|void			Nothing if noprint is 0, formatted address if noprint is 1
 *  @see dol_format_address()
 */
function dol_print_address($address, $htmlid, $mode, $id, $noprint = 0, $charfornl = '')
{
}
/**
 *	Return true if email syntax is ok
 *
 *	@param	    string		$address    			email (Ex: "toto@examle.com", "John Do <johndo@example.com>")
 *  @param		int			$acceptsupervisorkey	If 1, the special string '__SUPERVISOREMAIL__' is also accepted as valid
 *	@return     boolean     						true if email syntax is OK, false if KO or empty string
 */
function isValidEmail($address, $acceptsupervisorkey = 0)
{
}
/**
 *	Return if the domain name has a valid MX record.
 *  WARNING: This need function idn_to_ascii, checkdnsrr and getmxrr
 *
 *	@param	    string		$domain	    			Domain name (Ex: "yahoo.com", "yhaoo.com", "dolibarr.fr")
 *	@return     int     							-1 if error (function not available), 0=Not valid, 1=Valid
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
 * @param	string	$string				String to scan
 * @param	string	$start				Start position
 * @param	int		$length				Length (in nb of characters or nb of bytes depending on trunconbytes param)
 * @param   string	$stringencoding		Page code used for input string encoding
 * @param	int		$trunconbytes		1=Length is max of bytes instead of max of characters
 * @return  string						substring
 */
function dol_substr($string, $start, $length, $stringencoding = '', $trunconbytes = 0)
{
}
/**
 *	Truncate a string to a particular length adding '...' if string larger than length.
 * 	If length = max length+1, we do no truncate to avoid having just 1 char replaced with '...'.
 *  MAIN_DISABLE_TRUNC=1 can disable all truncings
 *
 *	@param	string	$string				String to truncate
 *	@param  int		$size				Max string size visible (excluding ...). 0 for no limit. WARNING: Final string size can have 3 more chars (if we added ..., or if size was max+1 or max+2 or max+3 so it does not worse to replace with ...)
 *	@param	string	$trunc				Where to trunc: right, left, middle (size must be a 2 power), wrap
 * 	@param	string	$stringencoding		Tell what is source string encoding
 *  @param	int		$nodot				Truncation do not add ... after truncation. So it's an exact truncation.
 *  @param  int     $display            Trunc is used to display data and can be changed for small screen. TODO Remove this param (must be dealt with CSS)
 *	@return string						Truncated string. WARNING: length is never higher than $size if $nodot is set, but can be 3 chars higher otherwise.
 */
function dol_trunc($string, $size = 40, $trunc = 'right', $stringencoding = 'UTF-8', $nodot = 0, $display = 0)
{
}
/**
 *	Show picto whatever it's its name (generic function)
 *
 *	@param      string		$titlealt         		Text on title tag for tooltip. Not used if param notitle is set to 1.
 *	@param      string		$picto       			Name of image file to show ('filenew', ...)
 *													If no extension provided, we use '.png'. Image must be stored into theme/xxx/img directory.
 *                                  				Example: picto.png                  if picto.png is stored into htdocs/theme/mytheme/img
 *                                  				Example: picto.png@mymodule         if picto.png is stored into htdocs/mymodule/img
 *                                  				Example: /mydir/mysubdir/picto.png  if picto.png is stored into htdocs/mydir/mysubdir (pictoisfullpath must be set to 1)
 *	@param		string		$moreatt				Add more attribute on img tag (For example 'style="float: right"')
 *	@param		boolean|int	$pictoisfullpath		If true or 1, image path is a full path
 *	@param		int			$srconly				Return only content of the src attribute of img.
 *  @param		int			$notitle				1=Disable tag title. Use it if you add js tooltip, to avoid duplicate tooltip.
 *  @param		string		$alt					Force alt for bind people
 *  @param		string		$morecss				Add more class css on img tag (For example 'myclascss'). Work only if $moreatt is empty.
 *  @param		string		$marginleftonlyshort	1 = Add a short left margin on picto, 2 = Add a larger left margin on picto, 0 = No margin left. Works for fontawesome picto only.
 *  @return     string       				    	Return img tag
 *  @see        img_object(), img_picto_common()
 */
function img_picto($titlealt, $picto, $moreatt = '', $pictoisfullpath = \false, $srconly = 0, $notitle = 0, $alt = '', $morecss = '', $marginleftonlyshort = 2)
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
 *	@see	#img_picto, #img_picto_common
 */
function img_object($titlealt, $picto, $moreatt = '', $pictoisfullpath = \false, $srconly = 0, $notitle = 0)
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
 *  @see        #img_object, #img_picto
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
 *	@return     string      					Return img tag
 *  @see        #img_object, #img_picto
 */
function img_picto_common($titlealt, $picto, $moreatt = '', $pictoisfullpath = 0)
{
}
/**
 *	Show logo action
 *
 *	@param	string		$titlealt       Text on alt and title of image. Alt only if param notitle is set to 1. If text is "TextA:TextB", use Text A on alt and Text B on title.
 *	@param  string		$numaction   	Action id or code to show
 *	@return string      				Return an img tag
 */
function img_action($titlealt, $numaction)
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
 *	Show logo editer/modifier fiche
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
function img_view($titlealt = 'default', $float = 0, $other = '')
{
}
/**
 *  Show delete logo
 *
 *  @param	string	$titlealt   Text on alt and title of image. Alt only if param notitle is set to 1. If text is "TextA:TextB", use Text A on alt and Text B on title.
 *	@param  string	$other      Add more attributes on img
 *  @return string      		Retourne tag img
 */
function img_delete($titlealt = 'default', $other = 'class="pictodelete"')
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
 *	@param	string	$brand		Brand name of credit card
 *	@return string     			Return img tag
 */
function img_credit_card($brand)
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
 *	Show information for admin users or standard users
 *
 *	@param	string	$text			Text info
 *	@param  integer	$infoonimgalt	Info is shown only on alt of star picto, otherwise it is show on output after the star picto
 *	@param	int		$nodiv			No div
 *  @param  string  $admin          '1'=Info for admin users. '0'=Info for standard users (change only the look), 'error','xxx'=Other
 *  @param	string	$morecss		More CSS ('', 'warning', 'error')
 *	@return	string					String with info text
 */
function info_admin($text, $infoonimgalt = 0, $nodiv = 0, $admin = '1', $morecss = '')
{
}
/**
 *  Displays error message system with all the information to facilitate the diagnosis and the escalation of the bugs.
 *  This function must be called when a blocking technical error is encountered.
 *  However, one must try to call it only within php pages, classes must return their error through their property "error".
 *
 *	@param	 	DoliDB	$db      	Database handler
 *	@param  	mixed	$error		String or array of errors strings to show
 *  @param		array	$errors		Array of errors
 *	@return 	void
 *  @see    	dol_htmloutput_errors()
 */
function dol_print_error($db = '', $error = '', $errors = \null)
{
}
/**
 * Show a public email and error code to contact if technical error
 *
 * @param	string	$prefixcode		Prefix of public error code
 * @param   string  $errormessage   Complete error message
 * @param	array	$errormessages	Array of error messages
 * @param	string	$morecss		More css
 * @param	string	$email			Email
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
 *	@param	string	$begin       ("" by defaut)
 *	@param	string	$moreparam   Add more parameters on sort url links ("" by default)
 *	@param  string	$moreattrib  Options of attribute td ("" by defaut, example: 'align="center"')
 *	@param  string	$sortfield   Current field used to sort
 *	@param  string	$sortorder   Current sort order
 *  @param	string	$prefix		 Prefix for css. Use space after prefix to add your own CSS tag.
 *  @param	string	$tooltip	 Tooltip
 *	@return	void
 */
function print_liste_field_titre($name, $file = "", $field = "", $begin = "", $moreparam = "", $moreattrib = "", $sortfield = "", $sortorder = "", $prefix = "", $tooltip = "")
{
}
/**
 *	Get title line of an array
 *
 *	@param	string	$name        		Translation key of field
 *	@param	int		$thead		 		0=To use with standard table format, 1=To use inside <thead><tr>, 2=To use with <div>
 *	@param	string	$file        		Url used when we click on sort picto
 *	@param	string	$field       		Field to use for new sorting. Empty if this field is not sortable. Example "t.abc" or "t.abc,t.def"
 *	@param	string	$begin       		("" by defaut)
 *	@param	string	$moreparam   		Add more parameters on sort url links ("" by default)
 *	@param  string	$moreattrib  		Add more attributes on th ("" by defaut, example: 'align="center"'). To add more css class, use param $prefix.
 *	@param  string	$sortfield   		Current field used to sort (Ex: 'd.datep,d.id')
 *	@param  string	$sortorder   		Current sort order (Ex: 'asc,desc')
 *  @param	string	$prefix		 		Prefix for css. Use space after prefix to add your own CSS tag, for example 'mycss '.
 *  @param	string	$disablesortlink	1=Disable sort link
 *  @param	string	$tooltip	 		Tooltip
 *	@return	string
 */
function getTitleFieldOfList($name, $thead = 0, $file = "", $field = "", $begin = "", $moreparam = "", $moreattrib = "", $sortfield = "", $sortorder = "", $prefix = "", $disablesortlink = 0, $tooltip = '')
{
}
/**
 *	Show a title.
 *
 *	@param	string	$title			Title to show
 *	@return	string					Title to show
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
 * 	@param	int		$id					To force an id on html objects
 * 	@return	void
 *  @deprecated Use print load_fiche_titre instead
 */
function print_fiche_titre($title, $mesg = '', $picto = 'generic', $pictoisfullpath = 0, $id = '')
{
}
/**
 *	Load a title with picto
 *
 *	@param	string	$titre				Title to show
 *	@param	string	$morehtmlright		Added message to show on right
 *	@param	string	$picto				Icon to use before title (should be a 32x32 transparent png file)
 *	@param	int		$pictoisfullpath	1=Icon name is a full absolute url of image
 * 	@param	string	$id					To force an id on html objects
 *  @param  string  $morecssontable     More css on table
 *	@param	string	$morehtmlcenter		Added message to show on center
 * 	@return	string
 *  @see print_barre_liste()
 */
function load_fiche_titre($titre, $morehtmlright = '', $picto = 'generic', $pictoisfullpath = 0, $id = '', $morecssontable = '', $morehtmlcenter = '')
{
}
/**
 *	Print a title with navigation controls for pagination
 *
 *	@param	string	    $titre				Title to show (required)
 *	@param	int   	    $page				Numero of page to show in navigation links (required)
 *	@param	string	    $file				Url of page (required)
 *	@param	string	    $options         	More parameters for links ('' by default, does not include sortfield neither sortorder). Value must be 'urlencoded' before calling function.
 *	@param	string    	$sortfield       	Field to sort on ('' by default)
 *	@param	string	    $sortorder       	Order to sort ('' by default)
 *	@param	string	    $morehtmlcenter     String in the middle ('' by default). We often find here string $massaction comming from $form->selectMassAction()
 *	@param	int		    $num				Number of records found by select with limit+1
 *	@param	int|string  $totalnboflines		Total number of records/lines for all pages (if known). Use a negative value of number to not show number. Use '' if unknown.
 *	@param	string	    $picto				Icon to use before title (should be a 32x32 transparent png file)
 *	@param	int		    $pictoisfullpath	1=Icon name is a full absolute url of image
 *  @param	string	    $morehtmlright			More html to show
 *  @param  string      $morecss            More css to the table
 *  @param  int         $limit              Max number of lines (-1 = use default, 0 = no limit, > 0 = limit).
 *  @param  int         $hideselectlimit    Force to hide select limit
 *  @param  int         $hidenavigation     Force to hide all navigation tools
 *	@return	void
 */
function print_barre_liste($titre, $page, $file, $options = '', $sortfield = '', $sortorder = '', $morehtmlcenter = '', $num = -1, $totalnboflines = '', $picto = 'generic', $pictoisfullpath = 0, $morehtmlright = '', $morecss = '', $limit = -1, $hideselectlimit = 0, $hidenavigation = 0)
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
 *  @param  int             $hideselectlimit    Force to hide select limit
 *	@return	void
 */
function print_fleche_navigation($page, $file, $options = '', $nextpage = 0, $betweenarrows = '', $afterarrows = '', $limit = -1, $totalnboflines = 0, $hideselectlimit = 0)
{
}
/**
 *	Return a string with VAT rate label formated for view output
 *	Used into pdf and HTML pages
 *
 *	@param	string	$rate			Rate value to format ('19.6', '19,6', '19.6%', '19,6%', '19.6 (CODEX)', ...)
 *  @param	boolean	$addpercent		Add a percent % sign in output
 *	@param	int		$info_bits		Miscellaneous information on vat (0=Default, 1=French NPR vat)
 *	@param	int		$usestarfornpr	-1=Never show, 0 or 1=Use '*' for NPR vat rates
 *  @return	string					String with formated amounts ('19,6' or '19,6%' or '8.5% (NPR)' or '8.5% *' or '19,6 (CODEX)')
 */
function vatrate($rate, $addpercent = \false, $info_bits = 0, $usestarfornpr = 0)
{
}
/**
 *		Function to format a value into an amount for visual output
 *		Function used into PDF and HTML pages
 *
 *		@param	float		$amount			Amount to format
 *		@param	integer		$form			Type of format, HTML or not (not by default)
 *		@param	Translate	$outlangs		Object langs for output
 *		@param	int			$trunc			1=Truncate if there is more decimals than MAIN_MAX_DECIMALS_SHOWN (default), 0=Does not truncate. Deprecated because amount are rounded (to unit or total amount accurancy) before beeing inserted into database or after a computation, so this parameter should be useless.
 *		@param	int			$rounding		Minimum number of decimal to show. If 0, no change, if -1, we use min($conf->global->MAIN_MAX_DECIMALS_UNIT,$conf->global->MAIN_MAX_DECIMALS_TOT)
 *		@param	int			$forcerounding	Force the number of decimal to forcerounding decimal (-1=do not force)
 *		@param	string		$currency_code	To add currency symbol (''=add nothing, 'auto'=Use default currency, 'XXX'=add currency symbols for XXX currency)
 *		@return	string						Chaine avec montant formate
 *
 *		@see	price2num()					Revert function of price
 */
function price($amount, $form = 0, $outlangs = '', $trunc = 1, $rounding = -1, $forcerounding = -1, $currency_code = '')
{
}
/**
 *	Function that return a number with universal decimal format (decimal separator is '.') from an amount typed by a user.
 *	Function to use on each input amount before any numeric test or database insert. A better name for this function
 *  should be text2num().
 *
 *	@param	float	$amount			Amount to convert/clean
 *	@param	string	$rounding		''=No rounding
 * 									'MU'=Round to Max unit price (MAIN_MAX_DECIMALS_UNIT)
 *									'MT'=Round to Max for totals with Tax (MAIN_MAX_DECIMALS_TOT)
 *									'MS'=Round to Max for stock quantity (MAIN_MAX_DECIMALS_STOCK)
 *									Numeric = Nb of digits for rounding
 * 	@param	int		$alreadysqlnb	Put 1 if you know that content is already universal format number
 *	@return	string					Amount with universal numeric format (Example: '99.99999').
 *									If conversion fails, it return text unchanged if $rounding = '' or '0' if $rounding is defined.
 *									If amount is null or '', it returns '' if $rounding = '' or '0' if $rounding is defined..
 *
 *	@see    price()					Opposite function of price2num
 */
function price2num($amount, $rounding = '', $alreadysqlnb = 0)
{
}
/**
 * Output a dimension with best unit
 *
 * @param   float       $dimension      Dimension
 * @param   int         $unit           Unit scale of dimension (Example: 0=kg, -3=g, -6=mg, 98=ounce, 99=pound, ...)
 * @param   string      $type           'weight', 'volume', ...
 * @param   Translate   $outputlangs    Translate language object
 * @param   int         $round          -1 = non rounding, x = number of decimal
 * @param   string      $forceunitoutput    'no' or numeric (-3, -6, ...) compared to $unit (In most case, this value is value defined into $conf->global->MAIN_WEIGHT_DEFAULT_UNIT)
 * @return  string                      String to show dimensions
 */
function showDimensionInBestUnit($dimension, $unit, $type, $outputlangs, $round = -1, $forceunitoutput = 'no')
{
}
/**
 *	Return localtax rate for a particular vat, when selling a product with vat $vatrate, from a $thirdparty_buyer to a $thirdparty_seller
 *  Note: This function applies same rules than get_default_tva
 *
 * 	@param	float		$vatrate		        Vat rate. Can be '8.5' or '8.5 (VATCODEX)' for example
 * 	@param  int			$local		         	Local tax to search and return (1 or 2 return only tax rate 1 or tax rate 2)
 *  @param  Societe		$thirdparty_buyer    	Object of buying third party
 *  @param	Societe		$thirdparty_seller		Object of selling third party ($mysoc if not defined)
 *  @param	int			$vatnpr					If vat rate is NPR or not
 * 	@return	mixed			   					0 if not found, localtax rate if found
 *  @see get_default_tva()
 */
function get_localtax($vatrate, $local, $thirdparty_buyer = "", $thirdparty_seller = "", $vatnpr = 0)
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
 * @param	int		$local 	LocalTax to get
 * @return	number			Values of localtax
 */
function get_localtax_by_third($local)
{
}
/**
 *  Get vat main information from Id.
 *  You can call getLocalTaxesFromRate after to get other fields.
 *
 *  @param	int|string  $vatrate		    VAT ID or Rate. Value can be value or the string with code into parenthesis or rowid if $firstparamisid is 1. Example: '8.5' or '8.5 (8.5NPR)' or 123.
 *  @param	Societe	    $buyer         		Company object
 *  @param	Societe	    $seller        		Company object
 *  @param  int         $firstparamisid     1 if first param is id into table (use this if you can)
 *  @return	array       	  				array('rowid'=> , 'code'=> ...)
 *  @see getLocalTaxesFromRate()
 */
function getTaxesFromId($vatrate, $buyer = \null, $seller = \null, $firstparamisid = 1)
{
}
/**
 *  Get type and rate of localtaxes for a particular vat rate/country of a thirdparty.
 *  This does not take into account the seller setup if subject to vat or not, only country.
 *  TODO
 *  This function is ALSO called to retrieve type for building PDF. Such call of function must be removed.
 *  Instead this function must be called when adding a line to get the array of localtax and type, and then
 *  provide it to the function calcul_price_total.
 *
 *  @param	int|string  $vatrate			VAT ID or Rate+Code. Value can be value or the string with code into parenthesis or rowid if $firstparamisid is 1. Example: '8.5' or '8.5 (8.5NPR)' or 123.
 *  @param	int		    $local              Number of localtax (1 or 2, or 0 to return 1 & 2)
 *  @param	Societe	    $buyer         		Company object
 *  @param	Societe	    $seller        		Company object
 *  @param  int         $firstparamisid     1 if first param is ID into table instead of Rate+code (use this if you can)
 *  @return	array    	    				array(localtax_type1(1-6/0 if not found), rate localtax1, localtax_type2, rate localtax2, accountancycodecust, accountancycodesupp)
 *  @see getTaxesFromId()
 */
function getLocalTaxesFromRate($vatrate, $local, $buyer, $seller, $firstparamisid = 0)
{
}
/**
 *	Return vat rate of a product in a particular selling country or default country vat if product is unknown
 *  Function called by get_default_tva
 *
 *  @param	int			$idprod          	Id of product or 0 if not a predefined product
 *  @param  Societe		$thirdparty_seller  Thirdparty with a ->country_code defined (FR, US, IT, ...)
 *	@param	int			$idprodfournprice	Id product_fournisseur_price (for "supplier" proposal/order/invoice)
 *  @return float|string   				    Vat rate to use with format 5.0 or '5.0 (XXX)'
 *  @see get_product_localtax_for_country()
 */
function get_product_vat_for_country($idprod, $thirdparty_seller, $idprodfournprice = 0)
{
}
/**
 *	Return localtax vat rate of a product in a particular selling country or default country vat if product is unknown
 *
 *  @param	int		$idprod         		Id of product
 *  @param  int		$local          		1 for localtax1, 2 for localtax 2
 *  @param  Societe	$thirdparty_seller    	Thirdparty with a ->country_code defined (FR, US, IT, ...)
 *  @return int             				<0 if KO, Vat rate if OK
 *  @see get_product_vat_for_country()
 */
function get_product_localtax_for_country($idprod, $local, $thirdparty_seller)
{
}
/**
 *	Function that return vat rate of a product line (according to seller, buyer and product vat rate)
 *   Si vendeur non assujeti a TVA, TVA par defaut=0. Fin de regle.
 *	 Si le (pays vendeur = pays acheteur) alors TVA par defaut=TVA du produit vendu. Fin de regle.
 *	 Si (vendeur et acheteur dans Communaute europeenne) et (bien vendu = moyen de transports neuf comme auto, bateau, avion) alors TVA par defaut=0 (La TVA doit etre paye par acheteur au centre d'impots de son pays et non au vendeur). Fin de regle.
 *	 Si (vendeur et acheteur dans Communaute europeenne) et (acheteur = particulier ou entreprise sans num TVA intra) alors TVA par defaut=TVA du produit vendu. Fin de regle
 *	 Si (vendeur et acheteur dans Communaute europeenne) et (acheteur = entreprise avec num TVA) intra alors TVA par defaut=0. Fin de regle
 *	 Sinon TVA proposee par defaut=0. Fin de regle.
 *
 *	@param	Societe		$thirdparty_seller    	Objet societe vendeuse
 *	@param  Societe		$thirdparty_buyer   	Objet societe acheteuse
 *	@param  int			$idprod					Id product
 *	@param	int			$idprodfournprice		Id product_fournisseur_price (for supplier order/invoice)
 *	@return float|string   				      	Vat rate to use with format 5.0 or '5.0 (XXX)', -1 if we can't guess it
 *  @see get_default_npr(), get_default_localtax()
 */
function get_default_tva(\Societe $thirdparty_seller, \Societe $thirdparty_buyer, $idprod = 0, $idprodfournprice = 0)
{
}
/**
 *	Fonction qui renvoie si tva doit etre tva percue recuperable
 *
 *	@param	Societe		$thirdparty_seller    	Thirdparty seller
 *	@param  Societe		$thirdparty_buyer   	Thirdparty buyer
 *  @param  int			$idprod                 Id product
 *  @param	int			$idprodfournprice		Id supplier price for product
 *	@return float       			        	0 or 1
 *  @see get_default_tva(), get_default_localtax()
 */
function get_default_npr(\Societe $thirdparty_seller, \Societe $thirdparty_buyer, $idprod = 0, $idprodfournprice = 0)
{
}
/**
 *	Function that return localtax of a product line (according to seller, buyer and product vat rate)
 *   Si vendeur non assujeti a TVA, TVA par defaut=0. Fin de regle.
 *	 Si le (pays vendeur = pays acheteur) alors TVA par defaut=TVA du produit vendu. Fin de regle.
 *	 Sinon TVA proposee par defaut=0. Fin de regle.
 *
 *	@param	Societe		$thirdparty_seller    	Thirdparty seller
 *	@param  Societe		$thirdparty_buyer   	Thirdparty buyer
 *  @param	int			$local					Localtax to process (1 or 2)
 *	@param  int			$idprod					Id product
 *	@return integer        				       	localtax, -1 si ne peut etre determine
 *  @see get_default_tva(), get_default_npr()
 */
function get_default_localtax($thirdparty_seller, $thirdparty_buyer, $local, $idprod = 0)
{
}
/**
 *	Return yes or no in current language
 *
 *	@param	string|int	$yesno			Value to test (1, 'yes', 'true' or 0, 'no', 'false')
 *	@param	integer		$case			1=Yes/No, 0=yes/no, 2=Disabled checkbox, 3=Disabled checkbox + Yes/No
 *	@param	int			$color			0=texte only, 1=Text is formated with a color font style ('ok' or 'error'), 2=Text is formated with 'ok' color.
 *	@return	string						HTML string
 */
function yn($yesno, $case = 1, $color = 0)
{
}
/**
 *	Return a path to have a the directory according to object where files are stored.
 *  New usage:       $conf->module->multidir_output[$object->entity].'/'.get_exdir(0, 0, 0, 1, $object, $modulepart)
 *         or:       $conf->module->dir_output.'/'.get_exdir(0, 0, 0, 1, $object, $modulepart)     if multidir_output not defined.
 *  Example our with new usage:       $object is invoice -> 'INYYMM-ABCD'
 *  Example our with old usage:       '015' with level 3->"0/1/5/", '015' with level 1->"5/", 'ABC-1' with level 3 ->"0/0/1/"
 *
 *	@param	string	$num            Id of object (deprecated, $object will be used in future)
 *	@param  int		$level		    Level of subdirs to return (1, 2 or 3 levels). (deprecated, global option will be used in future)
 * 	@param	int		$alpha		    0=Keep number only to forge path, 1=Use alpha part afer the - (By default, use 0). (deprecated, global option will be used in future)
 *  @param  int		$withoutslash   0=With slash at end (except if '/', we return ''), 1=without slash at end
 *  @param	Object	$object			Object
 *  @param	string	$modulepart		Type of object ('invoice_supplier, 'donation', 'invoice', ...')
 *  @return	string					Dir to use ending. Example '' or '1/' or '1/2/'
 */
function get_exdir($num, $level, $alpha, $withoutslash, $object, $modulepart)
{
}
/**
 *	Creation of a directory (this can create recursive subdir)
 *
 *	@param	string		$dir		Directory to create (Separator must be '/'. Example: '/mydir/mysubdir')
 *	@param	string		$dataroot	Data root directory (To avoid having the data root in the loop. Using this will also lost the warning on first dir PHP has no permission when open_basedir is used)
 *  @param	string|null	$newmask	Mask for new file (Defaults to $conf->global->MAIN_UMASK or 0755 if unavailable). Example: '0444'
 *	@return int         			< 0 if KO, 0 = already exists, > 0 if OK
 */
function dol_mkdir($dir, $dataroot = '', $newmask = \null)
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
 *	@param	integer	$removelinefeed		1=Replace all new lines by 1 space, 0=Only ending new lines are removed others are replaced with \n, 2=Ending new lines are removed but others are kept with a same number of \n than nb of <br> when there is both "...<br>\n..."
 *  @param  string	$pagecodeto      	Encoding of input/output string
 *  @param	integer	$strip_tags			0=Use internal strip, 1=Use strip_tags() php function (bugged when text contains a < char that is not for a html tag)
 *	@return string	    				String cleaned
 *
 * 	@see	dol_escape_htmltag() strip_tags() dol_string_onlythesehtmltags() dol_string_neverthesehtmltags()
 */
function dol_string_nohtmltag($stringtoclean, $removelinefeed = 1, $pagecodeto = 'UTF-8', $strip_tags = 0)
{
}
/**
 *	Clean a string to keep only desirable HTML tags.
 *
 *	@param	string	$stringtoclean			String to clean
 *  @param	string	$cleanalsosomestyles	Clean also some tags
 *	@return string	    					String cleaned
 *
 * 	@see	dol_escape_htmltag() strip_tags() dol_string_nohtmltag() dol_string_neverthesehtmltags()
 */
function dol_string_onlythesehtmltags($stringtoclean, $cleanalsosomestyles = 1)
{
}
/**
 *	Clean a string from some undesirable HTML tags.
 *  Note. Not enough secured as dol_string_onlythesehtmltags().
 *
 *	@param	string	$stringtoclean			String to clean
 *  @param	array	$disallowed_tags		Array of tags not allowed
 *  @param	string	$cleanalsosomestyles	Clean also some tags
 *	@return string	    					String cleaned
 *
 * 	@see	dol_escape_htmltag() strip_tags() dol_string_nohtmltag() dol_string_onlythesehtmltags()
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
 * Replace CRLF in string with a HTML BR tag
 *
 * @param	string	$stringtoencode		String to encode
 * @param	int     $nl2brmode			0=Adding br before \n, 1=Replacing \n by br
 * @param   bool	$forxml             false=Use <br>, true=Use <br />
 * @return	string						String encoded
 * @see dol_nboflines(), dolGetFirstLineOfText()
 */
function dol_nl2br($stringtoencode, $nl2brmode = 0, $forxml = \false)
{
}
/**
 *	This function is called to encode a string into a HTML string but differs from htmlentities because
 * 	a detection is done before to see if text is already HTML or not. Also, all entities but &,<,>," are converted.
 *  This permits to encode special chars to entities with no double encoding for already encoded HTML strings.
 * 	This function also remove last EOL or BR if $removelasteolbr=1 (default).
 *  For PDF usage, you can show text by 2 ways:
 *              - writeHTMLCell -> param must be encoded into HTML.
 *              - MultiCell -> param must not be encoded into HTML.
 *              Because writeHTMLCell convert also \n into <br>, if function
 *              is used to build PDF, nl2brmode must be 1.
 *
 *	@param	string	$stringtoencode		String to encode
 *	@param	int		$nl2brmode			0=Adding br before \n, 1=Replacing \n by br (for use with FPDF writeHTMLCell function for example)
 *  @param  string	$pagecodefrom       Pagecode stringtoencode is encoded
 *  @param	int		$removelasteolbr	1=Remove last br or lasts \n (default), 0=Do nothing
 *  @return	string						String encoded
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
 * @param   string	$b					Operand b (ENT_QUOTES=convert simple and double quotes)
 * @param   string	$c					Operand c
 * @param	string	$keepsomeentities	Entities but &amp;, <, >, " are not converted.
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
 */
function dol_htmlentities($string, $flags = \null, $encoding = 'UTF-8', $double_encode = \false)
{
}
/**
 *	Check if a string is a correct iso string
 *	If not, it will we considered not HTML encoded even if it is by FPDF.
 *	Example, if string contains euro symbol that has ascii code 128
 *
 *	@param	string		$s      	String to check
 *  @param	string		$clean		Clean if it is not an ISO. Warning, if file is utf8, you will get a bad formated file.
 *	@return	int|string  	   		0 if bad iso, 1 if good iso, Or the clean string if $clean is 1
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
 *	Return nb of lines of a formated text with \n and <br> (WARNING: string must not have mixed \n and br separators)
 *
 *	@param	string	$text      		Text
 *	@param	int		$maxlinesize  	Largeur de ligne en caracteres (ou 0 si pas de limite - defaut)
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
 *  @param  bool    $forxml         false=Use <br>instead of \n if html content detected, true=Use <br /> instead of \n if html content detected
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
 * @param	Translate	$outputlangs	Output language
 * @param   int         $onlykey        1=Do not calculate some heavy values of keys (performance enhancement when we need only the keys), 2=Values are trunc and html sanitized (to use for help tooltip)
 * @param   array       $exclude        Array of family keys we want to exclude. For example array('system', 'mycompany', 'object', 'objectamount', 'date', 'user', ...)
 * @param   Object      $object         Object for keys on object
 * @return	array						Array of substitutions
 * @see setSubstitFromObject()
 */
function getCommonSubstitutionArray($outputlangs, $onlykey = 0, $exclude = \null, $object = \null)
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
 *  @param	string		$text	      			Source string in which we must do substitution
 *  @param  array		$substitutionarray		Array with key->val to substitute. Example: array('__MYKEY__' => 'MyVal', ...)
 *  @param	Translate	$outputlangs			Output language
 * 	@return string  		    				Output string after substitutions
 *  @see	complete_substitutions_array(), getCommonSubstitutionArray()
 */
function make_substitutions($text, $substitutionarray, $outputlangs = \null)
{
}
/**
 *  Complete the $substitutionarray with more entries coming from external module that had set the "substitutions=1" into module_part array.
 *  In this case, method completesubstitutionarray provided by module is called.
 *
 *  @param  array		$substitutionarray		Array substitution old value => new value value
 *  @param  Translate	$outputlangs            Output language
 *  @param  Object		$object                 Source object
 *  @param  mixed		$parameters       		Add more parameters (useful to pass product lines)
 *  @param  string      $callfunc               What is the name of the custom function that will be called? (default: completesubstitutionarray)
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
function print_date_range($date_start, $date_end, $format = '', $outputlangs = '')
{
}
/**
 *    Format output for start and end date
 *
 *    @param	int			$date_start    		Start date
 *    @param    int			$date_end      		End date
 *    @param    string		$format        		Output format
 *    @param	Translate	$outputlangs   		Output language
 *    @param	integer		$withparenthesis	1=Add parenthesis, 0=non parenthesis
 *    @return	string							String
 */
function get_date_range($date_start, $date_end, $format = '', $outputlangs = '', $withparenthesis = 1)
{
}
/**
 * Return firstname and lastname in correct order
 *
 * @param	string	$firstname		Firstname
 * @param	string	$lastname		Lastname
 * @param	int		$nameorder		-1=Auto, 0=Lastname+Firstname, 1=Firstname+Lastname, 2=Firstname, 3=Firstname if defined else lastname
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
 *	@param	mixed	$mesgs			Message string or array
 *  @param  string	$style      	Which style to use ('mesgs' by default, 'warnings', 'errors')
 *  @return	void
 *  @see	dol_htmloutput_events()
 */
function setEventMessage($mesgs, $style = 'mesgs')
{
}
/**
 *	Set event messages in dol_events session object. Will be output by calling dol_htmloutput_events.
 *  Note: Calling dol_htmloutput_events is done into pages by standard llxFooter() function.
 *
 *	@param	string	$mesg			Message string
 *	@param	array	$mesgs			Message array
 *  @param  string	$style      	Which style to use ('mesgs' by default, 'warnings', 'errors')
 *  @param	string	$messagekey		A key to be used to allow the feature "Never show this message again"
 *  @return	void
 *  @see	dol_htmloutput_events()
 */
function setEventMessages($mesg, $mesgs, $style = 'mesgs', $messagekey = '')
{
}
/**
 *	Print formated messages to output (Used to show messages on html output).
 *  Note: Calling dol_htmloutput_events is done into pages by standard llxFooter() function, so there is
 *  no need to call it explicitely.
 *
 *  @param	int		$disabledoutputofmessages	Clear all messages stored into session without diplaying them
 *  @return	void
 *  @see    									dol_htmloutput_mesg()
 */
function dol_htmloutput_events($disabledoutputofmessages = 0)
{
}
/**
 *	Get formated messages to output (Used to show messages on html output).
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
function get_htmloutput_mesg($mesgstring = '', $mesgarray = '', $style = 'ok', $keepembedded = 0)
{
}
/**
 *  Get formated error messages to output (Used to show messages on html output).
 *
 *  @param  string	$mesgstring         Error message
 *  @param  array	$mesgarray          Error messages array
 *  @param  int		$keepembedded       Set to 1 in error message must be kept embedded into its html place (this disable jnotify)
 *  @return string                		Return html output
 *
 *  @see    dol_print_error()
 *  @see    dol_htmloutput_mesg()
 */
function get_htmloutput_errors($mesgstring = '', $mesgarray = array(), $keepembedded = 0)
{
}
/**
 *	Print formated messages to output (Used to show messages on html output).
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
 *  Print formated error messages to output (Used to show messages on html output).
 *
 *  @param	string	$mesgstring          Error message
 *  @param  array	$mesgarray           Error messages array
 *  @param  int		$keepembedded        Set to 1 in error message must be kept embedded into its html place (this disable jnotify)
 *  @return	void
 *
 *  @see    dol_print_error()
 *  @see    dol_htmloutput_mesg()
 */
function dol_htmloutput_errors($mesgstring = '', $mesgarray = array(), $keepembedded = 0)
{
}
/**
 * 	Advanced sort array by second index function, which produces ascending (default)
 *  or descending output and uses optionally natural case insensitive sorting (which
 *  can be optionally case sensitive as well).
 *
 *  @param      array		$array      		Array to sort (array of array('key1'=>val1,'key2'=>val2,'key3'...) or array of objects)
 *  @param      string		$index				Key in array to use for sorting criteria
 *  @param      int			$order				Sort order ('asc' or 'desc')
 *  @param      int			$natsort			1=use "natural" sort (natsort), 0=use "standard" sort (asort)
 *  @param      int			$case_sensitive		1=sort is case sensitive, 0=not case sensitive
 *  @param		int			$keepindex			If 0 and index key of array to sort is a numeric, than index will be rewrote. If 1 or index key is not numeric, key for index is kept after sorting.
 *  @return     array							Sorted array
 */
function dol_sort_array(&$array, $index, $order = 'asc', $natsort = 0, $case_sensitive = 0, $keepindex = 0)
{
}
/**
 *      Check if a string is in UTF8
 *
 *      @param	string	$str        String to check
 * 		@return	boolean				True if string is UTF8 or ISO compatible with UTF8, False if not (ISO with special char or Binary)
 */
function utf8_check($str)
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
 *      Store also Code-Id into a cache to speed up next request on same key.
 *
 * 		@param	DoliDB	$db				Database handler
 * 		@param	string	$key			Code or Id to get Id or Code
 * 		@param	string	$tablename		Table name without prefix
 * 		@param	string	$fieldkey		Field to search the key into
 * 		@param	string	$fieldid		Field to get
 *      @param  int		$entityfilter	Filter by entity
 *      @return int						<0 if KO, Id of code if OK
 *      @see $langs->getLabelFromKey
 */
function dol_getIdFromCode($db, $key, $tablename, $fieldkey = 'code', $fieldid = 'id', $entityfilter = 0)
{
}
/**
 * Verify if condition in string is ok or not
 *
 * @param 	string		$strRights		String with condition to check
 * @return 	boolean						True or False. Return True if strRights is ''
 */
function verifCond($strRights)
{
}
/**
 * Replace eval function to add more security.
 * This function is called by verifCond() or trans() and transnoentitiesnoconv().
 *
 * @param 	string	$s				String to evaluate
 * @param	int		$returnvalue	0=No return (used to execute eval($a=something)). 1=Value of eval is returned (used to eval($something)).
 * @param   int     $hideerrors     1=Hide errors
 * @return	mixed					Nothing or return of eval
 */
function dol_eval($s, $returnvalue = 0, $hideerrors = 1)
{
}
/**
 * Return if var element is ok
 *
 * @param   string      $element    Variable to check
 * @return  boolean                 Return true of variable is not empty
 */
function dol_validElement($element)
{
}
/**
 * 	Return img flag of country for a language code or country code
 *
 * 	@param	string	$codelang	Language code (en_IN, fr_CA...) or Country code (IN, FR)
 *  @param	string	$moreatt	Add more attribute on img tag (For example 'style="float: right"')
 * 	@return	string				HTML img string with flag.
 */
function picto_from_langcode($codelang, $moreatt = '')
{
}
/**
 * Return default language from country code.
 * Return null if not found.
 *
 * @param 	string 	$countrycode	Country code like 'US', 'FR', 'CA', ...
 * @return	string					Value of locale like 'en_US', 'fr_FR', ...
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
 *  @param  object|null		$object         Object object
 *  @param  array			$head          	Object head
 *  @param  int				$h				New position to fill
 *  @param  string			$type           Value for object where objectvalue can be
 *                              			'thirdparty'       to add a tab in third party view
 *		                        	      	'intervention'     to add a tab in intervention view
 *     		                    	     	'supplier_order'   to add a tab in supplier order view
 *          		            	        'supplier_invoice' to add a tab in supplier invoice view
 *                  		    	        'invoice'          to add a tab in customer invoice view
 *                          			    'order'            to add a tab in customer order view
 *                          				'contract'		   to add a tabl in contract view
 *                      			        'product'          to add a tab in product view
 *                              			'propal'           to add a tab in propal view
 *                              			'user'             to add a tab in user view
 *                              			'group'            to add a tab in group view
 * 		        	               	     	'member'           to add a tab in fundation member view
 *      		                        	'categories_x'	   to add a tab in category view ('x': type of category (0=product, 1=supplier, 2=customer, 3=member)
 *      									'ecm'			   to add a tab for another ecm view
 *                                          'stock'            to add a tab for warehouse view
 *  @param  string		$mode  	        	'add' to complete head, 'remove' to remove entries
 *	@return	void
 */
function complete_head_from_modules($conf, $langs, $object, &$head, &$h, $type, $mode = 'add')
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
 * For example: "A=1;B=2;C=2" is exploded into array('A'=>1,'B'=>2,'C'=>3)
 *
 * @param 	string	$string		String to explode
 * @param 	string	$delimiter	Delimiter between each couple of data
 * @param 	string	$kv			Delimiter between key and value
 * @return	array				Array of data exploded
 */
function dolExplodeIntoArray($string, $delimiter = ';', $kv = '=')
{
}
/**
 * Set focus onto field with selector (similar behaviour of 'autofocus' HTML5 tag)
 *
 * @param 	string	$selector	Selector ('#id' or 'input[name="ref"]') to use to find the HTML input field that must get the autofocus. You must use a CSS selector, so unique id preceding with the '#' char.
 * @return	string				HTML code to set focus
 */
function dol_set_focus($selector)
{
}
/**
 * Return getmypid() or random PID when function is disabled
 * Some web hosts disable this php function for security reasons
 * and sometimes we can't redeclare function
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
 *                             			If param $mode is 1, can contains an operator <, > or = like "<10" or ">=100.5 < 1000"
 *                             			If param $mode is 2, can contains a list of int id separated by comma like "1,3,4"
 *                             			If param $mode is 3, can contains a list of string separated by comma like "a,b,c"
 * @param	integer			$mode		0=value is list of keyword strings, 1=value is a numeric test (Example ">5.5 <10"), 2=value is a list of ID separated with comma (Example '1,3,4')
 * 										3=value is list of string separated with comma (Example 'text 1,text 2'), 4=value is a list of ID separated with comma (Example '1,3,4') for search into a multiselect string ('1,2')
 * @param	integer			$nofirstand	1=Do not output the first 'AND'
 * @return 	string 			$res 		The statement to append to the SQL query
 */
function natural_search($fields, $value, $mode = 0, $nofirstand = 0)
{
}
/**
 * Return string with full Url. The file qualified is the one defined by relative path in $object->last_main_doc
 *
 * @param   Object	$object				Object
 * @return	string						Url string
 */
function showDirectDownloadLink($object)
{
}
/**
 * Return the filename of file to get the thumbs
 *
 * @param   string  $file           Original filename (full or relative path)
 * @param   string  $extName        Extension to differenciate thumb file name ('', '_small', '_mini')
 * @param   string  $extImgTarget   Force image extension for thumbs. Use '' to keep same extension than original image (default).
 * @return  string                  New file name (full or relative path, including the thumbs/)
 */
function getImageFileNameForSize($file, $extName, $extImgTarget = '')
{
}
/**
 * Return URL we can use for advanced preview links
 *
 * @param   string    $modulepart     propal, facture, facture_fourn, ...
 * @param   string    $relativepath   Relative path of docs.
 * @param	int		  $alldata		  Return array with all components (1 is recommended, then use a simple a href link with the class, target and mime attribute added. 'documentpreview' css class is handled by jquery code into main.inc.php)
 * @param	string	  $param		  More param on http links
 * @return  string|array              Output string with href link or array with all components of link
 */
function getAdvancedPreviewUrl($modulepart, $relativepath, $alldata = 0, $param = '')
{
}
/**
 * Make content of an input box selected when we click into input field.
 *
 * @param string	$htmlname	Id of html object
 * @param string	$addlink	Add a 'link to' after
 * @return string
 */
function ajax_autoselect($htmlname, $addlink = '')
{
}
/**
 *	Return if a file is qualified for preview
 *
 *	@param	string	$file		Filename we looking for information
 *	@return int					1 If allowed, 0 otherwise
 *  @see    dol_mimetype(), image_format_supported() from images.lib.php
 */
function dolIsAllowedForPreview($file)
{
}
/**
 *	Return mime type of a file
 *
 *	@param	string	$file		Filename we looking for MIME type
 *  @param  string	$default    Default mime type if extension not found in known list
 * 	@param	int		$mode    	0=Return full mime, 1=otherwise short mime string, 2=image for mime type, 3=source language, 4=css of font fa
 *	@return string 		    	Return a mime type family (text/xxx, application/xxx, image/xxx, audio, video, archive)
 *  @see    dolIsAllowedForPreview(), image_format_supported() from images.lib.php
 */
function dol_mimetype($file, $default = 'application/octet-stream', $mode = 0)
{
}
/**
 * Return value from dictionary
 *
 * @param string	$tablename		name of dictionary
 * @param string	$field			the value to return
 * @param int		$id				id of line
 * @param bool		$checkentity	add filter on entity
 * @param string	$rowidfield		name of the column rowid
 * @return string
 */
function getDictvalue($tablename, $field, $id, $checkentity = \false, $rowidfield = 'rowid')
{
}
/**
 *	Return true if the color is light
 *
 *  @param	string	$stringcolor		String with hex (FFFFFF) or comma RGB ('255,255,255')
 *  @return	int							-1 : Error with argument passed |0 : color is dark | 1 : color is light
 */
function colorIsLight($stringcolor)
{
}
/**
 * Function to test if an entry is enabled or not
 *
 * @param	string		$type_user					0=We test for internal user, 1=We test for external user
 * @param	array		$menuentry					Array for feature entry to test
 * @param	array		$listofmodulesforexternal	Array with list of modules allowed to external users
 * @return	int										0=Hide, 1=Show, 2=Show gray
 */
function isVisibleToUserType($type_user, &$menuentry, &$listofmodulesforexternal)
{
}
/**
 * Round to next multiple.
 *
 * @param 	double		$n		Number to round up
 * @param 	integer		$x		Multiple. For example 60 to round up to nearest exact minute for a date with seconds.
 * @return 	integer				Value rounded.
 */
function roundUpToNextMultiple($n, $x = 5)
{
}
/**
 * Function dolGetBadge
 *
 * @param   string  $label      label of badge no html : use in alt attribute for accessibility
 * @param   string  $html       optional : label of badge with html
 * @param   string  $type       type of badge : Primary Secondary Success Danger Warning Info Light Dark status0 status1 status2 status3 status4 status5 status6 status7 status8 status9
 * @param   string  $mode       default '' , pill, dot
 * @param   string  $url        the url for link
 * @param   array   $params     various params for future : recommended rather than adding more fuction arguments. array('attr'=>array('title'=>'abc'))
 * @return  string              Html badge
 */
function dolGetBadge($label, $html = '', $type = 'primary', $mode = '', $url = '', $params = array())
{
}
/**
 * Function dolGetStatus
 *
 * @param   string  $statusLabel       Label of badge no html : use in alt attribute for accessibility
 * @param   string  $statusLabelShort  Short label of badge no html
 * @param   string  $html              Optional : label of badge with html
 * @param   string  $statusType        status0 status1 status2 status3 status4 status5 status6 status7 status8 status9 : image name or badge name
 * @param   int	    $displayMode       0=Long label, 1=Short label, 2=Picto + Short label, 3=Picto, 4=Picto + Long label, 5=Short label + Picto, 6=Long label + Picto
 * @param   string  $url               The url for link
 * @param   array   $params            Various params for future : recommended rather than adding more function arguments
 * @return  string                     Html status string
 */
function dolGetStatus($statusLabel = '', $statusLabelShort = '', $html = '', $statusType = 'status0', $displayMode = 0, $url = '', $params = array())
{
}
/**
 * Function dolGetButtonAction
 *
 * @param string    $label      label of button no html : use in alt attribute for accessibility $html is not empty
 * @param string    $html       optional : content with html
 * @param string    $actionType default, delete, danger
 * @param string    $url        the url for link
 * @param string    $id         attribute id of button
 * @param int       $userRight  user action right
 * @param array     $params     various params for future : recommended rather than adding more function arguments
 * @return string               html button
 */
function dolGetButtonAction($label, $html = '', $actionType = 'default', $url = '', $id = '', $userRight = 1, $params = array())
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
 * @param int       $status     0 no user rights, 1 active, -1 Feature Disabled, -2 disable Other reason use helpText as tooltip
 * @param array     $params     various params for future : recommended rather than adding more function arguments
 * @return string               html button
 */
function dolGetButtonTitle($label, $helpText = '', $iconClass = 'fa fa-file', $url = '', $id = '', $status = 1, $params = array())
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
 * @return  string
 */
function newToken()
{
}
/**
 * Return the value of token currently saved into session with name 'token'.
 *
 * @return  string
 */
function currentToken()
{
}