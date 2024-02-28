<?php

/**
 * PHPExcel
 *
 * Copyright (c) 2006 - 2014 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package	PHPExcel_Writer_HTML
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license	http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version	##VERSION##, ##DATE##
 */
/**
 * PHPExcel_Writer_HTML
 *
 * @category   PHPExcel
 * @package	PHPExcel_Writer_HTML
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Writer_HTML extends \PHPExcel_Writer_Abstract implements \PHPExcel_Writer_IWriter
{
    /**
     * PHPExcel object
     *
     * @var PHPExcel
     */
    protected $_phpExcel;
    /**
     * Sheet index to write
     *
     * @var int
     */
    private $_sheetIndex = 0;
    /**
     * Images root
     *
     * @var string
     */
    private $_imagesRoot = '.';
    /**
     * embed images, or link to images
     *
     * @var boolean
     */
    private $_embedImages = \FALSE;
    /**
     * Use inline CSS?
     *
     * @var boolean
     */
    private $_useInlineCss = \false;
    /**
     * Array of CSS styles
     *
     * @var array
     */
    private $_cssStyles = \null;
    /**
     * Array of column widths in points
     *
     * @var array
     */
    private $_columnWidths = \null;
    /**
     * Default font
     *
     * @var PHPExcel_Style_Font
     */
    private $_defaultFont;
    /**
     * Flag whether spans have been calculated
     *
     * @var boolean
     */
    private $_spansAreCalculated = \false;
    /**
     * Excel cells that should not be written as HTML cells
     *
     * @var array
     */
    private $_isSpannedCell = array();
    /**
     * Excel cells that are upper-left corner in a cell merge
     *
     * @var array
     */
    private $_isBaseCell = array();
    /**
     * Excel rows that should not be written as HTML rows
     *
     * @var array
     */
    private $_isSpannedRow = array();
    /**
     * Is the current writer creating PDF?
     *
     * @var boolean
     */
    protected $_isPdf = \false;
    /**
     * Generate the Navigation block
     *
     * @var boolean
     */
    private $_generateSheetNavigationBlock = \true;
    /**
     * Create a new PHPExcel_Writer_HTML
     *
     * @param	PHPExcel	$phpExcel	PHPExcel object
     */
    public function __construct(\PHPExcel $phpExcel)
    {
    }
    /**
     * Save PHPExcel to file
     *
     * @param	string		$pFilename
     * @throws	PHPExcel_Writer_Exception
     */
    public function save($pFilename = \null)
    {
    }
    /**
     * Map VAlign
     *
     * @param	string		$vAlign		Vertical alignment
     * @return string
     */
    private function _mapVAlign($vAlign)
    {
    }
    /**
     * Map HAlign
     *
     * @param	string		$hAlign		Horizontal alignment
     * @return string|false
     */
    private function _mapHAlign($hAlign)
    {
    }
    /**
     * Map border style
     *
     * @param	int		$borderStyle		Sheet index
     * @return	string
     */
    private function _mapBorderStyle($borderStyle)
    {
    }
    /**
     * Get sheet index
     *
     * @return int
     */
    public function getSheetIndex()
    {
    }
    /**
     * Set sheet index
     *
     * @param	int		$pValue		Sheet index
     * @return PHPExcel_Writer_HTML
     */
    public function setSheetIndex($pValue = 0)
    {
    }
    /**
     * Get sheet index
     *
     * @return boolean
     */
    public function getGenerateSheetNavigationBlock()
    {
    }
    /**
     * Set sheet index
     *
     * @param	boolean		$pValue		Flag indicating whether the sheet navigation block should be generated or not
     * @return PHPExcel_Writer_HTML
     */
    public function setGenerateSheetNavigationBlock($pValue = \true)
    {
    }
    /**
     * Write all sheets (resets sheetIndex to NULL)
     */
    public function writeAllSheets()
    {
    }
    /**
     * Generate HTML header
     *
     * @param	boolean		$pIncludeStyles		Include styles?
     * @return	string
     * @throws PHPExcel_Writer_Exception
     */
    public function generateHTMLHeader($pIncludeStyles = \false)
    {
    }
    /**
     * Generate sheet data
     *
     * @return	string
     * @throws PHPExcel_Writer_Exception
     */
    public function generateSheetData()
    {
    }
    /**
     * Generate sheet tabs
     *
     * @return	string
     * @throws PHPExcel_Writer_Exception
     */
    public function generateNavigation()
    {
    }
    private function _extendRowsForChartsAndImages(\PHPExcel_Worksheet $pSheet, $row)
    {
    }
    /**
     * Generate image tag in cell
     *
     * @param	PHPExcel_Worksheet	$pSheet			PHPExcel_Worksheet
     * @param	string				$coordinates	Cell coordinates
     * @return	string
     * @throws	PHPExcel_Writer_Exception
     */
    private function _writeImageInCell(\PHPExcel_Worksheet $pSheet, $coordinates)
    {
    }
    /**
     * Generate chart tag in cell
     *
     * @param	PHPExcel_Worksheet	$pSheet			PHPExcel_Worksheet
     * @param	string				$coordinates	Cell coordinates
     * @return	string
     * @throws	PHPExcel_Writer_Exception
     */
    private function _writeChartInCell(\PHPExcel_Worksheet $pSheet, $coordinates)
    {
    }
    /**
     * Generate CSS styles
     *
     * @param	boolean	$generateSurroundingHTML	Generate surrounding HTML tags? (&lt;style&gt; and &lt;/style&gt;)
     * @return	string
     * @throws	PHPExcel_Writer_Exception
     */
    public function generateStyles($generateSurroundingHTML = \true)
    {
    }
    /**
     * Build CSS styles
     *
     * @param	boolean	$generateSurroundingHTML	Generate surrounding HTML style? (html { })
     * @return	array
     * @throws	PHPExcel_Writer_Exception
     */
    public function buildCSS($generateSurroundingHTML = \true)
    {
    }
    /**
     * Create CSS style
     *
     * @param	PHPExcel_Style		$pStyle			PHPExcel_Style
     * @return	array
     */
    private function _createCSSStyle(\PHPExcel_Style $pStyle)
    {
    }
    /**
     * Create CSS style (PHPExcel_Style_Alignment)
     *
     * @param	PHPExcel_Style_Alignment		$pStyle			PHPExcel_Style_Alignment
     * @return	array
     */
    private function _createCSSStyleAlignment(\PHPExcel_Style_Alignment $pStyle)
    {
    }
    /**
     * Create CSS style (PHPExcel_Style_Font)
     *
     * @param	PHPExcel_Style_Font		$pStyle			PHPExcel_Style_Font
     * @return	array
     */
    private function _createCSSStyleFont(\PHPExcel_Style_Font $pStyle)
    {
    }
    /**
     * Create CSS style (PHPExcel_Style_Borders)
     *
     * @param	PHPExcel_Style_Borders		$pStyle			PHPExcel_Style_Borders
     * @return	array
     */
    private function _createCSSStyleBorders(\PHPExcel_Style_Borders $pStyle)
    {
    }
    /**
     * Create CSS style (PHPExcel_Style_Border)
     *
     * @param	PHPExcel_Style_Border		$pStyle			PHPExcel_Style_Border
     * @return	string
     */
    private function _createCSSStyleBorder(\PHPExcel_Style_Border $pStyle)
    {
    }
    /**
     * Create CSS style (PHPExcel_Style_Fill)
     *
     * @param	PHPExcel_Style_Fill		$pStyle			PHPExcel_Style_Fill
     * @return	array
     */
    private function _createCSSStyleFill(\PHPExcel_Style_Fill $pStyle)
    {
    }
    /**
     * Generate HTML footer
     */
    public function generateHTMLFooter()
    {
    }
    /**
     * Generate table header
     *
     * @param	PHPExcel_Worksheet	$pSheet		The worksheet for the table we are writing
     * @return	string
     * @throws	PHPExcel_Writer_Exception
     */
    private function _generateTableHeader($pSheet)
    {
    }
    /**
     * Generate table footer
     *
     * @throws	PHPExcel_Writer_Exception
     */
    private function _generateTableFooter()
    {
    }
    /**
     * Generate row
     *
     * @param	PHPExcel_Worksheet	$pSheet			PHPExcel_Worksheet
     * @param	array				$pValues		Array containing cells in a row
     * @param	int					$pRow			Row number (0-based)
     * @return	string
     * @throws	PHPExcel_Writer_Exception
     */
    private function _generateRow(\PHPExcel_Worksheet $pSheet, $pValues = \null, $pRow = 0, $cellType = 'td')
    {
    }
    /**
     * Takes array where of CSS properties / values and converts to CSS string
     *
     * @param array
     * @return string
     */
    private function _assembleCSS($pValue = array())
    {
    }
    /**
     * Get images root
     *
     * @return string
     */
    public function getImagesRoot()
    {
    }
    /**
     * Set images root
     *
     * @param string $pValue
     * @return PHPExcel_Writer_HTML
     */
    public function setImagesRoot($pValue = '.')
    {
    }
    /**
     * Get embed images
     *
     * @return boolean
     */
    public function getEmbedImages()
    {
    }
    /**
     * Set embed images
     *
     * @param boolean $pValue
     * @return PHPExcel_Writer_HTML
     */
    public function setEmbedImages($pValue = '.')
    {
    }
    /**
     * Get use inline CSS?
     *
     * @return boolean
     */
    public function getUseInlineCss()
    {
    }
    /**
     * Set use inline CSS?
     *
     * @param boolean $pValue
     * @return PHPExcel_Writer_HTML
     */
    public function setUseInlineCss($pValue = \false)
    {
    }
    /**
     * Add color to formatted string as inline style
     *
     * @param string $pValue Plain formatted value without color
     * @param string $pFormat Format code
     * @return string
     */
    public function formatColor($pValue, $pFormat)
    {
    }
    /**
     * Calculate information about HTML colspan and rowspan which is not always the same as Excel's
     */
    private function _calculateSpans()
    {
    }
    private function _setMargins(\PHPExcel_Worksheet $pSheet)
    {
    }
}