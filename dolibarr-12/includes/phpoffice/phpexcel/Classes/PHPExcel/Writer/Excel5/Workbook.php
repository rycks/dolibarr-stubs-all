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
// Original file header of PEAR::Spreadsheet_Excel_Writer_Workbook (used as the base for this class):
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
 * PHPExcel_Writer_Excel5_Workbook
 *
 * @category   PHPExcel
 * @package    PHPExcel_Writer_Excel5
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Writer_Excel5_Workbook extends \PHPExcel_Writer_Excel5_BIFFwriter
{
    /**
     * Formula parser
     *
     * @var PHPExcel_Writer_Excel5_Parser
     */
    private $_parser;
    /**
     * The BIFF file size for the workbook.
     * @var integer
     * @see _calcSheetOffsets()
     */
    public $_biffsize;
    /**
     * XF Writers
     * @var PHPExcel_Writer_Excel5_Xf[]
     */
    private $_xfWriters = array();
    /**
     * Array containing the colour palette
     * @var array
     */
    public $_palette;
    /**
     * The codepage indicates the text encoding used for strings
     * @var integer
     */
    public $_codepage;
    /**
     * The country code used for localization
     * @var integer
     */
    public $_country_code;
    /**
     * Workbook
     * @var PHPExcel
     */
    private $_phpExcel;
    /**
     * Fonts writers
     *
     * @var PHPExcel_Writer_Excel5_Font[]
     */
    private $_fontWriters = array();
    /**
     * Added fonts. Maps from font's hash => index in workbook
     *
     * @var array
     */
    private $_addedFonts = array();
    /**
     * Shared number formats
     *
     * @var array
     */
    private $_numberFormats = array();
    /**
     * Added number formats. Maps from numberFormat's hash => index in workbook
     *
     * @var array
     */
    private $_addedNumberFormats = array();
    /**
     * Sizes of the binary worksheet streams
     *
     * @var array
     */
    private $_worksheetSizes = array();
    /**
     * Offsets of the binary worksheet streams relative to the start of the global workbook stream
     *
     * @var array
     */
    private $_worksheetOffsets = array();
    /**
     * Total number of shared strings in workbook
     *
     * @var int
     */
    private $_str_total;
    /**
     * Number of unique shared strings in workbook
     *
     * @var int
     */
    private $_str_unique;
    /**
     * Array of unique shared strings in workbook
     *
     * @var array
     */
    private $_str_table;
    /**
     * Color cache
     */
    private $_colors;
    /**
     * Escher object corresponding to MSODRAWINGGROUP
     *
     * @var PHPExcel_Shared_Escher
     */
    private $_escher;
    /**
     * Class constructor
     *
     * @param PHPExcel	$phpExcel		The Workbook
     * @param int		&$str_total		Total number of strings
     * @param int		&$str_unique	Total number of unique strings
     * @param array		&$str_table		String Table
     * @param array		&$colors		Colour Table
     * @param mixed		$parser			The formula parser created for the Workbook
     */
    public function __construct(\PHPExcel $phpExcel = \null, &$str_total, &$str_unique, &$str_table, &$colors, $parser)
    {
    }
    /**
     * Add a new XF writer
     *
     * @param PHPExcel_Style
     * @param boolean Is it a style XF?
     * @return int Index to XF record
     */
    public function addXfWriter($style, $isStyleXf = \false)
    {
    }
    /**
     * Add a font to added fonts
     *
     * @param PHPExcel_Style_Font $font
     * @return int Index to FONT record
     */
    public function _addFont(\PHPExcel_Style_Font $font)
    {
    }
    /**
     * Alter color palette adding a custom color
     *
     * @param string $rgb E.g. 'FF00AA'
     * @return int Color index
     */
    private function _addColor($rgb)
    {
    }
    /**
     * Sets the colour palette to the Excel 97+ default.
     *
     * @access private
     */
    function _setPaletteXl97()
    {
    }
    /**
     * Assemble worksheets into a workbook and send the BIFF data to an OLE
     * storage.
     *
     * @param	array	$pWorksheetSizes	The sizes in bytes of the binary worksheet streams
     * @return	string	Binary data for workbook stream
     */
    public function writeWorkbook($pWorksheetSizes = \null)
    {
    }
    /**
     * Calculate offsets for Worksheet BOF records.
     *
     * @access private
     */
    function _calcSheetOffsets()
    {
    }
    /**
     * Store the Excel FONT records.
     */
    private function _writeAllFonts()
    {
    }
    /**
     * Store user defined numerical formats i.e. FORMAT records
     */
    private function _writeAllNumFormats()
    {
    }
    /**
     * Write all XF records.
     */
    private function _writeAllXfs()
    {
    }
    /**
     * Write all STYLE records.
     */
    private function _writeAllStyles()
    {
    }
    /**
     * Write the EXTERNCOUNT and EXTERNSHEET records. These are used as indexes for
     * the NAME records.
     */
    private function _writeExterns()
    {
    }
    /**
     * Write the NAME record to define the print area and the repeat rows and cols.
     */
    private function _writeNames()
    {
    }
    /**
     * Writes all the DEFINEDNAME records (BIFF8).
     * So far this is only used for repeating rows/columns (print titles) and print areas
     */
    private function _writeAllDefinedNamesBiff8()
    {
    }
    /**
     * Write a DEFINEDNAME record for BIFF8 using explicit binary formula data
     *
     * @param	string		$name			The name in UTF-8
     * @param	string		$formulaData	The binary formula data
     * @param	string		$sheetIndex		1-based sheet index the defined name applies to. 0 = global
     * @param	boolean		$isBuiltIn		Built-in name?
     * @return	string	Complete binary record data
     */
    private function _writeDefinedNameBiff8($name, $formulaData, $sheetIndex = 0, $isBuiltIn = \false)
    {
    }
    /**
     * Write a short NAME record
     *
     * @param	string		 $name
     * @param	string		 $sheetIndex		1-based sheet index the defined name applies to. 0 = global
     * @param	integer[][]  $rangeBounds    range boundaries
     * @param	boolean      $isHidden
     * @return	string	Complete binary record data
     * */
    private function _writeShortNameBiff8($name, $sheetIndex = 0, $rangeBounds, $isHidden = \false)
    {
    }
    /**
     * Stores the CODEPAGE biff record.
     */
    private function _writeCodepage()
    {
    }
    /**
     * Write Excel BIFF WINDOW1 record.
     */
    private function _writeWindow1()
    {
    }
    /**
     * Writes Excel BIFF BOUNDSHEET record.
     *
     * @param PHPExcel_Worksheet  $sheet Worksheet name
     * @param integer $offset    Location of worksheet BOF
     */
    private function _writeBoundsheet($sheet, $offset)
    {
    }
    /**
     * Write Internal SUPBOOK record
     */
    private function _writeSupbookInternal()
    {
    }
    /**
     * Writes the Excel BIFF EXTERNSHEET record. These references are used by
     * formulas.
     *
     */
    private function _writeExternsheetBiff8()
    {
    }
    /**
     * Write Excel BIFF STYLE records.
     */
    private function _writeStyle()
    {
    }
    /**
     * Writes Excel FORMAT record for non "built-in" numerical formats.
     *
     * @param string  $format Custom format string
     * @param integer $ifmt   Format index code
     */
    private function _writeNumFormat($format, $ifmt)
    {
    }
    /**
     * Write DATEMODE record to indicate the date system in use (1904 or 1900).
     */
    private function _writeDatemode()
    {
    }
    /**
     * Write BIFF record EXTERNCOUNT to indicate the number of external sheet
     * references in the workbook.
     *
     * Excel only stores references to external sheets that are used in NAME.
     * The workbook NAME record is required to define the print area and the repeat
     * rows and columns.
     *
     * A similar method is used in Worksheet.php for a slightly different purpose.
     *
     * @param integer $cxals Number of external references
     */
    private function _writeExterncount($cxals)
    {
    }
    /**
     * Writes the Excel BIFF EXTERNSHEET record. These references are used by
     * formulas. NAME record is required to define the print area and the repeat
     * rows and columns.
     *
     * A similar method is used in Worksheet.php for a slightly different purpose.
     *
     * @param string $sheetname Worksheet name
     */
    private function _writeExternsheet($sheetname)
    {
    }
    /**
     * Store the NAME record in the short format that is used for storing the print
     * area, repeat rows only and repeat columns only.
     *
     * @param integer $index  Sheet index
     * @param integer $type   Built-in name type
     * @param integer $rowmin Start row
     * @param integer $rowmax End row
     * @param integer $colmin Start colum
     * @param integer $colmax End column
     */
    private function _writeNameShort($index, $type, $rowmin, $rowmax, $colmin, $colmax)
    {
    }
    /**
     * Store the NAME record in the long format that is used for storing the repeat
     * rows and columns when both are specified. This shares a lot of code with
     * _writeNameShort() but we use a separate method to keep the code clean.
     * Code abstraction for reuse can be carried too far, and I should know. ;-)
     *
     * @param integer $index Sheet index
     * @param integer $type  Built-in name type
     * @param integer $rowmin Start row
     * @param integer $rowmax End row
     * @param integer $colmin Start colum
     * @param integer $colmax End column
     */
    private function _writeNameLong($index, $type, $rowmin, $rowmax, $colmin, $colmax)
    {
    }
    /**
     * Stores the COUNTRY record for localization
     *
     * @return string
     */
    private function _writeCountry()
    {
    }
    /**
     * Write the RECALCID record
     *
     * @return string
     */
    private function _writeRecalcId()
    {
    }
    /**
     * Stores the PALETTE biff record.
     */
    private function _writePalette()
    {
    }
    /**
     * Handling of the SST continue blocks is complicated by the need to include an
     * additional continuation byte depending on whether the string is split between
     * blocks or whether it starts at the beginning of the block. (There are also
     * additional complications that will arise later when/if Rich Strings are
     * supported).
     *
     * The Excel documentation says that the SST record should be followed by an
     * EXTSST record. The EXTSST record is a hash table that is used to optimise
     * access to SST. However, despite the documentation it doesn't seem to be
     * required so we will ignore it.
     *
     * @return string Binary data
     */
    private function _writeSharedStringsTable()
    {
    }
    /**
     * Writes the MSODRAWINGGROUP record if needed. Possibly split using CONTINUE records.
     */
    private function _writeMsoDrawingGroup()
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
}