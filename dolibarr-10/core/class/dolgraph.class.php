<?php

/* Copyright (c) 2003-2006 Rodolphe Quiedeville <rodolphe@quiedeville.org>
 * Copyright (c) 2004-2015 Laurent Destailleur  <eldy@users.sourceforge.net>
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
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */
/**
 *	\file       htdocs/core/class/dolgraph.class.php
 *  \ingroup    core
 *	\brief      File for class to generate graph
 */
/**
 * Class to build graphs.
 * Usage is:
 *    $dolgraph=new DolGraph();
 *    $dolgraph->SetTitle($langs->transnoentities('MyTitle').'<br>'.$langs->transnoentities('MyTitlePercent').'%');
 *    $dolgraph->SetMaxValue(50);
 *    $dolgraph->SetData($data);
 *    $dolgraph->setShowLegend(1);
 *    $dolgraph->setShowPercent(1);
 *    $dolgraph->SetType(array('pie'));
 *    $dolgraph->setWidth('100%');
 *    $dolgraph->draw('idofgraph');
 *    print $dolgraph->show($total?0:1);
 */
class DolGraph
{
    public $type = array();
    // Array with type of each series. Example: array('bars', 'lines', ...)
    public $mode = 'side';
    // Mode bars graph: side, depth
    private $_library = 'jflot';
    // Graphic library to use (jflot, artichow)
    //! Array of data
    public $data;
    // Data of graph: array(array('abs1',valA1,valB1), array('abs2',valA2,valB2), ...)
    public $title;
    // Title of graph
    public $cssprefix = '';
    // To add into css styles
    /**
     * @var int|string 		Width of graph. It can be a numeric for pixels or a string like '100%'
     */
    public $width = 380;
    /**
     * @var int 			Height of graph
     */
    public $height = 200;
    public $MaxValue = 0;
    public $MinValue = 0;
    public $SetShading = 0;
    public $PrecisionY = -1;
    public $horizTickIncrement = -1;
    public $SetNumXTicks = -1;
    public $labelInterval = -1;
    public $hideXGrid = \false;
    public $hideYGrid = \false;
    public $Legend = array();
    public $LegendWidthMin = 0;
    public $showlegend = 1;
    public $showpointvalue = 1;
    public $showpercent = 0;
    public $combine = 0;
    // 0.05 if you want to combine records < 5% into "other"
    public $graph;
    // Objet Graph (Artichow, Phplot...)
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    public $bordercolor;
    // array(R,G,B)
    public $bgcolor;
    // array(R,G,B)
    public $bgcolorgrid = array(255, 255, 255);
    // array(R,G,B)
    public $datacolor;
    // array(array(R,G,B),...)
    private $stringtoshow;
    // To store string to output graph into HTML page
    /**
     * Constructor
     *
     * @param	string	$library		'jflot' (default) or 'artichow' (no more supported)
     */
    public function __construct($library = 'jflot')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Set Y precision
     *
     * @param 	float	$which_prec		Precision
     * @return 	boolean
     */
    public function SetPrecisionY($which_prec)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Utiliser SetNumTicks ou SetHorizTickIncrement mais pas les 2
     *
     * @param 	float 		$xi		Xi
     * @return	boolean				True
     */
    public function SetHorizTickIncrement($xi)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Utiliser SetNumTicks ou SetHorizTickIncrement mais pas les 2
     *
     * @param 	float 		$xt		Xt
     * @return	boolean				True
     */
    public function SetNumXTicks($xt)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Set label interval to reduce number of labels
     *
     * @param 	float 		$x		Label interval
     * @return	boolean				True
     */
    public function SetLabelInterval($x)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Hide X grid
     *
     * @param	boolean		$bool	XGrid or not
     * @return	boolean				true
     */
    public function SetHideXGrid($bool)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Hide Y grid
     *
     * @param	boolean		$bool	YGrid or not
     * @return	boolean				true
     */
    public function SetHideYGrid($bool)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Set y label
     *
     * @param 	string	$label		Y label
     * @return	boolean|null				True
     */
    public function SetYLabel($label)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Set width
     *
     * @param 	int|string		$w			Width (Example: 320 or '100%')
     * @return	boolean|null				True
     */
    public function SetWidth($w)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Set title
     *
     * @param 	string	$title		Title
     * @return	void
     */
    public function SetTitle($title)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Set data
     *
     * @param 	array	$data		Data
     * @return	void
     * @see draw_jflot() for syntax of data array
     */
    public function SetData($data)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Set data
     *
     * @param 	array	$datacolor		Data color array(array(R,G,B),array(R,G,B)...)
     * @return	void
     */
    public function SetDataColor($datacolor)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Set type
     *
     * @param 	array	$type		Array with type for each serie. Example: array('pie'), array('lines',...,'bars')
     * @return	void
     */
    public function SetType($type)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Set legend
     *
     * @param 	array	$legend		Legend. Example: array('seriename1','seriname2',...)
     * @return	void
     */
    public function SetLegend($legend)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Set min width
     *
     * @param 	int		$legendwidthmin		Min width
     * @return	void
     */
    public function SetLegendWidthMin($legendwidthmin)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Set max value
     *
     * @param 	int		$max			Max value
     * @return	void
     */
    public function SetMaxValue($max)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Get max value
     *
     * @return	int		Max value
     */
    public function GetMaxValue()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Set min value
     *
     * @param 	int		$min			Min value
     * @return	void
     */
    public function SetMinValue($min)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Get min value
     *
     * @return	int		Max value
     */
    public function GetMinValue()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Set height
     *
     * @param 	int		$h				Height
     * @return	void
     */
    public function SetHeight($h)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Set shading
     *
     * @param 	string	$s				Shading
     * @return	void
     */
    public function SetShading($s)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Set shading
     *
     * @param 	string	$s				Shading
     * @return	void
     */
    public function SetCssPrefix($s)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Reset bg color
     *
     * @return	void
     */
    public function ResetBgColor()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Reset bgcolorgrid
     *
     * @return	void
     */
    public function ResetBgColorGrid()
    {
    }
    /**
     * Is graph ko
     *
     * @return	string		Error
     */
    public function isGraphKo()
    {
    }
    /**
     * Show legend or not
     *
     * @param	int		$showlegend		1=Show legend (default), 0=Hide legend
     * @return	void
     */
    public function setShowLegend($showlegend)
    {
    }
    /**
     * Show pointvalue or not
     *
     * @param	int		$showpointvalue		1=Show value for each point, as tooltip or inline (default), 0=Hide value
     * @return	void
     */
    public function setShowPointValue($showpointvalue)
    {
    }
    /**
     * Show percent or not
     *
     * @param	int		$showpercent		1=Show percent for each point, as tooltip or inline, 0=Hide percent (default)
     * @return	void
     */
    public function setShowPercent($showpercent)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Define background color of complete image
     *
     * @param	array	$bg_color		array(R,G,B) ou 'onglet' ou 'default'
     * @return	void
     */
    public function SetBgColor($bg_color = array(255, 255, 255))
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Define background color of grid
     *
     * @param	array	$bg_colorgrid		array(R,G,B) ou 'onglet' ou 'default'
     * @return	void
     */
    public function SetBgColorGrid($bg_colorgrid = array(255, 255, 255))
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Reset data color
     *
     * @return	void
     */
    public function ResetDataColor()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Get max value
     *
     * @return	int		Max value
     */
    public function GetMaxValueInData()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return min value of all data
     *
     * @return	int		Min value of all data
     */
    public function GetMinValueInData()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return max value of all data
     *
     * @return 	int		Max value of all data
     */
    public function GetCeilMaxValue()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return min value of all data
     *
     * @return 	double		Max value of all data
     */
    public function GetFloorMinValue()
    {
    }
    /**
     * Build a graph into memory using correct library  (may also be wrote on disk, depending on library used)
     *
     * @param	string	$file    	Image file name to use to save onto disk (also used as javascript unique id)
     * @param	string	$fileurl	Url path to show image if saved onto disk
     * @return	integer|null
     */
    public function draw($file, $fileurl = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Build a graph onto disk using Artichow library and return img string to it
     *
     * @param	string	$file    	Image file name to use if we save onto disk
     * @param	string	$fileurl	Url path to show image if saved onto disk
     * @return	void
     */
    private function draw_artichow($file, $fileurl)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Build a graph using JFlot library. Input when calling this method should be:
     *	$this->data  = array(array(0=>'labelxA',1=>yA),  array('labelxB',yB));
     *	$this->data  = array(array(0=>'labelxA',1=>yA1,...,n=>yAn), array('labelxB',yB1,...yBn));   // or when there is n series to show for each x
     *  $this->data  = array(array('label'=>'labelxA','data'=>yA),  array('labelxB',yB));			// Syntax deprecated
     *  $this->legend= array("Val1",...,"Valn");													// list of n series name
     *  $this->type  = array('bars',...'lines'); or array('pie')
     *  $this->mode = 'depth' ???
     *  $this->bgcolorgrid
     *  $this->datacolor
     *  $this->shownodatagraph
     *
     * @param	string	$file    	Image file name to use to save onto disk (also used as javascript unique id)
     * @param	string	$fileurl	Url path to show image if saved onto disk. Never used here.
     * @return	void
     */
    private function draw_jflot($file, $fileurl)
    {
    }
    /**
     * Output HTML string to show graph
     *
     * @param	int			$shownographyet 	Show graph to say there is not enough data
     * @return	string							HTML string to show graph
     */
    public function show($shownographyet = 0)
    {
    }
    /**
     * getDefaultGraphSizeForStats
     *
     * @param	string	$direction		'width' or 'height'
     * @param	string	$defaultsize	Value we want as default size
     * @return	int						Value of width or height to use by default
     */
    public static function getDefaultGraphSizeForStats($direction, $defaultsize = '')
    {
    }
}