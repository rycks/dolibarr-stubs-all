<?php

\define('NOTOKENRENEWAL', 1);
\define("NOLOGIN", 1);
\define("NOCSRFCHECK", 1);
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define('NOIPCHECK', '1');
\define('NOBROWSERNOTIF', '1');
/**
 * Header empty
 *
 * Note: also called by functions.lib:recordNotFound
 *
 * @param 	string 			$head				Optional head lines
 * @param 	string 			$title				HTML title
 * @param	string			$help_url			Url links to help page
 * 		                            			Syntax is: For a wiki page: EN:EnglishPage|FR:FrenchPage|ES:SpanishPage|DE:GermanPage
 *                                  			For other external page: http://server/url
 * @param	string			$target				Target to use on links
 * @param 	int<0,1>    	$disablejs			More content into html header
 * @param 	int<0,1>    	$disablehead		More content into html header
 * @param 	string[]|string	$arrayofjs			Array of complementary js files
 * @param 	string[]|string	$arrayofcss			Array of complementary css files
 * @param	string			$morequerystring	Query string to add to the link "print" to get same parameters (use only if autodetect fails)
 * @param   string  		$morecssonbody      More CSS on body tag. For example 'classforhorizontalscrolloftabs'.
 * @param	string			$replacemainareaby	Replace call to main_area() by a print of this string
 * @param	int<0,1>		$disablenofollow	Disable the "nofollow" on meta robot header
 * @param	int<0,1>		$disablenoindex		Disable the "noindex" on meta robot header
 * @return	void
 */
function llxHeader($head = '', $title = '', $help_url = '', $target = '', $disablejs = 0, $disablehead = 0, $arrayofjs = '', $arrayofcss = '', $morequerystring = '', $morecssonbody = '', $replacemainareaby = '', $disablenofollow = 0, $disablenoindex = 0)
{
}
/**
 * Footer empty
 *
 * Note: also called by functions.lib:recordNotFound
 *
 * @param	string				$comment    				A text to add as HTML comment into HTML generated page
 * @param	'private'|'public'	$zone						'private' (for private pages) or 'public' (for public pages)
 * @param	int<0,1>			$disabledoutputofmessages	Clear all messages stored into session without displaying them
 * @return	void
 */
function llxFooter($comment = '', $zone = 'private', $disabledoutputofmessages = 0)
{
}
// Output page content
\define('USEDOLIBARRSERVER', 1);