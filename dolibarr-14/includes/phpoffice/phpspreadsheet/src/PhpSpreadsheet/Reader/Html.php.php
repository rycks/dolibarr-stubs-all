<?php

namespace PhpOffice\PhpSpreadsheet\Reader;

/** PhpSpreadsheet root directory */
class Html extends \PhpOffice\PhpSpreadsheet\Reader\BaseReader
{
    /**
     * Sample size to read to determine if it's HTML or not.
     */
    const TEST_SAMPLE_SIZE = 2048;
    /**
     * Input encoding.
     *
     * @var string
     */
    protected $inputEncoding = 'ANSI';
    /**
     * Sheet index to read.
     *
     * @var int
     */
    protected $sheetIndex = 0;
    /**
     * Formats.
     *
     * @var array
     */
    protected $formats = [
        'h1' => ['font' => ['bold' => true, 'size' => 24]],
        //    Bold, 24pt
        'h2' => ['font' => ['bold' => true, 'size' => 18]],
        //    Bold, 18pt
        'h3' => ['font' => ['bold' => true, 'size' => 13.5]],
        //    Bold, 13.5pt
        'h4' => ['font' => ['bold' => true, 'size' => 12]],
        //    Bold, 12pt
        'h5' => ['font' => ['bold' => true, 'size' => 10]],
        //    Bold, 10pt
        'h6' => ['font' => ['bold' => true, 'size' => 7.5]],
        //    Bold, 7.5pt
        'a' => ['font' => ['underline' => true, 'color' => ['argb' => \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLUE]]],
        //    Blue underlined
        'hr' => ['borders' => ['bottom' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN, 'color' => [\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK]]]],
        //    Bottom border
        'strong' => ['font' => ['bold' => true]],
        //    Bold
        'b' => ['font' => ['bold' => true]],
        //    Bold
        'i' => ['font' => ['italic' => true]],
        //    Italic
        'em' => ['font' => ['italic' => true]],
    ];
    protected $rowspan = [];
    /**
     * Create a new HTML Reader instance.
     */
    public function __construct()
    {
    }
    /**
     * Validate that the current file is an HTML file.
     *
     * @param string $pFilename
     *
     * @return bool
     */
    public function canRead($pFilename)
    {
    }
    private function readBeginning()
    {
    }
    private function readEnding()
    {
    }
    private static function startsWithTag($data)
    {
    }
    private static function endsWithTag($data)
    {
    }
    private static function containsTags($data)
    {
    }
    /**
     * Loads Spreadsheet from file.
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
     * Set input encoding.
     *
     * @param string $pValue Input encoding, eg: 'ANSI'
     *
     * @return Html
     */
    public function setInputEncoding($pValue)
    {
    }
    /**
     * Get input encoding.
     *
     * @return string
     */
    public function getInputEncoding()
    {
    }
    //    Data Array used for testing only, should write to Spreadsheet object on completion of tests
    protected $dataArray = [];
    protected $tableLevel = 0;
    protected $nestedColumn = ['A'];
    protected function setTableStartColumn($column)
    {
    }
    protected function getTableStartColumn()
    {
    }
    protected function releaseTableStartColumn()
    {
    }
    protected function flushCell(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $sheet, $column, $row, &$cellContent)
    {
    }
    /**
     * @param DOMNode $element
     * @param Worksheet $sheet
     * @param int $row
     * @param string $column
     * @param string $cellContent
     */
    protected function processDomElement(\DOMNode $element, \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $sheet, &$row, &$column, &$cellContent)
    {
    }
    /**
     * Loads PhpSpreadsheet from file into PhpSpreadsheet instance.
     *
     * @param string $pFilename
     * @param Spreadsheet $spreadsheet
     *
     * @throws Exception
     *
     * @return Spreadsheet
     */
    public function loadIntoExisting($pFilename, \PhpOffice\PhpSpreadsheet\Spreadsheet $spreadsheet)
    {
    }
    /**
     * Get sheet index.
     *
     * @return int
     */
    public function getSheetIndex()
    {
    }
    /**
     * Set sheet index.
     *
     * @param int $pValue Sheet index
     *
     * @return HTML
     */
    public function setSheetIndex($pValue)
    {
    }
    /**
     * Apply inline css inline style.
     *
     * NOTES :
     * Currently only intended for td & th element,
     * and only takes 'background-color' and 'color'; property with HEX color
     *
     * TODO :
     * - Implement to other propertie, such as border
     *
     * @param Worksheet $sheet
     * @param int $row
     * @param string $column
     * @param array $attributeArray
     */
    private function applyInlineStyle(&$sheet, $row, $column, $attributeArray)
    {
    }
    /**
     * Check if has #, so we can get clean hex.
     *
     * @param $value
     *
     * @return null|string
     */
    public function getStyleColor($value)
    {
    }
    /**
     * @param Worksheet $sheet
     * @param string    $column
     * @param int       $row
     * @param array     $attributes
     *
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     */
    private function insertImage(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $sheet, $column, $row, array $attributes)
    {
    }
    /**
     * Map html border style to PhpSpreadsheet border style.
     *
     * @param  string $style
     *
     * @return null|string
     */
    public function getBorderStyle($style)
    {
    }
    /**
     * @param Style  $cellStyle
     * @param string $styleValue
     * @param string $type
     */
    private function setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Style $cellStyle, $styleValue, $type)
    {
    }
}