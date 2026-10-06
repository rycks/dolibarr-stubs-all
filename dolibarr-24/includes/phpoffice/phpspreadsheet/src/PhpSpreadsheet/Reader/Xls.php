<?php

namespace PhpOffice\PhpSpreadsheet\Reader;

// Original file header of ParseXL (used as the base for this class):
// --------------------------------------------------------------------------------
// Adapted from Excel_Spreadsheet_Reader developed by users bizon153,
// trex005, and mmp11 (SourceForge.net)
// https://sourceforge.net/projects/phpexcelreader/
// Primary changes made by canyoncasa (dvc) for ParseXL 1.00 ...
//     Modelled moreso after Perl Excel Parse/Write modules
//     Added Parse_Excel_Spreadsheet object
//         Reads a whole worksheet or tab as row,column array or as
//         associated hash of indexed rows and named column fields
//     Added variables for worksheet (tab) indexes and names
//     Added an object call for loading individual woorksheets
//     Changed default indexing defaults to 0 based arrays
//     Fixed date/time and percent formats
//     Includes patches found at SourceForge...
//         unicode patch by nobody
//         unpack("d") machine depedency patch by matchy
//         boundsheet utf16 patch by bjaenichen
//     Renamed functions for shorter names
//     General code cleanup and rigor, including <80 column width
//     Included a testcase Excel file and PHP example calls
//     Code works for PHP 5.x
// Primary changes made by canyoncasa (dvc) for ParseXL 1.10 ...
// http://sourceforge.net/tracker/index.php?func=detail&aid=1466964&group_id=99160&atid=623334
//     Decoding of formula conditions, results, and tokens.
//     Support for user-defined named cells added as an array "namedcells"
//         Patch code for user-defined named cells supports single cells only.
//         NOTE: this patch only works for BIFF8 as BIFF5-7 use a different
//         external sheet reference structure
class Xls extends \PhpOffice\PhpSpreadsheet\Reader\BaseReader
{
    // ParseXL definitions
    const XLS_BIFF8 = 0x600;
    const XLS_BIFF7 = 0x500;
    const XLS_WORKBOOKGLOBALS = 0x5;
    const XLS_WORKSHEET = 0x10;
    // record identifiers
    const XLS_TYPE_FORMULA = 0x6;
    const XLS_TYPE_EOF = 0xa;
    const XLS_TYPE_PROTECT = 0x12;
    const XLS_TYPE_OBJECTPROTECT = 0x63;
    const XLS_TYPE_SCENPROTECT = 0xdd;
    const XLS_TYPE_PASSWORD = 0x13;
    const XLS_TYPE_HEADER = 0x14;
    const XLS_TYPE_FOOTER = 0x15;
    const XLS_TYPE_EXTERNSHEET = 0x17;
    const XLS_TYPE_DEFINEDNAME = 0x18;
    const XLS_TYPE_VERTICALPAGEBREAKS = 0x1a;
    const XLS_TYPE_HORIZONTALPAGEBREAKS = 0x1b;
    const XLS_TYPE_NOTE = 0x1c;
    const XLS_TYPE_SELECTION = 0x1d;
    const XLS_TYPE_DATEMODE = 0x22;
    const XLS_TYPE_EXTERNNAME = 0x23;
    const XLS_TYPE_LEFTMARGIN = 0x26;
    const XLS_TYPE_RIGHTMARGIN = 0x27;
    const XLS_TYPE_TOPMARGIN = 0x28;
    const XLS_TYPE_BOTTOMMARGIN = 0x29;
    const XLS_TYPE_PRINTGRIDLINES = 0x2b;
    const XLS_TYPE_FILEPASS = 0x2f;
    const XLS_TYPE_FONT = 0x31;
    const XLS_TYPE_CONTINUE = 0x3c;
    const XLS_TYPE_PANE = 0x41;
    const XLS_TYPE_CODEPAGE = 0x42;
    const XLS_TYPE_DEFCOLWIDTH = 0x55;
    const XLS_TYPE_OBJ = 0x5d;
    const XLS_TYPE_COLINFO = 0x7d;
    const XLS_TYPE_IMDATA = 0x7f;
    const XLS_TYPE_SHEETPR = 0x81;
    const XLS_TYPE_HCENTER = 0x83;
    const XLS_TYPE_VCENTER = 0x84;
    const XLS_TYPE_SHEET = 0x85;
    const XLS_TYPE_PALETTE = 0x92;
    const XLS_TYPE_SCL = 0xa0;
    const XLS_TYPE_PAGESETUP = 0xa1;
    const XLS_TYPE_MULRK = 0xbd;
    const XLS_TYPE_MULBLANK = 0xbe;
    const XLS_TYPE_DBCELL = 0xd7;
    const XLS_TYPE_XF = 0xe0;
    const XLS_TYPE_MERGEDCELLS = 0xe5;
    const XLS_TYPE_MSODRAWINGGROUP = 0xeb;
    const XLS_TYPE_MSODRAWING = 0xec;
    const XLS_TYPE_SST = 0xfc;
    const XLS_TYPE_LABELSST = 0xfd;
    const XLS_TYPE_EXTSST = 0xff;
    const XLS_TYPE_EXTERNALBOOK = 0x1ae;
    const XLS_TYPE_DATAVALIDATIONS = 0x1b2;
    const XLS_TYPE_TXO = 0x1b6;
    const XLS_TYPE_HYPERLINK = 0x1b8;
    const XLS_TYPE_DATAVALIDATION = 0x1be;
    const XLS_TYPE_DIMENSION = 0x200;
    const XLS_TYPE_BLANK = 0x201;
    const XLS_TYPE_NUMBER = 0x203;
    const XLS_TYPE_LABEL = 0x204;
    const XLS_TYPE_BOOLERR = 0x205;
    const XLS_TYPE_STRING = 0x207;
    const XLS_TYPE_ROW = 0x208;
    const XLS_TYPE_INDEX = 0x20b;
    const XLS_TYPE_ARRAY = 0x221;
    const XLS_TYPE_DEFAULTROWHEIGHT = 0x225;
    const XLS_TYPE_WINDOW2 = 0x23e;
    const XLS_TYPE_RK = 0x27e;
    const XLS_TYPE_STYLE = 0x293;
    const XLS_TYPE_FORMAT = 0x41e;
    const XLS_TYPE_SHAREDFMLA = 0x4bc;
    const XLS_TYPE_BOF = 0x809;
    const XLS_TYPE_SHEETPROTECTION = 0x867;
    const XLS_TYPE_RANGEPROTECTION = 0x868;
    const XLS_TYPE_SHEETLAYOUT = 0x862;
    const XLS_TYPE_XFEXT = 0x87d;
    const XLS_TYPE_PAGELAYOUTVIEW = 0x88b;
    const XLS_TYPE_UNKNOWN = 0xffff;
    // Encryption type
    const MS_BIFF_CRYPTO_NONE = 0;
    const MS_BIFF_CRYPTO_XOR = 1;
    const MS_BIFF_CRYPTO_RC4 = 2;
    // Size of stream blocks when using RC4 encryption
    const REKEY_BLOCK = 0x400;
    /**
     * Summary Information stream data.
     *
     * @var string
     */
    private $summaryInformation;
    /**
     * Extended Summary Information stream data.
     *
     * @var string
     */
    private $documentSummaryInformation;
    /**
     * Workbook stream data. (Includes workbook globals substream as well as sheet substreams).
     *
     * @var string
     */
    private $data;
    /**
     * Size in bytes of $this->data.
     *
     * @var int
     */
    private $dataSize;
    /**
     * Current position in stream.
     *
     * @var int
     */
    private $pos;
    /**
     * Workbook to be returned by the reader.
     *
     * @var Spreadsheet
     */
    private $spreadsheet;
    /**
     * Worksheet that is currently being built by the reader.
     *
     * @var Worksheet
     */
    private $phpSheet;
    /**
     * BIFF version.
     *
     * @var int
     */
    private $version;
    /**
     * Codepage set in the Excel file being read. Only important for BIFF5 (Excel 5.0 - Excel 95)
     * For BIFF8 (Excel 97 - Excel 2003) this will always have the value 'UTF-16LE'.
     *
     * @var string
     */
    private $codepage;
    /**
     * Shared formats.
     *
     * @var array
     */
    private $formats;
    /**
     * Shared fonts.
     *
     * @var array
     */
    private $objFonts;
    /**
     * Color palette.
     *
     * @var array
     */
    private $palette;
    /**
     * Worksheets.
     *
     * @var array
     */
    private $sheets;
    /**
     * External books.
     *
     * @var array
     */
    private $externalBooks;
    /**
     * REF structures. Only applies to BIFF8.
     *
     * @var array
     */
    private $ref;
    /**
     * External names.
     *
     * @var array
     */
    private $externalNames;
    /**
     * Defined names.
     *
     * @var array
     */
    private $definedname;
    /**
     * Shared strings. Only applies to BIFF8.
     *
     * @var array
     */
    private $sst;
    /**
     * Panes are frozen? (in sheet currently being read). See WINDOW2 record.
     *
     * @var bool
     */
    private $frozen;
    /**
     * Fit printout to number of pages? (in sheet currently being read). See SHEETPR record.
     *
     * @var bool
     */
    private $isFitToPages;
    /**
     * Objects. One OBJ record contributes with one entry.
     *
     * @var array
     */
    private $objs;
    /**
     * Text Objects. One TXO record corresponds with one entry.
     *
     * @var array
     */
    private $textObjects;
    /**
     * Cell Annotations (BIFF8).
     *
     * @var array
     */
    private $cellNotes;
    /**
     * The combined MSODRAWINGGROUP data.
     *
     * @var string
     */
    private $drawingGroupData;
    /**
     * The combined MSODRAWING data (per sheet).
     *
     * @var string
     */
    private $drawingData;
    /**
     * Keep track of XF index.
     *
     * @var int
     */
    private $xfIndex;
    /**
     * Mapping of XF index (that is a cell XF) to final index in cellXf collection.
     *
     * @var array
     */
    private $mapCellXfIndex;
    /**
     * Mapping of XF index (that is a style XF) to final index in cellStyleXf collection.
     *
     * @var array
     */
    private $mapCellStyleXfIndex;
    /**
     * The shared formulas in a sheet. One SHAREDFMLA record contributes with one value.
     *
     * @var array
     */
    private $sharedFormulas;
    /**
     * The shared formula parts in a sheet. One FORMULA record contributes with one value if it
     * refers to a shared formula.
     *
     * @var array
     */
    private $sharedFormulaParts;
    /**
     * The type of encryption in use.
     *
     * @var int
     */
    private $encryption = 0;
    /**
     * The position in the stream after which contents are encrypted.
     *
     * @var int
     */
    private $encryptionStartPos = false;
    /**
     * The current RC4 decryption object.
     *
     * @var Xls\RC4
     */
    private $rc4Key;
    /**
     * The position in the stream that the RC4 decryption object was left at.
     *
     * @var int
     */
    private $rc4Pos = 0;
    /**
     * The current MD5 context state.
     *
     * @var string
     */
    private $md5Ctxt;
    /**
     * @var int
     */
    private $textObjRef;
    /**
     * @var string
     */
    private $baseCell;
    /**
     * Create a new Xls Reader instance.
     */
    public function __construct()
    {
    }
    /**
     * Can the current IReader read the file?
     *
     * @param string $pFilename
     *
     * @return bool
     */
    public function canRead($pFilename)
    {
    }
    /**
     * Reads names of the worksheets from a file, without parsing the whole file to a PhpSpreadsheet object.
     *
     * @param string $pFilename
     *
     * @throws Exception
     *
     * @return array
     */
    public function listWorksheetNames($pFilename)
    {
    }
    /**
     * Return worksheet info (Name, Last Column Letter, Last Column Index, Total Rows, Total Columns).
     *
     * @param string $pFilename
     *
     * @throws Exception
     *
     * @return array
     */
    public function listWorksheetInfo($pFilename)
    {
    }
    /**
     * Loads PhpSpreadsheet from file.
     *
     * @param string $pFilename
     *
     * @throws Exception
     *
     * @return Spreadsheet
     */
    public function load($pFilename)
    {
    }
    /**
     * Read record data from stream, decrypting as required.
     *
     * @param string $data Data stream to read from
     * @param int $pos Position to start reading from
     * @param int $len Record data length
     *
     * @return string Record data
     */
    private function readRecordData($data, $pos, $len)
    {
    }
    /**
     * Use OLE reader to extract the relevant data streams from the OLE file.
     *
     * @param string $pFilename
     */
    private function loadOLE($pFilename)
    {
    }
    /**
     * Read summary information.
     */
    private function readSummaryInformation()
    {
    }
    /**
     * Read additional document summary information.
     */
    private function readDocumentSummaryInformation()
    {
    }
    /**
     * Reads a general type of BIFF record. Does nothing except for moving stream pointer forward to next record.
     */
    private function readDefault()
    {
    }
    /**
     *    The NOTE record specifies a comment associated with a particular cell. In Excel 95 (BIFF7) and earlier versions,
     *        this record stores a note (cell note). This feature was significantly enhanced in Excel 97.
     */
    private function readNote()
    {
    }
    /**
     * The TEXT Object record contains the text associated with a cell annotation.
     */
    private function readTextObject()
    {
    }
    /**
     * Read BOF.
     */
    private function readBof()
    {
    }
    /**
     * FILEPASS.
     *
     * This record is part of the File Protection Block. It
     * contains information about the read/write password of the
     * file. All record contents following this record will be
     * encrypted.
     *
     * --    "OpenOffice.org's Documentation of the Microsoft
     *         Excel File Format"
     *
     * The decryption functions and objects used from here on in
     * are based on the source of Spreadsheet-ParseExcel:
     * https://metacpan.org/release/Spreadsheet-ParseExcel
     */
    private function readFilepass()
    {
    }
    /**
     * Make an RC4 decryptor for the given block.
     *
     * @param int $block Block for which to create decrypto
     * @param string $valContext MD5 context state
     *
     * @return Xls\RC4
     */
    private function makeKey($block, $valContext)
    {
    }
    /**
     * Verify RC4 file password.
     *
     * @param string $password Password to check
     * @param string $docid Document id
     * @param string $salt_data Salt data
     * @param string $hashedsalt_data Hashed salt data
     * @param string $valContext Set to the MD5 context of the value
     *
     * @return bool Success
     */
    private function verifyPassword($password, $docid, $salt_data, $hashedsalt_data, &$valContext)
    {
    }
    /**
     * CODEPAGE.
     *
     * This record stores the text encoding used to write byte
     * strings, stored as MS Windows code page identifier.
     *
     * --    "OpenOffice.org's Documentation of the Microsoft
     *         Excel File Format"
     */
    private function readCodepage()
    {
    }
    /**
     * DATEMODE.
     *
     * This record specifies the base date for displaying date
     * values. All dates are stored as count of days past this
     * base date. In BIFF2-BIFF4 this record is part of the
     * Calculation Settings Block. In BIFF5-BIFF8 it is
     * stored in the Workbook Globals Substream.
     *
     * --    "OpenOffice.org's Documentation of the Microsoft
     *         Excel File Format"
     */
    private function readDateMode()
    {
    }
    /**
     * Read a FONT record.
     */
    private function readFont()
    {
    }
    /**
     * FORMAT.
     *
     * This record contains information about a number format.
     * All FORMAT records occur together in a sequential list.
     *
     * In BIFF2-BIFF4 other records referencing a FORMAT record
     * contain a zero-based index into this list. From BIFF5 on
     * the FORMAT record contains the index itself that will be
     * used by other records.
     *
     * --    "OpenOffice.org's Documentation of the Microsoft
     *         Excel File Format"
     */
    private function readFormat()
    {
    }
    /**
     * XF - Extended Format.
     *
     * This record contains formatting information for cells, rows, columns or styles.
     * According to https://support.microsoft.com/en-us/help/147732 there are always at least 15 cell style XF
     * and 1 cell XF.
     * Inspection of Excel files generated by MS Office Excel shows that XF records 0-14 are cell style XF
     * and XF record 15 is a cell XF
     * We only read the first cell style XF and skip the remaining cell style XF records
     * We read all cell XF records.
     *
     * --    "OpenOffice.org's Documentation of the Microsoft
     *         Excel File Format"
     */
    private function readXf()
    {
    }
    private function readXfExt()
    {
    }
    /**
     * Read STYLE record.
     */
    private function readStyle()
    {
    }
    /**
     * Read PALETTE record.
     */
    private function readPalette()
    {
    }
    /**
     * SHEET.
     *
     * This record is  located in the  Workbook Globals
     * Substream  and represents a sheet inside the workbook.
     * One SHEET record is written for each sheet. It stores the
     * sheet name and a stream offset to the BOF record of the
     * respective Sheet Substream within the Workbook Stream.
     *
     * --    "OpenOffice.org's Documentation of the Microsoft
     *         Excel File Format"
     */
    private function readSheet()
    {
    }
    /**
     * Read EXTERNALBOOK record.
     */
    private function readExternalBook()
    {
    }
    /**
     * Read EXTERNNAME record.
     */
    private function readExternName()
    {
    }
    /**
     * Read EXTERNSHEET record.
     */
    private function readExternSheet()
    {
    }
    /**
     * DEFINEDNAME.
     *
     * This record is part of a Link Table. It contains the name
     * and the token array of an internal defined name. Token
     * arrays of defined names contain tokens with aberrant
     * token classes.
     *
     * --    "OpenOffice.org's Documentation of the Microsoft
     *         Excel File Format"
     */
    private function readDefinedName()
    {
    }
    /**
     * Read MSODRAWINGGROUP record.
     */
    private function readMsoDrawingGroup()
    {
    }
    /**
     * SST - Shared String Table.
     *
     * This record contains a list of all strings used anywhere
     * in the workbook. Each string occurs only once. The
     * workbook uses indexes into the list to reference the
     * strings.
     *
     * --    "OpenOffice.org's Documentation of the Microsoft
     *         Excel File Format"
     */
    private function readSst()
    {
    }
    /**
     * Read PRINTGRIDLINES record.
     */
    private function readPrintGridlines()
    {
    }
    /**
     * Read DEFAULTROWHEIGHT record.
     */
    private function readDefaultRowHeight()
    {
    }
    /**
     * Read SHEETPR record.
     */
    private function readSheetPr()
    {
    }
    /**
     * Read HORIZONTALPAGEBREAKS record.
     */
    private function readHorizontalPageBreaks()
    {
    }
    /**
     * Read VERTICALPAGEBREAKS record.
     */
    private function readVerticalPageBreaks()
    {
    }
    /**
     * Read HEADER record.
     */
    private function readHeader()
    {
    }
    /**
     * Read FOOTER record.
     */
    private function readFooter()
    {
    }
    /**
     * Read HCENTER record.
     */
    private function readHcenter()
    {
    }
    /**
     * Read VCENTER record.
     */
    private function readVcenter()
    {
    }
    /**
     * Read LEFTMARGIN record.
     */
    private function readLeftMargin()
    {
    }
    /**
     * Read RIGHTMARGIN record.
     */
    private function readRightMargin()
    {
    }
    /**
     * Read TOPMARGIN record.
     */
    private function readTopMargin()
    {
    }
    /**
     * Read BOTTOMMARGIN record.
     */
    private function readBottomMargin()
    {
    }
    /**
     * Read PAGESETUP record.
     */
    private function readPageSetup()
    {
    }
    /**
     * PROTECT - Sheet protection (BIFF2 through BIFF8)
     *   if this record is omitted, then it also means no sheet protection.
     */
    private function readProtect()
    {
    }
    /**
     * SCENPROTECT.
     */
    private function readScenProtect()
    {
    }
    /**
     * OBJECTPROTECT.
     */
    private function readObjectProtect()
    {
    }
    /**
     * PASSWORD - Sheet protection (hashed) password (BIFF2 through BIFF8).
     */
    private function readPassword()
    {
    }
    /**
     * Read DEFCOLWIDTH record.
     */
    private function readDefColWidth()
    {
    }
    /**
     * Read COLINFO record.
     */
    private function readColInfo()
    {
    }
    /**
     * ROW.
     *
     * This record contains the properties of a single row in a
     * sheet. Rows and cells in a sheet are divided into blocks
     * of 32 rows.
     *
     * --    "OpenOffice.org's Documentation of the Microsoft
     *         Excel File Format"
     */
    private function readRow()
    {
    }
    /**
     * Read RK record
     * This record represents a cell that contains an RK value
     * (encoded integer or floating-point value). If a
     * floating-point value cannot be encoded to an RK value,
     * a NUMBER record will be written. This record replaces the
     * record INTEGER written in BIFF2.
     *
     * --    "OpenOffice.org's Documentation of the Microsoft
     *         Excel File Format"
     */
    private function readRk()
    {
    }
    /**
     * Read LABELSST record
     * This record represents a cell that contains a string. It
     * replaces the LABEL record and RSTRING record used in
     * BIFF2-BIFF5.
     *
     * --    "OpenOffice.org's Documentation of the Microsoft
     *         Excel File Format"
     */
    private function readLabelSst()
    {
    }
    /**
     * Read MULRK record
     * This record represents a cell range containing RK value
     * cells. All cells are located in the same row.
     *
     * --    "OpenOffice.org's Documentation of the Microsoft
     *         Excel File Format"
     */
    private function readMulRk()
    {
    }
    /**
     * Read NUMBER record
     * This record represents a cell that contains a
     * floating-point value.
     *
     * --    "OpenOffice.org's Documentation of the Microsoft
     *         Excel File Format"
     */
    private function readNumber()
    {
    }
    /**
     * Read FORMULA record + perhaps a following STRING record if formula result is a string
     * This record contains the token array and the result of a
     * formula cell.
     *
     * --    "OpenOffice.org's Documentation of the Microsoft
     *         Excel File Format"
     */
    private function readFormula()
    {
    }
    /**
     * Read a SHAREDFMLA record. This function just stores the binary shared formula in the reader,
     * which usually contains relative references.
     * These will be used to construct the formula in each shared formula part after the sheet is read.
     */
    private function readSharedFmla()
    {
    }
    /**
     * Read a STRING record from current stream position and advance the stream pointer to next record
     * This record is used for storing result from FORMULA record when it is a string, and
     * it occurs directly after the FORMULA record.
     *
     * @return string The string contents as UTF-8
     */
    private function readString()
    {
    }
    /**
     * Read BOOLERR record
     * This record represents a Boolean value or error value
     * cell.
     *
     * --    "OpenOffice.org's Documentation of the Microsoft
     *         Excel File Format"
     */
    private function readBoolErr()
    {
    }
    /**
     * Read MULBLANK record
     * This record represents a cell range of empty cells. All
     * cells are located in the same row.
     *
     * --    "OpenOffice.org's Documentation of the Microsoft
     *         Excel File Format"
     */
    private function readMulBlank()
    {
    }
    /**
     * Read LABEL record
     * This record represents a cell that contains a string. In
     * BIFF8 it is usually replaced by the LABELSST record.
     * Excel still uses this record, if it copies unformatted
     * text cells to the clipboard.
     *
     * --    "OpenOffice.org's Documentation of the Microsoft
     *         Excel File Format"
     */
    private function readLabel()
    {
    }
    /**
     * Read BLANK record.
     */
    private function readBlank()
    {
    }
    /**
     * Read MSODRAWING record.
     */
    private function readMsoDrawing()
    {
    }
    /**
     * Read OBJ record.
     */
    private function readObj()
    {
    }
    /**
     * Read WINDOW2 record.
     */
    private function readWindow2()
    {
    }
    /**
     * Read PLV Record(Created by Excel2007 or upper).
     */
    private function readPageLayoutView()
    {
    }
    /**
     * Read SCL record.
     */
    private function readScl()
    {
    }
    /**
     * Read PANE record.
     */
    private function readPane()
    {
    }
    /**
     * Read SELECTION record. There is one such record for each pane in the sheet.
     */
    private function readSelection()
    {
    }
    private function includeCellRangeFiltered($cellRangeAddress)
    {
    }
    /**
     * MERGEDCELLS.
     *
     * This record contains the addresses of merged cell ranges
     * in the current sheet.
     *
     * --    "OpenOffice.org's Documentation of the Microsoft
     *         Excel File Format"
     */
    private function readMergedCells()
    {
    }
    /**
     * Read HYPERLINK record.
     */
    private function readHyperLink()
    {
    }
    /**
     * Read DATAVALIDATIONS record.
     */
    private function readDataValidations()
    {
    }
    /**
     * Read DATAVALIDATION record.
     */
    private function readDataValidation()
    {
    }
    /**
     * Read SHEETLAYOUT record. Stores sheet tab color information.
     */
    private function readSheetLayout()
    {
    }
    /**
     * Read SHEETPROTECTION record (FEATHEADR).
     */
    private function readSheetProtection()
    {
    }
    /**
     * Read RANGEPROTECTION record
     * Reading of this record is based on Microsoft Office Excel 97-2000 Binary File Format Specification,
     * where it is referred to as FEAT record.
     */
    private function readRangeProtection()
    {
    }
    /**
     * Read a free CONTINUE record. Free CONTINUE record may be a camouflaged MSODRAWING record
     * When MSODRAWING data on a sheet exceeds 8224 bytes, CONTINUE records are used instead. Undocumented.
     * In this case, we must treat the CONTINUE record as a MSODRAWING record.
     */
    private function readContinue()
    {
    }
    /**
     * Reads a record from current position in data stream and continues reading data as long as CONTINUE
     * records are found. Splices the record data pieces and returns the combined string as if record data
     * is in one piece.
     * Moves to next current position in data stream to start of next record different from a CONtINUE record.
     *
     * @return array
     */
    private function getSplicedRecordData()
    {
    }
    /**
     * Convert formula structure into human readable Excel formula like 'A3+A5*5'.
     *
     * @param string $formulaStructure The complete binary data for the formula
     * @param string $baseCell Base cell, only needed when formula contains tRefN tokens, e.g. with shared formulas
     *
     * @return string Human readable formula
     */
    private function getFormulaFromStructure($formulaStructure, $baseCell = 'A1')
    {
    }
    /**
     * Take formula data and additional data for formula and return human readable formula.
     *
     * @param string $formulaData The binary data for the formula itself
     * @param string $additionalData Additional binary data going with the formula
     * @param string $baseCell Base cell, only needed when formula contains tRefN tokens, e.g. with shared formulas
     *
     * @return string Human readable formula
     */
    private function getFormulaFromData($formulaData, $additionalData = '', $baseCell = 'A1')
    {
    }
    /**
     * Take array of tokens together with additional data for formula and return human readable formula.
     *
     * @param array $tokens
     * @param string $additionalData Additional binary data going with the formula
     *
     * @return string Human readable formula
     */
    private function createFormulaFromTokens($tokens, $additionalData)
    {
    }
    /**
     * Fetch next token from binary formula data.
     *
     * @param string $formulaData Formula data
     * @param string $baseCell Base cell, only needed when formula contains tRefN tokens, e.g. with shared formulas
     *
     * @throws Exception
     *
     * @return array
     */
    private function getNextToken($formulaData, $baseCell = 'A1')
    {
    }
    /**
     * Reads a cell address in BIFF8 e.g. 'A2' or '$A$2'
     * section 3.3.4.
     *
     * @param string $cellAddressStructure
     *
     * @return string
     */
    private function readBIFF8CellAddress($cellAddressStructure)
    {
    }
    /**
     * Reads a cell address in BIFF8 for shared formulas. Uses positive and negative values for row and column
     * to indicate offsets from a base cell
     * section 3.3.4.
     *
     * @param string $cellAddressStructure
     * @param string $baseCell Base cell, only needed when formula contains tRefN tokens, e.g. with shared formulas
     *
     * @return string
     */
    private function readBIFF8CellAddressB($cellAddressStructure, $baseCell = 'A1')
    {
    }
    /**
     * Reads a cell range address in BIFF5 e.g. 'A2:B6' or 'A1'
     * always fixed range
     * section 2.5.14.
     *
     * @param string $subData
     *
     * @throws Exception
     *
     * @return string
     */
    private function readBIFF5CellRangeAddressFixed($subData)
    {
    }
    /**
     * Reads a cell range address in BIFF8 e.g. 'A2:B6' or 'A1'
     * always fixed range
     * section 2.5.14.
     *
     * @param string $subData
     *
     * @throws Exception
     *
     * @return string
     */
    private function readBIFF8CellRangeAddressFixed($subData)
    {
    }
    /**
     * Reads a cell range address in BIFF8 e.g. 'A2:B6' or '$A$2:$B$6'
     * there are flags indicating whether column/row index is relative
     * section 3.3.4.
     *
     * @param string $subData
     *
     * @return string
     */
    private function readBIFF8CellRangeAddress($subData)
    {
    }
    /**
     * Reads a cell range address in BIFF8 for shared formulas. Uses positive and negative values for row and column
     * to indicate offsets from a base cell
     * section 3.3.4.
     *
     * @param string $subData
     * @param string $baseCell Base cell
     *
     * @return string Cell range address
     */
    private function readBIFF8CellRangeAddressB($subData, $baseCell = 'A1')
    {
    }
    /**
     * Read BIFF8 cell range address list
     * section 2.5.15.
     *
     * @param string $subData
     *
     * @return array
     */
    private function readBIFF8CellRangeAddressList($subData)
    {
    }
    /**
     * Read BIFF5 cell range address list
     * section 2.5.15.
     *
     * @param string $subData
     *
     * @return array
     */
    private function readBIFF5CellRangeAddressList($subData)
    {
    }
    /**
     * Get a sheet range like Sheet1:Sheet3 from REF index
     * Note: If there is only one sheet in the range, one gets e.g Sheet1
     * It can also happen that the REF structure uses the -1 (FFFF) code to indicate deleted sheets,
     * in which case an Exception is thrown.
     *
     * @param int $index
     *
     * @throws Exception
     *
     * @return false|string
     */
    private function readSheetRangeByRefIndex($index)
    {
    }
    /**
     * read BIFF8 constant value array from array data
     * returns e.g. ['value' => '{1,2;3,4}', 'size' => 40]
     * section 2.5.8.
     *
     * @param string $arrayData
     *
     * @return array
     */
    private static function readBIFF8ConstantArray($arrayData)
    {
    }
    /**
     * read BIFF8 constant value which may be 'Empty Value', 'Number', 'String Value', 'Boolean Value', 'Error Value'
     * section 2.5.7
     * returns e.g. ['value' => '5', 'size' => 9].
     *
     * @param string $valueData
     *
     * @return array
     */
    private static function readBIFF8Constant($valueData)
    {
    }
    /**
     * Extract RGB color
     * OpenOffice.org's Documentation of the Microsoft Excel File Format, section 2.5.4.
     *
     * @param string $rgb Encoded RGB value (4 bytes)
     *
     * @return array
     */
    private static function readRGB($rgb)
    {
    }
    /**
     * Read byte string (8-bit string length)
     * OpenOffice documentation: 2.5.2.
     *
     * @param string $subData
     *
     * @return array
     */
    private function readByteStringShort($subData)
    {
    }
    /**
     * Read byte string (16-bit string length)
     * OpenOffice documentation: 2.5.2.
     *
     * @param string $subData
     *
     * @return array
     */
    private function readByteStringLong($subData)
    {
    }
    /**
     * Extracts an Excel Unicode short string (8-bit string length)
     * OpenOffice documentation: 2.5.3
     * function will automatically find out where the Unicode string ends.
     *
     * @param string $subData
     *
     * @return array
     */
    private static function readUnicodeStringShort($subData)
    {
    }
    /**
     * Extracts an Excel Unicode long string (16-bit string length)
     * OpenOffice documentation: 2.5.3
     * this function is under construction, needs to support rich text, and Asian phonetic settings.
     *
     * @param string $subData
     *
     * @return array
     */
    private static function readUnicodeStringLong($subData)
    {
    }
    /**
     * Read Unicode string with no string length field, but with known character count
     * this function is under construction, needs to support rich text, and Asian phonetic settings
     * OpenOffice.org's Documentation of the Microsoft Excel File Format, section 2.5.3.
     *
     * @param string $subData
     * @param int $characterCount
     *
     * @return array
     */
    private static function readUnicodeString($subData, $characterCount)
    {
    }
    /**
     * Convert UTF-8 string to string surounded by double quotes. Used for explicit string tokens in formulas.
     * Example:  hello"world  -->  "hello""world".
     *
     * @param string $value UTF-8 encoded string
     *
     * @return string
     */
    private static function UTF8toExcelDoubleQuoted($value)
    {
    }
    /**
     * Reads first 8 bytes of a string and return IEEE 754 float.
     *
     * @param string $data Binary string that is at least 8 bytes long
     *
     * @return float
     */
    private static function extractNumber($data)
    {
    }
    /**
     * @param int $rknum
     *
     * @return float
     */
    private static function getIEEE754($rknum)
    {
    }
    /**
     * Get UTF-8 string from (compressed or uncompressed) UTF-16 string.
     *
     * @param string $string
     * @param bool $compressed
     *
     * @return string
     */
    private static function encodeUTF16($string, $compressed = false)
    {
    }
    /**
     * Convert UTF-16 string in compressed notation to uncompressed form. Only used for BIFF8.
     *
     * @param string $string
     *
     * @return string
     */
    private static function uncompressByteString($string)
    {
    }
    /**
     * Convert string to UTF-8. Only used for BIFF5.
     *
     * @param string $string
     *
     * @return string
     */
    private function decodeCodepage($string)
    {
    }
    /**
     * Read 16-bit unsigned integer.
     *
     * @param string $data
     * @param int $pos
     *
     * @return int
     */
    public static function getUInt2d($data, $pos)
    {
    }
    /**
     * Read 16-bit signed integer.
     *
     * @param string $data
     * @param int $pos
     *
     * @return int
     */
    public static function getInt2d($data, $pos)
    {
    }
    /**
     * Read 32-bit signed integer.
     *
     * @param string $data
     * @param int $pos
     *
     * @return int
     */
    public static function getInt4d($data, $pos)
    {
    }
    private function parseRichText($is)
    {
    }
}