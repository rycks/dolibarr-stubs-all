<?php

/* Copyright (C) 2011-2012 Laurent Destailleur  <eldy@users.sourceforge.net>
 * Copyright (C) 2024		MDW							<mdeweerd@users.noreply.github.com>
 * Copyright (C) 2024		Frédéric France			<frederic.france@free.fr>
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
// @phan-file-suppress PhanPluginPHPDocInWrongComment
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
    /**
     * @var string
     */
    public $feed_version;
    /**
     * @var string
     */
    private $_format = '';
    /**
     * @var string
     */
    private $_urlRSS;
    /**
     * @var string
     */
    private $_language;
    /**
     * @var string
     */
    private $_generator;
    /**
     * @var string
     */
    private $_copyright;
    /**
     * @var string
     */
    private $_lastbuilddate;
    /**
     * @var string
     */
    private $_imageurl;
    /**
     * @var string
     */
    private $_link;
    /**
     * @var string
     */
    private $_title;
    /**
     * @var string
     */
    private $_description;
    /**
     * @var int
     */
    private $_lastfetchdate;
    // Last successful fetch
    /**
     * @var array<array{link:string,title:string,description:string,pubDate:string,category:string,id:string,author:string}>
     */
    private $_rssarray = array();
    /**
     * @var string|false
     */
    private $current_namespace;
    public $items = array();
    /**
     * @var array<string,string>|array<string,array<string,string>>
     */
    public $current_item = array();
    /**
     * @var SimpleXMLElement|array<string,mixed>  SimpleXMLElement when getDolGlobalString('EXTERNALRSS_USE_SIMPLEXML')
     */
    public $channel = array();
    /**
     * @var array<string,array<string,string>>  array[namespace][element]
     */
    public $textinput = array();
    /**
     * @var array<string,array<string,string>>  array[namespace][element]
     */
    public $image = array();
    /**
     * @var bool
     */
    private $initem;
    /**
     * @var bool
     */
    private $intextinput;
    /**
     * @var false|string
     */
    private $incontent;
    /**
     * @var bool
     */
    private $inimage;
    /**
     * @var bool
     */
    private $inchannel;
    /**
     * @var string[] For parsing with xmlparser
     */
    public $stack = array();
    // parser stack
    /**
     * @var string[]
     */
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
     * @return int
     */
    public function getLastFetchDate()
    {
    }
    /**
     * getItems
     *
     * @return array<array{link:string,title:string,description:string,pubDate:string,category:string,id:string,author:string}>
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
     * 	@param	string	$cachedir	Directory where to save cache file (For example $conf->externalrss->dir_temp)
     *	@return	int					Return integer <0 if KO, >0 if OK
     */
    public function parser($urlRSS, $maxNb = 0, $cachedelay = 60, $cachedir = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Triggered when opened tag is found
     *
     * 	@param	string		$p			Start
     *  @param	string					$element	Tag
     *  @param	array<string,mixed|mixed[]>	$attrs		Attributes of tags
     *  @return	void
     */
    public function feed_start_element($p, $element, $attrs)
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
     * 	To concat 2 strings with no warning if an operand is not defined
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
     * @param	array<string,mixed>	$item		A parsed item of a ATOM feed
     * @param	int		$maxlength	(optional) The maximum length for the description
     * @return	string				A summary description
     */
    private function getAtomItemDescription(array $item, $maxlength = 500)
    {
    }
    /**
     * Return a URL to a image of the given ATOM feed
     *
     * @param	array<string,mixed>	$feed	The ATOM feed that possible contain a link to a logo or icon
     * @return	string			A URL to a image from a ATOM feed when found, otherwise a empty string
     */
    private function getAtomImageUrl(array $feed)
    {
    }
}
/*
 * A method for the xml_set_external_entity_ref_handler()
 *
 * @param XMLParser $parser
 * @param string $ent
 * @param string|false $base
 * @param string $sysID
 * @param string|false $pubID
 * @return bool
function extEntHandler($parser, $ent, $base, $sysID, $pubID)  {
	print 'extEntHandler ran';
	return true;
}
*/
/**
 * Function to convert an XML object into an array
 *
 * @param	string 	$k		Key
 * @param	string 	$v		Value
 * @return	string
 */
function rss_map_attrs($k, $v)
{
}
/**
 * Function to convert an XML object into an array
 *
 * @param	SimpleXMLElement			$xml		Xml
 * @return	array<string,mixed|mixed[]>|string
 */
function xml2php($xml)
{
}