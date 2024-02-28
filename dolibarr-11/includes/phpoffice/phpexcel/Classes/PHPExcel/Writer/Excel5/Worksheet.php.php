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
 * @package    PHPExcel_Writer_Excel5
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    ##VERSION##, ##DATE##
 */
// Original file header of PEAR::Spreadsheet_Excel_Writer_Worksheet (used as the base for this class):
// -----------------------------------------------------------------------------------------
// /*
// *  Module written/ported by Xavier Noguer <xnoguer@rezebra.com>
// *
// *  The majority of this is _NOT_ my code.  I simply ported it from the
// *  PERL Spreadsheet::WriteExcel module.
// *
// *  The author of the Spreadsheet::WriteExcel module is John McNamara
// *  <jmcnamara@cpan.org>
// *
// *  I _DO_ maintain this code, and John McNamara has nothing to do with the
// *  porting of this code to PHP.  Any questions directly related to this
// *  class library should be directed to me.
// *
// *  License Information:
// *
// *    Spreadsheet_Excel_Writer:  A library for generating Excel Spreadsheets
// *    Copyright (c) 2002-2003 Xavier Noguer xnoguer@rezebra.com
// *
// *    This library is free software; you can redistribute it and/or
// *    modify it under the terms of the GNU Lesser General Public
// *    License as published by the Free Software Foundation; either
// *    version 2.1 of the License, or (at your option) any later version.
// *
// *    This library is distributed in the hope that it will be useful,
// *    but WITHOUT ANY WARRANTY; without even the implied warranty of
// *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
// *    Lesser General Public License for more details.
// *
// *    You should have received a copy of the GNU Lesser General Public
// *    License along with this library; if not, write to the Free Software
// *    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
// */
/**
 * PHPExcel_Writer_Excel5_Worksheet
 *
 * @category   PHPExcel
 * @package    PHPExcel_Writer_Excel5
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Writer_Excel5_Worksheet extends \PHPExcel_Writer_Excel5_BIFFwriter
{
    /**
     * Formula parser
     *
     * @var PHPExcel_Writer_Excel5_Parser
     */
    private $_parser;
    /**
     * Maximum number of characters for a string (LABEL record in BIFF5)
     * @var integer
     */
    public $_xls_strmax;
    /**
     * Array containing format information for columns
     * @var array
     */
    public $_colinfo;
    /**
     * Array containing the selected area for the worksheet
     * @var array
     */
    public $_selection;
    /**
     * The active pane for the worksheet
     * @var integer
     */
    public $_active_pane;
    /**
     * Whether to use outline.
     * @var integer
     */
    public $_outline_on;
    /**
     * Auto outline styles.
     * @var bool
     */
    public $_outline_style;
    /**
     * Whether to have outline summary below.
     * @var bool
     */
    public $_outline_below;
    /**
     * Whether to have outline summary at the right.
     * @var bool
     */
    public $_outline_right;
    /**
     * Reference to the total number of strings in the workbook
     * @var integer
     */
    public $_str_total;
    /**
     * Reference to the number of unique strings in the workbook
     * @var integer
     */
    public $_str_unique;
    /**
     * Reference to the array containing all the unique strings in the workbook
     * @var array
     */
    public $_str_table;
    /**
     * Color cache
     */
    private $_colors;
    /**
     * Index of first used row (at least 0)
     * @var int
     */
    private $_firstRowIndex;
    /**
     * Index of last used row. (no used rows means -1)
     * @var int
     */
    private $_lastRowIndex;
    /**
     * Index of first used column (at least 0)
     * @var int
     */
    private $_firstColumnIndex;
    /**
     * Index of last used column (no used columns means -1)
     * @var int
     */
    private $_lastColumnIndex;
    /**
     * Sheet object
     * @var PHPExcel_Worksheet
     */
    public $_phpSheet;
    /**
     * Count cell style Xfs
     *
     * @var int
     */
    private $_countCellStyleXfs;
    /**
     * Escher object corresponding to MSODRAWING
     *
     * @var PHPExcel_Shared_Escher
     */
    private $_escher;
    /**
     * Array of font hashes associated to FONT records index
     *
     * @var array
     */
    public $_fntHashIndex;
    /**
     * Constructor
     *
     * @param int		&$str_total		Total number of strings
     * @param int		&$str_unique	Total number of unique strings
     * @param array		&$str_table		String Table
     * @param array		&$colors		Colour Table
     * @param mixed		$parser			The formula parser created for the Workbook
     * @param boolean	$preCalculateFormulas	Flag indicating whether formulas should be calculated or just written
     * @param string	$phpSheet		The worksheet to write
     * @param PHPExcel_Worksheet $phpSheet
     */
    public function __construct(&$str_total, &$str_unique, &$str_table, &$colors, $parser, $preCalculateFormulas, $phpSheet)
    {
    }
    /**
     * Add data to the beginning of the workbook (note the reverse order)
     * and to the end of the workbook.
     *
     * @access public
     * @see PHPExcel_Writer_Excel5_Workbook::storeWorkbook()
     */
    function close()
    {
    }
    /**
     * Write a cell range address in BIFF8
     * always fixed range
     * See section 2.5.14 in OpenOffice.org's Documentation of the Microsoft Excel File Format
     *
     * @param string $range E.g. 'A1' or 'A1:B6'
     * @return string Binary data
     */
    private function _writeBIFF8CellRangeAddressFixed($range = 'A1')
    {
    }
    /**
     * Retrieves data from memory in one chunk, or from disk in $buffer
     * sized chunks.
     *
     * @return string The data
     */
    function getData()
    {
    }
    /**
     * Set the option to print the row and column headers on the printed page.
     *
     * @access public
     * @param integer $print Whether to print the headers or not. Defaults to 1 (print).
     */
    function printRowColHeaders($print = 1)
    {
    }
    /**
     * This method sets the properties for outlining and grouping. The defaults
     * correspond to Excel's defaults.
     *
     * @param bool $visible
     * @param bool $symbols_below
     * @param bool $symbols_right
     * @param bool $auto_style
     */
    function setOutline($visible = \true, $symbols_below = \true, $symbols_right = \true, $auto_style = \false)
    {
    }
    /**
     * Write a double to the specified row and column (zero indexed).
     * An integer can be written as a double. Excel will display an
     * integer. $format is optional.
     *
     * Returns  0 : normal termination
     *		 -2 : row or column out of range
     *
     * @param integer $row	Zero indexed row
     * @param integer $col	Zero indexed column
     * @param float   $num	The number to write
     * @param mixed   $xfIndex The optional XF format
     * @return integer
     */
    private function _writeNumber($row, $col, $num, $xfIndex)
    {
    }
    /**
     * Write a LABELSST record or a LABEL record. Which one depends on BIFF version
     *
     * @param int $row Row index (0-based)
     * @param int $col Column index (0-based)
     * @param string $str The string
     * @param int $xfIndex Index to XF record
     */
    private function _writeString($row, $col, $str, $xfIndex)
    {
    }
    /**
     * Write a LABELSST record or a LABEL record. Which one depends on BIFF version
     * It differs from _writeString by the writing of rich text strings.
     * @param int $row Row index (0-based)
     * @param int $col Column index (0-based)
     * @param string $str The string
     * @param mixed   $xfIndex The XF format index for the cell
     * @param array $arrcRun Index to Font record and characters beginning
     */
    private function _writeRichTextString($row, $col, $str, $xfIndex, $arrcRun)
    {
    }
    /**
     * Write a string to the specified row and column (zero indexed).
     * NOTE: there is an Excel 5 defined limit of 255 characters.
     * $format is optional.
     * Returns  0 : normal termination
     *		 -2 : row or column out of range
     *		 -3 : long string truncated to 255 chars
     *
     * @access public
     * @param integer $row	Zero indexed row
     * @param integer $col	Zero indexed column
     * @param string  $str	The string to write
     * @param mixed   $xfIndex The XF format index for the cell
     * @return integer
     */
    private function _writeLabel($row, $col, $str, $xfIndex)
    {
    }
    /**
     * Write a string to the specified row and column (zero indexed).
     * This is the BIFF8 version (no 255 chars limit).
     * $format is optional.
     * Returns  0 : normal termination
     *		 -2 : row or column out of range
     *		 -3 : long string truncated to 255 chars
     *
     * @access public
     * @param integer $row	Zero indexed row
     * @param integer $col	Zero indexed column
     * @param string  $str	The string to write
     * @param mixed   $xfIndex The XF format index for the cell
     * @return integer
     */
    private function _writeLabelSst($row, $col, $str, $xfIndex)
    {
    }
    /**
     * Writes a note associated with the cell given by the row and column.
     * NOTE records don't have a length limit.
     *
     * @param integer $row	Zero indexed row
     * @param integer $col	Zero indexed column
     * @param string  $note   The note to write
     */
    private function _writeNote($row, $col, $note)
    {
    }
    /**
     * Write a blank cell to the specified row and column (zero indexed).
     * A blank cell is used to specify formatting without adding a string
     * or a number.
     *
     * A blank cell without a format serves no purpose. Therefore, we don't write
     * a BLANK record unless a format is specified.
     *
     * Returns  0 : normal termination (including no format)
     *		 -1 : insufficient number of arguments
     *		 -2 : row or column out of range
     *
     * @param integer $row	Zero indexed row
     * @param integer $col	Zero indexed column
     * @param mixed   $xfIndex The XF format index
     */
    function _writeBlank($row, $col, $xfIndex)
    {
    }
    /**
     * Write a boolean or an error type to the specified row and column (zero indexed)
     *
     * @param int $row Row index (0-based)
     * @param int $col Column index (0-based)
     * @param int $value
     * @param boolean $isError Error or Boolean?
     * @param int $xfIndex
     */
    private function _writeBoolErr($row, $col, $value, $isError, $xfIndex)
    {
    }
    /**
     * Write a formula to the specified row and column (zero indexed).
     * The textual representation of the formula is passed to the parser in
     * Parser.php which returns a packed binary string.
     *
     * Returns  0 : normal termination
     *		 -1 : formula errors (bad formula)
     *		 -2 : row or column out of range
     *
     * @param integer $row	 Zero indexed row
     * @param integer $col	 Zero indexed column
     * @param string  $formula The formula text string
     * @param mixed   $xfIndex  The XF format index
     * @param mixed   $calculatedValue  Calculated value
     * @return integer
     */
    private function _writeFormula($row, $col, $formula, $xfIndex, $calculatedValue)
    {
    }
    /**
     * Write a STRING record. This
     *
     * @param string $stringValue
     */
    private function _writeStringRecord($stringValue)
    {
    }
    /**
     * Write a hyperlink.
     * This is comprised of two elements: the visible label and
     * the invisible link. The visible label is the same as the link unless an
     * alternative string is specified. The label is written using the
     * _writeString() method. Therefore the 255 characters string limit applies.
     * $string and $format are optional.
     *
     * The hyperlink can be to a http, ftp, mail, internal sheet (not yet), or external
     * directory url.
     *
     * Returns  0 : normal termination
     *		 -2 : row or column out of range
     *		 -3 : long string truncated to 255 chars
     *
     * @param integer $row	Row
     * @param integer $col	Column
     * @param string  $url	URL string
     * @return integer
     */
    private function _writeUrl($row, $col, $url)
    {
    }
    /**
     * This is the more general form of _writeUrl(). It allows a hyperlink to be
     * written to a range of cells. This function also decides the type of hyperlink
     * to be written. These are either, Web (http, ftp, mailto), Internal
     * (Sheet1!A1) or external ('c:\temp\foo.xls#Sheet1!A1').
     *
     * @access private
     * @see _writeUrl()
     * @param integer $row1   Start row
     * @param integer $col1   Start column
     * @param integer $row2   End row
     * @param integer $col2   End column
     * @param string  $url	URL string
     * @return integer
     */
    function _writeUrlRange($row1, $col1, $row2, $col2, $url)
    {
    }
    /**
     * Used to write http, ftp and mailto hyperlinks.
     * The link type ($options) is 0x03 is the same as absolute dir ref without
     * sheet. However it is differentiated by the $unknown2 data stream.
     *
     * @access private
     * @see _writeUrl()
     * @param integer $row1   Start row
     * @param integer $col1   Start column
     * @param integer $row2   End row
     * @param integer $col2   End column
     * @param string  $url	URL string
     * @return integer
     */
    function _writeUrlWeb($row1, $col1, $row2, $col2, $url)
    {
    }
    /**
     * Used to write internal reference hyperlinks such as "Sheet1!A1".
     *
     * @access private
     * @see _writeUrl()
     * @param integer $row1   Start row
     * @param integer $col1   Start column
     * @param integer $row2   End row
     * @param integer $col2   End column
     * @param string  $url	URL string
     * @return integer
     */
    function _writeUrlInternal($row1, $col1, $row2, $col2, $url)
    {
    }
    /**
     * Write links to external directory names such as 'c:\foo.xls',
     * c:\foo.xls#Sheet1!A1', '../../foo.xls'. and '../../foo.xls#Sheet1!A1'.
     *
     * Note: Excel writes some relative links with the $dir_long string. We ignore
     * these cases for the sake of simpler code.
     *
     * @access private
     * @see _writeUrl()
     * @param integer $row1   Start row
     * @param integer $col1   Start column
     * @param integer $row2   End row
     * @param integer $col2   End column
     * @param string  $url	URL string
     * @return integer
     */
    function _writeUrlExternal($row1, $col1, $row2, $col2, $url)
    {
    }
    /**
     * This method is used to set the height and format for a row.
     *
     * @param integer $row	The row to set
     * @param integer $height Height we are giving to the row.
     *						Use null to set XF without setting height
     * @param integer $xfIndex  The optional cell style Xf index to apply to the columns
     * @param bool	$hidden The optional hidden attribute
     * @param integer $level  The optional outline level for row, in range [0,7]
     */
    private function _writeRow($row, $height, $xfIndex, $hidden = \false, $level = 0)
    {
    }
    /**
     * Writes Excel DIMENSIONS to define the area in which there is data.
     */
    private function _writeDimensions()
    {
    }
    /**
     * Write BIFF record Window2.
     */
    private function _writeWindow2()
    {
    }
    /**
     * Write BIFF record DEFAULTROWHEIGHT.
     */
    private function _writeDefaultRowHeight()
    {
    }
    /**
     * Write BIFF record DEFCOLWIDTH if COLINFO records are in use.
     */
    private function _writeDefcol()
    {
    }
    /**
     * Write BIFF record COLINFO to define column widths
     *
     * Note: The SDK says the record length is 0x0B but Excel writes a 0x0C
     * length record.
     *
     * @param array $col_array This is the only parameter received and is composed of the following:
     *				0 => First formatted column,
     *				1 => Last formatted column,
     *				2 => Col width (8.43 is Excel default),
     *				3 => The optional XF format of the column,
     *				4 => Option flags.
     *				5 => Optional outline level
     */
    private function _writeColinfo($col_array)
    {
    }
    /**
     * Write BIFF record SELECTION.
     */
    private function _writeSelection()
    {
    }
    /**
     * Store the MERGEDCELLS records for all ranges of merged cells
     */
    private function _writeMergedCells()
    {
    }
    /**
     * Write SHEETLAYOUT record
     */
    private function _writeSheetLayout()
    {
    }
    /**
     * Write SHEETPROTECTION
     */
    private function _writeSheetProtection()
    {
    }
    /**
     * Write BIFF record RANGEPROTECTION
     *
     * Openoffice.org's Documentaion of the Microsoft Excel File Format uses term RANGEPROTECTION for these records
     * Microsoft Office Excel 97-2007 Binary File Format Specification uses term FEAT for these records
     */
    private function _writeRangeProtection()
    {
    }
    /**
     * Write BIFF record EXTERNCOUNT to indicate the number of external sheet
     * references in a worksheet.
     *
     * Excel only stores references to external sheets that are used in formulas.
     * For simplicity we store references to all the sheets in the workbook
     * regardless of whether they are used or not. This reduces the overall
     * complexity and eliminates the need for a two way dialogue between the formula
     * parser the worksheet objects.
     *
     * @param integer $count The number of external sheet references in this worksheet
     */
    private function _writeExterncount($count)
    {
    }
    /**
     * Writes the Excel BIFF EXTERNSHEET record. These references are used by
     * formulas. A formula references a sheet name via an index. Since we store a
     * reference to all of the external worksheets the EXTERNSHEET index is the same
     * as the worksheet index.
     *
     * @param string $sheetname The name of a external worksheet
     */
    private function _writeExternsheet($sheetname)
    {
    }
    /**
     * Writes the Excel BIFF PANE record.
     * The panes can either be frozen or thawed (unfrozen).
     * Frozen panes are specified in terms of an integer number of rows and columns.
     * Thawed panes are specified in terms of Excel's units for rows and columns.
     */
    private function _writePanes()
    {
    }
    /**
     * Store the page setup SETUP BIFF record.
     */
    private function _writeSetup()
    {
    }
    /**
     * Store the header caption BIFF record.
     */
    private function _writeHeader()
    {
    }
    /**
     * Store the footer caption BIFF record.
     */
    private function _writeFooter()
    {
    }
    /**
     * Store the horizontal centering HCENTER BIFF record.
     *
     * @access private
     */
    private function _writeHcenter()
    {
    }
    /**
     * Store the vertical centering VCENTER BIFF record.
     */
    private function _writeVcenter()
    {
    }
    /**
     * Store the LEFTMARGIN BIFF record.
     */
    private function _writeMarginLeft()
    {
    }
    /**
     * Store the RIGHTMARGIN BIFF record.
     */
    private function _writeMarginRight()
    {
    }
    /**
     * Store the TOPMARGIN BIFF record.
     */
    private function _writeMarginTop()
    {
    }
    /**
     * Store the BOTTOMMARGIN BIFF record.
     */
    private function _writeMarginBottom()
    {
    }
    /**
     * Write the PRINTHEADERS BIFF record.
     */
    private function _writePrintHeaders()
    {
    }
    /**
     * Write the PRINTGRIDLINES BIFF record. Must be used in conjunction with the
     * GRIDSET record.
     */
    private function _writePrintGridlines()
    {
    }
    /**
     * Write the GRIDSET BIFF record. Must be used in conjunction with the
     * PRINTGRIDLINES record.
     */
    private function _writeGridset()
    {
    }
    /**
     * Write the AUTOFILTERINFO BIFF record. This is used to configure the number of autofilter select used in the sheet.
     */
    private function _writeAutoFilterInfo()
    {
    }
    /**
     * Write the GUTS BIFF record. This is used to configure the gutter margins
     * where Excel outline symbols are displayed. The visibility of the gutters is
     * controlled by a flag in WSBOOL.
     *
     * @see _writeWsbool()
     */
    private function _writeGuts()
    {
    }
    /**
     * Write the WSBOOL BIFF record, mainly for fit-to-page. Used in conjunction
     * with the SETUP record.
     */
    private function _writeWsbool()
    {
    }
    /**
     * Write the HORIZONTALPAGEBREAKS and VERTICALPAGEBREAKS BIFF records.
     */
    private function _writeBreaks()
    {
    }
    /**
     * Set the Biff PROTECT record to indicate that the worksheet is protected.
     */
    private function _writeProtect()
    {
    }
    /**
     * Write SCENPROTECT
     */
    private function _writeScenProtect()
    {
    }
    /**
     * Write OBJECTPROTECT
     */
    private function _writeObjectProtect()
    {
    }
    /**
     * Write the worksheet PASSWORD record.
     */
    private function _writePassword()
    {
    }
    /**
     * Insert a 24bit bitmap image in a worksheet.
     *
     * @access public
     * @param integer $row	 The row we are going to insert the bitmap into
     * @param integer $col	 The column we are going to insert the bitmap into
     * @param mixed   $bitmap  The bitmap filename or GD-image resource
     * @param integer $x	   The horizontal position (offset) of the image inside the cell.
     * @param integer $y	   The vertical position (offset) of the image inside the cell.
     * @param float   $scale_x The horizontal scale
     * @param float   $scale_y The vertical scale
     */
    function insertBitmap($row, $col, $bitmap, $x = 0, $y = 0, $scale_x = 1, $scale_y = 1)
    {
    }
    /**
     * Calculate the vertices that define the position of the image as required by
     * the OBJ record.
     *
     *		 +------------+------------+
     *		 |	 A	  |	  B	 |
     *   +-----+------------+------------+
     *   |	 |(x1,y1)	 |			|
     *   |  1  |(A1)._______|______	  |
     *   |	 |	|			  |	 |
     *   |	 |	|			  |	 |
     *   +-----+----|	BITMAP	|-----+
     *   |	 |	|			  |	 |
     *   |  2  |	|______________.	 |
     *   |	 |			|		(B2)|
     *   |	 |			|	 (x2,y2)|
     *   +---- +------------+------------+
     *
     * Example of a bitmap that covers some of the area from cell A1 to cell B2.
     *
     * Based on the width and height of the bitmap we need to calculate 8 vars:
     *	 $col_start, $row_start, $col_end, $row_end, $x1, $y1, $x2, $y2.
     * The width and height of the cells are also variable and have to be taken into
     * account.
     * The values of $col_start and $row_start are passed in from the calling
     * function. The values of $col_end and $row_end are calculated by subtracting
     * the width and height of the bitmap from the width and height of the
     * underlying cells.
     * The vertices are expressed as a percentage of the underlying cell width as
     * follows (rhs values are in pixels):
     *
     *	   x1 = X / W *1024
     *	   y1 = Y / H *256
     *	   x2 = (X-1) / W *1024
     *	   y2 = (Y-1) / H *256
     *
     *	   Where:  X is distance from the left side of the underlying cell
     *			   Y is distance from the top of the underlying cell
     *			   W is the width of the cell
     *			   H is the height of the cell
     * The SDK incorrectly states that the height should be expressed as a
     *		percentage of 1024.
     *
     * @access private
     * @param integer $col_start Col containing upper left corner of object
     * @param integer $row_start Row containing top left corner of object
     * @param integer $x1		Distance to left side of object
     * @param integer $y1		Distance to top of object
     * @param integer $width	 Width of image frame
     * @param integer $height	Height of image frame
     */
    function _positionImage($col_start, $row_start, $x1, $y1, $width, $height)
    {
    }
    /**
     * Store the OBJ record that precedes an IMDATA record. This could be generalise
     * to support other Excel objects.
     *
     * @param integer $colL Column containing upper left corner of object
     * @param integer $dxL  Distance from left side of cell
     * @param integer $rwT  Row containing top left corner of object
     * @param integer $dyT  Distance from top of cell
     * @param integer $colR Column containing lower right corner of object
     * @param integer $dxR  Distance from right of cell
     * @param integer $rwB  Row containing bottom right corner of object
     * @param integer $dyB  Distance from bottom of cell
     */
    private function _writeObjPicture($colL, $dxL, $rwT, $dyT, $colR, $dxR, $rwB, $dyB)
    {
    }
    /**
     * Convert a GD-image into the internal format.
     *
     * @access private
     * @param resource $image The image to process
     * @return array Array with data and properties of the bitmap
     */
    function _processBitmapGd($image)
    {
    }
    /**
     * Convert a 24 bit bitmap into the modified internal format used by Windows.
     * This is described in BITMAPCOREHEADER and BITMAPCOREINFO structures in the
     * MSDN library.
     *
     * @access private
     * @param string $bitmap The bitmap to process
     * @return array Array with data and properties of the bitmap
     */
    function _processBitmap($bitmap)
    {
    }
    /**
     * Store the window zoom factor. This should be a reduced fraction but for
     * simplicity we will store all fractions with a numerator of 100.
     */
    private function _writeZoom()
    {
    }
    /**
     * Get Escher object
     *
     * @return PHPExcel_Shared_Escher
     */
    public function getEscher()
    {
    }
    /**
     * Set Escher object
     *
     * @param PHPExcel_Shared_Escher $pValue
     */
    public function setEscher(\PHPExcel_Shared_Escher $pValue = \null)
    {
    }
    /**
     * Write MSODRAWING record
     */
    private function _writeMsoDrawing()
    {
    }
    /**
     * Store the DATAVALIDATIONS and DATAVALIDATION records.
     */
    private function _writeDataValidity()
    {
    }
    /**
     * Map Error code
     *
     * @param string $errorCode
     * @return int
     */
    private static function _mapErrorCode($errorCode)
    {
    }
    /**
     * Write PLV Record
     */
    private function _writePageLayoutView()
    {
    }
    /**
     * Write CFRule Record
     * @param PHPExcel_Style_Conditional $conditional
     */
    private function _writeCFRule(\PHPExcel_Style_Conditional $conditional)
    {
    }
    /**
     * Write CFHeader record
     */
    private function _writeCFHeader()
    {
    }
}