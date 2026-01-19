<?php

/* Copyright (C) 2003-2005	Rodolphe Quiedeville    <rodolphe@quiedeville.org>
 * Copyright (C) 2004-2010	Laurent Destailleur     <eldy@users.sourceforge.net>
 * Copyright (C) 2004		Eric Seigne             <eric.seigne@ryxeo.com>
 * Copyright (C) 2005-2012	Regis Houssin           <regis.houssin@inodbox.com>
 * Copyright (C) 2015       Marcos García           <marcosgdf@gmail.com>
 * Copyright (C) 2016-2023  Charlene Benke          <charlene@patas-monkey.com>
 * Copyright (C) 2018-2024  Frédéric France         <frederic.france@free.fr>
 * Copyright (C) 2020       Josep Lluís Amador      <joseplluis@lliuretic.cat>
 * Copyright (C) 2024		MDW	                    <mdeweerd@users.noreply.github.com>
 * Copyright (C) 2024       Mélina Joum			    <melina.joum@altairis.fr>
 * Copyright (C) 2024	    Nick Fragoulis
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
 *	Parent class for documents (PDF, ODT, ...) generators
 */
abstract class CommonDocGenerator
{
    /**
     * @var string Model name
     */
    public $name = '';
    /**
     * @var string Version, possible values are: 'development', 'experimental', 'dolibarr', 'dolibarr_deprecated' or a version string like 'x.y.z'''|'development'|'dolibarr'|'experimental' Version
     */
    public $version = '';
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
     * @var ?Extrafields object
     */
    public $extrafieldsCache;
    /**
     * @var int	If set to 1, save the fullname of generated file with path as the main doc when generating a doc with this template.
     */
    public $update_main_doc_field;
    /**
     * @var string	The name of constant to use to scan ODT files (Example: 'COMMANDE_ADDON_PDF_ODT_PATH')
     */
    public $scandir;
    /**
     * @var string model description (short text)
     */
    public $description;
    /**
     * @var array{0:float,1:float}
     */
    public $format;
    /**
     * @var string pdf, odt, etc
     */
    public $type;
    /**
     * @var float page height
     */
    public $page_hauteur;
    /**
     * @var float page wicth
     */
    public $page_largeur;
    /**
     * @var float left margin
     */
    public $marge_gauche;
    /**
     * @var float right margin
     */
    public $marge_droite;
    /**
     * @var float top margin
     */
    public $marge_haute;
    /**
     * @var float bottom margin
     */
    public $marge_basse;
    /**
     * @var int corner radius
     */
    public $corner_radius;
    /**
     * @var int<0,1> option logo
     */
    public $option_logo;
    /**
     * @var int<0,1>
     */
    public $option_tva;
    /**
     * @var int<0,1>
     */
    public $option_multilang;
    /**
     * @var int<0,1>
     */
    public $option_freetext;
    /**
     * @var int<0,1>
     */
    public $option_draft_watermark;
    /**
     * @var string
     */
    public $watermark;
    /**
     * @var int<0,1>
     */
    public $option_modereg;
    /**
     * @var int<0,1>
     */
    public $option_condreg;
    /**
     * @var int<0,1>
     */
    public $option_escompte;
    /**
     * @var int<0,1>
     */
    public $option_credit_note;
    /**
     * @var array<string,float>
     */
    public $tva;
    /**
     * @var array<string,array{amount:float}>
     */
    public $tva_array;
    /**
     * Local tax rates Array[tax_type][tax_rate]
     *
     * @var array<int,array<string,float>>
     */
    public $localtax1;
    /**
     * Local tax rates Array[tax_type][tax_rate]
     *
     * @var array<int,array<string,float>>
     */
    public $localtax2;
    /**
     * @var int Tab Title Height
     */
    public $tabTitleHeight;
    /**
     * @var array{align?:'R'|'C'|'L',padding?:array<float|int>} default title fields style
     */
    public $defaultTitlesFieldsStyle;
    /**
     * @var array{align?:'R'|'C'|'L',padding?:array<float|int>} default content fields style
     */
    public $defaultContentsFieldsStyle;
    /**
     * @var Societe		Issuer of document
     */
    public $emetteur;
    /**
     * @var array{0:int,1:int} Minimum version of PHP required by module.
     * e.g.: PHP ≥ 7.1 = array(7, 1)
     */
    public $phpmin = array(7, 1);
    /**
     * @var array<string,array{rank:int,width:float|int,status:bool,title:array{textkey:string,label:string,align:string,padding:array{0:float,1:float,2:float,3:float}},content:array{align:string,padding:array{0:float,1:float,2:float,3:float}}}>	Array of columns
     */
    public $cols;
    /**
     * @var array<string,array{page:int,y:float|int}>	Array of position data
     */
    public $afterColsLinePositions;
    /**
     * @var array{fullpath:string}	Array with result of doc generation. content is array('fullpath'=>$file)
     */
    public $result;
    /**
     * @var float
     */
    public $posxlabel;
    /**
     * @var float
     */
    public $posxup;
    /**
     * @var float
     */
    public $posxref;
    /**
     * @var float
     */
    public $posxpicture;
    // For picture
    /**
     * @var float
     */
    public $posxdesc;
    // For description
    /**
     * @var float
     */
    public $posxqty;
    /**
     * @var float
     */
    public $posxpuht;
    /**
     * @var float
     */
    public $posxtva;
    /**
     * @var float|int
     */
    public $posxtotalht;
    /**
     * @var float
     */
    public $postotalht;
    /**
     * @var float
     */
    public $posxunit;
    /**
     * @var float
     */
    public $posxdiscount;
    /**
     * @var float
     */
    public $posxworkload;
    /**
     * @var float
     */
    public $posxtimespent;
    /**
     * @var float
     */
    public $posxprogress;
    /**
     * @var bool
     */
    public $atleastonephoto;
    /**
     * @var int<0,1>
     */
    public $atleastoneratenotnull;
    /**
     * @var bool|int<0,1>
     */
    public $atleastonediscount;
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
     * @return	array<string,mixed>			Array of substitution key->code
     */
    public function get_substitutionarray_user($user, $outputlangs)
    {
    }
    /**
     * Define array with couple substitution key => substitution value
     *
     * @param   Adherent	$member         Member
     * @param   Translate	$outputlangs    Language object for output
     * @return	array<string,mixed>			Array of substitution key->code
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
     * @return	array<string,mixed>			Array of substitution key->code
     */
    public function get_substitutionarray_mysoc($mysoc, $outputlangs)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Define array with couple substitution key => substitution value
     * For example {company_name}, {company_name_alias}
     *
     * @param	Societe		$object			Object
     * @param   Translate	$outputlangs    Language object for output
     * @param   string		$array_key	    Name of the key for return array
     * @return	array<string,mixed>			Array of substitution key->code
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
     * @return	array<string,mixed>			Array of substitution key->code
     */
    public function get_substitutionarray_contact($object, $outputlangs, $array_key = 'object')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Define array with couple substitution key => substitution value
     *
     * @param   Translate	$outputlangs    Language object for output
     * @return	array<string,mixed>			Array of substitution key->code
     */
    public function get_substitutionarray_other($outputlangs)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Define array with couple substitution key => substitution value
     * Note that vars into substitutions array are formatted.
     *
     * @param   CommonObject	$object             Main object to use as data source
     * @param   Translate		$outputlangs        Lang object to use for output
     * @param   string		    $array_key	        Name of the key for return array
     * @return	array<string,mixed>					Array of substitution
     */
    public function get_substitutionarray_object($object, $outputlangs, $array_key = 'object')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Define array with couple substitution key => substitution value
     *  Note that vars into substitutions array are formatted.
     *
     *	@param  CommonObjectLine	$line			Object line
     *	@param  Translate			$outputlangs    Translate object to use for output
     *  @param  int					$linenumber		The number of the line for the substitution of "object_line_pos"
     *  @return	array<string,mixed>					Return a substitution array
     */
    public function get_substitutionarray_lines($line, $outputlangs, $linenumber = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Define array with couple substitution key => substitution value
     * Note that vars into substitutions array are formatted.
     *
     * @param   Expedition		$object             Main object to use as data source
     * @param   Translate		$outputlangs        Lang object to use for output
     * @param   string			$array_key	        Name of the key for return array
     * @return	array<string,mixed>					Array of substitution
     */
    public function get_substitutionarray_shipment($object, $outputlangs, $array_key = 'object')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Define array with couple substitution key => substitution value
     *
     * @param   array<string,CommonObject|float|int|string>|CommonObject	$object		Dolibarr Object
     * @param   Translate			$outputlangs	Language object for output
     * @param   boolean|int			$recursive		Want to fetch child array or child object.
     * @return	array<string,mixed>					Array of substitution key->code
     */
    public function get_substitutionarray_each_var_object(&$object, $outputlangs, $recursive = 1)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Fill array with couple extrafield key => extrafield value
     *  Note that vars into substitutions array are formatted.
     *
     *	@param  CommonObject	$object				Object with extrafields (must have $object->array_options filled)
     *	@param  array<string,string>	$array_to_fill      Substitution array
     *  @param  Extrafields		$extrafields        Extrafields object
     *  @param  string			$array_key	        Prefix for name of the keys into returned array
     *  @param  Translate		$outputlangs        Lang object to use for output
     *	@return	array<string,string>				Substitution array
     */
    public function fill_substitutionarray_with_extrafields($object, $array_to_fill, $extrafields, $array_key, $outputlangs)
    {
    }
    /**
     * Rect pdf
     *
     * @param	TCPDI|TCPDF	$pdf            Pdf object
     * @param	float		$x				Abscissa of first point
     * @param	float		$y		        Ordinate of first point
     * @param	float		$l				??
     * @param	float		$h				??
     * @param	int<-1,1>	$hidetop		1=Hide top bar of array and title, 0=Hide nothing, -1=Hide only title
     * @param	int<0,1>	$hidebottom		Hide bottom
     * @return	void
     */
    public function printRect($pdf, $x, $y, $l, $h, $hidetop = 0, $hidebottom = 0)
    {
    }
    /**
     * Print a rounded rectangle on the PDF
     *
     * @param TCPDF       $pdf          Object PDF
     * @param float       $x            Abscissa of first point
     * @param float       $y            Ordinate of first point
     * @param float       $w            Width of the rectangle
     * @param float       $h            Height of the rectangle
     * @param float       $r            Corner radius (can be an array for different radii per corner)
     * @param int         $hidetop      1=Hide top bar of array and title, 0=Hide nothing, -1=Hide only title
     * @param int         $hidebottom   Hide bottom
     * @param string      $style        Draw style (e.g. 'D' for draw, 'F' for fill, 'DF' for both)
     * @return void
     */
    public function printRoundedRect($pdf, $x, $y, $w, $h, $r, $hidetop = 0, $hidebottom = 0, $style = 'D')
    {
    }
    /**
     * Get position in PDF after col display
     * @return false|array{page:int,y:float|int,col:string}
     */
    public function getMaxAfterColsLinePositionsData()
    {
    }
    /**
     * Used for reset afterColsLinePositions var in start of a new pdf draw line loop
     * @param float $y the new $y position usually get by TCPDF::GetY()
     * @param int $pageNumb the page number to reset at
     * @return void
     */
    public function resetAfterColsLinePositionsData(float $y, int $pageNumb)
    {
    }
    /**
     * Used for to set afterColsLinePositions var in a pdf draw line loop
     * @param string $colId the column id used as key in $this->cols or an unique id code like startLine or separateLine ....
     * @param float $y the $y position usually get by TCPDF::GetY() where print data ended
     * @param int $pageNumb the page number where print data ended
     * @return void
     */
    public function setAfterColsLinePositionsData(string $colId, float $y, int $pageNumb)
    {
    }
    /**
     *  uasort callback function to Sort columns fields
     *
     *  @param	array{rank?:int}	$a    			PDF lines array fields configs
     *  @param	array{rank?:int}	$b    			PDF lines array fields configs
     *  @return	int<-1,1>							Return compare result
     */
    public function columnSort($a, $b)
    {
    }
    /**
     *   	Prepare Array Column Field
     *
     *   	@param	CommonObject	$object				common object
     *   	@param	Translate		$outputlangs		langs
     *      @param	int<0,1>		$hidedetails		Do not show line details
     *      @param	int<0,1>		$hidedesc			Do not show desc
     *      @param	int<0,1>		$hideref			Do not show ref
     *      @return	void
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
     *  get column position rank from column key
     *
     *  @param	string		$colKey    		the column key
     *  @return	int         rank on success and -1 on error
     */
    public function getColumnRank($colKey)
    {
    }
    /**
     *  get column position rank from column key
     *
     *  @param	string		$newColKey    		the new column key
     *  @param	array{rank?:int}	$defArray    		a single column definition array
     *  @param	string		$targetCol    		target column used to place the new column beside
     *  @param	bool		$insertAfterTarget  insert before or after target column ?
     *  @return	int         					new rank on success and -1 on error
     */
    public function insertNewColumnDef($newColKey, $defArray, $targetCol = '', $insertAfterTarget = \false)
    {
    }
    /**
     *  print standard column content
     *
     *	@param	TCPDI|TCPDF	$pdf            Pdf object
     *  @param	float		$curY    		current Y position
     *  @param	string		$colKey    		the column key
     *  @param	string		$columnText   	column text
     *  @return	int							Return integer <0 if KO, >= if OK
     */
    public function printStdColumnContent($pdf, &$curY, $colKey, $columnText = '')
    {
    }
    /**
     *  print description column content
     *
     *	@param	TCPDI|TCPDF	$pdf            Pdf object
     *  @param	float		$curY    		current Y position
     *  @param	string		$colKey    		the column key
     *  @param  CommonObject	$object 	CommonObject
     *  @param  int         $i  			the $object->lines array key
     *  @param  Translate 	$outputlangs    Output language
     *  @param  int<0,1>	$hideref 		hide ref
     *  @param  int<0,1> 	$hidedesc 		hide desc
     *  @param  int<0,1> 	$issupplierline if object needx supplier product
     *  @return void
     */
    public function printColDescContent($pdf, &$curY, $colKey, $object, $i, $outputlangs, $hideref = 0, $hidedesc = 0, $issupplierline = 0)
    {
    }
    /**
     *  get extrafield content for pdf writeHtmlCell compatibility
     *  usage for PDF line columns and object note block
     *
     *  @param	CommonObject	$object     		Common object
     *  @param	string			$extrafieldKey    	The extrafield key
     *  @param	Translate		$outputlangs		The output langs (if value is __(XXX)__ we use it to translate it).
     *  @return	string
     */
    public function getExtrafieldContent($object, $extrafieldKey, $outputlangs = \null)
    {
    }
    /**
     *  display extrafields columns content
     *
     *  @param	CommonObject|CommonObjectLine	$object    		line of common object
     *  @param 	Translate 						$outputlangs    Output language
     *  @param 	array<string,mixed> 			$params    		array of additional parameters
     *  @return	string  										Html string
     */
    public function getExtrafieldsInHtml($object, $outputlangs, $params = array())
    {
    }
    /**
     *  get column status from column key
     *
     *  @param	string		$colKey    		the column key
     *  @return	boolean						true if column on
     */
    public function getColumnStatus($colKey)
    {
    }
    /**
     * Print standard column content
     *
     * @param TCPDI|TCPDF	$pdf            Pdf object
     * @param float			$tab_top        Tab top position
     * @param float			$tab_height     Default tab height
     * @param Translate		$outputlangs    Output language
     * @param int			$hidetop        Hide top
     * @return float						Height of col tab titles
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
     *  @return	int								Return integer <0 if KO, >=0 if OK
     */
    public function defineColumnExtrafield($object, $outputlangs, $hidedetails = 0)
    {
    }
    /**
     *   Define Array Column Field into $this->cols
     *   This method must be implemented by the module that generate the document with its own columns.
     *
     *   @param		Object			$object    		Common object
     *   @param		Translate		$outputlangs    Langs
     *   @param		int			   	$hidedetails	Do not show line details
     *   @param		int			   	$hidedesc		Do not show desc
     *   @param		int			   	$hideref		Do not show ref
     *   @return	void
     */
    public function defineColumnField($object, $outputlangs, $hidedetails = 0, $hidedesc = 0, $hideref = 0)
    {
    }
}