<?php

/* Copyright (C) 2001      Eric Seigne         <erics@rycks.com>
 * Copyright (C) 2004-2015 Destailleur Laurent <eldy@users.sourceforge.net>
 * Copyright (C) 2005-2010 Regis Houssin       <regis.houssin@inodbox.com>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * any later version.
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
 *   	\file       htdocs/core/class/translate.class.php
 *      \ingroup    core
 *		\brief      File for Tanslate class
 */
/**
 *		Class to manage translations
 */
class Translate
{
    public $dir;
    // Directories that contains /langs subdirectory
    public $defaultlang;
    // Current language for current user
    public $shortlang;
    // Short language for current user
    public $charset_output = 'UTF-8';
    // Codage used by "trans" method outputs
    public $tab_translate = array();
    // Array of all translations key=>value
    private $_tab_loaded = array();
    // Array to store result after loading each language file
    public $cache_labels = array();
    // Cache for labels return by getLabelFromKey method
    public $cache_currencies = array();
    // Cache to store currency symbols
    private $cache_currencies_all_loaded = \false;
    /**
     *	Constructor
     *
     *  @param	string	$dir            Force directory that contains /langs subdirectory (value is sometimes '..' like into install/* pages or support/* pages). Use '' by default.
     *  @param  Conf	$conf			Object with Dolibarr configuration
     */
    public function __construct($dir, $conf)
    {
    }
    /**
     *  Set accessor for this->defaultlang
     *
     *  @param	string	$srclang     	Language to use. If '' or 'auto', we use browser lang.
     *  @return	void
     */
    public function setDefaultLang($srclang = 'en_US')
    {
    }
    /**
     *  Return active language code for current user
     * 	It's an accessor for this->defaultlang
     *
     *  @param	int		$mode       0=Long language code, 1=Short language code (en, fr, es, ...)
     *  @return string      		Language code used (en_US, en_AU, fr_FR, ...)
     */
    public function getDefaultLang($mode = 0)
    {
    }
    /**
     *  Load translation files.
     *
     *  @param	array	$domains      		Array of lang files to load
     *	@return	int							<0 if KO, 0 if already loaded or loading not required, >0 if OK
     */
    public function loadLangs($domains)
    {
    }
    /**
     *  Load translation key-value for a particular file, into a memory array.
     *  If data for file already loaded, do nothing.
     * 	All data in translation array are stored in UTF-8 format.
     *  tab_loaded is completed with $domain key.
     *  rule "we keep first entry found with we keep last entry found" so it is probably not what you want to do.
     *
     *  Value for hash are: 1:Loaded from disk, 2:Not found, 3:Loaded from cache
     *
     *  @param	string	$domain      				File name to load (.lang file). Must be "file" or "file@module" for module language files:
     *												If $domain is "file@module" instead of "file" then we look for module lang file
     *												in htdocs/custom/modules/mymodule/langs/code_CODE/file.lang
     *												then in htdocs/module/langs/code_CODE/file.lang instead of htdocs/langs/code_CODE/file.lang
     *  @param	integer	$alt         				0 (try xx_ZZ then 1), 1 (try xx_XX then 2), 2 (try en_US)
     * 	@param	int		$stopafterdirection			Stop when the DIRECTION tag is found (optimize speed)
     * 	@param	int		$forcelangdir				To force a different lang directory
     *  @param  int     $loadfromfileonly   		1=Do not load overwritten translation from file or old conf.
     *  @param  int     $forceloadifalreadynotfound	Force attempt to reload lang file if it was previously not found
     *	@return	int									<0 if KO, 0 if already loaded or loading not required, >0 if OK
     *  @see loadLangs()
     */
    public function load($domain, $alt = 0, $stopafterdirection = 0, $forcelangdir = '', $loadfromfileonly = 0, $forceloadifalreadynotfound = 0)
    {
    }
    /**
     *  Load translation key-value from database into a memory array.
     *  If data already loaded, do nothing.
     * 	All data in translation array are stored in UTF-8 format.
     *  tab_loaded is completed with $domain key.
     *  rule "we keep first entry found with we keep last entry found" so it is probably not what you want to do.
     *
     *  Value for hash are: 1:Loaded from disk, 2:Not found, 3:Loaded from cache
     *
     *  @param  Database    $db             Database handler
     *	@return	int							<0 if KO, 0 if already loaded or loading not required, >0 if OK
     */
    public function loadFromDatabase($db)
    {
    }
    /**
     * Get information with result of loading data for domain
     *
     * @param	string		$domain		Domain to check
     * @return 	int						0, 1, 2...
     */
    public function isLoaded($domain)
    {
    }
    /**
     * Return translated value of key for special keys ("Currency...", "Civility...", ...).
     * Search in lang file, then into database. Key must be any complete entry into lang file: CurrencyEUR, ...
     * If not found, return key.
     * The string return is not formated (translated with transnoentitiesnoconv)
     * NOTE: To avoid infinite loop (getLabelFromKey->transnoentities->getTradFromKey), if you modify this function,
     * check that getLabelFromKey is not called with same value than input.
     *
     * @param	string		$key		Key to translate
     * @return 	string					Translated string (translated with transnoentitiesnoconv)
     */
    private function getTradFromKey($key)
    {
    }
    /**
     *  Return text translated of text received as parameter (and encode it into HTML)
     *  If there is no match for this text, we look in alternative file and if still not found, it is returned as it is.
     *  The parameters of this method should not contain HTML tags. If there is, they will be htmlencoded to have no effect.
     *
     *  @param	string	$key        Key to translate
     *  @param  string	$param1     param1 string
     *  @param  string	$param2     param2 string
     *  @param  string	$param3     param3 string
     *  @param  string	$param4     param4 string
     *	@param	int		$maxsize	Max length of text. Warning: Will not work if paramX has HTML content. deprecated.
     *  @return string      		Translated string (encoded into HTML entities and UTF8)
     */
    public function trans($key, $param1 = '', $param2 = '', $param3 = '', $param4 = '', $maxsize = 0)
    {
    }
    /**
     *  Return translated value of a text string
     *               If there is no match for this text, we look in alternative file and if still not found
     *               it is returned as is.
     *               Parameters of this method must not contain any HTML tags.
     *
     *  @param	string	$key        Key to translate
     *  @param  string	$param1     chaine de param1
     *  @param  string	$param2     chaine de param2
     *  @param  string	$param3     chaine de param3
     *  @param  string	$param4     chaine de param4
     *  @param  string	$param5     chaine de param5
     *  @return string      		Translated string (encoded into UTF8)
     */
    public function transnoentities($key, $param1 = '', $param2 = '', $param3 = '', $param4 = '', $param5 = '')
    {
    }
    /**
     *  Return translated value of a text string
     * 				 If there is no match for this text, we look in alternative file and if still not found,
     * 				 it is returned as is.
     *               No conversion to encoding charset of lang object is done.
     *               Parameters of this method must not contains any HTML tags.
     *
     *  @param	string	$key        Key to translate
     *  @param  string	$param1     chaine de param1
     *  @param  string	$param2     chaine de param2
     *  @param  string	$param3     chaine de param3
     *  @param  string	$param4     chaine de param4
     *  @param  string	$param5     chaine de param5
     *  @return string      		Translated string
     */
    public function transnoentitiesnoconv($key, $param1 = '', $param2 = '', $param3 = '', $param4 = '', $param5 = '')
    {
    }
    /**
     *  Return translation of a key depending on country
     *
     *  @param	string	$str            string root to translate
     *  @param  string	$countrycode    country code (FR, ...)
     *  @return	string         			translated string
     *  @see transcountrynoentities(), picto_from_langcode()
     */
    public function transcountry($str, $countrycode)
    {
    }
    /**
     *  Retourne la version traduite du texte passe en parametre complete du code pays
     *
     *  @param	string	$str            string root to translate
     *  @param  string	$countrycode    country code (FR, ...)
     *  @return string         			translated string
     *  @see transcountry(), picto_from_langcode()
     */
    public function transcountrynoentities($str, $countrycode)
    {
    }
    /**
     *  Convert a string into output charset (this->charset_output that should be defined to conf->file->character_set_client)
     *
     *  @param	string	$str            String to convert
     *  @param	string	$pagecodefrom	Page code of src string
     *  @return string         			Converted string
     */
    public function convToOutputCharset($str, $pagecodefrom = 'UTF-8')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return list of all available languages
     *
     * 	@param	string	$langdir		Directory to scan
     *  @param  integer	$maxlength   	Max length for each value in combo box (will be truncated)
     *  @param	int		$usecode		1=Show code instead of country name for language variant, 2=Show only code
     *  @param	int		$mainlangonly   1=Show only main languages ('fr_FR' no' fr_BE', 'es_ES' not 'es_MX', ...)
     *  @return array     				List of languages
     */
    public function get_available_languages($langdir = \DOL_DOCUMENT_ROOT, $maxlength = 0, $usecode = 0, $mainlangonly = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return if a filename $filename exists for current language (or alternate language)
     *
     *  @param	string	$filename       Language filename to search
     *  @param  integer	$searchalt      Search also alernate language file
     *  @return boolean         		true if exists and readable
     */
    public function file_exists($filename, $searchalt = 0)
    {
    }
    /**
     *      Return full text translated to language label for a key. Store key-label in a cache.
     *      This function need module "numberwords" to be installed. If not it will return
     *      same number (this module is not provided by default as it use non GPL source code).
     *
     *		@param	int		$number		Number to encode in full text
     *      @param  string	$isamount	''=it's just a number, '1'=It's an amount (default currency), 'currencycode'=It's an amount (foreign currency)
     *      @return string				Label translated in UTF8 (but without entities)
     * 									10 if setDefaultLang was en_US => ten
     * 									123 if setDefaultLang was fr_FR => cent vingt trois
     */
    public function getLabelFromNumber($number, $isamount = '')
    {
    }
    /**
     *      Return a label for a key.
     *      Search into translation array, then into cache, then if still not found, search into database.
     *      Store key-label found into cache variable $this->cache_labels to save SQL requests to get labels.
     *
     * 		@param	DoliDB	$db				Database handler
     * 		@param	string	$key			Translation key to get label (key in language file)
     * 		@param	string	$tablename		Table name without prefix
     * 		@param	string	$fieldkey		Field for key
     * 		@param	string	$fieldlabel		Field for label
     *      @param	string	$keyforselect	Use another value than the translation key for the where into select
     *      @param  int		$filteronentity	Use a filter on entity
     *      @return string					Label in UTF8 (but without entities)
     *      @see dol_getIdFromCode()
     */
    public function getLabelFromKey($db, $key, $tablename, $fieldkey, $fieldlabel, $keyforselect = '', $filteronentity = 0)
    {
    }
    /**
     *	Return a currency code into its symbol
     *
     *  @param	string	$currency_code		Currency Code
     *  @param	string	$amount				If not '', show currency + amount according to langs ($10, 10€).
     *  @return	string						Amount + Currency symbol encoded into UTF8
     *  @deprecated							Use method price to output a price
     *  @see price()
     */
    public function getCurrencyAmount($currency_code, $amount)
    {
    }
    /**
     *	Return a currency code into its symbol.
     *  If mb_convert_encoding is not available, return currency code.
     *
     *  @param	string	$currency_code		Currency code
     *  @param	integer	$forceloadall		1=Force to load all currencies into cache. We know we need to use all of them. By default read and cache only the requested currency.
     *  @return	string						Currency symbol encoded into UTF8
     */
    public function getCurrencySymbol($currency_code, $forceloadall = 0)
    {
    }
    /**
     *  Load into the cache this->cache_currencies, all currencies
     *
     *	@param	string	$currency_code		Get only currency. Get all if ''.
     *  @return int             			Nb of loaded lines, 0 if already loaded, <0 if KO
     */
    public function loadCacheCurrencies($currency_code)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return an array with content of all loaded translation keys (found into this->tab_translate) so
     * we get a substitution array we can use for substitutions (for mail or ODT generation for example)
     *
     * @return array	Array of translation keys lang_key => string_translation_loaded
     */
    public function get_translations_for_substitutions()
    {
    }
}