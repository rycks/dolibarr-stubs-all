<?php

namespace PhpOffice\PhpSpreadsheet\Writer;

class Xls extends \PhpOffice\PhpSpreadsheet\Writer\BaseWriter
{
    /**
     * PhpSpreadsheet object.
     *
     * @var Spreadsheet
     */
    private $spreadsheet;
    /**
     * Total number of shared strings in workbook.
     *
     * @var int
     */
    private $strTotal = 0;
    /**
     * Number of unique shared strings in workbook.
     *
     * @var int
     */
    private $strUnique = 0;
    /**
     * Array of unique shared strings in workbook.
     *
     * @var array
     */
    private $strTable = [];
    /**
     * Color cache. Mapping between RGB value and color index.
     *
     * @var array
     */
    private $colors;
    /**
     * Formula parser.
     *
     * @var \PhpOffice\PhpSpreadsheet\Writer\Xls\Parser
     */
    private $parser;
    /**
     * Identifier clusters for drawings. Used in MSODRAWINGGROUP record.
     *
     * @var array
     */
    private $IDCLs;
    /**
     * Basic OLE object summary information.
     *
     * @var array
     */
    private $summaryInformation;
    /**
     * Extended OLE object document summary information.
     *
     * @var array
     */
    private $documentSummaryInformation;
    /**
     * @var \PhpOffice\PhpSpreadsheet\Writer\Xls\Workbook
     */
    private $writerWorkbook;
    /**
     * @var \PhpOffice\PhpSpreadsheet\Writer\Xls\Worksheet[]
     */
    private $writerWorksheets;
    /**
     * Create a new Xls Writer.
     *
     * @param Spreadsheet $spreadsheet PhpSpreadsheet object
     */
    public function __construct(\PhpOffice\PhpSpreadsheet\Spreadsheet $spreadsheet)
    {
    }
    /**
     * Save Spreadsheet to file.
     *
     * @param string $pFilename
     *
     * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
     */
    public function save($pFilename)
    {
    }
    /**
     * Build the Worksheet Escher objects.
     */
    private function buildWorksheetEschers()
    {
    }
    /**
     * Build the Escher object corresponding to the MSODRAWINGGROUP record.
     */
    private function buildWorkbookEscher()
    {
    }
    /**
     * Build the OLE Part for DocumentSummary Information.
     *
     * @return string
     */
    private function writeDocumentSummaryInformation()
    {
    }
    /**
     * Build the OLE Part for Summary Information.
     *
     * @return string
     */
    private function writeSummaryInformation()
    {
    }
}