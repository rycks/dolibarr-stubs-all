<?php

/* Copyright (C) 2003-2005	Rodolphe Quiedeville    <rodolphe@quiedeville.org>
 * Copyright (C) 2004-2010	Laurent Destailleur     <eldy@users.sourceforge.net>
 * Copyright (C) 2004		Eric Seigne             <eric.seigne@ryxeo.com>
 * Copyright (C) 2005-2012	Regis Houssin           <regis.houssin@inodbox.com>
 * Copyright (C) 2015       Marcos García           <marcosgdf@gmail.com>
 * Copyright (C) 2016       Charlie Benke           <charlie@patas-monkey.com>
 * Copyright (C) 2018-2020  Frédéric France         <frederic.france@netlogic.fr>
 * Copyright (C) 2020       Josep Lluís Amador      <joseplluis@lliuretic.cat>
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
 *	    \file       htdocs/core/class/commondocgenerator.class.php
 *		\ingroup    core
 *		\brief      File of parent class for documents generators
 */
/**
 *	Parent class for documents generators
 */
abstract class CommonDocGenerator
{
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * @var string[]    Array of error strings
     */
    public $errors = array();
    /**
     * @var DoliDB Database handler.
     */
    protected $db;
    /**
     * @var Extrafields object
     */
    public $extrafieldsCache;
    /**
     * @var int	If set to 1, save the fullname of generated file with path as the main doc when generating a doc with this template.
     */
    public $update_main_doc_field;
    /**
     *	Constructor
     *
     *  @param		DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Define array with couple substitution key => substitution value
     *
     * @param   User		$user           User
     * @param   Translate	$outputlangs    Language object for output
     * @return	array						Array of substitution key->code
     */
    public function get_substitutionarray_user($user, $outputlangs)
    {
    }
    /**
     * Define array with couple substitution key => substitution value
     *
     * @param   Adherent	$member         Member
     * @param   Translate	$outputlangs    Language object for output
     * @return	array						Array of substitution key->code
     */
    public function getSubstitutionarrayMember($member, $outputlangs)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Define array with couple substitution key => substitution value
     *
     * @param   Societe		$mysoc			Object thirdparty
     * @param   Translate	$outputlangs    Language object for output
     * @return	array						Array of substitution key->code
     */
    public function get_substitutionarray_mysoc($mysoc, $outputlangs)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Define array with couple substitution key => substitution value
     *
     * @param	Societe		$object			Object
     * @param   Translate	$outputlangs    Language object for output
     * @param   string		$array_key	    Name of the key for return array
     * @return	array						Array of substitution key->code
     */
    public function get_substitutionarray_thirdparty($object, $outputlangs, $array_key = 'company')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Define array with couple substitution key => substitution value
     *
     * @param	Contact 	$object        	contact
     * @param	Translate 	$outputlangs   	object for output
     * @param   string		$array_key	    Name of the key for return array
     * @return	array 						Array of substitution key->code
     */
    public function get_substitutionarray_contact($object, $outputlangs, $array_key = 'object')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Define array with couple substitution key => substitution value
     *
     * @param   Translate	$outputlangs    Language object for output
     * @return	array						Array of substitution key->code
     */
    public function get_substitutionarray_other($outputlangs)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Define array with couple substitution key => substitution value
     *
     * @param   Object			$object             Main object to use as data source
     * @param   Translate		$outputlangs        Lang object to use for output
     * @param   string		    $array_key	        Name of the key for return array
     * @return	array								Array of substitution
     */
    public function get_substitutionarray_object($object, $outputlangs, $array_key = 'object')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Define array with couple substitution key => substitution value
     *
     *	@param  Object			$line				Object line
     *	@param  Translate		$outputlangs        Lang object to use for output
     *  @param  int				$linenumber			The number of the line for the substitution of "object_line_pos"
     *  @return	array								Return a substitution array
     */
    public function get_substitutionarray_lines($line, $outputlangs, $linenumber = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Define array with couple substitution key => substitution value
     *
     * @param   Expedition		$object             Main object to use as data source
     * @param   Translate		$outputlangs        Lang object to use for output
     * @param   array			$array_key	        Name of the key for return array
     * @return	array								Array of substitution
     */
    public function get_substitutionarray_shipment($object, $outputlangs, $array_key = 'object')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Define array with couple substitution key => substitution value
     *
     *	@param  ExpeditionLigne	$line				Object line
     *	@param  Translate		$outputlangs        Lang object to use for output
     *	@return	array								Substitution array
     */
    public function get_substitutionarray_shipment_lines($line, $outputlangs)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Define array with couple substitution key => substitution value
     *
     * @param   Object		$object    		Dolibarr Object
     * @param   Translate	$outputlangs    Language object for output
     * @param   boolean		$recursive    	Want to fetch child array or child object
     * @return	array						Array of substitution key->code
     */
    public function get_substitutionarray_each_var_object(&$object, $outputlangs, $recursive = \true)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Fill array with couple extrafield key => extrafield value
     *
     *	@param  Object			$object				Object with extrafields (must have $object->array_options filled)
     *	@param  array			$array_to_fill      Substitution array
     *  @param  Extrafields		$extrafields        Extrafields object
     *  @param  string			$array_key	        Prefix for name of the keys into returned array
     *  @param  Translate		$outputlangs        Lang object to use for output
     *	@return	array								Substitution array
     */
    public function fill_substitutionarray_with_extrafields($object, $array_to_fill, $extrafields, $array_key, $outputlangs)
    {
    }
    /**
     * Rect pdf
     *
     * @param	TCPDF	$pdf			Object PDF
     * @param	float	$x				Abscissa of first point
     * @param	float	$y		        Ordinate of first point
     * @param	float	$l				??
     * @param	float	$h				??
     * @param	int		$hidetop		1=Hide top bar of array and title, 0=Hide nothing, -1=Hide only title
     * @param	int		$hidebottom		Hide bottom
     * @return	void
     */
    public function printRect($pdf, $x, $y, $l, $h, $hidetop = 0, $hidebottom = 0)
    {
    }
    /**
     *  uasort callback function to Sort columns fields
     *
     *  @param	array			$a    			PDF lines array fields configs
     *  @param	array			$b    			PDF lines array fields configs
     *  @return	int								Return compare result
     */
    public function columnSort($a, $b)
    {
    }
    /**
     *   	Prepare Array Column Field
     *
     *   	@param	object			$object				common object
     *   	@param	Translate		$outputlangs		langs
     *      @param	int				$hidedetails		Do not show line details
     *      @param	int				$hidedesc			Do not show desc
     *      @param	int				$hideref			Do not show ref
     *      @return	null
     */
    public function prepareArrayColumnField($object, $outputlangs, $hidedetails = 0, $hidedesc = 0, $hideref = 0)
    {
    }
    /**
     *  get column content width from column key
     *
     *  @param	string      $colKey     the column key
     *  @return	float                   width in mm
     */
    public function getColumnContentWidth($colKey)
    {
    }
    /**
     *  get column content X (abscissa) left position from column key
     *
     *  @param	string    $colKey    		the column key
     *  @return	float      X position in mm
     */
    public function getColumnContentXStart($colKey)
    {
    }
    /**
     *   	get column position rank from column key
     *
     *   	@param	string		$colKey    		the column key
     *      @return	int         rank on success and -1 on error
     */
    public function getColumnRank($colKey)
    {
    }
    /**
     *  get column position rank from column key
     *
     *  @param	string		$newColKey    	the new column key
     *  @param	array		$defArray    	a single column definition array
     *  @param	string		$targetCol    	target column used to place the new column beside
     *  @param	bool		$insertAfterTarget    	insert before or after target column ?
     *  @return	int         new rank on success and -1 on error
     */
    public function insertNewColumnDef($newColKey, $defArray, $targetCol = \false, $insertAfterTarget = \false)
    {
    }
    /**
     *  print standard column content
     *
     *  @param	TCPDF		    $pdf    	pdf object
     *  @param	float		$curY    	curent Y position
     *  @param	string		$colKey    	the column key
     *  @param	string		$columnText   column text
     *  @return	null
     */
    public function printStdColumnContent($pdf, &$curY, $colKey, $columnText = '')
    {
    }
    /**
     *  print description column content
     *
     *  @param	TCPDF		$pdf    	pdf object
     *  @param	float		$curY    	curent Y position
     *  @param	string		$colKey    	the column key
     *  @param  object      $object CommonObject
     *  @param  int         $i  the $object->lines array key
     *  @param  Translate $outputlangs    Output language
     *  @param  int $hideref hide ref
     *  @param  int $hidedesc hide desc
     *  @param  int $issupplierline if object need supplier product
     *  @return null
     */
    public function printColDescContent($pdf, &$curY, $colKey, $object, $i, $outputlangs, $hideref = 0, $hidedesc = 0, $issupplierline = 0)
    {
    }
    /**
     *  get extrafield content for pdf writeHtmlCell compatibility
     *  usage for PDF line columns and object note block
     *
     *  @param	object		$object     common object
     *  @param	string		$extrafieldKey    	the extrafield key
     *  @return	string
     */
    public function getExtrafieldContent($object, $extrafieldKey)
    {
    }
    /**
     *  display extrafields columns content
     *
     *  @param	object		$object    	line of common object
     *  @param Translate $outputlangs    Output language
     *  @param array $params    array of additionals parameters
     *  @return	double  max y value
     */
    public function getExtrafieldsInHtml($object, $outputlangs, $params = array())
    {
    }
    /**
     *  get column status from column key
     *
     *  @param	string			$colKey    		the column key
     *  @return	float      width in mm
     */
    public function getColumnStatus($colKey)
    {
    }
    /**
     * Print standard column content
     *
     * @param TCPDI	    $pdf            Pdf object
     * @param float     $tab_top        Tab top position
     * @param float     $tab_height     Default tab height
     * @param Translate $outputlangs    Output language
     * @param int       $hidetop        Hide top
     * @return float                    Height of col tab titles
     */
    public function pdfTabTitles(&$pdf, $tab_top, $tab_height, $outputlangs, $hidetop = 0)
    {
    }
    /**
     *  Define Array Column Field for extrafields
     *
     *  @param	object			$object    		common object det
     *  @param	Translate		$outputlangs    langs
     *  @param	int			   $hidedetails		Do not show line details
     *  @return	null
     */
    public function defineColumnExtrafield($object, $outputlangs, $hidedetails = 0)
    {
    }
}