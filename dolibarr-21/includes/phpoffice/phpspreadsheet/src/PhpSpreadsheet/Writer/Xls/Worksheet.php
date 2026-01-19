<?php

namespace PhpOffice\PhpSpreadsheet\Writer\Xls;

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
// *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
// *    Lesser General Public License for more details.
// *
// *    You should have received a copy of the GNU Lesser General Public
// *    License along with this library; if not, write to the Free Software
// *    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
// */
class Worksheet extends \PhpOffice\PhpSpreadsheet\Writer\Xls\BIFFwriter
{
    /**
     * Formula parser.
     *
     * @var \PhpOffice\PhpSpreadsheet\Writer\Xls\Parser
     */
    private $parser;
    /**
     * Maximum number of characters for a string (LABEL record in BIFF5).
     *
     * @var int
     */
    private $xlsStringMaxLength;
    /**
     * Array containing format information for columns.
     *
     * @var array
     */
    private $columnInfo;
    /**
     * Array containing the selected area for the worksheet.
     *
     * @var array
     */
    private $selection;
    /**
     * The active pane for the worksheet.
     *
     * @var int
     */
    private $activePane;
    /**
     * Whether to use outline.
     *
     * @var int
     */
    private $outlineOn;
    /**
     * Auto outline styles.
     *
     * @var bool
     */
    private $outlineStyle;
    /**
     * Whether to have outline summary below.
     *
     * @var bool
     */
    private $outlineBelow;
    /**
     * Whether to have outline summary at the right.
     *
     * @var bool
     */
    private $outlineRight;
    /**
     * Reference to the total number of strings in the workbook.
     *
     * @var int
     */
    private $stringTotal;
    /**
     * Reference to the number of unique strings in the workbook.
     *
     * @var int
     */
    private $stringUnique;
    /**
     * Reference to the array containing all the unique strings in the workbook.
     *
     * @var array
     */
    private $stringTable;
    /**
     * Color cache.
     */
    private $colors;
    /**
     * Index of first used row (at least 0).
     *
     * @var int
     */
    private $firstRowIndex;
    /**
     * Index of last used row. (no used rows means -1).
     *
     * @var int
     */
    private $lastRowIndex;
    /**
     * Index of first used column (at least 0).
     *
     * @var int
     */
    private $firstColumnIndex;
    /**
     * Index of last used column (no used columns means -1).
     *
     * @var int
     */
    private $lastColumnIndex;
    /**
     * Sheet object.
     *
     * @var \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet
     */
    public $phpSheet;
    /**
     * Count cell style Xfs.
     *
     * @var int
     */
    private $countCellStyleXfs;
    /**
     * Escher object corresponding to MSODRAWING.
     *
     * @var \PhpOffice\PhpSpreadsheet\Shared\Escher
     */
    private $escher;
    /**
     * Array of font hashes associated to FONT records index.
     *
     * @var array
     */
    public $fontHashIndex;
    /**
     * @var bool
     */
    private $preCalculateFormulas;
    /**
     * @var int
     */
    private $printHeaders;
    /**
     * Constructor.
     *
     * @param int $str_total Total number of strings
     * @param int $str_unique Total number of unique strings
     * @param array &$str_table String Table
     * @param array &$colors Colour Table
     * @param Parser $parser The formula parser created for the Workbook
     * @param bool $preCalculateFormulas Flag indicating whether formulas should be calculated or just written
     * @param \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $phpSheet The worksheet to write
     */
    public function __construct(&$str_total, &$str_unique, &$str_table, &$colors, \PhpOffice\PhpSpreadsheet\Writer\Xls\Parser $parser, $preCalculateFormulas, \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $phpSheet)
    {
    }
    /**
     * Add data to the beginning of the workbook (note the reverse order)
     * and to the end of the workbook.
     *
     * @see \PhpOffice\PhpSpreadsheet\Writer\Xls\Workbook::storeWorkbook()
     */
    public function close()
    {
    }
    /**
     * Write a cell range address in BIFF8
     * always fixed range
     * See section 2.5.14 in OpenOffice.org's Documentation of the Microsoft Excel File Format.
     *
     * @param string $range E.g. 'A1' or 'A1:B6'
     *
     * @return string Binary data
     */
    private function writeBIFF8CellRangeAddressFixed($range)
    {
    }
    /**
     * Retrieves data from memory in one chunk, or from disk in $buffer
     * sized chunks.
     *
     * @return string The data
     */
    public function getData()
    {
    }
    /**
     * Set the option to print the row and column headers on the printed page.
     *
     * @param int $print Whether to print the headers or not. Defaults to 1 (print).
     */
    public function printRowColHeaders($print = 1)
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
    public function setOutline($visible = true, $symbols_below = true, $symbols_right = true, $auto_style = false)
    {
    }
    /**
     * Write a double to the specified row and column (zero indexed).
     * An integer can be written as a double. Excel will display an
     * integer. $format is optional.
     *
     * Returns  0 : normal termination
     *         -2 : row or column out of range
     *
     * @param int $row Zero indexed row
     * @param int $col Zero indexed column
     * @param float $num The number to write
     * @param mixed $xfIndex The optional XF format
     *
     * @return int
     */
    private function writeNumber($row, $col, $num, $xfIndex)
    {
    }
    /**
     * Write a LABELSST record or a LABEL record. Which one depends on BIFF version.
     *
     * @param int $row Row index (0-based)
     * @param int $col Column index (0-based)
     * @param string $str The string
     * @param int $xfIndex Index to XF record
     */
    private function writeString($row, $col, $str, $xfIndex)
    {
    }
    /**
     * Write a LABELSST record or a LABEL record. Which one depends on BIFF version
     * It differs from writeString by the writing of rich text strings.
     *
     * @param int $row Row index (0-based)
     * @param int $col Column index (0-based)
     * @param string $str The string
     * @param int $xfIndex The XF format index for the cell
     * @param array $arrcRun Index to Font record and characters beginning
     */
    private function writeRichTextString($row, $col, $str, $xfIndex, $arrcRun)
    {
    }
    /**
     * Write a string to the specified row and column (zero indexed).
     * This is the BIFF8 version (no 255 chars limit).
     * $format is optional.
     *
     * @param int $row Zero indexed row
     * @param int $col Zero indexed column
     * @param string $str The string to write
     * @param mixed $xfIndex The XF format index for the cell
     */
    private function writeLabelSst($row, $col, $str, $xfIndex)
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
     *         -1 : insufficient number of arguments
     *         -2 : row or column out of range
     *
     * @param int $row Zero indexed row
     * @param int $col Zero indexed column
     * @param mixed $xfIndex The XF format index
     *
     * @return int
     */
    public function writeBlank($row, $col, $xfIndex)
    {
    }
    /**
     * Write a boolean or an error type to the specified row and column (zero indexed).
     *
     * @param int $row Row index (0-based)
     * @param int $col Column index (0-based)
     * @param int $value
     * @param bool $isError Error or Boolean?
     * @param int $xfIndex
     *
     * @return int
     */
    private function writeBoolErr($row, $col, $value, $isError, $xfIndex)
    {
    }
    const WRITE_FORMULA_NORMAL = 0;
    const WRITE_FORMULA_ERRORS = -1;
    const WRITE_FORMULA_RANGE = -2;
    const WRITE_FORMULA_EXCEPTION = -3;
    /**
     * Write a formula to the specified row and column (zero indexed).
     * The textual representation of the formula is passed to the parser in
     * Parser.php which returns a packed binary string.
     *
     * Returns  0 : WRITE_FORMULA_NORMAL  normal termination
     *         -1 : WRITE_FORMULA_ERRORS formula errors (bad formula)
     *         -2 : WRITE_FORMULA_RANGE  row or column out of range
     *         -3 : WRITE_FORMULA_EXCEPTION parse raised exception, probably due to definedname
     *
     * @param int $row Zero indexed row
     * @param int $col Zero indexed column
     * @param string $formula The formula text string
     * @param mixed $xfIndex The XF format index
     * @param mixed $calculatedValue Calculated value
     *
     * @return int
     */
    private function writeFormula($row, $col, $formula, $xfIndex, $calculatedValue)
    {
    }
    /**
     * Write a STRING record. This.
     *
     * @param string $stringValue
     */
    private function writeStringRecord($stringValue)
    {
    }
    /**
     * Write a hyperlink.
     * This is comprised of two elements: the visible label and
     * the invisible link. The visible label is the same as the link unless an
     * alternative string is specified. The label is written using the
     * writeString() method. Therefore the 255 characters string limit applies.
     * $string and $format are optional.
     *
     * The hyperlink can be to a http, ftp, mail, internal sheet (not yet), or external
     * directory url.
     *
     * Returns  0 : normal termination
     *         -2 : row or column out of range
     *         -3 : long string truncated to 255 chars
     *
     * @param int $row Row
     * @param int $col Column
     * @param string $url URL string
     *
     * @return int
     */
    private function writeUrl($row, $col, $url)
    {
    }
    /**
     * This is the more general form of writeUrl(). It allows a hyperlink to be
     * written to a range of cells. This function also decides the type of hyperlink
     * to be written. These are either, Web (http, ftp, mailto), Internal
     * (Sheet1!A1) or external ('c:\temp\foo.xls#Sheet1!A1').
     *
     * @see writeUrl()
     *
     * @param int $row1 Start row
     * @param int $col1 Start column
     * @param int $row2 End row
     * @param int $col2 End column
     * @param string $url URL string
     *
     * @return int
     */
    public function writeUrlRange($row1, $col1, $row2, $col2, $url)
    {
    }
    /**
     * Used to write http, ftp and mailto hyperlinks.
     * The link type ($options) is 0x03 is the same as absolute dir ref without
     * sheet. However it is differentiated by the $unknown2 data stream.
     *
     * @see writeUrl()
     *
     * @param int $row1 Start row
     * @param int $col1 Start column
     * @param int $row2 End row
     * @param int $col2 End column
     * @param string $url URL string
     *
     * @return int
     */
    public function writeUrlWeb($row1, $col1, $row2, $col2, $url)
    {
    }
    /**
     * Used to write internal reference hyperlinks such as "Sheet1!A1".
     *
     * @see writeUrl()
     *
     * @param int $row1 Start row
     * @param int $col1 Start column
     * @param int $row2 End row
     * @param int $col2 End column
     * @param string $url URL string
     *
     * @return int
     */
    public function writeUrlInternal($row1, $col1, $row2, $col2, $url)
    {
    }
    /**
     * Write links to external directory names such as 'c:\foo.xls',
     * c:\foo.xls#Sheet1!A1', '../../foo.xls'. and '../../foo.xls#Sheet1!A1'.
     *
     * Note: Excel writes some relative links with the $dir_long string. We ignore
     * these cases for the sake of simpler code.
     *
     * @see writeUrl()
     *
     * @param int $row1 Start row
     * @param int $col1 Start column
     * @param int $row2 End row
     * @param int $col2 End column
     * @param string $url URL string
     *
     * @return int
     */
    public function writeUrlExternal($row1, $col1, $row2, $col2, $url)
    {
    }
    /**
     * This method is used to set the height and format for a row.
     *
     * @param int $row The row to set
     * @param int $height Height we are giving to the row.
     *                        Use null to set XF without setting height
     * @param int $xfIndex The optional cell style Xf index to apply to the columns
     * @param bool $hidden The optional hidden attribute
     * @param int $level The optional outline level for row, in range [0,7]
     */
    private function writeRow($row, $height, $xfIndex, $hidden = false, $level = 0)
    {
    }
    /**
     * Writes Excel DIMENSIONS to define the area in which there is data.
     */
    private function writeDimensions()
    {
    }
    /**
     * Write BIFF record Window2.
     */
    private function writeWindow2()
    {
    }
    /**
     * Write BIFF record DEFAULTROWHEIGHT.
     */
    private function writeDefaultRowHeight()
    {
    }
    /**
     * Write BIFF record DEFCOLWIDTH if COLINFO records are in use.
     */
    private function writeDefcol()
    {
    }
    /**
     * Write BIFF record COLINFO to define column widths.
     *
     * Note: The SDK says the record length is 0x0B but Excel writes a 0x0C
     * length record.
     *
     * @param array $col_array This is the only parameter received and is composed of the following:
     *                0 => First formatted column,
     *                1 => Last formatted column,
     *                2 => Col width (8.43 is Excel default),
     *                3 => The optional XF format of the column,
     *                4 => Option flags.
     *                5 => Optional outline level
     */
    private function writeColinfo($col_array)
    {
    }
    /**
     * Write BIFF record SELECTION.
     */
    private function writeSelection()
    {
    }
    /**
     * Store the MERGEDCELLS records for all ranges of merged cells.
     */
    private function writeMergedCells()
    {
    }
    /**
     * Write SHEETLAYOUT record.
     */
    private function writeSheetLayout()
    {
    }
    /**
     * Write SHEETPROTECTION.
     */
    private function writeSheetProtection()
    {
    }
    /**
     * Write BIFF record RANGEPROTECTION.
     *
     * Openoffice.org's Documentaion of the Microsoft Excel File Format uses term RANGEPROTECTION for these records
     * Microsoft Office Excel 97-2007 Binary File Format Specification uses term FEAT for these records
     */
    private function writeRangeProtection()
    {
    }
    /**
     * Writes the Excel BIFF PANE record.
     * The panes can either be frozen or thawed (unfrozen).
     * Frozen panes are specified in terms of an integer number of rows and columns.
     * Thawed panes are specified in terms of Excel's units for rows and columns.
     */
    private function writePanes()
    {
    }
    /**
     * Store the page setup SETUP BIFF record.
     */
    private function writeSetup()
    {
    }
    /**
     * Store the header caption BIFF record.
     */
    private function writeHeader()
    {
    }
    /**
     * Store the footer caption BIFF record.
     */
    private function writeFooter()
    {
    }
    /**
     * Store the horizontal centering HCENTER BIFF record.
     */
    private function writeHcenter()
    {
    }
    /**
     * Store the vertical centering VCENTER BIFF record.
     */
    private function writeVcenter()
    {
    }
    /**
     * Store the LEFTMARGIN BIFF record.
     */
    private function writeMarginLeft()
    {
    }
    /**
     * Store the RIGHTMARGIN BIFF record.
     */
    private function writeMarginRight()
    {
    }
    /**
     * Store the TOPMARGIN BIFF record.
     */
    private function writeMarginTop()
    {
    }
    /**
     * Store the BOTTOMMARGIN BIFF record.
     */
    private function writeMarginBottom()
    {
    }
    /**
     * Write the PRINTHEADERS BIFF record.
     */
    private function writePrintHeaders()
    {
    }
    /**
     * Write the PRINTGRIDLINES BIFF record. Must be used in conjunction with the
     * GRIDSET record.
     */
    private function writePrintGridlines()
    {
    }
    /**
     * Write the GRIDSET BIFF record. Must be used in conjunction with the
     * PRINTGRIDLINES record.
     */
    private function writeGridset()
    {
    }
    /**
     * Write the AUTOFILTERINFO BIFF record. This is used to configure the number of autofilter select used in the sheet.
     */
    private function writeAutoFilterInfo()
    {
    }
    /**
     * Write the GUTS BIFF record. This is used to configure the gutter margins
     * where Excel outline symbols are displayed. The visibility of the gutters is
     * controlled by a flag in WSBOOL.
     *
     * @see writeWsbool()
     */
    private function writeGuts()
    {
    }
    /**
     * Write the WSBOOL BIFF record, mainly for fit-to-page. Used in conjunction
     * with the SETUP record.
     */
    private function writeWsbool()
    {
    }
    /**
     * Write the HORIZONTALPAGEBREAKS and VERTICALPAGEBREAKS BIFF records.
     */
    private function writeBreaks()
    {
    }
    /**
     * Set the Biff PROTECT record to indicate that the worksheet is protected.
     */
    private function writeProtect()
    {
    }
    /**
     * Write SCENPROTECT.
     */
    private function writeScenProtect()
    {
    }
    /**
     * Write OBJECTPROTECT.
     */
    private function writeObjectProtect()
    {
    }
    /**
     * Write the worksheet PASSWORD record.
     */
    private function writePassword()
    {
    }
    /**
     * Insert a 24bit bitmap image in a worksheet.
     *
     * @param int $row The row we are going to insert the bitmap into
     * @param int $col The column we are going to insert the bitmap into
     * @param mixed $bitmap The bitmap filename or GD-image resource
     * @param int $x the horizontal position (offset) of the image inside the cell
     * @param int $y the vertical position (offset) of the image inside the cell
     * @param float $scale_x The horizontal scale
     * @param float $scale_y The vertical scale
     */
    public function insertBitmap($row, $col, $bitmap, $x = 0, $y = 0, $scale_x = 1, $scale_y = 1)
    {
    }
    /**
     * Calculate the vertices that define the position of the image as required by
     * the OBJ record.
     *
     *         +------------+------------+
     *         |     A      |      B     |
     *   +-----+------------+------------+
     *   |     |(x1,y1)     |            |
     *   |  1  |(A1)._______|______      |
     *   |     |    |              |     |
     *   |     |    |              |     |
     *   +-----+----|    BITMAP    |-----+
     *   |     |    |              |     |
     *   |  2  |    |______________.     |
     *   |     |            |        (B2)|
     *   |     |            |     (x2,y2)|
     *   +---- +------------+------------+
     *
     * Example of a bitmap that covers some of the area from cell A1 to cell B2.
     *
     * Based on the width and height of the bitmap we need to calculate 8 vars:
     *     $col_start, $row_start, $col_end, $row_end, $x1, $y1, $x2, $y2.
     * The width and height of the cells are also variable and have to be taken into
     * account.
     * The values of $col_start and $row_start are passed in from the calling
     * function. The values of $col_end and $row_end are calculated by subtracting
     * the width and height of the bitmap from the width and height of the
     * underlying cells.
     * The vertices are expressed as a percentage of the underlying cell width as
     * follows (rhs values are in pixels):
     *
     *       x1 = X / W *1024
     *       y1 = Y / H *256
     *       x2 = (X-1) / W *1024
     *       y2 = (Y-1) / H *256
     *
     *       Where:  X is distance from the left side of the underlying cell
     *               Y is distance from the top of the underlying cell
     *               W is the width of the cell
     *               H is the height of the cell
     * The SDK incorrectly states that the height should be expressed as a
     *        percentage of 1024.
     *
     * @param int $col_start Col containing upper left corner of object
     * @param int $row_start Row containing top left corner of object
     * @param int $x1 Distance to left side of object
     * @param int $y1 Distance to top of object
     * @param int $width Width of image frame
     * @param int $height Height of image frame
     */
    public function positionImage($col_start, $row_start, $x1, $y1, $width, $height)
    {
    }
    /**
     * Store the OBJ record that precedes an IMDATA record. This could be generalise
     * to support other Excel objects.
     *
     * @param int $colL Column containing upper left corner of object
     * @param int $dxL Distance from left side of cell
     * @param int $rwT Row containing top left corner of object
     * @param int $dyT Distance from top of cell
     * @param int $colR Column containing lower right corner of object
     * @param int $dxR Distance from right of cell
     * @param int $rwB Row containing bottom right corner of object
     * @param int $dyB Distance from bottom of cell
     */
    private function writeObjPicture($colL, $dxL, $rwT, $dyT, $colR, $dxR, $rwB, $dyB)
    {
    }
    /**
     * Convert a GD-image into the internal format.
     *
     * @param resource $image The image to process
     *
     * @return array Array with data and properties of the bitmap
     */
    public function processBitmapGd($image)
    {
    }
    /**
     * Convert a 24 bit bitmap into the modified internal format used by Windows.
     * This is described in BITMAPCOREHEADER and BITMAPCOREINFO structures in the
     * MSDN library.
     *
     * @param string $bitmap The bitmap to process
     *
     * @return array Array with data and properties of the bitmap
     */
    public function processBitmap($bitmap)
    {
    }
    /**
     * Store the window zoom factor. This should be a reduced fraction but for
     * simplicity we will store all fractions with a numerator of 100.
     */
    private function writeZoom()
    {
    }
    /**
     * Get Escher object.
     *
     * @return \PhpOffice\PhpSpreadsheet\Shared\Escher
     */
    public function getEscher()
    {
    }
    /**
     * Set Escher object.
     *
     * @param \PhpOffice\PhpSpreadsheet\Shared\Escher $pValue
     */
    public function setEscher(\PhpOffice\PhpSpreadsheet\Shared\Escher $pValue = null)
    {
    }
    /**
     * Write MSODRAWING record.
     */
    private function writeMsoDrawing()
    {
    }
    /**
     * Store the DATAVALIDATIONS and DATAVALIDATION records.
     */
    private function writeDataValidity()
    {
    }
    /**
     * Map Error code.
     *
     * @param string $errorCode
     *
     * @return int
     */
    private static function mapErrorCode($errorCode)
    {
    }
    /**
     * Write PLV Record.
     */
    private function writePageLayoutView()
    {
    }
    /**
     * Write CFRule Record.
     *
     * @param Conditional $conditional
     */
    private function writeCFRule(\PhpOffice\PhpSpreadsheet\Style\Conditional $conditional)
    {
    }
    /**
     * Write CFHeader record.
     */
    private function writeCFHeader()
    {
    }
}