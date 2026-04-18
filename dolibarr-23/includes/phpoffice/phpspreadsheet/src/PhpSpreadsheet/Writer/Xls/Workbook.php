<?php

namespace PhpOffice\PhpSpreadsheet\Writer\Xls;

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
// *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
// *    Lesser General Public License for more details.
// *
// *    You should have received a copy of the GNU Lesser General Public
// *    License along with this library; if not, write to the Free Software
// *    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
// */
class Workbook extends \PhpOffice\PhpSpreadsheet\Writer\Xls\BIFFwriter
{
    /**
     * Formula parser.
     *
     * @var \PhpOffice\PhpSpreadsheet\Writer\Xls\Parser
     */
    private $parser;
    /**
     * The BIFF file size for the workbook.
     *
     * @var int
     *
     * @see calcSheetOffsets()
     */
    private $biffSize;
    /**
     * XF Writers.
     *
     * @var \PhpOffice\PhpSpreadsheet\Writer\Xls\Xf[]
     */
    private $xfWriters = [];
    /**
     * Array containing the colour palette.
     *
     * @var array
     */
    private $palette;
    /**
     * The codepage indicates the text encoding used for strings.
     *
     * @var int
     */
    private $codepage;
    /**
     * The country code used for localization.
     *
     * @var int
     */
    private $countryCode;
    /**
     * Workbook.
     *
     * @var Spreadsheet
     */
    private $spreadsheet;
    /**
     * Fonts writers.
     *
     * @var Font[]
     */
    private $fontWriters = [];
    /**
     * Added fonts. Maps from font's hash => index in workbook.
     *
     * @var array
     */
    private $addedFonts = [];
    /**
     * Shared number formats.
     *
     * @var array
     */
    private $numberFormats = [];
    /**
     * Added number formats. Maps from numberFormat's hash => index in workbook.
     *
     * @var array
     */
    private $addedNumberFormats = [];
    /**
     * Sizes of the binary worksheet streams.
     *
     * @var array
     */
    private $worksheetSizes = [];
    /**
     * Offsets of the binary worksheet streams relative to the start of the global workbook stream.
     *
     * @var array
     */
    private $worksheetOffsets = [];
    /**
     * Total number of shared strings in workbook.
     *
     * @var int
     */
    private $stringTotal;
    /**
     * Number of unique shared strings in workbook.
     *
     * @var int
     */
    private $stringUnique;
    /**
     * Array of unique shared strings in workbook.
     *
     * @var array
     */
    private $stringTable;
    /**
     * Color cache.
     */
    private $colors;
    /**
     * Escher object corresponding to MSODRAWINGGROUP.
     *
     * @var \PhpOffice\PhpSpreadsheet\Shared\Escher
     */
    private $escher;
    /**
     * Class constructor.
     *
     * @param Spreadsheet $spreadsheet The Workbook
     * @param int $str_total Total number of strings
     * @param int $str_unique Total number of unique strings
     * @param array $str_table String Table
     * @param array $colors Colour Table
     * @param Parser $parser The formula parser created for the Workbook
     */
    public function __construct(\PhpOffice\PhpSpreadsheet\Spreadsheet $spreadsheet, &$str_total, &$str_unique, &$str_table, &$colors, \PhpOffice\PhpSpreadsheet\Writer\Xls\Parser $parser)
    {
    }
    /**
     * Add a new XF writer.
     *
     * @param Style $style
     * @param bool $isStyleXf Is it a style XF?
     *
     * @return int Index to XF record
     */
    public function addXfWriter(\PhpOffice\PhpSpreadsheet\Style\Style $style, $isStyleXf = false)
    {
    }
    /**
     * Add a font to added fonts.
     *
     * @param \PhpOffice\PhpSpreadsheet\Style\Font $font
     *
     * @return int Index to FONT record
     */
    public function addFont(\PhpOffice\PhpSpreadsheet\Style\Font $font)
    {
    }
    /**
     * Alter color palette adding a custom color.
     *
     * @param string $rgb E.g. 'FF00AA'
     *
     * @return int Color index
     */
    private function addColor($rgb)
    {
    }
    /**
     * Sets the colour palette to the Excel 97+ default.
     */
    private function setPaletteXl97()
    {
    }
    /**
     * Assemble worksheets into a workbook and send the BIFF data to an OLE
     * storage.
     *
     * @param array $pWorksheetSizes The sizes in bytes of the binary worksheet streams
     *
     * @return string Binary data for workbook stream
     */
    public function writeWorkbook(array $pWorksheetSizes)
    {
    }
    /**
     * Calculate offsets for Worksheet BOF records.
     */
    private function calcSheetOffsets()
    {
    }
    /**
     * Store the Excel FONT records.
     */
    private function writeAllFonts()
    {
    }
    /**
     * Store user defined numerical formats i.e. FORMAT records.
     */
    private function writeAllNumberFormats()
    {
    }
    /**
     * Write all XF records.
     */
    private function writeAllXfs()
    {
    }
    /**
     * Write all STYLE records.
     */
    private function writeAllStyles()
    {
    }
    /**
     * Writes all the DEFINEDNAME records (BIFF8).
     * So far this is only used for repeating rows/columns (print titles) and print areas.
     */
    private function writeAllDefinedNamesBiff8()
    {
    }
    /**
     * Write a DEFINEDNAME record for BIFF8 using explicit binary formula data.
     *
     * @param string $name The name in UTF-8
     * @param string $formulaData The binary formula data
     * @param int $sheetIndex 1-based sheet index the defined name applies to. 0 = global
     * @param bool $isBuiltIn Built-in name?
     *
     * @return string Complete binary record data
     */
    private function writeDefinedNameBiff8($name, $formulaData, $sheetIndex = 0, $isBuiltIn = false)
    {
    }
    /**
     * Write a short NAME record.
     *
     * @param string $name
     * @param string $sheetIndex 1-based sheet index the defined name applies to. 0 = global
     * @param integer[][] $rangeBounds range boundaries
     * @param bool $isHidden
     *
     * @return string Complete binary record data
     * */
    private function writeShortNameBiff8($name, $sheetIndex, $rangeBounds, $isHidden = false)
    {
    }
    /**
     * Stores the CODEPAGE biff record.
     */
    private function writeCodepage()
    {
    }
    /**
     * Write Excel BIFF WINDOW1 record.
     */
    private function writeWindow1()
    {
    }
    /**
     * Writes Excel BIFF BOUNDSHEET record.
     *
     * @param Worksheet $sheet Worksheet name
     * @param int $offset Location of worksheet BOF
     */
    private function writeBoundSheet($sheet, $offset)
    {
    }
    /**
     * Write Internal SUPBOOK record.
     */
    private function writeSupbookInternal()
    {
    }
    /**
     * Writes the Excel BIFF EXTERNSHEET record. These references are used by
     * formulas.
     */
    private function writeExternalsheetBiff8()
    {
    }
    /**
     * Write Excel BIFF STYLE records.
     */
    private function writeStyle()
    {
    }
    /**
     * Writes Excel FORMAT record for non "built-in" numerical formats.
     *
     * @param string $format Custom format string
     * @param int $ifmt Format index code
     */
    private function writeNumberFormat($format, $ifmt)
    {
    }
    /**
     * Write DATEMODE record to indicate the date system in use (1904 or 1900).
     */
    private function writeDateMode()
    {
    }
    /**
     * Stores the COUNTRY record for localization.
     *
     * @return string
     */
    private function writeCountry()
    {
    }
    /**
     * Write the RECALCID record.
     *
     * @return string
     */
    private function writeRecalcId()
    {
    }
    /**
     * Stores the PALETTE biff record.
     */
    private function writePalette()
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
    private function writeSharedStringsTable()
    {
    }
    /**
     * Writes the MSODRAWINGGROUP record if needed. Possibly split using CONTINUE records.
     */
    private function writeMsoDrawingGroup()
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
}