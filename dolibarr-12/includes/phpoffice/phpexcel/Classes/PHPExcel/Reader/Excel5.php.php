<?php

/**
 * PHPExcel_Reader_Excel5
 *
 * This class uses {@link http://sourceforge.net/projects/phpexcelreader/parseXL}
 *
 * @category	PHPExcel
 * @package		PHPExcel_Reader_Excel5
 * @copyright	Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Reader_Excel5 extends \PHPExcel_Reader_Abstract implements \PHPExcel_Reader_IReader
{
    // ParseXL definitions
    const XLS_BIFF8 = 0x600;
    const XLS_BIFF7 = 0x500;
    const XLS_WorkbookGlobals = 0x5;
    const XLS_Worksheet = 0x10;
    // record identifiers
    const XLS_Type_FORMULA = 0x6;
    const XLS_Type_EOF = 0xa;
    const XLS_Type_PROTECT = 0x12;
    const XLS_Type_OBJECTPROTECT = 0x63;
    const XLS_Type_SCENPROTECT = 0xdd;
    const XLS_Type_PASSWORD = 0x13;
    const XLS_Type_HEADER = 0x14;
    const XLS_Type_FOOTER = 0x15;
    const XLS_Type_EXTERNSHEET = 0x17;
    const XLS_Type_DEFINEDNAME = 0x18;
    const XLS_Type_VERTICALPAGEBREAKS = 0x1a;
    const XLS_Type_HORIZONTALPAGEBREAKS = 0x1b;
    const XLS_Type_NOTE = 0x1c;
    const XLS_Type_SELECTION = 0x1d;
    const XLS_Type_DATEMODE = 0x22;
    const XLS_Type_EXTERNNAME = 0x23;
    const XLS_Type_LEFTMARGIN = 0x26;
    const XLS_Type_RIGHTMARGIN = 0x27;
    const XLS_Type_TOPMARGIN = 0x28;
    const XLS_Type_BOTTOMMARGIN = 0x29;
    const XLS_Type_PRINTGRIDLINES = 0x2b;
    const XLS_Type_FILEPASS = 0x2f;
    const XLS_Type_FONT = 0x31;
    const XLS_Type_CONTINUE = 0x3c;
    const XLS_Type_PANE = 0x41;
    const XLS_Type_CODEPAGE = 0x42;
    const XLS_Type_DEFCOLWIDTH = 0x55;
    const XLS_Type_OBJ = 0x5d;
    const XLS_Type_COLINFO = 0x7d;
    const XLS_Type_IMDATA = 0x7f;
    const XLS_Type_SHEETPR = 0x81;
    const XLS_Type_HCENTER = 0x83;
    const XLS_Type_VCENTER = 0x84;
    const XLS_Type_SHEET = 0x85;
    const XLS_Type_PALETTE = 0x92;
    const XLS_Type_SCL = 0xa0;
    const XLS_Type_PAGESETUP = 0xa1;
    const XLS_Type_MULRK = 0xbd;
    const XLS_Type_MULBLANK = 0xbe;
    const XLS_Type_DBCELL = 0xd7;
    const XLS_Type_XF = 0xe0;
    const XLS_Type_MERGEDCELLS = 0xe5;
    const XLS_Type_MSODRAWINGGROUP = 0xeb;
    const XLS_Type_MSODRAWING = 0xec;
    const XLS_Type_SST = 0xfc;
    const XLS_Type_LABELSST = 0xfd;
    const XLS_Type_EXTSST = 0xff;
    const XLS_Type_EXTERNALBOOK = 0x1ae;
    const XLS_Type_DATAVALIDATIONS = 0x1b2;
    const XLS_Type_TXO = 0x1b6;
    const XLS_Type_HYPERLINK = 0x1b8;
    const XLS_Type_DATAVALIDATION = 0x1be;
    const XLS_Type_DIMENSION = 0x200;
    const XLS_Type_BLANK = 0x201;
    const XLS_Type_NUMBER = 0x203;
    const XLS_Type_LABEL = 0x204;
    const XLS_Type_BOOLERR = 0x205;
    const XLS_Type_STRING = 0x207;
    const XLS_Type_ROW = 0x208;
    const XLS_Type_INDEX = 0x20b;
    const XLS_Type_ARRAY = 0x221;
    const XLS_Type_DEFAULTROWHEIGHT = 0x225;
    const XLS_Type_WINDOW2 = 0x23e;
    const XLS_Type_RK = 0x27e;
    const XLS_Type_STYLE = 0x293;
    const XLS_Type_FORMAT = 0x41e;
    const XLS_Type_SHAREDFMLA = 0x4bc;
    const XLS_Type_BOF = 0x809;
    const XLS_Type_SHEETPROTECTION = 0x867;
    const XLS_Type_RANGEPROTECTION = 0x868;
    const XLS_Type_SHEETLAYOUT = 0x862;
    const XLS_Type_XFEXT = 0x87d;
    const XLS_Type_PAGELAYOUTVIEW = 0x88b;
    const XLS_Type_UNKNOWN = 0xffff;
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
    private $_summaryInformation;
    /**
     * Extended Summary Information stream data.
     *
     * @var string
     */
    private $_documentSummaryInformation;
    /**
     * User-Defined Properties stream data.
     *
     * @var string
     */
    private $_userDefinedProperties;
    /**
     * Workbook stream data. (Includes workbook globals substream as well as sheet substreams)
     *
     * @var string
     */
    private $_data;
    /**
     * Size in bytes of $this->_data
     *
     * @var int
     */
    private $_dataSize;
    /**
     * Current position in stream
     *
     * @var integer
     */
    private $_pos;
    /**
     * Workbook to be returned by the reader.
     *
     * @var PHPExcel
     */
    private $_phpExcel;
    /**
     * Worksheet that is currently being built by the reader.
     *
     * @var PHPExcel_Worksheet
     */
    private $_phpSheet;
    /**
     * BIFF version
     *
     * @var int
     */
    private $_version;
    /**
     * Codepage set in the Excel file being read. Only important for BIFF5 (Excel 5.0 - Excel 95)
     * For BIFF8 (Excel 97 - Excel 2003) this will always have the value 'UTF-16LE'
     *
     * @var string
     */
    private $_codepage;
    /**
     * Shared formats
     *
     * @var array
     */
    private $_formats;
    /**
     * Shared fonts
     *
     * @var array
     */
    private $_objFonts;
    /**
     * Color palette
     *
     * @var array
     */
    private $_palette;
    /**
     * Worksheets
     *
     * @var array
     */
    private $_sheets;
    /**
     * External books
     *
     * @var array
     */
    private $_externalBooks;
    /**
     * REF structures. Only applies to BIFF8.
     *
     * @var array
     */
    private $_ref;
    /**
     * External names
     *
     * @var array
     */
    private $_externalNames;
    /**
     * Defined names
     *
     * @var array
     */
    private $_definedname;
    /**
     * Shared strings. Only applies to BIFF8.
     *
     * @var array
     */
    private $_sst;
    /**
     * Panes are frozen? (in sheet currently being read). See WINDOW2 record.
     *
     * @var boolean
     */
    private $_frozen;
    /**
     * Fit printout to number of pages? (in sheet currently being read). See SHEETPR record.
     *
     * @var boolean
     */
    private $_isFitToPages;
    /**
     * Objects. One OBJ record contributes with one entry.
     *
     * @var array
     */
    private $_objs;
    /**
     * Text Objects. One TXO record corresponds with one entry.
     *
     * @var array
     */
    private $_textObjects;
    /**
     * Cell Annotations (BIFF8)
     *
     * @var array
     */
    private $_cellNotes;
    /**
     * The combined MSODRAWINGGROUP data
     *
     * @var string
     */
    private $_drawingGroupData;
    /**
     * The combined MSODRAWING data (per sheet)
     *
     * @var string
     */
    private $_drawingData;
    /**
     * Keep track of XF index
     *
     * @var int
     */
    private $_xfIndex;
    /**
     * Mapping of XF index (that is a cell XF) to final index in cellXf collection
     *
     * @var array
     */
    private $_mapCellXfIndex;
    /**
     * Mapping of XF index (that is a style XF) to final index in cellStyleXf collection
     *
     * @var array
     */
    private $_mapCellStyleXfIndex;
    /**
     * The shared formulas in a sheet. One SHAREDFMLA record contributes with one value.
     *
     * @var array
     */
    private $_sharedFormulas;
    /**
     * The shared formula parts in a sheet. One FORMULA record contributes with one value if it
     * refers to a shared formula.
     *
     * @var array
     */
    private $_sharedFormulaParts;
    /**
     * The type of encryption in use
     *
     * @var int	
     */
    private $_encryption = 0;
    /**
     * The position in the stream after which contents are encrypted
     *
     * @var int
     */
    private $_encryptionStartPos = \false;
    /**
     * The current RC4 decryption object
     *
     * @var PHPExcel_Reader_Excel5_RC4
     */
    private $_rc4Key = \null;
    /**
     * The position in the stream that the RC4 decryption object was left at
     *
     * @var int
     */
    private $_rc4Pos = 0;
    /**
     * The current MD5 context state
     *
     * @var string
     */
    private $_md5Ctxt = \null;
    /**
     * Create a new PHPExcel_Reader_Excel5 instance
     */
    public function __construct()
    {
    }
    /**
     * Can the current PHPExcel_Reader_IReader read the file?
     *
     * @param 	string 		$pFilename
     * @return 	boolean
     * @throws PHPExcel_Reader_Exception
     */
    public function canRead($pFilename)
    {
    }
    /**
     * Reads names of the worksheets from a file, without parsing the whole file to a PHPExcel object
     *
     * @param 	string 		$pFilename
     * @throws 	PHPExcel_Reader_Exception
     */
    public function listWorksheetNames($pFilename)
    {
    }
    /**
     * Return worksheet info (Name, Last Column Letter, Last Column Index, Total Rows, Total Columns)
     *
     * @param   string     $pFilename
     * @throws   PHPExcel_Reader_Exception
     */
    public function listWorksheetInfo($pFilename)
    {
    }
    /**
     * Loads PHPExcel from file
     *
     * @param 	string 		$pFilename
     * @return 	PHPExcel
     * @throws 	PHPExcel_Reader_Exception
     */
    public function load($pFilename)
    {
    }
    /**
     * Read record data from stream, decrypting as required
     * 
     * @param string $data   Data stream to read from
     * @param int    $pos    Position to start reading from
     * @param int    $length Record data length
     * 
     * @return string Record data
     */
    private function _readRecordData($data, $pos, $len)
    {
    }
    /**
     * Use OLE reader to extract the relevant data streams from the OLE file
     *
     * @param string $pFilename
     */
    private function _loadOLE($pFilename)
    {
    }
    /**
     * Read summary information
     */
    private function _readSummaryInformation()
    {
    }
    /**
     * Read additional document summary information
     */
    private function _readDocumentSummaryInformation()
    {
    }
    /**
     * Reads a general type of BIFF record. Does nothing except for moving stream pointer forward to next record.
     */
    private function _readDefault()
    {
    }
    /**
     *	The NOTE record specifies a comment associated with a particular cell. In Excel 95 (BIFF7) and earlier versions,
     *		this record stores a note (cell note). This feature was significantly enhanced in Excel 97.
     */
    private function _readNote()
    {
    }
    /**
     *	The TEXT Object record contains the text associated with a cell annotation.
     */
    private function _readTextObject()
    {
    }
    /**
     * Read BOF
     */
    private function _readBof()
    {
    }
    /**
     * FILEPASS
     *
     * This record is part of the File Protection Block. It
     * contains information about the read/write password of the
     * file. All record contents following this record will be
     * encrypted.
     *
     * --	"OpenOffice.org's Documentation of the Microsoft
     * 		Excel File Format"
     * 
     * The decryption functions and objects used from here on in
     * are based on the source of Spreadsheet-ParseExcel:
     * http://search.cpan.org/~jmcnamara/Spreadsheet-ParseExcel/
     */
    private function _readFilepass()
    {
    }
    /**
     * Make an RC4 decryptor for the given block
     * 
     * @var int    $block      Block for which to create decrypto
     * @var string $valContext MD5 context state
     * 
     * @return PHPExcel_Reader_Excel5_RC4
     */
    private function _makeKey($block, $valContext)
    {
    }
    /**
     * Verify RC4 file password
     * 
     * @var string $password        Password to check
     * @var string $docid           Document id
     * @var string $salt_data       Salt data
     * @var string $hashedsalt_data Hashed salt data
     * @var string &$valContext     Set to the MD5 context of the value
     * 
     * @return bool Success
     */
    private function _verifyPassword($password, $docid, $salt_data, $hashedsalt_data, &$valContext)
    {
    }
    /**
     * CODEPAGE
     *
     * This record stores the text encoding used to write byte
     * strings, stored as MS Windows code page identifier.
     *
     * --	"OpenOffice.org's Documentation of the Microsoft
     * 		Excel File Format"
     */
    private function _readCodepage()
    {
    }
    /**
     * DATEMODE
     *
     * This record specifies the base date for displaying date
     * values. All dates are stored as count of days past this
     * base date. In BIFF2-BIFF4 this record is part of the
     * Calculation Settings Block. In BIFF5-BIFF8 it is
     * stored in the Workbook Globals Substream.
     *
     * --	"OpenOffice.org's Documentation of the Microsoft
     * 		Excel File Format"
     */
    private function _readDateMode()
    {
    }
    /**
     * Read a FONT record
     */
    private function _readFont()
    {
    }
    /**
     * FORMAT
     *
     * This record contains information about a number format.
     * All FORMAT records occur together in a sequential list.
     *
     * In BIFF2-BIFF4 other records referencing a FORMAT record
     * contain a zero-based index into this list. From BIFF5 on
     * the FORMAT record contains the index itself that will be
     * used by other records.
     *
     * --	"OpenOffice.org's Documentation of the Microsoft
     * 		Excel File Format"
     */
    private function _readFormat()
    {
    }
    /**
     * XF - Extended Format
     *
     * This record contains formatting information for cells, rows, columns or styles.
     * According to http://support.microsoft.com/kb/147732 there are always at least 15 cell style XF
     * and 1 cell XF.
     * Inspection of Excel files generated by MS Office Excel shows that XF records 0-14 are cell style XF
     * and XF record 15 is a cell XF
     * We only read the first cell style XF and skip the remaining cell style XF records
     * We read all cell XF records.
     *
     * --	"OpenOffice.org's Documentation of the Microsoft
     * 		Excel File Format"
     */
    private function _readXf()
    {
    }
    /**
     *
     */
    private function _readXfExt()
    {
    }
    /**
     * Read STYLE record
     */
    private function _readStyle()
    {
    }
    /**
     * Read PALETTE record
     */
    private function _readPalette()
    {
    }
    /**
     * SHEET
     *
     * This record is  located in the  Workbook Globals
     * Substream  and represents a sheet inside the workbook.
     * One SHEET record is written for each sheet. It stores the
     * sheet name and a stream offset to the BOF record of the
     * respective Sheet Substream within the Workbook Stream.
     *
     * --	"OpenOffice.org's Documentation of the Microsoft
     * 		Excel File Format"
     */
    private function _readSheet()
    {
    }
    /**
     * Read EXTERNALBOOK record
     */
    private function _readExternalBook()
    {
    }
    /**
     * Read EXTERNNAME record.
     */
    private function _readExternName()
    {
    }
    /**
     * Read EXTERNSHEET record
     */
    private function _readExternSheet()
    {
    }
    /**
     * DEFINEDNAME
     *
     * This record is part of a Link Table. It contains the name
     * and the token array of an internal defined name. Token
     * arrays of defined names contain tokens with aberrant
     * token classes.
     *
     * --	"OpenOffice.org's Documentation of the Microsoft
     * 		Excel File Format"
     */
    private function _readDefinedName()
    {
    }
    /**
     * Read MSODRAWINGGROUP record
     */
    private function _readMsoDrawingGroup()
    {
    }
    /**
     * SST - Shared String Table
     *
     * This record contains a list of all strings used anywhere
     * in the workbook. Each string occurs only once. The
     * workbook uses indexes into the list to reference the
     * strings.
     *
     * --	"OpenOffice.org's Documentation of the Microsoft
     * 		Excel File Format"
     **/
    private function _readSst()
    {
    }
    /**
     * Read PRINTGRIDLINES record
     */
    private function _readPrintGridlines()
    {
    }
    /**
     * Read DEFAULTROWHEIGHT record
     */
    private function _readDefaultRowHeight()
    {
    }
    /**
     * Read SHEETPR record
     */
    private function _readSheetPr()
    {
    }
    /**
     * Read HORIZONTALPAGEBREAKS record
     */
    private function _readHorizontalPageBreaks()
    {
    }
    /**
     * Read VERTICALPAGEBREAKS record
     */
    private function _readVerticalPageBreaks()
    {
    }
    /**
     * Read HEADER record
     */
    private function _readHeader()
    {
    }
    /**
     * Read FOOTER record
     */
    private function _readFooter()
    {
    }
    /**
     * Read HCENTER record
     */
    private function _readHcenter()
    {
    }
    /**
     * Read VCENTER record
     */
    private function _readVcenter()
    {
    }
    /**
     * Read LEFTMARGIN record
     */
    private function _readLeftMargin()
    {
    }
    /**
     * Read RIGHTMARGIN record
     */
    private function _readRightMargin()
    {
    }
    /**
     * Read TOPMARGIN record
     */
    private function _readTopMargin()
    {
    }
    /**
     * Read BOTTOMMARGIN record
     */
    private function _readBottomMargin()
    {
    }
    /**
     * Read PAGESETUP record
     */
    private function _readPageSetup()
    {
    }
    /**
     * PROTECT - Sheet protection (BIFF2 through BIFF8)
     *   if this record is omitted, then it also means no sheet protection
     */
    private function _readProtect()
    {
    }
    /**
     * SCENPROTECT
     */
    private function _readScenProtect()
    {
    }
    /**
     * OBJECTPROTECT
     */
    private function _readObjectProtect()
    {
    }
    /**
     * PASSWORD - Sheet protection (hashed) password (BIFF2 through BIFF8)
     */
    private function _readPassword()
    {
    }
    /**
     * Read DEFCOLWIDTH record
     */
    private function _readDefColWidth()
    {
    }
    /**
     * Read COLINFO record
     */
    private function _readColInfo()
    {
    }
    /**
     * ROW
     *
     * This record contains the properties of a single row in a
     * sheet. Rows and cells in a sheet are divided into blocks
     * of 32 rows.
     *
     * --	"OpenOffice.org's Documentation of the Microsoft
     * 		Excel File Format"
     */
    private function _readRow()
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
     * --	"OpenOffice.org's Documentation of the Microsoft
     * 		Excel File Format"
     */
    private function _readRk()
    {
    }
    /**
     * Read LABELSST record
     * This record represents a cell that contains a string. It
     * replaces the LABEL record and RSTRING record used in
     * BIFF2-BIFF5.
     *
     * --	"OpenOffice.org's Documentation of the Microsoft
     * 		Excel File Format"
     */
    private function _readLabelSst()
    {
    }
    /**
     * Read MULRK record
     * This record represents a cell range containing RK value
     * cells. All cells are located in the same row.
     *
     * --	"OpenOffice.org's Documentation of the Microsoft
     * 		Excel File Format"
     */
    private function _readMulRk()
    {
    }
    /**
     * Read NUMBER record
     * This record represents a cell that contains a
     * floating-point value.
     *
     * --	"OpenOffice.org's Documentation of the Microsoft
     * 		Excel File Format"
     */
    private function _readNumber()
    {
    }
    /**
     * Read FORMULA record + perhaps a following STRING record if formula result is a string
     * This record contains the token array and the result of a
     * formula cell.
     *
     * --	"OpenOffice.org's Documentation of the Microsoft
     * 		Excel File Format"
     */
    private function _readFormula()
    {
    }
    /**
     * Read a SHAREDFMLA record. This function just stores the binary shared formula in the reader,
     * which usually contains relative references.
     * These will be used to construct the formula in each shared formula part after the sheet is read.
     */
    private function _readSharedFmla()
    {
    }
    /**
     * Read a STRING record from current stream position and advance the stream pointer to next record
     * This record is used for storing result from FORMULA record when it is a string, and
     * it occurs directly after the FORMULA record
     *
     * @return string The string contents as UTF-8
     */
    private function _readString()
    {
    }
    /**
     * Read BOOLERR record
     * This record represents a Boolean value or error value
     * cell.
     *
     * --	"OpenOffice.org's Documentation of the Microsoft
     * 		Excel File Format"
     */
    private function _readBoolErr()
    {
    }
    /**
     * Read MULBLANK record
     * This record represents a cell range of empty cells. All
     * cells are located in the same row
     *
     * --	"OpenOffice.org's Documentation of the Microsoft
     * 		Excel File Format"
     */
    private function _readMulBlank()
    {
    }
    /**
     * Read LABEL record
     * This record represents a cell that contains a string. In
     * BIFF8 it is usually replaced by the LABELSST record.
     * Excel still uses this record, if it copies unformatted
     * text cells to the clipboard.
     *
     * --	"OpenOffice.org's Documentation of the Microsoft
     * 		Excel File Format"
     */
    private function _readLabel()
    {
    }
    /**
     * Read BLANK record
     */
    private function _readBlank()
    {
    }
    /**
     * Read MSODRAWING record
     */
    private function _readMsoDrawing()
    {
    }
    /**
     * Read OBJ record
     */
    private function _readObj()
    {
    }
    /**
     * Read WINDOW2 record
     */
    private function _readWindow2()
    {
    }
    /**
     * Read PLV Record(Created by Excel2007 or upper)
     */
    private function _readPageLayoutView()
    {
    }
    /**
     * Read SCL record
     */
    private function _readScl()
    {
    }
    /**
     * Read PANE record
     */
    private function _readPane()
    {
    }
    /**
     * Read SELECTION record. There is one such record for each pane in the sheet.
     */
    private function _readSelection()
    {
    }
    private function _includeCellRangeFiltered($cellRangeAddress)
    {
    }
    /**
     * MERGEDCELLS
     *
     * This record contains the addresses of merged cell ranges
     * in the current sheet.
     *
     * --	"OpenOffice.org's Documentation of the Microsoft
     * 		Excel File Format"
     */
    private function _readMergedCells()
    {
    }
    /**
     * Read HYPERLINK record
     */
    private function _readHyperLink()
    {
    }
    /**
     * Read DATAVALIDATIONS record
     */
    private function _readDataValidations()
    {
    }
    /**
     * Read DATAVALIDATION record
     */
    private function _readDataValidation()
    {
    }
    /**
     * Read SHEETLAYOUT record. Stores sheet tab color information.
     */
    private function _readSheetLayout()
    {
    }
    /**
     * Read SHEETPROTECTION record (FEATHEADR)
     */
    private function _readSheetProtection()
    {
    }
    /**
     * Read RANGEPROTECTION record
     * Reading of this record is based on Microsoft Office Excel 97-2000 Binary File Format Specification,
     * where it is referred to as FEAT record
     */
    private function _readRangeProtection()
    {
    }
    /**
     * Read IMDATA record
     */
    private function _readImData()
    {
    }
    /**
     * Read a free CONTINUE record. Free CONTINUE record may be a camouflaged MSODRAWING record
     * When MSODRAWING data on a sheet exceeds 8224 bytes, CONTINUE records are used instead. Undocumented.
     * In this case, we must treat the CONTINUE record as a MSODRAWING record
     */
    private function _readContinue()
    {
    }
    /**
     * Reads a record from current position in data stream and continues reading data as long as CONTINUE
     * records are found. Splices the record data pieces and returns the combined string as if record data
     * is in one piece.
     * Moves to next current position in data stream to start of next record different from a CONtINUE record
     *
     * @return array
     */
    private function _getSplicedRecordData()
    {
    }
    /**
     * Convert formula structure into human readable Excel formula like 'A3+A5*5'
     *
     * @param string $formulaStructure The complete binary data for the formula
     * @param string $baseCell Base cell, only needed when formula contains tRefN tokens, e.g. with shared formulas
     * @return string Human readable formula
     */
    private function _getFormulaFromStructure($formulaStructure, $baseCell = 'A1')
    {
    }
    /**
     * Take formula data and additional data for formula and return human readable formula
     *
     * @param string $formulaData The binary data for the formula itself
     * @param string $additionalData Additional binary data going with the formula
     * @param string $baseCell Base cell, only needed when formula contains tRefN tokens, e.g. with shared formulas
     * @return string Human readable formula
     */
    private function _getFormulaFromData($formulaData, $additionalData = '', $baseCell = 'A1')
    {
    }
    /**
     * Take array of tokens together with additional data for formula and return human readable formula
     *
     * @param array $tokens
     * @param array $additionalData Additional binary data going with the formula
     * @param string $baseCell Base cell, only needed when formula contains tRefN tokens, e.g. with shared formulas
     * @return string Human readable formula
     */
    private function _createFormulaFromTokens($tokens, $additionalData)
    {
    }
    /**
     * Fetch next token from binary formula data
     *
     * @param string Formula data
     * @param string $baseCell Base cell, only needed when formula contains tRefN tokens, e.g. with shared formulas
     * @return array
     * @throws PHPExcel_Reader_Exception
     */
    private function _getNextToken($formulaData, $baseCell = 'A1')
    {
    }
    /**
     * Reads a cell address in BIFF8 e.g. 'A2' or '$A$2'
     * section 3.3.4
     *
     * @param string $cellAddressStructure
     * @return string
     */
    private function _readBIFF8CellAddress($cellAddressStructure)
    {
    }
    /**
     * Reads a cell address in BIFF8 for shared formulas. Uses positive and negative values for row and column
     * to indicate offsets from a base cell
     * section 3.3.4
     *
     * @param string $cellAddressStructure
     * @param string $baseCell Base cell, only needed when formula contains tRefN tokens, e.g. with shared formulas
     * @return string
     */
    private function _readBIFF8CellAddressB($cellAddressStructure, $baseCell = 'A1')
    {
    }
    /**
     * Reads a cell range address in BIFF5 e.g. 'A2:B6' or 'A1'
     * always fixed range
     * section 2.5.14
     *
     * @param string $subData
     * @return string
     * @throws PHPExcel_Reader_Exception
     */
    private function _readBIFF5CellRangeAddressFixed($subData)
    {
    }
    /**
     * Reads a cell range address in BIFF8 e.g. 'A2:B6' or 'A1'
     * always fixed range
     * section 2.5.14
     *
     * @param string $subData
     * @return string
     * @throws PHPExcel_Reader_Exception
     */
    private function _readBIFF8CellRangeAddressFixed($subData)
    {
    }
    /**
     * Reads a cell range address in BIFF8 e.g. 'A2:B6' or '$A$2:$B$6'
     * there are flags indicating whether column/row index is relative
     * section 3.3.4
     *
     * @param string $subData
     * @return string
     */
    private function _readBIFF8CellRangeAddress($subData)
    {
    }
    /**
     * Reads a cell range address in BIFF8 for shared formulas. Uses positive and negative values for row and column
     * to indicate offsets from a base cell
     * section 3.3.4
     *
     * @param string $subData
     * @param string $baseCell Base cell
     * @return string Cell range address
     */
    private function _readBIFF8CellRangeAddressB($subData, $baseCell = 'A1')
    {
    }
    /**
     * Read BIFF8 cell range address list
     * section 2.5.15
     *
     * @param string $subData
     * @return array
     */
    private function _readBIFF8CellRangeAddressList($subData)
    {
    }
    /**
     * Read BIFF5 cell range address list
     * section 2.5.15
     *
     * @param string $subData
     * @return array
     */
    private function _readBIFF5CellRangeAddressList($subData)
    {
    }
    /**
     * Get a sheet range like Sheet1:Sheet3 from REF index
     * Note: If there is only one sheet in the range, one gets e.g Sheet1
     * It can also happen that the REF structure uses the -1 (FFFF) code to indicate deleted sheets,
     * in which case an PHPExcel_Reader_Exception is thrown
     *
     * @param int $index
     * @return string|false
     * @throws PHPExcel_Reader_Exception
     */
    private function _readSheetRangeByRefIndex($index)
    {
    }
    /**
     * read BIFF8 constant value array from array data
     * returns e.g. array('value' => '{1,2;3,4}', 'size' => 40}
     * section 2.5.8
     *
     * @param string $arrayData
     * @return array
     */
    private static function _readBIFF8ConstantArray($arrayData)
    {
    }
    /**
     * read BIFF8 constant value which may be 'Empty Value', 'Number', 'String Value', 'Boolean Value', 'Error Value'
     * section 2.5.7
     * returns e.g. array('value' => '5', 'size' => 9)
     *
     * @param string $valueData
     * @return array
     */
    private static function _readBIFF8Constant($valueData)
    {
    }
    /**
     * Extract RGB color
     * OpenOffice.org's Documentation of the Microsoft Excel File Format, section 2.5.4
     *
     * @param string $rgb Encoded RGB value (4 bytes)
     * @return array
     */
    private static function _readRGB($rgb)
    {
    }
    /**
     * Read byte string (8-bit string length)
     * OpenOffice documentation: 2.5.2
     *
     * @param string $subData
     * @return array
     */
    private function _readByteStringShort($subData)
    {
    }
    /**
     * Read byte string (16-bit string length)
     * OpenOffice documentation: 2.5.2
     *
     * @param string $subData
     * @return array
     */
    private function _readByteStringLong($subData)
    {
    }
    /**
     * Extracts an Excel Unicode short string (8-bit string length)
     * OpenOffice documentation: 2.5.3
     * function will automatically find out where the Unicode string ends.
     *
     * @param string $subData
     * @return array
     */
    private static function _readUnicodeStringShort($subData)
    {
    }
    /**
     * Extracts an Excel Unicode long string (16-bit string length)
     * OpenOffice documentation: 2.5.3
     * this function is under construction, needs to support rich text, and Asian phonetic settings
     *
     * @param string $subData
     * @return array
     */
    private static function _readUnicodeStringLong($subData)
    {
    }
    /**
     * Read Unicode string with no string length field, but with known character count
     * this function is under construction, needs to support rich text, and Asian phonetic settings
     * OpenOffice.org's Documentation of the Microsoft Excel File Format, section 2.5.3
     *
     * @param string $subData
     * @param int $characterCount
     * @return array
     */
    private static function _readUnicodeString($subData, $characterCount)
    {
    }
    /**
     * Convert UTF-8 string to string surounded by double quotes. Used for explicit string tokens in formulas.
     * Example:  hello"world  -->  "hello""world"
     *
     * @param string $value UTF-8 encoded string
     * @return string
     */
    private static function _UTF8toExcelDoubleQuoted($value)
    {
    }
    /**
     * Reads first 8 bytes of a string and return IEEE 754 float
     *
     * @param string $data Binary string that is at least 8 bytes long
     * @return float
     */
    private static function _extractNumber($data)
    {
    }
    private static function _GetIEEE754($rknum)
    {
    }
    /**
     * Get UTF-8 string from (compressed or uncompressed) UTF-16 string
     *
     * @param string $string
     * @param bool $compressed
     * @return string
     */
    private static function _encodeUTF16($string, $compressed = '')
    {
    }
    /**
     * Convert UTF-16 string in compressed notation to uncompressed form. Only used for BIFF8.
     *
     * @param string $string
     * @return string
     */
    private static function _uncompressByteString($string)
    {
    }
    /**
     * Convert string to UTF-8. Only used for BIFF5.
     *
     * @param string $string
     * @return string
     */
    private function _decodeCodepage($string)
    {
    }
    /**
     * Read 16-bit unsigned integer
     *
     * @param string $data
     * @param int $pos
     * @return int
     */
    public static function _GetInt2d($data, $pos)
    {
    }
    /**
     * Read 32-bit signed integer
     *
     * @param string $data
     * @param int $pos
     * @return int
     */
    public static function _GetInt4d($data, $pos)
    {
    }
    /**
     * Read color
     *
     * @param int $color Indexed color
     * @param array $palette Color palette
     * @return array RGB color value, example: array('rgb' => 'FF0000')
     */
    private static function _readColor($color, $palette, $version)
    {
    }
    /**
     * Map border style
     * OpenOffice documentation: 2.5.11
     *
     * @param int $index
     * @return string
     */
    private static function _mapBorderStyle($index)
    {
    }
    /**
     * Get fill pattern from index
     * OpenOffice documentation: 2.5.12
     *
     * @param int $index
     * @return string
     */
    private static function _mapFillPattern($index)
    {
    }
    /**
     * Map error code, e.g. '#N/A'
     *
     * @param int $subData
     * @return string
     */
    private static function _mapErrorCode($subData)
    {
    }
    /**
     * Map built-in color to RGB value
     *
     * @param int $color Indexed color
     * @return array
     */
    private static function _mapBuiltInColor($color)
    {
    }
    /**
     * Map color array from BIFF5 built-in color index
     *
     * @param int $subData
     * @return array
     */
    private static function _mapColorBIFF5($subData)
    {
    }
    /**
     * Map color array from BIFF8 built-in color index
     *
     * @param int $subData
     * @return array
     */
    private static function _mapColor($subData)
    {
    }
    private function _parseRichText($is = '')
    {
    }
}
/**
 * @ignore
 */
\define('PHPEXCEL_ROOT', \dirname(__FILE__) . '/../../');