<?php

/* Copyright (C) 2011-2012 Laurent Destailleur  <eldy@users.sourceforge.net>
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
*/
/**
 *      \file       htdocs/core/class/rssparser.class.php
 *      \ingroup    core
 *      \brief      File of class to parse RSS feeds
 */
/**
 * 	Class to parse RSS files
 */
class RssParser
{
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    private $_format = '';
    private $_urlRSS;
    private $_language;
    private $_generator;
    private $_copyright;
    private $_lastbuilddate;
    private $_imageurl;
    private $_link;
    private $_title;
    private $_description;
    private $_lastfetchdate;
    // Last successful fetch
    private $_rssarray = array();
    // For parsing with xmlparser
    public $stack = array();
    // parser stack
    private $_CONTENT_CONSTRUCTS = array('content', 'summary', 'info', 'title', 'tagline', 'copyright');
    /**
     *	Constructor
     *
     *  @param		DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     * getFormat
     *
     * @return string
     */
    public function getFormat()
    {
    }
    /**
     * getUrlRss
     *
     * @return string
     */
    public function getUrlRss()
    {
    }
    /**
     * getLanguage
     *
     * @return string
     */
    public function getLanguage()
    {
    }
    /**
     * getGenerator
     *
     * @return string
     */
    public function getGenerator()
    {
    }
    /**
     * getCopyright
     *
     * @return string
     */
    public function getCopyright()
    {
    }
    /**
     * getLastBuildDate
     *
     * @return string
     */
    public function getLastBuildDate()
    {
    }
    /**
     * getImageUrl
     *
     * @return string
     */
    public function getImageUrl()
    {
    }
    /**
     * getLink
     *
     * @return string
     */
    public function getLink()
    {
    }
    /**
     * getTitle
     *
     * @return string
     */
    public function getTitle()
    {
    }
    /**
     * getDescription
     *
     * @return string
     */
    public function getDescription()
    {
    }
    /**
     * getLastFetchDate
     *
     * @return string
     */
    public function getLastFetchDate()
    {
    }
    /**
     * getItems
     *
     * @return string
     */
    public function getItems()
    {
    }
    /**
     * 	Parse rss URL
     *
     * 	@param	string	$urlRSS		Url to parse
     * 	@param	int		$maxNb		Max nb of records to get (0 for no limit)
     * 	@param	int		$cachedelay	0=No cache, nb of seconds we accept cache files (cachedir must also be defined)
     * 	@param	string	$cachedir	Directory where to save cache file
     *	@return	int					<0 if KO, >0 if OK
     */
    public function parser($urlRSS, $maxNb = 0, $cachedelay = 60, $cachedir = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Triggered when opened tag is found
     *
     * 	@param	string		$p			Start
     *  @param	string		$element	Tag
     *  @param	array		$attrs		Attributes of tags
     *  @return	void
     */
    public function feed_start_element($p, $element, &$attrs)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Triggered when CDATA is found
     *
     * 	@param	string	$p		P
     *  @param	string	$text	Tag
     *  @return	void
     */
    public function feed_cdata($p, $text)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Triggered when closed tag is found
     *
     * 	@param	string		$p		P
     *  @param	string		$el		Tag
     *  @return	void
     */
    public function feed_end_element($p, $el)
    {
    }
    /**
     * 	To concat 2 string with no warning if an operand is not defined
     *
     * 	@param	string	$str1		Str1
     *  @param	string	$str2		Str2
     *  @return	string				String cancatenated
     */
    public function concat(&$str1, $str2 = "")
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Enter description here ...
     *
     * @param	string	$text		Text
     * @return	void
     */
    public function append_content($text)
    {
    }
    /**
     * 	smart append - field and namespace aware
     *
     * 	@param	string	$el		El
     * 	@param	string	$text	Text
     * 	@return	void
     */
    public function append($el, $text)
    {
    }
    /**
     * Return a description/summary for one item from a ATOM feed
     *
     * @param	array	$item		A parsed item of a ATOM feed
     * @param	int		$maxlength	(optional) The maximum length for the description
     * @return	string				A summary description
     */
    private function getAtomItemDescription(array $item, $maxlength = 500)
    {
    }
    /**
     * Return a URL to a image of the given ATOM feed
     *
     * @param	array	$feed	The ATOM feed that possible contain a link to a logo or icon
     * @return	string			A URL to a image from a ATOM feed when found, otherwise a empty string
     */
    private function getAtomImageUrl(array $feed)
    {
    }
}
/**
 * Function to convert an XML object into an array
 *
 * @param	SimpleXMLElement	$xml		Xml
 * @return	void
 */
function xml2php($xml)
{
}