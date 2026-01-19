<?php

namespace PhpOffice\PhpSpreadsheet\Writer;

class Xlsx extends \PhpOffice\PhpSpreadsheet\Writer\BaseWriter
{
    /**
     * Office2003 compatibility.
     *
     * @var bool
     */
    private $office2003compatibility = false;
    /**
     * Private writer parts.
     *
     * @var Xlsx\WriterPart[]
     */
    private $writerParts = [];
    /**
     * Private Spreadsheet.
     *
     * @var Spreadsheet
     */
    private $spreadSheet;
    /**
     * Private string table.
     *
     * @var string[]
     */
    private $stringTable = [];
    /**
     * Private unique Conditional HashTable.
     *
     * @var HashTable
     */
    private $stylesConditionalHashTable;
    /**
     * Private unique Style HashTable.
     *
     * @var HashTable
     */
    private $styleHashTable;
    /**
     * Private unique Fill HashTable.
     *
     * @var HashTable
     */
    private $fillHashTable;
    /**
     * Private unique \PhpOffice\PhpSpreadsheet\Style\Font HashTable.
     *
     * @var HashTable
     */
    private $fontHashTable;
    /**
     * Private unique Borders HashTable.
     *
     * @var HashTable
     */
    private $bordersHashTable;
    /**
     * Private unique NumberFormat HashTable.
     *
     * @var HashTable
     */
    private $numFmtHashTable;
    /**
     * Private unique \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet\BaseDrawing HashTable.
     *
     * @var HashTable
     */
    private $drawingHashTable;
    /**
     * Create a new Xlsx Writer.
     *
     * @param Spreadsheet $spreadsheet
     */
    public function __construct(\PhpOffice\PhpSpreadsheet\Spreadsheet $spreadsheet)
    {
    }
    /**
     * Get writer part.
     *
     * @param string $pPartName Writer part name
     *
     * @return \PhpOffice\PhpSpreadsheet\Writer\Xlsx\WriterPart
     */
    public function getWriterPart($pPartName)
    {
    }
    /**
     * Save PhpSpreadsheet to file.
     *
     * @param string $pFilename
     *
     * @throws WriterException
     */
    public function save($pFilename)
    {
    }
    /**
     * Get Spreadsheet object.
     *
     * @throws WriterException
     *
     * @return Spreadsheet
     */
    public function getSpreadsheet()
    {
    }
    /**
     * Set Spreadsheet object.
     *
     * @param Spreadsheet $spreadsheet PhpSpreadsheet object
     *
     * @return $this
     */
    public function setSpreadsheet(\PhpOffice\PhpSpreadsheet\Spreadsheet $spreadsheet)
    {
    }
    /**
     * Get string table.
     *
     * @return string[]
     */
    public function getStringTable()
    {
    }
    /**
     * Get Style HashTable.
     *
     * @return HashTable
     */
    public function getStyleHashTable()
    {
    }
    /**
     * Get Conditional HashTable.
     *
     * @return HashTable
     */
    public function getStylesConditionalHashTable()
    {
    }
    /**
     * Get Fill HashTable.
     *
     * @return HashTable
     */
    public function getFillHashTable()
    {
    }
    /**
     * Get \PhpOffice\PhpSpreadsheet\Style\Font HashTable.
     *
     * @return HashTable
     */
    public function getFontHashTable()
    {
    }
    /**
     * Get Borders HashTable.
     *
     * @return HashTable
     */
    public function getBordersHashTable()
    {
    }
    /**
     * Get NumberFormat HashTable.
     *
     * @return HashTable
     */
    public function getNumFmtHashTable()
    {
    }
    /**
     * Get \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet\BaseDrawing HashTable.
     *
     * @return HashTable
     */
    public function getDrawingHashTable()
    {
    }
    /**
     * Get Office2003 compatibility.
     *
     * @return bool
     */
    public function getOffice2003Compatibility()
    {
    }
    /**
     * Set Office2003 compatibility.
     *
     * @param bool $pValue Office2003 compatibility?
     *
     * @return $this
     */
    public function setOffice2003Compatibility($pValue)
    {
    }
}