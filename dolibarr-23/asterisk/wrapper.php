<?php

\define('NOREQUIRESOC', '1');
\define('NOREQUIRETRAN', '1');
\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
/**
 * Empty header
 *
 * Note: also called by functions.lib:recordNotFound
 *
 * @param 	string 			$head				Optional head lines
 * @param 	string 			$title				HTML title
 * @param	string			$help_url			Url links to help page
 * 		                            			Syntax is: For a wiki page: EN:EnglishPage|FR:FrenchPage|ES:SpanishPage|DE:GermanPage
 *                                  			For other external page: http://server/url
 * @param	string			$target				Target to use on links
 * @param 	int    			$disablejs			More content into html header
 * @param 	int    			$disablehead		More content into html header
 * @param 	string[]|string $arrayofjs			Array of complementary js files
 * @param 	string[]|string $arrayofcss			Array of complementary css files
 * @param	string			$morequerystring	Query string to add to the link "print" to get same parameters (use only if autodetect fails)
 * @param   string  		$morecssonbody      More CSS on body tag. For example 'classforhorizontalscrolloftabs'.
 * @param	string			$replacemainareaby	Replace call to main_area() by a print of this string
 * @param	int				$disablenofollow	Disable the "nofollow" on meta robot header
 * @param	int				$disablenoindex		Disable the "noindex" on meta robot header
 * @return	void
 */
function llxHeader($head = '', $title = '', $help_url = '', $target = '', $disablejs = 0, $disablehead = 0, $arrayofjs = '', $arrayofcss = '', $morequerystring = '', $morecssonbody = '', $replacemainareaby = '', $disablenofollow = 0, $disablenoindex = 0)
{
}
/**
 * Empty footer
 *
 * Note: also called by functions.lib:recordNotFound
 *
 * @param	string	$comment    				A text to add as HTML comment into HTML generated page
 * @param	string	$zone						'private' (for private pages) or 'public' (for public pages)
 * @param	int		$disabledoutputofmessages	Clear all messages stored into session without displaying them
 * @return	void
 */
function llxFooter($comment = '', $zone = 'private', $disabledoutputofmessages = 0)
{
}
$login = \GETPOST('login', 'alphanohtml');
$password = \GETPOST('password', 'password');
$caller = \GETPOST('caller', 'alphanohtml');
$called = \GETPOST('called', 'alphanohtml');
// Sanitize input data to avoid to use the wrapper to inject malicious paylod into asterisk
$login = \preg_replace('/[\\n\\r]/', '', $login);
$password = \preg_replace('/[\\n\\r]/', '', $password);
$caller = \preg_replace('/[\\n\\r]/', '', $caller);
$called = \preg_replace('/[\\n\\r]/', '', $called);
// IP address of Asterisk server
$strHost = \getDolGlobalString('ASTERISK_HOST', '127.0.0.1');
// Specify the type of extension through which your extension is connected.
// ex: SIP/, IAX2/, ZAP/, etc
$channel = \getDolGlobalString('ASTERISK_TYPE', 'SIP/');
// Outgoing call sign
$prefix = \getDolGlobalString('ASTERISK_INDICATIF', '0');
// Asterisk Port
$port = \getDolGlobalInt('ASTERISK_PORT', 5038);
// Context ( generalement from-internal )
$strContext = \getDolGlobalString('ASTERISK_CONTEXT', 'from-internal');
// Waiting time before hanging up
$strWaitTime = \getDolGlobalString('ASTERISK_WAIT_TIME', '30');
// Priority
$strPriority = \getDolGlobalString('ASTERISK_PRIORITY', '1');
// Number of call attempts
$strMaxRetry = \getDolGlobalString('ASTERISK_MAX_RETRY', "2");
$sql = "SELECT s.nom as name FROM " . \MAIN_DB_PREFIX . "societe as s";
$resql = $db->query($sql);
$obj = $db->fetch_object($resql);
$number = \strtolower($called);
$pos = \strpos($number, "local");